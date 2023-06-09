<?php

namespace App\Models;

use CodeIgniter\Model;

class Customer_model extends Model
{
    protected $table = 'customer_login';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'email', 'fname', 'lname', 'resetToken'];
}
