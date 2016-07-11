<?php
session_start();
?>
<!DOCTYPE HTML>

 <?php
include_once('database.php');
error_reporting(0);
?>
<html>
	<head>
		<title>Vacation Planner</title>
		<link rel="stylesheet" href="css/signup.css">
		<link rel="stylesheet" href="css/login.css">
		<link href="css/style.css" rel='stylesheet' type='text/css' >
		<link href="css/demogrid.css" rel='stylesheet' type='text/css' >
		<link href="css/set1.css" rel='stylesheet' type='text/css' >
		<link href="css/normalize.css" rel='stylesheet' type='text/css' >
		<link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css">
		<link href="css/met.css" rel='stylesheet' type='text/css' >
		<link href="css/metro-icons.css" rel='stylesheet' type='text/css' >
		<link href="css/style_slider.css" rel='stylesheet' type='text/css' >

		<link href="css/bootstrap.min.css" rel="stylesheet">
                <link href="css/modaltest.css" rel="stylesheet">
             
                
                <link href="css/testimonial.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/features.css" rel="stylesheet">
                <script src="js/bootstrap.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/metro.js" type="text/javascript"></script>
               
           
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		
		<!--start-top-nav-script-->
		<script type="text/javascript" src="js/flexy-menu.js"></script>
		<script type="text/javascript">$(document).ready(function(){$(".flexy-menu").flexymenu({speed: 400,type: "horizontal",align: "right"});});</script>
		<!--End-top-nav-script-->
		
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!--//webfonts-->	
		
               
			
		<!--start slider -->
		<link rel="stylesheet" href="css/fwslider.css" media="all">
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/fwslider.js"></script>
		<script src="js/jquery.isotope.js" type="text/javascript"></script>

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
			.portfolioContainer {
                        width: 900px !important;
                        display: block;
                        height: 348px;
                        margin: 0 auto;
			}
			.slide_location{
			 width: 308px !important;	
			 height: 500px !important;	
			}
			
			.h2{
			font-family: 'Raleway', sans-serif !important;
			font-style: normal !important;
			font-weight: 100 !important;
			font-variant: normal !important;
			}
                        
                        .top-header {
                            background: #2C3E50;
/*                            margin-bottom: -15px c*/
                        }
                        .modal__inner::-webkit-scrollbar {
                            display: none; 
                        }
                       
		</style>	
                		
                
                <script type="text/javascript">
                jQuery(document).ready(function($){
                        var w,mHeight,tests=$("#testimonials");
                        w=tests.outerWidth();
                        mHeight=0;
                        tests.find(".testimonial").each(function(index){
                                $("#t_pagers").find(".pager:eq(0)").addClass("active");	//make the first pager active initially
                                if(index==0)
                                        $(this).addClass("active");	//make the first slide active initially
                                if($(this).height()>mHeight)	//just finding the max height of the slides
                                        mHeight=$(this).height();
                                var l=index*w;				//find the left position of each slide
                                $(this).css("left",l);			//set the left position
                                tests.find("#test_container").height(mHeight);	//make the height of the slider equal to the max height of the slides
                        });
                        $(".pager").on("click",function(e){	//clicking action for pagination
                                e.preventDefault();
                                next=$(this).index(".pager");
                                clearInterval(t_int);	//clicking stops the autoplay we will define later
                                moveIt(next);
                        });
                        var t_int=setInterval(function(){	//for autoplay
                                var i=$(".testimonial.active").index(".testimonial");
                                if(i==$(".testimonial").length-1)
                                        next=0;
                                else
                                        next=i+1;
                                moveIt(next);
                        },5000);
                });
                </script>
                
                <script type="text/javascript">
                function moveIt(next){	//the main sliding function
                        var c=parseInt($(".testimonial.active").removeClass("active").css("left"));	//current position
                        var n=parseInt($(".testimonial").eq(next).addClass("active").css("left"));	//new position
                        $(".testimonial").each(function(){	//shift each slide
                                if(n>c)
                                        $(this).animate({'left':'-='+(n-c)+'px'});
                                else
                                        $(this).animate({'left':'+='+Math.abs(n-c)+'px'});
                        });
                        $(".pager.active").removeClass("active");	//very basic
                        $("#t_pagers").find(".pager").eq(next).addClass("active");	//very basic
                }
                </script>

