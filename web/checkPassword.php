<?php

/**
  checks if the entered password is correct.
**/

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $user = query("SELECT * FROM users WHERE name = ?", $_POST["username"]);
        

        $check = 0;
        if (crypt($_POST["password"], $user[0]["password"]) == $user[0]["password"])
        {
            $check = 1;
        }
        
        echo json_encode(array("check"=> $check));

        //echo count($result);
    }
?>
