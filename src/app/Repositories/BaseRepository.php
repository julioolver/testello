<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryContract;
use Illuminate\Database\Eloquent\Model;

/**
 * Repository responsável por realizar as operações na camada de banco.
 *
 * @package Bases
 * @author  Julio Cesar
 */
class BaseRepository implements BaseRepositoryContract
{
    /**
     * Model que será utilizado para buscar as entidades
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * __construct
     *
     * @param  $model
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Cadastro de nova entidade.
     *
     * @param  array $attributes Dados da entidade que será persistida no BD
     * @return object
     */
    public function create(array $attributes): object
    {
        return $this->model->create($attributes);
    }

    /**
     * Realiza a busca de um registro através do seu ID.
     * 
     * @param int $id
     * 
     * @return Model
     */
    public function findOne(int $id): Model
    {
        return $this->model->find($id);
    }
}
