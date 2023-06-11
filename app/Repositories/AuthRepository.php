<?php

namespace App\Repositories;

use App\Models\User;

class AuthRepository {
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function firstOrCreateUser($email)
    {
        $user = $this->model->firstOrCreate([
            'email' => $email
        ]);
        return $user;
    }
}