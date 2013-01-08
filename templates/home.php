<div class="row home-header" id="head">
<h1>Organizations</h1>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by CS50 @ Harvard</p>

</div>

<style>
.thumbnail{
height:270px;
}

.thumbnail h3{
    font-weight:200;
    letter-spacing:0px;
    margin-bottom:-10px;
}

.thumbnail small{
color:#999999;
}

.thumbnail p{
    margin-top:20px;
}


</style>

<div class="row">
<img src="img/dots.jpg" width=80%>
<form class="form-inline span12" style="text-align:center; margin-bottom:-2px" onsubmit="return false">

<label><strong>Filter &nbsp;</strong></label>

<select id="myClubFilter" class="multiselect" name="Clubs" multiple="multiple">

<?php if (isset($myClubs)):?>
    <option value="My Clubs" class="title"></option>

    <?php foreach ($myClubs as $club):?>
        <option value= <?="\"".$club["id"]."\""?>> <?=$club["name"]?> </option>
    <?php endforeach ?>

    <option class="divider"></option>

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

<button id="submit" class="btn btn-primary"><i class="icon-refresh icon-white"></i></button>


<a style="margin-left:40px" href="#infoModal" id="emailBtn" rel="tooltip" title="Help" role="button" class="btn" data-toggle="modal">
<i class="icon-question-sign"></i>
</a>

</form>
<img src="img/dots.jpg" width=80%>

</div>


<div class="modal fade hide" id="infoModal" tabindex="-1" style="text-align:left" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true" >
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="infoModalLabel">Search filter guide.</h3>
</div>
<div class="modal-body">

<p> Announcements and events can be filtered by two options:
    <ol> 
        <li><strong>Clubs.</strong> </br>You must specify which club(s) you're interested in.</li>
<li><strong>Privacy.</strong> </br> These categories refer to the minimum level of membership necessary to view the event or announcement. Note that even if you choose "admin," you will only be able to see administrator-only information for the clubs in which you are an administrator. This option is not required; if unspecified, by default you view all events you are permitted to see--that is, all events under your privacy level for each respective club. 
</ol> 
</p>
</div>
<div class="modal-footer" style="text-align:left">
<strong>tl;dr?</strong> Clubs are mandatory; privacy is not. Go forth and search!
</div>

</div>

<div id="eventsAnnouncements" class="row-fluid" style="height:500px; margin-bottom:40px; margin-top:30px">

    <div id="toggle" class ="span3" style="text-align:right; padding-top:20px; padding-left:30px">
        <ul class="nav nav-pills nav-stacked" style="text-align:right">
            <li id="eventsTab" class="active"><a href="#">Events <i class="icon-chevron-right"></i></a></li>
            <li id="announcementsTab" class=""><a href="#">Announcements <i class="icon-chevron-right"></i></a></li>
        </ul>
    </div>

    <div id="eventsArea" class="span8" style="text-align:left; height:490px; overflow-y:auto; padding-right:20px" >
            <div class = "alert alert-info" style="text-align:center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>

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

<div class="section-title" style="padding-top:26px; font-size:30px; letter-spacing:4px">Popular Events</div>

<ul class="thumbnails">
<li class="span3">
<div class="thumbnail">
<img src="img/cs50.jpg" alt="This is CS50.">
<h3>This is CS50.</h3>
<small>Now.</small>
<p>No, really. This *is* CS50. Just look around.</p>
</div>
</li>

<li class="span3">
<div class="thumbnail">
<img src="img/h-y.png" alt="Rematch and gloat.">
<h3>The (Re)Game.</h3>
<small>Wednesday 12/12/2012 at 12:12 PM</small>
<p>Kick Those Who Are Down Association (KTWADA) </p>
</div>
</li>

<li class="span3">
<div class="thumbnail">
<img src="img/pastries.jpg" alt="Have pastries with FAIL.">
<h3>Breakfast à Paris</h3>
<small>Sunday 12/17/2012 at 11:00 AM</small>
<p>French Appreciation International Liaisons (FAIL)</p>
</div>
</li>

<li class="span3">
<div class="thumbnail">
<img src="img/eating-snow.jpg" alt="Eat the most snow.">
<h3>Snowmunching</h3>
<small>Friday 12/22/2012 at 8:00 PM</small>
<p>Brain Freeze Friends (BFF) </p>
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




