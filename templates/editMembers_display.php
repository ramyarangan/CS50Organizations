

<div class="row-fluid">

    <div class="club-header">

        <h1>
        <?php 
            if($clubInfo["abbreviation"]!="")
                print($clubInfo["abbreviation"]." <small>Edit Membership</small>");
            else
                print($clubInfo["name"]);
            ?>
        </h1>

        
        <div><img src="img/dots.jpg" width=80%></div>
                

    </div>

</div>

<?php if($success):?>

<div class= "row-fluid" style="padding:30px">
    <div class="alert span6 offset3" >
        Your changes have been saved.
    </div>
</div>
<?php endif?>

<div class="row-fluid">

<form action="editMembers_post.php" method="post">
    <input type="hidden" name="clubID" value=<?="\"".$clubInfo["id"]."\""?> >
<?php 

    
    $currentLevel = 6; 
    
    for ($i = count($members) - 1; $i >= 0; $i--)
    {

        if ($currentLevel > $members[$i]["level"])
        {
            $currentLevel = $members[$i]["level"];
            
            switch ($currentLevel)
            {
                case "5": 
                    print("Administrators</br>");
                    break;
                case "4": 
                    echo "Members</br>";
                    break;
                case "3": 
                    echo "Compers</br>";
                    break;
            }
        }
            
            print ($members[$i]["realname"].": ");
            
            print("<select name=\"".$members[$i]["id"]."\">");
            
            switch ($currentLevel)
            {
                case "5": 
                    print("<option value=\"5\" selected=\"selected\"> Administrator</option>");
                    print("<option value=\"4\">Member</option>");
                    print("<option value=\"3\">Comper</option>");
                    break;
                case "4": 
                    print("<option value=\"5\"> Administrator</option>");
                    print("<option value=\"4\" selected=\"selected\">Member</option>");
                    print("<option value=\"3\">Comper</option>");
                    break;
                case "3": 
                    print("<option value=\"5\">Administrator</option>");
                    print("<option value=\"4\">Member</option>");
                    print("<option value=\"3\" selected=\"selected\">Comper</option>");
                    break;
            }
            
            print("</select></br>");
    }
    
?>


   <button type="submit" class="btn">Save Changes</button>

</form>
<?php foreach ($pending as $pend):?>
    <p><?=$pend["realname"]?></p>

<? endforeach ?>

</div>
