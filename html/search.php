<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if (!empty($_GET["search"]))
    {
        $clubs = query("SELECT * FROM clubs WHERE name LIKE ?", $_GET["search"]."%");
        $announcements = query("SELECT * FROM announcements WHERE text LIKE ?", "%".$_GET["search"]."%");

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