<?php include_once 'common/header.php' ?>  <!--  Include the header / Menu   -->
	
				
	<?php
	//echo $_SESSION["uname"];
	?>

		<!--start-images-slider-->
		<div class="images-slider">
			<!-- start slider -->
		    <div id="fwslider" style="">
		        <div class="slider_container">
		            <div class="slide"> 
		                <!-- Slide image -->
		                    <img src="images/a1.jpg" alt="">
		                <!-- /Slide image -->
		                <!-- Texts container -->
		                <div class="slide_content">
		                    <div class="slide_content_wrap">
		                        <!-- Text title -->
		                        <h4 class="title">To travel is to live</h4>
		                        <!-- /Text title -->
		                        <!-- Text description -->
		                        <p class="description">Discover places you've never been before</p>
		                        <!-- /Text description -->
		                    </div>
		                </div>
		                 <!-- /Texts container -->
		            </div>
		            <!-- /Duplicate to create more slides -->
		            <div class="slide">
		                <img src="images/a2.jpg" alt="">
		                <div class="slide_content">
		                     <div class="slide_content_wrap">
		                        <!-- Text title -->
		                        <h4 class="title">To travel is to live</h4>
		                        <!-- /Text title -->
		                        <!-- Text description -->
		                        <p class="description">Enjoy your vacation with us</p>
		                        <!-- /Text description -->
		                    </div>
		                </div>
		            </div>
			    
			    <div class="slide">
		                <img src="images/bg3.jpg" alt="">
		                <div class="slide_content">
		                     <div class="slide_content_wrap">
		                        <!-- Text title -->
		                        <h4 class="title">To travel is to live</h4>
		                        <!-- /Text title -->
		                        <!-- Text description -->
		                        <p class="description">You Don't Need Magic to Disappear. All you need is a destination.</p>
		                        <!-- /Text description -->
		                    </div>
		                </div>
		            </div>
			    
		            <!--/slide -->
		        </div>
		        <div class="timers"> </div>
		        <div class="slidePrev"><span> </span></div>
		        <div class="slideNext"><span> </span></div>
		    </div>
		    <!--/slider -->
		</div>
			
				
				
		
		<section class="features-list" id="features">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="feature-titles">
							<h2><span></span>Why <span>Book</span> in GoFar<span>?</span></h2>
							
							<hr class="tall">
						</div>	
						<div class="col-md-4 feature-1 wp2">
							<div class="feature-icon">
								<i class="fa fa-desktop"></i>
							</div>
							<div class="feature-content">
								<h1>Responsive</h1>
								<p>Present the trip via a mobile-friendly link for iPhone and Android. Export a gorgeous PDF for those that love seeing the trip on paper.</p>
							</div>
						</div>
						<div class="col-md-4 feature-2 wp2 delay-05s">
							<div class="feature-icon">
								<i class="fa fa-flash"></i>
							</div>
							<div class="feature-content">
								<h1>Fast, fun, and easy</h1>
								<p>Add activities and accommodations and we'll generate the plan for you based on your preferences.</p>
							</div>
						</div>
						<div class="col-md-4 feature-3 wp2 delay-1s">
							<div class="feature-icon">
								<i class="fa fa-heart"></i>
							</div>
							<div class="feature-content">
								<h1>Absolutely Free</h1>
								<p>Remember to sign in to edit your trips and we'll import the relevant information and add it to the itinerary in a beautiful, professional format.</p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
        
                
        
               
        
        
        
        
                <div class="content_info">
                    <!-- Parallax Background -->
                    <div class="bg_parallax image_02_parallax"></div>
                    <!-- Parallax Background -->

                    <div class="opacy_bg_02">
                        <!-- Testimonial Propertie-->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">   

                                    <div id="testimonials">
                                       <div id="test_container"  style="height: 192px;width: 300px;">
                                               <div class="testimonial" >
                                                    <div class="testimonial_text"><p><i class="fa fa-quote-left"></i>The hotel is stunning, super recommended. And the treatment of its people in very good, are always attentive to the little things.<i class="fa fa-quote-right"></i></p></div>
                                                    <div class="image-testimonials">
                                                       <img src="images/test1.jpg" alt="">                        
                                                    </div>
                                                    <h3 class="testimonial_name">Jennifer Martinez</h3>
                                                    <div class="testimonial_designation">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                               </div>
                                               <div class="testimonial">
                                                    <div class="testimonial_text"><p><i class="fa fa-quote-left"></i>Spectacular, excellent personal, restaurants and very good drinks, highly recommended.<i class="fa fa-quote-right"></i></p></div>
                                                    <div class="image-testimonials">
                                                       <img src="images/test2.jpg" alt="">                        
                                                    </div>
                                                    <h3 class="testimonial_name">Juan Rendon</h3>
                                                    <div class="testimonial_designation">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>         
                                               </div>
                                               <div class="testimonial">
                                                    <div class="testimonial_text"><p><i class="fa fa-quote-left"></i>The hotel is stunning, super recommended. And the treatment of its people in very good, are always attentive to the little things.<i class="fa fa-quote-right"></i></p></div>
                                                    <div class="image-testimonials">
                                                       <img src="images/test3.jpg" alt="">                        
                                                    </div>
                                                    <h3 class="testimonial_name">Frederic Gordon</h3>
                                                    <div class="testimonial_designation">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>                            
                                               </div>
                                       </div>
                                       <div id="t_pagers"><a class="pager"></a><a class="pager"></a><a class="pager"></a></div>
                                   </div>   

                             </div>
                            <div class="col-md-8">
                                    <div class="testimonial-info">
                                        <h2>TESTIMONIALS</h2>
                                        <p>You can choose your favorite destination and start planning your long-awaited vacation. We offer thousands of destinations and have a wide variety of hotels so that you can host and enjoy your stay without problems. Book now your trip with GoFar</p>
                                        
                                    </div>
                                </div>
            
                        </div>
                        <!-- End Testimonial Properties-->
                           
                    </div>
                        
                </div>
                    
              </div>       
           
        
        
        
		<!-- start content_slider -->
			<!-- FlexSlider -->
			 <!-- jQuery -->
			  <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
			  <!-- FlexSlider -->
			  <script defer src="js/jquery.flexslider.js"></script>
			  <script type="text/javascript">
			    $(function(){
			      SyntaxHighlighter.all();
			    });
			    $(window).load(function(){
			      $('.flexslider').flexslider({
			        animation: "slide",
			        animationLoop: true,
			        itemWidth:250,
			        itemMargin: 5,
			        start: function(slider){
			          $('body').removeClass('loading');
			        }
			      });
			    });
			  </script>
			<!-- Place somewhere in the <body> of your page -->
                         <div class="row_slide">
	                    <div class="title_slide">
	                        <h2>Travelers <span>Choice</span> of Destinations</h2>
	                        <i class="fa fa-plane"></i>
	                        <hr class="tall">
	                    </div>                    
                          </div>

				 <section class="slider">
			        <div class="flexslider carousel">
			          <ul class="slides">

			           <?php

		                 $con=db_connect();
		                 $boolean=false;
		                 $limit_value=6;
		                 
		                 $rating=4;
		                 if($_SESSION["uname"])
		                 {
		                 	$boolean=true;
		                 	$session_name=$_SESSION["uname"];
		                 	$query_favorite="select * from registration where username='$session_name' limit 1";
		                 	$resultset = mysqli_query($con, $query_favorite);
			      		 	if (mysqli_num_rows($resultset) > 0) {
			         	 		while($rs = mysqli_fetch_assoc($resultset)) {
			         	 			$fav_1=$rs["favorite_activity_1"];
			         	 			$fav_2=$rs["favorite_activity_2"];
			         	 			$fav_3=$rs["favorite_activity_3"];
			         	 			$arr[]=$fav_1;
			         	 			$arr[]=$fav_2;
			         	 			$arr[]=$fav_3;
			         			}
			         		}

		                 }
		                 else
		                 {

		                 	$arr[]='speedboat';
		                 }

		                
		                
						foreach($arr as $k => $v){
							if($boolean)
							{
								$sql="select * from markers where type='$v'";
							}
							else
							{

								$sql="select * from markers where type='speedboat' limit 6";	
							}
						 $result = mysqli_query($con, $sql);
			      		 if (mysqli_num_rows($result) > 0) {
			         	 while($row = mysqli_fetch_assoc($result)) {
							
			         	$image = $row["image"]; 		
			            $name=$row["name"];
			            $address=$row["address"];
			            $price=$row["price"];
			            $rating=$row["rating"];
			            $package=$row["package"];
			            $type=$row["type"];
			            
				            echo'<li onclick="location.href="#";" class="slide_location">';
				  	    	   echo" <img src='images/".$row['image']."' />";
				  	    
				  	    	   echo' <div class="caption-info">';
				  	    	    	echo' <div class="caption-info-head">';
				  	    	    	 	echo'<div class="caption-info-head-left">';
					  	    	    	 	echo'<h3>'.$name.'<br><span>'.$type.'</span></h3>';
					  	    	    	 	echo'<hr class="separator"></hr>';	
					  	    	    	 	echo'<p>'.$package.'</p>';
					  	    	    	 	echo'<ul class="starts_star">';
	                                        echo'<li><a href="#"><i class="fa fa-star"></i></a></li>';
	                                        echo'<li><a href="#"><i class="fa fa-star"></i></a></li>';
	                                        echo'<li><a href="#"><i class="fa fa-star"></i></a></li>';
	                                        echo'<li><a href="#"><i class="fa fa-star"></i></a></li>';
	                                        echo'<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>';
	                                    	echo'</ul>';
	                                    	echo'<div id="box_modal" class="content-btn"></div>';
	                                   		echo'<div class="price"><span>Rs</span><b>From</b>'.$price.'</div>';
				  	    	    	 	echo'</div>';
				  	    	    	 	echo'<div class="caption-info-head-right">';
				  	    	    	 		echo'<span> </span>';
				  	    	    	 	echo'</div>';
				  	    	    	 	echo'<div class="clear"> </div>';
				  	    	    	 echo'</div>';
				  	    	    echo'</div>';
			  	    	    
			  	    		echo'</li>';
			  	     }
      					}
      				}
		                ?>  			 
			  	    		
			          </ul>
			        </div>
		      </section>
              <!-- //End content_slider -->
		
            <div id="popup1" class="overlaymodal">
                <div class="popup">
                   
                    <a class="close" href="#">&times</a>
                    <div >
                        Thank to pop me out of that button, but now i'm done so you can close this window.
                    </div>
                </div>
            </div>


		<script>
			// For Demo purposes only (show hover effect on mobile devices)
			[].slice.call( document.querySelectorAll('a[href="#"') ).forEach( function(el) {
				el.addEventListener( 'click', function(ev) { ev.preventDefault(); } );
			} );
		</script>

		
		<script src="js/waypoints.min.js"></script>
		
		<script src="js/scripts-min.js"></script>
		
		<?php include_once 'common/footer.php'; ?> <!-- Include the footer in all page -->
