
<!DOCTYPE HTML>
<html>

 <?php
include_once('database.php');
error_reporting(0);
?>

	<head>
		<title>Vacation Planner</title>
		<link href="css/style.css" rel='stylesheet' type='text/css' >
		<link href="css/marker.css" rel='stylesheet' type='text/css' >	

		<!-- create trip modal -->			
		<link href="css/modal.css" rel='stylesheet' type='text/css' >
		<script type="text/javascript"  src="js/jquery-ui.min.js"></script>

		<meta charset="UTF-8">

		<link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="css/site.css"> <!-- Resource style -->
		<script src="js/modernizr.js"></script> <!-- Modernizr -->
	  	
	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-2.1.1.js"></script>
		<script src="js/jquery.mobile.custom.min.js"></script>
		<script src="js/main.js"></script> <!-- Resource jQuery -->

		

		<!-- google maps -->
		<link href="css/map.css" rel='stylesheet' type='text/css' >
		<script src="http://maps.google.com/maps/api/js?sensor=true&.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		

		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.1.1/js/bootstrap-colorpicker.min.js"></script>

		<!--start-top-nav-script-->
		<script type="text/javascript" src="js/flexy-menu.js"></script>
		<script type="text/javascript">$(document).ready(function(){$(".flexy-menu").flexymenu({speed: 400,type: "horizontal",align: "right"});});</script>
		<!--End-top-nav-script-->
		
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!--//webfonts-->	
		
		
					<script type="text/javascript">

						 function LoadLocations() {
						 	var str=1;
						  if (window.XMLHttpRequest) {
						    // code for IE7+, Firefox, Chrome, Opera, Safari
						    xmlhttp=new XMLHttpRequest();
						  } else { // code for IE6, IE5
						    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						  }
						  xmlhttp.onreadystatechange=function() {
						    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						    	alert("2");
						      document.getElementById("locations").innerHTML=xmlhttp.responseText;
						    }
						  }
						  xmlhttp.open("GET","retrieve_location.php?q="+str,true);
						  xmlhttp.send();
						}

				</script>





