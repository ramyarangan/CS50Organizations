<?php
// form for new users to register, including fields to type username, password, and 
// password confirmation
// includes a link back to the log in page
?>


<div class="row-fluid">
<div class="reg-header">
<h1>Edit club settings.</h1>
<div><img src="img/dots.jpg" width=80%></div>
</div>
</div>

<div class = "row-fluid" style="padding:30px">

<form id="editSettingsForm" action="editSettings.php" method="post" class="form-horizontal offset1" style="text-align:left">

    <input type ="hidden" name="name" <?="value=\"".$club["name"]."\""?> >

    <div class="control-group">
        <label class="control-label" for="inputEmail">Official Email</label>
        <div class="controls">
            <input class="span4" type="email" name="email" id="inputEmail" value="<?=$club["email"]?>">
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
            <?php if ($club["privacy"]==0):?>
            <label class="radio">
                <input type="radio" name="privacy" id="optionsClosed" value="closed" checked>
                Closed - You or another group administrator must approve all membership requests.
            </label>
            <?php else:?>
            <label class="radio">
                <input type="radio" name="privacy" id="optionsClosed" value="closed">
                Closed - You or another group administrator must approve all membership requests.
            </label>
            <?php endif?>
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
                if(in_array($categoryID, $types))
                {
                    print("<label class=\"checkbox\">");
                    print("<input type=\"checkbox\" checked name=\"categories[]\" value='"
                  . $categoryID . "'>" . $category . " ");  
                    print("</label>");
                }
                else
                {
                    print("<label class=\"checkbox\">");
                    print("<input type=\"checkbox\" name=\"categories[]\" value='"
                  . $categoryID . "'>" . $category . " ");  
                    print("</label>");
                }
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
            <textarea class="span8" id="inputInfo" name="info" rows="3"><?=$club["information"]?></textarea>        
        </div>
    </div>

        <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="infoText"></div>
        </div>
        </div>
        
    <div class="control-group">
        <div class="controls">
            <button type="submit" id="submit" class="btn">Save Settings</button>
        </div>
    </div>


</form>
</div>



<script>

$(document).ready(function(){


     //$("#submit").click(function(){
           $(".error").html("");


                        var info = $("#inputInfo").val();
                        
                        var email = $("#inputEmail").val();
                    
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                        
                        //error checks!


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

                        var name = $("#name").val();

                        var info = $("#inputInfo").val();
                        
                        var email = $("#inputEmail").val();
                    
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                        
                        //error checks!


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
                            
                            emailExists(name, email);
                            


                        if (hasError == false) 
                        {
                            $(this).hide();
                            $("#editSettingsForm").submit();
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
function emailExists(name, email)
{
    $.ajax({
        type: 'POST',
        url: 'checkClubSettings.php',
        data: { club: name, abbreviation: "", email: email},
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

