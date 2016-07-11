


<?php

set_include_path(get_include_path() . PATH_SEPARATOR . "/Dompdf");

require_once "Dompdf/dompdf_config.inc.php";

$dompdf = new DOMPDF();

$html ='
<html>
<head>
<link type="text/css" href="bootstrap3.css" rel="stylesheet" />
<link type="text/css" href="planner.css" rel="stylesheet" />

<style>
@media screen and (min-width: 768px)
.jumbotron .h1, .jumbotron h1 {
    font-size: 63px;

}
.jumbotron .h1, .jumbotron h1 {
    color: white;
	
}

.h1, .h2, .h3, h1, h2, h3 {
    margin-top: 20px;
    margin-bottom: 10px;
}

.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
	display:block;
}
h1 {
    margin: .67em 0;
}

body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    }
@media screen and (min-width: 768px)
.jumbotron {
    padding-top: 48px;
    padding-bottom: 48px;
}

.jumbotron {
    padding-top: 30px;
    padding-bottom: 30px;
    margin-bottom: 30px;
    color: #FFF;
	text-align: center;
    background-color:  #1B93E9;
	height: 200px;
}
.jumbotron .container {
    max-width: 100%;
}
@media (min-width: 1200px)
.container {
    width: 1170px;
}
@media (min-width: 992px)
.container {
    width: 970px;
}
@media (min-width: 768px)
.container {
    width: 750px;
}
.container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
@media screen and (min-width: 768px)
.container {
    max-width: 930px;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
}
@media (min-width: 992px)
.col-md-12 {
    width: 100%;
}
@media (min-width: 992px)
.col-md-12{
    float: left;
}
.col-md-12{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.jumbotron p {
    margin-bottom: 15px;
	margin-top:15px;
    font-size: 18px;
    font-weight: 200;
}
p {
    margin: 0 0 15px;
}
.lead{
	line-height: 1.4;
}
.marketing{
    padding-left: 15px;
    padding-right: 15px;
}
@media (min-width: 1200px)
.col-lg-11 {
    width: 91.66666667%;
}
.col-lg-11 {
    float:left;
}
.col-lg-11, .col-md-11, .col-xs-10, .col-lg-2, .col-lg-6{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}	
.col-lg-2 {
    float:left;
}
.col-lg-2 {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}	
@media (min-width: 1200px)
.col-lg-2 {
    width: 16.66666667%;
}
.panel-date {
    color: #5F5F5F;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 0px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
@media (min-width: 1200px)
.col-lg-10 {
    width: 83.33333333%;
}
.col-lg-10, .col-lg-3{
    float:left;
}
.col-lg-10, .col-lg-3{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

@media (min-width: 1200px)
.col-lg-9 {
    width: 75%;
}
.col-lg-9 {
    float:left;
}
.h4, h4 {
    font-size: 18px;
}
.h4, .h5, .h6, h4, h5, h6 {
    margin-top: 10px;
    margin-bottom: 10px;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
}
i.glyphicon.glyphicon-plane {
    color: #1B93E9;
}

.glyphicon {
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: "Glyphicons Halflings";
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
@media (min-width: 1200px)
.col-lg-3 {
    width: 25%;
}
.panel__title--sub {
    margin-top: 10px;
    margin-bottom: 10px;
    color: #795F5F;
}
.agenda__col {
    padding: 10px 3px;
}
@media (min-width: 1200px)
.col-lg-2 {
    width: 16.66666667%;
}
@media (min-width: 1200px)
.col-lg-2 {
    float:left;
}
.trip__title {
    font-size: 14px;
    font-weight: 400;
    color: #5F5F5F;
	margin-bottom: 15px;
}
@media (min-width: 1200px)
.col-lg-6 {
    width: 50%;
}
@media (min-width: 1200px)
.col-lg-6 {
    float:left;
}
#body {
  padding-top: 0;
  padding-bottom: 20px;
  background-color:#eee;
}

.container-narrow > hr {
  margin: 30px 0;
}


.panel-date {
  color: #5F5F5F;
}
.trip__title {
  font-size: 14px;
  font-weight: 400;
  color: #5F5F5F;
}

.col-lg-2.agenda__col--notes {
  font-size: 12px;
}
.panel__title--sub {
  margin-top: 10px;
  margin-bottom: 10px;
  color: #795F5F;
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 14px;
  line-height: 1.42857143;
}

.agenda {
  width: 100%;
  clear:both;
  margin-bottom: 2rem;
  border-bottom:1px solid #eee;
  margin-top:50px;
  border-spacing: 50px;
}
i.glyphicon.glyphicon-plane {
    color: #1B93E9;
}
i.glyphicon.glyphicon-home {
    color: #E9C61B;
}








</style>
	
</head>
 <body>

 <div class="jumbotron">
    <h1>Travel Planner</h1>
	  <div class="row">
	   <div class="col-md-12">
			<p class="lead">All you need to know about your trip</p>
	   </div>
	 </div>		
  </div>
	 
  <div class="container">
   

    <div class="row marketing">
      <div class="col-lg-11 col-md-11 col-xs-10">
        <div id="week-1">Week 1
          <div class="row">
            <div class="col-lg-2">
              <h2 style="font-size: 30px;margin-top: 20px;margin-bottom: 25px;font-weight: 500;line-height: 1.1;" id="17-12" class="panel-date">17/12</h2>
              <p class="panel-day">Thurs</p>
            </div>
            <div class="col-lg-10 panel">
              <div class="agenda">
                <div class="row agenda__head">
                  <div class="col-lg-9">
                    <h4><i class="glyphicon glyphicon-plane"></i> American Airlines - MH418</h4>
                  </div>
                  <div class="col-lg-3 panel__title--sub">
                    NYC to Boston
                  </div>
                </div>
                <div class="agenda__content">
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Depart</h4>
                    <p>19th Dec 08:15</p>
                  </div>
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Terminal</h4>
                    <p>1</p>
                  </div>
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Gate</h4>
                    <p>5</p>
                  </div>
                  <div class="col-lg-6 agenda__col">
                    <h4 class="trip__title">Duration</h4>
                    <p>3 hours 10 minutes</p>
                  </div>
                </div>
                <div class="agenda__content">
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Arrive</h4>
                    <p>19th Dec 12:25</p>
                  </div>
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Terminal</h4>
                    <p>1</p>
                  </div>
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Gate</h4>
                    <p>5</p>
                  </div>
                  <div class="col-lg-6 agenda__col">
                    <h4 class="trip__title">Confirmation Number</h4>
                    <p>IUKNTO</p>
                  </div>
                </div>
              </div>
              <div class="agenda">
                <div class="row agenda__head">
                  <div class="col-lg-8">
                    <h4><i class="glyphicon glyphicon-home"></i> Hotel - Holiday Inn</h4>
                  </div>
                  <div class="col-lg-4 panel__title--sub">
                    443 7th Ave, New York, NY 10001
                  </div>
                </div>
                <div class="agenda__head">
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Check-in</h4>
                    <p>10:15</p>
                  </div>
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Nights</h4>
                    <p>3</p>
                  </div>
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Booking No.</h4>
                    <p>ABC1234</p>
                  </div>
                  <div class="col-lg-6 agenda__col">
                    <h4 class="trip__title">Notes</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-2">
              <h2 id="18-12" class="panel-date">18/12</h2>
              <p class="panel-day">Fri</p>
            </div>
            <div class="col-lg-10 panel">
              <div class="row panel__title">
                <div class="col-lg-9">
                  <h4><i class="glyphicon glyphicon-plane"></i> Hotel - Holiday Inn</h4>
                </div>
                <div class="col-lg-3">
                  NYC to Boston
                </div>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio expedita, natus illo!</p>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-2">
              <h2 id="19-12" class="panel-date">19/12</h2>
              <p class="panel-day">Sat</p>
            </div>
            <div class="col-lg-10 panel">
              <div class="row panel__title">
                <div class="col-lg-9">
                  <h4><i class="glyphicon glyphicon-home"></i> Hotel - Holiday Inn</h4>
                </div>
                <div class="col-lg-3">
                  NYC to Boston
                </div>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni distinctio laborum, minus!</p>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-2">
              <h2 id="20-12" class="panel-date">20/12</h2>
              <p class="panel-day">Sun</p>
            </div>
            <div class="col-lg-10 panel">
              <div class="row panel__title">
                <div class="col-lg-9">
                  <h4><i class="glyphicon glyphicon-plane"></i> American Airlines - MH418</h4>
                </div>
                <div class="col-lg-3">
                  NYC to Boston
                </div>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi ducimus, dolor ea!</p>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-2">
              <h2 id="21-12" class="panel-date">21/12</h2>
              <p class="panel-day">Thurs</p>
            </div>
            <div class="col-lg-10 panel">
              <div class="agenda">
                <div class="row agenda__head">
                  <div class="col-lg-9">
                    <h4><i class="glyphicon glyphicon-plane"></i> American Airlines - MH418</h4>
                  </div>
                  <div class="col-lg-3 panel__title--sub">
                    Boston to Chicago
                  </div>
                </div>
                <div class="agenda__content">
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Depart</h4>
                    <p>21st Dec 08:15</p>
                  </div>
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Terminal</h4>
                    <p>1</p>
                  </div>
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Gate</h4>
                    <p>5</p>
                  </div>
                  <div class="col-lg-6 agenda__col">
                    <h4 class="trip__title">Duration</h4>
                    <p>3 hours 10 minutes</p>
                  </div>
                </div>
                <div class="agenda__content">
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Arrive</h4>
                    <p>21st Dec 12:25</p>
                  </div>
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Terminal</h4>
                    <p>1</p>
                  </div>
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Gate</h4>
                    <p>5</p>
                  </div>
                  <div class="col-lg-6 agenda__col">
                    <h4 class="trip__title">Confirmation Number</h4>
                    <p>IUKNTO</p>
                  </div>
                </div>
              </div>
              <div class="agenda">
                <div class="row agenda__head">
                  <div class="col-lg-8">
                    <h4><i class="glyphicon glyphicon-home"></i> Hotel - Holiday Inn</h4>
                  </div>
                  <div class="col-lg-4 panel__title--sub">
                    443 7th Ave, New York, NY 10001
                  </div>
                </div>
                <div class="agenda__head">
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Check-in</h4>
                    <p>10:15</p>
                  </div>
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Nights</h4>
                    <p>3</p>
                  </div>
                  <div class="col-lg-2 agenda__col">
                    <h4 class="trip__title">Booking No.</h4>
                    <p>ABC1234</p>
                  </div>
                  <div class="col-lg-6 agenda__col">
                    <h4 class="trip__title">Notes</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-2">
              <h2 id="22-12" class="panel-date">22/12</h2>
              <p class="panel-day">Tue</p>
            </div>
            <div class="col-lg-10 panel">
              <div class="row panel__title">
                <div class="col-lg-9">
                  <h4><i class="glyphicon glyphicon-plane"></i> American Airlines - MH418</h4>
                </div>
                <div class="col-lg-3">
                  NYC to Boston
                </div>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus ut, assumenda qui!</p>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-2">
              <h2 id="23-12" class="panel-date">23/12</h2>
              <p class="panel-day">Tue</p>
            </div>
            <div class="col-lg-10 panel">
              <div class="row panel__title">
                <div class="col-lg-9">
                  <h4><i class="glyphicon glyphicon-home"></i> Hotel - Holiday Inn</h4>
                </div>
                <div class="col-lg-3">
                  NYC to Boston
                </div>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, alias.</p>
            </div>
          </div>

        </div>
     
       


      </div>
    </div>

   
  </div>
	
   
 </body>
</html>
';

$dompdf->load_html($html);
$dompdf->set_paper('a4', 'landscape');
$dompdf->render();
$dompdf->set_base_path("css/");
$dompdf->stream("hello.pdf");