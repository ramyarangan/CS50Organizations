<?php /*<!DOCTYPE html>

<html>

    <head>

        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <link href="css/jquery-ui-timepicker-addon.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
        
        <?php if (isset($title)): ?>
            <title><?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title></title>
        <?php endif ?>

   
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
        <script type="text/javascript" src="js/jquery-ui-sliderAccess.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/scripts.js"></script>

        <script>
            $(document).ready(function(){
                $(".datetime").hover(function(){
                    $(this).datetimepicker({controlType: 'select', timeFormat: 'hh:mm tt', stepMinute: 5});
                });
            });
        </script>
        <script> function myTest(){alert ("hi")}</script>
    </head>

    <body>

        <div class="container-fluid">

            <div id="top">

            </div>

            <div id="middle">
                <?php
                    // include links to main pages on home page
                ?>
            <div>

                <ul class="nav nav-pills">
                   
                   <li><a href="allClubs.php"> All Organizations </a></li>
                   <li><a href="viewAnnouncements.php"> Recent Announcements </a></li>
                    <?php
                        
                        // links to log in and register page only if no user logged in currently
                        if (empty($_SESSION["id"]))
                        {
                            print("<li><a href=\"login.php\"> Log In </a></li>");
                            print("<li><a href=\"register.php\"> Register </a></li>");
                        }
                        
                        //links that apply only when someone is currently logged in
                        else
                        {

                            print("<li><a href=\"createClub.php\">Register New Club</a></li>");
                            
                            $rows = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
                            if($rows[0]["admin"])
                            {
                                print("<li><a href=\"makeEvent.php\">Make an Event</a></li>");
                                print("<li><a href=\"makeAnnouncement.php\">Make an Announcement</a></li>");
                            }
                            
                            print("<li><a href=\"logout.php\"> Log Out </a></li>");
                        }
                    ?>
                </ul>

            </div>

*/
?>
<!DOCTYPE html>


<html>

    <head>

    <style type="text/css">

    html, body, .container, .content {
        height: 100%;
    }

    .container, .content {
        position: relative;
    }

    .proper-content {
        padding-top: 40px; /* >= navbar height */
    }

    .wrapper {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        margin: 0 auto -50px; /* same as the footer */
    }

    .push {
        height: 50px; /* same as the footer */
    }

.footer-contents{
    padding:30px;
}

    .footer-wrapper {
        position: relative;
        height: 50px;
        margin-top:40px;
        line-height:15px;
        font-size:10px;
        font-weight:120;

    }
    

.club-header
{
    font-size: 18px;
    font-weight: 200;
    line-height: 30px;
    color: inherit;
    text-align:center;
    padding-bottom:20px;

}

.club-header h1
{
    margin-bottom: -15px;
    font-size: 55px;
    font-weight:100;
    line-height: 1;
    color: inherit;
}

.club-header h1 small
{
    margin-bottom: 0;
    font-size: 26px;
    font-weight: 300;
    font-color: #999999;
}

.announcement-subject{
    text-shadow: 0 2px 0 rgba(255, 255, 255, 0.5);
    font-size: 18px;
    font-weight: 300;
    line-height: 24px;
    text-align:left;
}

.announcement{
    padding-bottom:10px;
}

.announcement-content{
padding: 8px 35px 8px 14px;
    margin-bottom: 5px;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
    background-color: #fcf8e3;
    border: 1px solid #fbeed5;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    text-align:left;
}

