<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Travel and Tours Payment</title>
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
  <link rel="stylesheet" href="style1.css">
</head>
<style>
  body {
    background: #f5f5f5;
    min-height: 100vh;
    width: 100%;
    background-image: linear-gradient(rgba(4, 9, 30, 0.7), rgba(4, 9, 30, 0.7)), url(img/12628606_1672472703024801_4209346032145350069_o.jpg);
    background-position: center;
    background-size: cover;
    position: relative;
    background-attachment: fixed;
  }
</style>

<body oncontextmenu='return false' class='snippet-body'>
  <div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
    </div> <!-- End -->
    <div class="row">
      <div class="col-lg-6 mx-auto">
        <div class="card ">
          <div class="card-header">
            <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
              <!-- Credit card form tabs -->

              <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fab fa-paypal  mr-2"></i> Paypal </a> </li>
                <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fas fa-envelope mr-2"></i> Padala</a> </li>
                <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fa fa-lightbulb-o"></i> Payment Tip </a> </li>
              </ul>
            </div> <!-- End -->
            <!-- Credit card form content -->
            <div class="tab-content">
              <!-- credit card info-->
              <div id="credit-card" class="tab-pane fade show active pt-3">
                <form role="form" onsubmit="event.preventDefault()">
                  <div class="form-group"> <label for="username">

                    </label> <span type="text" name="username" placeholder="Card Owner Name" required class="form-control ">
                      <script src="https://www.paypal.com/sdk/js?client-id=AUCwtZJmwBatjWhD2M58jYDHPlV-dsuZgATSR2UtSyBp8WanQlf6rncQok1TaR-tarQuq7HWbqTHGUwF&currency=PHP">
                        // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
                      </script>

                      <div id="paypal-button-container"></div>
                  </div>
                  <div class="form-group"> <label for="cardNumber">

                    </label>
                    <div class="input-group">
                      <div class="input-group-append">
                        <div class="col-25">
                          <div class="container">

                            <h4>Packages <span class="price" style="color:black"><i class="fa fa-book"></i> </span></h4>
                            <hr>
                            <p style="font-size: 21px; font-weight: bold;">Activities</p>
                            <?php if ($package_data) : ?>
                              <?php foreach ($package_data as $v) : ?>
                                <?php
                                $packages = explode("+", $v);
                                $price += $packages[2];
                                $totalPrice = $price * $pax;
                                ?>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="activity" name="activity[]" value="Tour" checked disabled>
                                  <label class="form-check-label" for="flexCheckDefault">Tour</label>
                                  <br>
                                  <?php foreach (explode(',', $packages[4]) as $activity) : ?>

                                    <input class="form-check-input" type="checkbox" id="activity" name="activity[]" value="<?= $activity ?>">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      <?= $activity ?>
                                    </label>
                                    <br>
                                  <?php endforeach; ?>
                                </div>
                                <p><a href="#"><?= $packages[1] ?></a> <span class="price">₱<?= number_format($packages[2], 2, ",", "."); ?></span></p>

                              <?php endforeach; ?>
                            <?php endif; ?>
                            <p>Pax <span class="price" style="color:black"><b><?= $pax ?></b></span></p>
                            <label for="pax_count">Please write the names of each person included in the package</label>
                            <?php for ($i = 0; $i < $pax; $i++) : ?>
                              <input id="pax_count" type="text" name="pax[]" class="form-control pax[] mb-2" required>
                            <?php endfor; ?>
                            <hr>
                            <p>Total <span class="price" style="color:black"><b><?php if (isset($totalPrice)) {
                                                                                  echo "₱" . number_format($totalPrice, 2, ".", ",");
                                                                                } else {
                                                                                  echo "Please select a package";
                                                                                } ?></b></span></p>
                            <input type="hidden" id="totalPrice" name="totalPrice" value="<?php if (isset($totalPrice)) {
                                                                                            echo $totalPrice;
                                                                                          } else {
                                                                                            echo " ";
                                                                                          } ?>">
                            <input type="hidden" id="contact_no" name="contact_no" value="<?php if (isset($contact_no)) {
                                                                                            echo $contact_no;
                                                                                          } else {
                                                                                            echo " ";
                                                                                          } ?>">
                            <input type="hidden" id="checkin_date" name="checkin_date" value="<?php if (isset($checkin)) {
                                                                                                echo $checkin;
                                                                                              } else {
                                                                                                echo " ";
                                                                                              } ?>">
                            <input type="hidden" id="arrival_date" name="arrival_date" value="<?php if (isset($arrival)) {
                                                                                                echo $arrival;
                                                                                              } else {
                                                                                                echo " ";
                                                                                              } ?>">
                            <input type="hidden" id="packageDetails" name="packageDetails" value='<?= json_encode($package_data) ?>'>
                            <input type="hidden" id="names_included" name="names_included" value=''>
                            <input type="hidden" id="activities" name="activities" value=''>
                            <hr>
                            <p>Downpayment <span class="price" style="color:black"><b>₱500.00</b></span></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">

                  </div>
                  <div class="card-footer" style="background-color: whitesmoke">
                </form>
              </div>
            </div> <!-- End -->
            <!-- Paypal info -->
            <div id="paypal" class="tab-pane fade pt-3">
              <h6 class="pb-2">Padala account type</h6>
              <div class="form-group ">

                <label class="radio-inline">

                  <label class="radio-inline">
                    <div class="form-group">
                      <label for="cardNumber">
                        <div class="img-padala">
                          <img src="<?= base_url('assets/sao/img/palawan.jpg') ?>" alt="" style="width: 150px; height: 150px; margin: 0 2px;">
                      </label>
                      <img src="<?= base_url('assets/sao/img/m-lhuiller-logo.jpg') ?>" alt="" style="width: 150px; height: 150px; margin: 0 2px;">
                  </label>
                  <img src="<?= base_url('assets/sao/img/Send-Money-to-Your-Loved-Ones-through-Cebuana-Lhuilliers-Authorized-Pera-Padala-Agents.png') ?>" alt="" style="width: 150px; height: 150px; margin: 0 10px;">
                </label>
              </div>
              </label>
              <hr>
              <h6>Receiver Details</h6>
              <hr>
              <p>Angelique Ligaray</p>
              <!-- <p>+639778551838</p> -->
              <p>Santa Fe, Bantayan</p>
              <hr>
              <h6>Note:</h6>
              <p class="text-muted"> After clicking on the button, your padala payment will be recorded to our database and you will receive a notifcation from the owner if you are already pay the downpayment. After completing the payment process, you will be redirected back to the website to view more about us. </p>
            </div>
          </div>
        </div>
        <!-- End -->
        <!-- bank transfer info -->

        <div id="net-banking" class="tab-pane fade pt-3">
          <div class="form-group "> <label for="Payment Tip">
              <h6>For Selecting your Payment</h6>
              <p class="text-muted">Note: After Selecting on the Payment Method, you will be receive a notifcation from the owner for your payment. After completing the payment process, you will be redirected back to the website. </p>
          </div> <!-- End -->
          <!-- End -->
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="termsModalLabel">Terms & Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Booking Reservation:</strong> Customers are required to pay half of the total payment to confirm their reservation.</p>
        <p><strong>Payment in Bantayan:</strong> The full payment for the tour will be made upon arrival in Bantayan.</p>
        <p><strong>Cancellation Policy:</strong> No cancellation of booking and no refund once payment is done.</p>
        <p><strong>No-show Policy:</strong> Failure to show up on the scheduled day of the tour will result in automatic cancellation without any refund.</p>
        <p><strong>Full Payment:</strong> Customers are required to pay the full payment on the first day of the tour.</p>
        <p><strong>Children Policy:</strong> Children must be accompanied by an adult during the tour and activities.</p>
        <p><strong>Unforeseen Circumstances:</strong> In case of unfortunate circumstances such as bad weather, floods, accidents, etc., the tour schedule will be adjusted to a suitable time for the guest.</p>
        <p><strong>Guest Responsibilities:</strong> During the tour, guests are expected to listen to and follow the instructions and safety measures provided by the guide/employee. The company will not be held responsible for any unfortunate events if the guest fails to comply.</p>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="agreeCheckbox">
          <label class="form-check-label" for="agreeCheckbox">
            I agree to the terms and conditions
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <!-- Button hidden by default, will appear when checkbox is checked -->
        <button type="button" class="btn btn-primary d-none" id="agreeButton" data-bs-dismiss="modal">Agree</button>
      </div>
    </div>
  </div>
