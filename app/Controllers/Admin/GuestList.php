<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Customer_model;
use App\Models\Payment_model;
use App\Models\Package_model;

class GuestList extends BaseController{

  function index(){

    $customer_model = new Customer_model();
    $payment_model = new Payment_model();
    $package_model = new Package_model();
    $transactionHistory = array();
    $packageDetails2 = array();
    $packageDetails = $payment_model->orderBy('payment_id', 'desc')->find();
    foreach($packageDetails as $index => $package){
        $packageDetails[$index]['package_info'] = json_decode($package['packageDetails']);
        unset($packageDetails[$index]['package_info']->activities);
    }
    
    
    usort($packageDetails, function ($a, $b) {
      return $b['payment_id'] - $a['payment_id'];
    });

    $data = [

      'packageData' => $packageDetails,

    ];
    echo view('admin/templates/header');
    echo view('admin/guestList/index', $data);
    echo view('admin/templates/footer');

  }


}