<script language="javascript" type="text/javascript">
var scrt_var = 10; 
</script>


		<!--script for google map-->
		<script>
		$(function() {
      
		var mauritius = new google.maps.LatLng(-20.244342, 57.595162),
          pointToMoveTo, 
          first = true,
          curMarker = new google.maps.Marker({}),
          $el;
      
	  
		var myOptions = {
          zoom: 10,
          center: mauritius,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
      
		var map = new google.maps.Map($("#map_canvas")[0], myOptions);
	  
	  
		
      $("#locations li").mouseenter(function() {
      
        $el = $(this);
                
        if (!$el.hasClass("hover")) {
        
          $("#locations li").removeClass("hover");
          $el.addClass("hover");
        
          if (!first) { 
            
            // Clear current marker
            curMarker.setMap(); 
            
            // Set zoom back to m level
            // map.setZoom(10);
          }
          
          // Move (pan) map to new location
          pointToMoveTo = new google.maps.LatLng($el.attr("data-geo-lat"), $el.attr("data-geo-long"));
          map.panTo(pointToMoveTo);
          
		  
          // Add new marker
		  var defaultMarkerColor = 'ff0000';
		  var pinImage = new google.maps.MarkerImage("images/m1.png");
          curMarker = new google.maps.Marker({
              position: pointToMoveTo,
              map: map,
			  animation: google.maps.Animation.BOUNCE,
			  labelClass: "dot",
			   icon: pinImage
          });
     
	 
		   // timer for animation	
			setTimeout(function() {
			curMarker.setAnimation(null)
			}, 3000);
		  
          // On click, zoom map
          google.maps.event.addListener(curMarker, 'click', function() {
             map.setZoom(14);
          });
          
          // Fill more info area
          $("#more-info")
            .find("h2")
              .html($el.find("h3").html())
              .end()
            .find("p")
              .html($el.find(".longdesc").html());
          
          // No longer the first time through (re: marker clearing)        
	          first = false; 
	        }
	        
	      });
	      
	      $("#locations li:first").trigger("mouseenter");
	      
	    });
			
	</script>







	</head>
	<body>
		<!--start-wrap-->
			<!--start-top-header-->
			<div class="top-header" id="header">
				<div class="wrap">
				<div class="top-header-left">
					<ul>
						
						<li><a href="#"><span> </span> Agent Login</a></li>
						<li><p><span> </span>Not a Member ? </p>&nbsp;<a class="reg" href="#"> Register</a></li>
						<div class="clear"> </div>
					</ul>
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
			</div>
			<!--//End-top-header-->
			<!--start-header-->
			<div class="header">
				<div class="wrap">
				<!-- start-logo-->
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" title="gofar" ></a>
				</div>
				<!-- //End-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
						<ul class="flexy-menu thick orange">
							<li><a href="index.html">Home</a></li>
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


<div class="megamenu"  >

	<header class="cd-main-header">

	<!-- <a  for="modal-1" class="create-trip" href="#0"><img src="images/logo2-icon.svg" alt="Tripomatic" 
		height="33" width="36" style="margin-top:15px;">CREATE A TRIP</a>
 -->
 <label class="create-trip" ><img src="images/logo2-icon.svg" alt="Tripomatic" 
		height="33" width="36" style="margin-top:15px;"><a href="modal.php">CREATE A TRIP</a></label></li>

		






		
		<ul class="cd-header-buttons">
			<li><a class="cd-search-trigger" href="#cd-search">Search<span></span></a></li>
			<li><a class="cd-nav-trigger" href="#cd-primary-nav">Menu<span></span></a></li>
		</ul> <!-- cd-header-buttons -->
	</header>

	<main class="cd-main-content">

	

	
		<!-- your content here -->
		<div id="wraps">


		<div  class="bodyfigure"> 
			

  <!-- your content -->


		<ul id="locations">
		
		
		
		
		  <?php 
		  $type=$_GET['type'];
        $con=db_connect();

          if(isset($type)){
          $sql="select * from markers where type='$type'";
			}
			else
			{

				 $sql="select * from markers";
			}


        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
        
        
		$name=$row["name"];
        $address=$row["address"];
        $image=$row["image"];
        $lat=$row["lat"];
        $ing=$row["long"];
        $name=$row["name"];
    
        $address=$row["address"];
        echo "<li data-geo-lat='$lat' data-geo-long='$ing'>";
        echo "<figure>";
    	echo "<img src='images/".$row['image']."' />";
    	echo "</figure>";
        echo "<figcaption>".$name."<br>".$address."</figcaption>";
   
      	
      	echo "</li>";
      	echo "<br>";
        }
        }

       ?>

		</ul>
		

			
		
		</div>	

			
			<div id="map_canvas" ></div>
		</div>


	</main>

	<div class="cd-overlay"></div>

	<nav class="cd-nav">
		<ul id="cd-primary-nav" class="cd-primary-nav is-fixed">

<!------------------------------------------------------ Places ---------------------------------------------------->
		<li class="has-children">
				<a href="http://codyhouse.co/?p=409">PLACES</a>

				<ul class="cd-secondary-nav is-hidden">
					<li class="go-back"><a href="#0">Menu</a></li>



					<li class="has-children">
						<a href="http://codyhouse.co/?p=409">Sites</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Places</a></li>
							<li><a href="#filter" id="icon_id" ><i class="fa fa-picture-o"></i>Art</a></li>
							<li><a href="#filter"><i class="fa fa-university"></i>Museum</a></li>
							<li><a href="#filter"><i class="fa fa-leaf"></i>Park</a></li>
							<li><a href="#filter"><i class="fa fa-camera"></i>Photography</a></li>
							<li><a href="#0"><i class="fa fa-university"></i>Architecture</a></li>
						</ul>
					</li>

				



					<li class="has-children">
						<a href="http://codyhouse.co/?p=409">Services</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Places</a></li>
							<li><a href="#0"><i class="fa fa-plane"></i>Transport</a></li>
							<li><a href="#0"><i class="fa fa-bed"></i>Spa</a></li>
							<li><a href="#0"><i class="fa fa-cutlery"></i>Restaurant</a></li>
							<li><a href="#0"><i class="fa fa-glass"></i>Nightlife</a></li>
							<li><a href="#0"><i class="fa fa-coffee"></i>Cafe</a></li>
						</ul>
					</li>




					<li class="has-children">
						<a href="http://codyhouse.co/?p=409">Outdoor</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Places</a></li>
							<li><a href="mytrip.php" onclick="location.href=this.href+'?type='+'beach';return false;"><i class="fa fa-sun-o"></i>Beach</a></li>
							<li><a href="#0"><i class="fa fa-futbol-o"></i>Sport</a></li>
							<li><a href="#0"><i class="fa fa-leaf"></i>Nature</a></li>
							<li><a href="#0"><i class="fa fa-tag"></i>Free</a></li>
							<li><a href="mytrip.php" onclick="location.href=this.href+'?type='+'golf';return false;"><i class="fa fa-dribbble"></i>Golf</a></li>
						</ul>
					</li>

				



					<li class="has-children">
						<a href="http://codyhouse.co/?p=409">Family</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Places</a></li>
							<li><a href="#0">Attraction</a></li>
							<li><a href="#0">Hiking</a></li>
							<li><a href="#0">Safari</a></li>
							<li><a href="#0">Park</a></li>
							<li><a href="#0">Leisure</a></li>
						</ul>
					</li>
				</ul>
			</li>


