<?php

    // configuration
    require("../includes/config.php");

    if (empty($_SESSION["id"]))
    {
        redirect("login.php?go=makeAnnouncement.php");
    }

    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //validate submission
        $fields = array("club","name", "privacy", "info", "all");
        
        checkForm($fields);
        
        if ($_POST["all"]==1)
            $clubs = query("SELECT * FROM clubs WHERE id = ?", $_POST["club"]);
        else
            $clubs = query("SELECT * FROM clubs WHERE name = ?", $_POST["club"]);
        
        if (empty($clubs))
            apologize("wtf");
        
        $clubName = $clubs[0]["name"];
        $clubID = $clubs[0]["id"];
        
        //add announcement
        $result = query("INSERT INTO announcements (id, userID, text, title, privacy) VALUES(?, ?, ?, ?, ?)",
                    $clubID, $_SESSION["id"], $_POST["info"], $_POST["name"], $_POST["privacy"]);
        
        if($result === false)
        {
            apologize("The corresponding event announcement could not be added.");
        }
        
        $members = query("SELECT * FROM subscriptions WHERE clubID = ?", $_POST["club"]);

        foreach($members as $member)
        {
            if($member["level"] >= $_POST["privacy"])
                query("INSERT INTO notifications (userID, time, text, seen) VALUES(?, NOW(), ?, 0)", $member["userID"], 
                    $clubName . ' has added the announcement: '.$_POST["name"].'!');
        }

        //redirect to club home
        redirect("allClubs.php?club=".str_replace(" ", "+", $clubs[0]["name"])."&success=1"); 
    }
    
    else
    {
        $clubsOwned = array();
        
        if (!empty($_GET["club"]))
        {            
            $rows = query("SELECT * FROM privacy"); 
            $privacy = array();
            
            foreach($rows as $row)
            {
                $privacy[$row["description"]] = $row["level"];
            }
            
            render_div("makeAnnouncement_form.php", array("title" => "Make New Announcement", 
                "clubName" => $_GET["club"], "privacy" => $privacy));
        }

        else
        {
            // create list of clubs that the currently logged in user owns
            $privacy = query("SELECT * FROM privacy WHERE description = 'admin'");
            $privacy = $privacy[0]["level"]; 
            $rows = query("SELECT * FROM subscriptions WHERE userID = ? AND level = ?", $_SESSION["id"], $privacy);
            $clubsOwned = array();

            foreach($rows as $row)
            {
                $club = query("SELECT * FROM clubs WHERE id = ?", $row["clubID"]);
                $clubsOwned[$row["clubID"]] = $club[0]["name"];
            }
            
            $rows = query("SELECT * FROM privacy"); 
            $privacy = array();
            
            foreach($rows as $row)
            {
                $privacy[$row["description"]] = $row["level"];
            }
            
            render("makeAnnouncement_form.php", array("title" => "Make New Announcement", 
                "clubsOwned" => $clubsOwned, "privacy" => $privacy));
        }
        
        
    }
?>