</div>
</body>

</html>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript'>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
<script>
  $(document).ready(function() {
    var totalPrice = $("#totalPrice").val();
    var contact_no = $("#contact_no").val();
    var packageDetails = $("#packageDetails").val();
    var checkin_date = $("#checkin_date").val();
    var arrival_date = $("#arrival_date").val();
    paypal.Buttons({
      onClick() {
        console.log("clicked");
        var pax = $('input[name^=pax]').map(function(idx, elem) {
          return $(elem).val();
        }).get();
        $("#names_included").val(pax);
        var activities = $(".form-check input:checked").map(function() {
          return $(this).val();
        }).get();
        $("#activities").val(activities);
      },
      createOrder: function(data, actions) {
        // This function sets up the details of the transaction, including the amount and line item details.
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: totalPrice,
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
          // This function shows a transaction success message to your buyer.
          var pax = $("#names_included").val();
          var activities = $("#activities").val();
          var fullname = [details.payer.name.given_name, details.payer.name.surname].join(" ");
          var payer_id = details.payer.payer_id;
          var payer_email = details.payer.email_address;
          var transaction_id = details.id;
          var status = details.status;
          var payment = totalPrice;
          $.ajax({
            url: "<?= site_url('main/savePayerDetails') ?>",
            method: "POST",
            data: {
              fullname: fullname,
              payer_id: payer_id,
              payer_email: payer_email,
              transaction_id: transaction_id,
              status: status,
              contact_no: contact_no,
              payment: payment,
              packageDetails: packageDetails,
              checkin_date: checkin_date,
              arrival_date: arrival_date,
              pax: pax,
              activities: activities
            },
            success: function(data) {
              // window.location.href = "/";
            },
          });


        });
      }
    }).render('#paypal-button-container');

    //This function displays Smart Payment Buttons on your web page.
  });
</script>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
         -->
<script>
  // JavaScript to trigger the modal on page load
  document.addEventListener("DOMContentLoaded", function() {
    var myModal = new bootstrap.Modal(document.getElementById('termsModal'), {
      backdrop: 'static',
      keyboard: false
    });
    myModal.show();
  });
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  var agreeCheckbox = document.getElementById('agreeCheckbox');
  var agreeButton = document.getElementById('agreeButton');
  
  // Show the button if the checkbox is checked
  agreeCheckbox.addEventListener('change', function() {
    if (agreeCheckbox.checked) {
      agreeButton.classList.remove('d-none');
    } else {
      agreeButton.classList.add('d-none');
    }
  });
});
</script>


        </body>

</html>