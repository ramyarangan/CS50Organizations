<form class="form-horizontal" id="subForm" style="text-align:left" action="subscribe.php" method="post">
    
    <input type ="hidden" name="club" value= <?="\"".$club."\""?> >



    <div class="control-group">
    
        <label class="control-label" for="inputEmail">Notification Type</label>
        <div class="controls">
        <?php if ($email == 1):?>
            <input type="checkbox" id="email" name="email" value="1" checked>Email
        <?php else: ?>        
            <input type="checkbox" id="email" name="email" value="1">Email
        <?php endif ?>
        <?php if ($text == 1):?>
            <input type="checkbox" id="text" name="text" value= "1" checked>Text<br>
        <?php else: ?>        
            <input type="checkbox" id="text" name="text" value= "1">Text<br>
        <?php endif ?>
        <input type="text" id="number" name="number" placeholder="##########"><br>
        <div class="span10 row error" id="numberText"></div>

        <select name="provider" id="provider">
            <option value="SelectOne">Select One</option>
            <option value="message.alltel.com">Alltel</option>
            <option value="txt.att.net">AT&T</option>
            <option value="myboostmobile.com">Boost Mobile</option>
            <option value="messaging.nextel.com">Nextel</option>
            <option value="messaging.sprintpcs.com">Sprint</option>
            <option value="tmomail.net">T-Mobile</option>
            <option value="email.uscc.net">US Cellular</option>
            <option value="vtext.com">Verizon</option>
            <option value="vmobl.com">Virgin Mobile USA</option>
        </select>
        <div class="span10 row error" id="providerText"></div>

        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <button type="submit" id="submit" class="btn">Send</button>
        </div>
    </div>

</form>


<script>

$(document).ready(function(){

     //$("#submit").click(function(){
           $(".error").html("");

                        var text = $("#text").val();
                        var email = $("#email").val();
                        var number = $("#number").val();
                        var provider = $("#provider").val();
                        
                        //error checks!
                  
                  });

     $("#submit").click(function(){
        hasError = false;
        numberError = false;
                        var text = $("#text").is(":checked");
                        var email = $("#email").val();
                        var number = $("#number").val();
                        var provider = $("#provider").val();

                        var numReg = [0-9];

                        if (text) 
                        {
                            if (number == "") 
                            {
                                $("#numberText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your number.");
                                hasError = true;
                            }   
                            else if(number.length != 10)
                            {
                                $("#numberText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Not a valid phone number.");
                                hasError = true;
                            }
                            else if(!numReg.test(number))
                            {
                                $("#numberText").show();
                                $("#numberText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Not a valid phone number.");
                                hasError = true;
                            }
                            else
                            {
                                $("#numberText").hide();
                            }
                     
                            if (provider == "SelectOne") 
                            {
                                $("#providerText").show();
                                $("#providerText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your service provider.");
                                hasError = true;
                            }          
                            else
                            {
                                $("#providerText").hide();
                            }   

                        }   
                        else
                        {
                            $("#numberText").hide();
                            $("#providerText").hide();
                        }                     

                        if (hasError == false) 
                        {
                            $(this).hide();
                            $("#subForm").submit();
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

    });

</script>
