<?php
    require("../includes/config.php"); 
        require("PHPMailer/class.phpmailer.php");

// Instantiate Class  
$mail = new PHPMailer();  
// Set up SMTP  
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
$mail->Subject = "Testing";     // Subject (which isn't required)  
$mail->Body = "Testing";        // Body of our message  
// Send To  
$mail->AddAddress("4085823798@txt.att.net" ); // Where to send it  
var_dump( $mail->send() );      // Send! 
?>
