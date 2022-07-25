<?php

namespace App\Repositories\Contracts;

/**
 * Interface Base responsável por criar os métodos obrigatórios em todos repositories
 *
 * Métodos implementados para listagem completa, listagem específica, criação, atualização, reativação e delete
 *
 * @package Bases
 * @author  Julio Cesar
 */
interface BaseRepositoryContract
{
    
    /**
     * Cadastro de nova entidade.
     *
     * @param  array $attributes Dados da entidade que será persistida no BD
     * @return object
     */
    public function create(array $attributes): object;
}
