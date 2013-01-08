<?php

/**
  a page where the user can send us (the creators) an email.
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
          $mail->SetFrom($_POST["email"], $_POST["name"]);

          // set To:
          $mail->AddAddress("contact.cs50organizations@gmail.com");

          // set Subject:
          $mail->Subject = $_POST["subject"];

          // set body
          $mail->Body = $_POST["body"];

          // send mail
          if ($mail->Send() == false)
          {
              die($mail->ErrInfo);
          }
          
        redirect("index.php?type=email&success=1"); 
        
    }
    else
    {
        if(isset($_SESSION["id"]))
        {
            $user = query("SELECT email, realname FROM users WHERE id=?", $_SESSION["id"]);
            $name = $user[0]["realname"];
            $email = $user[0]["email"];
        }
        else
        {
            $name = "";
            $email = "";
        }
        render_div("email_form.php", array("title"=> "CS50 Organizations: Contact Us", "name" =>$name, "email" => $email));
    }
?>
