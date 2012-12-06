<?php
    require("../includes/config.php");


$user = 'cs50groups@gmail.com';
$pass = 'crimsongroups';
$service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME;

# Here I log in
$client = Zend_Gdata_ClientLogin::getHttpClient($user,$pass,$service);

# Here I make a request just to send the auth parameter
outputCalendarList($client);

# Here I get the auth parameter among many other stuff
$bbc = $client->getLastRequest();

# Here I extract the String of the auth parameter (not very elegant!!)
    $auth="pvttk=".$client->getClientLoginToken();

# Finally I insert the iframe. Note that I have added the auth parameter
echo '<iframe
src="https://www.google.com/calendar/embed?src=e233mjio8gdcefjgjnenefv7ao%40group.calendar.google.com&amp;'.$auth.'"
style=" border-width:0 " width="800" height="900" frameborder="0"
scrolling="no"></iframe>';

?>

