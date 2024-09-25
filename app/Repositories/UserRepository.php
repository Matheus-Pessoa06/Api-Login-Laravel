<?php


namespace App\Repositories;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;


Class UserRepository{

    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function getAll(){

        return $this->user->all();
    }

    public function getById($id){
        
        return $this->user->find($id);
    }

    public function findbyEmail($email){
        
        return $this->user->where('email', $email)->first();
    }

    public function createUser($data){

        return $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }

    public function updateUser($id, $data){

        $user = $this->user->findorfail($id);
        $user->update($data);

        return $user;
    }

    public function deleteUser($id){
        
        $user = $this->user->findorfail($id);
        $user->delete();

        return $user;
    }

}

?>