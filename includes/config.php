<?php

    /***********************************************************************
     * config.php
     *
     * Computer Science 50
     * Problem Set 7
     *
     * Configures pages.
     **********************************************************************/

    // display errors, warnings, and notices
    ini_set("display_errors", true);
//    error_reporting(E_ALL);
    
    $clientLibraryPath = '/nfs/home/groups/cs50-groups/ZendFramework-1.12.0/library';
    $clientLibraryPath2 = '/nfs/home/groups/cs50-groups';
    set_include_path(get_include_path() . PATH_SEPARATOR . $clientLibraryPath . PATH_SEPARATOR . $clientLibraryPath2);

    // requirements
    require("constants.php");
    require("functions.php");


    // enable sessions
    session_start();
    
    require("calendarSetup.php");

    // require authentication for most pages
    /**if (!preg_match("{(?:login|logout|register|main|index)\.php$}", $_SERVER["PHP_SELF"]))
    {
        if (empty($_SESSION["id"]))
        {
            redirect("login.php");
        }
    }**/

?>
