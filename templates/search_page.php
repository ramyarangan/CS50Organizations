<div class="row-fluid">
    <div class="reg-header">
        <h1>Search results.</h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>

<div class = "row-fluid">
    
<?php if(isset($alert)):?>
    <div class="alert alert-info span8 offset2">
        <?= $alert ?>
    </div>
<?php endif ?>

<div class="accordion span10 offset1" id="accordion2">

        <div class="accordion-group">

            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#clubs">
                Clubs (<?= count($clubRows) ?>)
                </a>
            </div>

            <div id ="clubs" class="accordion-body collapse">
                <div class="accordion-inner">
                <?php if (!empty($clubRows))
                    {
                        print("<div class=\"span4\" style=\"padding-bottom:20px\">");
                        $n = 0; 
                        $col_max = count($clubRows)/3;
    
                        foreach($clubRows as $club)
                        { 
                            print("<a href=\"allClubs.php?club=".str_replace(" ", "+", $club["name"])."\">".                $club["name"]."</a></br>");
                            $n++;
        
                            if ($n >= $col_max)
                            {
                                print("</div> <div class=\"span4\">");
                                $n = 0;
                            }
                            // print($n);
                            //  print($col_max);
                        }
                        print("</div>");
                    }
                    else
                        print("No clubs matched your query.");
                ?>
            </div>
        </div>
    </div>

        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#announcements">
                    Announcements (<?= count($annRows) ?>)
                </a>
            </div>
            <div id="announcements" class="accordion-body collapse">
                <div class="accordion-inner">
                    <div class="span8 offset2">


<?php if (!empty($annRows)){

    // show max 10 announcements....
    for ($i = 0; $i < count($annRows) && $i < 3 ; $i++)  
    {                    
        print("<div class = \"announcement\">");
        print("<div class = \"announcement-subject\">");
        print($annRows[$i]["title"]);
        print("</div>");  
    
        print("<div class = \"announcement-content\">");
        print($annRows[$i]["text"]);
        print("</div>"); 
        
        print("<div class = \"announcement-info\">");
        $poster = "";
        if($annRows[$i]["userID"]==0)
            $poster = "CS50 Organizations";
        
        else
        {
            $poster = query("SELECT * FROM users WHERE id=?", $annRows[$i]["userID"]);
            $poster = $poster[0]["realname"];
        }
        print("posted ".$annRows[$i]["time"]." by ".$poster." for ".$annRows[$i]["clubName"]);
        print("</div>");
        print("</div>");
    
    }
    
    if (count($annRows) > 3)
    {
        print("<div class=\"expand\" style=\"padding:20px\"> (Only top 10 results shown.) </div>");
    }
}
    else
    {
        print("No announcements matched your query.");
    }
?>


                    </div>
                </div>
            </div>
        </div>
        


<div class="accordion-group">
    <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#events">
            Events (<?= count($eventRows) ?>)
        </a>
    </div>

    <div id ="events" class="accordion-body collapse">
        <div class="accordion-inner">
<?php if (!empty($eventRows)){
    print("<div class=\"span4\" style=\"padding-bottom:20px\">");
    $n = 0; 
    $col_max = count($eventRows)/3;
    
    foreach($eventRows as $event)
    { 
        print("<a href=\"allClubs.php?club=".str_replace(" ", "+", $event["club"])."\">".$event["name"]."</a></br>");
        $n++;
        
        if ($n >= $col_max)
        {
            print("</div> <div class=\"span4\">");
            $n = 0;
        }
        // print($n);
        //  print($col_max);
    }
    print("</div>");
}
    else
    print("No events matched your query.");
    ?>
        </div>
    </div>
</div>


</div>

</div>


<script>
$('.accordion-toggle').click(function(){
                             $(this).parents('.accordion-group').css('border', '3px solid #d9edf7');
                             $(this).parents('.accordion-group').siblings().css('border', '1px solid #e5e5e5');
                             $(this).parents('.accordion-group').find('.accordion-inner').css('border-top', '3px solid #d9edf7');
                             });
</script>

