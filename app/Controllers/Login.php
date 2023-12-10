<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer_model;

class Login extends BaseController
{

    public function index()
    {

        // User type = user
        $session = session();
        $is_user = $session->is_user;

        if ($is_user) {
            return redirect()->to('/');
        } else {
            $this->logout();
        }
    }

    public function login()
    {

        echo view('login/login');
    }

    public function auth()
    {

        $session = session();
        $model = new Customer_model();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();

        if ($data) {

            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {

                $ses_data = [
                    'id' => $data['id'],
                    'fname' => $data['fname'],
                    'lname' => $data['lname'],
                    'email' => $data['email'],
                    'logged_in' => TRUE,
                    'is_user' => TRUE
                ];

                $session->set($ses_data);

                return redirect()->to('/');
            } else {

                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('login/login');
            }
        } else {

            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('login/login');
        }
    }


    public function register()
    {

        echo view('login/register');
    }

    public function save()
    {
        $session = session();
        helper(['form']);

        //set rules validation form
        $rules = [
            'fname' => 'required|min_length[3]|max_length[20]',
            'lname' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[customer_login.email]',
            'password' => 'required|min_length[6]|max_length[200]',
            'confirm' => 'matches[password]'
        ];

        if ($this->validate($rules)) {

            $model = new Customer_model();

            $data = [
                'email' => $this->request->getVar('email'),
                'fname' => $this->request->getVar('fname'),
                'lname' => $this->request->getVar('lname'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $model->save($data);
            $session->setFlashdata('success', 'You have been registered!');
            return redirect()->to('/login');
        } else {

            $data['validation'] = $this->validator;
            echo view('login/register', $data);
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    public function reset_page()
    {
        echo view('login/reset_page');
    }

    public function password_reset()
    {
        $session = session();
        $model = new Customer_model();
        $email = $this->request->getVar('email');
        $email_exists = $model->where('email', $email)->first();
        $id = $email_exists ? $email_exists['id'] : false;
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
            $reset_link = site_url('reset_password/token/' . $token);
            $this->sendResetEmail($email, $reset_link);
            // Display a success message
            $session->setFlashdata('success', 'A reset link has been sent. Please check your email.');
        } else {
            $session->setFlashdata('failed', 'Error on resetting password.');
        }
        return redirect()->to('/login');
    }

    private function sendResetEmail($email, $link)
    {

        $set_from = 'davevincentoporto@gmail.com';
        $set_to = $email;
        $body = "Here's your password reset link<br/>";
        $body .= $link;
        $email = \Config\Services::email();
        $email->setFrom($set_from, 'inquiry@byte.com');
        $email->setTo($set_to);    //receiver
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
        echo view('login/reset_form', $data);
    }

    public function reset()
    {
        $session = session();
        $model = new Customer_model();
        $token = $this->request->getVar('token');
        $reset_token_exists = $model->where('resetToken', $token)->first();
        $id = $reset_token_exists['id'];

        if ($reset_token_exists) {
            helper(['form']);

            //set rules validation form
            $rules = [
                'password' => 'required|min_length[6]|max_length[200]',
                'c_password' => 'matches[password]'
            ];

            if ($this->validate($rules)) {

                $model = new Customer_model();

                $data = [
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
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
        return redirect()->to('/login');
    }
}
