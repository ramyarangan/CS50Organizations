<form action="sendMail.php" method="post">
    <fieldset>
        <?php
        print("<input type=\"hidden\" name=\"club\" value=\"".$club."\">");
        if (empty($_SESSION["id"]))
        {
            print("<div class=\"control-group\"> Email: 
            <input name=\"email\" placeholder=\"Email\" type=\"text\"/>
        </div>");

        }
        ?>
        <div class="control-group">
            Subject: <input name="subject" placeholder="Hello" type="text"/>
        </div>
        <div class="control-group">
            Body: <input name="body" placeholder="What's up?" type="text"/>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">SEND!</button>
        </div>
    </fieldset>
</form>

