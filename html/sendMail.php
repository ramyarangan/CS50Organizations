<?php

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
          $club = query("SELECT * FROM clubs WHERE name=?", $_POST["club"]);
          $club = $club[0];
          $mail->AddAddress($club["email"]);

          // set Subject:
          $mail->Subject = $_POST["subject"];

          // set body
          $mail->Body = $_POST["body"];

          // send mail
          if ($mail->Send() == false)
          {
              die($mail->ErrInfo);
          }
          
        redirect("allClubs.php?club=".str_replace(" ", "+", $_POST["club"])."&type=email&success=1"); 
        
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
        render_div("email_form.php", array("club" => $_GET["club"], "name" =>$name, "email" => $email));
    }
?>
