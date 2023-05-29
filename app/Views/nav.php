<!--Start Nav-->
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container ">
			<a class="navbar-brand" href="/"><img src="<?php echo base_url('assets/photo/images/travel.jpg'); ?>"
					style="width: 80px; padding-top: 0%;"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav" style="padding-top: -0%;">
				<ul class="navbar-nav ml-auto ">
					<li class="nav-item "><a href="#home" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="#gmap" class="nav-link">Map</a></li>
					<li class="nav-item"><a href="#package" class="nav-link">Packages</a></li>
					<li class="nav-item"><a href="#destination" class="nav-link">Book</a></li>
					<?php if(session()->logged_in): ?>

						<li class="nav-item"><a href="user/<?= session()->id ?>" class="nav-link">Booking History</a></li>
						<li class="nav-item"><a href="login/logout" class="nav-link">Logout</a></li>
						
					<?php else: ?>
					
						<li class="nav-item"><a href="login" class="nav-link">Login</a></li>

					<?php endif; ?>
					</div>
				</ul>
			</div>
		</div>
	</nav>
<!--end nav-->
