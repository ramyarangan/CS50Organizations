<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $resultName = query("SELECT * FROM users WHERE name = ?", $_POST["username"]);
        
        $resultEmail = query("SELECT * FROM users WHERE email = ?", $_POST["email"]);
        
        echo json_encode(array("name" => count($resultName), "email" => count($resultEmail)));
        //echo count($result);
    }
?>
