<!DOCTYPE html>

<html>

    <head>

        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title><?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title></title>
        <?php endif ?>
     
        <script src="js/jquery-1.8.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/scripts.js"></script>

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
                   
                   <li><a href="allClubs.php"> All Clubs </a></li>
                   <li><a href="viewAnnouncements.php"> Recent Announcements </a></li>
                    <?php
                        
                        // links to login and register page only if no user logged in currently
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
                            $admin = false;
                            
                            // if we found user, check to see if admin
                            if (count($rows) == 1)
                            {
                                $row = $rows[0];
                                if($row["admin"] === true)
                                    $admin = true;
                            }
                            
                            if($admin)
                            {
                                print("<li><a href=\"makeEvent.php\">Make an Event</a></li>");
                                print("<li><a href=\"makeAnnouncement.php\">Make an Announcement</a></li>");
                            }
                            
                            print("<li><a href=\"logout.php\"> Log Out </a></li>");
                        }
                    ?>
                </ul>

            </div>


