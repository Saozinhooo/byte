<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer_model;
use App\Models\Payment_model;
use App\Models\Package_model;

class User extends BaseController
{

    public function index($userid)
    {

        $customer_model = new Customer_model();
        $payment_model = new Payment_model();
        $package_model = new Package_model();
        $transactionHistory = array();
        $packageDetails = $payment_model->where('customer_id', $userid)->find();
        $packageData = array();

        foreach ($packageDetails as $package) {
            array_push($packageData, json_decode($package['packageDetails']));
        }

        foreach ($packageData as $package) {
            foreach ($package as $row) {
                $row_data = json_decode(json_encode($row), true);
                $id = $row_data[0];
                array_push($transactionHistory, $package_model
                ->where('packages.id', $id)
                ->join('package_activities', 'package_activities.package_id = packages.id')
                ->join('activities', 'activities.act_id = package_activities.activity_id')
                ->orderBy('packages.id', 'desc')
                ->find());
            }
        }

        $data = [
            'user' =>  $customer_model->where('id', $userid)->find(),
            'packageData' => $transactionHistory
        ];

        echo view('user/profile', $data);
    }
}
