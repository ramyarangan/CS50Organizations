

<?php if(empty($clubName)):?>

<div class="row-fluid">
    <div class="club-header">
        <h1>
            Make an announcement.
        </h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>

<form class="form-horizontal offset3" style="text-align:left" action="makeAnnouncement.php" method="post">
    <input type ="hidden" name="all" value="1">
    <div class="control-group">
        <label class="control-label" for="inputClub">Organization Name</label>
        <div class="controls">
            <select name="club" id="inputClub">
                <?php foreach ($clubsOwned as $clubID => $clubName)
                    print("<option value='". $clubID . "'>" . $clubName . " </option> ");   
                ?>
            </select>
        </div>
    </div>

<?php else: ?>

<form class="form-horizontal" style="text-align:left" action="makeAnnouncement.php" method="post">
    <input type ="hidden" name="club" <?="value=\"".$clubName."\""?> >
    <input type ="hidden" name="all" value="-1">
<?php endif?>

    <div class="control-group">
        <label class="control-label" for="inputTitle">Announcement Title</label>
        <div class="controls">
            <input class="span4" type="text" name="name" id="inputTitle">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputText">Announcement Text</label>
        <div class="controls">
            <textarea class="span4" name="info" rows="6"></textarea>        
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputPrivacy">Privacy Level</label>
        <div class="controls">
            <select name="privacy" class="span2" id="inputPrivacy">
                <option value= <?="\"".$privacy["public"]."\""?> >Public</option> 
                <option value= <?="\"".$privacy["comp"]."\""?> >Compers</option> 
                <option value= <?="\"".$privacy["non-comp"]."\""?> >Full Members</option> 
                <option value= <?="\"".$privacy["admin"]."\""?> >Administrators</option> 
            </select>
        </div>
    </div>


    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Make announcement!</button>
        </div>
    </div>
</form>

