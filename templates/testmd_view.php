
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">

<script type="text/javascript" src="js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>


<div class = "row-fluid" id="filter" style="text-align:left; padding:20px">
<div class = "span2">

Filter results:
</div>
    
<div class = "span2">
<?php if (isset($myClubs)):?>
    <select id="myClubFilter" class="multiselect" multiple="multiple">
    <?php foreach ($myClubs as $club):?>
        <option value= <?="\"".$club["id"]."\""?>> <?=$club["name"]?> </option>
    <?php endforeach ?>
    </select>
<?php endif ?>
</div>

<div class = "span2">
<?php if (isset($allClubs)):?>
<select id="allClubFilter" class="multiselect" multiple="multiple">
<?php foreach ($allClubs as $club):?>
<option value= <?="\"".$club["id"]."\""?>> <?=$club["name"]?> </option>
<?php endforeach ?>
</select>
<?php endif ?>
</div>

<div class = "span2">
<?php if (isset($privacies)):?>
<select id="privacyFilter" class="multiselect" multiple="multiple">
<?php foreach ($privacies as $privacy):?>
<option value= <?="\"".$privacy["level"]."\""?>> <?=$privacy["description"]?> </option>
<?php endforeach ?>
</select>
<?php endif ?>
</div>

<div class="span2">
<button  id="submit" class="btn" ><i class="icon-refresh"></i></button>
</div>
</div>


<div id="displayOption">

</div>


<div id="eventsArea">
    <!-- for calendar use -->
<div>



<script type="text/javascript">

$(document).ready(function() {
    $('#myClubFilter').multiselect();
    $('#allClubFilter').multiselect();
    $('#privacyFilter').multiselect();
                  
    $('#submit').click(function(){
        $('#eventsArea').hide();

        var myClubs = $("#myClubFilter").val();
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
               $("#eventsArea").html("<iframe src=\""+response+"\"+id=\"calendar\" showTitle=0 style=\"border:0\" width=\"700\" height=\"400\" frameborder=\"0\" scrolling=\"no\">");   

               //loadIframe("calendar", response); why doesn't this work?
            }
        });
    });
});


/*
function loadIframe(iframeName, url) {
    var $iframe = $('#' + iframeName);
    if ( $iframe.length ) {
        $iframe.attr('src',url);   
        return false;
    }
    return true;
}*/

</script>




