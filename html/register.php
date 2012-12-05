<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["realname"]))
        {
            apologize("You must provide your name.");
        }
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Your password must match the confirmation.");
        }
        else if (empty($_POST["email"]))
        {   
            apologize("You must provide your email.");
        }
        
        // insert new user into database
        $result = query("INSERT INTO users (name, password, email, admin, realname) VALUES(?, ?, ?, 0, ?)",
                     $_POST["username"], crypt($_POST["password"]), $_POST["email"], $_POST["realname"]);
        
        // if user not added, notify user      
        if($result === false)
        {
            apologize("The new user could not be added.");
        }
        
        //obtain most recently allocated user id
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];
        
        // remember that the user is logged in by storing user's ID in session
        $_SESSION["id"] = $id;
        
        // redirect to portfolio
        redirect("/"); 
    }
    else
    {
        // else render form
        render("register_form.php", array("title" => "Register"));
    }
?>
