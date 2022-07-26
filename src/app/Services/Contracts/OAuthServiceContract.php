<?php

namespace App\Services\Contracts;

/**
 * Interface responsável por implementar os métodos obrigatórios para tratar os tipos de autenticação (liskov substitution principle).
 * 
 */
interface OAuthServiceContract
{
    /**
     * Realiza a autenticação do usuário no sistema
     * 
     * @param array $data
     * 
     * @return array
     */
    public function auth(array $data): array;

    /**
     * Retorna o usuário autenticado com seu token.
     * 
     * @param string $token
     * 
     * @return array
     */
    public function getAuthenticatedUser(string $token): array;

    /**
     * realiza o tratamento de campos para criação de um novo usuário
     * 
     * @param array $data
     * 
     * @return array
     */
    public function create(array $data): array;
}
