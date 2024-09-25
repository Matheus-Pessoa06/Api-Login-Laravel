<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Services\AuthService;
use App\Repositories\UserRepository;


class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user){
        $this->user = $user;
    }
    public function store(Request $request){
       
        $request->validated();
        dd($request);
        $usuario = $this->user->createUser($request->all());

        return response()->json($usuario, 201);
    }


}