<!------------------------------------------------------ TOURS ---------------------------------------------------->

			
			<li class="has-children">
				<a href="#0">TOURS</a>

				<ul class="cd-secondary-nav is-hidden">
					<li class="go-back"><a href="#0">Menu</a></li>
					
					<li class="has-children">
						<a href="#0">Activities</a>
						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Tours</a></li>
			
							<li><a href="#0"><i class="fa fa-plane"></i>Air and Helicopter Tour</a></li>
							<li><a href="#0"><i class="fa fa-ship"></i>Cruises and Sailing Tour</a></li>
							<li><a href="#0"><i class="fa fa-tint"></i>Water sport</a></li>
							<li><a href="#0"><i class="fa fa-bicycle"></i>Walking and Biking Tours</a></li>
						</ul>
					</li>

					<li class="has-children">
						<a href="http://codyhouse.co/?p=409">Theme</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Tours</a></li>
							<li><a href="http://codyhouse.co/?p=409"><i class="fa fa-music"></i>Shows and Concerts</a></li>
							<li><a href="#0"><i class="fa fa-shopping-cart"></i>Shopping and Fashion</a></li>
							<li><a href="#0"><i class="fa fa-child"></i>Family and Friendly</a></li>
							<li><a href="#0"><i class="fa fa-globe"></i>Cultural Tours</a></li>
						</ul>
					</li>

					
					<li class="has-children">
						<a href="http://codyhouse.co/?p=409">Others</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Tours</a></li>
							<li><a href="http://codyhouse.co/?p=409">Private and Custom Tours</a></li>
							<li><a href="http://codyhouse.co/?p=409">Day Trips and Excursions</a></li>
							<li><a href="http://codyhouse.co/?p=409">Tours and sightseeing</a></li>
							<li><a href="http://codyhouse.co/?p=409">Holiday and Seasonal Tours</a></li>		
						</ul>
					</li>
				</ul>
			</li>


