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
                if ($privacy == 2)
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
        else
            $alert = "<a href=\"login.php\">Sign in</a> or <a href=\"register.php\">register</a> to view additional events and announcements and to subscribe to this club's feed.";
        
        //get url
        
        $url = "vkd9mihk989ohsv6lhr1i89m0o@group.calendar.google.com&amp;src=";
        for($i = 1; $i <= $privacy; $i++)
        {
            $temp = query("SELECT link FROM calendarLinks WHERE id = ?", 
                          $club["id"] . "." . $i)[0]["link"]; 
            $temp = substr($temp,38, strlen($temp) -51);
            $url = $url . $temp;
            $url = $url . "&amp;src=";
        }
        //remove extra from last loop
        $url = substr($url, 0, strlen($url)-9);
        $url = "https://www.google.com/calendar/embed?src=".$url;

        $announcements = query("SELECT * FROM announcements WHERE id = ? AND privacy <= ? ORDER BY time DESC", $club["id"], $privacy);
        
        /*if (count($announcements)== 0)
        {
            apologize("wtf".$club["id"]);
        }*/
        
        if(isset($_SESSION["id"]))
            $subscription = query("SELECT * FROM subscriptions WHERE userID=? AND clubID=?", $_SESSION["id"], $club["id"]);
        else 
            $subscription = array(0 => array("subscription" => "0"));
        
       // print($url);
        render("club_display.php", array("title" => "CS50 Organizations: ".$club["name"], "clubInfo" => $club, "alerts" => $announcements, "level" => $privacy, "alert" => $alert, "subscription" => $subscription, "calUrl" => $url));

        
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


