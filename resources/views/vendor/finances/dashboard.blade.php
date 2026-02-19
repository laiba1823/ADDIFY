@extends('vendor.layouts.parent')

@section('title', 'Finances | Vendor')

@section('content')

    <main class="page-content">
        <div class="container">

            {{-- Page Title --}}
            <div class="page-header">
                <h1 class="page-header__title">Finances</h1>
            </div>

            {{-- Bread Crumbs --}}
            <div class="page-tools">
                <div class="page-tools__breadcrumbs">
                    <div class="breadcrumbs">
                        <div class="breadcrumbs__container">
                            <ol class="breadcrumbs__list">

                                <li class="breadcrumbs__item">
                                    <a class="breadcrumbs__link" href="{{ route("vendors.dashboard") }}">
                                        <svg class="icon-icon-home breadcrumbs__icon">
                                            <use xlink:href="#icon-home"></use>
                                        </svg>
                                        <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                                            <use xlink:href="#icon-keyboard-right"></use>
                                        </svg>
                                    </a>
                                </li>

                                <li class="breadcrumbs__item active">
                                    <a class="breadcrumbs__link" href="{{ route("vendors.finances.index") }}">
                                        <span>Finances</span>
                                    </a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>

                {{-- <div class="page-tools__right">
                    <div class="page-tools__right-row">
                        <div class="page-tools__right-item"><a class="button-icon" href="#"><span class="button-icon__icon">
                <svg class="icon-icon-print">
                    <use xlink:href="#icon-print"></use>
                </svg></span></a>
                        </div>
                        <div class="page-tools__right-item"><a class="button-icon" href="#"><span class="button-icon__icon">
                <svg class="icon-icon-import">
                    <use xlink:href="#icon-import"></use>
                </svg></span></a>
                        </div>
                    </div>
                </div> --}}

            </div>

            {{-- <div class="widgets">
                <div class="widgets__row row gutter-bottom-xl">

                    
                    <div class="col-12 col-md-6 col-xl-4 d-flex">
                        <div class="widget">
                            <div class="widget__wrapper">
                                <div class="widget__row">
                                    <div class="widget__left">
                                        <h3 class="widget__title">
                                            Total Vendors
                                        </h3>
                                        <div class="widget__status-title text-grey">
                                            Total vendors working right now
                                        </div>
                                        <div class="widget__trade">
                                            <span class="widget__trade-count">4000</span>

                                            <span class="trade-icon trade-icon--up">
                                                <svg class="icon-icon-trade-up">
                                                    <use xlink:href="#icon-trade-up"></use>
                                                </svg>
                                            </span>
                                            <span class="badge badge--sm badge--green">7%</span>

                                        </div>
                                        <div class="widget__details">
                                            <a class="link-under text-grey" href="{{ route("admin.vendors.index") }}">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-12 col-md-6 col-xl-4 d-flex">
                        <div class="widget">
                            <div class="widget__wrapper">
                                <div class="widget__row">
                                    <div class="widget__left">
                                        <h3 class="widget__title">
                                            Total Buyers
                                        </h3>
                                        <div class="widget__status-title text-grey">
                                            Total buyers working right now
                                        </div>
                                        <div class="widget__trade">
                                            <span class="widget__trade-count">1000</span>
                                            
                                            <span class="trade-icon trade-icon--down">
                                                <svg class="icon-icon-trade-down">
                                                    <use xlink:href="#icon-trade-down"></use>
                                                </svg>
                                            </span>
                                            <span class="badge badge--sm badge--red">3%</span>
                                        </div>
                                        <div class="widget__details">
                                            <a class="link-under text-grey" href="{{ route("admin.buyers.index") }}">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-12 col-md-6 col-xl-4 d-flex">
                        <div class="widget">
                            <div class="widget__wrapper">
                                <div class="widget__row">
                                    <div class="widget__left">
                                        <h3 class="widget__title">
                                            Total Transactions
                                        </h3>
                                        <div class="widget__status-title text-grey">
                                            Transactions made today
                                        </div>
                                        <div class="widget__trade">
                                            <span class="widget__trade-count">500</span>

                                            <span class="trade-icon trade-icon--up">
                                                <svg class="icon-icon-trade-up">
                                                    <use xlink:href="#icon-trade-up"></use>
                                                </svg>
                                            </span>
                                            <span class="badge badge--sm badge--green">9%</span>
                                        </div>
                                        <div class="widget__details">
                                            <a class="link-under text-grey" href="{{ route("admin.finances.transactions") }}">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div> --}}

            <section class="section">
                <div class="section__title d-none">
                    <h2>Section</h2>
                </div>
                <div class="row gutter-bottom-xl">
                
                    {{-- Bank Balance --}}
                    <div class="col-12 col-md-6 col-xl-4 d-flex">
                        <div class="widget">
                            <div class="widget__wrapper">
                                <div class="widget__row">
                                    <div class="widget__left">
                                        <h3 class="widget__title">
                                            Bank Balance
                                        </h3>
                                        <div class="widget__status-title text-grey">
                                            Total amount at the moment
                                        </div>
                                        <div class="card-widget__trade">
                                            <span class="card-widget__count">${{$currentBalance}}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 d-flex" style="flex-direction: column;">
                        <a href="{{ route("vendors.finances.withdraw") }}" class="button button--secondary" type="button">
                            <span class="button__icon button__icon--left">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512"><path d="M535 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l64 64c4.5 4.5 7 10.6 7 17s-2.5 12.5-7 17l-64 64c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l23-23L384 112c-13.3 0-24-10.7-24-24s10.7-24 24-24l174.1 0L535 41zM105 377l-23 23L256 400c13.3 0 24 10.7 24 24s-10.7 24-24 24L81.9 448l23 23c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L7 441c-4.5-4.5-7-10.6-7-17s2.5-12.5 7-17l64-64c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM96 64H337.9c-3.7 7.2-5.9 15.3-5.9 24c0 28.7 23.3 52 52 52l117.4 0c-4 17 .6 35.5 13.8 48.8c20.3 20.3 53.2 20.3 73.5 0L608 169.5V384c0 35.3-28.7 64-64 64H302.1c3.7-7.2 5.9-15.3 5.9-24c0-28.7-23.3-52-52-52l-117.4 0c4-17-.6-35.5-13.8-48.8c-20.3-20.3-53.2-20.3-73.5 0L32 342.5V128c0-35.3 28.7-64 64-64zm64 64H96v64c35.3 0 64-28.7 64-64zM544 320c-35.3 0-64 28.7-64 64h64V320zM320 352a96 96 0 1 0 0-192 96 96 0 1 0 0 192z"/></svg>
                            </span>
                            <span class="button__text">Withdraw Money</span>
                        </a>
                        <br>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 d-flex" style="flex-direction: column;">
                        <a href="{{ route("vendors.profile") }}" class="button button--secondary" type="button">
                            <span class="button__icon button__icon--left">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96v32H576V96c0-35.3-28.7-64-64-64H64zM576 224H0V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V224zM112 352h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm112 16c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16z"/></svg>
                            </span>
                            <span class="button__text">Edit Financial Information</span>
                        </a>
                        <br>
                    </div>

                    

                </div>
            </section>

            {{-- <section class="section">
                <div class="section__title d-none">
                    <h2>Section</h2>
                </div>
                <div class="row gutter-bottom-xl">
                    <div class="col-12 d-flex">
                        <div class="card pb-0">
                            <div class="card__wrapper">
                                <div class="card__container">
                                    <div class="card__header">
                                        <div class="card__header-left">
                                            <h3 class="card__header-title">
                                                Recent Transactions
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="card__body">
                                        <div class="card__scrollbar card__table">
                                            <div class="card__table-transactions scrollbar-thin scrollbar-visible"
                                                data-simplebar="data-simplebar">
                                                <table class="table table--lines table--striped">
                                                    <colgroup>
                                                        <col class="colgroup-1" />
                                                        <col class="colgroup-2" />
                                                        <col class="colgroup-3" />
                                                        <col class="colgroup-4" />
                                                        <col class="colgroup-5" />
                                                        <col class="colgroup-6" />
                                                        <col />
                                                    </colgroup>
                                                    <thead class="table__header table__header--sticky">
                                                        <tr>
                                                            <th>
                                                                <span class="text-nowrap">Tranaction
                                                                    No.</span>
                                                            </th>
                                                            <th>
                                                                <span>To</span>
                                                            </th>
                                                            <th>
                                                                <span>Date</span>
                                                            </th>
                                                            <th>
                                                                <span>Amount</span>
                                                            </th>
                                                            <th>
                                                                <span>From</span>
                                                            </th>
                                                            <th>
                                                                <span>Status</span>
                                                            </th>
                                                            <th class="table__actions"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($lastTransactions as $lastTransaction)
                                                            <tr class="table__row">
                                                                <td class="table__td">
                                                                    <span class="text-grey">{{$lastTransaction->number}}</span>
                                                                </td>
                                                                <td class="table__td">
                                                                    <div class="media-item">
                                                                        <div class="media-item__icon color-orange">
                                                                            <div class="media-item__icon-text">
                                                                                WS
                                                                            </div>
                                                                            <img class="media-item__thumb"
                                                                                src="{{ asset($lastTransaction->freelancer->img) }}"
                                                                                alt="#" />
                                                                                {{ $lastTransaction->freelancer->img  }}
                                                                        </div>
                                                                        <div class="media-item__right">
                                                                            <h5 class="media-item__title">
                                                                                {{$lastTransaction->vendor->name}}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="table__td">
                                                                    <span class="text-grey">{{ \Carbon\Carbon::parse($lastTransaction->created_at)->format('d-m-Y   ') }} </span>
                                                                </td>
                                                                <td class="table__td">
                                                                    <span>${{ $lastTransaction->amount }}</span>
                                                                </td>
                                                                <td class="table__td">
                                                                    <span class="text-grey">
                                                                        {{ $lastTransaction->buyer->name }}
                                                                    </span>
                                                                </td>
                                                                <td class="table__td">
                                                                    <div class="table__status">
                                                                        @if ($lastTransaction->status == "paid" )
                                                                            <span class="table__status-icon color-green"></span>
                                                                            Paid
                                                                        @endif
                                                                        @if ($lastTransaction->status == "cancelled" )
                                                                            <span class="table__status-icon color-red"></span>
                                                                            Canceled
                                                                        @endif
                                                                        @if ($lastTransaction->status == "pending" )
                                                                            <span class="table__status-icon color-blue"></span>
                                                                            Pending
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
        </div>

    </main>

@endsection
