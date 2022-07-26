<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingRate\ImportRequest;
use App\Models\ShippingRate;
use App\Services\Contracts\ShippingRateServiceContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 * [Description ShippingRateController]
 * 
 * @package 
 */
class ShippingRateController extends Controller
{

    public function __construct(ShippingRateServiceContract $service) {
        $this->service = $service;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $shippingRate = ShippingRate::create($request->all());

        return $shippingRate;
    }

    /**
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
