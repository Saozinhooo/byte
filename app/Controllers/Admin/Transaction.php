<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Customer_model;
use App\Models\Payment_model;

class Transaction extends BaseController{

  function index(){

    $customer_model = new Customer_model();
    $payment_model = new Payment_model();
    $packageDetails = array();
    $packageDetails = $payment_model->find();
    foreach($packageDetails as $i => $package){

        // $packageDetails[$i]['packageInfo'] = json_decode($package['packageDetails']);
        array_push($packageDetails[$i], json_decode($package['packageDetails']));
    }

    $data = [

      'packageData' => $packageDetails,

    ];




    echo view('admin/templates/header');
    echo view('admin/transaction_history/index', $data);
    echo view('admin/templates/footer');


  }







}
