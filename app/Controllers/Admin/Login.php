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
        $is_admin = $session->is_admin;
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
        $is_Active = $data['is_Active'] == 1 ? true : false;
        if($data && $is_Active){
            $pass = $data['user_pass'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'user_id' => $data['user_id'],
                    'fname' => $data['fname'],
					'lname' => $data['lname'],
                    'user_email' => $data['user_email'],
                    'user_type' => $data['user_type'],
                    'logged_in' => TRUE,
                    'is_admin' => TRUE
                ];

                $session->set($ses_data);

                return redirect()->to('/admin');

            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/admin/login');
            }

        }elseif ($is_Active == false) {
            $session->setFlashdata('msg', 'Your account is inactive!');
            return redirect()->to('/admin/login');

        } else {
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/admin/login');
        }
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/admin/login');
    }

    public function reset_page()
    {
        echo view('/admin/reset_page');
    }

    public function password_reset()
    {
        $session = session();
        $model = new Admin_model();
        $email = $this->request->getVar('email');
        $email_exists = $model->where('user_email', $email)->first();
        $id = $email_exists ? $email_exists['user_id'] : false;
        if ($email_exists) {
            // Generate a unique token for password reset
            $token = bin2hex(random_bytes(32));

            helper(['form']);

            //set rules validation form
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
            ];

            if ($this->validate($rules)) {


                $data = [
                    'email' => $email,
                    'resetToken' => $token
                ];
                $model->update($id, $data);
            } else {
                $data['validation'] = $this->validator;
            }

            // Send an email to the user with the password reset link
            $reset_link = site_url('admin/reset_password/token/' . $token);
            $this->sendResetEmail($email, $reset_link);
            // Display a success message
            $session->setFlashdata('success', 'A reset link has been sent. Please check your email.');
        } else {
            $session->setFlashdata('failed', 'Error on resetting password.');
        }
        return redirect()->to('/admin/login');
    }

    private function sendResetEmail($email, $link)
    {

        $set_from = 'davevincentoporto@gmail.com';
        $set_to = $email;
        $body = "Here's your password reset link<br/>";
        $body .= $link;
        $email = \Config\Services::email();
        $email->setFrom($set_from, 'inquiry@byte.com');
        $email->setTo($set_to);
        $email->setSubject('Password reset link');
        $email->setMessage($body);

        if ($email->send()) {
            print('Email sent successfully.');
        } else {
            $error = $email->printDebugger(['headers']);
            print_r($error);
        }
    }

    public function reset_form($token)
    {

        $data['token'] = $token;
        echo view('admin/reset_form', $data);
    }

    public function reset()
    {
        $session = session();
        $model = new Admin_model();
        $token = $this->request->getVar('token');
        $reset_token_exists = $model->where('resetToken', $token)->first();
        $id = $reset_token_exists ? $reset_token_exists['user_id'] : false;

        if ($reset_token_exists) {
            helper(['form']);

            //set rules validation form
            $rules = [
                'password' => 'required|min_length[6]|max_length[200]',
                'c_password' => 'matches[password]'
            ];

            if ($this->validate($rules)) {
                $model = new Admin_model();
                $data = [
                    'user_pass' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
                ];
                $model->update($id, $data);
                $session->setFlashdata('success', 'Password has been reset!');
            } else {

                $data['validation'] = $this->validator;
                $session->setFlashdata('failed', 'Password reset failed.');
            }
        } else {
            $session->setFlashdata('no_token', 'Something wrong with user token.');
        }
        return redirect()->to('/admin/login');
    }
	//--------------------------------------------------------------------
}
