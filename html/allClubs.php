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
        if(isset($_SESSION["id"]))
            $subscription = query("SELECT * FROM subscriptions WHERE userID=? AND clubID=?", $_SESSION["id"], $club["id"]);
        else $subscription = array(0 => array("subscription" => "0"));
        render("club_display.php", array("title" => $club["name"]." ".$club["abbreviation"] , "clubInfo" => $club, "announcements" => $announcements, "level" => $privacy, "alert" => $alert, "subscription" => $subscription));

        
    }
    else
    {
        $clubTypes = query("SELECT * FROM clubTypes ORDER BY description");
        
        $sortedClubs = array(); 
        
        foreach($clubTypes as $type)
        {
            $sortedClubs[] = array("type" => $type["description"], "clubs" => query("SELECT * FROM clubs JOIN clubTypePairs ON clubs.id = clubTypePairs.clubID WHERE clubTypeID = ? ORDER BY name", $type["id"]));
        }
        
        $allClubs = query("SELECT * FROM clubs ORDER BY name");
        
        render("allClubs_display.php", array("title" => "All Clubs", "allClubs" => $allClubs, "sortedClubs" => $sortedClubs, "clubTypes" => $clubTypes));
    }
?>


