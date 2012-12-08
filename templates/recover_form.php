<?php
// form for new users to register, including fields to type username, password, and 
// password confirmation
// includes a link back to the log in page
?>

<div class="row-fluid">
    <div class="club-header">
        <h1>
            Recover Password
        </h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>

<div class = "row-fluid" style="padding:30px">

<form id="regForm" action="recover.php" method="post" class="form-horizontal offset2" style="text-align:left">


    <div class="control-group">
        <label class="control-label" for="inputEmail"><strong>Email</strong></label>
        <div class="controls row-fluid">
            <div class="span4 row"><input class="span12" id="inputEmail" name="email" placeholder="e.g. user@college.harvard.edu" type="email"/></div>
        </div>
    </div>

<div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
<div class="controls row-fluid">
<div class="span10 row error" id="emailText"></div>
</div>
</div>

    <div class="control-group">
        <div class="controls">
            <button id="submit" type="submit" class="btn">Recover password.</button>
        </div>
    </div>
</form>
</div>

<div>
    An email will be sent to you with instructions shortly.
</div>
<div>
    Already have an account? Then simply <a href="login.php">log in</a>.</br>
</div>

<script>

$(document).ready(function(){

     //$("#submit").click(function(){
           $(".error").html("");
        hasError = false;
        curEmailError = false;
 
                        var email = $("#inputEmail").val();
                    
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                        
                        //error checks!
                        
                        $("#inputEmail").change(function(){ 
                            email = $("#inputEmail").val();    
                            curEmailError = false;            
                        if (email == "") 
                        {
                            $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your email address.");
                            curEmailError = true;
                        }
                        else if(!emailReg.test(email))
                        {
                            $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter a valid email address.");
                            curEmailError = true;
                        }

                        userEmailExists(email);
                        if(!curEmailError)
                        {
                            $("#emailText").html("");
                        }
                        });


                  
                  });
                  
     $("#submit").click(function(){
        hasError = false;

                        var email = $("#inputEmail").val();
                    
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                        

                        
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
                        
                        userEmailExists(email);
                        
                        if (hasError == false) 
                        {
                            $(this).hide();
                            $("#regForm").submit();
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

function userEmailExists(email)
{
    $.ajax({
        type: 'POST',
        url: 'checkUsername.php',
        data: { username: "", email: email},
        dataType:'json',
        async: false,
        success: function(response){

           if (response.email <= 0)
           {
                if(curEmailError == false)
                    $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> There is no account registered under that email.");
                curEmailError = true;
                hasError = true;
           }
        }
    });
}

</script>
