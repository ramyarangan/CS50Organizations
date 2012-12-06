<form class="form-horizontal" style="text-align:left" action="sendMail.php" method="post">
    
    <input type ="hidden" name="club" value= <?="\"".$club."\""?> >


    <div class="control-group">
        <label class="control-label" for="inputName">Your Name</label>
        <div class="controls">
        <?php if (empty($_SESSION["id"])):?>
            <input class="span4" type="text" name="name" id="inputName" placeholder="First Last">
        <?php else: ?>
            <input class="span4" type="text" name="name" value=<?="\"".$name."\""?> id="inputName">
        <?php endif ?>
        </div>
    </div>

    <div class="control-group">
    
        <label class="control-label" for="inputEmail">Your Email Address</label>
        <div class="controls">
        <?php if (empty($_SESSION["id"])):?>
            <input class="span4" type="email" name="email" id="inputEmail">
        <?php else: ?>
            <input class="span4" type="email" name="email" value=<?="\"".$email."\""?> id="inputEmail">
        <?php endif ?>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputSubj">Subject</label>
        <div class="controls">
            <input class="span4" type="text" name="subject" id="inputSubj">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputBody">Message Body</label>
        <div class="controls">
            <textarea class="span4" name="body" id="inputBody" rows="8"></textarea>        
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Send</button>
        </div>
    </div>

</form>