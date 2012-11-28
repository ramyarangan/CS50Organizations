<?php
    foreach ($announcements as $key => $announcement)
    {
        print("<div>");
        print("<h4>".$clubs[$key]["name"].": ".$announcement["title"]."</h4>");
        print("<h5>"."Posted ".$announcement["time"]."</h5>");
        print($announcement["text"]);
        print("</br>");
        print("</div>");     
    }               
?>

