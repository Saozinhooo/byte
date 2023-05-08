<!--Start Featured-->
<section class="ftco-section bg-light section-body">
  <div class="container">
    <div class="row justify-content-start mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate">

        <h2 class="mb-4"><strong>Most Featured</strong> in Southern Cebu</h2>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="destination-slider owl-carousel ftco-animate">
      <?php if($featured): ?>
      <?php foreach($featured as $feature): ?>
      <div class="item">
        <div class="destination">
          <a href="" class="img d-flex justify-content-center align-items-center"
            style="background-image: url(<?php echo base_url('images/Whale-Shark-Oslob-Cebu-Philippines-Aerial-View-Project-LUPAD.jpeg'); ?>.);">
            <div class="icon d-flex justify-content-center align-items-center">
              <span class="icon-search2"></span>
            </div>
          </a>
          <div class="text p-3">
            <h3><a href=""><?= $feature['title']; ?></a></h3>
            <span class="listing">15 Listing</span>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>
</section>
<!--end feature-->
