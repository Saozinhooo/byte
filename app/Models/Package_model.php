<?php

namespace App\Models;

use App\Models\Activities_model;

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
      'activity',
      'daily_limit'
    ];

    public function activities() {

        return $this->hasMany('App\Models\Activities_model', 'package_id');
    }
    public function getPackage($slug = false){

      if ($slug === false){
        return $this->findAll();
      }
        return $this->asArray()
                ->where(['slug' => $slug])
                ->first();
    }
}
