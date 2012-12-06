<div class="row-fluid" >
    <div class="page-header">
        <h1>Organizations</h1>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by CS50 @ Harvard</p>
    </div>
  <?php if (isset($_SESSION["id"]))
   {
        $myclubs = query("SELECT * FROM subscriptions JOIN clubs WHERE userID = ? AND subscriptions.ClubID = clubs.id", $_SESSION["id"]);
        print("<div>");

        print("
        <input type=\"radio\" name=\"eventsList\" id=\"chooseFromClubs\" value=\"choose\"> 
                    Choose from your clubs <br/>");
        print("<div id=\"myClubs\">");
        foreach($myclubs as $club)
        {
            print("<input type=\"checkbox\" name=\"myClubs\" value=\"" . $club["name"] . "\">" 
                    . $club["name"] . "<br/>");
        }
        print("</div>");
        print("<input type=\"radio\" name=\"eventsList\" value=\"myEvents\">All My Clubs <br/>
        <input type=\"radio\" name=\"eventsList\" value=\"public\">All Public Events <br/>
        <button id=\"submitCalOption\"> Submit! </button>
        </div>");
   }
  ?>
    <script>
         $("#myClubs").hide();
         $("input[name=eventsList]").click(function(){
              if($("input[id=chooseFromClubs]").attr('checked')== "checked"){
                $("#myClubs").show();
              }
              else $("#myClubs").hide();
         });
    </script>

    <ul id="MainTabs" class="nav nav-tabs ">

        <li><a data-target="#events" data-toggle="tab" href="/calendar.php"><i class="icon-calendar"></i>&nbsp;&nbsp;Events</a></li>
        <li><a data-target="#announcements" data-toggle="tab" href="/announcements.php"><i class="icon-exclamation-sign"></i>&nbsp;&nbsp;Announcements</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane" id="events">Loading calendar...</div>
        <div class="tab-pane" id="announcements">Loading announcements... </div>
    </div>

    <script>
    $(document).ready(function(){

         $("#MainTabs").tab();
            $("#MainTabs").bind("show", function(e) {    
                var contentID  = $(e.target).attr("data-target");
                var contentURL = $(e.target).attr("href");
                $(contentID).load(contentURL, {clubNames:"default"}, function(){
                   $("#MainTabs").tab();
                });
            });
                
         $('#MainTabs a:first').tab("show");
                        
        $("#submitCalOption").click(function(){
            var txt=$("input[name=eventsList]:checked").val();
            if(txt== "choose")
            {
                alert("hi");
                $("#events").load("/calendar.php", {clubNames:txt}, function(){
                    $("#MainTabs").tab();});
            }        
            else
                $("#events").load("/calendar.php", {clubNames:txt}, function(){
                    $("#MainTabs").tab();});                
        });

    });
    </script>

    
    <?php /*<script>
    $(document).ready(function(){
         $("#MainTabs").tab();
            $("#MainTabs").bind("show", function(e) {    
                var contentID  = $(e.target).attr("data-target");
                var contentURL = $(e.target).attr("href");
                $(contentID).load(contentURL, {clubName:"default"}, function(){
                   $("#MainTabs").tab();
                });
            });
                
         $('#MainTabs a:first').tab("show");
                        
        $("input").keypress(function(e){
            if(e.keyCode==13){
            var txt=$("input[name=clubType]").val();
            $("#events").load("/calendar.php", {clubName:txt}, function(){
                 $("#MainTabs").tab();
                 });
            }
        });

    });
    </script> */ ?>
    
    <?php /*<script>
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
    </script>*/?>
    
</div>

<div class="row-fluid">

<h1> Popular events </h2>

<ul class="thumbnails">
<li class="span3">
<div class="thumbnail">
<img src="http://placehold.it/300x200" alt="">
<h3>Thumbnail label</h3>
<p>Thumbnail caption...</p>
</div>
</li>

<li class="span3">
<div class="thumbnail">
<img src="http://placehold.it/300x200" alt="">
<h3>QQ</h3>
<p>Thumbnail caption...</p>
</div>
</li>

<li class="span3">
<div class="thumbnail">
<img src="http://placehold.it/300x200" alt="">
<h3>QQ</h3>
<p>Thumbnail caption...</p>
</div>
</li>

<li class="span3">
<div class="thumbnail">
<img src="http://placehold.it/300x200" alt="">
<h3>QQ</h3>
<p>Thumbnail caption...</p>
</div>
</li>

</ul>

</div>
