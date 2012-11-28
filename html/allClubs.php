<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    }
    else
    {
    $clubs = query("SELECT * FROM clubs");
    render("clubs_page.php", ["title" => "All Clubs", "clubs" => $clubs]);
    }
?>
