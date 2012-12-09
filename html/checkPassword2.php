<?php

/**
  also checks if the password is correct,
  when the user is changing the password.
**/

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
//        $success = count(query("SELECT * FROM users WHERE id=? AND password=?", $_SESSION["id"], crypt($_POST["password"])));
        
        $users = query("SELECT * FROM users WHERE id=?" , $_SESSION["id"]);
        $users = $users[0];
        $success=0;
        if (crypt($_POST["oldpassword"],$users["password"]) == $users["password"])
            $success=1;

        echo json_encode(array("success" => $success));
        //echo count($result);
    }
?>

