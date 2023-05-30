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
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Visibility</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($posts): ?>
                  <?php foreach($posts as $post): ?>
                  <tr>
                    <td><?php echo $post['title']; ?></td>
                    <td><?= $post['fname']; ?></td>
                    <td><?php echo $post['created_at']; ?></td>
                    <td><?php echo $post['visibility']; ?></td>
                    <td>
                      <a href="post/edit_post/<?= $post['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                      <a href="post/delete_post/<?= $post['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                      /td>
                  </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
              </table>
              <div class="pagination mt-4">
                <?php if (!empty($pager)) :
                  echo $pager->links('posts', 'myPager');
                endif ?>
              </div>
              </div>
          </div>
    </div>
</div>
