<?php
namespace App\Models;
use CodeIgniter\Model;

class Comment_package_model extends Model{
    protected $table = 'package_comments';

    protected $primaryKey = 'id';

    protected $allowedFields = ['package_id', 'name','email','body','created','pending', 'rating'];

}
