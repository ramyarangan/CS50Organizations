<?php
// form for new users to register, including fields to type username, password, and 
// password confirmation
// includes a link back to the log in page
?>

<div class="row-fluid">
    <div class="reg-header">
        <h1>Create an organization.</h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>


<form id="clubForm" class="form-horizontal offset1" style="text-align:left" action="createClub.php" method="post">

    <div class="control-group">
        <label class="control-label" for="inputName">Organization Name</label>
        <div class="controls">
            <input class="span4" type="text" name="name" id="inputName">
        </div>
    </div>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="nameText"></div>
        </div>
        </div>

    <div class="control-group">
        <label class="control-label" for="inputAbbr">Abbreviation</label>
        <div class="controls">
            <input class="span4" type="text" name="abbreviation" id="inputAbbr"placeholder="e.g. HSA or IOP">
        </div>
    </div>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="abbrText"></div>
        </div>
        </div>
        
    <div class="control-group">
        <label class="control-label" for="inputEmail">Official Email</label>
        <div class="controls">
            <input class="span4" type="email" name="email" id="inputEmail"placeholder="e.g. jharvard@example.college.edu">
        </div>
    </div>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="emailText"></div>
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

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="privacyText"></div>
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

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="attrText"></div>
        </div>
        </div>
        
    <div class="control-group">
        <label class="control-label" for="inputInfo">Description</label>
        <div class="controls">
            <textarea class="span4" id="inputInfo" name="info" rows="3" placeholder="Describe your organization briefly."></textarea>        
        </div>
    </div>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="infoText"></div>
        </div>
        </div>
        
    <div class="control-group">
        <div class="controls">
            <button type="submit" id="submit" class="btn">Create organization!</button>
        </div>
    </div>

</form>

<script>

$(document).ready(function(){

     //$("#submit").click(function(){
           $(".error").html("");


                        var name = $("#inputName").val();
                        var abbr = $("#inputAbbr").val();
                        var info = $("#inputInfo").val();
                        
                        var email = $("#inputEmail").val();
                    
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                        
                        //error checks!

                        $("#inputName").change(function(){
                            curNameError = false;
                            name = $("#inputName").val();
                            if (name == "" ) 
                            {
                                $("#nameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter a club name.");
                                curNameError = true;
                            }
                            clubExists(name);
                            if(!curNameError)
                            {
                                $("#nameText").html("");

                            }
                            
                          });

                        $("#inputAbbr").change(function(){
                            curAbbrError = false;
                            abbr = $("#inputAbbr").val();
                            /*if (abbr == "" ) 
                            {
                                $("#abbrText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter a club abbreviation.");
                                curAbbrError = true;
                            }*/
                            abbrExists(abbr);
                            if(!curAbbrError)
                            {
                                $("#abbrText").html("");

                            }
                            
                          });                      
                        
                        $("#inputInfo").change(function(){
                            info = $("#inputInfo").val();
                            if (info == "") 
                            {
                                $("#infoText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter a description.");

                            }

                            
                            else 
                            {
                                $("#infoText").html("");

                            }
                        });
                        
                        
                        $("#inputEmail").change(function(){ 
                            email = $("#inputEmail").val();    
                            curEmailError = false;            
                            if (email == "") 
                            {
                                $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your email address.");
                                curEmailError = true;
                            }
                            else if(!emailReg.test(email))
                            {
                                $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter a valid email address.");
                                curEmailError = true;
                            }
                            
                            emailExists(email);
                            if(curEmailError == false)
                            {
                                $("#emailText").html("");
                            }
                        });


                 

     $("#submit").click(function(){
        hasError = false;

                        var name = $("#inputName").val();
                        var abbr = $("#inputAbbr").val();
                        var info = $("#inputInfo").val();
                        
                        var email = $("#inputEmail").val();
                    
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                        
                        //error checks!


                            if (name == "" ) 
                            {
                                $("#nameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter a club name.");
                                hasError = true;
                            }
                            clubExists(name);
   

                        
                            /*if (abbr == "" ) 
                            {
                                $("#abbrText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter a club abbreviation.");
                                hasError = true;
                            }*/
                            abbrExists(abbr);


                            if (info == "") 
                            {
                                $("#infoText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter a description.");
                                hasError = true;
                            }


                        
                        
                                   
                            if (email == "") 
                            {
                                $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your email address.");
                                hasError = true;
                            }
                            else if(!emailReg.test(email))
                            {
                                $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter a valid email address.");
                                hasError = true;
                            }
                            
                            emailExists(email);
                            


                        if (hasError == false) 
                        {
                            $(this).hide();
                            $("#clubForm").submit();
                         /*                   
                            $.ajax({
                               type: "POST",
                               url: "register.php",
                               data: $("#regForm").serialize(), // serializes the form's elements.
                               success: function(data)
                               {
                                    $(data); // show response from the php script.
                               }
                            });   */
                        }
                        return false;
                        //});
    });
});
function clubExists(club)
{

    $.ajax({
        type: 'POST',
        url: 'checkClub.php',
        data: { club: club, abbreviation: "", email: ""},
        dataType:'json',
        async: false,
        success: function(response){

           if (response.name > 0)
           {
                if(!curNameError)
                 $("#nameText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Sorry! That club already has an administrator.");
                curNameError = true;
                hasError = true;
           }
        }
    });
}
function abbrExists(abbreviation)
{
    $.ajax({
        type: 'POST',
        url: 'checkClub.php',
        data: { club: "", abbreviation: abbreviation, email: ""},
        dataType:'json',
        async: false,
        success: function(response){

           if (response.abbr > 0)
           {
                if(!curAbbrError)
                $("#abbrText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> There is already a club registered under that abbreviation.");
                curAbbrError = true;
                hasError = true;
           }
        }
    });
}
function emailExists(email)
{
    $.ajax({
        type: 'POST',
        url: 'checkClub.php',
        data: { club: "", abbreviation: "", email: email},
        dataType:'json',
        async: false,
        success: function(response){

           if (response.email > 0)
           {
                if(!curEmailError)
                $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> There is already a club registered under that email.");
                curEmailError = true;
                hasError = true;
           }
        }
    });
}

</script>
