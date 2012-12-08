<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $count = count(query("SELECT * FROM notifications WHERE seen=0 and userID=?",$_SESSION["id"]));
        query("UPDATE notifications SET seen=1 WHERE userId=?",$_SESSION["id"]);
        echo json_encode(array("change" => $count));

    }
?>
