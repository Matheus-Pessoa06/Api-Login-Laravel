<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Services\AuthService;


class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user){
        $this->user = $user;
    }
    public function store(UserRequest $request){
       
        $request->validated();
        dd($request);
        $usuario = $this->user->createUser($request->all());

        return response()->json($user, 201);
    }


}