<!------------------------------------------------------ HOTELS ---------------------------------------------------->

			<li class="has-children">
				<a href="http://codyhouse.co/?p=409">HOTELS</a>

				<ul class="cd-secondary-nav is-hidden">
					<li class="go-back"><a href="#0">Menu</a></li>
					
					<li class="has-children">
						<a href="http://codyhouse.co/?p=409">Stars</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Hotels</a></li>
							<li><a href="#0">1 star</a></li>
							<li><a href="http://codyhouse.co/?p=409">2 stars</a></li>
							<li><a href="http://codyhouse.co/?p=409">3 stars</a></li>
							<li><a href="http://codyhouse.co/?p=409">4 stars</a></li>
							<li><a href="http://codyhouse.co/?p=409">5 stars</a></li>
						</ul>


					</li>

					<li class="has-children">
						<a href="http://codyhouse.co/?p=409">Review Score</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Hotels</a></li>
							<li><a href="http://codyhouse.co/?p=409">Wonderful: 9+</a></li>
							<li><a href="#0">Very good: 8+</a></li>
							<li><a href="#0">good 7+</a></li>
							<li><a href="#0">pleasant 6+</a></li>
							<li><a href="#0">No rating</a></li>
						</ul>
					</li>

					<li class="has-children">
						<a href="http://codyhouse.co/?p=409">Amenities</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Hotels</a></li>
							<li><a href="http://codyhouse.co/?p=409">Free wifi</a></li>
							<li><a href="http://codyhouse.co/?p=409">Free parking</a></li>
							
						</ul>
					</li>

					
				</ul>
			</li>








						
		</ul> <!-- primary-nav -->
	</nav> <!-- cd-nav -->

	<div id="cd-search" class="cd-search">
		<form>
			<input type="search" placeholder="Search...">
		</form>
	</div>
	</div>

























	
	
		
		
		
		<!--start-footer-->
		<div class="footer">
			<div class="wrap">
			<div class="footer-grids">
				<div class="footer-grid Newsletter">
					<h3>News letter </h3>
					<p>Start exploring our beautiful planet by subscribing to our newsletter today!</p>
					<form>
						<input type="text" placeholder="Subscribes.." > <input type="submit" value="GO" >
					</form>
				</div>
				<div class="footer-grid Newsletter">
					<h3>Latest News </h3>
					<div class="news">
						<div class="news-pic">
							<img src="images/f01.jpg" title="news-pic1" > 
						</div>
						<div class="news-info">
							<a href="#">Postformat Gallery: Multiple images</a>
							<span>September 12, 2015 - 9:11 pm</span>
						</div>
						<div class="clear"> </div>
					</div>
					<div class="news">
						<div class="news-pic">
							<img src="images/f01.jpg" title="news-pic1" > 
						</div>
						<div class="news-info">
							<a href="#">Postformat Gallery: Multiple images</a>
							<span>September 12, 2015 - 9:11 pm</span>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<div class="footer-grid tags">
					<h3>Tags</h3>
					<ul>
						<li><a href="#">Agent login</a></li>
						<li><a href="#">Customer Login</a></li>
						<li><a href="#">Not a Member?</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">New Horizons</a></li>
						<li><a href="#">Lanscape</a></li>
						<li><a href="#">Tags</a></li>
						<li><a href="#">Nice</a></li>
						<li><a href="#">Some</a></li>
						<li><a href="#">Portrait</a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="footer-grid address">
					<h3>Address </h3>
					<div class="address-info">
						<span>Suite 206 - Business Park</span>
						<span>Royal road, Grand Bay, Mauritius</span>
						<span><i>E-mail:</i><a href="mailto:moin@blindtextgenerator.de">TriPlanner@gmail.com</a></span>
					</div>
					<div class="footer-social-icons">
						<ul>
							<li><a class="face1 simptip-position-bottom simptip-movable" data-tooltip="facebook" href="#"><span> </span></a></li>
							<li><a class="twit1 simptip-position-bottom simptip-movable" data-tooltip="twitter" href="#"><span> </span></a></li>
							<li><a class="tub1 simptip-position-bottom simptip-movable" data-tooltip="tumblr" href="#"><span> </span></a></li>
							<li><a class="pin1 simptip-position-bottom simptip-movable" data-tooltip="pinterest" href="#"><span> </span></a></li>
							<div class="clear"> </div>
						</ul>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
			</div>
		</div>
		<!--//End-footer-->
		<!--start-subfooter-->
		<div class="subfooter">
			<div class="wrap">
				<ul>
					<li><a href="index.html">Home</a><span>::</span></li>
					<li><a href="destinations.html">My Trip Plans</a><span>::</span></li>
					<li><a href="criuses.html">All Trip Plans</a><span>::</span></li>
					<li><a href="destinations.html">Specials</a><span>::</span></li>
					<li><a href="destinations.html">Holidays</a><span>::</span></li>
					<li><a href="contact.html">About Us</a></li>
					<div class="clear"> </div>
				</ul>
				
			</div>
		</div>
		<!--//End-subfooter-->
		<!--//End-wrap-->
	</body>
</html>

