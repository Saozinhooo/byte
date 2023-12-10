<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <h2>Guest List</h2>
            </div>
        </div>
          <hr />
          <div class="row">
              <div class="col-lg-12">
              <table id="GuestList" class="table table-hover table-dark" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Customer Name</th>
                            <th>Package Name</th>
                            <th>Check-in Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($packageData as $i => $packages): ?>
                        <?php foreach($packages['package_info'] as $package_info): ?>
                        <tr>
                            <td><?= $packages['transaction_id'] ?></td>
                            <td><?= ucwords($packages['customer_name']) ?></td>
                            <td><?= $package_info[1] ?></td>
                            <td><?= $packages['checkin_date'] ?></td>
                            <td><?php
                                    if($packages['checkin_date'] > date("Y-m-d")){
                                        echo "Incoming";
                                    }elseif($packages['checkin_date'] < date("Y-m-d")){
                                        echo "Done";
                                    }elseif($packages['checkin_date'] == date("Y-m-d")){
                                        echo "Active";
                                    }
                            ?></td>
                        </tr>
                        <?php endforeach ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
              </div>
          </div>
    </div>
</div>

