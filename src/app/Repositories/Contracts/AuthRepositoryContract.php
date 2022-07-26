<?php

namespace App\Repositories\Contracts;

use App\Models\User;

/**
 * Interface responsável por implementar os métodos obrigatórios para tratar a autenticação na camada banco de dados.
 */
interface AuthRepositoryContract
{
    /**
     * Verifica se um usuário existe no sistema.
     * @return User
     */
    public function checkIfUserExists(string $field = 'id', $value): bool;
}
