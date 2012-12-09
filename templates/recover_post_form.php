<div>
<div class="row-fluid">
        <div class="reg-header">
        <h1>Reset password.</h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>


<?php if(!empty($alert)): ?>
<div class="row">
        <div class="alert alert-info span6 offset3">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?=$alert?>
        </div>
</div>
<?php endif?>


<div class = "row-fluid" style="padding:30px">
<form id="recForm" action="recover_post.php" method="post" class="form-horizontal offset2" style="text-align:left">
    
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
        <label class="control-label" for="inputConf"><strong>Confirm New Password</strong></label>
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
        <label class="control-label" for="inputCode"><strong>Recovery Code</strong></label>
        <div class="controls row-fluid">
            <div class="span4 row"><input class="span12" id="inputCode" name="code" type="password"/></div>
        </div>
    </div>

<div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
<div class="controls row-fluid">
<div class="span10 row error" id="codeText"></div>
</div>
</div>

    <div class="control-group">
        <div class="controls">
            <button id="submit" type="submit" class="btn">Save</button>
        </div>
    </div>
</form>
</div>
</div>
</form>

<script>

$(document).ready(function(){

     //$("#submit").click(function(){
        $(".error").html("");
        //hasError = false;
                        var username = $("#inputUsername").val();
                        var password = $("#inputPW").val();
                        var conf = $("#inputConf").val();
                        var code = $("#inputCode").val();
                        
                        var checkCode1 = false;
                        var checkCode2 = false;
                        $("#inputCode").change(function(){
                            checkCode1 = true;
                            curCodeError = false;
                            code = $("#inputCode").val();
                            if (code == "") 
                            {
                                $("#codeText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your recovery code.");
                                curCodeError = true;
                            }
                            if(checkCode1 && checkCode2)
                            {
                                codeCorrect(code, username);
                            }
                            if(!curCodeError)
                            {
                                $("#codeText").html("");
                            }
                        });
                        
                        $("#inputUsername").change(function(){
                            checkCode2 = true;
                            curNameError = false;
                            username = $("#inputUsername").val();
                            if (username == "") 
                            {
                                $("#usernameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please choose a username.");
                                curNameError = true;
                            }
                            userEmailExists(username);
                            if(!curNameError)
                            {
                                $("#usernameText").html("");
                            }
                        });
                        

                        
                        $("#inputPW").change(function(){
                            password = $("#inputPW").val();
                            if (password == "") 
                            {
                                $("#pwText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please choose a password.");

                            }

                            else if (password.length < 8)
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
                 

                  
     $("#submit").click(function(){
        hasError = false;
                         username = $("#inputUsername").val();
                        password = $("#inputPW").val();
                        conf = $("#inputConf").val();
                        code = $("#inputCode").val();
                         

                            if (username == "") 
                            {
                                $("#usernameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please choose a username.");
                                hasError = true;
                            }
                            userEmailExists(username);
                        
                        
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
                            if (code == "") 
                            {
                                $("#codeText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your recovery code.");
                                hasError = true;
                            }
                                                    
                        codeCorrect(code, username);                        
                        if (hasError == false) 
                        {
                            $(this).hide();
                            $("#recForm").submit();
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
    
function codeCorrect(code, username)
{
    $.ajax({
        type: 'POST',
        url: 'checkRecoveryCode.php',
        data: { username: username, code: code},
        dataType:'json',
        async: false,
        success: function(response){

           if (response.check <= 0)
           {
                if(curCodeError== false)
                 $("#codeText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Sorry! That code is invalid!");
                curCodeError = true;
                hasError = true;
           }
        }
    });
}

function userEmailExists(username)
{
    $.ajax({
        type: 'POST',
        url: 'checkUsername.php',
        data: { username: username, email: ""},
        dataType:'json', 
        async: false,
        success: function(response){
           if ( response.name <= 0)
           {
                 if(curNameError== false)
                 $("#usernameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Sorry! That username does not exist!");
                curNameError = true;
                hasError = true;
           }

        }
    });
}

</script>
