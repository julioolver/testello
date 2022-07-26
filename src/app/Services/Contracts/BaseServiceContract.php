<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface responsável por implementar os métodos obrigatórios para tratar a base de serviços/regra de negócio.
 *
 * @package Bases
 * @author  Julio Cesar
 */
interface BaseServiceContract
{
    /**
     * Cadastro de nova entidade.
     *
     * @param  array $attributes Dados da entidade que será persistida no BD
     * @return object
     */
    public function create(array $attributes): object;

    /**
     * Realiza a busca de um registro pelo seu Id
     * 
     * @param int $id
     * 
     * @return Model
     */
    public function findOne(int $id): Model;
}
