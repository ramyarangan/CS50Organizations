<?php

/**
  Allows a user to recover their password by 
  sending the user an email with a recovery code.   
**/

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require("PHPMailer/class.phpmailer.php");
        $mail = new PHPMailer();

          // use SMTP
          $mail->IsSMTP();
          $mail->Host = "smtp.fas.harvard.edu";

          // set From:
          $mail->SetFrom("cs50organizations@gmail.com", "CS50 Organizations");

          // set To:
          $mail->AddAddress($_POST["email"]);

          // set Subject:
          $mail->Subject = "Password Recovery Request";
           
          // set body
          $user = query("SELECT * FROM users WHERE email = ?", $_POST["email"]);
          
          
            $link = mysql_connect(ini_get("mysql.default_host"), USERNAME, PASSWORD)
            OR die(mysql_error());
            $password = mysql_real_escape_string($user[0]["password"]); 
                       
          $body = "You have made a password recovery request for CS50 Organizations. This request corresponds to the
                following username: " . $user[0]["name"] . " \n Please visit the following link to recover your password: http://project/recover_post.php.
                \n When prompted for your passcode, please use the following string: " . $password . "\n Thank you for using CS50 Organizations.";
          $mail->Body = $body;

          // send mail
          if ($mail->Send() == false)
          {
              die($mail->ErrInfo);
          }
          
          redirect("recover_post.php?success=1");
        
    }
    else
    {
        
        render("recover_form.php", array("title"=>"CS50 Organizations: Recover Password"));
    }
?>
