<?php
// form for new users to register, including fields to type username, password, and 
// password confirmation
// includes a link back to the log in page
?>
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
