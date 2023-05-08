<?php
namespace App\Models;
use CodeIgniter\Model;

class Activities_model extends Model
{
    protected $table = 'activities';

    protected $primaryKey = 'act_id';

    protected $allowedFields = ['activity_name', 'is_available', 'created'];
}
