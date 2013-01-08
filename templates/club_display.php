<div class="row-fluid">

<div class="club-header">
    <?php if (strtoupper($clubInfo["name"]) != $clubInfo["abbreviation"]):?>
        <h1> <?=$clubInfo["abbreviation"]?> </h1>
        <h2> <?=$clubInfo["name"]?> </h2>
    <?php else: ?>
        <h1> <?=$clubInfo["name"]?> </h1>  
    <?php endif ?>

</div>


   <div class="btn-toolbar">
    <form action="signUp.php" method="link">
            <div><img src="img/dots.jpg" width=80%></div>
            <button id="infoBtn" rel="tooltip" title="Club Info" type ="button" class="btn" data-toggle="collapse" data-target="#info">
                <i class = "icon-info-sign"></i>
            </button>
            
                <!-- Button to trigger modal -->
                <a href="#emailModal" id="emailBtn" rel="tooltip" title="Email Club Admins" role="button" class="btn" data-toggle="modal">
                    <i class="icon-envelope"></i>
                </a>



            <?php if(isset($_SESSION["id"])):?>
                <a href="#subscribeModal" id="subscribeBtn" rel="tooltip" title="Subscribe" role="button" class="btn" data-toggle="modal">
                    <i class="icon-signal"></i>
                </a>
    
                <?php if($level == 1):?>
                    <input type ="hidden" name="club" <?="value=\"".$clubInfo["name"]."\""?> >
                    <button style="margin-left:40px" type ="submit" class ="btn btn-primary">Join</button>
                <?php elseif($level == 2):?>
                    <?php $alert = "This is a closed club. Your membership request is pending review by club administrators."?>
                <?php elseif($level == 5):?>

                    <div class="btn-group"  style="margin-left:40px">
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
            <?php endif ?>
        <div><img src="img/dots.jpg" width=80%></div>
        </form>

    </div>
        

        <div id="info" class="collapse out"> 
            <?=$clubInfo["information"]?> 
        </div>

  
</div>


<div class="modal fade hide" id="emailModal" tabindex="-1" style="text-align:left" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true" data-remote= <?="\"sendMail.php?club=".str_replace(" ", "+", $clubInfo["name"])."\""?> >
    <div class="modal-header">
		       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="emailModalLabel">Email club admins.</h3>
    </div>
    <div class="modal-body">
        <p>Loading email form...</p>
    </div>
</div>

<div class="modal fade hide" id="announcementModal" tabindex="-1" style="text-align:left" role="dialog" aria-labelledby="announcementModalLabel" aria-hidden="true" data-remote= <?="\"makeAnnouncement.php?club=".str_replace(" ", "+", $clubInfo["name"])."\""?> >
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="announcementModalLabel">Make club announcement.</h3>
</div>
<div class="modal-body">
<p>Loading announcement form...</p>
</div>
</div>

<div class="modal fade hide" id="subscribeModal" tabindex="-1" style="text-align:left" role="dialog" aria-labelledby="subscribeModalLabel" aria-hidden="true" data-remote= <?="\"subscribe.php?type=".$subscription[0]["subscription"]."&club=".str_replace(" ", "+", $clubInfo["name"])."\""?> >
    <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="subscribeModalLabel">Subscribe to email and text notifications.</h3>
    </div>
    <div class="modal-body">
        <p>Loading subscription form...</p>
    </div>
</div>


<?php if(!empty($alert)): ?>
<div class="row">
        <div class="alert alert-info span6 offset3">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?=$alert?>
        </div>
</div>
<?php endif?>


<div class = "row" style="padding-top:30px">

<div class = "span4">
    <div class="section-title">announcements</div>

<div style="height:400px; overflow:auto; padding-right:10px">
<?php   
    if (count($alerts)==0)
        print("There are no announcements.");
    
    else{
        foreach ($alerts as $alert)
        {                    
            print("<div class = \"announcement\">");
            print("<div class = \"announcement-subject\">");
            print($alert["title"]);
            print("</div>");  
            
            print("<div class = \"announcement-content\">");
            print($alert["text"]);
            print("</div>"); 
            
            print("<div class = \"announcement-info\">");
            $poster = "";
            if($alert["userID"]==0)
                $poster = "Organizations Bot";
            else
            {
                $poster = query("SELECT * FROM users WHERE id=?", $alert["userID"]);
                $poster = $poster[0]["realname"];
            }
            print("posted ".$alert["time"]." by ".$poster);
            print("</div>");
            print("</div>");

        }
    }
    ?>
</div>
</div>

<div class = "span8" style = "margin-left:20px; height:400px">
    <div class="section-title">calendar of events</div>
    <div id="clubEventsCal">
        <iframe src= <?= "\"".$calUrl."\""?> style="border: 0" width="550" height="400" frameborder="2" scrolling="no">
    </iframe>
    </div>
</div>


</div>

<script>
    $(document).ready(function(){
        $('#infoBtn').tooltip('trigger':'hover');
        $('#emailBtn').tooltip('trigger':'hover');
        $('#subscribeBtn').tooltip('trigger':'hover');
        $('#announceBtn').tooltip('trigger':'hover');
        $('#editMembersBtn').tooltip('trigger':'hover');
        $('#editSettingsBtn').tooltip('trigger':'hover');
                      
</script>
