<?php


namespace App\Services;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


Class AuthService
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function login($credentials){

        $user = $this->userRepository->findByEmail($credentials['email']);

        if($user && hash::check($credentials['password'], $user->password)){
            return [
                'token' => $user->createToken('auth_token', ['*'], Carbon::now()->addHour(1))->plainTextToken
            ];
        }

        return ['error' => 'Credenciais inválidas'];
    }
}











?>