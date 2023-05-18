<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>T&T ADMIN</title>
	<!-- BOOTSTRAP STYLES-->
    <!-- <link href="<?php echo base_url('assets/admin-template/assets/css/bootstrap.css'); ?>" rel="stylesheet" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('assets/fa5/css/all.css'); ?>" rel="stylesheet" />
      <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('assets/admin-template/assets/css/custom.css'); ?>" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
   <link rel="stylesheet" href="<?php echo base_url('assets/dropzone/dist/dropzone.css'); ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/tabs.css'); ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>">
   <link rel="stylesheet" href="<?= base_url('assets/loader/loader.css'); ?>">
   <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/sb-1.4.2/datatables.min.css" rel="stylesheet"/>

</head>
<body>

  <div id="wrapper">
       <div class="navbar navbar-inverse navbar-fixed-top">
          <div class="adjust-nav" style="width: 100%;">
              <div class="navbar-header">

                  <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url('assets/sca/images/output-onlinepngtools.png'); ?>" style="width: 70px;" />
                  </a>
                  <span class="float-end me-5">
                    <div class="dropdown dropstart">
                      <button class="btn mt-2" type="button" id="user_menu" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="text-light fas fa-user" style="font-size: 40px;"></i>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="user_menu">
                        <li>
                          <a class="dropdown-item" href="#">
                            <?php echo session()->fname." ".session()->lname ; ?>
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">
                            <i class="border border-dark p-1 rounded-pill bg-light fas fa-cog"></i>
                            Settings
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="<?php echo site_url('admin/login/logout'); ?>">
                            <i class="border border-dark p-1 rounded-pill bg-light fas fa-sign-out-alt"></i>
                            Signout
                          </a>
                        </li>
                      </ul>
                    </div>


                  </span>

              </div>
          </div>
      </div>
      <!-- /. NAV TOP  -->
      <nav class="navbar-default navbar-side" role="navigation" id="dropdown">
          <div class="sidebar-collapse">
              <ul class="nav" id="main-menu">

                  <div class="row">
                    <div class="col-md-12">
                      <li class="nav-item side-link <?php if(uri_string() == "admin"){ echo "active-link"; } ?>">
                          <a class="nav-link" href="<?php echo site_url('admin'); ?>" ><i class="fa fa-desktop "></i> Dashboard <span class="badge"></span></a>
                      </li>
                    </div>
                    <div class="col-md-12">
                      <div class="dropdown dropend">
                        <a href="#packages" class="<?php if(uri_string() == "admin/packages" || uri_string() == "admin/packages/active_packages"){ echo "active-link"; } ?> nav-link" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-calendar"></i> Packages  <span class="badge"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width: 100%;">
                          <li class="nav-item side-link">
                              <a class="nav-link" href="<?php echo site_url('admin/packages'); ?>">Manage Packages  <span class="badge"></span></a>
                          </li>
                          <li class="nav-item side-link">
                              <a class="nav-link" href="<?php echo site_url('admin/packages/active_packages'); ?>">Active Packages  <span class="badge"></span></a>
                          </li>
                          <li class="nav-item side-link">
                              <a class="nav-link" href="<?php echo site_url('admin/packages/activities'); ?>">All Activities  <span class="badge"></span></a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="dropdown dropend">
                        <a href="#comments" class="<?php if(uri_string() == "admin/comments/blog" || uri_string() == "admin/comments/package"){ echo "active-link"; } ?> nav-link" id="comments_dropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-comment"></i> Comments</a>
                        <ul class="dropdown-menu" aria-labelledby="post_dropdown" style="width: 100%;">
                          <li class="nav-item side-link">
                              <a class="nav-link" href="<?php echo site_url('admin/comments/package'); ?>"><i class="fa fa-comment"></i> Package Comments</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="dropdown dropend">
                        <a href="#comments" class="<?php if(uri_string() == "admin/transaction_history"){ echo "active-link"; } ?> nav-link" id="comments_dropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-comment"></i> Transaction History</a>
                        <ul class="dropdown-menu" aria-labelledby="post_dropdown" style="width: 100%;">
                          <li class="nav-item side-link">
                              <a class="nav-link" href="<?php echo site_url('admin/transaction_history'); ?>"><i class="fa fa-comment"></i> Transaction History</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
              </ul>
          </div>
      </nav>
