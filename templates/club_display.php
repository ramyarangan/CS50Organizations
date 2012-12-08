


<div class="row-fluid">

    <div class="club-header">

        <h1>
        <?php 
            if($clubInfo["abbreviation"]!="")
                print($clubInfo["abbreviation"]." <small>".$clubInfo["name"]."</small>");
            else
                print($clubInfo["name"]);
            ?>
        </h1>

        <div><img src="img/dots.jpg" width=80%></div>
        

        <div class="btn-toolbar">

            <button id="infoBtn" rel="tooltip" title="Club Info" type ="button" class="btn" data-toggle="collapse" data-target="#info">
                <i class = "icon-info-sign"></i>
            </button>
            
                <!-- Button to trigger modal -->
                <a href="#emailModal" id="emailBtn" rel="tooltip" title="Email Club Admins" role="button" class="btn" data-toggle="modal">
                    <i class="icon-envelope"></i>
                </a>

            <?php if(isset($_SESSION["id"])):?>
    
                <?php if($level == 1):?>

                <form action="signUp.php" method="link">
                    <input type ="hidden" name="club" <?="value=\"".$clubInfo["name"]."\""?> >
                    <button type ="submit" class ="btn btn-primary">Join</button>
                </form>

                <?php elseif($level == 2):?>
                    <?php $alert = "This is a closed club. Your membership request is pending review by club administrators."?>
                <?php elseif($level == 6):?>

                    <div class="btn-group">
                    <a href="#announcementModal" role="button" class="btn" data-toggle="modal" id="editMembersBtn" rel="tooltip" title="Make Announcement">
                        <i class="icon-bullhorn"></i>
                    </a>

                    <a href= <?="\"editMembers.php?club=".str_replace(" ", "+", $clubInfo["name"])."\"" ?> role="button" class="btn" data-toggle="modal" id="editMembersBtn" rel="tooltip" title="Edit Member Info">
                        <i class="icon-edit"></i>
                    </a>

                    <a href= <?="\"editSettings.php?club=".str_replace(" ", "+", $clubInfo["name"])."\"" ?> role="button" class="btn" data-toggle="modal" id="editSettingsBtn" rel="tooltip" title="Edit Club Settings">
                        <i class="icon-cog"></i>
                    </a>

                                  
                    </div>

                <?php endif ?>
            <?php else: ?>
                <?php $alert ="Log in to join and subscribe to this organization."?>
            <?php endif ?>
        </div>
        

        <div id="info" class="collapse out"> 
            <?=$clubInfo["information"]?> 
        </div>

    </div>
</div>


<div class="modal fade hide" id="emailModal" tabindex="-1" style="text-align:left" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true" data-remote= <?="\"/sendMail.php?club=".str_replace(" ", "+", $clubInfo["name"])."\""?> >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="emailModalLabel">Email club admins.</h3>
    </div>
    <div class="modal-body">
        <p>Loading email form...</p>
    </div>
</div>

<div class="modal fade hide" id="announcementModal" tabindex="-1" style="text-align:left" role="dialog" aria-labelledby="announcementModalLabel" aria-hidden="true" data-remote= <?="\"/makeAnnouncement.php?club=".str_replace(" ", "+", $clubInfo["name"])."\""?> >
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="announcementModalLabel">Make club announcement.</h3>
</div>
<div class="modal-body">
<p>Loading announcement form...</p>
</div>
</div>

<?php if(!empty($alert)): ?>
    <div class = "row-fluid">
        <div class="alert span6 offset3">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?=$alert?>
        </div>
    </div>
<?php endif?>

<div><img src="img/dots.jpg" width=80%></div>

<div class = "row-fluid" style="padding-top:30px">

<div class = "span4">
    <h3>announcements</h3>
<div style="height:500px; overflow:auto; padding-right:10px">
<?php   
    
    if ($announcements == NULL)
    print("There are no announcements.");
    
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
    ?>
</div>
</div>

<div class = "span8" style = "margin-left:20px; height:500px">

    <h3>calendar of events</h3>
    <div id="clubEventsCal">
    <iframe src="https://www.google.com/calendar/embed?src=2ah0qjho0ctekccbmtmpatunco%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="600" height="450" frameborder="2" scrolling="no">
    </iframe>
    </div>
</div>


</div>

<script>
    $("#clubEventsCal").load("calendar.php", {clubName:"<?php echo $clubInfo['name']?>"});
</script>

<script>
    $(document).ready(function(){
        $('#infoBtn').tooltip('trigger':'hover');
        $('#emailBtn').tooltip('trigger':'hover');
        $('#announceBtn').tooltip('trigger':'hover');
        $('#editMembersBtn').tooltip('trigger':'hover');
        $('#editSettingsBtn').tooltip('trigger':'hover');
    }
</script>
