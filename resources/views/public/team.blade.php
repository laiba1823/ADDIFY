@extends('public.layouts.parent')

@section('title', 'Team | CAN')
	
@section('banner')
	<!--Inner Home Banner Start-->
		{{-- <div class="wt-haslayout wt-innerbannerholder">
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
						<div class="wt-innerbannercontent">
						<div class="wt-title"><h2>A Brief Intro</h2></div>
						<ol class="wt-breadcrumb">
							<li><a href="index-2.html">Home</a></li>
							<li class="wt-active">About</li>
						</ol>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
	<!--Inner Home End-->
@endsection

@section('content')
	<!--Greetings & Welcome Start-->
	<section class="wt-haslayout">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12">
					<div class="wt-greeting-holder">
						<div class="row">
							<div class="col-12 col-sm-12 col-md-12 col-lg-7 float-left">
								<div class="wt-greetingcontent">
									<div class="wt-sectionhead">
										<div class="wt-sectiontitle">
											<h2>Greetings &amp; Welcome</h2>
											<span>Start Today For a Great Future</span>
										</div>

									</div>
									<div id="wt-statistics" class="wt-statistics">
										<div class="wt-statisticcontent wt-countercolor1">
											<h3 data-from="0" data-to="1500" data-speed="8000" data-refresh-interval="50">1500</h3>
											<em>k</em>
											<h4>Active Billaboards</h4>
										</div>
										<div class="wt-statisticcontent wt-countercolor2">
											<h3 data-from="0" data-to="99" data-speed="8000" data-refresh-interval="5.9">99%</h3>
											<em>%</em>
											<h4>Great Feedback</h4>
										</div>
										<div class="wt-statisticcontent wt-countercolor3">
											<h3 data-from="0" data-to="{{$vendorCount}}" data-speed="8000" data-refresh-interval="100">5000</h3>
											<em></em>
											<h4>Active Vendors</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-5 float-left">
								<div class="wt-greetingvideo">
									<figure>
										<a data-rel="prettyPhoto[video]" href="https://youtu.be/byTY67GfxnQ?si=hBUiEza9Hjate3ge"><img src="images/video-img.png" alt="video">
										</a>
									</figure>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Greetings & Welcome End-->

	<!--Our Team Start-->
	<section class="wt-haslayout">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="wt-ourteamhold wt-haslayout wt-bgwhite">
						<div id="filter-masonry" class="wt-teamfilter wt-haslayout">
							<div class="wt-sectionhead">
								<div class="wt-sectiontitle">
									<h2>Our Professionals</h2>
									<span>Team Behind The Curtain</span>
								</div>
							</div>
							<div class="wt-teamholder">
								<figure class="wt-speakerimg">
									<img src="images/team/img-03.jpg" alt="image description">
								</figure>
								<div class="wt-teamcontent">
									<div class="wt-title">
										<h2><a href="javascript:void(0);">Arslan Shafique </a></h2>
										<span>Software Analyst</span>
									</div>
									<ul class="wt-socialicons wt-socialiconssimple">
										<li class="wt-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="wt-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="wt-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="wt-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="wt-teamholder">
								<figure class="wt-speakerimg">
									<img src="images/team/img-01.jpg" alt="image description">
								</figure>
								<div class="wt-teamcontent">
									<div class="wt-title">
										<h2><a href="javascript:void(0);">Izza Arif</a></h2>
										<span>Project Manger</span>
									</div>
									<ul class="wt-socialicons wt-socialiconssimple">
										<li class="wt-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="wt-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="wt-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="wt-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="wt-teamholder">
								<figure class="wt-speakerimg">
									<img src="images/team/img-02.jpg" alt="image description">
								</figure>
								<div class="wt-teamcontent">
									<div class="wt-title">
										<h2><a href="javascript:void(0);">Noman Shahid</a></h2>
										<span>Scrum Master</span>
									</div>
									<ul class="wt-socialicons wt-socialiconssimple">
										<li class="wt-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="wt-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="wt-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="wt-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>
							{{-- <div class="wt-teamholder">
								<figure class="wt-speakerimg">
									<img src="images/team/img-04.jpg" alt="image description">
								</figure>
								<div class="wt-teamcontent">
									<div class="wt-title">
										<h2><a href="javascript:void(0);">Joseph Farner</a></h2>
										<span>VP Marketing</span>
									</div>
									<ul class="wt-socialicons wt-socialiconssimple">
										<li class="wt-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="wt-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="wt-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="wt-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="wt-teamholder">
								<figure class="wt-speakerimg">
									<img src="images/team/img-05.jpg" alt="image description">
								</figure>
								<div class="wt-teamcontent">
									<div class="wt-title">
										<h2><a href="javascript:void(0);">Rozella Hott</a></h2>
										<span>Marketing Director</span>
									</div>
									<ul class="wt-socialicons wt-socialiconssimple">
										<li class="wt-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="wt-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="wt-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="wt-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="wt-teamholder">
								<figure class="wt-speakerimg">
									<img src="images/team/img-06.jpg" alt="image description">
								</figure>
								<div class="wt-teamcontent">
									<div class="wt-title">
										<h2><a href="javascript:void(0);">Duane Villalta</a></h2>
										<span>Marketing Administrator</span>
									</div>
									<ul class="wt-socialicons wt-socialiconssimple">
										<li class="wt-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="wt-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="wt-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="wt-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="wt-teamholder">
								<figure class="wt-speakerimg">
									<img src="images/team/img-07.jpg" alt="image description">
								</figure>
								<div class="wt-teamcontent">
									<div class="wt-title">
										<h2><a href="javascript:void(0);">Johanne Deyoung</a></h2>
										<span>VP Marketing</span>
									</div>
									<ul class="wt-socialicons wt-socialiconssimple">
										<li class="wt-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="wt-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="wt-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="wt-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="wt-teamholder">
								<figure class="wt-speakerimg">
									<img src="images/team/img-08.jpg" alt="image description">
								</figure>
								<div class="wt-teamcontent">
									<div class="wt-title">
										<h2><a href="javascript:void(0);">Joseph Farner</a></h2>
										<span>Marketing Manager</span>
									</div>
									<ul class="wt-socialicons wt-socialiconssimple">
										<li class="wt-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="wt-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="wt-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="wt-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Our Team End-->
@endsection
