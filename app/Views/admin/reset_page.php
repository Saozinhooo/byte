<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/login.css"); ?>">
    <title>Registration</title>
</head>

<body style="background: #CCCCCC">

    <div class="container-fluid">
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-3 m-auto">
                <div class="text-center">
                    <img class="img-fluid" src="<?php echo base_url("assets/images/travel.png"); ?>" alt="sca_logo" style="width: 40%;">
                </div>
                <div class="card">
                    <div class="card-header text-light" style="background: #214761;">
                        <h3 class="card-title">Reset Password</h3>
                    </div>
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                    <?php endif; ?>

                    <div class="card-body">
                        <form id="reset_form" method="post" action="<?php echo site_url("/admin/login/password_reset"); ?>">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                <label for="password">Email</label>
                            </div>
                            <a class="float-start btn btn-outline-info" href="<?php echo site_url('/admin/login'); ?>">Back</a>
                            <button type="submit" class="float-end btn btn-outline-info">Submit</button>
                            <?php if (session()->getFlashdata('failed')) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('failed') ?></div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

    <script>
        $(document).ready(function() {
            $('#reset_form').validate({
                rules: {
                    email: "required",
                },

                errorElement: 'small',
                errorClass: 'errmsg',
            });
        });
    </script>
</body>

</html>