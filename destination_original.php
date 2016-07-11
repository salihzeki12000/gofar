<!doctype html>
<html lang="en" class="no-js">

 <?php
include_once('database.php');
error_reporting(0);
session_start();
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/isotope.css">
        <link rel="stylesheet" href="css/card.css">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/content filter.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/buttons.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<!--start-top-nav-script-->
		<script type="text/javascript" src="js/flexy-menu.js"></script>
		<script type="text/javascript">$(document).ready(function(){$(".flexy-menu").flexymenu({speed: 400,type: "horizontal",align: "right"});});</script>
		<!--End-top-nav-script-->
		
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!--//webfonts-->	



        <script>
        $(document).ready(function($) {

                $('.card__share > a').on('click', function(e){ 
                        e.preventDefault() // prevent default action - hash doesn't appear in url
                        $(this).parent().find( 'div' ).toggleClass( 'card__social--active' );
                        $(this).toggleClass('share-expanded');
            });

        });
         </script>

	<script>
            $( document ).ready(function() {
             $('[name="img"]').click(function () {
                    $(this).toggleClass("selected");
            var ID = $(this).attr("id");
                    //alert(ID);

                });
                $("#reset").click(function () {
                    $("input").val("");
                    $("div.selected").removeClass("selected");
                });
                $("#create").click(function        
            () {

                    if ($("div.selected").length == 0) {
                        alert("Select at least 1 destinations");
                        return false;
                    } else {
                    alert("Have all desired destinations been selected?");


            }
            var c = '';
                   $( "div.selected" ).each(function( index ) {
             // alert($(this).attr("id"));
              c += $(this).attr("id")+'/';

            });
            var name=$('input#txt_name').val();
            var from=$('input#from').val();
            var to=$('input#to').val();
                   //alert(c);

             window.location.href = "trip_detail.php?id="+c+"&name="+name+"&from="+from+"&to="+to;


                    $("#galleryHeader").show();
                    $("#form").hide();
                    $("div").off("click");
                    $("div.selected").hide();
                    $("div.selected").removeClass("selected");

                });
            });
            </script>
  	

	<script src="js/mainfilter.js"></script> <!-- Resource jQuery -->
	<script src="js/jquery.isotope.js" type="text/javascript"></script> 


  	

	<script type="text/javascript">

	$(window).load(function(){
	    var $container = $('.portfolioContainer');
	    $container.isotope({
	        filter: '*',
	        animationOptions: {
	            duration: 750,
	            easing: 'linear',
	            queue: false
	        }
	    });
	 
	    $('.portfolioFilter a').click(function(){
	        $('.portfolioFilter .current').removeClass('current');
	        $(this).addClass('current');
	 
	        var selector = $(this).attr('data-filter');
	        $container.isotope({
	            filter: selector,
	            animationOptions: {
	                duration: 750,
	                easing: 'linear',
	                queue: false
	            }
	         });
	         return false;
	    }); 
	});

	</script>

	 <link rel="shortcut icon" href="../favicon.ico"> 
     <link rel="stylesheet" type="text/css" href="css/demostyle.css" />
     <link rel="stylesheet" type="text/css" href="css/style_common.css" />
     <link rel="stylesheet" type="text/css" href="css/style2.css" />

     <style>


		div.selected {
		  border: 1px solid #8BC34A;
		}


		#galleryHeader {
		  display: none;
		}

	 </style>


	
	<title>Select destinations</title>
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
							$session_name=$_SESSION["uname"];
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
							<li><a href="index.php">Home</a><span>::</span></li>
                                                        <li><a href="trip.php">My Trip Plans</a><span>::</span></li>
                                                        <li><a href="recent_plan.php">All Trip Plans</a><span>::</span></li>
                                                        <li><a href="contact.php">Contact Us</a><span>::</span></li>
						</ul>
					 
					
				</div>
				<!--//End-top-nav-->
				<div class="clear"> </div>
			</div>
			<!--//End-header-->
		</div>

















	<header class="cd-headers">
		<h1 class="quotetitle" >DISCOVER AMAZING PLACES</h1>

	</header>

	<main class="cd-main-content">
			<div class="cd-tab-filter-wrapper">
				<div class="cd-tab-filter">
					<ul class="cd-filters">
						<li class="placeholder"><a data-type="all" href="#0">All</a> <!-- selected option on mobile --></li> 
						<li class="portfolioFilter"><a class="current" href="#0" data-filter="*">All</a></li>
						<li class="portfolioFilter"><a href="#" data-filter="#air">Air</a></li>
						<li class="portfolioFilter"><a href="#" data-filter="#land">Land</a></li>
						<li class="portfolioFilter"><a href="#" data-filter="#water">Water</a></li>
					</ul> <!-- cd-filters -->
				</div> <!-- cd-tab-filter -->
			</div> <!-- cd-tab-filter-wrapper -->

			<section class="cd-gallery">

			<div class="main">

			
			<!-- show content -->		
			<div id="galleryHeader">
			 <p> </p>
			</div>




		
            <!-- FIFTH EXAMPLE -->
            <div class="portfolioContainer"  id="gallery">

		              <!-- <p id='data' style="display:none;"></p>
		               <input class='txt_content' name='txt_content' type='hidden'>-->
		                <?php

		                 $con=db_connect();
		                 $Dynamic_data=$_POST['txt_content'];

						/*
		foreach($_POST['customUtility'] as $key=>$val){  
						echo $val.'</br>';
						}
						*/
						 
						 
						 
						$region = $_POST['dest_region'];
						$name_of_activity = $_POST['plan_name'];
						$from = $_POST['rango2_de'];
						$to = $_POST['rango2_a'];
						$teens = $_POST['teens'];
						$kids = $_POST['kids'];
						$previous_selection = $_POST['Previous_Result'];
						
					
						
						if(isset($previous_selection))
						{
						$arr[]=$region;
						$arr[]='All Regions';
						foreach($_POST['customUtility'] as $key=>$val){  
						$arr[]=$val;
						}
						
						$sql_previous="SELECT  `map_id` FROM reservation, login WHERE  `Reservation`.`user_id` = login.user_id AND login.username =  '$session_name'";
						$resultset=mysqli_query($con, $sql_previous);
			      		 if (mysqli_num_rows($resultset) > 0) {
			         	 while($rowset = mysqli_fetch_assoc($resultset)) {
						$data=$rowset['map_id'];
						//echo $data;
						 }
						 }
						
						foreach($arr as $k => $v){
						$sql="select * from markers where region='$v' and map_id not in($data)";
						
						
						
						
						
						
						 $result = mysqli_query($con, $sql);
			      		 if (mysqli_num_rows($result) > 0) {
			         	 while($row = mysqli_fetch_assoc($result)) {
						
			         	$category= $row["category"]; 			
			         	$image = $row["image"]; 		
			            $name=$row["name"];
			            $address = $row["address"];
			           $map = $row["map_id"];


			           
			           
                                    echo "<span id='$category' class='$type'>";
			            echo "<div name='img' id='$map'  class='view view-second'>";

                                    echo "<img src='images/".$row['image']."' />";
                                    echo '<div class="mask"></div>';
                                    echo '<div class="content">';
                                    echo "<h2>".$name."</h2>"; 

                                    echo "<p id='$map' name='temp'></p>";

                                        echo '<div class="card__content card__padding">';
                                            echo '<div class="card__share">';
                                                    echo '<div class="card__social"> '; 
                                                    echo '</div>';
                                                    echo '<a id="share" class="share-toggle share-icon" href="#"></a>';
                                                echo '</div>';
                                        echo '</div>';

                                    echo "</div>";
                                    echo "</div>";
                                    echo "</span>";
		                }
      					}
						}
						}
						else
						{
						$arr[]=$region;
						$arr[]='All Regions';
						foreach($_POST['customUtility'] as $key=>$val){  
						$arr[]=$val;
						}
						foreach($arr as $k => $v){
						$sql="select * from markers where region='$v'";
						 $result = mysqli_query($con, $sql);
			      		 if (mysqli_num_rows($result) > 0) {
			         	 while($row = mysqli_fetch_assoc($result)) {
						
			         	$category= $row["category"]; 			
			         	$image = $row["image"]; 		
                                        $name=$row["name"];
                                        $address = $row["address"];
                                        $map = $row["map_id"];
                                        $type = $row["type"];

                                     
                                     
                                    echo "<span id='$category' class='$type'>";
			            echo "<div name='img' id='$map'  class='view view-second'>";

                                    echo "<img src='images/".$row['image']."' />";
                                    echo '<div class="mask"></div>';
                                    echo '<div class="content">';
                                    echo "<h2>".$name."</h2>"; 

                                    echo "<p id='$map' name='temp'></p>";

                                        echo '<div class="card__content card__padding">';
                                            echo '<div class="card__share">';
                                                    echo '<div class="card__social"> '; 
                                                    echo '</div>';
                                                    echo '<a id="share" class="share-toggle share-icon" href="#"></a>';
                                                echo '</div>';
                                        echo '</div>';

                                    echo "</div>";
                                    echo "</div>";
                                    echo "</span>";
                                    }
                                            }
                                                    }
                                                    }
			           
			           
						
		                ?>
						<input type='hidden' id='txt_name' value='<?php echo $name_of_activity; ?>'>
						<input type='hidden' id='from' value='<?php echo $from; ?>'>
						<input type='hidden' id='to' value='<?php echo $to; ?>'>

		                  
		                   
 		
		                  <!--       <h2>Hover Style #2</h2> -->
		                  <!--       <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
		                   -->      
		                   
		                
		            

		           
		                

		                <div id="form">
 						<button id="create" class="buttonstyle buttonstyle--quidel buttonstyle--round-s"><i class="button__icon icon icon-cross"></i><span>See Plan</span></button>
						<button id="reset" class="buttonstyle buttonstyle--quidel buttonstyle--round-s"><i class="button__icon icon icon-cross"></i><span>Reset</span></button>
						</div>
		                	
            </div>
        </div>
			<!-- <ul>
				<li class="mix color-1 check1 radio2 option3"><img src="img/img-1.jpg" alt="Image 1"></li>
				<li class="mix color-2 check2 radio2 option2"><img src="img/img-2.jpg" alt="Image 2"></li>
				<li class="mix color-1 check3 radio3 option1"><img src="img/img-3.jpg" alt="Image 3"></li>
				<li class="mix color-1 check3 radio2 option4"><img src="img/img-4.jpg" alt="Image 4"></li>
				<li class="mix color-1 check1 radio3 option2"><img src="img/img-5.jpg" alt="Image 5"></li>
				<li class="mix color-2 check2 radio3 option3"><img src="img/img-6.jpg" alt="Image 6"></li>
				<li class="mix color-2 check2 radio2 option1"><img src="img/img-7.jpg" alt="Image 7"></li>
				<li class="mix color-1 check1 radio3 option4"><img src="img/img-8.jpg" alt="Image 8"></li>
				<li class="mix color-2 check1 radio2 option3"><img src="img/img-9.jpg" alt="Image 9"></li>
				<li class="mix color-1 check3 radio2 option4"><img src="img/img-10.jpg" alt="Image 10"></li>
				<li class="mix color-1 check3 radio3 option2"><img src="img/img-11.jpg" alt="Image 11"></li>
				<li class="mix color-2 check1 radio3 option1"><img src="img/img-12.jpg" alt="Image 12"></li>
				<li class="gap"></li>
				<li class="gap"></li>
				<li class="gap"></li>
			</ul> -->
			<div class="cd-fail-message">No results found</div>
		</section> <!-- cd-gallery -->

		<div class="cd-filter">
			<form>

				<div class="cd-filter-block">
					<h4>Water Activities</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input name="type" class="portfolioFilter" value="speedboat" data-filter=".check1" type="checkbox" id="checkbox1">
			    			<label class="checkbox-label" for="checkbox1">Catamaran Cruises</label>
						</li>

						<li>
							<input name="rating" class="portfolioFilter" value="diving" data-filter=".check2" type="checkbox" id="checkbox2">
							<label class="checkbox-label" for="checkbox2">Scuba Diving</label>
						</li>

						<li>
							<input class="portfolioFilter" value="fishing" data-filter=".check3" type="checkbox" id="checkbox3">
							<label class="checkbox-label" for="checkbox3">Big Game Fishing</label>
						</li>
                                                
                                                <li>
							<input class="portfolioFilter" value="sunset" data-filter=".check4" type="checkbox" id="checkbox4">
							<label class="checkbox-label" for="checkbox4">Sunset Cruises</label>
						</li>
                                                
                                                <li>
							<input class="portfolioFilter" value="sailing" data-filter=".check5" type="checkbox" id="checkbox5">
							<label class="checkbox-label" for="checkbox5">Sailing</label>
						</li>
                                                
                                                <li>
							<input class="portfolioFilter" data-filter=".check6" type="checkbox" id="checkbox6">
							<label class="checkbox-label" for="checkbox6">Kayaking</label>
						</li>
                                                
                                                 <li>
							<input class="filter_category" data-filter=".check7" type="checkbox" id="checkbox7">
							<label class="checkbox-label" for="checkbox7">Stand Up Paddle</label>
						</li>
				
                                        <br>
                                        <h4>Land Activities</h4>

					
						<li>
							<input name="type" class="filter_category" data-filter=".check1" type="checkbox" id="checkbox1">
			    			<label class="checkbox-label" for="checkbox1">Family Packages</label>
						</li>

						<li>
							<input name="rating" class="filter_category" data-filter=".check2" type="checkbox" id="checkbox2">
							<label class="checkbox-label" for="checkbox2">Safari & Wildlife</label>
						</li>

						<li>
							<input class="filter_category" data-filter=".check3" type="checkbox" id="checkbox3">
							<label class="checkbox-label" for="checkbox3">Zip-Line</label>
						</li>
                                                
                                                <li>
							<input class="filter_category" data-filter=".check4" type="checkbox" id="checkbox4">
							<label class="checkbox-label" for="checkbox4">Hiking & Trekking</label>
						</li>
                                                
                                                <li>
							<input class="filter_category" data-filter=".check5" type="checkbox" id="checkbox5">
							<label class="checkbox-label" for="checkbox5">Golf Packages</label>
						</li>
                                                
                                                <li>
							<input class="filter_category" data-filter=".check6" type="checkbox" id="checkbox6">
							<label class="checkbox-label" for="checkbox6">Sites & Reserve</label>
						</li>
                                                
                                                <li>
							<input class="filter_category" data-filter=".check7" type="checkbox" id="checkbox7">
							<label class="checkbox-label" for="checkbox7">Private Tours</label>
						</li>
                                                
                                                 <li>
							<input class="filter_category" data-filter=".check8" type="checkbox" id="checkbox8">
							<label class="checkbox-label" for="checkbox8">Shopping Tours</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
			
			</form>

			<a href="#0" class="cd-close">Close</a>
		</div> <!-- cd-filter -->

		<a href="#0" class="cd-filter-trigger">Filters</a>
	</main> <!-- cd-main-content -->


		<!--start-footer-->
	
		<!--//End-footer-->
		<!--start-subfooter-->
		<div class="subfooter">
			<div class="wrap">
				<ul>
					<li><a href="index.php">Home</a><span>::</span></li>
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

