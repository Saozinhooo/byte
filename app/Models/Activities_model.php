<?php

namespace App\Models;

use App\Models\Package_model;

use CodeIgniter\Model;

class Activities_model extends Model
{
    protected $table = 'activities';
    protected $primaryKey = 'act_id';
    protected $allowedFields = ['activity_name', 'is_available', 'created', 'price', 'package_id'];

    public function package() {
        return $this->belongsTo('App\Models\Package_model', 'id');
    }


}
