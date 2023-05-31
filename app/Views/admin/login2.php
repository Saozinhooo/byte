<!DOCTYPE html>
<html>
<head>
	<title>SCA Login Form</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/final-login/css/style.css') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">



</head>
<body>
	<div class="container">
		<div class="img">
			<img src="<?= base_url('assets/final-login/img/sca.png') ?>">
		</div>
		<div class="login-content">
			<form id="login_form" method="post" action="<?php echo site_url("admin/login/auth"); ?>">
				<h2 class="title">Sign In</h2>
        <div class="input-div one">
        <div class="i">
        <i class="fas fa-user"></i>
        </div>
        <div class="div">
        <h5>Email</h5>
        <input type="text" class="input" name="email" required>
        </div>
        </div>
        <div class="input-div pass">
        <div class="i">
        <i class="fas fa-lock"></i>
        </div>
        <div class="div">
        <h5>Password</h5>
        <input type="password" id="password" class="input" name="password" required>
						<span>
							<i class="far fa-eye" id="togglePassword"></i>
							</span>
            </div>
            </div>
            <a href="#">Forgot Password?</a>
            <input type="submit" class="btn" value="Login">
            <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
                <?php if(session()->getFlashdata('success')):?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php endif;?>
            </form>
        </div>
    </div>
	<script type="text/javascript" src="<?= base_url('assets/final-login/js/main.js') ?>"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- Optional JavaScript; choose one of the two! -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $('#login_form').validate({
    rules: {
        email: "required",
        password: "required"
    },

    errorElement: 'small',
    errorClass: 'errmsg',
    });
});
</script>
</body>
</html>
