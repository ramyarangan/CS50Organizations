<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if (!empty($_GET["search"]))
    {
        $clubs = query("SELECT * FROM clubs WHERE name= ?",$_GET["search"]);
        $announcements = query("SELECT * FROM announcements WHERE title = ?", $_GET["search"]);
        $events = query("SELECT * FROM events WHERE name = ?", $_GET["search"]);

        if(count($clubs)+count($announcements)+count($events)==1)
        {
            if(!empty($clubs))
                redirect("allClubs.php?club=".$clubs[0]["name"]);
            if(!empty($announcements))
            {
                redirect("allClubs.php?club=".query("SELECT * FROM clubs WHERE id=?",$announcements[0]["id"])[0]["name"]);
            }
            if(!empty($events))
            {
                redirect("allClubs.php?club=".query("SELECT * FROM clubs WHERE id=?",$events[0]["id"])[0]["name"]);
            }                
        }
        
        $clubs = query("SELECT * FROM clubs WHERE name LIKE ?","%".$_GET["search"]."%");
        $announcements = query("SELECT * FROM announcements WHERE title LIKE ?", "%".$_GET["search"]."%");
        $events = query("SELECT * FROM events WHERE name LIKE ?", "%".$_GET["search"]."%");


        if(empty($clubs)&&empty($announcements)&&empty($events))
        {
            redirect("allClubs.php");
        }
        

        if (!empty($clubs))
        {   
            print("<h3>Clubs</h3>");    
            foreach($clubs as $club)
            {
                print("<a href=\"allClubs.php?club=".$club["name"]."\">".$club["name"]."</a>");
                print("</br>");
            }
        }
        if (!empty($announcements))
        {
            print("<h3>Announcements</h3>");    

            foreach($announcements as $announcement)
            {
                print("<a href=\"allClubs.php?club=".query("SELECT * FROM clubs WHERE id=?",$announcement["id"])[0]["name"]
                ."\">".$announcement["title"]."</a>");
                print("</br>");
            }
        }
        if (!empty($events))
        {
            print("<h3>Events</h3>");    

            foreach($events as $event)
            {
                print("<a href=\"allClubs.php?club=".query("SELECT * FROM clubs WHERE id=?",$event["id"])[0]["name"]
                ."\">".$event["name"]."</a>");
                print("</br>");
            }
        }
        
    }
    else
    {
        redirect("allClubs.php");
    }
?>
