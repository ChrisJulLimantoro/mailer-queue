<?php
    namespace App\Repositories;

    use App\Models\Mail;
    
    Class MailRepository {

        protected $model;

        public function __construct()
        {
            $this->model = new Mail();
        }
        public function logMail($data,$stat){
            // $this->model->cc = json_encode($data['cc']);
            if(isset($data['file'])){
                $this->model->file = $data['file'];
            }
            $this->model->message = $data['message'];
            $this->model->to = $data['to'];
            $this->model->subject = $data['subject'];
            $this->model->status = $stat;
            return $this->model->save();
        }
    }
