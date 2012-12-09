

<?php if(empty($clubName)):?>

<div class="row-fluid">
    <div class="reg-header">
        <h1>Make an announcement.</h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>


<form id="announceForm" class="form-horizontal offset2" style="text-align:left" action="makeAnnouncement.php" method="post">
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

<form id="announceForm" class="form-horizontal" style="text-align:left" action="makeAnnouncement.php" method="post">
    <input type ="hidden" name="club" <?="value=\"".$clubName."\""?> >
    <input type ="hidden" name="all" value="-1">
<?php endif?>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="clubText"></div>
        </div>
        </div>
        
    <div class="control-group">
        <label class="control-label" for="inputTitle">Announcement Title</label>
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
        <label class="control-label" for="info">Announcement Text</label>
        <div class="controls">
            <textarea class="span4" name="info" rows="6"></textarea>        
        </div>
    </div>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="infoText"></div>
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
        <div class="controls">
            <button type="submit" id="submit" class="btn">Make announcement!</button>
        </div>
    </div>
</form>

<script>

$(document).ready(function(){

     //$("#submit").click(function(){
           $(".error").html("");

                        var title = $("#inputTitle").val();
                        var info = $("#info").val();


                        //error checks!

                        $("#inputTitle").change(function(){

                            title = $("#inputTitle").val();

                            if (title=="") 
                            {
                                $("#titleText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter an announcement title.");

                            }
                            else
                            {
                                $("#titleText").html("");

                            }
                            }
                         );

            
                        
                        $("#info").change(function(){
                            info = $("#info").val();
                            if (info == "") 
                            {
                                $("#infoText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please input your announcement.");
                            }
                            else
                            {
                                $("#infoText").html("");
                            }
                         });
                        
      
                  

     $("#submit").click(function(){
        hasError = false;
 
                        var title = $("#inputTitle").val();

                        var info = $("#info").val();
    

                        //error checks!


                            if (title=="") 
                            {
                                $("#titleText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter an announcement title.");
                                hasError = true;
                            }
  

                           
                            if (info == "") 
                            {
                                $("#infoText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please input your announcement.");
                                hasError = true;
                            }


                        if (hasError == false) 
                        {
                            $(this).hide();
                            $("#announceForm").submit();
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

