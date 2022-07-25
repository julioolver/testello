<?php

declare(strict_types=1);

namespace App\Services\Contracts;

/**
 * Interface responsável por criar os métodos obrigatórios.
 *
 * Métodos implementados para listagem completa, listagem específica, criação, atualização, reativação e delete.
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

}
