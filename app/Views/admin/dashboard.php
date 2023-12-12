<!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                <h2>ADMIN DASHBOARD</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="alert alert-info">
                        <strong>Welcome <?= session()->fname_admin; ?>! </strong>
                    </div>
                </div>
                </div>
            <!-- /. ROW  -->
                        <div class="row text-center pad-top">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="/admin/packages" >
<i class="fa fa-calendar fa-5x"></i>
                <h4>Packages</h4>
                </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="admin/comments/package" >
<i class="fa fa-comment fa-5x"></i>
                <h4>Comments</h4>
                </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="/admin/guest_list" >
                    <i class="fa fa-users fa-5x"></i>
                <h4>See Guests</h4>
                </a>
                </div>
            </div>
        </div>


            <div class="row text-center pad-top">

                <?php if(session()->user_type_admin == 1): ?>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="admin/register" >
                        <i class="fa fa-user fa-5x"></i>
                    <h4>Register User</h4>
                    </a>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="admin/transaction_history" >
                        <i class="fa fa-user fa-5x"></i>
                    <h4>Transactions</h4>
                    </a>
                    </div>
                </div>
                <?php if(session()->user_type_admin == 1): ?>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="/admin/admin_list" >
                        <i class="fa fa-user fa-5x"></i>
                    <h4>Admin List</h4>
                    </a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
    <div class="row">
                <div class="col-lg-12 ">
    <br/>
                </div>
                </div>
            <!-- /. ROW  -->
</div>
        <!-- /. PAGE INNER  -->
        </div>
