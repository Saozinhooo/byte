<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <h2>Posts <a class="btn btn-light add-new-btn" href="post/add_post">Add New</a></h2>
            </div>
        </div>
          <hr />
          <?php if(session()->getFlashdata('post')):?>
            <div class="alert alert-success"><?= session()->getFlashdata('post') ?></div>
          <?php endif;?>
          <?php if(session()->getFlashdata('update')):?>
            <div class="alert alert-success"><?= session()->getFlashdata('update') ?></div>
          <?php endif;?>
          <div class="row">
              <div class="col-md-12">
                <table class="table table-hover table-bordered">
                 <thead class="table-dark">
                   <tr>
                     <th scope="col">No.</th>
                     <th scope="col">First Name</th>
                     <th scope="col">Last Name</th>
                     <th scope="col">Email</th>
                     <th scope="col">Actions</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php if($comments): ?>
                   <?php foreach($comments as $comment): ?>
                   <tr>
                     <td><?php echo $comment['title']; ?></td>
                     <td><?php echo $comment['name']; ?></td>
                     <td><?php echo $comment['email']; ?></td>
                     <td>
                      <a href="post/edit_post/<?= $comment['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                      <a href="post/delete_post/<?= $comment['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                   </tr>
                 <?php endforeach; ?>
                 <?php endif; ?>
                 </tbody>
               </table>
               <div class="pagination mt-4">
                 <?php if (!empty($pager)) :
                   echo $pager->links('comments', 'myPager');
                 endif ?>
               </div>
              </div>
          </div>
    </div>
</div>
