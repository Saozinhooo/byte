<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer_model;

class User extends BaseController
{


    public function index($userid){


        $model = new Customer_model();

        $data = [
            
            'user' => $model->where('id', $userid)->find(),
        
        
        ];

        echo view('user/profile', $data);

    }



	//--------------------------------------------------------------------

}
