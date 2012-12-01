
<form action="sendMail.php" method="link">
<div class="row-fluid">
<div class="club-header span6 offset3">
<h1>
<?php 
    if($club["abbreviation"]!="")
    {
        print($club["abbreviation"]."<small>".$club["name"]."</small>");
    }
    else
        print($club["name"]);
?>
</h1>

<p>
    <a class="btn">
        About
        </a>
    <a class="btn">
    Message
    </a>
    <?php if(isset($_SESSION["id"])): ?>
    <a class="btn btn-primary">
        Join
    </a>
    <?php endif ?>

</p>
</div>
</div>

</div class = "row-fluid">
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
<?php
    print("<h1>".$club["name"]."</h1></br>");

    print("<input type=\"hidden\" name=\"club\" value=\"".$club["name"]."\">");
    print("<button type=\"submit\">Send us an email!</button>");
        
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
