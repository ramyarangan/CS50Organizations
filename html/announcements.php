
<?php
    
    // configuration
    require("../includes/config.php");
    
    $sql = "SELECT * FROM announcements WHERE ";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {  
        
        $clubIDs = $_POST["clubs"];
        
        
        foreach($clubIDs as $clubID)
        {
            $privacies = $_POST["privacies"];
            
            if (empty($privacies)) 
            {                 
                $privacies = array(1, 2, 3, 4, 5, 6);
            }
            
            $myLevel = query("SELECT level FROM subscriptions WHERE userID = ? AND clubID = ?", $_SESSION["id"], $clubID);
            
            if (empty($myLevel))
            {
                $maxPrivacy = 1;
            }
            else
                $maxPrivacy = $myLevel[0]["level"];
            
            
            $filtPrivacies = array();
            
            while(count($privacies) > 0 && $privacies[0] <= $maxPrivacy)
            {
                $filtPrivacies[] = array_shift($privacies);
            }
            
                        
            $sql = $sql."(ID = ".$clubID." AND privacy IN (".implode(',', $filtPrivacies).")) OR ";
        }
        
        $sql = substr($sql, 0, strlen($sql)-3)."ORDER BY time DESC" ;
        
        
        $announcements = query($sql);
        
        
        if ($announcements == NULL)
            print("There are no announcements that match your query.");
        
        else{
            foreach ($announcements as $announcement)
            {                    
                print("<div class = \"announcement\">");
                print("<div class = \"announcement-subject\">");
                print($announcement["title"]);
                print("</div>");  
                
                print("<div class = \"announcement-content\">");
                print($announcement["text"]);
                print("</div>"); 
                
                print("<div class = \"announcement-info\">");
                $poster = "";
                if($announcement["userID"]==0)
                    $poster = "CS50 Organizations";
                else
                {
                    $poster = query("SELECT * FROM users WHERE id=?", $announcement["userID"]);
                    $poster = $poster[0]["realname"];
                }
                print("posted ".$announcement["time"]." by ".$poster);
                print("</div>");
                print("</div>");
                
            }
        }

    } 
                           
    ?>


