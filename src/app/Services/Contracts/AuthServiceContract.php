<?php

namespace App\Services\Contracts;

use App\Models\User;

interface AuthServiceContract
{
    /**
     * @return User
     */
    public function authenticate(array $request, string $provider): array;

    /**
     * @return User
     */
    public function register(array $data, string $provider): User;
}