<script>
    $(document).ready(function () {
           

            $('div.cd-filter-content cd-filters list').find('input:checkbox').live('click', function () {
                $('.results > li').hide();
                $('div.cd-filter-content cd-filters list').find('input:checked').each(function () {
                    $('.results > li.' + $(this).attr('rel')).show();
                });
            });
        });      
</script>

<script>
function makeTable(data){
var tbl_body = "";
$.each(data, function() {
var tbl_row = "";
$.each(this, function(k , v) {
tbl_row += "<div>"+v+"/"+"</div>";
})
tbl_body += "<div>"+tbl_row+"</div>";
})
return tbl_body;
}
function getEmployeeFilterOptions(){
var opts = [];
$checkboxes.each(function(){
if(this.checked){
opts.push(this.name);
}
});
return opts;
}
function updateEmployees(opts){
$.ajax({
type: "POST",
url: "search.php",
dataType : 'json',
cache: false,
data: {filterOpts: opts},
success: function(records){
$('#data').html(makeTable(records));
var data=$('#data').text();
$(".txt_content").val(data);
}
});
}
var $checkboxes = $("input:checkbox");
$checkboxes.on("change", function(){
var opts = getEmployeeFilterOptions();
updateEmployees(opts);
});
 
</script>
<script>
$('.btn').click(function(){
	});
</script>

</body>
</html>