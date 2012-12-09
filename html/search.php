<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    
    if (!empty($_GET["search"]))
    {
        $isClub= strrpos($_GET["search"]," (club)");
        $isEvent = strrpos($_GET["search"]," (event)");
        $isAnn = strrpos($_GET["search"]," (announcement)");
        
        if($isClub != false)
        {
            $search = substr($_GET["search"],0,$isClub);            
            $clubs = query("SELECT * FROM clubs WHERE name= ?",$search);
            if(!empty($clubs))
                redirect("allClubs.php?club=".$clubs[0]["name"]);
        }
        else if($isEvent != false)
        {
            $search = substr($_GET["search"],0,$isEvent);            
            $events = query("SELECT * FROM events WHERE name= ?",$search);
            if(!empty($events))
                redirect("allClubs.php?club=".query("SELECT * FROM clubs WHERE id=?",$events[0]["id"])[0]["name"]);
        }
        else if($isAnn != false)
        {
            $search = substr($_GET["search"],0,$isAnn);            
            $announcements = query("SELECT * FROM announcements WHERE title= ?",$search);
            if(!empty($announcements))
                redirect("allClubs.php?club=".query("SELECT * FROM clubs WHERE id=?",$announcements[0]["id"])[0]["name"]);
        }              
          
        $search = $_GET["search"];

        $clubs = query("SELECT * FROM clubs WHERE name LIKE ?","%".$search."%");
        $announcements = query("SELECT * FROM announcements WHERE title LIKE ?", "%".$search."%");
        $events = query("SELECT * FROM events WHERE name LIKE ?", "%".$search."%");


        if(empty($clubs)&&empty($announcements)&&empty($events))
        {
            redirect("allClubs.php?search=1");
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
