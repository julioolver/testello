<?php

namespace App\Services\OAuth;

use App\Exceptions\LoginInvalidException;
use App\Services\Contracts\OAuthContract;
use Illuminate\Support\Str;

class MailAuthService implements OAuthContract
{
    public function auth(array $data): array
    {
        if (!$token = auth()->attempt($data)) {
            throw new LoginInvalidException();
        }

        return $this->getAuthenticatedUser($token);
    }

    public function create(array $data): array
    {
        $data['password'] = bcrypt($data['password'] ?? Str::random(10));
        return $data;
    }

    public function getAuthenticatedUser(string $token): array
    {
        $user = auth()->user();
        return [
            'token' => $token,
            'user' => [
                'id' => (int)$user->id,
                'first_name' => (string)$user->first_name,
                'last_name' => (string)$user->last_name,
                'email' => (string)$user->email,
                'created_at' => (string)$user->created_at,
            ],
            'token_type'   => 'Bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}
