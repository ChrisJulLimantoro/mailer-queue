<?php

namespace App\Services;
use Illuminate\App\Repositories\AuthRepository;

class AuthService {

    protected $repository;
    public function __construct()
    {
        $this->repository = new \App\Repositories\AuthRepository();
    }

    // public function createToken()
    // {
    //     $token = $this->();
    //     return $token;
    // }

    public function register($data)
    {
        $user = $this->repository->firstOrCreateUser($data['email'],$data['name'],$data['password']);
        return response()->json([
            'status'=>'success',
            'code'=>200,
            'message'=>'User registered successfully!'
        ]);
    }
    public function login($data)
    {
        return  $this->repository->match($data['email'],$data['password']);
    }
}