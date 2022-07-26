<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingRate\ImportRequest;
use App\Models\ShippingRate;
use App\Services\Contracts\ShippingRateServiceContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 * Controller responsável por realizar as chamadas das operações sobre a Taxas de envio.
 * 
 * @package 
 */
class ShippingRateController extends Controller
{

    public function __construct(ShippingRateServiceContract $service) {
        $this->service = $service;
    }
    /**
     * Cria um novo registro
     *
     * @return object
     */
    public function create(Request $request): object
    {
        try {
            $data = $request->all();
            $shippingRate = $this->service->create($data);

            return $this->responseJson($shippingRate, Response::HTTP_OK);
        } catch (\Exception $th) {
            return $this->responseError($th, Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Error $er) {
            return $this->responseError($er, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Realiza a importação CSV dos dados.
     * 
     * @param Request $request
     * 
     * @return object
     */
    public function import(ImportRequest $request): object
    {
        try {
            $this->service->import($request->file('import_file'));

            return $this->responseJson('Upload realizado com sucesso', Response::HTTP_OK);
        } catch (ModelNotFoundException $me) {
            return $this->responseError("Ocorreu um erro no banco de dados e não foi possível importar os dados.", Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $th) {
            return $this->responseError($th, Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Error $er) {
            return $this->responseError($er, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Retorna um registro através da busca realizada pelo seu ID
     * 
     * @param Request $request
     * 
     * @return object
     */
    public function show(Request $request): object
    {
        try {
            $id = $request->route('id');
            $shippingRate = $this->service->findOne($id);

            return $this->responseJson($shippingRate);
        } catch (\Exception $th) {
            return $this->responseError($th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Error $er) {
            return $this->responseError($er->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
