<div class="row-fluid">
    <div class="club-header">
        <h1>
            Log in.
        </h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>

<div class = "row-fluid" style="padding:30px">
<form class="form-horizontal offset2" style="text-align:left" action="login.php" method="post">

    <div class="control-group">
        <label class="control-label" for="inputUsername">Username</label>
        <div class="controls">
            <input name="username" type="text" id="inputUsername">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputPassword">Password</label>
        <div class="controls">
            <input name="password" type="password" id="inputPassword">
        </div>
    </div>

    <?php
        print("<input type=\"hidden\" name=\"go\" value=\"".$go."\">");
    ?>
    
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Log In</button>
        </div>
    </div>
</form>
</div>

<div>
    Don't have an account? <a href="register.php">Register</a> today. </br>
    Forgot your username or password? <a href="recover.php">Recover</a> them here.
</div>
