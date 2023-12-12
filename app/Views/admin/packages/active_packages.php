<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <h2>Active Packages <a class="btn btn-light add-new-btn" href="add_package">Add New</a></h2>
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
              <div class="col-md-12">
                <table class="table table-hover table-bordered">
                 <thead class="table-dark">
                   <tr>
                     <th scope="col">Title</th>
                     <th scope="col">Author</th>
                     <th scope="col">Price</th>
                     <th scope="col">Date</th>
                     <th scope="col">Status</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php if($packages): ?>
                   <?php foreach($packages as $package): ?>
                   <tr>
                     <td><?php echo $package['title']; ?></td>
                     <td><?= $package['fname']; ?></td>
                     <td><?php echo $package['price']; ?></td>
                     <td><?php echo $package['created']; ?></td>
                     <td class=""><?php if($package['status'] == "Available"){ ?><img src="<?php echo base_url('assets/sao/images/icons/avail.png'); ?>" style="width: 10%;">
                     <?php }elseif($package['status'] == "Unavailable"){
                       ?><img src="<?php echo base_url('assets/sao/images/icons/unavail.png'); ?>" style="width: 10%;"><?php
                     } ?></td>
                   </tr>
                 <?php endforeach; ?>
                 <?php endif; ?>
                 </tbody>
               </table>
               <div class="pagination mt-4">
                 <?php if ( ! empty($pager)) :
                     //echo $pager->simpleLinks('group1', 'bs_simple');
                     echo $pager->links('group1', 'myPager');
                 endif ?>
               </div>
              </div>
          </div>
    </div>
</div>
