<?php
/**
 * plan.php
 * This file is about the creation of the plan
 * @author Kenny Wong / Manshinee kallydin
 * @version 1.0
 **/
?>




<?php
session_start();
?>


 <?php
include_once('database.php');
error_reporting(0);
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Vacation Planner</title>
	
		<link href="css/modal.css" rel='stylesheet' type='text/css' >
		<link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css">
		<link href="css/jquery-ui.css" rel='stylesheet' type='text/css' >
		<script type="text/javascript"  src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript"  src="js/jquery-ui.min.js"></script>
		<link href="css/style.css" rel='stylesheet' type='text/css' >
                
                <meta name="viewport" content="width=device-width, initial-scale=1">
		
		
		<!--start-top-nav-script-->
		<script type="text/javascript" src="js/flexy-menu.js"></script>
		<script type="text/javascript">$(document).ready(function(){$(".flexy-menu").flexymenu({speed: 400,type: "horizontal",align: "right"});});</script>
		<!--End-top-nav-script-->
                
	<script>
				$(document).ready(function(){
				    $("#plan-button").click(function(){
				    	
				    	
				    	     var trip_name = $("#trip_name").val();
				             var destination = $("#dest_name").val();
     						 var from = $("#rango2_de").val();
     						 var to = $("#rango2_a").val();
   
								if( trip_name == '' ){
                    				$("input#trip_name").css("border", "#eb1c23 solid 1px"); 
 									return false;
                				}else{
									$("input#trip_name").css("border", "#3C763D solid 1px");     
                				}


     						  if( destination == '' ){
                    				$("input#dest_name").css("border", "#eb1c23 solid 1px"); 
 									return false;
                				}else{
									$("input#dest_name").css("border", "#3C763D solid 1px");     
                				}


                				if( from == '' ){
                    				$("input#rango2_de").css("border", "#eb1c23 solid 1px"); 
 									return false;
                				}else{
									$("input#rango2_de").css("border", "#3C763D solid 1px");     
                				}


                				if( to == '' ){
                    				$("input#rango2_a").css("border", "#eb1c23 solid 1px"); 
 									return false;
                				}else{
									$("input#rango2_a").css("border", "#3C763D solid 1px");     
                				}
  });
		});
								
								</script>
        


		 <script>


		$(function(){
		  $('#plan-button').click(function(){ 
		  		$.each($('[name^=customUtility_'), function (i, item) { //fetch data from dynamic textbox
		    var grade = $(this).val();
		    alert(grade);
			return false;
		});
		  });
		});

		</script>

		<!--<script type="text/javascript"  src="require.js"></script>
		<script type="text/javascript"  src="common.js"></script>
		<script type="text/javascript"  src="newplan.js"></script>
		<script type="text/javascript"  src="linkid.js"></script>-->

		 
		
		<!-- <script>
		  $(function() {
			$( "#datepicker" ).datepicker();
			$( "#format" ).change(function() {
			  $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
			});
		  });
		 </script> -->
		
		<script>
					$.extend($.datepicker, {
					travelRanges: function (options) {
						
						var settings = {
							target: '.travel-dates',
							maxDateToBook: '30',
							dafaultDate: new Date(),
							populateFirst:true
						};

						$.extend(settings, options);

						$(settings.target).datepicker({
							minDate: '0',
							onSelect: function (selectedDate) {
								var self = this;
								if ($(self).is(settings.target+":first")) {
									var newMaxDate = $(settings.target).datepicker('getDate');
									newMaxDate.setDate($(this).datepicker('getDate').getDate() + settings.maxDateToBook);
									$(settings.target+":last").datepicker("change", {
									   "minDate": $(settings.target).datepicker('getDate'),
									   "maxDate": newMaxDate
								   });
								}
							}
						});

						if (settings.populateFirst) {
							$(settings.target + ":first").datepicker('setDate', settings.dafaultDate);
						}
					}
				});

			$(document).ready(function(){
			  <!-- $.datepicker.travelRanges({target:".rango1"}); -->
			  $.datepicker.travelRanges({target:".rango2",populateFirst:false});
			});
		</script>





    </head>

 
