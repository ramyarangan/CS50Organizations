<?php 
    // configuration
    require("../includes/config.php");
        
    if (isset($_SESSION["id"]))
   {    
        
        $myclubs = query("SELECT * FROM subscriptions JOIN clubs WHERE userID = ? AND subscriptions.ClubID = clubs.id", $_SESSION["id"]);
        print("<div>");

        print("
        <input type=\"radio\" name=\"eventsList\" id=\"chooseFromClubs\" value=\"choose\"> 
                    Choose from your clubs <br/>");
        print("<div id=\"myClubs\">");
        foreach($myclubs as $club)
        {
            print("<input type=\"checkbox\" name=\"myClubs[]\" value=\"" . $club["name"] . "\">" 
                    . $club["name"] . "<br/>");
        }
        print("</div>");
        print("<input type=\"radio\" name=\"eventsList\" value=\"myEvents\">All My Clubs <br/>
        <input type=\"radio\" name=\"eventsList\" value=\"public\">All Public Events <br/>
        <button id=\"submitCalOption\"> Go </button>
        </div>");
   }
   ?>
  
    <div id="displayOption">
        Displaying public calendar...
    </div>
    
    <div id="eventsArea">
    <div>
    
    <script>
    $(document).ready(function(){

         $("#myClubs").hide();
         $("input[name=eventsList]").click(function(){
              if($("input[id=chooseFromClubs]").attr('checked')== "checked"){
                $("#myClubs").show();
              }
              else $("#myClubs").hide();
         });
         

      })

    </script>
    
     <script>
        $("#eventsArea").load("calendar.php", {eventsOption:"public"});
        $("#submitCalOption").click(function(){
            var txt=$("input[name=eventsList]:checked").val();
            if(!txt)
            {
                $("#displayOption").text("Please select an option. Displaying public events...");
                $("#eventsArea").load("calendar.php", {eventsOption:"public"});
            }
            if(txt== "choose")
            {
                var data = { 'myClubs[]' : []};
                $("input[type=checkbox]:checked").each(function() {
                    data['myClubs[]'].push($(this).val());
                });
                
                //alert(data['myClubs[]']);
                if(data['myClubs[]'].length == 0)
                {
                    $("#displayOption").text("Please select some clubs! Displaying all your events...");
                    $("#eventsArea").load("calendar.php", {eventsOption:"myEvents"});
                }
                else
                {
                    var string =  $("input[name=myClubs]:checked").map(
                        function(){return this.value;}).get().join(", ");
                    $("#displayOption").text("Displaying events for: " + string);
                    $("#eventsArea").load("calendar.php", {eventsOption:txt, myClubs: data['myClubs[]']});
                }
            }       
            else
            {
                if(txt=="public") 
                    $("#displayOption").text("Displaying pubic events...");
                if(txt=="myEvents")
                    $("#displayOption").text("Displaying all your club events...");
                $("#eventsArea").load("calendar.php", {eventsOption:txt});
            }
                          
        });

    </script>

