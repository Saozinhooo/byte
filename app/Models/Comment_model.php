<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment_model extends Model{
    protected $table = 'blog_comments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['post_id', 'name','email','body','created_at','pending'];
}
