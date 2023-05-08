<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Post_model;
use App\Models\Category_model;
use App\Models\Image_model;

class Post extends BaseController{

  function index(){
    $blogmodel = new Post_model();
		$data = [
            // 'packages' => $packagemodel->orderBy('id', 'DESC')->paginate(5),
            'posts' => $blogmodel->
            select('posts.*, admin_login.fname')->
            join('admin_login', 'admin_login.user_id = posts.user_id')->
            orderBy('posts.id', 'DESC')->
            paginate(20, 'posts'),
            'pager' => $blogmodel->pager,
            'currentPage' => $blogmodel->pager->getCurrentPage('posts'), // The current page number
            'totalPages'  => $blogmodel->pager->getPageCount('posts'),   // The total page count
        ];
    echo view('admin/templates/header');
    echo view('admin/blogs', $data);
    echo view('admin/templates/footer');
  }

  public function add_post(){

    $categorymodel = new Category_model();
    $imagemodel = new Image_model();
    $data = [
      'categories' => $categorymodel->orderBy('id', 'DESC')->findAll(),
      'images' => $imagemodel->orderBy('id','DESC')->findAll(),
    ];
    echo view("admin/templates/header");
    echo view("admin/blogs/add_post", $data);
    echo view("admin/templates/footer");
  }

  function categories(){
      $categorymodel = new Category_model();
      $data = [
        'categories' => $categorymodel->orderBy('id', 'DESC')->paginate(20, 'categories'),
        'pager' => $categorymodel->pager,
        'currentPage' => $categorymodel->pager->getCurrentPage('categories'), // The current page number
        'totalPages'  => $categorymodel->pager->getPageCount('categories'),   // The total page count
      ];
      echo view("admin/templates/header");
      echo view("admin/blogs/categories", $data);
      echo view("admin/templates/footer");
  }


  public function insert_category(){
		$categorymodel = new Category_model();
    $created = date('Y/m/d H:i:s',time());
		$data = [
      'name' => $this->request->getVar('category'),
      'user_id' => $this->request->getVar('user_id'),
      'created_at' => $created
    ];
		$categorymodel->insert($data);
    $categories = $categorymodel->find();
    if($categories){
      foreach($categories as $category){
        $html = '
        <input class="form-check-input" type="radio" value="'.$category['name'].'" name="category" id="category'.$category['id'].'">
        <label class="form-check-label" style="font-weight: 100;" for="category'.$category['id'].'">
            '.$category['name'].'
        </label>
        <br>
        ';
      }
      echo $html;
    }
	}

  function insert_category_a(){
    $categorymodel = new Category_model();
    $created = date('Y/m/d H:i:s',time());
		$data = [
      'name' => $this->request->getVar('category_name'),
      'user_id' => $this->request->getVar('user_id'),
      'created_at' => $created
    ];
		$categorymodel->insert($data);

    return redirect()->to('/admin/post/categories');
  }



  public function delete_category(){

		$categorymodel = new Category_model();
    $delete = $this->request->getPost('action_data');

    foreach($delete as $id){
      $categorymodel->where('id', $id)->delete($id);
    }

    echo "deleted";
	}

  public function edit_post($id = NULL){

    $blogmodel = new Post_model();
    $categorymodel = new Category_model();
    $imagemodel = new Image_model();

    $data['categories'] = $categorymodel->orderBy('id', 'DESC')->findAll();
    $data['post'] = $blogmodel->where('id', $id)->first();
    $data['images'] = $imagemodel->orderBy('id','DESC')->findAll();

    echo view("admin/templates/header");
    echo view("admin/blogs/edit_post",$data);
    echo view("admin/templates/footer");
  }

  function upload_img(){

    $blogmodel = new Post_model();
    if($img = $this->request->getFile('ft_img')){
			if($img->isValid() && ! $img->hasMoved()){

				$newName = $img->getRandomName();
				$img->move('./uploads/images/posts', $newName);

				$data['post_image'] = $newName;

        $blogmodel->insert($data);
			}
    }

  }


  public function insert_post(){

    $session = session();
    $blogmodel = new Post_model();
    $created = date('Y/m/d H:i:s',time());
		$title = $this->request->getVar('post_title');
		$slug = $this->fixForUri($title);
    if($img = $this->request->getVar('ft_img')){
      $data = [
              'title' => $this->request->getVar('post_title'),
              'body'  => $this->request->getVar('ckeditor1'),
              'category' => $this->request->getPost('category'),
              'visibility' => $this->request->getVar('visibility'),
              'slug' => $slug,
              'post_image' => $img,
              'user_id' => $this->request->getVar('user_id'),
              'created_at' => $created
      ];
    }else{
      $data = [
              'title' => $this->request->getVar('post_title'),
              'body'  => $this->request->getVar('ckeditor1'),
              'category' => $this->request->getPost('category'),
              'visibility' => $this->request->getVar('visibility'),
              'slug' => $slug,
              'user_id' => $this->request->getVar('user_id'),
              'created_at' => $created,
              'post_image' => "no_img.png"
      ];
    }

    $session->setFlashdata('post', 'Post added!');
		$blogmodel->insert($data);

		return redirect()->to('/admin/post');
  }

  function update_post(){


    $session = session();
    $blogmodel = new Post_model();
    $updated = date('Y/m/d H:i:s',time());
		$title = $this->request->getVar('post_title');
		$slug = $this->fixForUri($title);
    $id = $this->request->getVar('post_id');

    if($img = $this->request->getVar('update_ft_img')){
      $data = [
              'title' => $this->request->getVar('post_title'),
              'body'  => $this->request->getVar('ckeditor1'),
              'category' => $this->request->getPost('category'),
              'visibility' => $this->request->getVar('visibility'),
              'slug' => $slug,
              'post_image' => $img,
              'user_id' => $this->request->getVar('user_id'),
              'updated' => $updated
      ];
    }else{
      $data = [
              'title' => $this->request->getVar('post_title'),
              'body'  => $this->request->getVar('ckeditor1'),
              'category' => $this->request->getPost('category'),
              'visibility' => $this->request->getVar('visibility'),
              'slug' => $slug,
              'user_id' => $this->request->getVar('user_id'),
              'updated' => $updated,
              'post_image' => "no_img.png"
      ];
    }

		$blogmodel->update($id,$data);

    $session->setFlashdata('update', 'Post updated!');

		return redirect()->to('/admin/post');

  }

  public function delete_post($id = null){

		$blogmodel = new Post_model();

		$data['posts'] = $blogmodel->where('id', $id)->delete($id);

    return $this->response->redirect(site_url('admin/post'));
	}

  function fixForUri($string){

	$slug = trim($string); // trim the string
	$slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug ); // only take alphanumerical characters, but keep the spaces and dashes too...
	$slug= str_replace(' ','-', $slug); // replace spaces by dashes
	$slug= strtolower($slug);  // make it lowercase

	return $slug;
	}







}
