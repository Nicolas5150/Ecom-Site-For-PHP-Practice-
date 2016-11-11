<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
  <!-- css and js scripting links -->
  <title> Ecom Store Website </title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
  <link  rel= "stylesheet" type="text/css" href= "../css/ecom.css"/>
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

  <!-- Defining main content -->
  <div id="main" >
    <section id="mainContent" >
      <!-- Left content goes here -->
      <div id="leftSide" >
        <h3>Latest Items</h3>
          <ul>
            <!--Content goes here -->
            <!--Item One -->
            <li>
              <div class="img"><a href="../php/product.php">
                <img src="../images/high5.png" alt="High5 Surfboard"></a>
              </div>
              <div class="info">
              <a class="title" href="../php/product.php">High 5</a>
              <p> Short Description - Surfboard </p>
              <div class="price">
                <span class="st">Our Price:</span>
                  <strong>$700</strong>
              </div>
              <div class="actions">
                <a href="../php/product.php">Details</a>
                <a href="#">Add to Cart</a>
              </div>
              </div>
            </li>
            <!--Item Two -->
            <li>
              <div class="img"><a href="#">
                <img src="../images/peregrine.png" alt="Peregrine Surfboard"></a>
              </div>
              <div class="info">
              <a class="title" href="#">Peregrine </a>
              <p> Short Description - Surfboard </p>
              <div class="price">
                <span class="st">Our Price:</span>
                  <strong>$700</strong>
              </div>
              <div class="actions">
                <a href="#">Details</a>
                <a href="#">Add to Cart</a>
              </div>
              </div>
            </li>
            <!--Item Three -->
            <li>
              <div class="img"><a href="#">
                <img src="../images/rocket9.png" alt="Rocket9 Surfboard"></a>
              </div>
              <div class="info">
              <a class="title" href="#">Rocket 9 </a>
              <p> Short Description - Surfboard </p>
              <div class="price">
                <span class="st">Our Price:</span>
                  <strong>$500</strong>
              </div>
              <div class="actions">
                <a href="#">Details</a>
                <a href="#">Add to Cart</a>
              </div>
              </div>
            </li>
            <!--Item Four -->
            <li>
              <div class="img"><a href="#">
                <img src="../images/podMod.png" alt="podMod Surfboard"></a>
              </div>
              <div class="info">
              <a class="title" href="#">Pod Mod </a>
              <p> Short Description - Surfboard </p>
              <div class="price">
                <span class="st">Our Price:</span>
                  <strong>$550</strong>
              </div>
              <div class="actions">
                <a href="#">Details</a>
                <a href="#">Add to Cart</a>
              </div>
              </div>
            </li>
          </ul>
      </div>

      <!--Right content goes here -->
      <div id="rightSide" >
        <h3>Hot Items</h3>
          <ul>
            <!--Content goes here -->
            <!--Item One -->
            <li>
              <div class="info">
                <div class="img"><a href="#">
                  <img src="../images/twinfin.png" alt="Twinfin Surfboard"></a>
                </div>
              <a class="title" href="#">Twinfin  </a>
              <p> Short Description - Surfboard </p>
              <div class="price">
                <span class="st">Our Price:</span>
                  <strong>$400</strong>
              </div>
              <div class="actions">
                <a href="#">Details</a>
                <a href="#">Out of stock</a>
              </div>
              </div>
            </li>
            <!--Item two -->
            <li>
              <div class="info">
                <div class="img"><a href="#">
                  <img src="../images/zeus.png" alt="Zeus Surfboard"></a>
                </div>
              <a class="title" href="#">Zeus </a>
              <p> Short Description - Surfboard </p>
              <div class="price">
                <span class="st">Our Price:</span>
                  <strong>$450</strong>
              </div>
              <div class="actions">
                <a href="#">Details</a>
                <a href="#">Out of stock</a>
              </div>
              </div>
            </li>
          </ul>
      </div>
    </section>
  </div>
</div>
</body>
</html>
