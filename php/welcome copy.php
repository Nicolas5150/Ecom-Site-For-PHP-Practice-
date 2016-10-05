<?php
  // Create var that adds 30 days to the current time.
  $Month = 2592000 + time();

  // Set cookie called visitInfo
  setcookie('visitInfo', date("F jS - g:i a"), $Month);

  // Check if cookie has been set before else welcome guest.
  // Present text in iframe
  if(isset($_COOKIE['visitInfo']))
  {
    $visitLast = $_COOKIE['visitInfo'];
    echo "Welcome back! <br> Your last visit was on:<br> ". $visitLast;
  }
  else
  {
    echo "Welcome to the site, sign up above!";
  }
?>
