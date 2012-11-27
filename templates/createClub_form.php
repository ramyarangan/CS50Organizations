<?php
// form for new users to register, including fields to type username, password, and 
// password confirmation
// includes a link back to the log in page
?>
<form action="createClub.php" method="post">
    <fieldset>
        <div class="control-group">
            <input autofocus name="name" placeholder="Club Name" type="text"/>
        </div>
        <div class="control-group">
            <input autofocus name="abbreviation" placeholder="Abbreviation" type="text"/>
        </div>
        <div class="control-group">
            <input name="email" placeholder="Club Email" type="email"/>
        </div>
        
        <div class="control-group">
             <INPUT type="radio" name="privacy" value="open"> Open<BR>
             <INPUT type="radio" name="privacy" value="closed"> Closed<BR>
        </div>
 
        <div class="control-group">
            <TEXTAREA name="info" rows="20" cols="80" placeholder="Describe your club."></TEXTAREA>
        </div>


  
        <div class="control-group">
            <button type="submit" class="btn">Create club</button>
        </div>
    </fieldset>
</form>

<?php
// include links back to home page and logout
?>
<div>
    <a href="index.php">Home</a>
</div>

<div>
    <a href="logout.php">Log Out</a>
</div>

