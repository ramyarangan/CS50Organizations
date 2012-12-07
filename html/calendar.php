<?php
    
    // configuration
    require("../includes/config.php");

    $url = "";
    
    if(isset($_POST["eventsOption"]))
    {    
     $url = $url . "vkd9mihk989ohsv6lhr1i89m0o@group.calendar.google.com&amp;src=";
    //display all public events
    if($_POST["eventsOption"]==="public")
    {
        $allClubIDs = query("SELECT id FROM clubs");
        $public = query("SELECT level FROM privacy WHERE description = \"public\"")[0]["level"];

        foreach($allClubIDs as $clubID)
        {

            $temp = query("SELECT link FROM calendarLinks WHERE id = ?", 
                        $clubID["id"] . "." . $public)[0]["link"];

            // this is the part after src: in the gcal url
            $temp = substr($temp,38,strlen($temp) -51);
            $url = $url . $temp;
            $url = $url . "&amp;src=";
        }
        $url = substr($url, 0, strlen($url)-9);
    }
    
    //display all of the user's events
    if($_POST["eventsOption"]==="myEvents")
    {
        $myclubs = query("SELECT * FROM subscriptions JOIN clubs WHERE userID = ? AND subscriptions.ClubID = clubs.id", $_SESSION["id"]);
        foreach($myclubs as $club)
        {
            $clubID = $club["id"];
            $privacy = query("SELECT level FROM subscriptions WHERE userID = ? AND clubID = ?", 
                     $_SESSION["id"], $clubID)[0]["level"]; 
            $temp = query("SELECT link FROM calendarLinks WHERE id = ?", 
                        $clubID . "." . $privacy)[0]["link"];           
            $temp = substr($temp,38,strlen($temp) -51);
            //print($temp . " ");
            $url = $url . $temp;
            $url = $url . "&amp;src=";
        }
        $url = substr($url, 0, strlen($url)-9);

    }
    
    //display events if given an array of club names
    if($_POST["eventsOption"]==="choose")
    {

        $clubs = $_POST["myClubs"];
        
        //print_r($clubs);
        
        foreach($clubs as $clubName)
        {
            $clubID = query("SELECT id FROM clubs WHERE name = ?", $clubName)[0]["id"];        
            $privacy = query("SELECT level FROM subscriptions WHERE userID = ? AND clubID = ?", 
                     $_SESSION["id"], $clubID)[0]["level"]; 
            $temp = query("SELECT link FROM calendarLinks WHERE id = ?", 
                        $clubID . "." . $privacy)[0]["link"];           
            $temp = substr($temp,38,strlen($temp) -51);
            $url = $url . $temp;
            $url = $url . "&amp;src=";
        }
        $url = substr($url, 0, strlen($url)-9);

    }
    }
    
    //display events if given a single club name
    if(isset($_POST["clubName"]))
    {
        $clubName = $_POST["clubName"];
        
        $clubId = query("SELECT id FROM clubs WHERE name = ?", $clubName)[0]["id"];

        $privacy = query("SELECT level FROM subscriptions WHERE userID = ? AND clubID = ?", 
                     $_SESSION["id"], $clubId)[0]["level"];
        //print($clubId . "." . $privacy);
        $url = query("SELECT link FROM calendarLinks WHERE id = ?", $clubId . "." . $privacy)[0]["link"];
        // this is the part after src: in the gcal url
        $url = substr($url,38, strlen($url) -51);
    }    
    
    $url = "https://www.google.com/calendar/embed?src=" . $url;
    //print($url);
    
    // else render form
    render_div("calendar_display.php", array("url" => $url));

?>