.announcement-info{
    font-size: 11px;
    font-weight: 300;
    text-align:right;
    font-color: #999999;
}



    .page-header
    {
        text-align:center;
    }

    .page-header h1
    {
        font-size: 100px;
        font-weight: 500;
        letter-spacing: -5px;
        color: #333333;
    }

    .page-header p
    {
        font-size: 20px;
        font-weight: 200;
        letter-spacing: 1px;
        color: #999999;
        line-height: 3;
    }


    .tab-content
    {
        height:500px;
        overflow-y:auto;
        text-align:center;
    }

    .dropdown
{
    text-align:left;
}

    </style>

        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="css/jquery-ui.css" rel="stylesheet"/>
        <link href="css/jquery-ui-timepicker-addon.css" rel="stylesheet"/>
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
        
        <?php if (isset($title)): ?>
            <title><?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title></title>
        <?php endif ?>

   
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>     
        <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
        <script type="text/javascript" src="js/jquery-ui-sliderAccess.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/scripts.js"></script>
        <script>
            $(document).ready(function(){
                $(".datetime").hover(function(){
                    $(this).datetimepicker({controlType: 'select', timeFormat: 'hh:mm tt', stepMinute: 5});
                });
            });
        </script>
    </head>

    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">

                <div class="container">

                    <a class="brand" href="index.php"> <img src="img/harvard-logo.png" height=20px width=20px> CS50 Organizations</a>

                    <!--IF LOGGED IN-->
                    <?php if (isset($_SESSION["id"])): 
                        $myclubs = query("SELECT * FROM subscriptions JOIN clubs WHERE userID = ? AND subscriptions.ClubID = clubs.id", $_SESSION["id"]);?>

                    <ul class="nav" style:>
                        <li class="dropdown pull-left">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Organizations
                                <b class="caret"></b>
                            </a>
                        
                            <ul class="dropdown-menu">
                                <li class="nav-header">My Pages</li>

                                <?php foreach ($myclubs as $club){
                                    print("<li><a href=\"allClubs.php?club=".str_replace(" ", "+", $club["name"])."\">".$club["name"]."</a></li>");

                                }?>

                                <li class="nav-header">Manage</li>
                                <li><a href="makeAnnouncement.php"> Make Announcement </a></li>
                                <li><a href="createClub.php"> Create Organization </a></li>
                                <li><a href="makeEvent.php"> Create Event </a></li>
                                <li class="divider"></li>
                                <li><a href="allClubs.php"> All Organizations </a></li>
                            </ul>
                        </li>
                    </ul>

                    <form class="navbar-search pull-left">
                        <input type="text" class="search-query" placeholder="Search clubs and events">
                    </form>

                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-user"></i>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="login.php"> Connect via Facebook </a></li>
                                <li><a href="login.php"> Connect via Google </a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php"> Account Settings </a></li>
                                <li><a href="logout.php"> Log Out </a></li>
                            </ul>
                        </li>
                        </ul>

                    <ul class="nav pull-right">
                        <li class="dropdown">
                
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-globe"></i>
                                <?php
                                    $unread = query("SELECT * FROM notifications WHERE userID=? AND seen=0",$_SESSION["id"]);
                                    print(count($unread));
                                ?>                                    
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                            <?php
                                $notifications = query("SELECT * FROM notifications WHERE userID=? ORDER BY time DESC LIMIT 10",$_SESSION["id"]);
                                foreach ($notifications as $notification)
                                {
                                    if($notification["seen"]==0)
                                        print("<li><a style=\"background-color: Yellow\" href=\"".$notification["redirect"]."\">".$notification["text"]."</a></li>");
                                    else
                                        print("<li><a href=\"".$notification["redirect"]."\">".$notification["text"]."</a></li>");
                                }   

                            ?> 
                            </ul>
                        </li>
                        </ul>


                    <!--IF NOT LOGGED IN-->
                    <?php else: ?>

<ul class="nav" style:>
<li class="dropdown pull-left">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
Organizations
<b class="caret"></b>
</a>

<ul class="dropdown-menu">
    <li><a href="allClubs.php"> All Organizations </a></li>
</ul>
</li>
</ul>

                        <form class="navbar-search pull-left">
                            <input type="text" class="search-query" placeholder="Search site">
                        </form>

                        <ul class="nav pull-right"> 
                            <li><a href="login.php">Log In</a></li>
                        </ul>
                    <?php endif; ?>


                </div>                
            </div>
        </div>	
</body>
        <div class="container">

            <div class="content" style="padding-top:40px">

                <div class="wrapper">
                    <div class="proper-content">
     

