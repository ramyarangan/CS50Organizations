<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if (!empty($_GET["search"]))
    {
        $club = query("SELECT * FROM clubs WHERE id=?", $_GET["search"]);
        redirect("allClubs.php?club=".$club[0]["name"]);
    }
    else
    {
        redirect("search.php");
    }
?>
