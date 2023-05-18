
<!--Start Booking-->
<div class="col-md-6 heading-section ftco-animate" id="destination">
  <h2 class="mb-4" style="padding-left: 30%; font-size: 25px;"><strong>SET</strong> Date & Package </h2>
  <p style="padding-left: 30%;">Start your Adventure</p>
</div>
<section class="ftco-section ftco-degree-bg section-body  set-date-package-section">
  <div class="container">
        <form id="BookingForm" method="POST" action="<?= site_url('main/bookConfirm'); ?>">
    <div class="row">
      <div class="col-lg-3 sidebar ftco-animate">
        <div class="sidebar-wrap bg-light ftco-animate">
          <h4 class="heading mb-4">SET PAX & DATE</h4>
            <div class="fields">
              <div class="form-group">
                <input type="text" style="border-radius: 50px;" class="form-control"
                  placeholder="1 to 8 Pax" name="cust_qty" required autocomplete="off">
              </div>

              <div class="form-group">
                <input type="text" style="border-radius: 50px;" id="checkin_date"
                  class="form-control checkin_date" placeholder="Date of Tour" name="checkin_date" required autocomplete="off">
              </div>
              <div class="form-group">
                <input type="text" style="border-radius: 50px;" id="checkin_date" name="checkout_date"
                  class="form-control checkout_date" placeholder="Time of Arrival" required autocomplete="off">
              </div>
              <div class="form-group">
                <input type="text" style="border-radius: 50px;" name="contact_no"
                  class="form-control contact_no" placeholder="Contact Number" required autocomplete="off">
              </div>

              <div class="form-group">
                <?php if(session()->logged_in): ?>

                <button class="btn cta-btn package_submit" type="submit">Continue</button>

                <?php else: ?>

                 <p class="text-center">You must login to book</p>

                <?php endif ?>
              </div>
            </div>
        </div>
      </div>
      <div class="col-lg-9 container-check" >
        <div class="owl-carousel set-date-package">
          <?php if($packages): ?>
          <?php foreach($packages as $package): ?>
          <label class="option_item" style="width: 100%;">
            <input type="checkbox" class="checkbox package_checkbox" name="package_data[]" id="package_check" value="<?= $package['id'] ?>,<?= $package['title'] ?>,<?= $package['price'] ?>,<?= $package['package_img'] ?>">

            <div class="option_inner package">
              <div class="tickmark"></div>
          <div class="destination" id="package<?= $package['id'] ?>">
            <a href="" class="img img-2 d-flex justify-content-center align-items-center"
              style="background-image: url('public/uploads/images/<?= $package['package_img']; ?>');">
            </a>
            <div class="text p-3">
              <div class="d-flex">
                <div class="one">
                  <h4><a href="/package/<?= esc($package['slug'], 'url'); ?>"><?= $package['title']; ?></a></h4>

                </div>
                <div class="two">
                  <span class="price">P<?= $package['price']; ?></span>
                </div>
              </div>
              <?php $activities = $package['activity'];


                    foreach(explode(",",$activities) as $activity){
                      ?><p><?= $activity; ?></p>


                  <?php } ?>

              <p class="days"><span>1 to 3 hours</span></p>
            </div>
          </div>

        </div>
        </label>
      <?php endforeach; ?>
      <?php endif; ?>


        </div>
      </div>
    </div>
    </form>
  </div>
</section>
<!--end book-->
<!--end book-->
