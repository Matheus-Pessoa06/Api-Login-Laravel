<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Requests\UserRequest;

class LoginController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function index(UserRequest $request){
        
        $request->validated();

        $token = $this->authService->login($request);
        
        if(isset($token['error'])){
            return response()->json($token, 401);
        }

        return response()->json($token);
    }
}
