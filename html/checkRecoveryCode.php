<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $resultName = query("SELECT * FROM users WHERE name = ?", $_POST["username"]);
        
        $check = 0;
        if($resultName[0]["password"] == $_POST["code"])
            $check = 1;
        
        echo json_encode(array("check"=> $check));
        //echo count($result);
    }
?>
