<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Maexpress - Static</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="{{ asset('admin/404/css/base.css') }}">
   <link rel="stylesheet" href="{{ asset('admin/404/css/main.css') }}">
   <link rel="stylesheet" href="{{ asset('admin/404/css/vendor.css') }}">

   <!-- script
   ================================================== -->
	<script src="{{ asset('admin/404/js/modernizr.js') }}"></script>

   <!-- favicons
	================================================== -->
	{{--<link rel="icon" type="image/png" href="favicon.png">--}}

</head>

<body>

	<!-- header 
   ================================================== -->
   <header class="main-header">
   	<div class="row">
   		<div class="logo">
	         <a href="#" class="go_back"><h1 style="color: #ffffff;">Go Back</h1></a>
	      </div>
   	</div>
   </header> <!-- /header -->

   <main id="main-404-content" class="main-content-static">

   	<div class="content-wrap">

		   <div class="shadow-overlay"></div>

		   <div class="main-content">
		   	<div class="row">
		   		<div class="col-twelve">
			  		
			  			<h1 class="kern-this">404 Error.</h1>
			  			<p>
						Oooooops! Looks like nothing was found at this location.
						Maybe try on of the links below, click on the top menu
						or try a search?
			  			</p>

			   	</div> <!-- /twelve --> 		   			
		   	</div> <!-- /row -->    		 		
		   </div> <!-- /main-content -->

		</div> <!-- /content-wrap -->
   
   </main> <!-- /main-404-content -->

   <div id="preloader"> 
    	<div id="loader"></div>
   </div> 

   <!-- Java Script
   ================================================== --> 
   <script src="{{ asset('admin/404/js/jquery-2.1.3.min.js') }}"></script>
   <script src="{{ asset('admin/404/js/plugins.js') }}"></script>
   <script src="{{ asset('admin/404/js/main.js') }}"></script>
   <script src="{{ asset('admin/script/goback.js') }}"></script>
</body>

</html>