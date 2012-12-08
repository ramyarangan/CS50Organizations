<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
//        $success = count(query("SELECT * FROM users WHERE id=? AND password=?", $_SESSION["id"], crypt($_POST["password"])));
        
        $users = query("SELECT * FROM users WHERE id=?" , $_SESSION["id"])[0];
        $success=0;
        if (crypt($_POST["oldpassword"],$users["password"]) == $users["password"])
            $success=1;

        echo json_encode(array("success" => $success));
        //echo count($result);
    }
?>
