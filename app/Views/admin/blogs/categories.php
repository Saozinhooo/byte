<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <h2>Categories</h2>
            </div>
        </div>
          <hr />
          <?php if(session()->getFlashdata('package')):?>
            <div class="alert alert-success"><?= session()->getFlashdata('package') ?></div>
          <?php endif;?>
          <?php if(session()->getFlashdata('update')):?>
            <div class="alert alert-success"><?= session()->getFlashdata('update') ?></div>
          <?php endif;?>
          <div class="row">
            <div class="col-md-6 mx-auto">
              <h5>Add New Category</h5>
              <form class="" action="<?= site_url('admin/post/insert_category_a') ?>" method="post">
                <div class="mb-3">
                  <label for="category_name" class="form-label">Name</label>
                  <input class="form-control rounded w-50" type="text" id="category_n" name="category_name">
                </div>
                <div class="">
                  <button class="btn btn-primary btn-sm" type="submit" name="add">Add new category</button>
                  <input type="hidden" name="user_id" value="<?= session()->user_id; ?>">
                </div>
              </form>
            </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-3">
                    <select class="form-select form-select-sm" id="cat_opt">
                      <option selected>Action</option>
                      <option value="delete">Delete</option>
                    </select>
                  </div>
                  <div class="col-md-8 mb-2">
                    <button class="btn btn-outline-light text-dark btn-sm" type="button" name="button" id="apply-btn">Apply</button>
                  </div>
                </div>
                <table class="table table-hover table-bordered">
                 <thead class="table-dark">
                   <tr>
                     <th scope="col"><input type="checkbox" id="checkAll"></th>
                     <th scope="col">Name</th>
                     <th scope="col">Description</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php if($categories): ?>
                   <?php foreach($categories as $category): ?>
                   <tr>
                     <td><input type="checkbox" id="category_<?= $category['id'] ?>" name="selector[]" value="<?= $category['id'] ?>" class="action-chkbox"></td>
                     <td><?= $category['name'] ?></td>
                     <td><?= $category['name'] ?></td>
                   </tr>
                 <?php endforeach; ?>
                 <?php endif; ?>
                 </tbody>
               </table>
               <div class="pagination mt-4">
                 <?php if ( ! empty($pager)) :
                     //echo $pager->simpleLinks('group1', 'bs_simple');
                     echo $pager->links('categories', 'myPager');
                 endif ?>
               </div>
              </div>
          </div>
    </div>
</div>
