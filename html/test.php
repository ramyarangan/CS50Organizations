<?php
    require("../includes/config.php"); 
            // Connect


$user = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        $link = mysql_connect(ini_get("mysql.default_host"), USERNAME, PASSWORD)
            OR die(mysql_error());

        //add seconds component to the time
        $password = mysql_real_escape_string($user[0]["password"]);
        print($password . " ");
        $user = query("SELECT * FROM users WHERE password = ?", $password);
        print($user[0]["name"]);
?>
