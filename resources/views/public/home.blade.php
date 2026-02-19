@extends('public.layouts.parent')

@section('title', "Addify-The billboard marketplace")

@section('banner')
	<div class="wt-haslayout wt-bannerholder">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-5">
					<div class="wt-bannerimages">
						<figure class="wt-bannermanimg" data-tilt>
							<img src="images/bannerimg/img-01.png" alt="img description">
							<img src="images/bannerimg/img-02.png" class="wt-bannermanimgone" alt="img description">
							<img src="images/bannerimg/img-03.png" class="wt-bannermanimgtwo" alt="img description">
						</figure>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
					<div class="wt-bannercontent">
						<div class="wt-bannerhead">
							<div class="wt-title">
								<h1><span>Find the right place</span> for your ad, Online</h1>
							</div>
							<div class="wt-description">
								<p>Addify connects businesses with perfect place for marketing in 10+ locations.</p>
							</div>
						</div>
						<form action="{{route("public.search")}}" class="wt-formtheme wt-formbanner">
							<fieldset>
								<div class="form-group">
									<input type="text" name="query" class="form-control" placeholder="Search for your billboard..." required>
									<div class="wt-formoptions">
										{{-- <div class="wt-dropdown">
											<span>In: <em class="selected-search-type">Vendors </em><i class="lnr lnr-chevron-down"></i></span>
										</div>
										<div class="wt-radioholder">
											<span class="wt-radio">
												<input id="wt-vendors" data-title="Vendors" type="radio" name="searchtype" value="freelancer" checked>
												<label for="wt-vendors">Vendors</label>
											</span>
											<span class="wt-radio">
												<input id="wt-jobs"  data-title="Jobs" type="radio" name="searchtype" value="job">
												<label for="wt-jobs">Jobs</label>
											</span>
											<span class="wt-radio">
												<input id="wt-buyer"  data-title="Buyers" type="radio" name="searchtype" value="job">
												<label for="wbuyer">BUyers</label>
											</span>
										</div> --}}
										<button type="submit" class="wt-searchbtn">
											<i class="lnr lnr-magnifier"></i>
										</button>
									</div>
								</div>
							</fieldset>
						</form>
						<div class="wt-videoholder">
							<div class="wt-videoshow">
								<a data-rel="prettyPhoto[video]" href="https://youtu.be/byTY67GfxnQ?si=hBUiEza9Hjate3ge"><i class="fa fa-play"></i></a>
							</div>
							<div class="wt-videocontent">
								<span>See For Yourself!<em>How it works </em></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<main id="wt-main" class="wt-main wt-haslayout">

		<!--Categories Start-->
			<section class="wt-haslayout wt-main-section">
				<div class="container">
					<div class="row justify-content-md-center">
						<div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
							<div class="wt-sectionhead wt-textcenter">
								<div class="wt-sectiontitle">
									<h2>Explore Locations</h2>
									<span>Billboards by Location</span>
								</div>
							</div>
						</div>
						<div class="wt-categoryexpl">
					@foreach($categories->take(8) as $category)
						<div class="col-12 col-sm-12 col-md-3 col-lg-3 float-left">
								<div class="wt-categorycontent">
								<figure><img src="images/categories/img-0{{ $loop->iteration }}.png" alt="image description"></figure>
								<div class="wt-cattitle">
									<h3><a href="{{ route('public.search', ['category' => $category->id]) }}">{{ $category->name }}</a></h3>
								</div>
								<div class="wt-categoryslidup">
									<p>{{ $category->description }}</p>
									<a href="{{ route('public.search', ['category' => $category->id]) }}">Explore <i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
							@endforeach
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
								{{-- <div class="wt-btnarea">
									<a href="javascript:void(0)" class="wt-btn">View All</a>
								</div> --}}
							</div>
						</div>
					</div>
				</div>
			</section>
		<!--Categories End-->

		<!--Join Company Info Start-->
			<section class="wt-haslayout wt-main-section wt-paddingnull wt-companyinfohold">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12">
							<div class="wt-companydetails">
								<div class="wt-companycontent">
									<div class="wt-companyinfotitle">
										<h2>Start As Buyer</h2>
									</div>
									<div class="wt-description">
										<p>Empower your business with Addify. Access a diverse options of billboards and elevate your products to new heights!</p>
									</div>
									<div class="wt-btnarea">
										<a href="{{ route("buyers.create") }}" class="wt-btn">Join Now</a>
									</div>
								</div>
								<div class="wt-companycontent">
									<div class="wt-companyinfotitle">
										<h2>Start As Vendor</h2>
									</div>
									<div class="wt-description">
										<p>Join Addify: Unleash your businesses potential! Connect with oppurtunity, showcase your product, and thrive in a dynamic professional ecosystem.</p>
									</div>
									<div class="wt-btnarea">
										<a href="{{ route("vendors.create") }}" class="wt-btn">Join Now</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		<!--Join Company Info End-->

	</main>
@endsection
