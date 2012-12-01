<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        $fields = array("name","info", "email", "privacy", "categories");
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
        
        $rows = query("SELECT * FROM clubs WHERE name = ?", $_POST["name"]);
        $clubID = $rows[0]["id"];
        // add appropriate club types for this club to the clubTypePairs database
        foreach($_POST["categories"] as $categoryID)
        {
            $result = query("INSERT INTO clubTypePairs (clubID, clubTypeID) VALUES(?, ?)", 
                            $clubID, $categoryID);
            if($result === false)
            {
                apologize("The club's categories could not be stored.");
            }
        }
        
        // mark user as an administrator        
        $rows = query("UPDATE users SET admin = ? WHERE id = ?", true, $_SESSION["id"]);
        

        $privacy = query("SELECT * FROM privacy WHERE description = 'admin'"); 
        
        // insert user into subscriptions database (as an admin for this club)
        $result = query("INSERT INTO subscriptions (userID, clubID, level) 
                VALUES(?, ?, ?)", $_SESSION["id"], $clubID, $privacy[0]["level"]);
        // if user subscription not added, notify user      
        if($result === false)
        {
            apologize("Your subscription to this club could not be added to the database.");
        }        
        
        // redirect to home
        redirect("/"); 
    }
    else
    {
        
        // pass the createClub_form the list of possible club types
        $rows = query("SELECT * FROM clubTypes"); 
        $categories = array();
        foreach($rows as $row)
        {
            // since we want the "Other" category to be at the end of our form,
            // we will add this on the form separately
            if($row["description"] != "Other")
                $categories[$row["id"]] = $row["description"];
        }
        
        // get the ID of the "Other" club category and pass to the form
        $otherID = query("SELECT * FROM clubTypes WHERE description = 'Other'")[0]["id"];         
        
        // render form
        render("createClub_form.php", ["title" => "Register", "categories" => $categories, 
            "otherID" => $otherID]);
    }
?>
