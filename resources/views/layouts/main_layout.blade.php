<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Relief Camps | @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />


  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	{{-- <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet"> --}}

	
	<!-- Animate.css -->
	{{-- <link rel="stylesheet" href={{ asset("css/animate.css") }}>
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href={{ asset("css/icomoon.css") }}>
	<!-- Bootstrap  -->
	<link rel="stylesheet" href= {{ asset('css/bootstrap.css') }}>

	<!-- Magnific Popup -->
	<link rel="stylesheet" href= {{ asset("css/magnific-popup.css")}}>

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href={{ asset("css/owl.carousel.min.css")}}>
	<link rel="stylesheet" href={{ asset("css/owl.theme.default.min.css")}}>
	<!-- Flexslider  -->
	<link rel="stylesheet" href={{ asset("css/flexslider.css")}}>

	<!-- Theme style  -->
	<link rel="stylesheet" href={{ asset("css/style.css")}}> --}}


	
    <link rel="stylesheet" href={{ asset("navigation/fonts/icomoon/style.css") }}>

    <link rel="stylesheet" href={{ asset("navigation/css/owl.carousel.min.css") }}>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{ asset("navigation/css/bootstrap.min.css") }}>
    
    <!-- Style -->
    <link rel="stylesheet" href={{ asset("navigation/css/style.css") }}>

	<!-- Modernizr JS -->
	<script src={{ asset("js/modernizr-2.6.2.min.js")}}></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	
		<div class="site-mobile-menu site-navbar-target">
			<div class="site-mobile-menu-header">
			  <div class="site-mobile-menu-close mt-3">
				<span class="icon-close2 js-menu-toggle"></span>
			  </div>
			</div>
			<div class="site-mobile-menu-body"></div>
		  </div>
		  
		<header class="site-navbar js-sticky-header site-navbar-target" role="banner">

			<div class="container">
			  <div class="row align-items-center position-relative">
	
	
				<div class="site-logo">
				  <a href="index.html" class="text-black"><img src="{{ asset("images/logo.jpg")}}" height="80px"/></a>
				</div>
	
				<div class="col-12">
				  <nav class="site-navigation text-right ml-auto " role="navigation">
	
					<ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
					  <li><a href="{{route('homepage')}}" class="nav-link">Home</a></li>
	
					  <li class="has-children">
						<a href="{{route('relief_camps')}}" class="nav-link">Relief Camps</a>
						<ul class="dropdown arrow-top" id="mydropdown">
						  <li class="has-children">
							<a href="#" >Sub Division</a>
							<ul class="dropdown">
								@foreach ($nav_sub_data as $data )

								<li><a href="{{route('relief_camp_by_sub')}}/ {{$data->id}}">{{$data->sub_division_name}}</a></li>

								@endforeach
							</ul>
						</li>

						<li class="has-children">
							<a href="#">Nodal Officer</a>
							<ul class="dropdown">
								@foreach ($nav_nodal_data as $data )

								<li><a href="{{route('relief_camp_by_nodal')}}/ {{$data->id}}">{{$data->officer_name}}</a></li>
									
								@endforeach
							</ul>
						</li>
						  <li class="has-children">
							<a href="#">Demography</a>
							<ul class="dropdown">
							  <li><a href="{{route('relief_camp_demography')}}/male">Male</a></li>
							  <li><a href="{{route('relief_camp_demography')}}/female">Female</a></li>
							  <li><a href="{{route('relief_camp_demography')}}/old_age">Old Age Women</a></li>
							  <li><a href="{{route('relief_camp_demography')}}/orphan">Orphan</a></li>
							  <li><a href="{{route('relief_camp_demography')}}/lactating">Lactating</a></li>
							  <li><a href="{{route('relief_camp_demography')}}/child">Child</a></li>
							</ul>
						  </li>
						</ul>
					  </li>
	
					  <li><a href="{{route('police_stations')}}" class="nav-link">Police Station</a></li>
					  
					  <li><a href="{{route('public_health_centres')}}" class="nav-link">Public Health Centre</a></li>
	
					  <li><a href="{{route('aanganwadi_centres')}}" class="nav-link">Aanganwadi</a></li>
					  <li><a href="{{route('district_helplines')}}" class="nav-link">Helpline</a></li>
					  <li><a href="{{route('announcements')}}" class="nav-link">Announcement</a></li>
					</ul>
				  </nav>
	
				</div>
	
				<div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
	
			  </div>
			</div>
	
		  </header>
		  <div class="container-fluid">
			@yield('content1')
		  </div>
		   <div class="container ">
			<div class="row align-items-center position-relative">
				@yield('content2')
			</div>
		   </div>
	
		  {{-- <aside id="fh5co-hero" class="js-fullheight">
			<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(images/img_bg_1.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Expert Legal Solutions</h1>
									<h2>Free html5 templates Made by <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a></h2>
									<p><a class="btn btn-primary btn-lg" href="#">Make An Appointment</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/imgnav_sub_data=SubDivision::get();
        $nav_nodal_data=NodalOfficer::get();
        $total_nodal_officer=$nav_nodal_data->count();
        $total_camps=ReliefCamp::get()->count();
        $total_inmates=ReliefCampDemography::get()->count();_bg_2.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Business Law</h1>
									<h2>Free html5 templates Made by <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a></h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="#">Make An Appointment</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/img_bg_3.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Defend Your Constitutional Right with Legal Help</h1>
									<h2>Free html5 templates Made by <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a></h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="#">Make An Appointment</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>		   	
		  	</ul>
	  	</div>
	</aside> --}}

	{{-- @yield('content1')

	@yield('content2') --}}

<!--	<div id="fh5co-content">
		<div class="video fh5co-video" style="background-image: url(images/video.jpg);">
			<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video2"></i></a>
			<div class="overlay"></div>
		</div>
		<div class="choose animate-box">
			<div class="fh5co-heading">
				<h2>Why Choose Us?</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts far from the countries Vokalia and Consonantia, there live the blind texts. </p>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
				Adoption Law 50%
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%">
				Family Law 80%
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%">
				Real Estate Law 70%
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:40%">
				Personal Injury Law 40%
				</div>
			</div>
		</div>
	</div>-->

	
	
	{{-- <div id="fh5co-project">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Counseling</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="#"><img src="images/project-1.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
						<h3>Business</h3>
						<span>CEO. Hon Doe</span>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="#"><img src="images/project-2.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
						<h3>Legal Advice</h3>
						<span>Atty. John Doe</span>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="#"><img src="images/project-3.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
						<h3>Read Bible</h3>
						<span>Ptr. Jhon Doe</span>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="#"><img src="images/project-4.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
						<h3>Affidavit</h3>
						<span>Atty. Boo Doe</span>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="#"><img src="images/project-5.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
						<h3>Sports</h3>
						<span>Atty. Smith D</span>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="#"><img src="images/project-6.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
						<h3>Photography</h3>
						<span>Phtr. Arnt Tee</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-testimonial" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Testimonials</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row animate-box">
						<div class="owl-carousel owl-carousel-fullwidth">
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/user-1.jpg" alt="user">
									</figure>
									<span>Jean Doe, via <a href="#" class="twitter">Twitter</a></span>
									<blockquote>
										<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/user-1.jpg" alt="user">
									</figure>
									<span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
									<blockquote>
										<p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/user-1.jpg" alt="user">
									</figure>
									<span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
									<blockquote>
										<p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-consult">
		<div class="video fh5co-video" style="background-image: url(images/video.jpg);">
		</div>
		<div class="choose animate-box">
			<div class="fh5co-heading">
				<h2>Free Legal Consultation</h2>
			</div>
			<form action="#">
				<div class="row form-group">
					<div class="col-md-6">
						<!-- <label for="fname">First Name</label> -->
						<input type="text" id="fname" class="form-control" placeholder="Your firstname">
					</div>
					<div class="col-md-6">
						<!-- <label for="lname">Last Name</label> -->
						<input type="text" id="lname" class="form-control" placeholder="Your lastname">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<!-- <label for="email">Email</label> -->
						<input type="text" id="email" class="form-control" placeholder="Your email address">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<!-- <label for="subject">Subject</label> -->
						<input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<!-- <label for="message">Message</label> -->
						<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" value="Send Message" class="btn btn-primary">
				</div>

			</form>	
		</div>
	</div>

	<div id="fh5co-blog" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Recent Post</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="#"><img class="img-responsive" src="images/project-4.jpg" alt=""></a>
						<div class="blog-text">
							<span class="posted_on">Nov. 15th</span>
							<span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
							<h3><a href="#">Legal Consultation</a></h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<a href="#" class="btn btn-primary">Read More</a>
						</div> 
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="#"><img class="img-responsive" src="images/project-2.jpg" alt=""></a>
						<div class="blog-text">
							<span class="posted_on">Nov. 15th</span>
							<span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
							<h3><a href="#">Criminal Case</a></h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<a href="#" class="btn btn-primary">Read More</a>
						</div> 
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="#"><img class="img-responsive" src="images/project-3.jpg" alt=""></a>
						<div class="blog-text">
							<span class="posted_on">Nov. 15th</span>
							<span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
							<h3><a href="#">Business Law</a></h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<a href="#" class="btn btn-primary">Read More</a>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-about">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Our Attorneys</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-staff">
						<img src="images/user-2.jpg" alt="Free HTML5 Templates by gettemplates.co">
						<h3>Jean Smith</h3>
						<strong class="role">Counsel</strong>
						<p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita. Possimus itaque adipisci.</p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-staff">
						<img src="images/user-2.jpg" alt="Free HTML5 Templates by gettemplates.co">
						<h3>Hush Raven</h3>
						<strong class="role">Head of International Practice</strong>
						<p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita. Possimus itaque adipisci.</p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-staff">
						<img src="images/user-2.jpg" alt="Free HTML5 Templates by gettemplates.co">
						<h3>Alex King</h3>
						<strong class="role">Managing Partner, Attorney</strong>
						<p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita. Possimus itaque adipisci.</p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-started" style="background-image:url(images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Legal Advice</h2>
					<p>We help people effectively fight their offenders back and successfully defend their own stand!</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center">
					<p><a href="#" class="btn btn-default btn-lg">Consultation</a></p>
				</div>
			</div>
		</div>
	</div> --}}

	{{-- <footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-3 fh5co-widget">
					<h4>Attorney's Law</h4>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h4>Navigation</h4>
					<ul class="fh5co-footer-links">
						<li><a href="#">Home</a></li>
						<li><a href="#">Practice Areas</a></li>
						<li><a href="#">Won Cases</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">About us</a></li>
					</ul>
				</div>

				<div class="col-md-3 col-md-push-1">
					<h4>Contact Information</h4>
					<ul class="fh5co-footer-links">
						<li>198 West 21th Street, <br> Suite 721 New York NY 10016</li>
						<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
						<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
						<li><a href="http://gettemplates.co">gettemplates.co</a></li>
					</ul>
				</div>

				<div class="col-md-3 col-md-push-1">
					<h4>Opening Hours</h4>
					<ul class="fh5co-footer-links">
						<li>Mon - Thu: 9:00 - 21 00</li>
						<li>Fri 8:00 - 21 00</li>
						<li>Sat 9:30 - 15: 00</li>
					</ul>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer> --}}
{{-- 
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div> --}}
	
	{{-- <!-- jQuery -->
	<script src={{ asset("js/jquery.min.js")}}></script>
	<!-- jQuery Easing -->
	<script src={{ asset("js/jquery.easing.1.3.js")}}></script>
	<!-- Bootstrap -->
	<script src={{ asset("js/bootstrap.min.js")}}></script>
	<!-- Waypoints -->
	<script src={{ asset("js/jquery.waypoints.min.js")}}></script>
	<!-- Stellar Parallax -->
	<script src={{ asset("js/jquery.stellar.min.js")}}></script>
	<!-- Carousel -->
	<script src={{ asset("js/owl.carousel.min.js")}}></script>
	<!-- Flexslider -->
	<script src={{ asset("js/jquery.flexslider-min.js")}}></script>
	<!-- countTo -->
	<script src={{ asset("js/jquery.countTo.js")}}></script>
	<!-- Magnific Popup -->
	<script src={{ asset("js/jquery.magnific-popup.min.js")}}></script>
	<script src={{ asset("js/magnific-popup-options.js")}}></script>
	<!-- Main -->
	<script src={{ asset("js/main.js")}}></script> --}}

	<script src={{ asset("navigation/js/jquery-3.3.1.min.js")}}></script>
    <script src={{ asset("navigation/js/popper.min.js")}}></script>
    <script src={{ asset("navigation/js/bootstrap.min.js")}}></script>
    <script src={{ asset("navigation/js/jquery.sticky.js")}}></script>
    <script src={{ asset("navigation/js/main.js")}}></script>

	</body>
</html>

