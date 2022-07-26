<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface Base responsável por criar os métodos obrigatórios em todos repositories
 *
 * @package Bases
 * @author  Julio Cesar
 */
interface BaseRepositoryContract
{
    
    /**
     * Cadastro de nova entidade.
     *
     * @param  array
     * @return object
     */
    public function create(array $attributes): object;

    /**
     * Busca um único registro.
     * 
     * @param int $id
     * 
     * @return Model
     */
    public function findOne(int $id): Model;
}
