<?php
    // form for new users to register, including fields to type username, password, and 
    // password confirmation
    // includes a link back to the log in page
    ?>

<div class="row-fluid">
    <div class="reg-header">
        <h1>Edit settings.</h1>
        <div><img src="img/dots.jpg" width=80%></div>
    </div>
</div>

<div class = "row-fluid">
    <form id="accSettingsForm" class="form-horizontal"  action="accountSettings.php" method="post">

        <div class="section-title">Account</div>
        <div class="span9 offset3" style="text-align:left">

            <!-- Old password field -->
                <div class="control-group">
                    <label class="control-label" for="inputoldPW">Old Password</label>
                    <div class="controls row-fluid">
                        <div class="span4 row">
                            <input class="span12" id="inputoldPW" placeholder="Old Password" name="oldPassword" type="password"/>
                        </div>
                    </div>
                </div>

            <!-- Old password error detection -->
                <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
                    <div class="controls row-fluid">
                        <div class="span10 row error" id="oldpwText"></div>
                    </div>
                </div>


            <!-- New password field -->
                <div class="control-group">
                    <label class="control-label" for="inputPW">New Password</label>
                    <div class="controls row-fluid">
                        <div class="span4 row">
                            <input class="span12" id="inputPW" placeholder="New Password" name="password" type="password"/>
                        </div>
                    </div>
                </div>

            <!-- New password error detection-->
                <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
                    <div class="controls row-fluid">
                        <div class="span10 row error" id="pwText"></div>
                    </div>
                </div>

            <!-- Confirm password field -->      
                <div class="control-group">
                    <label class="control-label" for="inputConf">Confirm Password</label>
                    <div class="controls row-fluid">
                        <div class="span4 row">
                            <input class="span12" id="inputConf" placeholder="Confirmation" name="confirmation" type="password"/>
                        </div>
                    </div>
                </div>

                <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
                    <div class="controls row-fluid">
                        <div class="span10 row error" id="confText"></div>
                    </div>
                </div>

<!-- Email field -->      
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>
                    <div class="controls row-fluid">
                    <?php
                        print("<div class=\"span4 row\"><input class=\"span12\" id=\"inputEmail\" name=\"email\" value=\"".$email."\" type=\"email\"/></div>");
                    ?>
                    </div>
                </div>

                <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
                    <div class="controls row-fluid">
                        <div class="span10 row error" id="emailText"></div>
                    </div>
                </div>

<!-- Phone number -->      
                <div class="control-group">
                    <label class="control-label" for="inputNumber">Number</label>
                    <div class="controls row-fluid">
                    <?php
                        print("<div class=\"span4 row\"><input class=\"span12\" id=\"inputNumber\" name=\"number\" value=\"".$number."\" type=\"text\"/></div>");
                    ?>
                    </div>
                </div>

                <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
                    <div class="controls row-fluid">
                        <div class="span10 row error" id="numberText"></div>
                    </div>
                </div>

<!-- Cell phone field -->
                <div class="control-group">
                    <label class="control-label" for="inputProvider">Provider</label>
                    <div class="controls row-fluid">
                        <div class="span4 row">
                            <select name="provider" id="provider" class="span12">
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
                        </div>
                    </div>
                </div>

                <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
                    <div class="controls row-fluid">
                        <div class="span10 row error" id="providerText"></div>
                    </div>
                </div>

            </div>
        </div> <!-- end form horizontal -->


        <div class="section-title" style="padding-top:50px">Organizations</div>
        <div class = "row">
            <div class = "span8 offset2">
                <table class="table table-condensed table-hover">
                    <thead> 
                        <tr> 
                            <th>Club</th> 
                            <th style="width:15%">Member</th> 
                            <th style="width:15%">Email Alerts</th> 
                            <th style="width:15%">Text Alerts</th> 
                        </tr> 
                    </thead> 
                    <tbody>

<?php if (!empty($subscriptions)):?>
<?php foreach ($clubs as $key=>$club):?>
        <tr>
            <td><?=$club["name"]?></td>
            <td><input type="checkbox" id="<?=$club["id"]."member"?>" name="<?=$club["id"]."member"?>" value="1" checked></td>

<?php if ($subscriptions[$key]["subscription"] == 1 || $subscriptions[$key]["subscription"] == 3):?>
            <td><input type="checkbox" id="<?=$club["id"]."emailsub"?>" name="<?=$club["id"]."emailsub"?>" value="1" checked></td>
<?php else: ?>        
            <td><input type="checkbox" id="<?=$club["id"]."emailsub"?>" name="<?=$club["id"]."emailsub"?>" value="1"></td>
<?php endif ?>

<?php if ($subscriptions[$key]["subscription"] == 2 || $subscriptions[$key]["subscription"] == 3):?>
            <td><input type="checkbox" id="<?=$club["id"]."text"?>" name="<?=$club["id"]."text"?>" value= "1" checked><br></td>
