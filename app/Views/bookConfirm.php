<!DOCTYPE html>
<html>
<head>
    <title>Checkout Card</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- library validate -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>

    <!-- style css -->
    <link rel="stylesheet" href="<?= base_url('assets/sao/payment.css') ?>">
</head>
<body>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'PayPal')">PayPal</button>
        <button class="tablinks" onclick="openCity(event, 'Padala')">Padala</button>
      </div>
      <div id="PayPal" class="tabcontent">
<div class="row">
    <div class="col-75">
        <div class="container">
            <form id="validate" action="/action_page.php">
                <div class="row">
                    <div class="col-50">
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="fullname" placeholder="Please Enter Full Name" required>
                        <div class="row">
                            <div class="col-50">
                                <label for="state">Gender</label>
                                <input type="text" id="state" name="state" placeholder="Male"required>
                            </div>
                            <div class="col-50">
                                <label for="zip">Contact</label>
                                <input type="text" id="zip" name="zip" placeholder="+639"required>
                            </div>
                        </div>
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="soeng.souy@gmail.com" required>
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="110 W. 15th Phnom Penh" required>
                        <label for="city"><i class="fa fa-institution"></i> City</label>
                        <input type="text" id="city" name="city" placeholder="Phnom Penh" required>

                        <div class="row">
                            <div class="col-50">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" placeholder="Phnom Penh"required>
                            </div>
                            <div class="col-50">
                                <label for="zip">Zip</label>
                                <input type="text" id="zip" name="zip" placeholder="12000"required>
                            </div>
                        </div>

                </div>
            </div>
                <label>
                <input onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black" type="checkbox" checked="checked" name="sameadr"> Terms and condition
                </label>
                <input type="submit" value="Continue to checkout" class="btn">
            </form>
            </div>
        </div>
    </div>

    <div class="col-25">
        <div class="container">
        <h3>Payment</h3>
        <label for="fname">Accepted Cards</label>
        <div class="icon-container">
            <i class="fa fa-cc-paypal" style="color:blue; font-size: 50px;"></i>
        </div>

        <label for="cname">Name on Card</label>
        <input type="text" id="cname" name="cardname" placeholder="Soeng Souy"required>
        <label for="ccnum">Credit card number</label>
        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"required>
        <label for="expmonth">Exp Month</label>
        <input type="text" id="expmonth" name="expmonth" placeholder="September"required>
        <div class="row">
            <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2021"required>
            </div>
            <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352"required>
            </div>
        </div>
    </div>
    </div>
    <div class="col-25">
        <div class="container">

            <h4>Packages <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>2</b></span></h4>
            <p><a href="#">Canyoneering, Badian</a> <span class="price">PHP 1500</span></p>
            <p><a href="#">Whale Shark, Oslob</a> <span class="price">PHP 1500</span></p>
            <p>Pax <span class="price" style="color:black"><b>5</b></span></p>
            <hr>
            <p>Total <span class="price" style="color:black"><b>PHP 7500</b></span></p>
            <hr>
            <p>Downpayment <span class="price" style="color:black"><b>PHP 500</b></span></p>
        </div>
        <input type="submit" value="Edit Book" class="btn">
    </div>
</div>
<div id="Padala" class="tabcontent">
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form id="validate" action="/action_page.php">
                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="fullname" placeholder="Please Enter Full Name" required>
                            <label for="email"><i class="fa fa-phone"></i> Contact</label>
                            <input type="text" id="contact" name="email" placeholder="Phone Number" required>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="@gmail.com" required>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="Cebu" required>
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="Philippines" required>

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="Philippines"required>
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="Philippines"required>
                                </div>
                            </div>

                    </div>
                </div>
                    <label>
                    <input onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black" type="checkbox" checked="checked" name="sameadr"> Terms and condition
                    </label>
                    <input type="submit" value="Continue to checkout" class="btn">
                </form>
                </div>
            </div>
        </div>

        <div class="col-25">
            <div class="container">
            <h3>Payment</h3>
            <label for="fname">We Accept Padala</label>
            <hr>
            <img src="img/palawan.jpg" alt="" style="width: 300px; height: 150px;">
            <br>
            <img src="img/m-lhuiller-logo.jpg" alt="" style="width: 300px; height: 150px;">
            <br>
            <img src="img/Send-Money-to-Your-Loved-Ones-through-Cebuana-Lhuilliers-Authorized-Pera-Padala-Agents.png" alt="" style="width: 300px; height: 150px;">
        </div>
        </div>
        <div class="col-25">
            <div class="container">

                <h4>Packages <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>2</b></span></h4>
                <p><a href="#">Canyoneering, Badian</a> <span class="price">PHP 1500</span></p>
                <p><a href="#">Whale Shark, Oslob</a> <span class="price">PHP 1500</span></p>
                <p>Pax <span class="price" style="color:black"><b>5</b></span></p>
                <hr>
                <p>Total <span class="price" style="color:black"><b>PHP 7500</b></span></p>
                <hr>
                <p>Downpayment <span class="price" style="color:black"><b>PHP 500</b></span></p>
            </div>
            <input type="submit" value="Edit Book" class="btn">
        </div>
    </div>
<!--modal-->

</div>
<!-- script validate js -->
<script>
    $('#validate').validate({
        roles: {
            fullname: {
                required: true,
            },
            email: {
                required: true,
            },
            address: {
                required: true,
            },
            city: {
                required: true,
            },
            state: {
                required: true,
            },
            zip: {
                required: true,
            },
            cardname: {
                required: true,
            },
            cardnumber: {
                required: true,
            },
            expmonth: {
                required: true,
            },
            expyear: {
                required: true,
            },
            cvv: {
                required: true,
            },

        },
        messages: {
            fullname:"Please input full name*",
            email:"Please input email*",
            city:"Please input city*",
            address:"Please input address*",
            state:"Please input state*",
            zip:"Please input address*",
            cardname:"Please input card name*",
            cardnumber:"Please input card number*",
            expmonth:"Please input exp month*",
            expyear:"Please input exp year*",
            cvv:"Please input cvv*",
        },
    });
</script>

<script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    </script>

</body>
</html>
