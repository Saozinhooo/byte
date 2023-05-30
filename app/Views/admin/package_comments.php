<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
            <h2>Package Comments</h2>
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
              <select class="form-select form-select-sm" id="packagecomment_opt">
                <option selected>Action</option>
                <option value="public">Post</option>
                <option value="private">Hide</option>
              </select>
            </div>
            <div class="col-md-8 mb-2">
              <button class="btn btn-outline-light text-dark btn-sm" type="button" name="button" id="apply-btn-packagecomment">Apply</button>
            </div>
              <div class="col-md-12">
                <table class="table table-hover table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th scope="col"><input type="checkbox" id="checkAllPackageComments"></th>
                    <th scope="col">Package title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Email</th>
                    <th scope="col">Body</th>
                    <th scope="col">Date Posted</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($comments): ?>
                  <?php foreach($comments as $comment): ?>
                  <tr>
                    <td><input type="checkbox" id="packagecomment_<?= $comment['id']; ?>" name="selector[]" value="<?= $comment['id']; ?>" data-email="<?= $comment['email']; ?>" class="status_packagecomment_checkbox"></td>
                    <td><?php echo $comment['title']; ?></td>
                    <td><?php echo $comment['name']; ?></td>
                    <td><?php echo $comment['email']; ?></td>
                    <td><?php echo $comment['body']; ?></td>
                    <td><?php echo $comment['created']; ?></td>
                    <td><?php if( $comment['pending'] == true){
                        echo "Pending";

                    }elseif($comment['pending'] == false){

                          echo "Posted";
                        }
                      ?></td>
                  </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
              </table>
              <div class="pagination mt-4">
                <?php if (!empty($pager)) :
                  echo $pager->links('package_comments', 'myPager');
                endif ?>
            </div>
              </div>
          </div>
    </div>
</div>
