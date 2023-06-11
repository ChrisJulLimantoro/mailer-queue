<?php

namespace App\Http\Controllers;

use App\Services\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\bemMail;
use Illuminate\Support\Facades\Validator;

class mailController extends Controller
{
    protected $mailService;

    public function __construct()
    {
        $this->mailService = new MailService();
    }
    public function sendOPRecMail(Request $request){
        $rules = [
            'subject'=>'required',
            'to'=>'required|email',
            'message'=>'required',
            // 'tanggal'=>'required',
            // 'jam'=>'required',
            // 'name'=>'required',
        ];
        $errorMsg = [
            'subject.required'=>'Subject is required!',
            'to.required'=>'Address To is required!',
            'to.email'=>'Address To must be a valid email address!',
            'message.required'=>'Message is required!',
            // 'tanggal.required'=>'Tanggal is required!',
            // 'jam.required'=>'Jam is required!',
            // 'name.required'=>'Name is required!',
        ];

        $data = $request->only(['subject','to','message','tanggal','jam','name']);

        $validator = Validator::make($data,$rules,$errorMsg);

        if ($validator->fails()){
            return response()->json([
                'status'=>'error',
                'code'=>400,
                'message'=>$validator->errors()->first()
            ]);
        }else{
            return $this->mailService->sendMail($data);
        }
    }
}