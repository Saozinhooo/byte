<?php
namespace App\Models;
use CodeIgniter\Model;

class Category_model extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $allowedFields = ['user_id','name','created_at'];
}
