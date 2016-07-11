<?php
session_start();
?>
<!DOCTYPE HTML>
<?php
							if(!isset($_SESSION["uname"])){
									 header("location:index.php");
							}
						?>

<html>

 <?php
include_once('database.php');
error_reporting(0);
?>

	<head>
		<title>Vacation Planner</title>
		<link href="css/style.css" rel='stylesheet' type='text/css' >
		<link href="css/marker.css" rel='stylesheet' type='text/css' >	
		<link rel="stylesheet" href="css/signup.css">
		<link rel="stylesheet" href="css/login.css">
		
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
						    
						      document.getElementById("locations").innerHTML=xmlhttp.responseText;
						    }
						  }
						  xmlhttp.open("GET","retrieve_location.php?q="+str,true);
						  xmlhttp.send();
						}

				</script>
                                
                                <style>
                                    .top-header-right {
                                        font-family: 'Open Sans', sans-serif  !important;
                                    }
                                    .subfooter {
                                        font-family: 'Open Sans', sans-serif  !important;
                                        font-size:14px !important;
                                    }
                                    #starts_star{
                                            margin-left:100px;
                                    }
                                    #starts_star li{
                                            display: flex;
                                            font-size: 13px;
                                    }
                                    #starts_star li a i{
                                            color: #ed8323;
                                            opacity: 0.8;
                                    }
                                    #starts_star li:hover a i{
                                            opacity: 1;
                                    }
                                </style>




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
          zoom: 12,
          center: mauritius,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
      
		var map = new google.maps.Map($("#map")[0], myOptions);
	  
	  
		
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







	<?php include_once 'common/header.php' ?>  <!--  Include the header    -->

<div class="megamenu"  >

	<header class="cd-main-header">

	<!-- <a  for="modal-1" class="create-trip" href="#0"><img src="images/logo2-icon.svg" alt="Tripomatic" 
		height="33" width="36" style="margin-top:15px;">CREATE A TRIP</a>
 -->
 
 <label class="cl-effect-7" id="create-trip" ><a href="plan.php">CREATE A TRIP</a></label></li>
 
	






		
		<ul class="cd-header-buttons">
			
			<li><a class="cd-nav-trigger" href="#cd-primary-nav">Menu<span></span></a></li>
		</ul> <!-- cd-header-buttons -->
	</header>

	<main class="cd-main-content">

	

	
		<!-- your content here -->
		<div id="wraps">


		<div  class="bodyfigure"> 
			
				
               

		

  <!-- your content -->


		
		
		
		
		
		  <?php 
		  $type=$_GET['type'];
                  $type2=$_GET['type2'];
                  $category=$_GET['category'];
                  $rating=$_GET['rating'];
        $con=db_connect();

          if(!empty($type) && empty($type2)){
          $sql="select * from markers where type='$type'";
			}
          else if(!empty($type) && !empty($type2)){
          $sql="select * from markers where type in('$type','$type2')";  
          }
          
          else if(!empty($category) && !empty($rating)){
          $sql="select * from hotel where hotel_rating='$rating'";  
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
        echo'<ul id="locations">';
        echo "<li data-geo-lat='$lat' data-geo-long='$ing'>";
        echo "<figure>";
    	echo "<img src='images/".$row['image']."' />";
    	echo "</figure>";
        echo "<figcaption>".$name."<br>".$address."</figcaption>";
   
      	
      	echo "</li>";
      	echo "<br>";
        echo"</ul>";
        
  
        }
        }

       ?>

		
		

			
		
		</div>	

			
<!--			<div id="map_canvas" ></div>-->

	  <div id="map"></div>
		
		</div>


	</main>

	<div class="cd-overlay"></div>

	<nav class="cd-nav">
		<ul id="cd-primary-nav" class="cd-primary-nav is-fixed">

