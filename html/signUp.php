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
        $club = query("SELECT * FROM clubs WHERE name=?",$_GET["club"]);
        $club = $club[0];
        $user = query("SELECT * FROM users WHERE id=?",$_SESSION["id"])[0];
        $temp = query("SELECT * FROM subscriptions WHERE userID=? AND clubID=?",$user["id"],$club["id"]);
        
        if(!empty($temp))
        {
            print("You are already signed up!");
        }
        
        else if($club["privacy"] == 0)
        {
            $privacy = query("SELECT * FROM privacy WHERE description=\"pending\"");

            $privacy = $privacy[0]["level"];
            $result = query("INSERT INTO subscriptions (userID, clubID, level) VALUES(?, ?, ?)",$user["id"],$club["id"],
                $privacy);            
            
                redirect("allClubs.php?club=".str_replace(" ", "+", $club["name"]));
        }
        
        else
        {    

            $privacy = query("SELECT level FROM privacy WHERE description=\"non-comp\"");
            
            $privacy = $privacy[0]["level"];
            $result = query("INSERT INTO subscriptions (userID, clubID, level) VALUES(?, ?, ?)",$user["id"],$club["id"],
                $privacy);
            
            redirect("allClubs.php?club=".str_replace(" ", "+", $club["name"]));
        }
    }    
?>
