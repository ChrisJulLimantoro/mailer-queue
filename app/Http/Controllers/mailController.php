<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\bemMail;
use Illuminate\Support\Facades\Validator;

class mailController extends Controller
{
    public function sendMail(Request $request){
        $rules = [
            'subject'=>'required',
            'to'=>'required|email',
            'message'=>'required',
            'file' => 'optional|string',
        ];
        $errorMsg = [
            'subject.required'=>'Subject is required!',
            'to.required'=>'Address To is required!',
            'to.email'=>'Address To must be a valid email address!',
            'message.required'=>'Message is required!',
            'file.string'=>'Wrong file configuration!',
        ];

        $data = $request->only(['subject','to','message','file']);

        $validator = Validator::make($data,$rules,$errorMsg);

        if ($validator->fails()){
            return response()->json([
                'status'=>'error',
                'code'=>400,
                'message'=>$validator->errors()->first()
            ]);
        }else{
            $mail = new bemMail($data);
            Mail::to($data['to'])->send($mail);
            return response()->json([
                'status'=>'success',
                'code'=>200,
                'message'=>'Email sent successfully!'
            ]); 
        }
    }
}