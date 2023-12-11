<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Package_model;
use App\Models\Image_model;
use App\Models\Activities_model;
use App\Models\PackageActivities_model;

class Packages extends BaseController{

  function index(){

    $packagemodel = new Package_model();
		$data = [
            'packages' => $packagemodel->join('admin_login', 'packages.user_id = admin_login.user_id', 'left')->orderBy('id', 'DESC')->paginate(5,'group1'),
            'currentPage' => $packagemodel->pager->getCurrentPage('group1'), // The current page number
            'totalPages'  => $packagemodel->pager->getPageCount('group1'),   // The total page count
            'pager' => $packagemodel->pager
        ];
    echo view('admin/templates/header');
    echo view('admin/packages', $data);
    echo view('admin/templates/footer');
  }

  function active_packages(){

    $packagemodel = new Package_model();
    $data = [
            'packages' => $packagemodel->join('admin_login', 'admin_login.user_id = packages.user_id')->orderBy('id', 'DESC')->paginate(5,'group1'),
            'currentPage' => $packagemodel->pager->getCurrentPage('group1'), // The current page number
            'totalPages'  => $packagemodel->pager->getPageCount('group1'),   // The total page count
            'pager' => $packagemodel->pager
        ];
    echo view('admin/templates/header');
    echo view('admin/packages/active_packages', $data);
    echo view('admin/templates/footer');
  }

  public function add_package(){

    $imagemodel = new Image_model();
    $activitymodel = new Activities_model();
    $data = [
      'images' => $imagemodel->orderBy('id','DESC')->findAll(),
      'activities' => $activitymodel->orderBy('act_id','DESC')->where('is_available', 1)->findAll(),
    ];

    echo view("admin/templates/header");
    echo view("admin/packages/add_package", $data);
    echo view("admin/templates/footer");
  }

  public function edit_package($id = NULL){

    $packagemodel = new Package_model();
    $imagemodel = new Image_model();
    $data = [
      'images' => $imagemodel->orderBy('id','DESC')->findAll(),
      'package' => $packagemodel->where('id', $id)->first()
    ];

    echo view("admin/templates/header");
    echo view("admin/packages/edit_package",$data);
    echo view("admin/templates/footer");
  }

  public function insert_package(){

    $session = session();
    $packagemodel = new Package_model();
    $package_activities_model = new PackageActivities_model();
    $created = date('Y/m/d H:i:s',time());
		$title = $this->request->getVar('package_title');
		$slug = $this->fixForUri($title);
    $featuredStatus = $this->request->getVar('featured');
    $activities = $this->request->getPost('activity');
    $act = implode(",", $activities);

		if($featuredStatus == "featured"){

			$featured = 1;

		}else{

			$featured = 0;

		}

		if($img = $this->request->getPost('ft_img')){

				$data = [
								'title' => $this->request->getVar('package_title'),
								'body'  => $this->request->getVar('ckeditor1'),
                'price'  => $this->request->getVar('price'),
								'visibility' => $this->request->getVar('visibility'),
                'status' => $this->request->getVar('status'),
							 	'slug' => $slug,
							 	'package_img' => $img,
								'user_id' => $this->request->getVar('user_id'),
                'created' => $created,
                'featured' => $featured,
				];

			}else{
				$data = [
                'title' => $this->request->getVar('package_title'),
                'body'  => $this->request->getVar('ckeditor1'),
                'price'  => $this->request->getVar('price'),
                'visibility' => $this->request->getVar('visibility'),
                'status' => $this->request->getVar('status'),
                'slug' => $slug,
                'user_id' => $this->request->getVar('user_id'),
                'created' => $created,
                'featured' => $featured,
								'package_img' => "no_img.png"
				];
			}

    $session->setFlashdata('package', 'Package added!');
		$new_package = $packagemodel->insert($data);
    if (!empty($activities)) {
      foreach ($activities as $activity) {
        $activity_data = [
          'activity_id' => $activity,
          'package_id' => $new_package
        ];
        $package_activities_model->insert($activity_data);
      }
  }
		return redirect()->to('/admin/packages');
  }

