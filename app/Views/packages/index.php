
</div>

<br>
<br>
<br>
<br>

<section class="ftco-section ftco-degree-bg section-body" id="rate">
  <div class="container">
    <div class="row">
      <div class="col-md-7 heading-section ftco-animate">
        <h2 class="mb-4"><strong>Blogs & Feedback</strong> </h2>
        </div>
        <div class="col-md-7 heading-section ftco-animate">

          <?php if($packages): ?>
          <?php foreach($packages as $package): ?>

          <div class="blog-post">
            <div class="blog-post-img">
              <img src="public/uploads/images/<?= $package['package_img'] ?>" alt="">
              </div>
                <div class="blog-post-info">
                  <div class="blog-post-faggot">
                      <h1 class="blog-post-title"><?= $package['title'] ?></h1>
                      <hr>
                </div>
              <small><?php $db = $package['created']; $timestamp = strtotime($db); echo date("F j, Y", $timestamp); ?></small>
              <p class="blog-post-text"><?php echo $package['body'] != null ? word_limiter($package['body'],50) : "";  ?> <a href="/package/<?= esc($package['slug'], 'url'); ?>">Read More</a></p>
              <br>
              <hr>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <p>Follow Us:</p>
                <li class="ftco-animate"><a href="https://www.facebook.com/adventurecanyoneering/"><span
                      class="icon-facebook"></span></a></li>
                      <li class="ftco-animate"><a href="https://www.facebook.com/adventurecanyoneering/"><span
                        class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        <?php endforeach; ?>
        <?php endif; ?>

          <div class="pagination mt-4">
            <?php if (!empty($pager)) :
              echo $pager->links('package_overview', 'myPager');
            endif ?>
          </div>
<br>
<br>
<hr>
      </div>
  </div>
</div>
</section>

<br>
