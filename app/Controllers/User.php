<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer_model;
use App\Models\Payment_model;
use App\Models\Package_model;

class User extends BaseController
{


    public function index($userid){


        $customer_model = new Customer_model();
        $payment_model = new Payment_model();
        $package_model = new Package_model();

        $packageDetails = $payment_model->where('customer_id', $userid)->find();
        $packageData = array();
        foreach($packageDetails as $package){
            array_push($packageData, json_decode($package['packageDetails']));
        }
        foreach($packageData as $package){
            foreach($package as $row){
                $packageDetails = $package_model->where('id',$row[0])->find();
            }
        }
        var_dump($packageDetails);

        $data = [
            
            'user' =>  $customer_model->where('id', $userid)->find(),
            'packageData' => $packageDetails

        ];


        echo view('user/profile', $data);

    }



	//--------------------------------------------------------------------

}
