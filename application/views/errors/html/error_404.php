<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<title>404 Page Not Found</title>

<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; 

	 }
*::before, *::after {
  box-sizing: border-box;
}
body {
  background-color: rgba(0, 0, 0, 0);
  color: #656565;
  font-size: 13px;
  overflow-x: hidden;
  margin: 0px;
  padding: 0px;
}

.navbar-1 {
  margin-bottom: 20px;
  min-height: 80px;
  position: relative;
}
.navbar-1 {
  border-radius: 0;
  margin-bottom: 0;
  padding: 0;
  z-index: 1010;
}
.bg-black-1 {
  background: #1d2d3d none repeat scroll 0 0;
}
.navbar-brand-1 {
  border-right: 0 solid #e3e9ed;
  height: 79px;
  margin-left: auto;
  margin-right: auto;
  padding: 0;
}
.bg-1 .navbar-brand-1{
  border-right-color: rgba(0, 0, 0, 0);
}
.navbar-brand-1, .navbar-brand-1:hover, .navbar-brand-1:focus {
  color: #22baa0;
}
.navbar-brand-1 {
  font-family: "Times New Roman",Georgia,serif;
  font-size: 28px;
  font-style: italic;
  font-weight: 700;
  min-width: 90px;
  padding: 0 0 18px;
  text-align: center;
}
.navbar-brand-1 > img {
  max-height: 80px;
  display: block;
}
#content-1 {
  position: relative;
}
.padder-1 {
  padding: 0 15px;
}
.row-1 {
  margin-left: -15px;
  margin-right: -15px;
}
.m-t-large-1 {
  margin-top: 20px;
}
.col-lg-offset-4-1 {
 /* margin-left: 33.3333%;*/
  margin-top: 16%;
}
.col-lg-4-1 {
  width: 100%;
}
#footer-1 {
  margin-top: 20px;
}
.footermain-1 {
  bottom: 0;
  position: absolute;
  width: 100%;
}
.footer-1 {
  bottom: 0;
  position: relative;
  width: 100%;
}
.padder-1 {
  padding: 0 15px;
}
.text-center-1 {
  text-align: center;
}
footer#footer-1 small {
  color: #8d8d8d;
  font-size: 14px;
}
#content-1 h1 {
	width: 100%;
	text-align: center;
  color: #ff5f5f;
  font-size: 50px;
  line-height: normal;
  margin-bottom: 0;
  font-family: "Open Sans","HelveticaNeue","Helvetica Neue",Helvetica,Arial,sans-serif;
  
}
#content-1 p {
	width: 100%;
	text-align: center;
  color: #8d8d8d;
  font-family: "Open Sans","HelveticaNeue","Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 20px;
  line-height: normal;
  margin-bottom: 0;
  margin-top: 0;
}
@media all and (max-width: 1023px){
.col-lg-offset-4-1 {
  margin-top: 25%;
}
@media all and (max-width: 767px){
.col-lg-offset-4-1 {
  margin-top: 38%;
}
@media all and (max-width: 639px){
#content-1 h1 {
  font-size: 44px;
}
#content-1 p {
font-size: 18px;
}
@media all and (max-width: 479px){
.col-lg-offset-4-1 {
  margin-top: 50%;
}
#content-1 h1 {
  font-size: 30px;
}
#content-1 p {
font-size: 14px;
}
}
</style>
</head>
<body>
<!-- header -->
		<header id="header" class="navbar-1 bg-1 bg-black-1">
		<!--<a href="docs.html" class="btn btn-link pull-right m-t-mini"><i class="fa fa-question fa-lg text-default"></i></a>-->
			<a class="navbar-brand-1" href="http://192.168.1.57/co-ncall/"><img src="http://192.168.1.57/co-ncall/theme/images/logo.png" title="Co" alt="Co"></a>
		</header>
		<!-- / header -->
	<section id="content-1">
    <div class="main padder-1">
      <div class="row-1">
        <div class="col-lg-4-1 col-lg-offset-4-1 m-t-large-1">
          	<h1><?php echo $heading; ?></h1>
			<?php echo $message; ?>
        </div>
      </div>
    </div>
</section>
<!-- footer -->
<div class="clear clear1"></div>
<footer id="footer-1" class="footermain-1">
  <div class="footer-1">
    <div class="text-center-1 padder-1 clearfix">
      <p>
        <small>&copy; CallOffice 2015</small><br><br>
        <!--<a href="#" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a>-->
      </p>
    </div>
  </div>
</footer>
<!-- / footer -->

	<!-- <div id="container">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
	</div> -->
</body>
</html>