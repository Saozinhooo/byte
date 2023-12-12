<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Customer_model;
use App\Models\Payment_model;

class Transaction extends BaseController
{

  function index()
  {

    $customer_model = new Customer_model();
    $payment_model = new Payment_model();
    $packageDetails = array();
    $packageDetails = $payment_model->find();
    foreach ($packageDetails as $i => $package) {

      array_push($packageDetails[$i], json_decode($package['packageDetails'], TRUE));
    }
    foreach ($packageDetails as $i => $packages) {
      unset($packageDetails[$i][0]['activities']);
    }

    $data = [

      'packageData' => $packageDetails,

    ];

    echo view('admin/templates/header');
    echo view('admin/transaction_history/index', $data);
    echo view('admin/templates/footer');
  }

  public function edit_checkin_date()
  {
      $newDate = $this->request->getPost('newDate');
      $payment_id = $this->request->getPost('payment_id');
      $payment_model = new Payment_model();
      $payment_model->set('checkin_date', $newDate)
      ->where('payment_id', $payment_id)
      ->update();
      
      return $this->response->setJSON(['message' => 'Check-in date updated successfully']);
  }
}
