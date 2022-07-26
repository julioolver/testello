<?php

namespace App\Services\Contracts;

interface OAuthServiceContract
{
    public function auth(array $data): array;

    public function getAuthenticatedUser(string $token): array;

    public function create(array $data): array;
}
