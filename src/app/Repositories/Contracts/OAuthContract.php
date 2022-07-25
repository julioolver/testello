<?php

namespace App\Repositories\Contracts;

interface OAuthContract
{
    public function auth(array $data): array;

    public function getAuthenticatedUser(string $token): array;

    public function create(array $data): array;
}