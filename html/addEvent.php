
<form action="sendMail.php" method="link">

<div class="row-fluid">

    <div class="club-header span6 offset3">

        <h1>
        <?php 
            if($clubInfo["abbreviation"]!="")
            {
                print($clubInfo["abbreviation"]." <small>".$clubInfo["name"]."</small>");
            }
            else
                print($clubInfo["name"]);
        ?>
        </h1>

        <p style="text-align:left">
            <button type ="button" class="btn" data-toggle="collapse" data-target="#info">
                <i class = "icon-info-sign"></i>
            </button>
            
            <!-- Button to trigger modal -->
            <a href="#myModal" role="button" class="btn" data-toggle="modal">
                <i class="icon-envelope"></i>
            </a>

            <?php if(isset($_SESSION["id"]) && $level == 1):?>
            <a class="btn btn-primary">
                Join
            </a>
            <?php elseif($level == 5):?>
            <a class="btn">
                <i class = "icon-volume-up"></i>
            </a>
            <?php endif ?>

        </p>
        
        <div id="info" class="collapse out"> <?=$clubInfo["information"]?> </div>

    </div>
</div>


<div class="modal fade hide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-remote= <?="\"/sendMail.php?club=".str_replace(" ", "+", $clubInfo["name"])."\""?> >
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Modal header</h3>
</div>
<div class="modal-body">
<p>One fine body…</p>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button class="btn btn-primary">Save changes</button>
</div>
</div>




<div class = "row-fluid">

    <ul id="MainTabs" class="nav nav-tabs">
        <li><a data-target="#events" data-toggle="tab" href="/calendar.php"><i class="icon-calendar"></i>&nbsp;&nbsp;Events</a></li>
        <li><a data-target="#announcements" data-toggle="tab" href="/announcements.php"><i class="icon-exclamation-sign"></i>&nbsp;&nbsp;Announcements</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane" id="events">Loading calendar...</div>
        <div class="tab-pane" id="announcements">Loading announcements... </div>
    </div>

    <script>
        $(function() {
            $("#MainTabs").tab();
            $("#MainTabs").bind("show", function(e) {    
                var contentID  = $(e.target).attr("data-target");
                var contentURL = $(e.target).attr("href");
                $(contentID).load(contentURL, function(){
                    $("#MainTabs").tab();
                });
            });
        $('#MainTabs a:first').tab("show");
        });
    </script>

</div>

<div>


    <form action="sendMail.php" method="link">
<?php
    print("<input type=\"hidden\" name=\"club\" value=\"".$club["name"]."\">");
    print("<button type=\"submit\">Send us an email!</button>");
?>
    </form>
    <form action="signUp.php" method="link">
<?php
    print("<input type=\"hidden\" name=\"club\" value=\"".$club["name"]."\">");
    print("<button type=\"submit\">Sign Up!</button>");
?>
    </form>

<?php    
  
    foreach ($announcements as $announcement)
    {
        print("<div>");
        print("<h4>".$announcement["title"]."</h4>");
        print("<h5>"."Posted ".$announcement["time"]."</h5>");
        print($announcement["text"]);
        print("</br>");
        print("</div>");                
    }
?>
</div>
</form>
