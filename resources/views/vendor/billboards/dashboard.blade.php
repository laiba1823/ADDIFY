@extends('vendor.layouts.parent')

@section('title', 'Billboards | Vendor')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <main class="page-content">
        <div class="container">

            {{-- Page Title --}}
            <div class="page-header">
                <h1 class="page-header__title">Billboards</h1>
            </div>

            {{-- Bread Crumbs --}}
            <div class="page-tools" style="justify-content: space-between;">
                <div class="page-tools__breadcrumbs">
                    <div class="breadcrumbs">
                        <div class="breadcrumbs__container">
                            <ol class="breadcrumbs__list">

                                <li class="breadcrumbs__item">
                                    <a class="breadcrumbs__link" href="{{ route('vendors.dashboard') }}">
                                        <svg class="icon-icon-home breadcrumbs__icon">
                                            <use xlink:href="#icon-home"></use>
                                        </svg>
                                        <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                                            <use xlink:href="#icon-keyboard-right"></use>
                                        </svg>
                                    </a>
                                </li>

                                <li class="breadcrumbs__item active">
                                    <a class="breadcrumbs__link" href="{{ route('vendors.billboards.index') }}">
                                        <span>BillBoards</span>
                                    </a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>

                <div class="toolbox__right col-12 col-lg-auto">
                    <div class="toolbox__right-row row row--xs flex-nowrap">
                        {{-- <div class="col col-lg-auto">
                            <form class="toolbox__search" method="GET">
                                <div class="input-group input-group--white input-group--prepend">
                                    <div class="input-group__prepend">
                                        <svg class="icon-icon-search">
                                            <use xlink:href="#icon-search"></use>
                                        </svg>
                                    </div>
                                    <input class="input" type="text" placeholder="Search Customer">
                                </div>
                            </form>
                        </div> --}}
                        <div class="col-auto">
                            <a href="{{ route("vendors.billboards.create") }} " class="button-add button-add--blue" data-modal="#">
                                <span class="button-add__icon">
                                    <svg class="icon-icon-plus">
                                        <use xlink:href="#icon-plus"></use>
                                    </svg>
                                </span>
                                <span class="button-add__text"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @if (Session::has('success'))
                <div class="alert alert-success some-space-upNdown" role="alert">
                    <center style="">
                        {{ session("success") }}
                        <br>
                    </center> 
                </div>
            @endif

            @if (Session::has('fail'))
                <div class="alert alert-danger some-space-upNdown" role="alert">
                    <center style="">
                        {{ session("fail") }}
                        <br>
                    </center> 
                </div>
            @endif
            <div id="alertBox">

            </div>

            <div class="cart card">
                <div class="card__wrapper">
                    <div class="card__body">
                        <div class="cart__header">
                            <div class="cart__header-title">BillBoard Info</div>
                            <div class="cart__header-title text-center">Status</div>
                            <div class="cart__header-title text-center">Price</div>
                            <div class="cart__header-title"></div>
                        </div>
                        <div class="cart__items">
                            @foreach ($billboards as $index => $billboard)
                                <div class="product-cart" data-gig-id="{{ $billboard->id }}">
                                    <div class="product-cart__column product-cart__column--item-1">
                                        <div class="product-cart__item">
                                            <img src="{{ asset('storage/' . $billboard->images[0]) }}" alt="#">
                                            <ul class="product-cart__params">
                                                <li><b>{{ $billboard->title }}</b></li>
                                                {{-- <li>Gig UUID: {{ $gig->uuid }}</li> --}}
                                                <li>Location: {{ $billboard->category->name }}</li>
                                                <li>
                                                    <span class="label label--primary" id="statusLabel-{{ $loop->index }}">
                                                        {{ $billboard->status }}
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-cart__column">
                                        <div class="product-cart__quantity input-group input-group--white">
                                            <div class="input-group">
                                                <label class="checkbox-toggle {{ $billboard->status == 'active' ? 'is-active' : '' }}" 
                                                    for="checkbox-status-toggle-{{ $loop->index }}"
                                                    onclick="toggleCheckboxStatus('{{ $billboard->id }}', 'checkbox-status-toggle-{{ $loop->index }}', 'statusLabel-{{ $loop->index }}')">
                                                    <input type="checkbox" class="checkbox-toggle is-active" id="checkbox-status-toggle-{{ $loop->index }}"
                                                        {{ $billboard->status == 'active' ? 'checked' : '' }}
                                                    >
                                                    <span class="checkbox-toggle__range"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-cart__column">
                                        <div class="product-cart__price">${{ $billboard->price }}</div>
                                    </div>
                                    <div class="product-cart__column">
                                        <button class="product-cart__remove" >
                                            <a href="{{ route('public.billboard.show', ['id'=> $billboard->id]) }}" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>
                                            </a>
                                        </button>
                                        <a href="{{ route('vendors.billboards.edit', ['billboard' => $billboard->id]) }}" class="product-cart__remove" >
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg>
                                        </a>
                                        <button class="product-cart__remove" onclick="deleteGig(event)">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <script>
        function toggleCheckboxStatus(gigId, checkboxId, labelId) {
            var checkbox = document.getElementById(checkboxId);
            var statusLabel = document.getElementById(labelId);
            
            checkbox.checked = !checkbox.checked;
            statusLabel.textContent = checkbox.checked ? 'active' : 'disabled';

            // Use axios or another method to update the gig status in the database
            axios.put(`/vendors/billboards/${gigId}/update-status`, { status: checkbox.checked ? 'active' : 'disabled' })
            .then(response => {
                    console.log(response.data.message);
                })
                .catch(error => {
                    console.error('Error updating billboard status:', error);
            });
        }

        function deleteGig(event) {
            event.preventDefault();

            const gigId = event.currentTarget.closest('.product-cart').dataset.gigId;

            axios.delete(`/vendors/billboards/${gigId}`)
            .then(response => {
                showAlert('success', response.data.message);
                // Optionally, you can remove the deleted gig from the UI
                event.target.closest('.product-cart').remove();
            })
            .catch(error => {
                console.error('Error deleting Billboard:', error);
                showAlert('fail', 'Error deleting billboard. Please try again.');
            });
        }

        function showAlert(type, message) {
            // Set the alert type based on the parameter
            const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';

            // Create and append the alert element
            const alertElement = document.createElement('div');
            alertElement.classList.add('alert', alertClass, 'some-space-upNdown');
            alertElement.setAttribute('role', 'alert');
            alertElement.innerHTML = `
                <center style="">
                    ${message}
                    <br>
                </center>
            `;
            document.querySelector("#alertBox").appendChild(alertElement);

            // Set a timeout to remove the alert after 1.5 seconds
            setTimeout(function () {
                alertElement.remove();
            }, 2000);
        }
    </script>

@endsection
