<!doctype html>
    
    <html>
        
        <head>
            
            <title>Sign up</title>
            <link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css">
			<script src="js/jquery.min.js" type="text/javascript"></script>
            <link rel="stylesheet" href="css/signup.css">
       
               
            <style> 
			#status
			{
			font-size:11px;
	
			}
			.green
			{
			background-color: #7ED321;
			}
			.red
			{
			background-color:#FFD9D9;
			}
			</style>
		
		<!-- Ajax checking username availability -->
		<script type="text/javascript">
		$(document).ready(function()
		{
		$("#username").change(function() 
		{ 
		var username = $("#username").val();
		var msgbox = $("#status");
		
		if(username.length > 0)
		{
		$("#status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');

		$.ajax({  
			type: "POST",  
			url: "ajax.php",  
			data: "username="+ username,  
			success: function(msg){  
		   $("#status").ajaxComplete(function(event, request){ 
			if(msg == 'OK')
			{ 	
				$("#username").removeClass("red");
				$("#username").addClass("green");
				msgbox.html('<img src="available.png" align="absmiddle">');
			}  
			else  
			{  
				 $("#username").removeClass("green");
				 $("#username").addClass("red");
				msgbox.html(msg);
			}  
		   
		   });
		   } 
		   
		  }); 

		}
		else
		{
		$("#username").addClass("red");
		$("#status").html('<font color="#cc0000">Username is required</font>');
		}
		return false;
		});

		});
		</script>

		<!-- date of birth validation -->
		 <script type="text/javascript">
		 function call(){ 
		 var kcyear = document.getElementsByName("year")[0], 
		 kcmonth = document.getElementsByName("month")[0], 
		 kcday = document.getElementsByName("day")[0]; 
		 var d = new Date();
		 var n = d.getFullYear();
		 for (var i = n; i >= 1950; i--) {
		 var opt = new Option(); 
		 opt.value = opt.text = i;
		 kcyear.add(opt); 
		 } 
		 kcyear.addEventListener("change", validate_date);
		 kcmonth.addEventListener("change", validate_date);
		 
		 function validate_date() {
		 var y = +kcyear.value, m = kcmonth.value, d = kcday.value; 
		 if (m === "2") 
		 var mlength = 28 + (!(y & 3) && ((y % 100) !== 0 || !(y & 15))); 
		 else var mlength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][m - 1];
		 kcday.length = 0;
		 for (var i = 1; i <= mlength; i++) {
		 var opt = new Option(); 
		 opt.value = opt.text = i; 
		 if (i == d) opt.selected = true; 
		 kcday.add(opt); 
		 } 
		 } 
		 
		 validate_date(); 
		 }
		 </script> 
            
        </head>
        
        
        <body>
          
		
		<?php

		$myusername="root";
		$password="";
		$hostname="localhost";

		$dbhandle=mysql_connect($hostname,$myusername,$password) or die("cannot connect to database") ;
		$selected=mysql_select_db("trip planner",$dbhandle);

		if(isset($_POST['username']) && isset($_POST['email'])&& isset($_POST['password'])&& isset($_POST['gender'])){
		$username=$_POST['username'];
		$email=$_POST['email'];
		$mypassword=$_POST['password'];
		$dateOfBirth = $_POST['year']."-". $_POST['month']."-".$_POST['day'];
		$gender=$_POST['gender'];

		$query="SELECT * FROM registration WHERE username='$username'";
		$result= mysql_query($query);
		$count=mysql_num_rows($result);


		if($count>0){
		   echo 'Username already exists';
		  header("Refresh: 5; url=sign up.php"); 
			exit;

		}

		else{

		mysql_query("INSERT INTO registration(username,email,password,dob,gender) VALUES ('$username','$email','$mypassword','$dateOfBirth','$gender')");
		 header("location:index.html");

		}
		}
		mysql_close();
		?>
			
		<?php

		$myusername="root";
		$password="";
		$hostname="localhost";

		$dbhandle=mysql_connect($hostname,$myusername,$password) or die("cannot connect to database") ;
		$selected=mysql_select_db("trip planner",$dbhandle);

		if(isset($_POST['username']) && isset($_POST['password'])){
		$username=$_POST['username'];
		$mypassword=$_POST['password'];

		$query="SELECT * FROM login WHERE username='$username'";
		$result= mysql_query($query);
		$count=mysql_num_rows($result);
		if($count>0){
		   echo 'Username already exists';
		  header("Refresh: 5; url=sign up.php"); 
			exit;

		}

		else{
			
		mysql_query("INSERT INTO login(username,password) VALUES ('$username','$mypassword')");

		  echo ("created successfully");
		}
		}
		mysql_close();
		?>

		<div class="bodyStyle">

		  
		<div class="formContainer">
		  <form action="sign up.php" method="post" >
			<div class="row">
			  <h4>Account</h4>
			  <div class="input-group input-group-icon">
				<input type="text" id="username" name="username" placeholder="Full Name"/>
				<pre><span id="status"></span></pre>
				<div class="input-icon"><i class="fa fa-user" title="Edit"></i></div>
			  </div>
			  <div class="input-group input-group-icon">
				<input type="email" id="mail" name="email" placeholder="Email Adress"/>
				<div class="input-icon"><i class="fa fa-envelope" title="Edit"></i></div>
			  </div>
			  <div class="input-group input-group-icon">
				<input type="password" id="password" name="password" placeholder="Password"/>
				<div class="input-icon"><i class="fa fa-key" title="Edit"></i></div>
			  </div>
			</div>
			
			<div class="row">		
			  <div class="col-half">
				<h4>Date of Birth</h4>
				<div class="input-group">
				  
          <select  id="day" name="day" >
				<option disabled selected value="">DD</option>
          </select>
		  
          <select id="month"  name="month" onchange="call()" >
				<option disabled selected value="">MM</option>
				<option value="01">Jan</option>
				<option value="02">Feb</option>
				<option value="03">Mar</option>
				<option value="04">Apr</option>
				<option value="05">May</option>
				<option value="06">Jun</option>
				<option value="07">Jul</option>
				<option value="08">Aug</option>
				<option value="09">Sep</option>
				<option value="10">Oct</option>
				<option value="11">Nov</option>
				<option value="12">Dec</option>
          </select>
		  
		  <select id="year" name="year" onchange="call()" >
				<option disabled selected value="">YYYY</option>
          </select>
        
        </div>
      </div>

      <div class="col-half">
        <h4>Gender</h4>
        <div class="input-group">
          <input type="radio" name="gender" value="male" id="gender-male"/>
          <label for="gender-male">Male</label>
          <input type="radio" name="gender" value="female" id="gender-female"/>
          <label for="gender-female">Female</label>
        </div>
      </div>
    </div>
    
    <div class="row">
      <h4>Terms and Conditions</h4>
      <div class="input-group">
        <input type="checkbox" id="terms"/>
        <label for="terms">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
		
		<br><br>
		<div class="buttonSignup">
		<button  type="submit" value="Submit">Submit</button>
		</div>
      </div>
    </div>
  </form>
</div>
</div>

</body>
       
</html>