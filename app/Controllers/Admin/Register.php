<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin_model;

class Register extends Controller
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('admin/register', $data);
    }

    public function save()
    {
        $session = session();
        helper(['form']);
        //set rules validation form
        $rules = [
            'fname' => 'required|min_length[3]|max_length[20]',
            'lname' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[admin_login.user_email]',
            'password' => 'required|min_length[6]|max_length[200]',
            'confirm' => 'matches[password]'
        ];

        if($this->validate($rules)){

            $model = new Admin_model();
            $data = [
                'user_email' => $this->request->getVar('email'),
                'fname' => $this->request->getVar('fname'),
                'lname' => $this->request->getVar('lname'),
                'user_pass' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            $session->setFlashdata('success', 'You have been registered!');
            return redirect()->to('/admin');
        }else{
            $data['validation'] = $this->validator;
            echo view('admin/register', $data);
        }

    }

}
