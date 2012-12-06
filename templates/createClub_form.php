<?php
// form for new users to register, including fields to type username, password, and 
// password confirmation
// includes a link back to the log in page
?>

<div class="row-fluid">
    <div class="club-header">
        <h1>
            Create an organization.
        </h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>

<form class="form-horizontal offset1" style="text-align:left" action="createClub.php" method="post">

    <div class="control-group">
        <label class="control-label" for="inputName">Organization Name</label>
        <div class="controls">
            <input class="span4" type="text" name="name" id="inputName">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputAbbr">Abbreviation</label>
        <div class="controls">
            <input class="span4" type="text" name="abbreviation" id="inputAbbr"placeholder="e.g. HSA or IOP">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputEmail">Official Email</label>
        <div class="controls">
            <input class="span4" type="email" name="email" id="inputEmail"placeholder="e.g. jharvard@example.college.edu">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputMembership">Membership</label>
        <div class="controls">
            <label class="radio">
                <input type="radio" name="privacy" id="optionsOpen" value="open" checked>
                Open - Users who request to join will automatically be added as members.
            </label>
            <label class="radio">
                <input type="radio" name="privacy" id="optionsClosed" value="closed" checked>
                Closed - You or another group administrator must approve all membership requests.
            </label>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputMembership">Attributes</label>
        <div class="controls">

        <?php
            foreach ($categories as $categoryID => $category)
            {
                print("<label class=\"checkbox\">");
                print("<input type=\"checkbox\" name=\"categories[]\" value='"
              . $categoryID . "'>" . $category . " ");  
                print("</label>");
            }    
            //print("<input type=\"checkbox\" name=\"categories[]\" value=\"". $otherID . "\"> Other <br>");
        ?>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputInfo">Description</label>
        <div class="controls">
            <textarea class="span4" id="inputInfo" name="info" rows="3" placeholder="Describe your organization briefly."></textarea>        
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Create organization!</button>
        </div>
    </div>

</form>

