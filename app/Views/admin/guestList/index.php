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
              <table id="GuestList" class="table table-hover table-dark" style="width: 100%; padding-top: 10px;">
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
                        <tr class="hidden_action_hover_btn">
                            <td><?= $packages['transaction_id'] ?></td>
                            <td><?= ucwords($packages['customer_name']) ?></td>
                            <td><?= $package_info[1] ?></td>
                            <td>
                                <span class="checkin_date"><?= $packages['checkin_date'] ?></span>
                                <div class="hidden_action_btn">
                                    <button type="button" class="btn btn-outline-light edit-btn"><i class="fas fa-edit"></i></button>
                                    <input type="hidden" id="payment_id" name="payment_id" value="<?= $packages['payment_id'] ?>">
                                </div>
                            </td>
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

