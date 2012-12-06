<?php
    
    // configuration
    require("../includes/config.php");
    

    if(isset($_POST["clubName"]) && ($_POST["clubName"]!="default"))
        $clubNames = $_POST["clubName"];
    else $clubNames = array("public");
    
    if($clubNames[])
    
    $clubId = query("SELECT id FROM clubs WHERE name = ?", $clubName)[0]["id"];

    $privacy = query("SELECT level FROM subscriptions WHERE userID = ? AND clubID = ?", 
                     $_SESSION["id"], $clubId)[0]["level"];
    $url = query("SELECT link FROM calendarLinks WHERE id = ?", $clubId . "." . $privacy)[0]["link"];
    // this is the part after src: in the gcal url
    $url = substr($url,38,strlen($url)-51);
    
    
    $url = "https://www.google.com/calendar/embed?src=" . $url;
    //print($url);
    
    // else render form
    render_div("calendar_display.php", array("url" => $url));

?>

