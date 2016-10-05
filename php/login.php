<!DOCTYPE html>
<html>
<head>
  <!-- css and js scripting links -->
  <title> Ecom Store Website </title>
  <link  rel= "stylesheet" type="text/css" href= "../css/login.css">
  <style>
  .error {color: #FF0000;}
  </style>
</head>
<body>
<div class="container">
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

  <section id="mainContent" >
    <div id="product" >
      <h3>Login &amp; Signup </h3>
      <!-- Login Section -->
      <br><a href="#openLoginModal" class="modalButton">Login</a><br><br><br>
      <div id="openLoginModal" class="modalDialog">
        <a href="#close" title="Close" class="close">X</a>
    		<div id="loginDetails">
          <form id="contact-form" name="contact-form" method="post" action="../php/login-processing.php">
            <p>
              <label>Username:<br />
                <input name="Username" type="text" id="Username" size="48" />
              </label>
            </p>
            <p>
              <label>Pasword:<br />
                <input name="Password" type="text" id="Password" size="48" />
              </label>
            </p>
            <p>
              <label>
                <input name="button" type="submit" class="submit-button" id="button" value="Send" />
              </label>
            </p>
          </form>
        </div>
      </div>

<!-- Form validation for users signing up for first time -->
<?php
// Define error variables, set as empty values at first.
$usernameErr = $firstNameErr = $lastNameErr = $emailErr =
$passwordErr = $phoneNumberErr = $streetAddressErr =
$cityNameErr = $zipNumberErr = $stateLettersErr = "";
// Define correct variables, set as empty values at first.
$username = $firstName = $lastName = $email =
$password  = $phoneNumber = $streetAddress =
$cityName = $zipNumber = $stateLetters = "";
$numberAndStreet = 0;
// Only run once submit button has been called.
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  // Username validation
  if (empty($_POST["username"])){
    $usernameErr = "Username is required";
  }
  else
  {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$username)){
      $usernameErr = "Only letters, no spaces";
    }
  }
  // First name validation
  if (empty($_POST["firstName"])){
    $firstNameErr = "Name is required";
  }
  else
  {
    $firstName = test_input($_POST["firstName"]);
    // Check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$firstName)){
      $firstNameErr = "Only letters, no spaces";
    }
  }
  // Last name validation
  if (empty($_POST["lastName"])){
    $lastNameErr = "Name is required";
  }
  else
  {
    $lastName = test_input($_POST["lastName"]);
    // Check if name only contains letters and whitespace.
    if (!preg_match("/^[a-zA-Z]*$/",$lastName)){
      $lastNameErr = "Only letters, no spaces";
    }
  }
  // Email validation
  if (empty($_POST["email"])){
    $emailErr = "Email is required";
  }
  else
  {
    $email = test_input($_POST["email"]);
    // Check if e-mail address is well-formed.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $emailErr = "Invalid email format";
    }
  }
  // Password validation
  if (empty($_POST["password"])){
    $passwordErr = "Password is required";
  }
  else{
    $password = ($_POST["password"]);
  }

  {
  // Phone Number validation
  // ^ = check from the start of the string
  // [0-9]=for any number
  // + = appearing at least once and possibly repeated
  // $ = until the end of the string
  }

  // Phone number validation
  if (!empty($_POST["phoneNumber"]))
  {
    // Strip of punctuation and remove spaces
    $phoneNumber = preg_replace('/[^0-9.]+/', '', $_POST["phoneNumber"]);

    if (strlen($phoneNumber) != 10){
      $phoneNumberErr = "Phone number must be 10 numbers";
    }
  }
  else{
    $phoneNumberErr = "Phone number is required";
  }
  // Street validation
  if (empty($_POST["streetAddress"])){
    $streetAddressErr = "Address is required";
  }
  // Something is in the text field
  else
  {
    $streetAddress = test_input($_POST["streetAddress"]);
    // check if first index is a number
    if (!is_numeric($streetAddress[0]))
    {
      $numberAndStreet ++;
      $streetAddressErr = "Must start with number";
    }
    // grab last letter of string to see if it is letter
    if (!preg_match('/^[a-z]/i',$streetAddress[strlen($streetAddress)-1]))
    {
      $numberAndStreet ++;
      $streetAddressErr = "Must end with letter";
    }
    if($numberAndStreet == 2){
      $streetAddressErr = "Incorrect address";
    }
  }

  // City validation
  if (empty($_POST["cityName"])){
    $cityNameErr = "City is required";
  }
  else
  {
    $cityName = test_input($_POST["cityName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$cityName)){
      $cityNameErr = "Only letters, no spaces";
    }
  }

  // Zipcode Validation
  if (!empty($_POST["zipNumber"]))
  {
    // Strip of punctuation and remove spaces
    $zipNumber = preg_replace('/[^0-9.]+/', '', $_POST["zipNumber"]);
    $zipNumber = test_input($zipNumber);

    if (strlen($zipNumber) != 5){
      $zipNumberErr = "Zip code must be 5 numbers";
    }
  }
  else{
    $zipNumberErr = "Zip code is required";
  }

  // State validation
  if (empty($_POST["stateLetters"])){
    $stateLettersErr = "State is required";
  }
  else
  {
    $stateLetters = test_input($_POST["stateLetters"]);
    // Check if name only contains letters and whitespace
    if (strlen($stateLetters) != 2)
    {
      $stateLettersErr = "State code must be 2 letters";
      if (!preg_match("/^[a-zA-Z]*$/",$stateLetters)){
        $stateLettersErr = "Only letters, no spaces";
      }
    }
  }

  // Finally if no error stings were created submit the form.
  if ($usernameErr == "" && $firstNameErr == "" && $lastNameErr == "" &&
        $emailErr == "" && $passwordErr == "" && $phoneNumberErr == "" &&
          $streetAddressErr == "" && $cityNameErr == "" && $zipNumberErr == "" &&
            $stateLettersErr == "")
  {
    // Create new cookie for users login status and then send to success page
    setcookie('loggedIn');
		setcookie("databaseUsername", $username);
    header("Location: ../php/success.php");
  }
}

