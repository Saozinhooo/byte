<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>


    <script
    src="https://www.paypal.com/sdk/js?client-id=ATNE5uwabB1Ir7KtmvyCL3R2HZ1u3d-UJPZbJDuBSzoY6DaSayq5ZUH1ALQmGJWbxlbF2JtZUGvAZ_3u"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
  </script>


  <form class="" action="test_email" method="post">
    <button type="submit" name="button">Send Mail</button>

  </form>

  <div id="paypal-button-container"></div>

  <script>
    paypal.Buttons({
      createOrder: function(data, actions) {
        // This function sets up the details of the transaction, including the amount and line item details.
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '696969'
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
          // This function shows a transaction success message to your buyer.

          alert('Transaction completed by ' + details.payer.name.given_name);
        });
      }
    }).render('#paypal-button-container');
    //This function displays Smart Payment Buttons on your web page.
  </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>










<script type="text/javascript">

var val = [];
var action_data = [];
var pax = "";
var checkin = "";
var checkout = "";
var package_data = [];

$(function(){

  $('.package_submit').on('click', function(){
    checkin = $('.checkin_date').val();
    checkout = $('checkout_date').val();
    pax = $('pax').val();
    $('.package_checkbox:checked').each(function(i){
          val[i] = $(this).val();
          action_data[i] = $(this).val();
          package_data[i] = [$(this).attr('data-package_title'), $(this).attr('data-package_price'), $(this).attr('data-package_image')];
          console.log(val[i]);


    });

    $.ajax({
      url: "<?= site_url('main/bookConfirm')?>",
      type: "POST",
      data:{

        package_data : package_data,
        checkin_date : checkin,
        checkout_date : checkout,
        pax : pax,
      },
      success: function(confirmed){
        console.log(confirmed);

      },
    });




  });

});


</script>
