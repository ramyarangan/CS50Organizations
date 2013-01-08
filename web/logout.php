<?php

/**
  Logs out the current user and redirects to home.
**/
    
    // configuration
    require("../includes/config.php"); 

    // log out current user, if any
    logout();

    // redirect user
    redirect("index.php");

?>
