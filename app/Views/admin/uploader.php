<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Image_model;

class Uploader extends BaseController{

  function upload_img(){

    $imagemodel = new Image_model();
    if($img = $this->request->getFile('ft_img')){
			if($img->isValid() && ! $img->hasMoved()){

				$newName = $img->getRandomName();
				$img->move('./uploads/images', $newName);

				$data = [
          'image_name' => $newName

        ];

        $imagemodel->insert($data);
        echo $newName;
			}
    }
  }
}