<!doctype html>
 
<html lang="en">
<head>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    
    <?php
        $clubs = query("SELECT * FROM clubs");
        $events = query("SELECT * FROM events");
        $announcements = query("SELECT * FROM announcements");
        $array = [];
        foreach($clubs as $club)
        {
            array_push($array,$club["name"]);
        }
        foreach($events as $event)
        {
            array_push($array,$event["name"]);
        }
        foreach($announcements as $announcement)
        {
            array_push($array,$announcement["title"]);
        }

    ?>
    
    
    <script type="text/javascript">
    $(function() {
             
        var availableTags = <?php print json_encode($array); ?>;
        
        $( "#tags" ).autocomplete({
            source: availableTags
        });
    });
    </script>
</head>
<body>
 
<div class="ui-widget">
        <form class="form-horizontal offset2" style="text-align:left" action="search.php" method="get">
    <input type="text" id="tags" name="search"/>
    </form>
</div>
 
 
</body>
</html>
