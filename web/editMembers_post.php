<?php

/**
  Updates the subscriptions of the users once
  the admin submits the edit members form.
**/

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $members = query("SELECT * FROM subscriptions WHERE clubID = ? AND level >= 2", $_POST["clubID"]);

        foreach($members as $member)
        {
            if ($_POST[$member["userID"]] == 0)
            {
                query("DELETE FROM subscriptions WHERE userID = ?", $member["userID"]);
            }
            
            else if ($_POST[$member["userID"]] != $member["level"])
            {
                query("UPDATE subscriptions SET level = ? WHERE userID = ? AND clubID = ?", $_POST[$member["userID"]], $member["userID"], $_POST["clubID"]);
            }
        }
                
        // redirect to home
        $club = query("SELECT name FROM clubs WHERE id = ?", $_POST["clubID"]);
        
        redirect("editMembers.php?club=".str_replace(" ", "+", $club[0]["name"])."&success=1"); 
    }
    else
    {
        apologize("How did you get here...");
    }
?>
