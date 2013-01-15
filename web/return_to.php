<?php

/**
  Login page. Compares entered password to the 
  user's password. Sets session id if successful.
**/


// configuration
require("../includes/config.php"); 

$user = CS50::getUser(RETURN_TO);

if($user !== false)
{
        // query database for user
        $rows = query("SELECT * FROM users WHERE name = ?", $user["identity"]);

        // if we found user,
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];
                
                //print("Logged in.");
                // redirect to portfolio
                redirect("/");
        }

        // else register
        else
        {   
			// insert new user into database
        	$result = query("INSERT INTO users (name, password, email, admin, realname) VALUES(?, ?, ?, 0, ?)",
                     $user["identity"], "", $user["email"], $user["fullname"]);
        
        	// if user not added, notify user      
        	if($result === false)
        	{
            	echo("The new user could not be added.");
        	}
        
        	//obtain most recently allocated user id
        	$rows = query("SELECT LAST_INSERT_ID() AS id");
        	$id = $rows[0]["id"];
        
        	// remember that the user is logged in by storing user's ID in session
        	$_SESSION["id"] = $id;
        
        
        	require("PHPMailer/class.phpmailer.php");
        	$mail = new PHPMailer();

        	// use SMTP
        	$mail->IsSMTP();
        	$mail->Host = "smtp.fas.harvard.edu";

        	// set From:
        	$mail->SetFrom("contact.cs50organizations@gmail.com", "CS50 Organizations");

          	// set To:
        	$mail->AddAddress($user["email"]);

          	// set Subject:
        	$mail->Subject = "Welcome to CS50 Organizations!";

          // set body
        	$mail->Body = "Hi ".$user["fullname"]."!";

          // send mail
          if ($mail->Send() == false)
          {
              die($mail->ErrInfo);
          }


        // redirect to portfolio
        redirect("/"); 
    }
}

// if logged in already, redirect to index
else
{
    redirect("index.php");
}
?>
