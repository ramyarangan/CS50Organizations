<form class="form-horizontal" id="subForm" style="text-align:left" action="subscribe.php" method="post">
    
    <input type ="hidden" name="club" value= <?="\"".$club."\""?> >

    <div class="control-group">
        <label class="control-label" for="email">Email Address</label>
        <div class="controls">
   <?php if (empty($_SESSION["id"])):?>
            <input class="span4" type="email" name="email" id="email">
	       <?php else: ?>
            <input class="span4" type="email" name="email" value=<?="\"".$email."\""?> id="email">
            <?php endif ?>
        </div>
    </div>
    <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
            <div class="span10 row error" id="emailText"></div>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="number">Number</label>
        <div class="controls">
            <input class="span4" type="tel" name="number" id="number" placeholder = "###-###-####">
        </div>
    </div>
    <div class="control-group" style="margin-top:-18px; margin-bottom:-15px;"> 
        <div class="controls row-fluid">
        <div class="span10 row error" id="numberText"></div>
    </div>

    <div class="control-group">
        <label class="control-label" for="provider">Provider</label>
        <div class="controls">
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
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <button type="submit" id="submit" class="btn">Subscribe</button>
        </div>
    </div>
</form>

<script>

   $(document).ready(function(){

       $("#submit").click(function(e){
           e.preventDefault();
	   $("emailText").html("hi");
	   hasError = true;
	   numberError = false;
        
	   var text = $("#text").is(":checked");
                        
	   var email = $("#email").val();
	   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                        
	   var number = $("#number").val();
	   var numberReg = /^[2-9][0-8][0-9]-[2-9][0-9]{2}-[0-9]{4}$/;
                        
	   var provider = $("#provider").val();
         
	   if (email == "" && number == "" && provider == "SelectOne") 
	     {
	       $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> You are not subscribing to anything.");
	       hasError = true;
	     }
                        
        else 
	  {
            if (email != "" && !emailReg.test(email))
	      {
                $("#emailText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter a valid email address.");
                hasError = true;
	      }
                        
            if (number != "")
	      {
                if (!numberReg.test(number)) {                
		  $("#numberText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter a valid US mobile number.");
		  hasError = true;
                }
                if (provider == "SelectOne")
		  {
                    $("#providerText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please select your mobile provider.");
                    hasError = true;
		  }
	      }
                        
            if (provider != "SelectOne")
	      {
                if (number == "")
		  {
                    $("#numberText").html("<span class=\"label label-important\"><i class=\"icon-exclamation-sign icon-white\"></i></span> Please enter your mobile number.");
                    hasError = true;
		  }
	      }
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
                         }*/
	     }
	   return false;            
	 });

</script>
