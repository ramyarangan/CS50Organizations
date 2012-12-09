<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
                
        if (empty($_SESSION["id"]))
        {
            redirect("login.php?go=editSettings.php");
        }

        // if form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if($_POST["privacy"]=== "open")
            {
                query("UPDATE clubs SET privacy=true WHERE name=?", $_POST["name"]);
            }
            else
            {
                query("UPDATE clubs SET privacy=false WHERE name=?", $_POST["name"]);
            }
            
            query("UPDATE clubs SET information=? WHERE name=?", $_POST["info"], $_POST["name"]);
            query("UPDATE clubs SET email=? WHERE name=?", $_POST["email"], $_POST["name"]);

            
            $rows = query("SELECT * FROM clubs WHERE name = ?", $_POST["name"]);
            $clubID = $rows[0]["id"];
            // add appropriate club types for this club to the clubTypePairs database
            query("DELETE FROM clubTypePairs WHERE clubID=?",$clubID);
            if(isset($_POST["categories"]))
            {
                foreach($_POST["categories"] as $categoryID)
                {
                    $result = query("INSERT INTO clubTypePairs (clubID, clubTypeID) VALUES(?, ?)", 
                                    $clubID, $categoryID);
                    if($result === false)
                    {
                        apologize("The club's categories could not be stored.");
                    }
                }
            }
        // redirect to home
        redirect("/"); 
       //obtain most recently allocated user id
        }
    }
    else
    {
        $rows = query("SELECT * FROM clubTypes"); 
        $categories = array();
        foreach($rows as $row)
        {
            // since we want the "Other" category to be at the end of our form,
            // we will add this on the form separately
            //if($row["description"] != "Other")
                $categories[$row["id"]] = $row["description"];
        }
        
        // get the ID of the "Other" club category and pass to the form
        //$otherID = query("SELECT * FROM clubTypes WHERE description = 'Other'");
        //$otherID = $otherID[0]["id"];         
        

        // else render form
        $club = query("SELECT * FROM clubs WHERE name=?",$_GET["club"]);
        $club = $club[0];
        $clubTypes = query("SELECT * FROM clubTypePairs WHERE clubID=?", $club["id"]);
        $types = [];
        foreach($clubTypes as $clubType)
        {
            array_push($types, $clubType["clubTypeID"]);
        }
  
        render("editSettings_form.php", array("title" => "Edit Settings",
        "club" => $club, "categories" => $categories, "types" => $types));
    }
?>
