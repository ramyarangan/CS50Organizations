<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
                
        // insert new user into database
        query("UPDATE users SET realname=? WHERE id=?", $_POST["first"]." ".$_POST["last"],$_SESSION["id"]);
        query("UPDATE users SET email=? WHERE id=?", $_POST["email"],$_SESSION["id"]);
        if($_POST["password"] != "")
            query("UPDATE users SET password=? WHERE id=?", crypt($_POST["password"]),$_SESSION["id"]);
                        
                            
        redirect("/");
        //obtain most recently allocated user id
    }
    else
    {
        // else render form
        $user = query("SELECT * FROM users WHERE id=?",$_SESSION["id"])[0];
        $end = strrpos($user["realname"]," ");
        $first = substr($user["realname"],0,$end);
        $last = substr($user["realname"],$end+1);        

        render("accountSettings_form.php", array("title" => "Account Settings", "first" => $first, "last" => $last, 
        "username" => $user["name"], "email" => $user["email"]));
    }
?>
