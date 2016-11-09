<?php
  // Delete the session
  session_destroy();

  // Redirect the user to the login page
  // It will handle the removal of the cart and switch back to login nav bar
  header("Location: ../php/success.php");
 ?>
