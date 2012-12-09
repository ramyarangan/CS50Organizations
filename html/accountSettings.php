<?php

/**
  Allows users to change their account settings, such as password,
  email, phone number, service provider, as well as club subscriptions.
**/

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
                
        // insert new user into database
        query("UPDATE users SET email=? WHERE id=?", $_POST["email"],$_SESSION["id"]);
        query("UPDATE users SET number=? WHERE id=?", $_POST["number"]."@".$_POST["provider"],$_SESSION["id"]);

        if($_POST["password"] != "")
            query("UPDATE users SET password=? WHERE id=?", crypt($_POST["password"]),$_SESSION["id"]);
      

        $subscriptions = query("SELECT * FROM subscriptions WHERE userID=?", $_SESSION["id"]);
        foreach($subscriptions as $subscription)
        {
            if($_POST[$subscription["clubID"]."member"] == 0)
            {
                query("DELETE FROM subscriptions WHERE userID=? AND clubID=?", $_SESSION["id"], $subscription["clubID"]);
            }
            else
            {
                print(empty($_POST[$subscription["clubID"]."text"]));
                if(!empty($_POST[$subscription["clubID"]."text"]) && !empty($_POST[$subscription["clubID"]."emailsub"]))
                {
                    query("UPDATE subscriptions SET subscription=3 WHERE userID=? AND clubID=?", $_SESSION["id"], $subscription["clubID"]);
                }
                elseif(!empty($_POST[$subscription["clubID"]."text"]))
                {
                    query("UPDATE subscriptions SET subscription=2 WHERE userID=? AND clubID=?", $_SESSION["id"], $subscription["clubID"]);
                }
                elseif(!empty($_POST[$subscription["clubID"]."emailsub"]))
                {
                    query("UPDATE subscriptions SET subscription=1 WHERE userID=? AND clubID=?", $_SESSION["id"], $subscription["clubID"]);
                }
                else
                {
                    query("UPDATE subscriptions SET subscription=0 WHERE userID=? AND clubID=?", $_SESSION["id"], $subscription["clubID"]);
                }

            }
        }
                                    
                            
        redirect("/");
        //obtain most recently allocated user id
    }
    else
    {
        // else render form
        $user = query("SELECT * FROM users WHERE id=?",$_SESSION["id"]);
        $user = $user[0];
        $end = strrpos($user["realname"]," ");
        $subscriptions = query("SELECT * FROM subscriptions WHERE userID=?", $_SESSION["id"]);
        $clubs = array();
        foreach ($subscriptions as $subscription)
        {
            $temp = query("SELECT * FROM clubs WHERE id=?", $subscription["clubID"]);
            $temp = $temp[0];
            array_push($clubs, $temp);
        }

        $number = query("SELECT * FROM users WHERE id=?", $_SESSION["id"]);
        $number = $number[0]["number"];
        if(!empty($number))
            $number = substr($number, 0, 10);

        render("accountSettings_form.php", array("title" => "CS50 Organizations: Account Settings",
        "username" => $user["name"], "email" => $user["email"], "clubs" => $clubs, "subscriptions" => $subscriptions, "number" => $number));
    }
?>
