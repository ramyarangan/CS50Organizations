<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //validate submission
        $fields = array("club","name", "privacy", "info");
        
        checkForm($fields);
        
        $clubs  = query("SELECT * FROM clubs WHERE id = ?", $_POST["club"]);
        $clubName = $clubs[0]["name"];
        
        //add announcement
        $result = query("INSERT INTO announcements (id, text, title, privacy) VALUES(?, ?, ?, ?)",
                    $_POST["club"], $_POST["info"], $_POST["name"], $_POST["privacy"]);
        
        if($result === false)
        {
            apologize("The corresponding event announcement could not be added.");
        }
        
        //redirect to portfolio
        redirect("/");
    }
    else
    {
        // else render stock sale form, passing the user's stock information
        $rows = query("SELECT * FROM subscriptions WHERE userID = ? AND level = 4", $_SESSION["id"]);
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
        
        render("makeAnnouncement_form.php", ["title" => "Make New Announcement", 
                "clubsOwned" => $clubsOwned, "privacy" => $privacy]);
    }
?>
