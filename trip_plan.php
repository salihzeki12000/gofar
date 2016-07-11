
<!DOCTYPE HTML>
<html>
	<head>
		<title>Vacation Planner</title>
		<link href="css/style.css" rel='stylesheet' type='text/css' >
		<link href="css/marker.css" rel='stylesheet' type='text/css' >	
	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/jquery.min.js"></script>

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
		
		
		<!--start-top-nav-script-->
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
		  var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + defaultMarkerColor);
          curMarker = new google.maps.Marker({
              position: pointToMoveTo,
              map: map,
			  animation: google.maps.Animation.BOUNCE,
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
						<div class="search-box">
							<div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
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




		<div id="wraps">

		<div  class="bodyfigure"> 


		<ul id="locations">

			<li data-geo-lat="-20.502977" data-geo-long="57.407974">
			  <figure>
			  <img src="-text.png" alt="The Caption">
		      <figcaption>Heritage Golf Club<br>Domaine de Bel Ombre, B9,Bel Ombre</figcaption>
			  </figure>
			</li>  	

			  <br>
			
			<li data-geo-lat="-20.286247" data-geo-long="57.417019">
		  	<figure>
		 	<img src="-text.png" alt="The Caption">
		  	<figcaption>Casela Nature Park<br>Royal Road Cascavelle, Black River</figcaption>
		 	</figure>
		 	</li>
			  <br>

			<li data-geo-lat="-20.286247" data-geo-long="57.572575">  
		  	<figure>
		 	<img src="-text.png" alt="The Caption">
		 	<figcaption>L'Aventure du Sucre<br>Beau Plan B18 Pamplemousses</figcaption>
			</figure>
			</li>
			  <br>
	
			</ul>
		</div>
		




<!-- 
	
			<ul id="locations">
			   
				<li data-geo-lat="-20.502977" data-geo-long="57.407974">
				  <h4>Heritage Golf Club</h4>
				  <p>Domaine de Bel Ombre, B9,Bel Ombre</p>
					 </li>
				
				<li data-geo-lat="-20.286247" data-geo-long="57.417019">
				  <h4>Casela Nature Park</h4>
				  <p>Royal Road Cascavelle, Black River</p>
					</li>
				
				<li data-geo-lat="-20.286247" data-geo-long="57.572575">
				  <h4>L'Aventure du Sucre</h4>
				  <p>Beau Plan B18 Pamplemousses</p>
				  </li>
			  
        
			</ul> -->
	
			
			
			<div id="map_canvas" ></div>
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

