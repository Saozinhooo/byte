<?php
// Include the bundled autoload from the Twilio PHP Helper Library
require __DIR__ . '\twilio-php-main\src\Twilio\autoload.php';
use Twilio\Rest\Client;
// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'AC6fa892fda30ed4702491d35048e8866c';
$auth_token = 'cadac9babf081246673da7cbd3b5d8ec';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]
// A Twilio number you own with SMS capabilities
$twilio_number = "+18565796109";
$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+639277203871',
    array(
        'from' => $twilio_number,
        'body' => 'I sent this message in under 10 minutes!'
    )
);

?>






<form class="" action="index.html" method="post">
  <label for=""name>Name: </label>
  <input type="text" name="" value="">
  <button type="submit" name="button">Submit</button>
</form>
