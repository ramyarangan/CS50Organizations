<div class="row-fluid" >
    <div class="page-header">
        <h1>Organizations</h1>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by CS50 @ Harvard</p>
    </div>

    <ul id="MainTabs" class="nav nav-tabs ">

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
