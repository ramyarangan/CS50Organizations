<?php
// form for new users to register, including fields to type username, password, and 
// password confirmation
// includes a link back to the log in page
?>
<?php if(empty($clubName)):?>

<div class="row-fluid">
    <div class="reg-header">
        <h1>Create an event.</h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>


<form id="eventForm" class="form-horizontal offset2" style="text-align:left" action="makeEvent.php" method="post">
    <input type ="hidden" name="all" value="1">
    <div class="control-group">
        <label class="control-label" for="inputClub">Organization Name</label>
        <div class="controls">
            <select name="club" id="inputClub">
                <?php foreach ($clubsOwned as $clubID => $clubName)
                    print("<option value='". $clubID . "'>" . $clubName . " </option> ");   
                ?>
            </select>
        </div>
    </div>

<?php else: ?>

<form class="form-horizontal offset2" style="text-align:left" action="makeAnnouncement.php" method="post">
    <input type ="hidden" name="club" <?="value=\"".$clubName."\""?> >
    <input type ="hidden" name="all" value="-1">
<?php endif?>


        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="clubNameText"></div>
        </div>
        </div>

    <div class="control-group">
        <label class="control-label" for="inputTitle">Event Title</label>
        <div class="controls">
            <input class="span4" type="text" name="name" id="inputTitle">
        </div>
    </div>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="titleText"></div>
        </div>
        </div>
        
        
    <div class="control-group">
        <label class="control-label" for="inputPrivacy">Privacy Level</label>
        <div class="controls">
            <select name="privacy" class="span2" id="inputPrivacy">
                <option value= <?="\"".$privacy["public"]."\""?> >Public</option>
                <option value= <?="\"".$privacy["comp"]."\""?> >All Members (Include Compers)</option>  
                <option value= <?="\"".$privacy["non-comp"]."\""?> >Full Members Only</option> 
                <option value= <?="\"".$privacy["admin"]."\""?> >Administrators</option> 
            </select>
        </div>
    </div>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="privacyText"></div>
        </div>
        </div> 


        <div class="control-group">
            <label class="control-label" for="info">Event Description</label>
            <div class="controls">
                <textarea class="span4" name="info" id="info" rows="6"></textarea>        
            </div>
        </div>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="infoText"></div>
        </div>
        </div>
                
        <div class="control-group">
            <label class="control-label" for="location">Location</label>
            <div class="controls">
                <input class="span4" type="text" name="location" id="location">
            </div>
        </div>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="locText"></div>
        </div>
        </div>





        <div class="control-group">
            <label class="control-label" for="startDatetime">  Start Date/Time </label>
            <div class="controls">
                <input  type="text" name="startDatetime" class="datetime" id="startDatetime">
            </div>
        </div>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="startText"></div>
        </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="endDatetime">  End Date/Time </label>
            <div class="controls">
                <input  type="text" name="endDatetime" class="datetime" id="endDatetime">
            </div>
        </div>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="endText"></div>
        </div>
        </div>
        
        <div class="control-group">
            <div class="controls">
                <button type="submit" id="submit" class="btn">Make event!</button>
            </div>
        </div>
    </fieldset>
</form>


<script>

$(document).ready(function(){

     //$("#submit").click(function(){
           $(".error").html("");

                        var title = $("#inputTitle").val();
                        var location = $("#location").val();
                        var info = $("#info").val();
                        var startDatetime = $("#startDatetime").val();
                        var endDatetime = $("#endDatetime").val();

                        //error checks!

                        $("#inputTitle").change(function(){

                            title = $("#inputTitle").val();

                            if (title=="") 
                            {
                                $("#titleText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter an event title.");

                            }
                            else
                            {
                                $("#titleText").html("");

                            }
                            }
                         );

                       $("#location").change(function(){

                            location = $("#location").val();

                            if (location== "") 
                            {
                                $("#locText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter an event location.");

                            }
                            else
                            {
                                $("#locText").html("");

                            }
                            
                          });
                        
                        $("#info").change(function(){
                            info = $("#info").val();
                            if (info == "") 
                            {
                                $("#infoText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please describe your event.");
                            }
                            else
                            {
                                $("#infoText").html("");
                            }
                         });
                        
                        $("#startDatetime").change(function(){
                            startDatetime = $("#startDatetime").val();
                            if (startDatetime == "") 
                            {
                                $("#startText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please choose a start date/ time.");

                            }
                            
                            else 
                            {
                                $("#startText").html("");

                            }
                        });
                        
                        $("#endDatetime").change(function(){
                            endDatetime = $("#endDatetime").val();
                            if (endDatetime == "") 
                            {
                                $("#endText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please choose an end date/ time.");

                            }
                            
                            else 
                            {
                                $("#endText").html("");

                            }
                        });

                  

     $("#submit").click(function(){
        hasError = false;
 
                        var title = $("#inputTitle").val();
                        var location = $("#location").val();
                        var info = $("#info").val();
                        var startDatetime = $("#startDatetime").val();
                        var endDatetime = $("#endDatetime").val();

                        //error checks!


                            if (title=="") 
                            {
                                $("#titleText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter an event title.");
                                hasError = true;
                            }
  

                            if (location== "") 
                            {
                                $("#locText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter an event location.");
                                hasError = true;
                            }
                            
                            if (info == "") 
                            {
                                $("#infoText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please describe your event.");
                                hasError = true;
                            }

                            if (startDatetime == "") 
                            {
                                $("#startText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please choose a start date/ time.");
                                hasError = true;
                            }
                            
                            if (endDatetime == "") 
                            {
                                $("#endText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please choose an end date/ time.");
                                hasError = true;
                            }
                            if (startDatetime > endDatetime)
                           {
                               $("#endText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> End date/ time must be after start date/ time.");
                               hasError = true;
                           }

                        if (hasError == false) 
                        {
                            $(this).hide();
                            $("#eventForm").submit();
                         /*                   
                            $.ajax({
                               type: "POST",
                               url: "register.php",
                               data: $("#regForm").serialize(), // serializes the form's elements.
                               success: function(data)
                               {
                                    $(data); // show response from the php script.
                               }
                            });   */
                        }
                        return false;
                        //});
    });
    
 });

</script>

