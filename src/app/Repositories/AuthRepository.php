<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\AuthServiceContract;

class AuthRepository extends BaseRepository implements AuthServiceContract
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function findUser(string $field = 'id', $value): bool
    {
        $userExists = $this->model->where($field, $value)->exists();
        return $userExists;
    }
}
