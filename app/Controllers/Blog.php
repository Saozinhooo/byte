<?php

namespace App\Controllers;

use App\Models\Package_model;
use App\Models\Post_model;
use App\Models\Comment_model;

class Blog extends BaseController
{
	public function index(){

		$postmodel = new Post_model();
		helper('text');
		$data = [

	'posts' => $postmodel->orderBy('id', 'DESC')->paginate(10,'blogs'),
      'currentPage' => $postmodel->pager->getCurrentPage('blogs'), // The current page number
      'totalPages'  => $postmodel->pager->getPageCount('blogs'),   // The total page count
      'pager' => $postmodel->pager


		];

		$data['title'] = "Blog";

		echo view('blog/templates/header', $data);
		echo view('blog/index', $data);
		echo view('blog/templates/footer');
	}

	public function view($slug = NULL){
	$postmodel = new Post_model();
	$commentmodel = new Comment_model();


	$data = [


		'posts' => $postmodel->getPost($slug),
		'related' => $postmodel->orderBy('id', 'RANDOM')->limit(4)->find(),
		'comments' => $commentmodel->orderBy('id', 'DESC')->where('pending', false)->find(),
	];

	if (empty($data['posts']))
	{
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the post: '. $slug);
	}

	$data['title'] = $data['posts']['title'];

	echo view('blog/templates/header', $data);
	echo view('blog/view', $data);
	echo view('blog/templates/footer');
}

function acceptComment(){
	helper('url');

	$comment_model = new Comment_model();
	$link = $this->request->getPost('slug');
	$pending = true;
	$data = [

		'email' => $this->request->getPost('cmnt_email'),
		'name' => $this->request->getPost('cmnt_name'),
		'body' => $this->request->getPost('cmnt'),
		'post_id' => $this->request->getPost('post_id'),
		'pending' => $pending

	];

	$comment_model->insert($data);

	return redirect()->to(previous_url());
}



	//--------------------------------------------------------------------

}
