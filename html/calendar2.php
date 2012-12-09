<?php
    
    // configuration
    require("../includes/config.php");

    $url = "";
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {  
        
        $url = $url . "vkd9mihk989ohsv6lhr1i89m0o@group.calendar.google.com&amp;src=";
        

    

        $clubIDs = $_POST["clubs"];
        $privacies = $_POST["privacies"];

        if (empty($privacies)) 
        {                 
            $privacies = array(1, 2, 3, 4, 5, 6);
        }
        

            foreach($clubIDs as $clubID)
            {
               
                if(isset($_SESSION["id"]))
                    $myLevel = query("SELECT level FROM subscriptions WHERE userID = ? AND clubID = ?", $_SESSION["id"], $clubID);
                
                if ((!isset($_SESSION["id"])) || empty($myLevel))
                    $maxPrivacy = 1;
                else
                    $maxPrivacy = $myLevel[0]["level"];
                
                for($i = 0; $i < count($privacies) && $privacies[$i] <= $maxPrivacy; $i++)
                {
                    
                        $temp = query("SELECT link FROM calendarLinks WHERE id = ?", 
                                      $clubID . "." . $privacies[$i])[0]["link"]; 
                        $temp = substr($temp,38, strlen($temp) -51);
                        $url = $url . $temp;
                        $url = $url . "&amp;src=";
                    
                }
            }
        
        //remove extra from last loop
        $url = substr($url, 0, strlen($url)-9);
        
        
        
        $url = "https://www.google.com/calendar/embed?src=" . $url;
        
        // else render form
        echo($url);
    } 
?>


