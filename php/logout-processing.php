<?php
  // Delete the login cookies
  setcookie("loggedIn", "", time() - 3600);
  setcookie("$databaseUsername", "", time() - 3600);

  // Redirect the user to the login page
  // It will handle the removal of the cart and switch back to login nav bar
  header("Location: ../php/success.php");
 ?>
