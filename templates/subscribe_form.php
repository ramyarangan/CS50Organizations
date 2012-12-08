<form class="form-horizontal" style="text-align:left" action="subscribe.php" method="post">
    
    <input type ="hidden" name="club" value= <?="\"".$club."\""?> >



    <div class="control-group">
    
        <label class="control-label" for="inputEmail">Notification Type</label>
        <div class="controls">
        <?php if ($text == 1):?>
            <input type="checkbox" name="text" value= "1" checked>Text<br>
        <?php else: ?>        
            <input type="checkbox" name="text" value= "1">Text<br>
        <?php endif ?>
        <?php if ($email == 1):?>
            <input type="checkbox" name="email" value="1" checked>Email
        <?php else: ?>        
            <input type="checkbox" name="email" value="1">Email
        <?php endif ?>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Send</button>
        </div>
    </div>

</form>
