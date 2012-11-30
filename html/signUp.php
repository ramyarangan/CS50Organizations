<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if(empty($_SESSION["id"]))
    {
        print("You must be logged in.");
    }
    else
    {   
        $club = query("SELECT * FROM clubs WHERE name=?",$_GET["club"])[0];
        $user = query("SELECT * FROM users WHERE id=?",$_SESSION["id"])[0];
        $temp = query("SELECT * FROM subscriptions WHERE userID=? AND clubID=?",$user["id"],$club["id"]);
        if(!empty($temp))
        {
            print("You are already signed up!");
        }
        else
        {    
            $result = query("INSERT INTO subscriptions (userID, clubID, level) VALUES(?, ?, 2)",$user["id"],$club["id"]);
            
            print("You are now signed up!");
        }
    }    
?>
