<?php

    // configuration
    require("../includes/config.php"); 

    $alert = NULL;
    
    // if form was submitted
    if (!empty($_GET["club"]))
    {
        $club = query("SELECT * FROM clubs WHERE name=?", $_GET["club"]);
        if(empty($club))
            redirect("allClubs.php");
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
                if ($privacy == 1)
                    $alert = "This is a closed club. Your membership is pending admin approval.";
            }
            
            if(isset($_GET["success"]))
            {
                if ($_GET["success"] == 1)
                {
                    switch($_GET["type"])
                    {
                        case "email":
                            $alert = "Your message was successfully sent!";
                            break;
                        case "subscribe":
                            $alert = "You have successfully subscribed to notifications!";
                            break;
                        case "announcement":
                            $alert = "Your announcement has been saved. Check it out below!";
                            break;
                    }
                }
            }
        }
        $announcements = query("SELECT * FROM announcements WHERE id=? AND privacy <= ? ORDER BY time DESC", $club["id"], $privacy);
        $subscription = query("SELECT * FROM subscriptions WHERE userID=? AND clubID=?", $_SESSION["id"], $club["id"]);
        
        render("club_display.php", array("title" => $club["name"]." ".$club["abbreviation"] , "clubInfo" => $club, "announcements" => $announcements, "level" => $privacy, "alert" => $alert, "subscription" => $subscription));

        
    }
    else
    {
        $clubs = query("SELECT * FROM clubs");
        render("clubs_page.php", array("title" => "All Clubs", "clubs" => $clubs));
    }
?>


