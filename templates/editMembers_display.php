

<div class="row-fluid">
    <div class="club-header">

        <h1>
        <?php 
            if($clubInfo["abbreviation"]!="")
                print($clubInfo["abbreviation"]." <small>Edit Membership</small>");
            else
                print($clubInfo["name"]." <small>Edit Membership</small>");
            ?>
        </h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>

<?php if($success):?>
<div class= "row-fluid" style="padding:30px">
    <div class="alert span6 offset3">
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
            // if end of previous category
            if ($currentLevel != 6)
                print("</tbody> </table>");
            
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
            
            print("<table class=\"table table-condensed table-hover\">");
            print("<thead> <tr> <th>Name</th> <th>Administrator</th> <th>Member</th> <th>Comper</th> </tr> </thead> <tbody>");
            
        }
        
        print("<tr> <td>".$members[$i]["realname"]."</td>");
        switch($currentLevel)
        {
            case "5":
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"5\" checked> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"4\"> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"3\"> </td> </tr>");
                break;
            case "4":
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"5\"> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"4\" checked> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"3\"> </td> </tr>");
                break;
            case "3":
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"5\"> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"4\"> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"3\" checked> </td> </tr>");
                break;
        }
    }   
    print("</tbody> </table>");
?>

<button type="submit" class="btn">Save Changes</button>
</form>
</div>

<?php foreach ($pending as $pend):?>
    <p><?=$pend["realname"]?></p>

<? endforeach ?>

