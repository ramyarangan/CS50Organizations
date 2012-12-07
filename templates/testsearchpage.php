<div class="row-fluid" >
    <div class="page-header">
        <h1>Organizations</h1>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by CS50 @ Harvard</p>
    </div>

    Club:
    <input type="text" name="searchSubject"/>

    <ul id="Results" class="nav nav-tabs ">

        <li><a data-target="#results" data-toggle="tab" href="/search2.php"><i class="icon-calendar"></i>&nbsp;&nbsp;Events</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane" id="results">Results...</div>
    </div>


   
    <script>
    $(document).ready(function(){
        $("input").bind('keypress', function(e){
            if(e.keyCode==13){
            var txt=$("input[name=searchSubject]").val();
            $(function() {
                $("#Results").tab();
                $("#Results").bind("show", function(e) {   
                    var contentID  = $(e.target).attr("data-target");
                    var contentURL = $(e.target).attr("href");
                    $(contentID).load(contentURL, {searchSubject:txt}, function(){
                        $("#Results").tab();
                        });
                });
                $('#Results a:first').tab("show");
            });
            }
        });
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
