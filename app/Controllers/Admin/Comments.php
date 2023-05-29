<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\Comment_model;
use App\Models\Comment_package_model;

class Comments extends BaseController{

  function Blog(){

    $commentmodel = new Comment_model();

    $data = [

      'comments' => $commentmodel->select("posts.id, posts.title, blog_comments.*")->join('posts', 'posts.id = blog_comments.post_id')->orderBy('blog_comments.id', 'DESC')->paginate(10,'comments'),
      'currentPage' => $commentmodel->pager->getCurrentPage('comments'), // The current page number
      'totalPages'  => $commentmodel->pager->getPageCount('comments'),   // The total page count
      'pager' => $commentmodel->pager

    ];




  echo view('admin/templates/header');
  echo view('admin/comments', $data);
  echo view('admin/templates/footer');
}

function Package(){

  $commentmodel = new Comment_package_model();

  $data = [

    'comments' => $commentmodel->select("packages.id, packages.title, package_comments.*")->join('packages', 'package_comments.package_id = packages.id')->orderBy('package_comments.id', 'DESC')->paginate(10,'package_comments'),
    'currentPage' => $commentmodel->pager->getCurrentPage('package_comments'), // The current page number
    'totalPages'  => $commentmodel->pager->getPageCount('package_comments'),   // The total page count
    'pager' => $commentmodel->pager

  ];


echo view('admin/templates/header');
echo view('admin/package_comments', $data);
echo view('admin/templates/footer');
}

public function changeCommentStatus(){



  $comment_model = new Comment_model();
  $email = \Config\Services::email();

  $email->setFrom('dave@gmail.com', 'Travel and Tours');
  $email->setSubject('Comment Posted');
	$body = "You're comment has been posted!";
	$email->setMessage($body);


  $status = $this->request->getPost('option');
  $comment_id = $this->request->getPost('action_data');
  $commenterEmails = $this->request->getPost('emails');

  if($status == "public"){

    $data['pending'] = false;
    foreach($commenterEmails as $commenterEmail){
      $emails[] = $commenterEmail;

    }
    $sendTo = implode(",", $emails);
    $email->setTo($sendTo);

  }elseif($status == "private"){

    $data['pending'] = true;

  }


  foreach($comment_id as $id){

    $comment_model->update($id,$data);

  }
  $email->send();
  echo "updated";
}



function changePackageCommentStatus(){

  $comment_model = new Comment_package_model();
  $email = \Config\Services::email();

  $email->setFrom('dave@gmail.com', 'Travel and Tours');
  $email->setSubject('Comment Posted');
  $body = "You're comment has been posted!";
  $email->setMessage($body);


  $status = $this->request->getPost('option');
  $comment_id = $this->request->getPost('action_data');
  $commenterEmails = $this->request->getPost('emails');

  if($status == "public"){

    $data['pending'] = false;
    foreach($commenterEmails as $commenterEmail){
      $emails[] = $commenterEmail;

    }
    $sendTo = implode(",", $emails);
    $email->setTo($sendTo);

  }elseif($status == "private"){

    $data['pending'] = true;

  }


  foreach($comment_id as $id){

    $comment_model->update($id,$data);

  }
  $email->send();
  echo "updated";


}







}
