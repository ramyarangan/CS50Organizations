<?php

    // configuration
    require("../includes/config.php");
    
require_once ("../google-api-php-client/src/Google_Client.php");


    if (empty($_SESSION["id"]))
    {
        redirect("login.php?go=createClub.php");
    }

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        $fields = array("name","info", "email", "privacy", "categories");
        checkForm($fields);
        
        $abbreviation = strtoupper($_POST["abbreviation"]);
        
        $privacy = false;
        if($_POST["privacy"]=== "open")
        {
            $privacy = true;
        }
        
        // insert new user into database
        $result = query("INSERT INTO clubs (name, abbreviation, email, privacy, information) 
                VALUES(?, ?, ?, ?, ?)", $_POST["name"], $abbreviation, $_POST["email"],
                $privacy, $_POST["info"]);
        
        // if user not added, notify user      
        if($result === false)
        {
            apologize("The new club could not be added.");
        }
        
        $rows = query("SELECT * FROM clubs WHERE name = ?", $_POST["name"]);
        $clubID = $rows[0]["id"];
        // add appropriate club types for this club to the clubTypePairs database
        foreach($_POST["categories"] as $categoryID)
        {
            $result = query("INSERT INTO clubTypePairs (clubID, clubTypeID) VALUES(?, ?)", 
                            $clubID, $categoryID);
            if($result === false)
            {
                apologize("The club's categories could not be stored.");
            }
        }
        
        // mark user as an administrator        
        $rows = query("UPDATE users SET admin = ? WHERE id = ?", true, $_SESSION["id"]);
        

        $privacy = query("SELECT * FROM privacy WHERE description = 'admin'"); 
        
        // insert user into subscriptions database (as an admin for this club)
        $result = query("INSERT INTO subscriptions (userID, clubID, level) 
                VALUES(?, ?, ?)", $_SESSION["id"], $clubID, $privacy[0]["level"]);
        // if user subscription not added, notify user      
        if($result === false)
        {
            apologize("Your subscription to this club could not be added to the database.");
        }        
        
        $gdataCal = new Zend_Gdata_Calendar($_SESSION["client"]);

        //Get list of existing calendars
        $calFeed = $gdataCal->getCalendarListFeed();

        $levels = query("SELECT * FROM privacy");
        $num = count($levels);

        for($i = 1; $i <= $num; $i++)
        { 
            // I actually had to guess this method based on Google API's "magic" factory
            $appCal = $gdataCal -> newListEntry();
            // I only set the title, other options like color are available.
            $appCal -> title = $gdataCal-> newTitle($abbreviation.$i); 

            //This is the right URL to post to for new calendars...
            //Notice that the user's info is nowhere in there
            $own_cal = "http://www.google.com/calendar/feeds/default/owncalendars/full";

            //And here's the payoff. 
            //Use the insertEvent method, set the second optional var to the right URL
            $gdataCal->insertEvent($appCal, $own_cal);
            

            $calFeed = $gdataCal->getCalendarListFeed();
            foreach ($calFeed as $calendar) {
                if($calendar->title->text == $abbreviation.$i)
                //This is the money, you need to use '->content-src'
                //Anything else and you have to manipulate it to get it right. 
                $appCalUrl = $calendar->content->src;
            }
   
   
//extract data from the post
extract($_POST);

//set POST variables
$url = "https://www.google.com/calendar/feeds/g1qge2cfjjm0l4hh92qh7gkti8@group.calendar.google.com/acl/full";
$fields = array(
            "scope" => "lightinthesky12@gmail.com",
            "scopeType"=> "user",
            "role" => "editor"
        );

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');
print($fields_string);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

print($result);
//close connection
curl_close($ch);


            query("INSERT INTO calendarLinks (id, link) 
                    VALUES(?, ?)", $clubID.".".$i, $appCalUrl);
//            query("INSERT INTO calendarLinks (id, link) 
//                    VALUES(?, ?)", $clubID.".".$i, substr($appCalUrl,38,strlen($appCalUrl)-51));


        }
        // redirect to home
        redirect("/"); 
    }
    else
    {
        
        // pass the createClub_form the list of possible club types
        $rows = query("SELECT * FROM clubTypes"); 
        $categories = array();
        foreach($rows as $row)
        {
            // since we want the "Other" category to be at the end of our form,
            // we will add this on the form separately
            if($row["description"] != "Other")
                $categories[$row["id"]] = $row["description"];
        }
        
        // get the ID of the "Other" club category and pass to the form
        $otherID = query("SELECT * FROM clubTypes WHERE description = 'Other'");
        $otherID = $otherID[0]["id"];         
        
        // render form
        render("createClub_form.php", array("title" => "Register", "categories" => $categories, 
            "otherID" => $otherID));
    }
?>
