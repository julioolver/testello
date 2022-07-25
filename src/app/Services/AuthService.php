<?php

namespace App\Services;

use App\Exceptions\UserHasBeenTakenException;
use App\Models\User;
use App\Repositories\AuthRepository;
use App\Services\Contracts\AuthServiceContract;
use App\Services\OAuth\MailAuthService;

class AuthService implements AuthServiceContract
{
    public function __construct(private AuthRepository $repository)
    {
    }

    public function authenticate(array $request, string $provider): array
    {
        $data = $request;

        $service = $this->getService($provider);

        $user = $service->auth($data);

        return $user;
    }

    public function register(array $data, string $provider): User
    {
       $userExists = $this->findUser($data['email']);

        if ($userExists) {
            throw new UserHasBeenTakenException();
        }

        $provider = $this->getService($provider);
        $userData = $provider->create($data);

        return $this->repository->create($userData);
    }

    private function findUser(string $email): bool
    {
        return $this->repository->findUser('email', $email);
    }

    private function getService(string $provider)
    {
        return match ($provider) {
            'email' => new MailAuthService()
        };
    }
}
