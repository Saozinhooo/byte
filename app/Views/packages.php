<!--Start Package-->
	<section class="ftco-section ftco-destination section-body" class="destination" id="package">
		<div class="container">
			<div class="row justify-content-start mb-5 pb-3">
				<div class="col-md-7 heading-section ftco-animate">
					<h2 class="mb-4"><strong>Top </strong> Tour Packages</h2>
				</div>
			</div>
			<div class="container">
				<div class="row d-flex">
					<?php if($packages_blog): ?>
					<?php foreach($packages_blog as $package): ?>
					<div class="col d-flex ftco-animate">
						<div class="blog-entry align-self-stretch">
							<a href="#" class="block-20" style="width: 100%;">
								<img src="public/uploads/images/<?= $package['package_img']; ?>" alt="" style="width: 100%; height: 100%; object-fit: cover;">
							</a>
							<div class="text p-5">
								<div class="d-flex">
									<div class="one">
										<h3><a href="/package/<?= esc($package['slug'], 'url'); ?>"><?= $package['title']; ?></a></h3>
										<p class="rate">
											<?php
												$rating = $package['rating'];
												$color = '';
												for($count = 1; $count <= 5; $count++){
													if($count <= $rating){

														$color = 'color:#ffcc00;';
														?><i class="icon-star" style="<?php echo $color; ?>"></i><?php

													}else{

														$color = 'color:#ccc;';
														?><i class="icon-star" style="<?php echo $color; ?>"></i><?php
													}
												}
												?>
											<span><?= round($package['rating'], 2); ?> Rating</span>
										</p>
									</div>
								</div>
								<p style="word-break: break-all;">
								<?php 
								if (mb_strlen($package['body']) > 20) {
									$package['body'] = mb_substr($package['body'], 0, 20) . '<br/>...';
								}
								echo $package['body'];
								
								
								?>
							</p>
								<p class="days"><span>1 to 3 hours</span></p>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="row mt-5">
					<div class="col text-center">
						<a class="btn cta-btn" href="<?= site_url("package") ?>">Read More</a>
						<div class="form-group">
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>

	</section>
	<!--end packages-->
