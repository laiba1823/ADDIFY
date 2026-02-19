@extends('public.layouts.parent')

@section('title', "Order | Buyer")

@section('banner')
    <!--Inner Home Banner Start-->
    <div class="wt-haslayout wt-innerbannerholder">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                    <div class="wt-innerbannercontent">
                    <div class="wt-title"><h2>Place Order</h2></div>
                    <ol class="wt-breadcrumb">
                        <li><a href="{{ route("public.home") }}">Home</a></li>
                        <li><a href="{{ route("public.search") }}">BillBoard</a></li>
                        <li class="wt-active">Order</li>
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
        <div class="wt-haslayout wt-main-section">
            <!-- User Listing Start-->
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 push-lg-2">
                        <div class="wt-jobalertsholder">
                            <ul class="wt-jobalerts">
                                {{-- <li class="alert alert-warning alert-dismissible fade show">
                                    <span><em>Alert:</em> You’ve consumed all you points to apply new job,</span>
                                    <a href="javascript:void(0)" class="wt-alertbtn warning">Buy Now</a>
                                    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></a>
                                </li>
                                <li class="alert alert-primary alert-dismissible fade show">
                                    <span><em>info: </em> You’ve no skills of “PHP” but still you can apply for this job.</span>
                                    <a href="javascript:void(0)" class="wt-alertbtn primary">View</a>
                                    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></a>
                                </li> --}}

                                {{-- <li class="alert alert-danger alert-dismissible fade show">
                                    <span><em>You’re Late:</em> We’re sorry but the job you want to apply is no longer available You’re Late:  for public/vendors anymore.</span>
                                    <a href="javascript:void(0)" class="wt-alertbtn danger">Got It</a>
                                    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></a>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="wt-proposalholder">
                            <span class="wt-featuredtag"><img src="{{asset("images/featured.png")}}" alt="img description" data-tipso="Plus Member" class="template-content tipso_style"></span>
                            <div class="wt-proposalhead">
                                <h2>{{ $billboard->title }}</h2>
                                <ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo">
                                    <li>
                                        <span>
                                            {{-- <i class="fa fa-dollar-sign"></i>
                                            <i class="fa fa-dollar-sign"></i> --}}
                                            {{ $billboard->last_bid == null ? "Starting Price: " : "Last Bid: "}}
                                            <i class="fa fa-dollar-sign"></i> 
                                            {{ $billboard->last_bid == null ? $billboard->price : $billboard->last_bid}}
                                        </span>
                                    </li>
                                    {{-- <li>
                                        <span>
                                            <img src="{{ asset("images/flag/img-02.png") }}" alt="img description">  
                                            United States
                                        </span>
                                    </li> --}}
                                    <li><span><i class="far fa-folder"></i> Location: {{ $billboard->category->name }}</span></li>
                                    {{-- <li><span><i class="far fa-clock"></i> Duration: 15 Days</span></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="wt-proposalamount-holder">
                            <div class="wt-title">
                                <h2>BillBoard Price</h2>
                            </div>
                            <style>
                                .form-control:focus{
                                    border-color: unset;
                                }
                            </style>
                            <div class="wt-proposalamount accordion">
                                <div class="form-group">
                                    <span>( <i class="fa fa-dollar-sign"></i> )</span>
                                    <input type="number" name="amount" class="form-control" id="amountInput" form="orderForm" value="{{ $billboard->last_bid == null ? $billboard->price : $billboard->last_bid }}" required>
                                    <a href="javascript:void(0);" class="collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="lnr lnr-chevron-up"></i></a>

                                    <em>Total amount you will be paying to Vendor.</em>
                                    <em id="errorMessage" style="display: none; color: #ff5851;">You need to enter a value greater than the last bid.</em>

                                    {{-- <input type="number" name="amount" class="form-control" style="border-color:unset;" value="{{ $billboard->price }}" > --}}
                                    {{-- <em>Total amount you will be paying to Vendor.</em> --}}
                                </div>
                                <ul class="wt-totalamount collapse show" id="collapseOne" aria-labelledby="headingOne">
                                    <li>
                                        <h3>( <i class="fa fa-dollar-sign"></i> ) <em>- 4% </em></h3>
                                        <span><strong>“ Addify's ”</strong> Service Fee<i class="fa fa-exclamation-circle template-content tipso_style" data-tipso="Platform's fees"></i></span>
                                    </li>
                                    {{-- <li>
                                        <h3>( <i class="fa fa-dollar-sign"></i> ) <em>- 00.00</em></h3>
                                        <span>Amount You’ll Recive after <strong>“ Worktern ”</strong> Service Fee deduction<i class="fa fa-exclamation-circle template-content tipso_style" data-tipso="Plus Member"></i></span>
                                    </li> --}}
                                </ul>
                            </div>

                            <form class="wt-formtheme wt-formproposal" method="POST" action="{{ route("orders.store") }}" id="orderForm">
                                @csrf
                                <input type="hidden" name="billboard_id" value="{{ $billboard->id }}">
                                <input type="hidden" name="vendor_id" value="{{ $billboard->vendor->id }}">
                                <input type="hidden" name="buyer_id" value="{{ request()->buyer->id }}">
                                {{-- <input type="hidden" name="amount" value="{{ $billboard->price }}"> --}}

                                <fieldset>
                                    <div class="form-group">
                                        <span class="wt-select">
                                            <select name="time" required>
                                                <option value="" style="display: none;">Select Time</option>
                                                <option value="1">I Want This Order Finished In: 01 Months</option>
                                                <option value="2">I Want This Order Finished In: 02 Months</option>
                                                <option value="3">I Want This Order Finished In: 03 Months</option>
                                                <option value="4">I Want This Order Finished In: 04 Months</option>
                                            </select>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="description" required placeholder="Add Description*"></textarea>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="wt-attachments wt-attachmentsvtwo">
                                        <div class="wt-btnarea">
                                            <button type="submit" form="orderForm" class="wt-btn">Place Bid</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Listing End-->
        </div>
    </main>
    <!--Main End-->

    <script>
        const amountInput = document.getElementById('amountInput');
        const errorMessage = document.getElementById('errorMessage');
        const minPrice = {{ $billboard->last_bid == null ? $billboard->price : $billboard->last_bid }}; // Get the price from PHP

        amountInput.addEventListener('input', function() {
            const enteredAmount = parseFloat(amountInput.value);

            if (enteredAmount < minPrice) {
                amountInput.style.borderColor = '#ff5851';
                errorMessage.style.display = 'block';
            } else {
                amountInput.style.borderColor = ''; // Reset border color
                errorMessage.style.display = 'none';
            }
        });

        // Prevent form submission if the value is less than the minimum price
        const form = document.querySelector('#orderForm'); // Replace 'form' with the actual selector if needed
        form.addEventListener('submit', function(event) {
            if (amountInput.value < minPrice) {
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>

    
@endsection
