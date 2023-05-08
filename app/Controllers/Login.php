<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer_model;

class Login extends BaseController
{


    public function index(){

        echo view('login/login');

    }

	public function auth(){
        $session = session();
        $model = new Customer_model();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id'       => $data['id'],
                    'fname'     => $data['fname'],
					'lname'     => $data['lname'],
                    'email'    => $data['email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/user/'.$data['id'].'');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('login/register');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/');
        }
    }


    public function register(){

        echo view('login/register');

    }

    public function save()
    {
        $session = session();
        helper(['form']);
        //set rules validation form
        $rules = [
            'fname'          => 'required|min_length[3]|max_length[20]',
            'lname'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[customer_login.email]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confirm'  => 'matches[password]'
        ];

        if($this->validate($rules)){
            $model = new Customer_model();
            $data = [
                'email'    => $this->request->getVar('email'),
                'fname'     => $this->request->getVar('fname'),
                'lname'     => $this->request->getVar('lname'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            $session->setFlashdata('success', 'You have been registered!');
            return redirect()->to('login/register');
        }else{
            $data['validation'] = $this->validator;
            echo view('login/register', $data);
        }

    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }


	//--------------------------------------------------------------------

}
