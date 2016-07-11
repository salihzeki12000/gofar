<!DOCTYPE html>
<html lang="en" class="no-js">

 <?php
include_once('database.php');
session_start();
include_once('common/functions.php');
error_reporting(0);
$starting_date=$_GET['from'];
$end=$_GET['to'];
$tname=urldecode($_GET['name']); 
$fetched_id=$_GET['id']; 
?>

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>plan trip</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link href="css/jquery-ui.css" rel='stylesheet' type='text/css' >
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demotab.css" />
		<link rel="stylesheet" type="text/css" href="css/tabs.css" />
                <link rel="stylesheet" type="text/css" href="css/add.css" />
		<link rel="stylesheet" type="text/css" href="css/tabstyles.css" />
		<link rel="stylesheet" type="text/css" href="css/w3.css" />
		<link rel="stylesheet" type="text/css" href="css/sortable.css" />  
		<link rel="stylesheet" type="text/css" href="css/weather.css" />  
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> 
		<link rel="stylesheet" type="text/css" href="css/travel.css" />
		<link rel="stylesheet" type="text/css" href="css/planner.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/signup.css">
		<link rel="stylesheet" href="css/login.css">
		<link rel="stylesheet" href="css/planner_slider.css">
		<link rel="stylesheet" href="css/slider_planners.css">
                <link rel="stylesheet" href="css/datepicker.css">
		
		<script src="js/apps.js"></script>
        
		<script src="http://maps.google.com/maps/api/js?sensor=true&.js"></script>
  		<script src="js/modernizr.custom.js"></script>
  		<script src="//code.jquery.com/jquery.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		 <script src="js/bootstrap-datepicker.js"></script>

		
		<script src="js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css">
		<link href="css/style.css" rel='stylesheet' type='text/css' >
		
		<!--start-top-nav-script-->
		<script type="text/javascript" src="js/flexy-menu.js"></script>
		<script type="text/javascript">$(document).ready(function(){$(".flexy-menu").flexymenu({speed: 400,type: "horizontal",align: "right"});});</script>
		<!--End-top-nav-script-->
		
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
                
                
                  <script>
          $(function() {
      $('input.datepicker').datepicker();
});
                </script>

                
                        
                <script>
                    $(document).ready(function(){
                            $('a#itinerary').click(function(){
                                
	
				$('#overlay1,#loader').fadeIn('slow');	
                                var starttime=$('.hidden').attr('id');
                                var concat='';
                                $( ".locations" ).each(function( index ) {
                                //console.log( index + ": " + $( this ).text() );
                                concat+=$( this ).text()+'/';
                              });
                              
                                /*$.get("Fetch_Calender_View.php?content="+concat+"&start="+starttime,function(data){
                                    $(".holder").html(data);
                                    
                                     $('#overlay1,#loader').fadeOut('slow');
                                });*/
                                
                                
                                $.post(
                                    "Fetch_Calender_View.php", 
                                    {content: concat,start: starttime}, 
                                    function(data){
                                        $(".holder").html(data);
                                     $('#overlay1,#loader').fadeOut('slow');
                                    });
                                
                                 $.post(
                                    "Fetch_List_View.php", 
                                    {content: concat,start: starttime}, 
                                    function(data1){
                                        $(".row_set").html(data1);
                              
                                    });
                                
                       
                            });
                            
                                $('#btn_print').click(function(){
                                var starttime=$('.hidden').attr('id');
                                var tname=$('.hidden1').attr('id');
                                var concat='';
                                var end=$('.hidden2').attr('id');
                                var tid=$('.hidden3').attr('id');
                               
                                $( ".locations" ).each(function( index ) {
                                //console.log( index + ": " + $( this ).text() );
                                concat+=$( this ).text()+'/';
                              });
                     window.open('print.php?id='+concat+'&trip_name='+tname+'&starttime='+starttime+'&endtime='+end,'_blank');   
			});
                        
                        $('#btn_confirm').click(function(){
                            $('#overlay1,#loader').fadeIn('slow');
                              var starttime=$('.hidden').attr('id');
                                var tname=$('.hidden1').attr('id');
                                var end=$('.hidden2').attr('id');
                                var tid=$('.hidden3').attr('id');
                                 var uname=$('.hidden4').attr('id');
                                 //console.log(tid);
				$.post(
                                    "ajax_save_plan.php", 
                                    {id: tid,end: end, tname: tname, starttime: starttime, uname:uname}, 
                                    function(data1){
                                        $('#overlay1,#loader').fadeOut('slow');
                           
                                        if(data1==='success'){
                                            alert("You have successfully created the plan");
                                       
                                             window.location.href = 'index.php'; 
                                        }else{
                                            alert("You have successfully created the plan");
                                           
                                            window.location.href = 'index.php'; 
                                        }
                                                      
                                    });
			});
                            
                            
                            
                            
                            
                    });
                    
                </script>    
                
                
                
                
		<script>
		$(".tab-current").live("click", function() { 
			var text='';
		$(".locations").each(function() {
			text+=$(this).text()+'/';
			
		});
		
		//$('div.container-div').text(text);
       $.get('fetch_data.php?outlet_id=' + text, function(data) {
         

			//alert(data);



        });

		//alert($('div.container-div').text());
	})
		</script>




        <p class='hidden' id='<?php echo $starting_date; ?>' style='display:none;'></p>
 	<p class='hidden1' id='<?php echo $tname; ?>' style='display:none;'></p>	  
        <p class='hidden2' id='<?php echo $end; ?>' style='display:none;'></p>
        <p class='hidden3' id='<?php echo $fetched_id; ?>' style='display:none;'></p>
           <p class='hidden4' id='<?php echo $_SESSION["uname"]; ?>' style='display:none;'></p>

		<script>	
				$(function () {

			    $("#sortable").sortable({
					
			        stop: function(event, ui) {
						//$('#overlay1,#loader').fadeIn('slow');
			        //alert("New position: " + ui.item.index());
					//$('#overlay1,#loader').fadeOut('slow');
			    }
			    });
			})		
		</script>


 
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
 

		<script>
			$(document).ready(function(){
			  $(".js-room_moreinfo_btn").click(function(){
			     $(this).closest(".room_information").next().toggle();
			  });
			});
		</script>

		<script type="text/javascript">
			
			var slider = {
  
			  // Not sure if keeping element collections like this
			  // together is useful or not.
			  el: {
			    slider: $("#slider"),
			    allSlides: $(".slide"),
			    sliderNav: $(".slider-nav"),
			    allNavButtons: $(".slider-nav > a")
			  },
			  
			  timing: 800,
			  slideWidth: 300, // could measure this
			 
			  // In this simple example, might just move the
			  // binding here to the init function
			  init: function() {
			    this.bindUIEvents();
			  },
			  
			  bindUIEvents: function() {
			    // You can either manually scroll...
			    this.el.slider.on("scroll", function(event) {
			      slider.moveSlidePosition(event);
			    });
			    // ... or click a thing
			    this.el.sliderNav.on("click", "a", function(event) {
			      slider.handleNavClick(event, this);
			    });
			    // What would be cool is if it had touch
			    // events where you could swipe but it
			    // also kinda snapped into place.
			  },
			  
			  moveSlidePosition: function(event) {
			    // Magic Numbers =(
			    this.el.allSlides.css({
			      "background-position": $(event.target).scrollLeft()/6-100+ "px 0"
			    });  
			  },
			  
			  handleNavClick: function(event, el) {
			    event.preventDefault();
			    var position = $(el).attr("href").split("-").pop();
			    
			    this.el.slider.animate({
			      scrollLeft: position * this.slideWidth
			    }, this.timing);
			    
			    this.changeActiveNav(el);
			  },
			  
			  changeActiveNav: function(el) {
			    this.el.allNavButtons.removeClass("active");
			    $(el).addClass("active");
			  }
			  
			};

			slider.init();
		</script>	


		<style>
			.temp  {
			    background-image: url("http://openweathermap.org/img/w/");
			    background-repeat: no-repeat;
			    background-position: 75px 15px;
			    
			  }
			  
			.w3-container{
			  	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.1);
				background-color: #fff;
				margin-bottom:20px;

			}

			.banner {
					   width: 100%;
					   background: url(../images/.jpg) no-repeat;
					   background-attachment: fixed;
					   height: 10px !important;
					   border-bottom-style: solid; 
					}	 

                         .clsfineprint {
				width: 100%;
				float: left;
				padding: 0px 0px 0 0px;
				line-height: 18px;
				box-sizing: border-box;
			}		
			
			.clsfineprint ul li {
				list-style: disc;
				font-size: 12px;
				font-family: Arial;
				padding: 0 0 5px;
			}
			
			.clsfineprint span {
				text-align: justify;
				display: block;
			}
			
			.clsfineprint ul {
				margin: 0;
				padding: 0 0 0 20px;
			} 
                         .clsfineprints {
				width: 100%;
				float: left;
				padding: 0px 0px 0 0px;
				line-height: 18px;
				box-sizing: border-box;
			}		
			
			.clsfineprints ul li {
				list-style: disc;
				font-size: 12px;
				font-family: Arial;
				padding: 0 0 5px;
                                float:left;
			}
			
			.clsfineprints span {
				text-align: justify;
				display: block;
			}
			
			.clsfineprints ul {
				margin: 0;
				padding: 0 0 0 20px;
			} 
                        #gmap_canvas img{
                            max-width:none!important;
                            background:none!important
                        }
                        .notice {
                            background:#e3f7fc url('images/notice.png') no-repeat 10px 30%;
                            
                        }
                        .alert-box {
                            color:#555;
                            border-radius:10px;
                            font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
                            padding:10px 10px 10px 36px;
                            margin:10px;
                        }
                        .alert-box span {
                            font-weight:bold;
                            text-transform:uppercase;
                        }
		 </style>
				
		
	</head>
		<body>
		<svg class="hidden">
			<defs>
				<path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z"/>
			</defs>
		</svg>



		<!--start-wrap-->
			<!--start-top-header-->
			<div class="top-header" id="header">
				<div class="wrap">
						
				<div class="top-header-left">
					<ul>
						<?php
							if(!isset($_SESSION["uname"])){
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
					<span class="loginwith">Sign in with<br />social network</span>
					
					<button class="social-signin facebook">Log in with facebook</button>
					<button class="social-signin twitter">Log in with Twitter</button>
					<button class="social-signin google">Log in with Google+</button>
				  </div>
				  <div class="or">OR</div>
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
							
							<li><a href="contact.php">Contact us</a></li>
						</ul>
					 
						<!--search-scripts-->
						<script src="js/modernizr.custom.js"></script>
						<script src="js/classie.js"></script>
						<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
						<!--//search-scripts-->
				</div>
				<!--//End-top-nav-->
				<div class="clear"> </div>
			</div>
			<!--//End-header-->
		</div>


















			<!-- Top Navigation -->
			
			<!--start-wrap-->
			<!--start-top-header-->
			<!-- <div class="top-header" id="header">
				<div class="wrap">
				<div class="top-header-left">
					<ul>
						
						<li><a href="#"><span> </span></a><label id="reg" for="modal-2">Agent Login</label></li>
						<li><p><span> </span>Not a Member ? </p>&nbsp;<label id="reg" for="modal-1">Register</label></li>
						<div class="clear"> </div>
					</ul>
				</div>
				
			</div>
			
				<div class="top-header-right">
					<ul>
						<li><a class="face" href="#"><span> </span></a></li>
						<li><a class="twit" href="#"><span> </span></a></li>
						<li><a class="thum" href="#"><span> </span></a></li>
						<li><a class="pin" href="#"><span> </span></a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="clear"> </div>
			</div>
			</div> -->
			<!--//End-top-header-->
			<!-- </div> -->
<div class="overlay1" id="overlay1" style="display:none;"></div>
<div class="loader" id="loader" style="display:none;"></div>
			<!--start-header-->
	<!-- 		<div class="header">
				<div class="wrap">
				<!-- start-logo-->
			<!-- 	<div class="logo">
					<a href="index.php"><img src="images/logo.png" title="gofar" ></a>
				</div> -->
				<!-- //End-logo-->
				<!--start-top-nav-->
				<!-- <div class="top-nav">
						<ul class="flexy-menu thick orange">
							<li><a href="index.php">Home</a></li>
							<li><a href="MyTrip.html">My Trip Plans</a>
								<ul>
								<li><a href="destinations.html">Dropdown item</a></li>
								<li><a href="destinations.html">Dropdown item</a></li>
								<li><a href="destinations.html">Dropdown item</a>
									<ul>
										<li><a href="destinations.html">Dropdown item</a></li>
										<li><a href="destinations.html">Dropdown item</a>
											<ul>
												<li><a href="destinations.html">Dropdown item</a></li>
												<li><a href="destinations.html">Dropdown item</a></li>
												<li><a href="destinations.html">Dropdown item</a></li>
												<li><a href="destinations.html">Dropdown item</a></li>
											</ul>
										</li>
										<li><a href="#">Dropdown item</a></li>
										<li><a href="#">Dropdown item</a></li>
									</ul>
								</li>
								<li><a href="#">Dropdown item</a></li>
								<li><a href="#">Dropdown item</a></li>
							</ul>
							</li>
							<li><a href="criuses.html">All Trip Plans</a></li>
							<li><a href="destinations.html">Specials</a></li>
							<li><a href="destinations.html">Holidays</a></li>
							<li><a href="blog.html">About us</a></li>
						</ul>
						 -->
					
			<!-- 	</div> -->
				<!--//End-top-nav-->
				<!-- <div class="clear"> </div> -->
			<!-- </div> -->
			<!--//End-header-->
		<!-- </div> --> 

		<?php
		$to=$_GET['to'];
		$from=$_GET['from'];




		$to=strtotime($to);
		$from=strtotime($from);
		$secs = $to - $from;
		$days = $secs / 86400;

		$to_formatter = date("d F Y", $to);
		$from_formatter = date("d F", $from);
		?>
		<div class="container">
			<!-- Top Navigation -->
                        <div class="row">
			<div class="col-sm-12">
			<div class="plan-hero">
				
				<div class="overview-header" style="background-image: url('images/london.jpg');">

					<div class="plan-title-wrapper" >					
						<div class="plan-title-wrapper" >
							<div class="plan-title" >						
							 <div class="days">
								<div class="num-days"><?php echo ceil($days); ?></div>
								<div class="units">days</div>
							</div>
							<div class="in-wrap">
								<div class="bar"></div>
								<div class="in">in</div>
								<div class="bar"></div>
							</div>
										
							<div class="title-area">
								<div class="title"><span class="name">Mauritius</span>
									</div>
								<div class="subtitle"><?php echo $from_formatter.' - '.$to_formatter;  ?></div>
							</div>
						</div>
					
						<div class="line2">Created by us · Customized by you</div>
					</div>
				
				</div>
			</div>
				
			</div>
                        </div>
                        </div>	
			</div>
			
			<section>
			
				<div class="tabs tabs-style-bar" style="background-color: #EDF1F4;">
					<nav>
						<ul>
							<li><a href="#section-bar-1" id="route" style="text-decoration:none;"<i class="fa fa-map"></i><span>My Route</span></a></li>
							<li><a href="#section-bar-2" id="highlights" style="text-decoration:none;"<i class="fa fa-thumbs-up"></i></i><span>Highlights</span></a></li>
							<li><a href="#section-bar-3" id="hotel" style="text-decoration:none;"<i class="fa fa-bed"></i><span>Where to Stay</span></a></li>
							<li><a href="#section-bar-4" id="itinerary" style="text-decoration:none;"<i class="fa fa-map-marker"></i><span>My Itinerary</span></a></li>
						
						</ul>
					</nav>
					<div class="content-wrap">
						<section id="section-bar-1">
                                                     <div class="row">
                                                       <div class="col-xs-8" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.1); background-color: #fff;">
			
