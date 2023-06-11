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
}