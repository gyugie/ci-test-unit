<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '../vendor/autoload.php';
require APPPATH . '/libraries/REST_Controller.php';
use \Firebase\JWT\JWT;

class Auth extends REST_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function login_post(){
       
        // run validation 
        Self::login_validation();
        
        if($this->form_validation->run() == true ){
            $data = [
                "username"  => $this->input->post('username', true),
                "password"  => $this->input->post('password', true),
                "email"     => $this->input->post('email', true)
            ];

            $this->response([
                "status"    => 200,
                "message"   => "success add data",
                "data"      => $this->input->post()
            ]);
            
        } else {
            $this->response([
                "status" => 204,
                "message"=> $this->form_validation->error_array()
            ]);
            
        }
    }


    private function login_validation(){
        $request = [
            [
                    'field' => 'username',
                    'rules' => 'required',//|is_unique[users.username]
                    'errors' => [
                        'required' => 'You must provide a %s.',
                ],
            ],
            [
                    'field' => 'password',
                    'rules' => 'required|min_length[6]',
                    'errors' => [
                            'required' => 'You must provide a %s.',
                    ],
            ],
            [
                    'field' => 'password_confirmation',
                    'rules' => 'required|min_length[6]|matches[password]',
                    'errors' => 'Password not same!',
            ],
            [
                    'field' => 'email',
                    'rules' => 'required'//|is_unique[users.email]
            ]
        ];
        
        return $this->form_validation->set_rules($request);

    }

}