<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if (!empty($_POST["searchSubject"]))
    {
        $clubs = query("SELECT * FROM clubs WHERE name LIKE ?", $_POST["searchSubject"]."%");
        $announcements = query("SELECT * FROM announcements WHERE text LIKE ?", "%".$_POST["searchSubject"]."%");

        if(empty($clubs)&&empty($announcements))
        {
            print("No results were found.");
        }

        if (!empty($clubs))
        {   
        print("<h3>Clubs</h3>");    
        foreach($clubs as $club)
        {
            print($club["name"]);
            print("</br>");
        }
        }
        if (!empty($announcements))
        {
                print("<h3>Announcements</h3>");    

        foreach($announcements as $announcement)
        {
            print($announcement["text"]);
            print("</br>");
        }
    }
    }
    else
    {
        redirect("allClubs.php");
    }
?>
