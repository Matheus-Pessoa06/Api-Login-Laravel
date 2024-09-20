<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }


    public function index(UserRequest $request){
        
        $request->validate();

        $token = $this->authService->login($request);
        
        if(isset($token['error'])){
            return response()->json($result, 401);
        }

        return response()->json($result);
    }
}
