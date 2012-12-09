<?php

/**
  Lets the user subscribe to email and text notifications.
  If text is selected, asks the user for phone number and
  phone provider so texts can be sent. 
**/


    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(!empty($_POST["text"])&&!empty($_POST["email"]))
            $subscription = 3;
        elseif(!empty($_POST["text"]))
            $subscription = 2;        
        elseif(!empty($_POST["email"]))
            $subscription = 1;
        else
            $subscription = 0;
         
        if($subscription == 2 || $subscription == 3)
        {
            query("UPDATE users SET number=? WHERE id=?",$_POST["number"]."@".$_POST["provider"],$_SESSION["id"]);
        }
    
        $clubID = query("SELECT id FROM clubs WHERE name=?",$_POST["club"]);
        $clubID = $clubID[0]["id"];
        $result = query("UPDATE subscriptions SET subscription=? WHERE userID=? AND clubID=?", $subscription, $_SESSION["id"], $clubID);    
        redirect("allClubs.php?club=".str_replace(" ", "+", $_POST["club"])."&type=subscribe&success=1"); 
       
    }
    else
    {        
        $text = 0;
        $email = 0;
        if ($_GET["type"] == 1)
            $email = 1;
        else if ($_GET["type"] == 2)
            $text = 1;
        else if ($_GET["type"] == 3)
        {
            $email = 1;
            $text = 1;
        }        
        $number = query("SELECT * FROM users WHERE id=?", $_SESSION["id"]);
        $number = $number[0]["number"];
        $provider = "SelectOne";
        if(!empty($number))
        {
            $number = substr($number, 0, 10);
            $provider = substr($number,11);
        }
        render_div("subscribe_form.php", array("club" => $_GET["club"], "text" => $text, "email" => $email, "number" => $number));
    }
?>
