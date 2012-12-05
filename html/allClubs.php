<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if (!empty($_GET["club"]))
    {
        $club = query("SELECT * FROM clubs WHERE name=?", $_GET["club"]);
        $club = $club[0];
        $privacy = 1;
        if (!empty($_SESSION["id"]))
        {
            $user = query("SELECT * FROM users WHERE id=?", $_SESSION["id"]);
            $user = $user[0];
            $subscription = query("SELECT * FROM subscriptions WHERE userID=? AND clubID=?", $user["id"],$club["id"]);
            if(!empty($subscription))
            {
                $privacy = $subscription[0]["level"];
            }
        }
        
        $announcements = query("SELECT * FROM announcements WHERE id=? AND privacy <= ? ORDER BY time DESC", $club["id"], $privacy);
        
        render("club_display.php", array("title" => $club["name"]." ".$club["abbreviation"] , "clubInfo" => $club, "announcements" => $announcements, "level" => $privacy));
    }
    else
    {
        $clubs = query("SELECT * FROM clubs");
        render("clubs_page.php", array("title" => "All Clubs", "clubs" => $clubs));
    }
?>


