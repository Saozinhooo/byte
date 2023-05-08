<!--Start Feedback-->
	<section class="ftco-section ftco-destination section-body" id="blog">
		<div class="container">
			<div class="row justify-content-start mb-5 pb-3">
				<div class="col-md-7 heading-section ftco-animate">
					<h2 class="mb-4"><strong>Blogs </strong> & FeedBack</h2>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row d-flex">
				<?php if($posts): ?>
				<?php foreach($posts as $post): ?>
				<div class="col-md-3 d-flex ftco-animate">
					<div class="blog-entry align-self-stretch" style="width: 100%;">
						<a href="" class="block-20"
							style="background-image: url('public/uploads/images/<?= $post['post_image']; ?>');">
						</a>
						<div class="text p-4 d-block">
							<span class="tag"></span>
							<h3 class="heading mt-3"><a href=""><?= $post['title']; ?></a>
							</h3>
							<div class="meta mb-3">
								<div><a href=""><?php
								$timestamp = strtotime($post['created_at']);
								echo date('F j, Y, g:i a', $timestamp);
								?></a></div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<?php endif; ?>
			</div>
			</div>
			<div class="row mt-5">
				<div class="col text-center">
					<a class="btn cta-btn" href="<?= site_url("blog") ?>">Read More</a>
					<div class="form-group">
				</div>
			</div>
		</div>
	</section>
<!--end blog-->
