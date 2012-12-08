<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $user = query("SELECT * FROM users WHERE id=?",$_SESSION["id"])[0];
                  
        $resultEmail = query("SELECT * FROM users WHERE email = ?", $_POST["email"]);
        
        if ($user["email"] == $_POST["email"])
        {
            echo json_encode(array("email" => 0));            
        }
        else
        {
            echo json_encode(array("email" => count($resultEmail)));
        }    
        //echo count($result);
    }
?>
