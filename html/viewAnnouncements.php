<?php

    // configuration
    require("../includes/config.php"); 
    $privacy = 1;
    if (!empty($_SESSION["id"]))
    {
        $user = query("SELECT * FROM users WHERE id=?", $_SESSION["id"])[0];
    }

    $allannouncements = query("SELECT * FROM announcements ORDER BY time DESC");
    $index = 0;
    $current = 0;
    while ($index < 25 && $current < count($allannouncements))
    {
        $subscription = query("SELECT * FROM subscriptions WHERE userID=? AND clubID=?", $user["id"],$allannouncements[$current]["id"]);
        if(!empty($subscription))
        {
            $privacy = $subscription[0]["level"];
        }
        if($allannouncements[$current]["privacy"] <= $privacy)
        {
            $announcements[$index] = $allannouncements[$current];
            $index = $index+1;
        }    
        $current = $current+1;
    }
    foreach ($announcements as $key => $announcement)
    {
        $clubs[$key] = query("SELECT * FROM clubs WHERE id=?", $announcement["id"])[0];
    }
    render("announcements_page.php", ["title" => "Recent Announcements", "announcements" => $announcements,"clubs" => $clubs]);

?>
