	
		
			
			
			
			
			<!-- Ajax code for jquery sign up-->
			<script>
				$(document).ready(function(){
				    $(".buttonSignup").click(function(){
				    	
				    	
				    	     var fullname = $("#fname").val();
				             var fname = $("#username").val();
     						 var email = $("#email").val();
     						 var mobile = $("#mobile").val();
     						 var password = $("#password").val();
     						 var day =$('#day :selected').text(); 
                			 var month = $('#month :selected').text(); 
                			 var year = $('#year :selected').text(); 
                			 var gender = $('input[name=gender]:checked').val();

                			 var hiking='';
                			 var safari='';
							 var water_activities='';


							 if($('#hiking').is(":checked"))
							 {
							 	hiking = $('#hiking').val();
							 }
							 

							 if($('#safari').is(":checked"))
							 {
							 	safari = $('#safari').val();
							 }

							 if($('#water_activities').is(":checked"))
							 {
							 	water_activities = $('#water_activities').val();
							 }

                			


     						 //alert (fname);
								if( fullname == '' ){
                    				$("input#fname").css("border", "#eb1c23 solid 1px"); 
 									return false;
                				}else{
									$("input#fname").css("border", "#3C763D solid 1px");     
                				}


     						  if( fname == '' ){
                    				$("input#username").css("border", "#eb1c23 solid 1px"); 
 									return false;
                				}else{
									$("input#username").css("border", "#3C763D solid 1px");     
                				}


                				if( email == '' ){
                    				$("input#email").css("border", "#eb1c23 solid 1px"); 
 									return false;
                				}else{
									$("input#email").css("border", "#3C763D solid 1px");     
                				}


                				if( mobile == '' ){
                    				$("input#mobile").css("border", "#eb1c23 solid 1px"); 
 									return false;
                				}else{
									$("input#mobile").css("border", "#3C763D solid 1px");     
                				}







                				if( password == '' ){
                    				$("input#password").css("border", "#eb1c23 solid 1px"); 
 									return false;
                				}else{
									$("input#password").css("border", "#3C763D solid 1px");     
                				}


                				


                				if(day == 'DD' || month== 'MM' || year== 'YYYY')
                				{
                					alert ("Please select your date of birth");
                					return false;

                				}
                				else
                				{
                					
                				}

                				if (gender=='')
                				{
                					alert ("Please select a gender");
                					return false;
                				}
                				else
                				{
		   							 //alert (gender);
                				}




                				 $.ajax({   //send data using jquery ajax via post method
										type: "POST",
										dataType: "json",
										url: "config/register.php",   // php file to receive and process post information
										data: "fname=" + fname + "&email=" + email + "&password=" + password + "&day=" + day + "&month=" + month + "&year=" + year + "&gender=" + gender  + "&fullname=" + fullname + "&mobile=" + mobile + "&hiking=" + hiking + "&safari=" + safari  + "&water=" + water_activities,   
										context: document.body,
										success: function (data) {
	
                						if(data.success_code == '2'){ //if php returns 2, then then user was successfully registered
					
					 						$('form#form').slideUp('slow', function () 
					 						{


					 								alert ("Registered Successfully");
					 								window.location = "index.php";




			                            	});
							

			                        }
				else{
						alert("Could not register, please try again");
				
				}
				}
				});	






				    });
				});
		</script>



		<!-- Ajax code for jquery login-->
		

				<script>
				$(document).ready(function(){
				    $(".input2").click(function(){
				             var fname3 = $("#username3").val();
     						 var password3 = $("#password3").val();
  						
     						  if( fname3 == '' ){
                    				$("input#username3").css("border", "#eb1c23 solid 1px"); 
 									return false;
                				}else{
									$("input#username3").css("border", "#3C763D solid 1px");     
                				}

                				if( password3 == '' ){
                    				$("input#password3").css("border", "#eb1c23 solid 1px"); 
 									return false;
                				}else{
									$("input#password3").css("border", "#3C763D solid 1px");     
                				}

                				 $.ajax({   
										type: "POST",
										dataType: "json",
										url: "config/login.php",  
										data: "fname3=" + fname3 + "&password3=" + password3,   
										context: document.body,
										success: function (data) {
	
                						if(data.success_code == '2'){
					
					 						$('form#form1').slideUp('slow', function () 
					 						{

					 								alert ("successfully login");
					 								window.location = "index.php";




			                            	});
							

			                        }
				else{
						alert("Could not login");
				
				}
				}
				});	






				    });
				});
		</script>







		
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
         

		<script>


		function validateForm() {
		    var x = document.forms["form"]["username1"].value;
		    if (x == null || x == "") {
		         alert("Name must be filled out");
		        return false;
		    }
		}
		</script> 		 
		
		<!--To insert in registration db-->
		 
		<?php

		$myusername="root";
		$password="";
		$hostname="localhost";

		$dbhandle=mysql_connect($hostname,$myusername,$password) or die("cannot connect to database") ;
		$selected=mysql_select_db("trip planner",$dbhandle);

			
		if(!empty($_POST['username1']) && !empty($_POST['email'])&& !empty($_POST['password1'])&& !empty($_POST['gender'])){
		$username=$_POST['username1'];
		$email=$_POST['email'];
		$mypassword=$_POST['password1'];
		$dateOfBirth = $_POST['year']."-". $_POST['month']."-".$_POST['day'];
		$gender=$_POST['gender'];

		$query="SELECT * FROM registration WHERE username='$username'";
		$result= mysql_query($query);
		$count=mysql_num_rows($result);


		if($count>0){
		   echo 'Username already exists1';
		  //header("Refresh: 5; url=sign up.php"); 
			exit;

		}

		else{

		mysql_query("INSERT INTO registration(username,email,password,dob,gender) VALUES ('$username','$email','$mypassword','$dateOfBirth','$gender')");
		 header("location:index.php");

		}
		}

		mysql_close();
		?>
			

				<!-- check username and password for login -->
	

					 
					 
					 
					 
					 
					 
					 
		 
		 
		 
				
	</head>
	<body>
		<!--start-wrap-->
			<!--start-top-header-->
			<div class="top-header" id="header">
				<div class="wrap">
						
				<div class="top-header-left">
					<ul>
						<?php
							if(!isset($_SESSION["uname"])){
						?>
						<li><a href="#"><span> </span></a><label id="reg" for="modal-2">Customer Login</label></li>
						<li><p><span> </span>Not a Member ? </p>&nbsp;<label id="reg" for="modal-1">Register</label></li>
						<div class="clear"> </div>
						<?php
					}
					?>
					</ul>
				</div>

				
			</div>
					
			<!-------------------------------------Modal box for sign up form-------------------------------------------->
			
		
			
			<input class="modal-state" id="modal-1" type="checkbox" />
			
			 <div class="modal">
				<label class="modal__bg" for="modal-1"></label>
				<div class="modal__inner">
				
				
				
				<label class="modal__close" for="modal-1"></label>
						
						
				<div class="bodyStyle">
				<div id="error-msg" style="max-width: 38em; margin: 0em auto; 
				background-color: rgb(255, 255, 255); border-radius: 4.2px; 
				box-shadow: 0px 3px 10px -2px; padding: 0.5em; display:none;">
					<?php echo "error" ?>
				</div>
				
				

				
				 <div class="formContainer">
				  <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"onsubmit="return validateForm()">
				  
				  <br>
					<div class="row">
					  <h4>Account</h4>
					  <div class="input-group input-group-icon">
						<input type="text" id="fname" name="fname" placeholder="Fullname"/>
						<pre><span id="status"></span></pre>
						<div class="input-icon"><i class="fa fa-user-plus" title="Edit"></i></div>
					  </div>
					  <div class="input-group input-group-icon">
						<input type="text" id="username" name="username" placeholder="Username"/>
						<pre><span id="status"></span></pre>
						<div class="input-icon"><i class="fa fa-user" title="Edit"></i></div>
					  </div>
					  <div class="input-group input-group-icon">
						<input type="text" id="mobile" name="mobile" placeholder="Mobile"/>
						<pre><span id="status"></span></pre>
						<div class="input-icon"><i class="fa fa-mobile fa-2x" title="Edit"></i></div>
					  </div>
					  <div class="input-group input-group-icon">
						<input type="email" id="email" name="email" placeholder="Email"/>
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
					  <h4>Favorite Activities</h4>
					  <div class="input-group">
						<input type="checkbox" id="hiking" value='hiking'/>
						<label for="hiking">Hiking</label>
						<input type="checkbox" id="safari" value='safari'/>
						<label for="safari">Safari</label>
						<input type="checkbox" id="water_activities" value='speedboat'/>
						<label for="water_activities">Water Activities</label>
						
						<br><br>
						<input type="button" class="buttonSignup" value="Submit"><br><br><p  style="color:white"> dkddj</p>
					  </div>
					</div>
				  </form>
				</div>
			</div>
						
						
				</div>
			</div>

			
		
			<!-------------------------------------// End of Modal box for sign up form-------------------------------------------->	
					
						
			<!-------------------------------------Modal box for login form-------------------------------------------------------->
			
			<input class="modal-state" id="modal-2" type="checkbox" />
			 <div class="modal">
				<label class="modal__bg" for="modal-2"></label>
				<div class="modal__inner">
				<label class="modal__close" for="modal-2"></label>
			
			<div class="bodystyle2">	
				<div id="login-box">
				  <div class="leftStyle">
					<h1 class="h1Style">Sign in</h1>
					 <form id="form1" method="post" >
					 <input class="input1" id="username3" type="text" name="username2" placeholder="Username" />
					 <input class="input1" id="password3" type="password" name="password2" placeholder="Password" />
					 <input type="button" class="input2" value="Submit"><br><br><p  style="color:white"></p>
					  </form>
				  </div>
				  
				  <div class="rightStyle">
					<span class="loginwith">Sign in with<br />GoFar</span>
					
					
				  </div>
				  <div class="or"></div>
				</div>
			</div>
			
			</div>
			</div>
			<!------------------------------------- End Modal box for login form-------------------------------------------------------->
						<div class="top-header-right" style="padding: 10px;color: white;font-size: 14px; ">
					<ul>

					<?php
						if(isset($_SESSION["uname"]))
						{

							echo '<span style="color: rgb(145, 201, 233);">'.'Welcome,'.'  '.$_SESSION["uname"].'</span>';
							echo '  '."<a href='logout.php' style='color:white;'>".'<i class="fa fa-sign-out">'.'</i>'.'<span>'.'   '.'Logout'.'</span>'.'</a>';
						}
					?>
						
						
						<div class="clear"> </div>
					</ul>
				</div>




				<div class="top-header-right">
					<ul>

					<?php
						if(isset($_SESSION["uname"]))
						{
							
						}
					?>
						
						<li><a class="face" href="#"><span> </span></a></li>
						<li><a class="twit" href="#"><span> </span></a></li>
						<li><a class="thum" href="#"><span> </span></a></li>
						<li><a class="pin" href="#"><span> </span></a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="clear"> </div>
			</div>
			</div>
			<!--//End-top-header-->
			<!--start-header-->
			<div class="header">
				<div class="wrap">
				<!-- start-logo-->
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" title="gofar" ></a>
				</div>
				<!-- //End-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
						<ul class="flexy-menu thick orange">
							<li><a href="index.php">Home</a></li>
							<li><a href="trip.php">My Trip Plans</a>
								
							</li>
							<li><a href="recent_plan.php">All Trip Plans</a></li>
							
							<li><a href="contact.php">Contact Us</a></li>
						</ul>
					 
						
				</div>
				<!--//End-top-nav-->
				<div class="clear"> </div>
			</div>
			<!--//End-header-->
		</div>