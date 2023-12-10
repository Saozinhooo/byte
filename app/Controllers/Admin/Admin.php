<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin_model;
use CodeIgniter\HTTP\RedirectResponse;

class Admin extends BaseController {

  function index() {

    echo view('admin/templates/header');
    echo view('admin/dashboard');
    echo view('admin/templates/footer');
  }

  function show_admin_list() {

    $admin_model = new Admin_model();
    $admin_data = $admin_model->orderBy('user_id', 'desc')->find();

    $data = [

      'admin_list' => $admin_data,

    ];

    echo view('admin/templates/header');
    echo view('admin/admin_list', $data);
    echo view('admin/templates/footer');
  }

  function delete_admin($id) {

    $admin_model = new Admin_model();
    $admin_model->softDelete($id);

    return redirect()->to(base_url('admin/admin_list'));

  }

  function reactivate_admin($id) {

    $admin_model = new Admin_model();
    $admin_model->reactivate($id);

    return redirect()->to(base_url('admin/admin_list'));

  }

}