<!------------------------------------------------------ Places ---------------------------------------------------->
		<li class="has-children">
				<a href="#">PLACES</a>

				<ul class="cd-secondary-nav is-hidden">
					<li class="go-back"><a href="#0">Menu</a></li>



					<li class="has-children">
						<a href="#">Sites</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Places</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'sites&type2=tours';return false;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-picture-o"></i>Museum & Gallery</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'safari&type2=hiking';return false;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-leaf"></i>Park & Nature</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'tours&type2=sites';return false;">&nbsp;&nbsp;<i class="fa fa-camera"></i>Photography</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'sites';return false;">&nbsp;&nbsp;<i class="fa fa-university"></i>Architecture</a></li>
						</ul>
					</li>

				



					<li class="has-children">
						<a href="#">Services</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Places</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'Beauty and Spa';return false;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bed"></i>Spa & Resort</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'restaurant';return false;">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-cutlery"></i>Restaurant</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'nightlife';return false;"><i class="fa fa-glass"></i>Nightlife</a></li>
							
						</ul>
					</li>




					<li class="has-children">
						<a href="#">Outdoor</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Places</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'speedboat&type2=private_cruise';return false;">&nbsp;<i class="fa fa-sun-o"></i>Beach</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'hiking&type2=golf';return false;"><i class="fa fa-futbol-o"></i>Sport</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'family&type2=safari';return false;">&nbsp;&nbsp;<i class="fa fa-leaf"></i>Nature</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'golf';return false;"><i class="fa fa-dribbble"></i>Golf</a></li>
						</ul>
					</li>

				



					<li class="has-children">
						<a href="#">Family</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Places</a></li>
							
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'hiking';return false;">Hiking</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'safari';return false;">Safari</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'family';return false;">Park</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'hiking';return false;">Leisure</a></li>
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
			
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'zip lines';return false;">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-plane"></i>Air and Helicopter Tour</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'speedboat';return false;">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-ship"></i>Cruises and Sailing Tour</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'tours';return false;">&nbsp;<i class="fa fa-camera"></i>Sightseeing and Tours</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'hiking';return false;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bicycle"></i>Walking and Biking Tours</a></li>
						</ul>
					</li>

					<li class="has-children">
						<a href="#">Theme</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Tours</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'nightlife';return false;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-music"></i>Shows and Concerts</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'shopping';return false;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i>Shopping and Fashion</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'family';return false;">&nbsp;&nbsp;&nbsp;<i class="fa fa-child"></i>Family and Friendly</a></li>
							<li><a href="trip.php" onclick="location.href=this.href+'?type='+'private_cruise';return false;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-globe"></i>Private & Custom Tours</a></li>
						</ul>
					</li>

					
					
				</ul>
			</li>


<!------------------------------------------------------ HOTELS ---------------------------------------------------->

			








						
		</ul> <!-- primary-nav -->
	</nav> <!-- cd-nav -->

	
	</div>

























	
	
		
		
		
		<!--start-footer-->
		
		<!--//End-footer-->
		<!--start-subfooter-->
			
		<script>
		$(document).ready(function(){
		$('#slide').click(function(){
			var hidden = $('.hidden');
                        $.get("ajax_location.php", function(data){
                             $(".hidden").html(data);
                        });
			if (hidden.hasClass('visible')){
				hidden.animate({"left":"-1000px"}, "slow").removeClass('visible');
			} else {
				hidden.animate({"left":"0px"}, "slow").addClass('visible');
			}
			});
		});
		</script>
		
		<script>
		$(document).ready(function(){
		$('#slideout').click(function(){
			var hidden = $('.hidden');
                        
			if (hidden.hasClass('visible')){
				hidden.animate({"left":"-1000px"}, "slow").removeClass('visible');
			} else {
				hidden.animate({"left":"0px"}, "slow").addClass('visible');
			}
			});
		});
		</script>	
				<?php include_once 'common/footer.php'; ?> <!-- Include the footer in all page -->

		<!--//End-subfooter-->
		<!--//End-wrap-->
		
	
