<?php

namespace App\Services;

use App\Exceptions\UserHasBeenTakenException;
use App\Models\User;
use App\Repositories\AuthRepository;
use App\Services\Contracts\AuthServiceContract;
use App\Services\OAuth\MailAuthService;

/**
 * Classe de serviço utilizada para abstrair do controller a responsabilidade de realizar chamadas para
 * métodos do repositório e tratar regras de negócio da autenticação.
 */
class AuthService implements AuthServiceContract
{
    const EMAIL = 'email';

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

    /**
     * Insere o registro de um novo usuário.
     * 
     * @param array $data
     * @param string $provider
     * 
     * @return User
     */
    public function register(array $data, string $provider): User
    {
        $userExists = $this->checkIfUserExists($data[self::EMAIL]);

        if ($userExists) {
            throw new UserHasBeenTakenException();
        }

        $provider = $this->getService($provider);
        $userData = $provider->create($data);

        return $this->repository->create($userData);
    }

    /**
     * Verifica se existe determinado usuário já cadastrado no sistema.
     * @param string $email
     * 
     * @return bool
     */
    private function checkIfUserExists(string $email): bool
    {
        return $this->repository->checkIfUserExists(self::EMAIL, $email);
    }

    /**
     * Retorna o tipo do serviço de autenticação a ser utilizado.
     * 
     * @param string $provider
     * 
     * @return object
     */
    private function getService(string $provider): object
    {
        return match ($provider) {
            self::EMAIL => new MailAuthService()
        };
    }
}
