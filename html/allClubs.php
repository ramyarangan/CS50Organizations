<?php

    // configuration
    require("../includes/config.php"); 

    $alert = NULL;
    
    // if form was submitted
    if (!empty($_GET["club"]))
    {
        $club = query("SELECT * FROM clubs WHERE name=?", $_GET["club"])[0];
        $privacy = 1;
        
        if (!empty($_SESSION["id"]))
        {
            $user = query("SELECT * FROM users WHERE id=?", $_SESSION["id"])[0];
            $subscription = query("SELECT * FROM subscriptions WHERE userID=? AND clubID=?", $user["id"],$club["id"]);
            
            if(!empty($subscription))
            {
                $privacy = $subscription[0]["level"];
                if ($privacy == 1)
                    $alert = "This is a closed club. Your membership is pending admin approval.";
            }
        }
        $announcements = query("SELECT * FROM announcements WHERE id=? AND privacy <= ? ORDER BY time DESC", $club["id"], $privacy);
        
        render("club_display.php", ["title" => $club["name"]." ".$club["abbreviation"] , "clubInfo" => $club, "announcements" => $announcements, "level" => $privacy, "alert" => $alert]);
    }
    else
    {
        $clubs = query("SELECT * FROM clubs");
        render("clubs_page.php", ["title" => "All Clubs", "clubs" => $clubs]);
    }
?>


