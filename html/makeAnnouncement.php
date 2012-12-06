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
        $fields = array("club","name", "privacy", "info");
        
        checkForm($fields);
        
        $clubs  = query("SELECT * FROM clubs WHERE id = ?", $_POST["club"]);
        $clubName = $clubs[0]["name"];
        
        //add announcement
        $result = query("INSERT INTO announcements (id, userID, text, title, privacy) VALUES(?, ?, ?, ?, ?)",
                    $_POST["club"], $_SESSION["id"], $_POST["info"], $_POST["name"], $_POST["privacy"]);
        
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

        
        //redirect to portfolio
        redirect("/");
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
?>
