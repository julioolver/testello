<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface AuthServiceContract
{
    /**
     * @return User
     */
    public function findUser(string $field = 'id', $value): bool;
}
