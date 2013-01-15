<?php

/**
  Login page. Compares entered password to the 
  user's password. Sets session id if successful.
**/


// configuration
require("../includes/config.php"); 

if (isset($_SESSION["id"]))
{
	redirect("index.php");
}

else
	header("Location: " . CS50::getLoginUrl(TRUST_ROOT, RETURN_TO));

?>