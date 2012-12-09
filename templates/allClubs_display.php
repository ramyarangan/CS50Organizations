
<div class="row-fluid">
    <div class="reg-header">
        <h1>All organizations.</h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>

<div class = "row-fluid">

    <div class="alert alert-info span8 offset2">
        Below are links to the main pages of all registered organizations. They're sorted by attributes, so some may appear under multiple sections. </br> Can't find your group? Search using the toolbar above. If it doesn't exist,
<a href="createClub.php">create</a> it yourself!
    </div>


<div class="accordion span10 offset1" id="accordion2">

<?php foreach($sortedClubs as $clubGroup):?>

    <div class="accordion-group">

        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#<?= $clubGroup["type"]?>">
                <?= $clubGroup["type"] ?>
            </a>
        </div>
        
        <div id = "<?= $clubGroup["type"]?>" class="accordion-body collapse">
            <div class="accordion-inner">
 

        <div class = "span4" style="padding-bottom:12px">

        <?php  
        $n = 0; 
        $col_max = count($clubGroup["clubs"])/3;
    
        foreach($clubGroup["clubs"] as $club)
        { 
            print("<a href=\"allClubs.php?club=".str_replace(" ", "+", $club["name"])."\">".$club["name"]."</a></br>");
            $n++;
        
            if ($n >= $col_max)
            {
                print("</div> <div class=\"span4\">");
                $n = 0;
            }
        // print($n);
        //  print($col_max);
        
        }
     ?>
                </div>
            </div>
        </div>

    </div>

<?php endforeach ?>


    <div class="accordion-group">

        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#all">
                All clubs
            </a>
        </div>

        <div id="all" class="accordion-body collapse" >
            <div class="accordion-inner">
                <div class="span4" style="padding-bottom:20px">

                <?php 
                    $n = 0; 
                    $col_max = count($allClubs)/3;
                    
                    foreach($allClubs as $club){ 
                    
                        print("<a href=\"allClubs.php?club=".str_replace(" ", "+", $club["name"])."\">".$club["name"]."</a></br>");
                        
                        $n++;

                        if ($n >= $col_max)
                        {
                            print("</div> <div class=\"span4\">");
                            $n = 0;
                        }
                       // print($n);
                      //  print($col_max);
                        
                    }?>
                    </div>
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