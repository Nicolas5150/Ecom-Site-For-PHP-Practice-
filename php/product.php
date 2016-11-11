<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
  <!-- css and js scripting links -->
  <title> Ecom Store Website </title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
  <link  rel= "stylesheet" type="text/css" href= "../css/product.css"/>
</head>

<body>
<div class="container">

<!-- Defining the header and nav section -->
<header>
  <div class="topHead">
    <div class="logo">
      <img src="../images/logo.png" height="100" width="500" alt="Logo image"/>
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
      if(isset($_SESSION['userDetails'])){
        // This includes the logout and cart nav sections and its restylings.
        include '../php/logoutAndCart.php';
      }
      else{
        echo "<li><a href=\"../php/login.php\">Login</a></li>";
      }
      ?>
    </ul>
  </nav>
</header>

<div id="main" >
  <section id="mainContent" >
    <!-- Main Product goes here -->
    <div id="leftSide" >
      <h3>Product Name </h3>
      <ul>
        <li>
          <div class="img">
            <img src="../images/high5.png" alt="High5 Surfboard">
          </div>
          <div class="info">
          <a class="title">High 5 </a>
          <p> The item for sale is... </p>
          <div class="price">
            <span class="st">Our Price:</span>
              <strong>$700</strong>
          </div>
          <div class="actions">
            <a href="#">Add to Cart</a>
          </div>
          </div>
        </li>
      </ul>
    </div>
  </section>
</div>
</div>

</body>
