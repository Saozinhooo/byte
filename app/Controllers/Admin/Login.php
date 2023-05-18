<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin_model;

class Login extends BaseController
{
	public function index()
	{

        echo view('admin/login2');
		

	}


    public function login(){

        
        
        // User type = admin
        $session = session();
        $is_user = $session->is_admin;
        if($is_admin){
            helper(['form']);
            echo view('admin/login2');
        }else{
            $this->logout();
        }

    }



	public function auth(){
        $session = session();
        $model = new Admin_model();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('user_email', $email)->first();
        if($data){
            $pass = $data['user_pass'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'user_id'       => $data['user_id'],
                    'fname'     => $data['fname'],
										'lname'     => $data['lname'],
                    'user_email'    => $data['user_email'],
                    'logged_in'     => TRUE,
                    'is_admin' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admin');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/admin/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/admin/login');
        }
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/admin/login');
    }


	//--------------------------------------------------------------------

}