<body class="one">
		<!--start-wrap-->
			<!--start-top-header-->
			<div class="top-header" id="header">
				<div class="wrap">
						
				<div class="top-header-left">
					<ul>
						<?php
							if(!isset($_SESSION["uname"])){
									 header("location:index.php");
						?>
						<li><a href="#"><span> </span></a><label id="reg" for="modal-2">Agent Login</label></li>
						<li><p><span> </span>Not a Member ? </p>&nbsp;<label id="reg" for="modal-1">Register</label></li>
						<div class="clear"> </div>
						<?php
					}
					?>
					</ul>
				</div>

				
			</div>
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
 

			<div  class="stylePlanning">
			    <form class="planning-form" action="destination.php" method="POST"> <!--destination.php-->
				
					
						<h1 class="title">Plan Your Trip</h1>


						<div id="step1" class="step">
						
							<div class="step-title">
								<div class="line"></div>
								<span class="text">1. Trip Name</span>
							</div>
							
							<div class="step-content">
								<div class="dests">
									<div class="destinations ui-front" id="destinationName">
										<div class="tripname">
														<input id="trip_name" name="plan_name" type="text" class="domain shaded ui-autocomplete-input" placeholder="Name your trip" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
										</div>
									</div>
								
								</div>
								
						<br>
						</div>

						
						<div id="step1" class="step">
						
							<div class="step-title">
								<div class="line"></div>
								<span class="text">2. Destinations &amp; Dates</span>
							</div>
							
							<div class="step-content">
								<div class="dests">
									<div class="destinations ui-front" id="destinationName">
										<div class="destination">
														<input id="dest_name" name="dest_region" type="text" class="domain shaded ui-autocomplete-input" placeholder="black river" ><ul id="country_list_id"></ul>
										</div>
									</div>
									<span id="add-destination" class="add-destination"><span class="fa fa-plus"></span>Add destination</span>
								</div>
								

								<script>
								var addDiv = $('.destination');
								 var i = $('.destination').size() + 1;

								 $('#add-destination').live('click', function() {
								                        addDiv.append($('.destination').val());
								                        $('<p><input type="text" class="domain shaded ui-autocomplete-input"   name="customUtility' + '[]' +'" placeholder="Region, or City" ><a href="#" id="removeUtility">Remove</a></p>').appendTo(addDiv);
								                        i++;
								                        return false;
								                });

								                $('#removeUtility').live('click', function() {
								                        if( i > 2 ) {
								                                $(this).parents('p').remove();
								                                i--;
								                        }
								                        return false;
								                });



								</script>


								<div class="dates">

									<div class="right-inner-addon">
										<input  class="rango2"  name="rango2_de" id="rango2_de" placeholder="yyyy-mm-dd" type="text" >
									</div>
									<div class="right-inner-addon">
										<input class="rango2" type="text" name="rango2_a" id="rango2_a" placeholder="yyyy-mm-dd" >
									</div>
									

								</div>
							</div>
						</div>
						
						


						<div id="step2" class="step">
							<div class="step-title">
								<div class="line"></div>
								<span class="text">3. Travelers</span>
							</div>
							<div class="step-content">
								<div class="travel-with">
									<div class="column2"><input type="checkbox" id="whoAdults" class="shaded" name="adults" value="true" checked="" disabled=""><label for="whoAdults">Adults</label></div>
									<div class="column2"><input type="checkbox" id="whoTeens" class="shaded" name="teens" value="true" ><label for="whoTeens">Teens</label></div>
									<div class="column2"><input type="checkbox" id="whoKids" class="shaded" name="kids" value="true" ><label for="whoKids">Kids</label></div>
								</div>
							</div>
							<div class="step-title">
								
								 <input type="checkbox" id="Previous_Result" name="Previous_Result"><label for="whoAdults">Do Not Show Trip From Previous Booking</label>
							</div>
							
						</div>

						<!--
						<div class="step-title ">
							<div style="bottom:8px;" class="line"></div>
							<span  class="text">4. Travel by</span>
						</div>
						
						
						
						<div id="step3" class="step">
							<div class="step-content">
								
								<div class="pace">
									<div>
										<div class="column3"><input type="radio" id="paceFast" class="shaded" name="pace" value="Fast"><label for="paceFast">Driving trip</label></div>
										<div class="column3"><input type="radio" id="paceMedium" class="shaded" name="pace" value="Medium" checked=""><label for="paceMedium">Bicycle trip</label></div>
										<div class="column3"><input type="radio" id="paceSlow" class="shaded" name="pace" value="Slow"><label for="paceSlow">Walking trip</label></div>
										<div class="clear"></div>
									</div>
								</div>
								
							</div>
						</div>


						<div class="step-title ">
							<div style="bottom:8px;" class="line"></div>
							<span  class="text">5. Activities</span>
						</div>
						
						
						
						<div id="step3" class="step">
							<div class="step-content">
								
								<div class="pace">
									<div>
										<div class="column3"><input type="radio" id="paceFast" class="shaded" name="pace" value="Fast"><label for="paceFast">Fast-Paced</label></div>
										<div class="column3"><input type="radio" id="paceMedium" class="shaded" name="pace" value="Medium" checked=""><label for="paceMedium">Medium</label></div>
										<div class="column3"><input type="radio" id="paceSlow" class="shaded" name="pace" value="Slow"><label for="paceSlow">Slow &amp; Easy</label></div>
										<div class="clear"></div>
									</div>
								</div>
								
							</div>
						</div>
						<!--<button type="button" id="plan-button" class="plan-button cta-button medium">See The Plan</button>-->
						<input id="plan-button" class="plan-button cta-button medium" type='submit'>
						
						
					
				</form>
				<?php
				if (!empty($_POST))
				{
					
					//$val=$_POST["customUtility"];
					//var_dump($val);
					
					foreach($_POST['customUtility'] as $key=>$val){  
					echo $val.'</br>';
}
					
					
					
					
					
				}
				
				
				?>
				
				
			</div>			

	</div>
<?php include_once 'common/footer.php'; ?> <!-- Include the footer in all page -->