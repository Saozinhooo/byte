<?php
namespace App\Models;
use CodeIgniter\Model;

class Package_model extends Model
{
    protected $table = 'packages';

    protected $primaryKey = 'id';

    protected $allowedFields = [
      'title',
      'body',
      'slug',
      'category',
      'package_img',
      'created',
      'user_id',
      'status',
      'visibility',
      'price',
      'updated',
      'featured',
      'activity'

    ];

    public function getPackage($slug = false){

      if ($slug === false){
        return $this->findAll();
      }

        return $this->asArray()
                ->where(['slug' => $slug])
                ->first();
    }


}
