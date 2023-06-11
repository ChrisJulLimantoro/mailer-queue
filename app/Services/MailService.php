<?php

namespace App\Services;
use App\Mail\bemMail;
use Illuminate\Support\Facades\Mail;
use App\Repositories\MailRepository;

class MailService {
    protected $repository;

    public function __construct()
    {
        $this->repository = new MailRepository();
    }

    public function sendMail($data){
        if (isset($data['file'])){
            $file = base64_decode($data['file']);
            $data['file'] = $file;
        }
        $mail = new bemMail($data);

        $succ = Mail::to($data['to'])->send($mail);
        if($succ != null){
            $this->repository->logMail($data,1);
            return response()->json([
                'status'=>'success',
                'code'=>200,
                'message'=>'Email sent successfully!'
            ]);
        }else{
            $this->repository->logMail($data,2);
            return response()->json([
                'status'=>'error',
                'code'=>400,
                'message'=>'Email failed to send!'
            ]);
        }
    }
}