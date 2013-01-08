<?php
    require("../includes/config.php"); 
    
        // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    { 
        $result = query("UPDATE users SET password = ? WHERE name = ?", crypt($_POST["password"]), $_POST["username"]); 
        if($result!== false)
            $alert = "You have successfully changed your password!";
        $alert = "Sorry! Your password has not successfully been changed.";
        render("home.php", array("title" => "Home", "alert" => $alert));
    }
    else
    {
        $alert = NULL;
        if($_GET["success"]==1) $alert = "Check your email for your recovery code."; 
        render("recover_post_form.php", array("title"=>"CS50 Organizations: Reset Password", "alert" => $alert));
    }
?>
