<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model
{
    protected $table = 'admin_login';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_name','user_pass','lname','fname','user_email','user_type'];
}
