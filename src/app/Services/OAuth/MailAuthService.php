<?php

namespace App\Services\OAuth;

use App\Exceptions\LoginInvalidException;
use App\Services\Contracts\OAuthContract;
use Illuminate\Support\Str;

/**
 * Classe responsável por realizar a autenticação no sistema através do e-mail.
 * 
 * @package auth
 * @author Julio Cesar
 */
class MailAuthService implements OAuthContract
{
    /**
     * Realiza o login no sistema, onde retorna o token do usuário logado.
     * 
     * @param array $data
     * 
     * @return array
     */
    public function auth(array $data): array
    {
        if (!$token = auth()->attempt($data)) {
            throw new LoginInvalidException();
        }

        return $this->getAuthenticatedUser($token);
    }

    /**
     * Realiza o tratamento de campos para a criação de um novo usuário, retornando como parão de todas as possíveis 
     * classes da implementação de autenticação.
     * 
     * @param array $data
     * 
     * @return array
     */
    public function create(array $data): array
    {
        $data['password'] = bcrypt($data['password'] ?? Str::random(10));
        return $data;
    }

    /**
     * Retorna o usuário autenticado, assim como seu token para navegar na aplicação.
     * 
     * @param string $token
     * 
     * @return array
     */
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
