    <div class="row home-header" id="head">
        <h1>Organizations</h1>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by CS50 @ Harvard</p>

    </div>

<div style="margin-bottom:5px">
<img src="img/dots.jpg" width=80%>
</div>

<div class="row">
<form class="form-inline span7 offset3" style="text-align:left">

<label><strong>Filter &nbsp;</strong></label>

<?php if (isset($myClubs)):?>
<select id="myClubFilter" class="multiselect" name="My Clubs" multiple="multiple">
<?php foreach ($myClubs as $club):?>
<option value= <?="\"".$club["id"]."\""?>> <?=$club["name"]?> </option>
<?php endforeach ?>
</select>
<?php endif ?>


<?php if (isset($allClubs)):?>
<select id="allClubFilter" class="multiselect" name="All Clubs" multiple="multiple">
<?php foreach ($allClubs as $club):?>
<option value= <?="\"".$club["id"]."\""?>> <?=$club["name"]?> </option>
<?php endforeach ?>
</select>
<?php endif ?>

<?php if (isset($privacies)):?>
<select id="privacyFilter" class="multiselect" name="Privacy" multiple="multiple">
<?php foreach ($privacies as $privacy):?>
<option value= <?="\"".$privacy["level"]."\""?>> <?=$privacy["description"]?> </option>
<?php endforeach ?>
</select>
<?php endif ?>
<button id="submit" class="btn" ><i class="icon-refresh"></i></button>
</form>
</div>


<div style="margin-top:-20px; margin-bottom:20px">
<img src="img/dots.jpg" width=80%>
</div>

<div id="eventsAnnouncements" class="row-fluid" style="height:450px">

    <div id="toggle" class ="span3" style="text-align:right; padding-top:20px; padding-left:30px">
        <ul class="nav nav-pills nav-stacked" style="text-align:right">
            <li id="eventsTab" class="active"><a href="#">Events <i class="icon-chevron-right"></i></a></li>
            <li id="announcementsTab" class=""><a href="#">Announcements <i class="icon-chevron-right"></i></a></li>
        </ul>
    </div>

    <div id="eventsArea" class="span8" style="text-align:left; height:450px; overflow:auto; padding-right:20px" >
        Welcome! Choose some clubs above to get started.
        </br></br>
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
                  $('#allClubFilter').multiselect($('#allClubFilter').attr('name'));
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
        $('#eventsArea').html("No clubs have been selected.");   
    
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
        $('#eventsArea').html("No clubs have been selected.</br></br><iframe src=\"https://www.google.com/calendar/embed?src=vkd9mihk989ohsv6lhr1i89m0o@group.calendar.google.com\" style=\"border: 0\" width=\"600\" height=\"400\" frameborder=\"0\" scrolling=\"no\"></iframe>");   
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



