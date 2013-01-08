<style>

td{
    width:25%;
}

th{
    font-size:14px;
}

</style>

<div class="row-fluid">
    <div class="reg-header">
<?php if(strtoupper($clubInfo["name"])==$clubInfo["abbreviation"]): ?>
        <h1><?=$clubInfo["name"]?>: Edit membership.</h1>
<?php else: ?>
        <h1><?=$clubInfo["abbreviation"]?>: Edit membership.</h1>
<?php endif ?>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>




<div class="row">
<div class = "span8 offset2">


<?php if($success):?>
<div class="alert alert-info">
<button type="button" class="close" data-dismiss="alert">×</button>
Your changes have been saved.
</div>
<?php endif?>

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
                print("</tbody> </table> </div> </div> </div> ");
            
            $currentLevel = $members[$i]["level"];
            print("<div class=\"accordion-group\" style=\"margin:20px\">");
            print("<div class=\"accordion-heading\">");
            switch ($currentLevel)
            {
                case "5": 
                    print("Current Administrators</br>");
                    break;
                case "4": 
                    echo "Current Members</br>";
                    break;
                case "3": 
                    echo "Current Compers</br>";
                    break;
                case "2": 
                    echo "Pending Requests</br>";
                    break;
                    
            }
            print("</div>");
            print("<div class=\"accordion-body\">");
            print("<div class=\"accordion-inner\">");
            print("<table class=\"table table-condensed table-hover\">");
            print("<thead> <tr> <th>New Level</th> <th>Administrator</th> <th>Full Member</th> <th>Comper</th> <th><i class=\"icon-remove\"></i></th></tr> </thead> <tbody>");
            
        }
        
        print("<tr> <td>".$members[$i]["realname"]."</td>");
        switch($currentLevel)
        {
            case "5":
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"5\" checked> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"4\"> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"3\"> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"0\" </td> </tr>");
                break;
            case "4":
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"5\"> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"4\" checked> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"3\"> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"0\" </td> </tr>");
                break;
            case "3":
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"5\"> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"4\"> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"3\" checked> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"0\" </td> </tr>");
                break;
            case "2":
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"5\"> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"4\"> </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"3\" </td>");
                print("<td>"."<input type=\"radio\" name=\"".$members[$i]["id"]."\" value=\"0\" </td> </tr>");
                break;
        }
    }   
    print("</tbody> </table> </div> </div> </div>");
?>

<button type="submit" class="btn">Save Changes</button>
</form>
</div>

