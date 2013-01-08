<?php if(isset($_POST["club"]))
    $action = "sendMail.php";
    else
        $action= "contactUs.php";
?>
<form id="emailForm" class="form-horizontal" style="text-align:left" action= <?=$action?> method="post">
    
    <?php if(isset($_POST["club"])): ?>
    <input type ="hidden" name="club" value= <?="\"".$club."\""?> >
    <?php endif ?>

    <div class="control-group">
        <label class="control-label" for="inputName">Your Name</label>
        <div class="controls">
        <?php if (empty($_SESSION["id"])):?>
            <input class="span4" type="text" name="name" id="inputName" placeholder="First Last">
        <?php else: ?>
            <input class="span4" type="text" name="name" value=<?="\"".$name."\""?> id="inputName">
        <?php endif ?>
        </div>
    </div>

    <div class="control-group">
    
        <label class="control-label" for="inputEmail">Your Email Address</label>
        <div class="controls">
        <?php if (empty($_SESSION["id"])):?>
            <input class="span4" type="email" name="email" id="inputEmail">
        <?php else: ?>
            <input class="span4" type="email" name="email" value=<?="\"".$email."\""?> id="inputEmail">
        <?php endif ?>
        </div>
    </div>
        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="emailText"></div>
        </div>
        </div>

    <div class="control-group">
        <label class="control-label" for="inputSubj">Subject</label>
        <div class="controls">
            <input class="span4" type="text" name="subject" id="inputSubj">
        </div>
    </div>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="subjText"></div>
        </div>
        </div>
        
    <div class="control-group">
        <label class="control-label" for="inputBody">Message Body</label>
        <div class="controls">
            <textarea class="span4" name="body" id="inputBody" rows="8"></textarea>        
        </div>
    </div>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="bodyText"></div>
        </div>
        </div>
        
    <div class="control-group">
        <div class="controls">
            <button id="submit" type="submit" class="btn">Send</button>
        </div>
    </div>

</form>

<script>

$(document).ready(function(){

     //$("#submit").click(function(){
           $(".error").html("");

                        var body = $("#inputBody").val();
                        var subj = $("#inputSubj").val();


                        //error checks!

                        $("#inputBody").change(function(){

                            body = $("#inputBody").val();

                            if (body=="") 
                            {
                                $("#bodyText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter an announcement title.");

                            }
                            else
                            {
                                $("#bodyText").html("");

                            }
                            }
                         );

            
                        
                        $("#inputSubj").change(function(){
                            subj = $("#inputSubj").val();
                            if (subj == "") 
                            {
                                $("#subjText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please input your announcement.");
                            }
                            else
                            {
                                $("#subjText").html("");
                            }
                         });
                        
      
                  

     $("#submit").click(function(){
        hasError = false;
 
                        var body = $("#inputBody").val();

                        var subj = $("#inputSubj").val();
    
                        var email = $("#inputEmail").val();
                    
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                        
                        //error checks!


                            if (body=="") 
                            {
                                $("#bodyText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter an announcement title.");
                                hasError = true;
                            }
  

                           
                            if (subj == "") 
                            {
                                $("#subjText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please input your announcement.");
                                hasError = true;
                            }

                                   
                            if (email == "") 
                            {
                                $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your email address.");
                                hasError = true;
                            }
                            else if(!emailReg.test(email))
                            {
                                $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter a valid email address.");
                                hasError = true;
                            }
                        if (hasError == false) 
                        {
                            $(this).hide();
                            $("#emailForm").submit();
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