<!--							<div class="w3-half w3-container" style="float:left; margin-bottom: 23px; width:660px;">-->
							
								<div class="titles-rows" style="text-align:left;" >
									<div style="font-family: 'Lato',sans-serif;font-size: 20px;font-weight: 700;letter-spacing: -0.015em; color:black;margin-left:20px;margin-top: 20px" >Planned Route</div>
									<?php
								$id=$_GET['id'];

								if (isset($id))
								{
										//echo $id;
									$array =  explode('/', $id);

								}
								else
								{
									echo 'no data';
								}
							?>
									<div class="desc" style="padding-bottom:23px;"  >We’ve found the most exciting places and calculated the best route for your trip.<br>You can add and remove destinations, or change their order.</div>
									
									<div  class="list-numbered" style="color:black;">


		               
		               
							<?php $username=$_SESSION["uname"];
							 	  $con=db_connect();
							 	  $sql_gender="select gender,dob from registration where username='$username' limit 1";
							 	   $result_query = mysqli_query($con, $sql_gender);
			      		 if (mysqli_num_rows($result_query) > 0) {
			         	 while($row_data = mysqli_fetch_assoc($result_query)) {
			         	 	$gender=$row_data['gender'];
			         	 	$dob=$row_data['dob'];

			         	 }
			         	}
						$current_year=date("Y",time());
						$client_year_of_birth=substr($dob,-4)."<br>";
						$age=$current_year-$client_year_of_birth;
						    ?>
 
 
							 <?php
                                                  /**************Algorithm *************/       
    
						$count=0;
						foreach ($array as $key) {
						$sql="select *,TIME_TO_SEC( TIMEDIFF( `closeTime`, `openTime` ) ) 
						/60 as duration  from markers where map_id='$key'";

						 $result = mysqli_query($con, $sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while($row = mysqli_fetch_assoc($result)) {
                                                               $duration=$row["duration"];
                                                               $map = $row["name"];
                                                               $weightage=$row["weightage"];
                                                               $opening_time=$row["openTime"];
                                                               $closing_time=$row["closeTime"];
                                                               $unique_array[] = array( $key => array('name'=>$map,
                                              'duration'=>$duration, 'weightage'=>$weightage, 'closing_time'=>$closing_time,'opening_time'=>$opening_time));
                                                        } //end while
                                                   }//end if
                                                } //end for
                                            
                                                $duplicated_array=$unique_array;
                                                total_calories_per_gender($gender); //Calls function calorie calculator
                                                $total_calories=total_calories_per_gender($gender); //Maximum Number of calories a person can use a day
                                                $sleep=calculate_sleep_per_day($gender,$age); //call function calculate sleep
                                                $total_calories=$total_calories-$sleep; //remove sleep calories from total calories per day
                                                $day_count=1; //set the start day at 1
						$close_time='0';
						 foreach($unique_array as $k => $v)
					         {
					            foreach($v as $foo => $bar)
					                {
                                                            $check_close_time_arr=$v; //mirror array $v to $check_close_time_arr
					                    foreach($bar as $f => $b)
					                    {
                                                                //echo $bar[$f];
                                                                //echo $bar['name']; name of activity
                                                                //echo $bar['weightage']; light, moderate...
                                                                //echo $bar['duration']; duration in mins...
                                                                //echo $bar['closing_time'];
                                                                //echo $bar['opening_time'];
					                    }
					                   
					                    $val=compute_results($bar['weightage'],$gender,$bar['duration'],$age);
                                                            //echo 'weightage: '.$bar['weightage'].'duration: '.$bar['duration'].'gender: '.$gender.'age: '.$age;
                                                            //echo 'tot: '.$total_calories.'val: '.$val;
					                    if($total_calories>$val)  //If there is still enough energy for this activity
						       			{
						       				// $total_calories.' '.$val;
						       				if($count==0)
											{
												echo '<div class="list-numbered" style="color:black;" id="sortable">';
											
												echo '<p class="locations route-row"  style="color:#fa8c00;">'.'Day '.$day_count.'</p>';
											}
											
													if (!in_array($bar['name'], $used_array)) //to avoid duplicated data
													{
														if($bar['opening_time']>$close_time){ //comparing opening of current with previous closing time
                                                                                                                    //echo 'got 1';
                                                                                                                    echo '<li class="locations route-row">'.$bar['name'].'</li>';
                                                                                                                    $total_calories=$total_calories-$val;
                                                                                                                    $close_time=$bar['closing_time'];
                                                                                                                    $used_array[]=$bar['name'];
                                                                                                                    $used_array=array_unique($used_array);
                                                                                                                    $activity_day='day '.$day_count;
                                                                                                                    $activities_array[]=$activity_day;
                                                                                                                    $activities_array[]=$bar['name'];
														}
                                                                                                                else{
                                                                                                                    $day_counter=0;
                                                                                                                    $found=false;
                                                                                                                    foreach($check_close_time_arr as $arrkey => $arrval){
                                                                                                                    
                                                                                                                        if (!in_array($arrval['name'], $used_array)){
                                                                                                                             //echo $arrval['opening_time']." ";
                                                                                                                             //echo $close_time;
                                                                                                                                if($arrval['opening_time']>$close_time){
                                                                                                                                   
                                                                                                                                    $val=compute_results($arrval['weightage'],$gender,$arrval['duration'],$age);  
                                                                                                                                    if($total_calories>$val)  //If there is still enough energy for next activity
                                                                                                                                    {
                                                                                                                                        
                                                                                                                                    $found=true;
                                                                                                                                    $total_calories=$total_calories-$val;
                                                                                                                                    $close_time=$arrval['closing_time'];
                                                                                                                                    $used_array[]=$arrval['name'];
                                                                                                                                    $used_array=array_unique($used_array);
                                                                                                                                    if($day_counter==0){
                                                                                                                                    $activity_day='day '.$day_count;
                                                                                                                                    }
                                                                                                                                    $day_counter++;
                                                                                                                                    $activities_array[]=$activity_day;
                                                                                                                                    $activities_array[]=$arrval['name'];   
                                                                                                                                        
                                                                                                                                    }
                                                                                                                                            
                                                                                                                                }
                                                                                                                        }
                                                                                                                    }//end for
                                                                                                                    if(!$found){ //if could not find any activities which opening time is greater than previous
                                                                                                                    //activity closing time (i.e. night activities), then move to next day
                                                                                                                        
						       				 $duplicated_array=$unique_array;
						       				 foreach($duplicated_array as $x => $y) //loop through a duplicated array of $unique array
									         {
									             
									            foreach($y as $pointer => $element) //still looping through duplicated array
									                {
									                	$weight_activity=$element['weightage'];
									                	$duration=$element['duration'];
									                	$used_array=array_unique($used_array);
									                	
									                		if(!in_array($element['name'], $used_array))
									                	
									                		{
                                                                                                                    
									                			if($element['opening_time']>$close_time) // If opening time of the activity is greater than closing time of previous activity
									                			{
                                                                                                                            //echo $element['opening_time'].' '.$close_time;
																	//echo $close_time.'  '.$element['opening_time'];
                                                                                                                                        //echo 'weight: '.$weight_activity.'duration: '.$duration.'gender '.$gender.'age '.$age;
									                				$calories_for_this_activity=compute_results($weight_activity,$gender,$duration,$age);
									                				//echo 'tot: '.$total_calories.'cal for act '.$calories_for_this_activity;
                                                                                                                        if($total_calories > $calories_for_this_activity) //If the person's remaining calories is greater than the activity calories then proceed
									                				{

									                						
									                						echo '<li class="locations route-row">'.$element['name'].'</li>';
						       												$total_calories=$total_calories-$calories_for_this_activity;
						       												$used_array[]=$element['name'];
						       												$close_time=$element['closing_time'];
						       												$activity_day='day '.$day_count;
																	$activities_array[]=$activity_day;
																	$activities_array[]=$element['name'];
									                				}
									                			}else{
                                                                                                                     
                                                                                                                }
									                		}
									     
									                }
									           }


					
						       				$day_count++; //increment day
						       				$total_calories=total_calories_per_gender($gender);	//reset total calories for a new day
						       				$total_calories=$total_calories-$sleep; //substract 8 hours sleep calories from total calories for the new day
						       				echo '<p class="locations route-row" style="color:#fa8c00;">'.'Day '.$day_count.'</p>';
						       				if($count==0)
										{
											echo '<div class="list-numbered" style="color:black;">';
											echo '<p class="locations route-row"  style="color:#fa8c00;">'.'Day '.$day_count.'</p>';
										}

						       			echo '<li class="locations route-row">'.$bar['name'].'</li>';
						       			$used_array[]=$bar['name'];
						       			$total_calories=$total_calories-$val;
						       			$activity_day='day '.$day_count;
																	$activities_array[]=$activity_day;
																	$activities_array[]=$bar['name'];
						       			 
                                                                                                                    }
                                                                                                                }//end else
                                                                                                        } //end if check in used array

						       			} //end if
						       			else //If remaining energy/calorie is lower than activity calories, move it to next day
						       			{
						       				 $duplicated_array=$unique_array;
						       				 foreach($duplicated_array as $x => $y) //loop through a duplicated array of $unique array
									         {
									             
									            foreach($y as $pointer => $element) //still looping through duplicated array
									                {
									                	$weight_activity=$element['weightage'];
									                	$duration=$element['duration'];
									                	$used_array=array_unique($used_array);
									                	//echo 'in';
									                		if(!in_array($element['name'], $used_array))
									                	
									                		{
                                                                                                                        //echo 'opening: '.$element['opening_time'].'closing: '.$close_time;
									                			if($element['opening_time']>$close_time) // If opening time of the activity is greater than closing time of previous activity
									                			{

																	//echo $close_time.'  '.$element['opening_time'];
									                				$calories_for_this_activity=compute_results($weight_activity,$gender,$duration,$age);
									                				if($total_calories > $calories_for_this_activity) //If the person's remaining calories is greater than the activity calories then proceed
									                				{

									                						
									                						echo '<li class="locations route-row">'.$element['name'].'</li>';
						       												$total_calories=$total_calories-$calories_for_this_activity;
						       												$used_array[]=$element['name'];
						       												$close_time=$element['closing_time'];
						       												$activity_day='day '.$day_count;
																	$activities_array[]=$activity_day;
																	$activities_array[]=$element['name'];
									                				}
									                			}
                                                                                                                
									                		}
									     
									                }
									           }


					
						       				$day_count++; //increment day
						       				$total_calories=total_calories_per_gender($gender);	//reset total calories for a new day
						       				$total_calories=$total_calories-$sleep; //substract 8 hours sleep calories from total calories for the new day
						       				echo '<p class="locations route-row" style="color:#fa8c00;">'.'Day '.$day_count.'</p>';
						       				if($count==0)
										{
											echo '<div class="list-numbered" style="color:black;">';
											echo '<p class="locations route-row"  style="color:#fa8c00;">'.'Day '.$day_count.'</p>';
										}

						       			echo '<li class="locations route-row">'.$bar['name'].'</li>';
						       			$used_array[]=$bar['name'];
						       			$total_calories=$total_calories-$val;
						       			$activity_day='day '.$day_count;
																	$activities_array[]=$activity_day;
																	$activities_array[]=$bar['name'];
						       			 
						       			}
						    			$count=$count+1;
						    			
					                
						       			
					             	} //end forloop $v array
					         } //end forloop unique array    
						echo '</div>';
						?>
                                                                    
                                                                  <?php /*
                                                                    if(ceil($days) > $day_count){
                                                                      echo'<div class="alert-box notice"><span>notice: </span>';
                                                                       echo "<p style='font-size:14px;font-weight:600;color:#333' class='msg'>Your plan is exceeding by ".($day_count-ceil($days))." days"."</p>"; 
                                                                    echo'       </div>';
                                                                    }else if(ceil($days) < $day_count){
                                                                        
                                                                   echo'<div class="alert-box notice"><span>notice: </span>';
                                                                       echo "<p style='font-size:13px;font-weight:600;color:#333' class='msg'>Your plan is exceeding by ".($day_count-ceil($days))." days"."</p>"; 
                                                                    echo'       </div>';
                                                                         }*/
                                                                    ?>            
                                                                            
                                                                            
                                                                            
								<button onclick="window.location.href='plan.php'"  type="button" style="margin-bottom:20px;" class="itinerary-button small dayByDayStayLink">Edit Selection</button>

									</div>	
									
								</div>
								<div style='margin-top:40px;'>

								</div>	
															
