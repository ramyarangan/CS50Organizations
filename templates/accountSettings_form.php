<?php
// form for new users to register, including fields to type username, password, and 
// password confirmation
// includes a link back to the log in page
?>

<div class="row-fluid">
    <div class="reg-header">
        <h1>
            Change account settings.
        </h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>

<div class = "row-fluid" style="padding:30px">

<form id="accSettingsForm" action="accountSettings.php" method="post" class="form-horizontal offset2" style="text-align:left">

    <div class="control-group">
        <label class="control-label" for="inputFirst"><strong>Name</strong></label>
        <div class="controls row-fluid" id="inputName">
        <?php
            print("<div class=\"span2 row\"><input class=\"span12\" id=\"inputFirst\" name=\"first\" value=\"".$first."\" type=\"text\"/></div>");
        ?>
        <?php
            print("<div class=\"span2 row\"><input class=\"span12\" id=\"inputLast\" name=\"last\" value=\"".$last."\" type=\"text\"/></div>");
        ?>
        </div>
    </div>

<div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
    <div class="controls row-fluid">
        <div class="span10 row error" id="nameText"></div>
    </div>
</div>

    <div class="control-group">
        <label class="control-label" for="inputoldPW"><strong>Old Password</strong></label>
        <div class="controls row-fluid">
            <div class="span4 row"><input class="span12" id="inputoldPW" name="oldPassword" type="password"/></div>
        </div>
    </div>
<div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
<div class="controls row-fluid">
<div class="span10 row error" id="oldpwText"></div>
</div>
</div>


    <div class="control-group">
        <label class="control-label" for="inputPW"><strong>New Password</strong></label>
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
        <?php
            print("<div class=\"span4 row\"><input class=\"span12\" id=\"inputEmail\" name=\"email\" value=\"".$email."\" type=\"email\"/></div>");
        ?>

        </div>
    </div>

<div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
<div class="controls row-fluid">
<div class="span10 row error" id="emailText"></div>
</div>
</div>

    <div class="control-group">
        <div class="controls">
            <button id="submit" type="submit" class="btn">Submit</button>
        </div>
    </div>
</form>
</div>


<script>

$(document).ready(function(){

     //$("#submit").click(function(){
           $(".error").html("");

                        var first = $("#inputFirst").val();
                        var last = $("#inputLast").val();
                        var oldpassword = $("#inputoldPW").val();
                        var password = $("#inputPW").val();
                        var conf = $("#inputConf").val();
                        var email = $("#inputEmail").val();
                    
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                        
                        //error checks!
                        checkFirstName = false; 

                        $("#inputFirst").change(function(){
                            checkFirstName = true;
                        })
                        checkLastName = false;
                        $("#inputLast").change(function(){
                            checkLastName = true;
                        })
                        
                        $("#inputFirst").change(function(){

                            if(checkFirstName && checkLastName)
                            {   
                            first = $("#inputFirst").val();
                            last = $("#inputLast").val();
                            if (first == "" || last == "") 
                            {
                                $("#nameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter valid first and last names.");

                            }
                            else
                            {
                                $("#nameText").html("");

                            }
                            }
                          });
                        
                       $("#inputLast").change(function(){
                            if(checkFirstName && checkLastName)
                            {
                            first = $("#inputFirst").val();
                            last = $("#inputLast").val();
                            if (first == "" || last == "") 
                            {
                                $("#nameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter valid first and last names.");

                            }
                            else
                            {
                                $("#nameText").html("");

                            }
                            }
                          });
                        
                        $("#inputUsername").change(function(){
                            curNameError = false;
                            username = $("#inputUsername").val();
                            if (username == "") 
                            {
                                $("#usernameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please choose a username.");
                                curNameError = true;
                            }
                            userExists(username);
                            if(!curNameError)
                            {
                                $("#usernameText").html("");
                            }
                        });
                        
                        $("#inputoldPW").change(function(){
                            oldpassword = $("#inputoldPW").val();
                            if (oldpassword == "") 
                            {
                                $("#oldpwText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your old password.");

                            }

                            else 
                            {
                                $("#pwText").html("");

                            }
                        });

                        $("#inputPW").change(function(){
                            password = $("#inputPW").val();
                            if (password.length < 8 && password.length > 0)
                            {
                                $("#pwText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Your password must be at least 8 characters long.");

                            }
                            
                            else 
                            {
                                $("#pwText").html("");

                            }
                        });
                        
                        $("#inputConf").change(function(){
                            conf = $("#inputConf").val();
                            if (password != conf)
                            {
                                $("#confText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Your passwords do not match.");

                            }
                            else
                            {
                                $("#confText").html("");

                            }
                        });
                        
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
                        if(curEmailError == false)
                        {
                            $("#emailText").html("");
                        }
                        });

                        $("#inputoldPW").change(function(){ 
                            oldpassword = $("#inputoldPW").val();    
                            curoldPWError = false;            
                        if (oldpassword == "") 
                        {
                            $("#oldpwText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your old password.");
                            curoldPWError = true;
                        }
                        if(curoldPWError == false)
                        {
                            $("#oldpwText").html("");
                        }
                        });

                  
                  });

     $("#submit").click(function(){
        hasError = false;
                        var first = $("#inputFirst").val();
                        var last = $("#inputLast").val();
                        var username = $("#inputUsername").val();
                        var oldpassword = $("#inputoldPW").val();
                        var password = $("#inputPW").val();
                        var conf = $("#inputConf").val();
                        var email = $("#inputEmail").val();
                    
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    
                        //error checks!
                        checkPassword(oldpassword);

                        userEmailExists(email);
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
                            userExists(username);
                        
                        if (password.length < 8 && password.length > 0)
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

                        if (hasError == false) 
                        {
                            $(this).hide();
                            $("#accSettingsForm").submit();
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
function userExists(username)
{
    $.ajax({
        type: 'POST',
        url: 'checkUsername.php',
        data: { username: username, email: ""},
        dataType:'json',
        async: false,
        success: function(response){

           if (response.name > 0)
           {
                 $("#usernameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Sorry! That username is already taken.");
                curNameError = true;
                hasError = true;
           }
        }
    });
}
function checkPassword(oldpassword)
{
    $.ajax({
        type: 'POST',
        url: 'checkPassword.php',
        data: {oldpassword: oldpassword},
        dataType:'json',
        async: false,
        success: function(response){
           if (response.check == 0)
           {
                $("#oldpwText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Sorry! That password is incorrect.");
                curoldPWError = true;
                hasError = true;
           }
       }
    });
}

function userEmailExists(email)
{
    $.ajax({
        type: 'POST',
        url: 'checkEmail.php',
        data: {email: email},
        dataType:'json',
        async: false,
        success: function(response){
           if (response.email > 0)
           {
                $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> There is already an account registered under that email.");
                curEmailError = true;
                hasError = true;
           }
        }
    });
}

</script>
