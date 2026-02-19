@extends('public.layouts.parent')

@section('title', "Billboard | CAN")

@section('banner')
	<!--Inner Home Banner Start-->
	<div class="wt-haslayout wt-innerbannerholder">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
					<div class="wt-innerbannercontent">
					<div class="wt-title"><h2>Billboards</h2></div>
					<ol class="wt-breadcrumb">
						<li><a href="{{route("public.home")}}">Home</a></li>
						{{-- @if(session()->has('url.previous'))
							<li><a href="{{ session('url.previous') }}">Billboards</a></li>
						@endif --}}
						<li class="wt-active"><a href="{{request()->url()}}"></a> Billboard</li>
					</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Inner Home End-->

@endsection

@section('content')
	<!--Main Start-->
	<main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
		<div class="wt-haslayout wt-main-section" style="padding: 0px 0;">
			<!-- User Listing Start-->
			<div class="container">
				<div class="row">
					<div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
						
						{{-- <div class="col-12"">
							<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
								<div class="carousel-indicators">
									<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
									<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
									<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
								</div>
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img src="" class="d-block w-100" alt="Slide 1">
									</div>
									<div class="carousel-item">
										<img src="storage/{{"storage/".asset($gig->images[1])}}" class="d-block w-100" alt="Slide 2">
									</div>
									<div class="carousel-item">
										<img src="storage/{{"storage/".asset($gig->images[2])}}" class="d-block w-100" alt="Slide 3">
									</div>
								</div>
								<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</button>
								<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</button>
							</div>
						</div> --}}

						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel"  style="margin-bottom: 20px;">
							<div class="carousel-inner">
								
								@foreach ($billboard->images as $image)
									<div class="carousel-item {{ $loop->index == 0 ? "active" : ""}} ">
										<img src="{{asset("storage/".$image)}}" class="d-block w-100" alt="Slide {{$loop->index}}">
									</div>
								@endforeach
							</div>
							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							  <span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							  <span class="carousel-control-next-icon" aria-hidden="true"></span>
							  <span class="sr-only">Next</span>
							</a>
						</div>

						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-left">
							<div class="wt-proposalholder">
								<span class="wt-featuredtag"><img src="{{asset("images/featured.png")}}" alt="img description" data-tipso="Plus Member" class="template-content tipso_style"></span>
								<div class="wt-proposalhead">
									<h2>{{ $billboard->title }}</h2>
									<ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo">
										<li>
											<span>
												{{ $billboard->last_bid == null ? "Starting Price: " : "Last Bid: "}}
												{{-- <i class="fa fa-dollar-sign"></i>
												<i class="fa fa-dollar-sign"></i> --}}
												<i class="fa fa-dollar-sign"></i> 
												{{ $billboard->last_bid == null ? $billboard->price : $billboard->last_bid}}
											</span>
										</li>
										{{-- <li><span><img src="{{asset("images/flag/img-02.png")}}" alt="img description">  United States</span></li> --}}
										<li><span><i class="far fa-folder"></i> Location: {{ $billboard->category->name }}</span></li>
										{{-- <li><span><i class="far fa-clock"></i> Duration: 15 Days</span></li> --}}
									</ul>
								</div>
								<div class="wt-btnarea"><a href="{{ route("orders.create", ["billboardId"=> $billboard->id]) }}"  class="wt-btn" {{$billboard->status == "active" ? "disabled" : "" }} >Place Bid</a></div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
							<div class="wt-projectdetail-holder">
								<div class="wt-projectdetail">
									<div class="wt-title">
										<h3>Billboards Description</h3>
									</div>
									<div class="wt-description">
										{!! $billboard->description !!}
									</div>
								</div>
								{{-- <div class="wt-skillsrequired">
									<div class="wt-title">
										<h3>Skills</h3>
									</div>
									<div class="wt-tag wt-widgettag">
										<a href="javascript:void(0);">PHP Developer</a>
										<a href="javascript:void(0);">PHP</a>
										<a href="javascript:void(0);">My SQL</a>
										<a href="javascript:void(0);">Business</a>
										<a href="javascript:void(0);">Website Development</a>
										<a href="javascript:void(0);">Collaboration</a>
										<a href="javascript:void(0);">Decent</a>
									</div>
								</div> --}}
								{{-- <div class="wt-attachments">
									<div class="wt-title">
										<h3>Attachments</h3>
									</div>
									<ul class="wt-attachfile">
										<li>
											<span>Wireframe Document.doc</span>
											<em>File size: 512 kb<a href="javascript:void(0);"><i class="lnr lnr-download"></i></a></em>
										</li>
										<li>
											<span>Requirments.pdf</span>
											<em>File size: 110 kb<a href="javascript:void(0);"><i class="lnr lnr-download"></i></a></em>
										</li>
										<li>
											<span>Company Intro.docx</span>
											<em>File size: 224 kb<a href="javascript:void(0);"><i class="lnr lnr-download"></i></a></em>
										</li>
									</ul>
								</div> --}}
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
							<aside id="wt-sidebar" class="wt-sidebar">
								{{-- <div class="wt-proposalsr">
									<div class="wt-proposalsrcontent">
										<span class="wt-proposalsicon"><i class="fa fa-angle-double-down"></i><i class="fa fa-newspaper"></i></span>
										<div class="wt-title">
											<h3>150</h3>
											<span>Proposals Received Till<em>June 27, 2018</em></span>
										</div>
									</div>
									<div class="tg-authorcodescan">
										<figure class="tg-qrcodeimg">
											<img src="images/qrcode.png" alt="img description">
										</figure>
										<div class="tg-qrcodedetail">
											<span class="lnr lnr-laptop-phone"></span>
											<div class="tg-qrcodefeat">
												<h3>Scan with your <span>Smart Phone </span> To Get It Handy.</h3>
											</div>
										</div>
									</div>
									<div class="wt-clicksavearea">
										<span>Job ID: tQu5DW9F2G</span>
										<a href="javascrip:void(0);" class="wt-clicksavebtn"><i class="far fa-heart"></i> Click to save</a>
									</div>
								</div> --}}
								<div class="wt-widget wt-buyersinfo-jobsingle">
									<div class="wt-buyersdetails">
										<figure class="wt-companysimg">
											<img src="{{asset("images/bannerimg/img-02.jpg")}}" alt="img description">
										</figure>
										<div class="wt-buyersinfo">
											<figure><img src="{{asset($billboard->vendor->img)}}" alt="img description"></figure>
											<div class="wt-title">
												<a href="javascript:void(0);"><i class="fa fa-check-circle"></i> Verified Vendor</a>
												<h2>{{ $billboard->vendor->name }}</h2>
											</div>
											<ul class="wt-postarticlemeta">
												<li>
													<a >
														<span>{{$billboard->status == "active" ? "Open Billboard" : "Closed Billboard" }}</span>
													</a>
												</li>
												<li>
													<a href="{{ route('public.vendor.show', ['id' => $billboard->vendor->id]) }}">
														<span>Profile</span>
													</a>
												</li>
												{{-- <li class="wt-following">
													<a href="javascript:void(0);">
														<span>Following</span>
													</a>
												</li> --}}
											</ul>
										</div>
									</div>
								</div>
								{{-- <div class="wt-widget wt-sharejob">
									<div class="wt-widgettitle">
										<h2>Share This Job</h2>
									</div>
									<div class="wt-widgetcontent">
										<ul class="wt-socialiconssimple">
											<li class="wt-facebook"><a href="javascript:void(0);"><i class="fab fa-facebook-f"></i>Share on Facebook</a></li>
											<li class="wt-twitter"><a href="javascript:void(0);"><i class="fab fa-twitter"></i>Share on Twitter</a></li>
											<li class="wt-linkedin"><a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i>Share on Linkedin</a></li>
											<li class="wt-googleplus"><a href="javascript:void(0);"><i class="fab fa-google-plus-g"></i>Share on Google Plus</a></li>
										</ul>
									</div>
								</div> --}}
								{{-- <div class="wt-widget wt-reportjob">
									<div class="wt-widgettitle">
										<h2>Report This Job</h2>
									</div>
									<div class="wt-widgetcontent">
										<form class="wt-formtheme wt-formreport">
											<fieldset>
												<div class="form-group">
													<span class="wt-select">
														<select>
															<option value="Reason">Select Reason</option>
															<option value="Reason1">Reason 1</option>
															<option value="Reason2">Reason 2</option>
														</select>
													</span>
												</div>
												<div class="form-group">
													<textarea class="form-control" placeholder="Description"></textarea>
												</div>
												<div class="form-group wt-btnarea">
													<a href="javascrip:void(0);" class="wt-btn">Submit</a>
												</div>
											</fieldset>
										</form>
									</div>
								</div> --}}
							</aside>
						</div>
					</div>
				</div>
			</div>
			<!-- User Listing End-->
		</div>
	</main>
	<!--Main End-->
	<script>
		function placeOrder(billboardId) {
			window.location.href = `order/place/${billboardId}`;
		}
	</script>
@endsection
