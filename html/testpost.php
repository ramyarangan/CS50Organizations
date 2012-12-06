<?php

    // configuration
    require("../includes/config.php");
    
require_once ("../google-api-php-client/src/Google_Client.php");


extract($_POST);

//set POST variables
$url = "/calendar/feeds/cs50groups@gmail.com/acl/full";
$fields = '{
  "data": {
    "scope": "darcy@gmail.com",
    "scopeType": "user",
    "role": "editor"
  }
}';


//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));

//execute post
$result = curl_exec($ch);

print("SDGSG");
print($result);
//close connection
curl_close($ch);



?>
