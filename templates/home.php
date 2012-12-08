<div class="row home-header" id="head">
<h1>Organizations</h1>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by CS50 @ Harvard</p>

</div>

<div style="margin-bottom:5px">
<img src="img/dots.jpg" width=80%>
</div>

<div class="row">
<form class="form-inline span12" style="text-align:center" onsubmit="return false">

<label><strong>Filter &nbsp;</strong></label>

<select id="myClubFilter" class="multiselect" name="Clubs" multiple="multiple">

<?php if (isset($myClubs)):?>
    <option value="My Clubs" class="title"></option>

    <?php foreach ($myClubs as $club):?>
        <option value= <?="\"".$club["id"]."\""?>> <?=$club["name"]?> </option>
    <?php endforeach ?>

    <option value="divider"></option>

<?php endif ?>

    <?php if(isset($_SESSION["id"])):?>
        <option value="Other Clubs" class="title"></option>
    <?php endif?>

    <?php foreach ($otherClubs as $club):?>
        <option value= <?="\"".$club["id"]."\""?>> <?=$club["name"]?> </option>
    <?php endforeach ?>

</select>

<?php if (isset($privacies)):?>
<select id="privacyFilter" class="multiselect" name="Privacy" multiple="multiple">
<?php foreach ($privacies as $privacy):?>
<option value= <?="\"".$privacy["level"]."\""?>> <?=$privacy["description"]?> </option>
<?php endforeach ?>
</select>
<?php endif ?>

<button id="submit" class="btn" ><i class="icon-refresh"></i></button>


<a style="margin-left:40px" href="#infoModal" id="emailBtn" rel="tooltip" title="Help" role="button" class="btn" data-toggle="modal">
<i class="icon-question-sign"></i>
</a>

</form>
</div>


<div class="modal fade hide" id="infoModal" tabindex="-1" style="text-align:left" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true" >
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="infoModalLabel">How to search.</h3>
</div>
<div class="modal-body">
<p>Blahbblahblhh info text here.</p>
</div>

</div>


<div style="margin-top:-20px; margin-bottom:20px">
    <img src="img/dots.jpg" width=80%>
</div>

<div id="divPrint"> </div> 
<div id="eventsAnnouncements" class="row-fluid" style="height:500px; margin-bottom:40px">

    <div id="toggle" class ="span3" style="text-align:right; padding-top:20px; padding-left:30px">
        <ul class="nav nav-pills nav-stacked" style="text-align:right">
            <li id="eventsTab" class="active"><a href="#">Events <i class="icon-chevron-right"></i></a></li>
            <li id="announcementsTab" class=""><a href="#">Announcements <i class="icon-chevron-right"></i></a></li>
        </ul>
    </div>

    <div id="eventsArea" class="span8" style="text-align:left; height:490px; overflow-y:auto; padding-right:20px" >
            <div class = "alert alert-info" style="text-align:center">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong> Welcome! </strong> Choose some clubs above to get started. </br> Note that only events and announcements visible to you can be displayed. 
            </div>
            <iframe src="https://www.google.com/calendar/embed?src=vkd9mihk989ohsv6lhr1i89m0o@group.calendar.google.com" style="border: 0" width="600" height="400" frameborder="0" scrolling="no">
            </iframe>

    </div>
</div>




<div >
<img src="img/dots.jpg" width=80%>
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



<script type="text/javascript">

$(document).ready(function() {
                  
                  $('#myClubFilter').multiselect($('#myClubFilter').attr('name'));
                  $('#otherClubFilter').multiselect($('#otherClubFilter').attr('name'));
                  $('#privacyFilter').multiselect($('#privacyFilter').attr('name'));
                  
                  $('#submit').click(function(){
                                     if ($('#eventsTab').hasClass('active'))
                                     {
                                     loadCal();
                                     }
                                     
                                     else
                                     {
                                     loadAnnouncements();
                                     }
                                     });
                  
                  
                  $('#announcementsTab').click(function(){
                                               if ($('#eventsTab').hasClass('active'))
                                               {
                                               $('#eventsTab').removeClass('active');
                                               $(this).addClass('active');
                                               loadAnnouncements();
                                               }
                                               });
                  
                  $('#eventsTab').click(function(){
                                        if ($('#announcementsTab').hasClass('active'))
                                        {
                                        $('#announcementsTab').removeClass('active');
                                        $(this).addClass('active');
                                        loadCal();
                                        }
                                        });
                  });

function loadAnnouncements(){
    
    
    var myClubs = $("#myClubFilter").val();
    if (myClubs == null)
      //  $('#eventsArea').html("No clubs have been selected.");   
    $('#eventsArea').html("<div class = \"alert\" style=\"text-align:center\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button><strong> Warning! </strong> No clubs have been selected.</div>");
    else
    {
        $('#eventsArea').hide();
        
        var privacies = $("#privacyFilter").val();
        
        $.ajax({
               url: "announcements.php",
               type: "POST",
               dataType: "html",
               data: {privacies: privacies, clubs: myClubs},
               success: function(response) {
               
               $('#eventsArea').show();
               
               // print iframe
               $("#eventsArea").html(response);   
               
               }
               });
    }
}

function loadCal(){
    
    var myClubs = $("#myClubFilter").val();
    if (myClubs == null)
    {
        $('#eventsArea').html("<div class = \"alert\" style=\"text-align:center\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button><strong> Warning! </strong> No clubs have been selected.</div><iframe src=\"https://www.google.com/calendar/embed?src=vkd9mihk989ohsv6lhr1i89m0o@group.calendar.google.com\" style=\"border: 0\" width=\"600\" height=\"400\" frameborder=\"0\" scrolling=\"no\"></iframe>");   
    }
    else
    {

        $('#eventsArea').hide();
        
        var privacies = $("#privacyFilter").val();

        $.ajax({
               url: "calendar2.php",
               type: "POST",
               dataType: "html",
               data: {privacies: privacies, clubs: myClubs},
               success: function(response) {

               // $("#filter").after(response);
               // $("#filter").after("</br>theoretical url: ");
               $('#eventsArea').show();
               // print iframe
               $("#eventsArea").html("<iframe src=\""+response+"\"+id=\"calendar\" showTitle=0 style=\"border:0\" width=\"600\" height=\"400\" frameborder=\"0\" scrolling=\"no\">");   
               }
               });
    }
}



</script>




