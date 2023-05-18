<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer_model;
use App\Models\Payment_model;

class User extends BaseController
{


    public function index($userid){


        $customer_model = new Customer_model();
        $payment_model = new Payment_model();

        $packageDetails = $payment_model->where('customer_id', $userid)->find();
        $packageData = array();
        foreach($packageDetails as $package){
            array_push($packageData, json_decode($package['packageDetails']));
        }

        $data = [
            
            'user' =>  $customer_model->where('id', $userid)->find(),
            'packageData' => $packageData

        ];


        echo view('user/profile', $data);

    }



	//--------------------------------------------------------------------

}
