<?php
namespace App\Models;
use CodeIgniter\Model;

class Image_model extends Model
{
    protected $table = 'images';

    protected $primaryKey = 'id';

    protected $allowedFields = ['image_name','date_uploaded'];
}
