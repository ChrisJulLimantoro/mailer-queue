<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $AuthService;

    public function __construct()
    {
        $this->AuthService = new AuthService();
    }
    public function login(Request $request){
        $data = $request->only(['email','password']);
        $rules = [
            'email'=>'required|email',
            'password'=>'required'
        ];
        $error_msg = [
            'email.required'=>'Email is required!',
            'email.email'=>'Email must be a valid email address!',
            'password.required'=>'Password is required!'
        ];
        $validate = Validator::make($data,$rules,$error_msg);
        if ($validate->fails()){
            return response()->json([
                'status'=>'error',
                'code'=>400,
                'message'=>$validate->errors()->first()
            ]);
        }else{
            // return $this->AuthService->login($data);
        }
    }
}
