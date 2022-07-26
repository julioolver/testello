<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface responsável por criar os métodos obrigatórios.
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

    public function findOne(int $id): Model;
}