  function update_package(){

    $session = session();
    $packagemodel = new Package_model();
    $updated = date('Y/m/d H:i:s',time());
		$title = $this->request->getVar('package_title');
		$slug = $this->fixForUri($title);
    $id = $this->request->getVar('package_id');
    $featuredStatus = $this->request->getVar('featured');
		if($featuredStatus == "featured"){

			$featured = 1;

		}else{

			$featured = 0;

		}

		if($img = $this->request->getPost('update_ft_img')){

				$data = [
								'title' => $this->request->getVar('package_title'),
								'body'  => $this->request->getVar('ckeditor1'),
                'price'  => $this->request->getVar('price'),
								'visibility' => $this->request->getVar('visibility'),
                'status' => $this->request->getVar('status'),
							 	'slug' => $slug,
                'updated' => $updated,
							 	'package_img' => $img,
                'featured' => $featured,
				];

			}else{
				$data = [
                'title' => $this->request->getVar('package_title'),
                'body'  => $this->request->getVar('ckeditor1'),
                'visibility' => $this->request->getVar('visibility'),
                'status' => $this->request->getVar('status'),
                'slug' => $slug,
                'updated' => $updated,
                'featured' => $featured,
								'package_img' => "no_img.png"
				];
			}

		$packagemodel->update($id,$data);

    $session->setFlashdata('update', 'Package updated!');

		return redirect()->to('/admin/packages');

  }

  public function delete_package($id = null){

		$packagemodel = new Package_model();

		$data['packages'] = $packagemodel->where('id', $id)->delete($id);

    return $this->response->redirect(site_url('admin/packages'));
	}

  function fixForUri($string){

	$slug = trim($string); // trim the string
	$slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug ); // only take alphanumerical characters, but keep the spaces and dashes too...
	$slug= str_replace(' ','-', $slug); // replace spaces by dashes
	$slug= strtolower($slug);  // make it lowercase

	return $slug;
	}

  function activities(){

      $activitymodel = new Activities_model();
      $data = [
        'activities' => $activitymodel
        ->orderBy('act_id', 'DESC')
        ->paginate(20, 'activities'),
        'pager' => $activitymodel->pager,
        'currentPage' => $activitymodel->pager->getCurrentPage('activities'), // The current page number
        'totalPages'  => $activitymodel->pager->getPageCount('activities'),   // The total page count
      ];

      echo view("admin/templates/header");
      echo view("admin/packages/activities", $data);
      echo view("admin/templates/footer");
  }

  function insert_activity(){

    $activitymodel = new Activities_model();
    $created = date('Y/m/d H:i:s',time());

		$data = [
      'activity_name' => $this->request->getVar('act_name'),
      'price' => $this->request->getVar('activity_price'),
      'user_id' => $this->request->getVar('user_id'),
      'created' => $created
    ];
		$activitymodel->insert($data);

    return redirect()->to('/admin/packages/activities');
  }

  function activity_status(){

    $activitymodel = new Activities_model();
    $status = $this->request->getPost('option');
    $act_id = $this->request->getPost('action_data');

    if($status == "unavailable"){

      $data['is_available'] = false;

    }elseif($status == "available"){

      $data['is_available'] = true;

    }elseif($status == "delete"){

      foreach($act_id as $id){

        $activitymodel->delete($id);
      }

      echo "deleted";
      exit();
    }


    foreach($act_id as $id){

      $activitymodel->update($id,$data);
    }

    echo "updated";

  }

  function delete_activity(){

    $activitymodel = new Activities_model();
    $option = $this->request->getPost('option');
    $act_id = $this->request->getPost('action_data');

    if($option == "delete"){

      foreach($act_id as $id){
        $activitymodel->delete($id);
      }

    }

    echo "deleted";

  }

  public function create_package_activity() {



  }
}
