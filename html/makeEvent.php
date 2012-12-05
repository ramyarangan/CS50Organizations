<?php

    // configuration
    require("../includes/config.php");

    if (empty($_SESSION["id"]))
    {
        redirect("login.php?go=makeEvent.php");
    }

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //validate submission
        $fields = array("club","name", "privacy", "startDatetime", "endDatetime");
        
        checkForm($fields);
        
        // Connect
        $link = mysql_connect(ini_get("mysql.default_host"), USERNAME, PASSWORD)
            OR die(mysql_error());

        //add seconds component to the time
        $startTime = mysql_real_escape_string($_POST["startDatetime"]);
        $endTime = mysql_real_escape_string($_POST["endDatetime"]);
        
        print($_POST["club"] . "\n");
        print($_POST["privacy"] . "\n");
        print($_POST["name"] . "\n");
        print($_POST["info"] . "\n");
        print($startTime);
        
        // insert new event into database
        $result = query("INSERT INTO events (id, privacy, name, location, startTime, endTime, information) 
                VALUES(?, ?, ?, ?, STR_TO_DATE(?, '%m/%d/%Y %H:%i'), STR_TO_DATE(?, '%m/%d/%Y %H:%i'), ?)",
                $_POST["club"], $_POST["privacy"], $_POST["name"], $_POST["location"],
                $startTime, $endTime, $_POST["info"]);
        
        // if event not added, notify user      
        if($result === false)
        {
            apologize("The new club could not be added.");
        }
        
        $clubs  = query("SELECT * FROM clubs WHERE id = ?", $_POST["club"]);
        $clubName = $clubs[0]["name"];
        
        //add notification of new event
        $result = query("INSERT INTO announcements (id, text, title, privacy) VALUES(?, ?, ?, ?)",
                    $_POST["club"], $clubName . ' has added the event ' . $_POST["name"] . '. Go check it out!', 
                    $_POST["name"], $_POST["privacy"]);
        
        if($result === false)
        {
            apologize("The corresponding event announcement could not be added.");
        }
        
        //redirect to home page
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
        
        // create list of privacy settings to display on form
        $rows = query("SELECT * FROM privacy"); 
        $privacy = array();
        
        foreach($rows as $row)
        {
            $privacy[$row["description"]] = $row["level"];
        }
        
        // render form
        render("makeEvent_form.php", array("title" => "Make New Event", "clubsOwned" => $clubsOwned, "privacy" => $privacy));
    }
?>
