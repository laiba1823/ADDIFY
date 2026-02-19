
<header id="wt-header" class="wt-header wt-haslayout">
    <div class="wt-navigationarea">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="wt-logo" style="border-right: 1px solid #ddd;">
                        <a href="{{ route("public.home") }}"><img src="{{asset("img/content/logo-dark.svg")}}" alt="buyer logo here"></a>
                        {{-- <a href="{{ route("public.home") }}"><img src="img/content/favicons/favicon-64x64.png" alt="buyer logo here"></a> --}}
                    </strong>

                    <form class="wt-formtheme wt-formbanner wt-formbannervtwo" style="width: 35%" action="{{ route("public.search") }}">
                        <fieldset>
                            <div class="form-group">
                                
                                <style>
                                    .search-suggestions{
                                        right: 0;
                                        left: auto;
                                        width: 571.547px;
                                    }
                                </style>
                                {{-- Orignal --}}
                                {{-- <input type="text" name="query" class="form-control wt-dropdown" style="width: inherit" placeholder="Search">
                                <div class="wt-formoptions">

                                    <div class="wt-radioholder search-suggestions" >
                                        <span class="wt-radio" >
                                            <input id="wt-freelancers" data-title="Freelancers" type="radio" name="searchtype" value="freelancer" >
                                            <label for="wt-freelancers">Freelancers</label>
                                        </span>
                                        <span class="wt-radio">
                                            <input id="wt-jobs" data-title="Jobs" type="radio" name="searchtype" value="job">
                                            <label for="wt-jobs">Jobs</label>
                                        </span>
                                        <span class="wt-radio">
                                            <input id="wt-companies" data-title="Companies" type="radio" name="searchtype" value="job">
                                            <label for="wt-companies">Companies</label>
                                        </span>
                                    </div>
                                    <button type="submit" class="wt-searchbtn"><i class="lnr lnr-magnifier"></i></button>
                                </div> --}}

                                <input type="text" name="query" id="query" class="form-control wt-dropdown" style="width: inherit; padding-right:70px" placeholder="Search">
                                <div class="wt-formoptions" >

                                    <div class="wt-radioholder search-suggestions" >
                                        {{-- <span class="wt-radio" >
                                            <input id="wt-freelancers" data-title="Freelancers" type="radio" name="searchtype" value="freelancer" >
                                            <label for="wt-freelancers">Freelancers</label>
                                        </span>
                                        <span class="wt-radio">
                                            <input id="wt-jobs" data-title="Jobs" type="radio" name="searchtype" value="job">
                                            <label for="wt-jobs">Jobs</label>
                                        </span>
                                        <span class="wt-radio">
                                            <input id="wt-companies" data-title="Companies" type="radio" name="searchtype" value="job">
                                            <label for="wt-companies">Companies</label>
                                        </span> --}}
                                    </div>  
                                    <button type="submit" class="wt-searchbtn"><i class="lnr lnr-magnifier"></i></button>
                                </div>

                                
                            </div>
                        </fieldset>
                    </form>

                    <div class="wt-rightarea">
                        <nav id="wt-nav" class="wt-nav navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="lnr lnr-menu"></i>
                            </button>
                            <div class="collapse navbar-collapse wt-navigation" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a href="{{ route("public.home") }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route("public.team") }}">Team</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="{{ route("public.search") }}">Billboards</a>
                                    </li>

                                    <li class="menu-item-has-children page_item_has_children">
                                        <a href="">Locations</a>
                                        <ul class="sub-menu" style="max-height: 85vh;overflow: auto;">
                                            {{-- <li class="menu-item-has-children page_item_has_children wt-notificationicon"><span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                                                <a href="javascript:void(0);">Home</a>
                                                <ul class="sub-menu">
                                                    <li><a href="index-2.html">Home v1</a></li>
                                                    <li class="wt-newnoti"><a href="indexvtwo.html">Home v2<em>without login</em></a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children page_item_has_children"><span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                                                <a href="javascript:void(0);">Article</a>
                                                <ul class="sub-menu">
                                                    <li><a href="articlelist.html">Article List</a></li>
                                                    <li><a href="articlegrid.html">Article Grid</a></li>
                                                    <li><a href="articlesingle.html">Article Single</a></li>
                                                    <li><a href="articleclassic.html">Article Classic</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children page_item_has_children"><span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                                                <a href="javascript:void(0);">Buyer</a>
                                                <ul class="sub-menu">
                                                    <li><a href="buyergrid.html">Buyer Grid</a></li>
                                                    <li><a href="buyersigle.html">Buyer Sigle</a></li>
                                                </ul>
                                            </li> --}}
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a href="{{ route('public.search', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    {{-- <li class="menu-item-has-children page_item_has_children">
                                        <a href="javascript:void(0);">Browse Jobs</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="joblisting.html">Job Listing</a>
                                            </li>
                                            <li class="current-menu-item">
                                                <a href="jobsingle.html">Job Single</a>
                                            </li>
                                            <li>
                                                <a href="jobproposal.html">Job Proposal</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children page_item_has_children">
                                        <a href="javascript:void(0);">View Freelancers</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="userlisting.html">User Listing</a>
                                            </li>
                                            <li class="current-menu-item">
                                                <a href="usersingle.html">User Single</a>
                                            </li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </div>
                        </nav>

                        @if (session()->has("LoggedBuyer"))
                            <div class="wt-userlogedin" style="display: block">
                                <figure class="wt-userimg">
                                    <img src="{{request()->buyer->img}}" alt="image description">
                                </figure>
                                <div class="wt-username">
                                    <h3>{{request()->buyer->name}}</h3>
                                    <span>{{request()->buyer->name}} Tech</span>
                                </div>
                                <nav class="wt-usernav">
                                    <ul>
                                        {{-- <li class="menu-item-has-children page_item_has_children">
                                            <a href="javascript:void(0);">
                                                <span>Insights</span>
                                            </a>
                                            <ul class="sub-menu children">
                                                <li><a href="dashboard-insights.html">Insights</a></li>
                                                <li><a href="dashboard-insightsuser.html">Insights User</a></li>
                                            </ul>
                                        </li> --}}
                                        <li>
                                            <a href="{{ route("buyers.dashboard") }}">
                                                <span>Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route("buyers.profile") }}">
                                                <span>My Profile</span>
                                            </a>
                                        </li>
                                        {{-- <li class="menu-item-has-children">
                                            <a href="javascript:void(0);">
                                                <span>All Jobs</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li><a href="dashboard-completejobs.html">Completed Jobs</a></li>
                                                <li><a href="dashboard-canceljobs.html">Cancelled Jobs</a></li>
                                                <li><a href="dashboard-ongoingjob.html">Ongoing Jobs</a></li>
                                                <li><a href="dashboard-ongoingsingle.html">Ongoing Single</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="dashboard-managejobs.html">
                                                <span>Manage Jobs</span>
                                            </a>
                                        </li>
                                        <li class="wt-notificationicon menu-item-has-children">
                                            <a href="javascript:void(0);">
                                                <span>Messages</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li><a href="dashboard-messages.html">Messages</a></li>
                                                <li><a href="dashboard-messages2.html">Messages V 2</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="dashboard-saveitems.html">
                                                <span>My Saved Items</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="dashboard-invocies.html">
                                                <span>Invoices</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="dashboard-category.html">
                                                <span>Category</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="dashboard-packages.html">
                                                <span>Packages</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="dashboard-proposals.html">
                                                <span>Proposals</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="dashboard-accountsettings.html">
                                                <span>Account Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="dashboard-helpsupport.html">
                                                <span>Help &amp; Support</span>
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a href="{{ route("buyers.logout") }}">
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                
                            </div>
                        @else
                            <div class="wt-loginarea">
                                {{-- <figure class="wt-userimg">
                                    <img src="{{asset("images/user-login.png")}}" alt="img description">
                                </figure> --}}
                                {{-- <div class="wt-loginoption">
                                    <a href="{{ route("vendors.login") }}" id="wt-loginbtn" class="wt-loginbtn">Vendor Login</a>
                                    <div class="wt-loginformhold">
                                        <form class="wt-formtheme wt-loginform do-forgot-password-form wt-hide-form">
                                            <fieldset>
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control get_password" placeholder="Email">
                                                </div>
                                            
                                                <div class="wt-logininfo">
                                                    <a href="javascript:;" class="wt-btn do-get-password">Get Pasword</a>
                                                </div>     
                                            </fieldset>
                                            <div class="wt-loginfooterinfo">
                                                <a href="javascript:void(0);" class="wt-show-login">Login</a>
                                                <a href="register.html">Create account</a>
                                            </div>
                                        </form>
                                    </div>
                                </div> --}}
                                <a href="{{ route("vendors.login") }}" class="wt-btn">Vendor Login</a>
                                <a href="{{ route("buyers.login") }}" class="wt-btn">Buyer Login</a>
                                {{-- <a href="register.html" classs="wt-btn">Join Now</a> --}}
                            </div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.getElementById('query').addEventListener('input', function() {
        var query = this.value.trim();
        if (query.length > 0) {
            // Make an AJAX request to your Laravel backend
            fetchSearchSuggestions(query);
        } else {
            // Clear the search suggestions box if the query is empty
            document.querySelector('.search-suggestions').innerHTML = '';
        }
    });

    function fetchSearchSuggestions(query) {
        // Make an AJAX request to your Laravel backend
        fetch('{{route("public.search.suggestions")}}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ query: query })
        })
        .then(response => response.json())
        .then(data => {
            // Populate the search suggestions box with the returned suggestions
            var suggestionsHTML = data.map(item => 

            `
            
            <span class="wt-radio">
                <input id="wt-${item.id}" data-title="${item.title}" type="radio" name="searchtype" value="${item.title}">
                <label for="wt-${item.id}">${item.title}</label>
            </span>
            
            `).join('');
            document.querySelector('.search-suggestions').innerHTML = suggestionsHTML;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    document.querySelector('.search-suggestions').addEventListener('click', function(event) {
        // Check if the clicked element is an input element
        if (event.target.tagName === 'INPUT') {
            // Get the title of the clicked suggestion
            var title = event.target.getAttribute('data-title');
            
            // Update the value of the search box with the title of the clicked suggestion
            document.getElementById('query').value = title;
        }
    });
</script>
