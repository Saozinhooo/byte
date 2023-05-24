<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <h2>Transaction History</h2>
            </div>
        </div>
          <hr />
          <div class="row">
              <div class="col-lg-12">
              <table id="TransactionHistory" class="table table-hover table-dark" style="width: 100%;">
                    <thead>
                        <tr>
                        <th scope="col">Package Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($packageData as $i =>$packages): ?>
                            <?php foreach($packages[0] as $row): ?>
                        <tr>
                            <td><?= $row[1] ?></td>
                            <td>P<?= number_format(floatval($row[2]), 2, '.', ',') ?></td>
                            <td><?= ucwords($packages['customer_name']) ?></td>
                            <td><?= $packages['customer_email'] ?></td>
                            <td><?php if($packages['status'] == "COMPLETED"){
                                echo "Paid";
                            } ?></td>
                        </tr>
                            <?php endforeach ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
              </div>
          </div>
    </div>
</div>
