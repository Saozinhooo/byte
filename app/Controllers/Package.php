<?php

namespace App\Controllers;

use App\Models\Package_model;
use App\Models\Post_model;
use App\Models\Comment_package_model;

class Package extends BaseController
{
	public function index(){

		$packagemodel = new Package_model();
		helper('text');
		$data = [

			'packages' => $packagemodel->orderBy('id', 'DESC')->paginate(10,'package_overview'),
      		'currentPage' => $packagemodel->pager->getCurrentPage('package_overview'), // The current page number
      		'totalPages'  => $packagemodel->pager->getPageCount('package_overview'),   // The total page count
      		'pager' => $packagemodel->pager


		];

		$data['title'] = "Packages";

		echo view('packages/templates/header', $data);
		echo view('packages/index', $data);
		echo view('packages/templates/footer');
	}

	public function view($slug = NULL){
	$packagemodel = new Package_model();
	$commentmodel = new Comment_package_model();


	$data = [


		'packages' => $packagemodel->getPackage($slug),
		'related' => $packagemodel->orderBy('id', 'RANDOM')->limit(4)->find(),
		'comments' => $commentmodel->orderBy('id', 'DESC')->where('pending', false)->find(),
	];

	if (empty($data['packages']))
	{
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the post: '. $slug);
	}

	$data['title'] = $data['packages']['title'];

	echo view('packages/templates/header', $data);
	echo view('packages/view', $data);
	echo view('packages/templates/footer');
}

function acceptComment(){
	helper('url');

	$comment_model = new Comment_package_model();
	$link = $this->request->getPost('slug');
	$pending = true;
	$data = [

		'email' => $this->request->getPost('cmnt_email'),
		'name' => $this->request->getPost('cmnt_name'),
		'body' => $this->request->getPost('cmnt'),
		'package_id' => $this->request->getPost('package_id'),
		'pending' => $pending

	];

	$comment_model->insert($data);

	return redirect()->to(previous_url());
}



	//--------------------------------------------------------------------

}
