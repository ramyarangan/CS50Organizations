<?php

    // configuration
    require("../includes/config.php"); 
    
    $success = !empty($_GET["success"]);
        
    // if form was submitted
    if (!empty($_GET["club"]) && !empty($_SESSION["id"]))
    {
        $club = query("SELECT * FROM clubs WHERE name=?", $_GET["club"]);
        $club = $club[0];
        
        $privacy = 1;
        
        $user = query("SELECT * FROM users WHERE id=?", $_SESSION["id"]);
        $subscription = query("SELECT * FROM subscriptions WHERE userID=? AND clubID=?", $user[0]["id"],$club["id"]);

        if(!empty($subscription))
        {
            $privacy = $subscription[0]["level"];
            
            if ($privacy == 6)
            {
                
                $members = query("SELECT * FROM subscriptions JOIN users ON users.id = subscriptions.userID WHERE clubID=? AND level > 2 ORDER BY level, realname", $club["id"]);
                
                $pending = query("SELECT * FROM subscriptions JOIN users ON users.id = subscriptions.userID WHERE clubID= ? AND level = 2 ORDER BY realname", $club["id"]);
                
                $levels = query("SELECT * FROM privacy");
                
                render("editMembers_display.php", array("title" => $club["name"].": Edit Members", "clubInfo" => $club, "members" => $members, "pending" => $pending, "level" => $levels, "success" => $success));
            
            }
            else
                apologize("you're not an admin");
        }
        
        else
            apologize("you aren't even in this club...");
        
        

    }
    else
    {
        apologize("You must be logged in & specify a club");
    }
?>


