<form action="allClubs.php" method="post">
    <select name="club">
        <?php
            foreach ($clubs as $club)
            {
                 print("<option>".$club["name"]."</option>");
            }
        ?>
    </select>
    <button type="submit" class="btn">Go!</button>
    <div>
        <?php   
            foreach ($clubs as $club) 
            {   
                print($club["name"]);
            }    
        ?>
    </div>
</form>
