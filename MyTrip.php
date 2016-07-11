
<!DOCTYPE HTML>
<html>
<?php
include_once('db.php'); 
session_start();
error_reporting(0);
?>

    <head>
        <title>Vacation Planner</title>
   
        <link href="css/modal.css" rel='stylesheet' type='text/css' >
        <link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css">
        <link href="css/jquery-ui.css" rel='stylesheet' type='text/css' >
        <script type="text/javascript"  src="js/jquery.min.js"></script>
		
        <script type="text/javascript"  src="js/jquery-ui.min.js"></script>




         <script>


$(function(){
  /*$('#plan-button').click(function(){ //.submitcode la c button la so CLASS, remplace li par class to button
          $.each($('[name^=customUtility_'), function (i, item) {
    var grade = $(this).val();
    alert(grade);
});
  });*/
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

 
<body  class="one" >
 

            <div  class="stylePlanning">
                <form class="planning-form" action="trip_details.php" method="POST">
               
                   
                        <h1 class="title">Plan Your Trip</h1>
                       
                        <div id="step1" class="step">
                       
                            <div class="step-title">
                                <div class="line"></div>
                                <span class="text">1. Destinations &amp; Dates</span>
                            </div>
                           
                            <div class="step-content">
                                <div class="dests">
                                    <div class="destinations ui-front" id="destinationName">
                                        <div class="destination">
                                                        <input type="text" class="domain shaded ui-autocomplete-input" placeholder="Country, Region, or City" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                                                        <div data-hasqtip="0" class="tip" data-show-text="<b>Current destinations:</b><br/><i>We are currently able to plan trips to</i><br/><b><i>USA &amp; Europe.</i></b>"><span class="fa fa-question"></span></div>
                                        </div>
                                    </div>
                                    <span id="add-destination" class="add-destination"><span class="fa fa-plus"></span>Add destination</span>
                                </div>
                               

                                <script>
                                var addDiv = $('.destination');
                                 var i = $('.destination').size() + 1;

                                 $('#add-destination').live('click', function() {
                                                        addDiv.append($('.destination').val());
                                                        $('<p><input type="text" class="domain shaded ui-autocomplete-input"   name="customUtility[]" placeholder="Country, Region, or City" autocomplete="off"><a href="#" id="removeUtility">Remove</a></p>').appendTo(addDiv);
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
                                <span class="text">2. Travelers</span>
                            </div>
                            <div class="step-content">
                                <div class="travel-with">
                                    <div class="column2"><input type="checkbox" id="whoAdults" class="shaded" name="adults" value="true" checked="" disabled=""><label for="whoAdults">Adults</label></div>
                                    <div class="column2"><input type="checkbox" id="whoTeens" class="shaded" name="teens" value="true" ><label for="whoTeens">Teens</label></div>
                                    <div class="column2"><input type="checkbox" id="whoKids" class="shaded" name="kids" value="true" ><label for="whoKids">Kids</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="step-title ">
                            <div style="bottom:8px;" class="line"></div>
                            <span style="color:#fa8c00;" class="text">3. Activities</span>
                        </div>
                       
                       
                       
                        <div id="step3" class="step">
                            <div class="step-content">
                                <div class="pace">
                                    <div>
                                        <div class="column3"><input type="radio" id="stylePopular" class="shaded" name="style" value="Popular" checked=""><label for="stylePopular">Popular</label></div>
                                        <div class="column3"><input type="radio" id="styleBalanced" class="shaded" name="style" value="Balanced"><label for="styleBalanced">Balanced</label></div>
                                        <div class="column3"><input type="radio" id="styleHiddenGems" class="shaded" name="style" value="HiddenGems"><label for="styleHiddenGems">Hidden Gems</label></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="pace">
                                    <div>
                                        <div class="column3"><input type="radio" id="paceFast" class="shaded" name="pace" value="Fast"><label for="paceFast">Fast-Paced</label></div>
                                        <div class="column3"><input type="radio" id="paceMedium" class="shaded" name="pace" value="Medium" checked=""><label for="paceMedium">Medium</label></div>
                                        <div class="column3"><input type="radio" id="paceSlow" class="shaded" name="pace" value="Slow"><label for="paceSlow">Slow &amp; Easy</label></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="interests">
                                    <div class="interests-wrap">
                                        <div class="column3"><input type="checkbox" id="interestCulture" class="shaded" name="culture" value="true"><label for="interestCulture">Culture</label></div>
                                        <div class="column3"><input type="checkbox" id="interestOutdoor" class="shaded" name="outdoors" value="true"><label for="interestOutdoor">Outdoors</label></div>
                                        <div class="column3"><input type="checkbox" id="interestUnwind" class="shaded" name="unwind" value="true"><label for="interestUnwind">Relaxing</label></div>
                                        <div class="column3"><input type="checkbox" id="category10" class="shaded" name="categoryGroupNames" value="Beaches"><label for="category10">Beaches</label></div>
                                        <div class="column3"><input type="checkbox" id="category26" class="shaded" name="categoryGroupNames" value="Historic Sites"><label for="category26">Historic Sites</label></div>
                                        <div class="column3"><input type="checkbox" id="category16" class="shaded" name="categoryGroupNames" value="Museums"><label for="category16">Museums</label></div>
                                        <div class="column3"><input type="checkbox" id="category4" class="shaded" name="categoryGroupNames" value="Shopping"><label for="category4">Shopping</label></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" id="plan-button" action="#" value="See The Plan">
				    <?php
					if(isset($_POST['submit']))
					{
					 foreach($_POST['customUtility'] as $key => $value)
					{
					  //echo $key." has the value = ". $value."<br>";
					  $val.= $value.' '; 
					}
					$name=$_SESSION['uname'];
					//echo $name;
					$conn=db_connect();   // call function 

					$result=mysql_query("SELECT * FROM registration WHERE username='$name'");
		

					if (mysql_num_rows($result)>0)
					{
						while ($row = mysql_fetch_assoc($result)) {
						    $customer_id=$row["registration_id"];
							$result1=mysql_query("INSERT INTO reservation(Customer_ID,Packages_ID,Packages_Description) 
								VALUES ('$customer_id','custom','$val')");
								
		
							
						
					}
					
				}
					
					else
					{
						echo 'no data';
					}









					mysql_query("INSERT INTO registration(username,email,password,dob,gender) VALUES ('$username','$email','$mypassword','$dateOfBirth','$gender')");
		 			
					echo $val;
					}
					?>
                   
                </form>
            </div>           

   
</body>
</html>