// Clean incoming data function.
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = str_replace('(','',$data);
  $data = str_replace(')','',$data);
  return $data;
}
?>

      <!-- Signup Section -->
      <br><a href="#openSignupModal" class="modalButton">Signup</a><br>
      <div id="openSignupModal" class="modalDialog">
        <a href="#close" title="Close" class="close">X</a>
        <div id="loginDetails">
          <form id="contact-form" name="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              Username: <input type="text" name="username" size="15" value="<?php echo $username;?>">
              <span class="error">* <?php echo $usernameErr;?></span>
              <br><br>
              First Name: <input type="text" name="firstName" size="15" value="<?php echo $firstName;?>">
              <span class="error">* <?php echo $firstNameErr;?></span>
              <br><br>
              Last Name: <input type="text" name="lastName" size="15" value="<?php echo $lastName;?>">
              <span class="error">* <?php echo $lastNameErr;?></span>
              <br><br>
              E-mail: <input type="text" name="email" value="<?php echo $email;?>">
              <span class="error">* <?php echo $emailErr;?></span>
              <br><br>
              Password: <input type="text" name="password" value="<?php echo $password;?>">
              <span class="error">* <?php echo $passwordErr;?></span>
              <br><br>
              Phone Number: <input type="text" name="phoneNumber" value="<?php echo $phoneNumber;?>">
              <span class="error">* <?php echo $phoneNumberErr;?></span>
              <br><br>
              Street Address: <input type="text" name="streetAddress" value="<?php echo $streetAddress;?>">
              <span class="error">* <?php echo $streetAddressErr;?></span>
              <br><br>
              City: <input type="text" name="cityName" value="<?php echo $cityName;?>">
              <span class="error">* <?php echo $cityNameErr;?></span>
              <br><br>
              Zip Code: <input type="text" name="zipNumber" value="<?php echo $zipNumber;?>">
              <span class="error">* <?php echo $zipNumberErr;?></span>
              <br><br>
              State Abbreviation: <input type="text" name="stateLetters" value="<?php echo $stateLetters;?>">
              <span class="error">* <?php echo $stateLettersErr;?></span>
              <br><br>
              <input type="submit" name="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

</body>
</html>
