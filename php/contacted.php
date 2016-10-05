<!DOCTYPE html>
<html>
<head>
  <!-- css and js scripting links -->
  <title> Ecom Store Website </title>
  <link  rel= "stylesheet" type="text/css" href= "../css/contact.css">
</head>

<body>
<div class="container">

<!-- Defining the header and nav section -->
<header>
  <div class="topHead">
    <div class="logo">
      <img src="../images/logo.png" height="100px" width="500px" >
    </div>
  </div>

  <nav>
    <ul>
      <li class="chosen"><a href="../php/index.php">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="../php/contact.php">Contact</a></li>
      <!-- Guest or User and Cart items -->
      <?php
      // If the user is logged in show logout option and cart via external php
      // else just show login option on nav bar.
      if(isset($_COOKIE['loggedIn']))
      {
        // This includes the logout and cart nav sections and its restylings.
        include '../php/logoutAndCart.php';
      }
      else
      {
        echo "<li><a href=\"../php/login.php\">Login</a></li>";
      }
      ?>
    </ul>
  </nav>
</header>

<div id="main" >
  <section id="mainContent" >
    <!-- Left content goes here -->
    <div id="product" >
      <h3>Received</h3>
          <p id="received">Thank you for contacting us!
            <br>We will get back to you as soon as possible.
          </p>
    </div>
  </section>
</div>
</div>
</body>
</html>
