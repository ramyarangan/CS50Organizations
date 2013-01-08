<?php

    // configuration
    require("../includes/config.php"); 

    
    if (isset($_SESSION["id"]))
    {    
        
        $myClubs = query("SELECT id, name FROM clubs JOIN subscriptions WHERE userID = ? AND subscriptions.clubID = clubs.id", $_SESSION["id"]);
        if($myClubs==false)
            $otherClubs = query("SELECT id, name FROM clubs");
        else
            $otherClubs = query("SELECT id, name FROM clubs WHERE id NOT IN (".implode(',', sql_result_extract($myClubs, "id")).")");
        
        // $allClubs = query("SELECT * FROM subscriptions JOIN clubs WHERE userID = ? AND subscriptions.clubID = clubs.id AS x,SELECT clubs.id, clubs.name FROM clubs LEFT JOIN x WHERE x.userID IS NULL", $_SESSION["id"]);
    }
    
    else
    {
        $myClubs = NULL;
        $otherClubs = query("SELECT id, name FROM clubs");
    }
    
    $privacies = query("SELECT * FROM privacy");
    
    
    render("home.php", array("title" => "CS50 Organizations", "myClubs" => $myClubs, "otherClubs" => $otherClubs, "privacies" => $privacies)); 
    


function sql_result_extract($rows, $key)
{
    $result = array();
    
    if (count($rows) > 0 && array_key_exists($key, $rows[0]))
    {
        foreach($rows as $row)
        {
            $result[]=$row[$key];
        }
    }
    return $result;
}

?>