<!--							</div>-->

                                                        </div>
                                                        
								
<!--							<div class="w3-quarter w3-container" style="float:right;width: 320px; height:390px; margin-bottom: 23px;" >-->
                                                        <div class="col-xs-2">
                                                        <!-- widget meteo -->
                                                        <!-- weather widget start --><div id="m-booked-custom-widget-3184"> <div class="weather-customize" style="width:300px;"> 
                                                                <div class="booked-weather-custom-160 color-009fde" id="width4"> 
                                                                    <div class="booked-weather-custom-160-date">Weather, 01 June</div>
                                                                    <div class="booked-weather-custom-160-main more"> <a href="//www.booked.net/weather/black-river-w51451" class="booked-weather-custom-160-city"> Black River Weather </a>
                                                                        <div class="booked-weather-custom-160-degree booked-weather-custom-C wmd03"><span><span class="plus">+</span>24</span></div> 
                                                                        <div class="booked-weather-custom-details"> <p><span>High: <strong><span class="plus">+</span>25<sup>°</sup></strong></span><span> Low: <strong><span class="plus">+</span>24<sup>°</sup></strong></span></p> <p>Humidity: <strong>100%</strong></p> <p>Wind: <strong>ESE - 41 KPH</strong></p> </div> </div>
                                                                        <div class="booked-weather-custom-160-main more"> <a href="//www.booked.net/weather/riviere-du-rempart-w653401" class="booked-weather-custom-160-city"> Riviere du Rempart Weather </a> <div class="booked-weather-custom-160-degree booked-weather-custom-C wmd03"><span><span class="plus">+</span>25</span></div>
                                                                            <div class="booked-weather-custom-details"> <p><span>High: <strong><span class="plus">+</span>25<sup>°</sup></strong></span><span> Low: <strong><span class="plus">+</span>24<sup>°</sup></strong></span></p> <p>Humidity: <strong>100%</strong></p> <p>Wind: <strong>ESE - 44 KPH</strong></p> </div> </div> <div class="booked-weather-custom-160-main more"> <a href="//www.booked.net/weather/trou-d-eau-douce-19449" class="booked-weather-custom-160-city"> Trou d'Eau Douce Weather </a> <div class="booked-weather-custom-160-degree booked-weather-custom-C wmd18"><span><span class="plus">+</span>30</span></div> <div class="booked-weather-custom-details"> <p><span>High: <strong><span class="plus">+</span>30<sup>°</sup></strong></span><span> Low: <strong><span class="plus">+</span>29<sup>°</sup></strong></span></p> <p>Humidity: <strong>100%</strong></p> <p>Wind: <strong>ENE - 17 KPH</strong></p> </div> </div> </div> </div><script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'css/weather.css'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-custom-widget-3184'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } </script> <script type="text/javascript" charset="UTF-8" src="http://widgets.booked.net/weather/info?action=get_weather_info&ver=4&cityID=w51451,w653401,19449&type=2&scode=2&ltid=3458&domid=w209&cmetric=1&wlangID=1&color=ffffff&wwidth=350&header_color=ffffff&text_color=ffffff&link_color=#fff&border_form=1&footer_color=ffffff&footer_text_color=ffffff&transparent=0">
                                                            </script><!-- weather widget end -->

                                                        </div>
                                                        <!-- widget meteo -->
                                                        </div>
                                                        <!--</div>-->
							 </div>	
						
  								
							  <?php
						foreach ($array as $key) {
    					//echo "<p>$item</p>";

					   $con=db_connect();
		

						$sql="select * from markers JOIN highlight ON markers.map_id = highlight.map_id where markers.map_id = '$key'";				

							$results = array();
						 $result = mysqli_query($con, $sql);
			      		 if (mysqli_num_rows($result) > 0) {
			         	 while($row = mysqli_fetch_assoc($result)) {

						$name = $row["name"];
						$image = $row["image"];
			            $map = $row["h_name"];
			            $h_desc = $row["h_desc"];
			            $h_recom = $row["h_recom"];
			            $h1_name = $row["h1_name"];
			            $h2_name = $row["h2_name"];
			            $h3_name = $row["h3_name"];
			            $h1_img = $row["h1_img"];
			            $h2_img = $row["h2_img"];
			            $h3_img = $row["h3_img"];

			            
			         	
						
					 	
                                            echo  '<div class="row">';
                                             echo  '<div class="col-xs-12" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.1); background-color: #fff;margin-top: 20px;">';

                                              echo    '<div class="pane-content" >';
									
								echo'<div class="title-trip" >';
								echo'	<span class="title-destination">'.$name.'</span>';
								echo'</div>';	

								echo'<div class="stay-img" >';
										echo "<img src='images/".$row['image']."' />"; 
								echo'</div>';
								echo'<div class="col-xs-5" style="background-color: #fff;margin-left: 50px; margin-top: 10px;">';
								echo'	<div class="right-cols" >';
									echo'	<div class="trip-title">'.$name.'</div>';
									echo'	<div class="desc-trip">'.$h_desc.'<a class="more-link" href="#">more »</a></div>';
									echo'	<br>';	
									echo'	<div class="trip-title">Why we recommend this</div>';
									echo'	<div class="desc-trip">'.$h_recom.'</div>';
									echo'	<br>';	
									echo'	<div class="trip-title">Accommodations</div>';
									echo'	<div class="desc-trip">Get expert advice on where to stay in this destination.</div>';
									echo'	<a class="desc-trip more-link" style="float:left" href="#hotel">book a hotel »</a><br><br><br><br>';
									 
									echo'</div>';
								echo'</div>';	

							echo'</div>';
                                                            
                                                        echo'<div class="col-xs-12" style=" background-color: #fff;padding-bottom: 30px;">';
  											echo'<div class="highlights-title">Highlights from your plan:</div>	';

										 echo "<img class='visit-img' src='images/".$row['h1_img']."' />"; 
									echo'<div class="visit-info"> ';
									echo'	<div class="visit-name">'.$h1_name.'</div>	';
									echo'	<span class="visit-day"></span>';
									echo'</div>';

										 echo "<img class='visit-img' src='images/".$row['h2_img']."' />"; 
									echo'<div class="visit-info"> ';
									echo'	<div class="visit-name">'.$h2_name.'</div>	';
									echo'	<span class="visit-day"></span>';
									echo'</div>	';

										 echo "<img class='visit-img' src='images/".$row['h3_img']."' />"; 
									echo'<div class="visit-info"> ';
									echo'	<div class="visit-name">'.$h3_name.'</div>	';
									echo'	<span class="visit-day"></span>';
									echo'</div>';
							echo'</div>';	
						echo'</div>';

	

						echo'<div class="col-xs-12" style=" background-color: #fff;margin-top: 30px;">';						
                                                echo'<div class="overview-travel-pane">';
                                                    echo'<div class="drop-row route-rows travel-row travel-bg-stripe " data-insert-pos="1">';
                                                         echo' <span class="main-icon sheet transport car"></span>';
                                                         echo' <span class="distance-name"> </span>';
									echo'</div>';
							echo'</div>';    
						echo'</div>'; 
						
				echo'</div>';

						 }
      					}
      					}
      					//var_dump($array_of_activities);

      					 foreach ($array_of_activities as $place => $task) {
      					 	echo 'key' .$place.'</br>';
      					 	echo 'val' .$task.'</br>';
         foreach ($task as $thingToDo){
             echo $thingToDo.'<br />';
             foreach($t as $v)
             {
             	echo $v;
             }
         }
     }



						?>
	
							<!-- <div class="w3-container" style="margin-top:5px; float:left;height: 600px;width: 1000px;">
  								
								<div class="pane-content" >
									
									<div class="title-trip" >
										<span class="title-destination">Heritage golf club</span>
									</div>	

									<div class="stay-img" >
										<img src="images/m1.jpg" title="news-pic1" > 
									</div>
									<div class="w3-quarter w3-container" style="float:right;width: 480px;height:316px; margin-top:16px; box-shadow:none" >
										<div class="right-cols" >
											<div class="trip-title">Heritage Le Telfair Golf & Spa Resort</div>
											<div class="desc-trip">At the heart of the Domaine de Bel Ombre in close proximity to the Heritage Resorts hotels and Villas, discover this remarkable golf course designed by renowned architect Peter Matkovich, which stretches out over 100 hectares between the green hills and turquoise lagoon.<a class="more-link" href="#">more »</a></div>
											<br>	
											<div class="trip-title">Why we recommend this</div>
											<div class="desc-trip">outdoor, golf, spa, villas</div>
											<br>	
											<div class="trip-title">Accommodations</div>
											<div class="desc-trip">Get expert advice on where to stay in this destination.</div>
											<a class="desc-trip more-link" style="float:left" href="#">book a hotel »</a><br><br><br><br>
											<button type="button" class="itinerary-button small dayByDayStayLink" >Itinerary</button>	

										</div>
									</div>	

								</div>

  								<div class="w3-container" style="margin-top: 45px;float: left;height: 130px;width: 970px;margin-right: 90px;box-shadow:none">
								<div class="highlights-title">Highlights from your plan:</div>	

										<img class="visit-img" src="images/g1.jpg" >
										<div class="visit-info"> 
											<div class="visit-name">Heritage The Villas</div>	
											<span class="visit-day">Thu&nbsp;&nbsp;Feb 4</span>
										</div>

										<img class="visit-img" src="images/g2.jpg" >
										<div class="visit-info"> 
											<div class="visit-name">Heritage Le Telfair</div>	
											<span class="visit-day">Thu&nbsp;&nbsp;Feb 4</span>
										</div>	

										<img class="visit-img" src="images/g3.jpg" >
										<div class="visit-info"> 
											<div class="visit-name">Heritage Awali</div>	
											<span class="visit-day">Thu&nbsp;&nbsp;Feb 4</span>
										</div>
								</div>	
							</div> -->

  

						</section>
						<section id="section-bar-2">
			
                                                
							 <?php
								foreach ($array as $key) {
		    					//echo "<p>$item</p>";
								$concatenate_id.= $key.'/';
							   $con=db_connect();
				

								$sql="select * from markers JOIN highlight ON markers.map_id = highlight.map_id where markers.map_id = '$key'";				

									$results = array();
								 $result = mysqli_query($con, $sql);
					      		 if (mysqli_num_rows($result) > 0) {
					         	 while($row = mysqli_fetch_assoc($result)) {

								$name = $row["name"];
								$image = $row["image"];
                                                                $map = $row["h_name"];
                                                                $Highlight = $row["Highlight"];
                                                                $facilities = $row["facilities"];
                                                                $h_desc = $row["h_desc"];
                                                                $h_recom = $row["h_recom"];
                                                                $h1_name = $row["h1_name"];
                                                                $h2_name = $row["h2_name"];
                                                                $h3_name = $row["h3_name"];
                                                                $h1_img = $row["h1_img"];
                                                                $h2_img = $row["h2_img"];
                                                                $h3_img = $row["h3_img"];
								$price = $row["price"];
								$region = $row["region"];
								$type = $row["type"];
								$package = $row["package"];
								$address = $row["address"];
								$openTime = substr($row["openTime"],0,5);
                                                                $closeTime = substr($row["closeTime"],0,5);
								
								echo'<div class="row" style="margin-bottom:20px;">';
								
								echo'<div class="col-sm-12 bhoechie-tab-container" >';
									echo'<div class="col-sm-4" style="margin-left:70px;">';
										echo' <h2 style="margin-top: 25px;margin-bottom: 20px;border-bottom: none;font-weight: 700;font-size: 18px;color: #038eae; float: left;">'.$name.'</h2>';
										echo "<img style='padding: 2px;box-shadow: 2px 2px 10px 2px #a2a2a2;width:370px;height:250px;' src='images/".$row['image']."' />"; 
									echo'</div>';
									
									echo'<div class="col-sm-6" style="margin-top:70px;">';
										echo' <p style="text-align:justify;font-size: 13px;color: #333;">'.$h_desc.'</p>';
										echo' <hr style="border: 0;border-top: 1px solid #e6e6e6;">';
										echo'<div style="font-size: 16px;font-weight: 700;margin-right: 8px;float: left;">';
											echo'<span>Special Offer</span><del></del>';
											echo'<span style="color: #038eae;font-size: 30px;margin-left: 30px;">Rs'.$price.'</span>';
										echo'</div>';
										echo'<br>';
										echo' <hr style="border: 0;border-top: 1px solid #e6e6e6;">';
										echo'<div class="row">';
											echo'<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">';
												echo'<div class="info-category-activity">';
													echo'<p style="font-size: 14px;color: #363636;margin-right: 130px;"><i style="color:#038eae;float: left;" class="fa fa-map-marker fa-2x"></i>'.$region.'</p>';
													echo'<br>';
													echo'<p style="font-size: 14px;color: #363636;margin-right: 99px;"><i style="color: #038eae;float: left;" class="fa fa-camera fa-1x"></i>Category : '.$type.'</p>';
												echo'</div>';
											echo'</div>';
											
										echo'</div>';
									echo'</div>';
									echo'<br>';
								echo'</div>';
								
								echo'<div class="col-sm-12 bhoechie-tab-container">';
								 echo'<div class="col-sm-12" style="padding-left: 89px;">';
              
             

                                                                 
                                                                     echo' <ul class="nav nav-tabs sidebar-tabs" id="sidebar" role="tablist">';
                                                                        echo' <li style="color:black" class="active"><a style="color: #038eae;" href="#tab-1" role="tab" data-toggle="tab">Conditions</a></li>';
                                                                        echo' <li style="color:black"><a style="color: #038eae;" href="#tab-2" role="tab" data-toggle="tab">Highlights</a></li>';
                                                                       echo'  <li style="color:black"><a style="color: #038eae;" href="#tab-3" role="tab" data-toggle="tab">Facilities</a></li>';
                                                                         
                                                                      echo' </ul>';
                                                                      
                                                                     echo'  <div class="tab-content">';
                                                                     
                                                                        echo'  <div style="margin-bottom: 30px;height: 200px;" class="tab-pane active" id="tab-1">';
                                                                                echo'<center>
                                                                                    <div class="clsfineprint menudes menut1">

                                                                                    <div class="tittle_des" id="15">
                                                                                        <ul>
                                                                                            <li><span style="font-size: small;"><strong style="font-weight: bold;">Purchase includes:&nbsp;</strong></span></li>

                                                                                            
                                                                                              <li><span style="font-size: small;">Entrance Fee</span></li>
                                                                                              <li><span style="font-size: small;">'.$package.'</span></li>

                                                                                       

                                                                                              <li><span style="font-size: small;"><strong style="font-weight: bold;">Hours</strong>: Opening time as from '.$openTime.' - '.$closeTime.'</span></li>
                                                                                              <li><span style="font-size: small;"><strong style="font-weight: bold;">Meeting point</strong>: '.$address.'</span></li>
                                                                                              <li><span style="font-size: small;"><strong style="font-weight: bold;">Mauritian ID card or Resident permit </strong>must be shown upon arrival</span></li>    
                                                                                          </ul>     
                                                                                        </center>';
                                                                        echo'  </div>';
                                                                        
                                                                        echo'  <div style="margin-bottom: 30px;height: 200px;" class="tab-pane" id="tab-2">';
                                                                        
                                                                        echo'  <div class="clsfineprints menudes menut1">';
                                                                        $lines1 = str_replace(".", "<li>", $Highlight);
                                                                        
                                                                         echo'<li style="list-style: disc;font-size: 12px;font-family: Arial;padding: 0 0 5px;"><span style="font-size: small;"><strong style="font-weight: bold;">Activities includes:&nbsp;</strong></span></li>';
                                                                         echo "<ul>";
                                                                        echo' <li><span style="font-size: small;">'.$lines1.'</span></li><br>';
                                                                        echo "<ul>";  
                                                                        echo'  </div>';
                                                                        
                                                                        echo'  </div>';
                                                                        echo'  <div style="margin-bottom: 30px;height: 200px;" class="tab-pane" id="tab-3">';
                                                                        echo'  <div class="clsfineprints menudes menut1">';
                                                                        $lines2 = str_replace(".", "<li>", $facilities);
                                                                        echo'<li style="list-style: disc;font-size: 12px;font-family: Arial;padding: 0 0 5px;"><span style="font-size: small;"><strong style="font-weight: bold;">Facilities includes:&nbsp;</strong></span></li>';
                                                                        echo "<ul>"; 
                                                                        echo' <li style="float:left;"><span style="font-size: small;">'.$lines2.'</span></li>';
                                                                        echo "<ul>";  
                                                                        echo'  </div>';       
                                                                        echo'  </div>';
                                                                       
                                                                      echo' </div>';

                                                                   echo' </div> ';
								echo'</div>';
						  echo'</div>';
								

						 }
      					}
      					}
      					
						?>	


						
         
           
           
	




						</section>
					<section id="section-bar-3">
 <?php 
