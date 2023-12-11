<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Admin List</h2>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <table id="admin_list" class="table table-hover table-dark" style="width: 100%;">
                    <thead class="pt-5">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($admin_list as $i => $admin): ?>
                        <tr class="hidden_action_hover_btn">
                            <td><?= $admin['user_id'] ?></td>
                            <td><?= $admin['fname'].' '.$admin['lname'] ?></td>
                            <td><?= $admin['user_email'] ?></td>
                            <td>
                                <?php if ($admin['is_Active']): ?>
                                    Active
                                <?php else: ?>
                                    Inactive
                                <?php endif ?>
                                <div class="hidden_action_btn" >
                                <?php if ($admin['is_Active']): ?>
                                    <!-- <a href="#" class="text-decoration-none text-white"><i class="far fa-edit"></i> </a> -->
                                    <a href="/admin/admin_list/delete/<?= $admin['user_id'] ?>" class="text-decoration-none text-white"><i class="far fa-trash-alt"></i></a>
                                <?php else: ?>
                                    <a href="/admin/admin_list/reactivate/<?= $admin['user_id'] ?>" class="text-decoration-none text-white"><i class="fas fa-check"></i></a>
                                <?php endif ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>