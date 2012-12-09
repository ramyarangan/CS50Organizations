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
        
        $theclub = $clubs[0];
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
            {
                query("INSERT INTO notifications (userID, time, text, seen, redirect) VALUES(?, NOW(), ?, 0, ?)", $member["userID"], 
                    $clubName . ' has added the announcement: '.$_POST["name"].'!',"allClubs.php?club=".$clubName);
                    
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
                    $user = query("SELECT * FROM users WHERE id=?",$member["userID"])[0];
                    $mail->AddAddress($user["email"]);

                    // set Subject:
                    $mail->Subject = "New Announcement";

                    // set body
                    $mail->Body = $clubName." posted: ".$_POST["name"]."!";

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
                    $mail->Subject = "New Announcement";
                    $mail->Body = $clubName." posted: ".$_POST["name"]."!";
                    // Send To  
                    $user = query("SELECT * FROM users WHERE id=?",$member["userID"])[0];
                    $mail->AddAddress($user["number"] ); // Where to send it  
                    // send mail
                    if ($mail->Send() == false)
                    {
                      die($mail->ErrInfo);
                    }

                }
                    
            }
        }

        //redirect to club home
        redirect("allClubs.php?club=".str_replace(" ", "+", $clubs[0]["name"])."&type=announcement&success=1"); 
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
            //print($privacy. " ". $rows[0]["clubID"]);
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
