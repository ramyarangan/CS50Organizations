<div class="row-fluid">
    <div class="club-header">
        <h1>
            Log in.
        </h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>

<div class = "row-fluid" style="padding:30px">
<form class="form-horizontal offset2" id="logForm" style="text-align:left" action="login.php" method="post">

    <div class="control-group">
        <label class="control-label" for="inputUsername">Username</label>
        <div class="controls">
            <input name="username" type="text" id="inputUsername">
        </div>
    </div>

<div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
<div class="controls row-fluid">
<div class="span10 row error" id="usernameText"></div>
</div>
</div>

    <div class="control-group">
        <label class="control-label" for="inputPW">Password</label>
        <div class="controls">
            <input name="password" type="password" id="inputPW">
        </div>
    </div>

<div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
<div class="controls row-fluid">
<div class="span10 row error" id="pwText"></div>
</div>
</div>

    <?php
        print("<input type=\"hidden\" name=\"go\" value=\"".$go."\">");
    ?>
    
    <div class="control-group">
        <div class="controls">
            <button id="submit" type="submit" class="btn">Log In</button>
        </div>
    </div>
</form>
</div>

<div>
    Don't have an account? <a href="register.php">Register</a> today. </br>
    Forgot your username or password? <a href="recover.php">Recover</a> them here.
</div>


<script>

$(document).ready(function(){

     //$("#submit").click(function(){
           $(".error").html("");
                   

     $("#submit").click(function(){
        hasError = false;

                        var username = $("#inputUsername").val();
                        var password = $("#inputPW").val();
                $("#usernameText").html("");
                $("#pwText").html("");
                        
                        //error checks!


                            if (username == "") 
                            {
                                $("#usernameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please choose a username.");
                                hasError = true;
                            }
                            userExists(username);
                        
                        if (password == "") 
                        {
                            $("#pwText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please choose a password.");
                            hasError = true;
                        }
                        
                        checkPassword(username, password);
                        if (hasError == false) 
                        {
                            $(this).hide();
                            $("#logForm").submit();
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
    
})

function userExists(username)
{
    $.ajax({
        type: 'POST',
        url: 'checkUsername.php',
        data: { username: username, email: ""},
        dataType:'json',
        async: false,
        success: function(response){

           if (response.name <= 0)
           {
                if(!hasError)
                     $("#usernameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Sorry! That username doesn't exist.");
                hasError = true;
           }
        }
    });
}

function checkPassword(username, password)
{
    $.ajax({
        type: 'POST',
        url: 'checkPassword.php',
        data: { username: username, password: password},
        dataType:'json',
        async: false,
        success: function(response){
            
           if (response.check <= 0)
           {
                if(!hasError)
                 $("#pwText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Sorry! That password is incorrect.");
                hasError = true;
           }
        }
    });
}


</script>
