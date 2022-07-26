<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller responsável por realizar as chamadas das operações sobre a autenticação.
 *
 * @author Julio Cesar
 */
class AuthController extends Controller
{
    public function __construct(AuthService $service)
    {
        $this->service = $service;
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Insere o registro de um novo usuário.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(RegisterRequest $request): object
    {
        try {
            $fields = $this->getOnlyFields($request, [
                'name',
                'email',
                'password',
                'type'
            ]);

            $user = $this->service->register($fields, 'email');

            return response()->json($user, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return $this->responseError('Não foi possível cadastrar o usuário. ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request): object
    {
        try {
            $credentials = $this->getOnlyFields($request, ['email', 'password']);

            $user = $this->service->authenticate($credentials, 'email');

            return response()->json($user, Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->responseError($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        // return $this->respondWithToken($token, $user);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }


    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}
