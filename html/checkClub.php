<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $resultName = query("SELECT * FROM clubs WHERE name = ?", $_POST["club"]);
        $resultAbbr = query("SELECT * FROM clubs WHERE abbreviation = ?", $_POST["abbreviation"]);
        $resultEmail = query("SELECT * FROM clubs WHERE email = ?", $_POST["email"]);
        
        echo json_encode(array("name" => count($resultName), "abbr" => count($resultAbbr),
                 "email" => count($resultEmail)));
        //echo count($result);
    }
?>
