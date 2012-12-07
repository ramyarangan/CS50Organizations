<?php
// form for new users to register, including fields to type username, password, and 
// password confirmation
// includes a link back to the log in page
?>

<div class="row-fluid">
    <div class="club-header">
        <h1>
            Register.
        </h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>

<div class = "row-fluid" style="padding:30px">

<form id="regForm" action="register.php" method="post" class="form-horizontal offset2" style="text-align:left">

    <div class="control-group">
        <label class="control-label" for="inputFirst"><strong>Name</strong></label>
        <div class="controls row-fluid" id="inputName">
        <div class="span2 row"><input class="span12" id="inputFirst" name="first" placeholder="First" type="text"/></div>

<div class="span2 row"><input class="span12" id="inputLast" name="last" placeholder="Last" type="text"/> </div>
        </div>
    </div>

<div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
    <div class="controls row-fluid">
        <div class="span10 row error" id="nameText"></div>
    </div>
</div>

    <div class="control-group">
        <label class="control-label" for="inputUsername"><strong>Username</strong></label>
        <div class="controls row-fluid">
            <div class="span4 row"><input class="span12" id="inputUsername" name="username" type="text"/></div>
        </div>
    </div>

<div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
<div class="controls row-fluid">
<div class="span10 row error" id="usernameText"></div>
</div>
</div>

    <div class="control-group">
        <label class="control-label" for="inputPW"><strong>Password</strong></label>
        <div class="controls row-fluid">
            <div class="span4 row"><input class="span12" id="inputPW" name="password" type="password"/></div>
        </div>
    </div>

<div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
<div class="controls row-fluid">
<div class="span10 row error" id="pwText"></div>
</div>
</div>

    <div class="control-group">
        <label class="control-label" for="inputConf"><strong>Confirm Password</strong></label>
        <div class="controls row-fluid">
            <div class="span4 row"><input class="span12" id="inputConf" name="confirmation" type="password"/></div>
        </div>
    </div>

<div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
<div class="controls row-fluid">
<div class="span10 row error" id="confText"></div>
</div>
</div>

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
            <button id="submit" type="submit" class="btn">Register</button>
        </div>
    </div>
</form>
</div>

<div>
    Already have an account? Then simply <a href="login.php">log in</a>.</br>
</div>

<script>

$(document).ready(function(){
     $("#submit").click(function(){
           $(".error").html("");
               hasError = false;
    
                        var first = $("#inputFirst").val();
                        var last = $("#inputLast").val();
                        var username = $("#inputUsername").val();
                        var password = $("#inputPW").val();
                        var conf = $("#inputConf").val();
                        var email = $("#inputEmail").val();
                    
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                        
                        //error checks!
                        
                        if (first == "" || last == "") 
                        {
                            $("#nameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter valid first and last names.");
                            hasError = true;
                        }

                        if (username == "") 
                        {
                        $("#usernameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please choose a username.");
                        hasError = true;
                        }
                        
                        userEmailExists(username, email);
                        
                        
                        
                        if (password == "") 
                        {
                            $("#pwText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please choose a password.");
                            hasError = true;
                        }
                        

                        else if (password.length < 8)
                        {
                            $("#pwText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Your password must be at least 8 characters long.");
                            hasError = true;
                        }
                        
                        else if (password != conf)
                        {
                            $("#confText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Your passwords do not match.");
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
                        });
                  
                  });

function userEmailExists(username, email)
{
    $.ajax({
        type: 'POST',
        url: 'checkUsername.php',
        data: { username: username, email: email},
        dataType:'json',
        success: function(response){

           if (response.name > 0)
           {
                 $("#usernameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Sorry! That username is already taken.");
                hasError = true;
           }
           
           if (response.email > 0)
           {
           $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> There is already an account registered under that email.");
                hasError = true;
           }

        }
    });
}

</script>
