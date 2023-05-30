<?php

namespace App\Models;

use CodeIgniter\Model;

class Post_model extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $allowedFields = ['category', 'user_id','title','slug','body','post_image','created_at','visibility','updated'];

    public function getPost($slug = false){

      if ($slug === false){
        return $this->findAll();
      }
        return $this->asArray()
                ->where(['slug' => $slug])
                ->first();
    }
}