$unique_activity_array=array_unique($activities_array);
 /*foreach(array_unique($activities_array) as $key => $val)
 {
	 echo $val.'</br>';
	 
 }*/
 ?>
					<?php
/*$doc = new DOMDocument();
$doc->loadHTML($buffer);
$id_text = $_GET['posted_data'];
var_dump($id_text);*/

   if(isset($_POST['name_full'])){
      //Do whatever you want
   	echo $_POST['name_full'];
   	//var_dump( $_POST['name_full']);
   }else{
      //var_dump($val_test);
   }
?>






						<div class="container-fluid" > 

						<?php			
							  $con=db_connect();
			

							$sql="select * from hotel";				

								$results = array();
							 $result = mysqli_query($con, $sql);
				      		 if (mysqli_num_rows($result) > 0) {
				         	 while($row = mysqli_fetch_assoc($result)) {

							$hotel_desc = $row["hotel_desc"];
							$hotel_image = $row["hotel_image"];
				            $hotel_name = $row["hotel_name"];
				            $hotel_price = $row["hotel_price"];
				            $room_type = $row["room_type"];
				        

							echo'<div class="col-md-6">';
								echo'<div class="accomd-modations-room">';
									echo'<div class="img">';
										echo"<a href='#'><img width='352' height='222' src='images/".$row['hotel_image']."' class='attachment-awe-room-slider size-awe-room-slider wp-post-image' alt='room-(3)'></a>";
									echo'</div>';
									echo'<div class="text">';
										echo'<h2>';
											echo'<a href="#">'.$room_type.'</a>';
										echo'</h2>';

										echo'<p style="line-height: 1.6em;  letter-spacing: 0.02em;font-size: 12px;margin: 14px 0;" class="price"><span class="amount">'.$hotel_price.'</span>/days</p>';
									echo'</div>';
								echo'</div>';
							echo'</div>';	
	
							echo'<div class="col-md-6">';
								echo'<div class="stay-data">';
									echo'<h3 class="room-title">'.$hotel_name.'</h3>';
		                            echo'<div class="booking-date">';
		                                echo'<div class="date-label">CHECKING IN:</div>';
		                                
                                               
                                                echo'<p><input type="text" class="datepicker" style="padding:0px; font-size:12px; text-align:center;"></p>';
		                            echo'</div>';
		                            echo'<div class="booking-date">';
		                                echo'<div class="date-label">CHECKING OUT:</div>';
		                                echo'<p><input type="text" class="datepicker" style="padding:0px; font-size:12px; text-align:center;"></p>';
		                            echo'</div>';
		                            echo'<div class="clear"></div>';
		                            
		                            	echo'<div style="width: 310px;height: 70px;" class="avg-rate bg-stripe">';
		                                		echo'<span class="txt">';
		                                            echo'<span>BEST PRICE GUARANTEED</span>';
		                                            echo'<br>';
		                                            echo'<span>EASY CANCELLATION</span>';
		                                            echo'<br>';
		                                            echo'<span class="powered">Powered by Go Far<span class="sheet booking-logo"></span></span>';
		                                        echo'</span>';
		                                echo'</div>';
								echo'</div>';                    
							echo'</div>';
	                        echo'<br>';
	                        echo'<div class="col-md-8">';	
		                        echo'<div class="advice-wrap clear-after">';
	                                echo'<div class="advice-title">Our expert advice:</div>';
	                                 echo'<input type="checkbox" class="read-more-state" id="post-2" />';
	                                echo'<div id="read-more-wrap" class="advice" data-collapsed-lines="4">'.$hotel_desc.' <span id="read-more-target">'.$hotel_desc.'span></div>';
	                                echo'<label for="post-2" id="read-more-trigger"></label>';   
	                            echo'</div>';
                           	 echo'<hr style="border-top: 1px solid #dedede; width:900px;">'; 	  
                            echo'</div>';
                        }
                        }
                        ?>    
                             

						</div>
  								


  								</section>
						<section  id="section-bar-4">
				
 
							  <div class="container-planner">

							  		<div class="itinerary-subnav-contents subnav-pane ">
									  	<div class="subnav-tabs">
								            <div id="daybydaylink" class="subnavlink active" data-target="daybyday" data-url="/plan/11-days-in-spain-itinerary-32841a79-90a6-4511-93dd-16ae3456ecfb/itinerary/list">
								                <i class="fa fa-list"></i>
								                <span class="title">List</span>
								            </div>
								            <!--<div id="calendarlink" class="subnavlink" data-target="calendar" data-url="/plan/11-days-in-spain-itinerary-32841a79-90a6-4511-93dd-16ae3456ecfb/itinerary/calendar">
								               <i class="fa fa-calendar"></i>
								                <span class="title">Calendar</span>
								            </div>-->
								            <!-- <div id="mapslink" class="subnavlink" data-target="maps" data-url="/plan/11-days-in-spain-itinerary-32841a79-90a6-4511-93dd-16ae3456ecfb/itinerary/maps">
								                <i class="fa fa-map-marker"></i>
								                <span class="title">Maps</span>
								            </div> -->
								        </div>
								    </div>    	
							    <!-- <div class="header">
							        <ul class="nav nav-pills pull-right">
							          <li class="active"><a href="#">Home</a></li>
							          <li><a href="#">About</a></li>
							          <li><a href="#">Contact</a></li>
							        </ul>
							        <h3 class="text-muted">Test</h3>
							      </div> -->
							<div class="slider-wrap">
							  <div class="slider" id="slider">
							    <div class="holder">
                                                                <!--content goes here -->

							      












							    
							      

							      
							     
							    </div>
							  </div>
							  <nav class="slider-nav">
							    <a href="#slide-0" >Slide 0</a> 
							    <a href="#slide-1">Slide 1</a> 
							    <a href="#slide-2">Slide 2</a> 
							  </nav>
							</div>




				    <div class="row marketing">
				      <div class="col-lg-11 col-md-11 col-xs-10">
				      <?php



      					$dt = date("m/d", $from);
						/*foreach ($array as $key) {
						$sql="select * from markers where map_id='$key'";
						

						 $result = mysqli_query($con, $sql);
			      		 if (mysqli_num_rows($result) > 0) {
			         	 while($row = mysqli_fetch_assoc($result)) {
					
			            $name = $row["name"];
			             $opening_time=$row["openTime"];
			            $closing_time=$row["closeTime"];
			            $address = $row["address"];
			            $price = $row["price"];*/
			    




        echo'<div style="margin: 0 0 10px;font-family: Helvetica,Arial,sans-serif;font-size: 14px;line-height: 1.42857143;" >';
          echo'<div class="row_set">';
        
           echo'</div>';
        echo'</div>';
        $dt = date('m/d', strtotime($dt . ' +1 day'));
        				/* }
      					}
      					}*/
      					$concatenate_id=$_GET['id'];
      					
        ?>

        <input type='hidden' id='hidden_txt' value='<?php echo $concatenate_id ?>'>

        <!-- week 1 -->
        <button type="button" class="itinerary-button small dayByDayStayLink" id="btn_confirm">Confirm</button>
       	<button type="button" class="itinerary-button small dayByDayStayLink" id="btn_print">Preview Plan</button>


      </div>
    </div>

   
  </div>


						</section>
						
					</div><!-- /content -->
				</div><!-- /tabs -->
			</section>
			
				<script src="js/cbpFWTabs.js"></script>
		<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
		</script>
		<script>
		$(document).ready(function(){
			

		});



		</script>

		<script>
		$(document).ready(function() {
			$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
				e.preventDefault();
				$(this).siblings('a.active').removeClass("active");
				$(this).addClass("active");
				var index = $(this).index();
				$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
				$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
			});
		});
		 </script>	
                 <script type='text/javascript'>
                function init_map(){
                var myOptions = {zoom:14,center:new google.maps.LatLng(-20.2354463,57.49680569999998),
                mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'),
                myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-20.2354463,57.49680569999998)});
                infowindow = new google.maps.InfoWindow({content:'<strong>GoFar</strong><br> Le Reduit, Moka<br>'});
                google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
                infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
                </script>
		</div><!-- /container -->
                 
             
               
		<!--start-footer-->
		
		
		<?php include_once 'common/footer.php'; ?> <!-- Include the footer in all page -->
		
		
		<!--//End-subfooter-->
		<!--//End-wrap-->
		
		
 		

		
