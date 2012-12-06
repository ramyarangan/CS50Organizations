<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if(empty($_SESSION["id"]))
    {
        print("You must be logged in.");
    }
    
    else
    {   
        $club = query("SELECT * FROM clubs WHERE name=?",$_GET["club"]);
        $club = $club[0];
        $user = query("SELECT * FROM users WHERE id=?",$_SESSION["id"])[0];
        $temp = query("SELECT * FROM subscriptions WHERE userID=? AND clubID=?",$user["id"],$club["id"]);
        
        if(!empty($temp))
        {
            print("You are already signed up!");
        }
        
        else if($club["privacy"] == 0)
        {
<<<<<<< HEAD
            require("PHPMailer/class.phpmailer.php");
            $mail = new PHPMailer();

            // use SMTP
            $mail->IsSMTP();
            $mail->Host = "smtp.fas.harvard.edu";

            $mail->SetFrom("cs50organizations@gmail.com");

            // set To:
            $mail->AddAddress($club["email"]);

            // set Subject:
            $mail->Subject = "Request to Join Club";

            // set body
            $mail->Body = $user["name"]." would like to join your club.";

            // send mail
            if ($mail->Send() == false)
            {
                die($mail->ErrInfo);
            }
          
            redirect("allClubs.php?club=".str_replace(" ", "+", $club["name"]));
=======
            $privacy = query("SELECT * FROM privacy WHERE description=\"public\"");
            $privacy = $privacy[0]["level"];
            $result = query("INSERT INTO subscriptions (userID, clubID, level) VALUES(?, ?, ?)",$user["id"],$club["id"],
                $privacy);            
            print("Your request to join the club has been sent!");
>>>>>>> upstream/master

        }
        
        else
        {    

            $privacy = query("SELECT level FROM privacy WHERE description=\"all club\"");
            $privacy = $privacy[0]["level"];
            $result = query("INSERT INTO subscriptions (userID, clubID, level) VALUES(?, ?, ?)",$user["id"],$club["id"],
                $privacy);
            
            redirect("allClubs.php?club=".str_replace(" ", "+", $club["name"]));
        }
    }    
?>
