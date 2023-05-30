<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController{

  function index(){
    echo view('admin/templates/header');
    echo view('admin/dashboard');
    echo view('admin/templates/footer');
  }
}
