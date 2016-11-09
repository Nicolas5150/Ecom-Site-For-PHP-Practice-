<?php
echo "<li><a href=\"#\">".$_SESSION['userDetails'][0]." cart</a></li>";

echo "
  <li><a href=\"#openInfoModal\" class=\"modalButton\">User Info</a></li>
  <div id=\"openInfoModal\" class=\"modalDialog\">
    <a href=\"#close\" title=\"Close\" class=\"close\">X</a>
    <div id=\"infoDetails\">
    <p>
    <p>
      <label style=\"padding-left:36%; color:black;\"><strong>Basic User Details</strong><br />
    </p>";
    echo "Username: ".$_SESSION['userDetails'][0]."<br />";
    echo "email: ".$_SESSION['userDetails'][1]."<br />";
    echo "First Name: ".$_SESSION['userDetails'][2]."<br />";
    echo "Last Name: ".$_SESSION['userDetails'][3]."<br />";
echo "
  </p>
  </div>
  </div>";

echo "
  <li><a href=\"#openLoginModal\" class=\"modalButton\">Logout</a></li>
  <div id=\"openLoginModal\" class=\"modalDialog\">
    <a href=\"#close\" title=\"Close\" class=\"close\">X</a>
    <div id=\"loginDetails\">
      <form id=\"contact-form\" name=\"contact-form\" method=\"post\" action=\"../php/logout-processing.php\">
        <p>
          <label style=\"padding-left:42%; color:black;\"><strong>Logout</strong><br />
        <p>
          You will be logged out of your account and directed back to the home page
        </p>
          </label>
        </p>
          <label>
            <input name=\"button\" type=\"submit\" class=\"submit-button\" id=\"button\" value=\"Logout\" />
          </label>
        </p>
      </form>
    </div>
  </div>";

echo '<style type="text/css">
      nav ul li
      {
        padding-left: 8%;
      }
      </style>';

?>