<?php else: ?>        
            <td><input type="checkbox" id="<?=$club["id"]."text"?>" name="<?=$club["id"]."text"?>" value= "1"><br></td>
<?php endif ?>
        </tr>
<?php endforeach ?>  
                    </tbody>
                </table>
<?php else: ?>
    You aren't subscribed to any clubs. Browse around, or search above to begin!
<?php endif ?>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <button id="submit" type="submit" class="btn">Submit</button>
            </div>
    </form>
</div>



<script>

$(document).ready(function(){
                  
                  //$("#submit").click(function(){
                  $(".error").html("");
                  
                  var oldpassword = $("#inputoldPW").val();
                  var password = $("#inputPW").val();
                  var conf = $("#inputConf").val();
                  var email = $("#inputEmail").val();
                  var text = $("#text").is(":checked");
                  var number = $("#inputNumber").val();
                  var provider = $("#provider").val();
                  
                  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                  
                  //error checks!
                  
                  
                  $("#inputoldPW").change(function(){
                                          oldpassword = $("#inputoldPW").val();
                                          if (oldpassword == "") 
                                          {
                                          $("#oldpwText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your old password.");
                                          
                                          }
                                          
                                          else 
                                          {
                                          $("#pwText").html("");
                                          }
                                          });
                  
                  $("#inputPW").change(function(){
                                       password = $("#inputPW").val();
                                       if (password.length < 8 && password.length > 0)
                                       {
                                       $("#pwText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Your password must be at least 8 characters long.");
                                       
                                       }
                                       
                                       else 
                                       {
                                       $("#pwText").html("");
                                       
                                       }
                                       });
                  
                  $("#inputConf").change(function(){
                                         conf = $("#inputConf").val();
                                         if (password != conf)
                                         {
                                         $("#confText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Your passwords do not match.");
                                         
                                         }
                                         else
                                         {
                                         $("#confText").html("");
                                         
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
                                          if(curEmailError == false)
                                          {
                                          $("#emailText").html("");
                                          }
                                          });
                  
                  $("#inputoldPW").change(function(){ 
                                          oldpassword = $("#inputoldPW").val();    
                                          curoldPWError = false;            
                                          if (oldpassword == "") 
                                          {
                                          $("#oldpwText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your old password.");
                                          curoldPWError = true;
                                          }
                                          if(curoldPWError == false)
                                          {
                                          $("#oldpwText").html("");
                                          }
                                          });
                  
                  
                  });

$("#submit").click(function(){
                   hasError = false;
                   var oldpassword = $("#inputoldPW").val();
                   var password = $("#inputPW").val();
                   var conf = $("#inputConf").val();
                   var email = $("#inputEmail").val();
                   var text = false;
                   $('#checkboxes input:checked').each(function() {
                                                       if($(this).attr('name').indexOf("text")>=0)
                                                       text = true;
                                                       });
                   var number = $("#inputNumber").val();
                   var provider = $("#provider").val();                    
                   
                   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                   
                   //error checks!
                   checkPassword(oldpassword);
                   
                   userEmailExists(email);
                   
                   if (password.length < 8 && password.length > 0)
                   {
                   $("#pwText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Your password must be at least 8 characters long.");
                   hasError = true;
                   }
                   
                   else if (password != conf)
                   {
                   $("#confText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Your passwords do not match.");
                   hasError = true;
                   }
                   
                   if (email == "") 
                   {
                   $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your email address.");
                   hasError = true;
                   
                   }
                   
                   if (text) 
                   {
                   if (provider == "SelectOne") 
                   {
                   $("#providerText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your service provider.");
                   hasError = true;
                   }          
                   else
                   {
                   $("#providerText").html("");
                   }   
                   
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
                   else if(!number.match(/^\d+$/))
                   {
                   $("#numberText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Not a valid phone number.");
                   hasError = true;
                   }
                   else
                   {
                   $("#numberText").html("");
                   }
                   
                   }   
                   else
                   {
                   $("#numberText").html("");
                   $("#providerText").html("");
                   }                     
                   
                   if (hasError == false) 
                   {
                   $(this).hide();
                   $("#accSettingsForm").submit();
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

function checkPassword(oldpassword)
{
    $.ajax({
           type: 'POST',
           url: 'checkPassword2.php',
           data: {oldpassword: oldpassword},
           dataType:'json',
           async: false,
           success: function(response){
           if (response.success == 0)
           {
           $("#oldpwText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Sorry! That password is incorrect.");
           curoldPWError = true;
           hasError = true;
           }
           }
           });
}

function userEmailExists(email)
{
    $.ajax({
           type: 'POST',
           url: 'checkEmail.php',
           data: {email: email},
           dataType:'json',
           async: false,
           success: function(response){
           if (response.email > 0)
           {
           $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> There is already an account registered under that email.");
           curEmailError = true;
           hasError = true;
           }
           }
           });
}

</script>

