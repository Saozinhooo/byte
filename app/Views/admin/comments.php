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
            <div class="col-md-1">
              <select class="form-select form-select-sm" id="comment_opt">
                <option selected>Action</option>
                <option value="public">Post</option>
                <option value="private">Hide</option>
              </select>
            </div>
            <div class="col-md-8 mb-2">
              <button class="btn btn-outline-light text-dark btn-sm" type="button" name="button" id="apply-btn-comment">Apply</button>
            </div>
              <div class="col-md-12">
                <table class="table table-hover table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th scope="col"><input type="checkbox" id="checkAllComments"></th>
                    <th scope="col">Post title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Email</th>
                    <th scope="col">Body</th>
                    <th scope="col">Date Posted</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($comments): ?>
                  <?php foreach($comments as $comment): ?>

                  <tr>
                    <td><input type="checkbox" id="comment_<?= $comment['id']; ?>" name="selector[]" value="<?= $comment['id']; ?>" class="status_comment_checkbox" data-email="<?= $comment['email']; ?>">
                        <input type="hidden" id="emails" name="selector[]" value="<?= $comment['email']; ?>">
                    </td>
                    <td><?php echo $comment['title']; ?></td>
                    <td><?php echo $comment['name']; ?></td>
                    <td><?php echo $comment['email']; ?></td>
                    <td><?php echo $comment['body']; ?></td>
                    <td><?php echo $comment['created_at']; ?></td>
                    <td>

                    </td>
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

<div class="modal fade" id="sending_mail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
