
    <?php
        
        // configuration
        require("../includes/config.php");
    
    if (isset($_SESSION["id"]))
{    
    
    $myClubs = query("SELECT id, name FROM clubs JOIN subscriptions WHERE userID = ? AND subscriptions.clubID = clubs.id", $_SESSION["id"]);
    
    $allClubs = query("SELECT id, name FROM clubs");
        
   // $allClubs = query("SELECT * FROM subscriptions JOIN clubs WHERE userID = ? AND subscriptions.clubID = clubs.id AS x,SELECT clubs.id, clubs.name FROM clubs LEFT JOIN x WHERE x.userID IS NULL", $_SESSION["id"]);
                                    
    $privacies = query("SELECT * FROM privacy");
    
    
    render("testmd_view.php", array("title" => "testmd", "myClubs" => $myClubs, "allClubs" => $allClubs, "privacies" => $privacies)); 
    
}
?>