<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <h2>Activities</h2>
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
              <h5>Add New Activity</h5>
              <form class="" action="<?= site_url('admin/packages/insert_activity') ?>" method="post">
                <div class="mb-3">
                  <label for="category_name" class="form-label">Name</label>
                  <input class="form-control rounded w-50" type="text" id="category_n" name="act_name">
                </div>
                <div class="">
                  <button class="btn btn-primary btn-sm" type="submit" name="add">Add new activity</button>
                  <input type="hidden" name="user_id" value="<?= session()->user_id; ?>">
                </div>
              </form>
            </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-3">
                    <select class="form-select form-select-sm" id="act_opt">
                      <option selected>Action</option>
                      <option value="delete">Delete</option>
                      <option value="available">Available</option>
                      <option value="unavailable">Unavailable</option>
                    </select>
                  </div>
                  <div class="col-md-8 mb-2">
                    <button class="btn btn-outline-light text-dark btn-sm" type="button" name="button" id="apply-act-btn">Apply</button>
                  </div>
                </div>
                <table class="table table-hover table-bordered">
                 <thead class="table-dark">
                   <tr>
                     <th scope="col"><input type="checkbox" id="checkAllAct"></th>
                     <th scope="col">Name</th>
                     <th scope="col">Description</th>
                     <th scope="col">Price</th>
                     <th scope="col">Status</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php if($activities): ?>
                   <?php foreach($activities as $activity): ?>
                   <tr>
                     <td><input type="checkbox" id="activity_<?= $activity['act_id'] ?>" name="selector[]" value="<?= $activity['act_id'] ?>" class="action-act-chkbox"></td>
                     <td><?= $activity['activity_name'] ?></td>
                     <td><?= $activity['activity_name'] ?></td>
                     <td><?= $activity['price'] ?></td>
                     <td><?php if($activity['is_available'] == false){
                       echo "Unavailable";
                     }elseif($activity['is_available'] == true){
                       echo "Available";
                     } ?></td>
                   </tr>
                 <?php endforeach; ?>
                 <?php endif; ?>
                 </tbody>
               </table>
               <div class="pagination mt-4">
                 <?php if ( ! empty($pager)) :
                     //echo $pager->simpleLinks('group1', 'bs_simple');
                     echo $pager->links('activities', 'myPager');
                 endif ?>
               </div>
              </div>
          </div>
    </div>
</div>
