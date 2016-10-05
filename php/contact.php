<!DOCTYPE html>
<html>
<head>
  <!-- css and js scripting links -->
  <title> Ecom Store Website </title>
  <link  rel= "stylesheet" type="text/css" href= "../css/contact.css"/>
</head>

<body>
<div class="container">

<!-- Defining the header and nav section -->
<header>
  <div class="topHead">
    <div class="logo">
      <img src="../images/logo.png" height="100" width="500" alt="Logo image">
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
      <h3>Contact Us</h3>
            <form id="contact-form" name="contact-form" method="post" action="../php/form-processing.php">
              <p id="text">Please fill the form out below with your name, email, and message.
                  <br>We will get back to you as soon as possible.
              </p>
              <p>
                <label>Name:<br />
                  <input name="Name" type="text" id="FName" size="30" />
                </label>
              </p>
              <p>
                <label>Email:<br />
                  <input name="Email" type="text" id="Email" size="48" />
                </label>
              </p>
              <p>
                <label>Message:<br />
                  <textarea name="Message" id="Message" cols="55" rows="10"></textarea>
                </label>
              </p>
              <p>
                <label>
                  <input name="button" type="submit" class="submit-button" id="button" value="Send" />
                </label>
              </p>
            </form>

    </div>
  </section>
</div>
</div>
</body>
</html>
