<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\AuthRepositoryContract;

/**
 * Repository responsável por realizar as operações sobre a Autenticação na camada de banco.
 * 
 * @package Auth
 * @author Julio Cesar
 */
class AuthRepository extends BaseRepository implements AuthRepositoryContract
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Retorna se existe o usuário no sistema.
     * 
     * @param string $field
     * @param mixed $value
     * 
     * @return bool
     */
    public function checkIfUserExists(string $field = 'id', $value): bool
    {
        $userExists = $this->model->where($field, $value)->exists();
        return $userExists;
    }
}
