<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $service;

    public function respondWithToken($token, $user = null)
    {
        return response()->json([
            'token' => $token,
            'user' => $user,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
        ], 200);
    }

    /**
     * Monta o retorno para as execoes.
     *
     * @param  string $message
     * @param  int $reponseCode
     * @return object
     */
    protected function responseError(string $message, int $reponseCode): object
    {
        return response()->json([
            [
                "error" => $message,
            ],
        ], $reponseCode);
    }

    /**
     * Trata o response que será retornado para o client.
     * Caso não tenha dados, retornar 404 ou 204.
     * Caso contrário, retorna 200 com os dados.
     *
     * @param  mixed $data Dados completo
     * @param  int $responseCode Código de resposta a ser enviado
     * 
     * @return object
     */
    protected function responseJson($response, ?int $responseCode = null): object
    {
        if ($responseCode == Response::HTTP_NO_CONTENT) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        }

        if (($response instanceof Collection) && $this->isEmpty($response)) {
            return response()->json(null, Response::HTTP_NOT_FOUND);
        }

        return response()->json($response, ($responseCode === null) ? Response::HTTP_OK : $responseCode);
    }

    /**
     * Verifica se existe dados.
     *
     * @param  Collection Dados completos
     * @return bool
     */
    protected function isEmpty(Collection $data): bool
    {
        return ($data->count() == 0);
    }

    /**
     * Obtém apenas os campos necessários para a entidade.
     * 
     * @param object $payload
     * @param array $fields
     * 
     * @return array
     */
    public function getOnlyFields(object $payload, array $fields): array
    {
        return $payload->only($fields);
    }
}
