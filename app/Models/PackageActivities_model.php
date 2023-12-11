<?php

namespace App\Models;

use CodeIgniter\Model;

class PackageActivities_model extends Model
{
    protected $table = 'package_activities';
    protected $primaryKey = 'id';
    protected $allowedFields = ['activity_id', 'package_id', 'created_at', 'updated_at'];


}
