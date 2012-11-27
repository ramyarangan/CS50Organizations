<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        $fields = array("name","info", "email", "privacy");
        checkForm($fields);
        
        $abbreviation = strtoupper($_POST["abbreviation"]);
        
        $privacy = false;
        if($_POST["privacy"]=== "open")
        {
            $privacy = true;
        }
        // insert new user into database
        $result = query("INSERT INTO clubs (name, abbreviation, email, privacy, information) 
                VALUES(?, ?, ?, ?, ?)", $_POST["name"], $abbreviation, $_POST["email"],
                $privacy, $_POST["info"]);
        
        // if user not added, notify user      
        if($result === false)
        {
            apologize("The new club could not be added.");
        }
        
        $rows = query("UPDATE users SET admin = ? WHERE id = ?", true, $_SESSION["id"]);
        
        $rows = query("SELECT * FROM clubs WHERE name = ?", $_POST["name"]);
        $privacy = query("SELECT * FROM privacy WHERE level = admin"); 
        
        // insert new user into database
        $result = query("INSERT INTO subscriptions (userID, clubID, level) 
                VALUES(?, ?, ?)", $_SESSION["id"], $rows[0]["id"], $privacy[0]["level"]);
        // if user not added, notify user      
        if($result === false)
        {
            apologize("Your subscription to this club could not be added to the database.");
        }        
        
        // redirect to portfolio
        redirect("/"); 
    }
    else
    {
        // else render form
        render("createClub_form.php", ["title" => "Register"]);
    }
?>
