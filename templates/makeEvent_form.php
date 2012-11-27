<?php
// allows user to choose any of their stocks to sell all shares for
// provides a dropdown menu with all possible stocks in portfolio
// provides link back to home page and logout
?>
<form action="makeEvent.php" method="post">
    <fieldset>
    
        <div class="control-group">
            Select club: <br/>
            <select name="club">
                <option value=''></option>
                
                <?php
                    foreach ($clubsOwned as $clubID => $clubName)
                    {
                        print("<option value='". $clubID . "'>" . $clubName . " </option> ");          
                    }    
                ?>

            </select>
        </div>

        <div class="control-group">
            <input autofocus name="name" placeholder="Event name" type="text"/>
        </div>
        
        <div class="control-group">
            Who can view this event? <br/>
            <?php
                print("<INPUT type=\"radio\" name=\"privacy\" value=\"" . $privacy["public"] . "\"> All public<BR> ");
                print("<INPUT type=\"radio\" name=\"privacy\" value=\"" . $privacy["all club"] . "\"> All club members<BR> ");
                print("<INPUT type=\"radio\" name=\"privacy\" value=\"" . $privacy["comp"] . "\"> All comp club members<BR> ");
                print("<INPUT type=\"radio\" name=\"privacy\" value=\"" . $privacy["non-comp"] . "\"> All non-comp club members<BR> ");            
                print("<INPUT type=\"radio\" name=\"privacy\" value=\"" . $privacy["admin"] . "\"> Admin only<BR> ");
            ?>            
        </div>
        
        <div class="control-group">
			<div>
				<input type="text" name="startDatetime" placeholder="Start Date/Time" class="datetime" value=""/>
		    </div>
		</div>
		
        <div class="control-group">
			<div>
				<input type="text" name="endDatetime" placeholder="End Date/Time" class="datetime" value=""/>
		    </div>
		</div>
		
        <div class="control-group">
            <TEXTAREA name="info" rows="10" cols="80" placeholder="Describe this event."></TEXTAREA>
        </div>
        
        <div class="control-group">
            <button type="submit" class="btn">Make event</button>
        </div>
        
    </fieldset>
</form>

<div>
    <a href="index.php">Home</a>
</div>

<div>
    <a href="logout.php">Log Out</a>
</div>
