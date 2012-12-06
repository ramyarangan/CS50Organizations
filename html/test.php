<?php
require("../includes/config.php");
if(empty($_SESSION["client"])) print("hi");
outputCalendarList($_SESSION["client"]);
?>
