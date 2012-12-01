<form action="allClubs.php" method="GET">
    <select name="club">
        <?php
            foreach ($clubs as $club)
            {
                 print("<option>".$club["name"]."</option>");
            }
        ?>
    </select>
    <button type="submit" class="btn">Go!</button>
</form>
