@extends('admin.layouts.parent')

@section('title', 'Deposit Money | Admin')

@section('content')

    <main class="page-content">
        <div class="container">

            {{-- Page Title --}}
            <div class="page-header">
                <h1 class="page-header__title">Deposit Money</h1>
            </div>

            {{-- Bread Crumbs --}}
            <div class="page-tools">
                <div class="page-tools__breadcrumbs">
                    <div class="breadcrumbs">
                        <div class="breadcrumbs__container">
                            <ol class="breadcrumbs__list">

                                <li class="breadcrumbs__item">
                                    <a class="breadcrumbs__link" href="{{ route("admin.dashboard") }}">
                                        <svg class="icon-icon-home breadcrumbs__icon">
                                            <use xlink:href="#icon-home"></use>
                                        </svg>
                                        <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                                            <use xlink:href="#icon-keyboard-right"></use>
                                        </svg>
                                    </a>
                                </li>

                                <li class="breadcrumbs__item ">
                                    <a class="breadcrumbs__link" href="{{ route("admin.finances.index") }}">
                                        <span>Finances</span>
                                    </a>
                                    <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                                        <use xlink:href="#icon-keyboard-right"></use>
                                    </svg>
                                </a>
                                <li class="breadcrumbs__item active">
                                    <a class="breadcrumbs__link" href="{{ route("admin.finances.deposit") }}">
                                        <span>Deposit</span>
                                    </a>
                                </a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>

            </div>

            <div class="customer-account__item-3 customer-payment customer-card card">
                <div class="card__wrapper">
                    <div class="card__container">
                        <div class="card__header">
                            <div class="card__header-left">
                                {{-- <h3 class="card__header-title">Payment methods</h3> --}}
                            </div>
                            <div class="customer-card__header-right">
                                {{-- <button class="customer-card__btn-task" data-dismiss="modal" data-modal="#editCardInfo">
                                    <svg class="icon-icon-task">
                                        <use xlink:href="#icon-task"></use>
                                    </svg>
                                </button> --}}
                            </div>
                        </div>
                        <div class="card__body">
                            <div class="card__credit-card">
                                <div class="credit-card">
                                    <img class="credit-card__image"
                                        src="{{ asset('img/content/credit-card%403x.png') }}" alt="#">
                                    <div class="credit-card__content">
                                        <input class="credit-card__number" type="text" value="{{$bankAccount->card_number}}" readonly="readonly">
                                        <div class="credit-card__name">{{$bankAccount->card_holder}}</div>
                                        <div class="credit-card__date">{{$bankAccount->card_expiry}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card__footer">
                            <div class="card__container">
                                <div class="card__credit-list">
                                    <ul class="card-list">

                                        <li class="card-list__item">
                                            <div class="card-list__title">Card Holder</div>
                                            <div class="card-list__value">{{$bankAccount->card_holder}}</div>
                                        </li>
                                        <li class="card-list__item">
                                            <div class="card-list__title">Expire</div>
                                            <div class="card-list__value">{{$bankAccount->card_expiry}}</div>
                                        </li>
                                        <li class="card-list__item">
                                            <div class="card-list__title">Card Number</div>
                                            <div class="card-list__value">{{$bankAccount->card_number}}</div>
                                        </li>
                                        <li class="card-list__item">
                                            <div class="input-group input-group--white input-group--prepend">
                                                <div class="input-group__prepend">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM288 352c-44.2 0-80-43-80-96s35.8-96 80-96s80 43 80 96s-35.8 96-80 96zM64 352c35.3 0 64 28.7 64 64H64V352zm64-208c0 35.3-28.7 64-64 64V144h64zM512 304v64H448c0-35.3 28.7-64 64-64zM448 96h64v64c-35.3 0-64-28.7-64-64z"/></svg>
                                                </div>
                                                <input class="input" type="number" placeholder="Enter deposit amount">
                                            </div>
                                        </li>
                                        <button class="button button--secondary" type="button">
                                            <span class="button__icon button__icon--left">
                                                <svg class="icon-icon-plus">
                                                    <use xlink:href="#icon-plus"></use>
                                                </svg>
                                            </span>
                                            <span class="button__text">Deposit</span>
                                        </button>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    {{-- successfull deposit modal --}}
    <div class="modal modal-compact modal-success scrollbar-thin " id="successDeposit"
    data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <div class="modal__overlay" data-dismiss="modal"></div>
                            <div class="modal__wrap">
                                <div class="modal__window">
                                    <div class="modal__content">
                                        <div class="modal__body">
                                            <div class="modal__container">
                                                <img class="modal-success__icon" src=" {{ asset("img/content/checked-success.svg") }}" alt="#">
                                                <h4 class="modal-success__title">Amount has been deposited in your bank.</h4>
                                            </div>
                                        </div>
                                        <div class="modal-compact__buttons" style="grid-template-columns: 100%; ">
                                            {{-- <div class="modal-compact__button-item">
                                                <button class="modal-compact__button button"><span
                                                        class="button__text">Save</span>
                                                </button>
                                            </div> --}}
                                            {{-- <div class="modal-compact__button-item"> --}}
                                                <button class="modal-compact__button button"
                                                    data-dismiss="modal">
                                                    <span
                                                        class="button__text">Close
                                                    </span>
                                                </button>
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 308px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar simplebar-visible" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
        </div>
    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
        <div class="simplebar-scrollbar simplebar-visible" style="transform: translate3d(0px, 0px, 0px); display: none;">
        </div>
    </div>
</div>

<!-- Include this script at the end of your HTML file, just before the closing </body> tag -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the deposit button and input field
        var depositButton = document.querySelector('body > div.page-wrapper > main > div > div.customer-account__item-3.customer-payment.customer-card.card > div > div > div.card__footer > div > div > ul > button');
        var depositInput = document.querySelector('body > div.page-wrapper > main > div > div.customer-account__item-3.customer-payment.customer-card.card > div > div > div.card__footer > div > div > ul > li:nth-child(4) > div > input');

        depositButton.addEventListener('click', function () {
            // Check if the input field is empty
            if (depositInput.value.trim() === '') {
                alert('Please enter an amount.'); // You can replace this with a more sophisticated notification
                return;
            }

            // Prepare the data for the POST request
            var data = {
                amount: depositInput.value.trim()
            };

            // Make a POST request to the server
            fetch("{{ route('admin.finances.depositCash') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                // Assuming the server responds with the updated current_balance
                // Update the current_balance in the view (replace with your actual implementation)
                // document.querySelector("#currentBalanceElement").innerText = result.current_balance;

                // Assuming you have a modal with the ID 'depositModal', you can show it
                // Replace this with your actual modal implementation
                // Example: $('#depositModal').modal('show');
                document.querySelector("#successDeposit").classList.add(["is-active"]);
                document.querySelector("#successDeposit").classList.add(["is-animate"]);

                // Redirect to the specified route after a short delay (you can adjust the delay)
                setTimeout(function () {
                    window.location.href = "{{ route('admin.finances.index') }}";
                }, 1500); // 1000 milliseconds = 1 second
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.'); // You can replace this with a more sophisticated error handling
            });
        });
    });
</script>


@endsection
