<?php

/**
  Allows an admin to make a new event for a club and
  adds the event to the database. 
**/

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
        $startDatetime = mysql_real_escape_string($_POST["startDatetime"]);
        $endDatetime = mysql_real_escape_string($_POST["endDatetime"]);
        
        // insert new event into database
        $result = query("INSERT INTO events (id, privacy, name, location, startTime, endTime, information) 
                VALUES(?, ?, ?, ?, STR_TO_DATE(?, '%m/%d/%Y %H:%i'), STR_TO_DATE(?, '%m/%d/%Y %H:%i'), ?)",
                $_POST["club"], $_POST["privacy"], $_POST["name"], $_POST["location"],
                $startDatetime, $endDatetime, $_POST["info"]);
        
        // if event not added, notify user      
        if($result === false)
        {
            apologize("The new club could not be added.");
        }
        
        $clubs  = query("SELECT * FROM clubs WHERE id = ?", $_POST["club"]);
        $clubName = $clubs[0]["name"];
        $theclub = $clubs[0];
        
        $userName = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        $userName = $userName[0]["realname"];
        //add notification of new event
        $result = query("INSERT INTO announcements (id, userID, text, title, privacy) VALUES(?, ?, ?, ?, ?)",
                    $_POST["club"], 0, $userName . ' has added the event ' . $_POST["name"] . '. Go check it out!', 
                    $_POST["name"], $_POST["privacy"]);
                   
        
        if($result === false)
        {
            apologize("The corresponding event announcement could not be added.");
        }
        
        $members = query("SELECT * FROM subscriptions WHERE clubID = ?", $_POST["club"]);
        
        foreach($members as $member)
        {
            if($member["level"] >= $_POST["privacy"])
            {
                query("INSERT INTO notifications (userID, time, text, seen, redirect) VALUES(?, NOW(), ?, 0, ?)", $member["userID"], 
                    $clubName . ' has added the event: ' . $_POST["name"] . '!',"allClubs.php?club=".$clubName);
                            require("PHPMailer/class.phpmailer.php");
                if($member["subscription"] == 1 || $member["subscription"] == 3)
                {    
                    $mail = new PHPMailer();

                    // use SMTP
                    $mail->IsSMTP();
                    $mail->Host = "smtp.fas.harvard.edu";

                    // set From:
                    $mail->SetFrom($theclub["email"], $theclub["name"]);

                    // set To:
                    $user = query("SELECT * FROM users WHERE id=?",$member["userID"]);
                    $user = $user[0];
                    $mail->AddAddress($user["email"]);

                    // set Subject:
                    $mail->Subject = "New Event";

                    // set body
                    $mail->Body = $clubName." has added a new event: ".$_POST["name"]."!";

                    // send mail
                    if ($mail->Send() == false)
                    {
                      die($mail->ErrInfo);
                    }
                }
                if($member["subscription"] == 2 || $member["subscription"] == 3)
                {  
                    $mail = new PHPMailer();
                    $mail->IsSMTP();                // Sets up a SMTP connection  
                    $mail->SMTPDebug  = 2;          // This will print debugging info  
                    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization  
                    $mail->SMTPSecure = "tls";      // Connect using a TLS connection  
                    $mail->Host = "smtp.gmail.com";  
                    $mail->Port = 587;  
                    $mail->Encoding = '7bit';       // SMS uses 7-bit encoding  
                    // Authentication  
                    $mail->Username   = "cs50organizations@gmail.com"; // Login  
                    $mail->Password   = "crimsongroups"; // Password  
                    // Compose  
                    $mail->Subject = "New Event";
                    $mail->Body = $clubName." added a new event: ".$_POST["name"]."!";
                    // Send To  
                    $user = query("SELECT * FROM users WHERE id=?",$member["userID"]);
                    $user = $user[0];
                    $mail->AddAddress($user["number"] ); // Where to send it  
                    // send mail
                    if ($mail->Send() == false)
                    {
                      die($mail->ErrInfo);
                    }

                }

            } 
        }
        
        
        //$maxPrivacy = query("SELECT MAX(level) FROM privacy")[0]["MAX(level)"];
        
        $maxPrivacy = $_POST["privacy"];
        for($privacy = $_POST["privacy"]; $privacy <= $maxPrivacy; $privacy++)
        {
            $gc = new Zend_Gdata_Calendar($_SESSION["client"]);
            
            $newEntry = $gc->newEventEntry();
            $newEntry->title = $gc->newTitle($_POST["name"]);
            $newEntry->where  = array($gc->newWhere($_POST["location"]));

            $newEntry->content = $gc->newContent($_POST["info"]);
            $newEntry->content->type = 'text';

            $when = $gc->newWhen();
            $calStartDate = date('c', strtotime($startDatetime));
            $calEndDate = date('c', strtotime($endDatetime));;
            $when-> startTime = $calStartDate;
            $when-> endTime = $calEndDate;
            

            $newEntry->when = array($when);
            
            $url  = query("SELECT link FROM calendarLinks WHERE id = ?", 
                    $_POST["club"] . "." . $privacy);
            $url = $url[0]["link"];

            $createdEntry = $gc->insertEvent($newEntry, $url);
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
            if($row["description"]!= "pending")
                $privacy[$row["description"]] = $row["level"];
        }
        
        // render form
        render("makeEvent_form.php", array("title" => "CS50 Organizations: Create Event", "clubsOwned" => $clubsOwned, "privacy" => $privacy));
    }
?>
