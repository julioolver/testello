<?php

namespace App\Services\Contracts;

use App\Models\User;

/**
 * Interface responsável por implementar os métodos obrigatórios para tratar a autenticação na regra do negócio.
 * 
 */
interface AuthServiceContract
{
    /**
     * Realiza a autenticação do usuário.
     * 
     * @return User
     */
    public function authenticate(array $request, string $provider): array;

    /**
     * Realiza o registro de um novo usuário.
     * @return User
     */
    public function register(array $data, string $provider): User;
}
