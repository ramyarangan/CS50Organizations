
<form action="sendMail.php" method="link">

<?php
    print("<h1>".$club["name"]."</h1></br>");

    print("<input type=\"hidden\" name=\"club\" value=\"".$club["name"]."\">");
    print("<button type=\"submit\">Send us an email!</button>");
        
    foreach ($announcements as $announcement)
    {
        print("<div>");
        print("<h4>".$announcement["title"]."</h4>");
        print("<h5>"."Posted ".$announcement["time"]."</h5>");
        print($announcement["text"]);
        print("</br>");
        print("</div>");                
    }
?>

</form>
