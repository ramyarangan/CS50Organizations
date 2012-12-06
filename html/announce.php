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
          if (!empty($_SESSION["id"]))
          {
              $user = query("SELECT * FROM users WHERE id=?", $_SESSION["id"]);
              $user = $user[0];
              $mail->SetFrom($user["email"]);
          }
          else
          {
              $mail->SetFrom($_POST["email"]);
          }
          // set To:
          $club = query("SELECT * FROM clubs WHERE name=?",$_POST["club"]);
          $club = $club[0];
          $mail->AddAddress($club["email"]);
          $mail->AddAddress("lcheng@college.harvard.edu");


          // set Subject:
          $mail->Subject = $_POST["subject"];

          // set body
          $mail->Body = $_POST["body"];

          // send mail
          if ($mail->Send() == false)
          {
              die($mail->ErrInfo);
          }
          
          print("Sent!");
        
    }
    else
    {
        render_div('email_form.php',array("club" => $_GET["club"]));
    }
?>
