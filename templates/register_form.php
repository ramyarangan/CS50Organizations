<?php
// form for new users to register, including fields to type username, password, and 
// password confirmation
// includes a link back to the log in page
?>

<div class="row-fluid">
    <div class="club-header">
        <h1>
            Log in.
        </h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>

<div class = "row-fluid" style="padding:30px">

<form class="form-horizontal offset2" style="text-align:left" action="register.php" method="post">

    <div class="control-group">
        <label class="control-label" for="inputName">Name</label>
        <div class="controls">
            <input name="realname" type="text" placeholder="First Last" id="inputName">
        </div>
    </div>

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

    <div class="control-group">
    <label class="control-label" for="inputPassword">Confirm Password</label>
        <div class="controls">
            <input name="confirmation" type="password" id="inputPassword">
        </div>
    </div>

<form action="register.php" method="post">
    <fieldset>
        <div class="control-group">
            <input autofocus name="realname" placeholder="Name" type="text"/>
        </div>
        <div class="control-group">
            <input autofocus name="username" placeholder="Username" type="text"/>
        </div>
        <div class="control-group">
            <input name="password" placeholder="Password" type="password"/>
        </div>
        <div class="control-group">
            <input name="confirmation" placeholder="Confirmation" type="password"/>
        </div>
        <div class="control-group">
            <input name="email" placeholder="Your Email" type="email"/>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Register</button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a>
</div>
