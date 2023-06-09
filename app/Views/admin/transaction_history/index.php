<div id="page-wrapper">
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
                    <thead class="pt-5">
                        <tr>
                            <th scope="col">Package Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">PAX</th>
                            <th scope="col">Date Issued</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($packageData as $i => $packages) : ?>
                            <?php foreach ($packages[0] as $row) : ?>
                                <?php unset($packages[0]['activities']); ?>
                                <tr>
                                    <td class="align-middle"><?= $row[1] ?></td>
                                    <td class="align-middle">P<?= number_format(floatval($row[2]), 2, '.', ',') ?></td>
                                    <td class="align-middle"><?= ucwords($packages['customer_name']) ?></td>
                                    <td class="align-middle"><?= $packages['customer_email'] ?></td>
                                    <td class="align-middle"><?php if ($packages['status'] == "COMPLETED") {
                                                                    echo "Paid";
                                                                } ?></td>
                                    <td class="align-middle">
                                        <?php

                                        $names = explode(",", $packages['names_included']);
                                        foreach ($names as $name) {
                                            echo $name . "<br/>";
                                        }

                                        ?>
                                    </td>
                                    <td><?= date("Y-m-d", strtotime($packages['date_created']));
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