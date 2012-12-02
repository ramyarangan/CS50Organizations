<form action="sendMail.php" method="post">
    <fieldset>
        <?php
        print("<input type=\"hidden\" name=\"club\"");
        if (empty($_SESSION["id"]))
        {
            print("<div class=\"control-group\"> Email: 
            <input name=\"email\" placeholder=\"Email\" type=\"text\"/>
        </div>");

        }
        ?>
        <div class="control-group">
            Subject: <input name="subject" placeholder="Enter the subject line." type="text"/>
        </div>
        <div class="control-group">
            Body: <input name="body" placeholder="Enter your message." type="text"/>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Send</button>
        </div>
    </fieldset>
</form>

