<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository {
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function firstOrCreateUser($email,$name,$password)
    {
        $user = $this->model->firstOrCreate([
            'email' => $email,
            'name' => $name,
            'password' => Hash::make($password)
        ]);
        return $user;
    }
    public function match($email,$password)
    {
        $user = $this->model->where('email',$email)->first();
        if ($user){
            if (Hash::check($password,$user->password)){
                $auth = $user->createToken('authToken')->plainTextToken;
                return response()->json([
                    'status'=>'success',
                    'code'=>200,
                    'message'=>'User logged in successfully!',
                    'token' => $auth
                ]);
            }else{
                return response()->json([
                    'status'=>'error',
                    'code'=>400,
                    'message'=>'Password does not match!'
                ]);
            }
        }else{
            return response()->json([
                'status' => 'error',
                'code' => 400,
                'message' => 'User not found!'
            ]);
        }
    }
}