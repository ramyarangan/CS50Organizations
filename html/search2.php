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
        
        for ($i = 0; $i < count($announcements); $i++) 
        {
            $announcements[$i]["clubName"] = query("SELECT * FROM clubs WHERE id = ?", $announcements[$i]["id"])[0]["name"];
        }
        
        for ($i = 0; $i < count($events); $i++)
        {
            $events[$i]["club"] = query("SELECT * FROM clubs WHERE id=?", $events[$i]["id"])[0]["name"];
        }

        render("search_page.php", array("title" => "CS50 Organizations: Search Results", "clubRows" => $clubs, "annRows" => $announcements, "eventRows" => $events));
    }
    else
        render("search_page.php", array("title" => "CS50 Organizations: Search Results", "alert" => "Error: You seem to have clicked a wrong link...")); 
?>

