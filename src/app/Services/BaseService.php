<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\BaseServiceContract;

/**
 * Classe de serviço utilizada para abstrair do controller a responsabilidade de realizar chamadas para
 * métodos do repositório e tratar regras de negócio.
 *
 * @package Bases
 * @author  Julio Cesar
 */
class BaseService implements BaseServiceContract
{
    protected $repository;

    /**
     * __construct
     *
     * @param  $repository
     * @return void
     */
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * Cadastro de nova entidade.
     *
     * @param  array $attributes Dados da entidade que será persistida no BD
     * @return object
     */
    public function create(array $attributes): object
    {
        return $this->repository->create($attributes);
    }
}
