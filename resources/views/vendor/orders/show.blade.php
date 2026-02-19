@extends('vendor.layouts.parent')

@section('title', 'Order | Vendor')

@section('content')

    <main class="page-content page-content--order-header">
        <div class="container">
            <div class="page-header">
                <h3 class="page-header__subtitle d-lg-none">Order Details</h3>
                <h1 class="page-header__title">Order <span class="text-grey">#{{$order->number}}</span></h1>
            </div>
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
                                <li class="breadcrumbs__item "><a class="breadcrumbs__link"
                                        href="{{ route("vendors.orders.index") }}"><span>Orders</span>
                                        <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                                            <use xlink:href="#icon-keyboard-right"></use>
                                        </svg></a>
                                </li>
                                <li class="breadcrumbs__item active"><span class="breadcrumbs__link">Order</span>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-order" style="padding-top: 2rem;!important">
                <div class="card__wrapper">
                    <section class="card-order__section pt-0">
                        <div class="card__container">
                            <div class="card__header">
                                <div class="row gutter-bottom-xs justify-content-between flex-grow-1">
                                    <div class="col">
                                        <h3 class="card__title">Vendor</h3>
                                    </div>
                                    <div class="col-auto"><span class="card__date">Placed on {{ \Carbon\Carbon::parse($order->created_on)->format('jS F Y') }}
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <ul class="card-order__customer-list">
                                <li class="card-order__customer-item">
                                    <svg class="icon-icon-user">
                                        <use xlink:href="#icon-user"></use>
                                    </svg> <b>Name:</b> <span>{{$order->vendor->name}}</span>
                                </li>
                                <li class="card-order__customer-item">
                                    <svg class="icon-icon-email">
                                        <use xlink:href="#icon-email"></use>
                                    </svg> <b>Email:</b> <a href="mailto:{{$order->vendor->email}}">{{$order->vendor->email}}</a>
                                </li>
                            </ul>
                        </div>
                    </section>
                    <section class="card-order__section card-order__method">
                        <div class="card__container">
                            <div class="row gutter-bottom-sm">
                                <div class="col">
                                    <h3 class="card__title">Order Details</h3>
                                    <div class="card-order__payment">

                                        <ul class="card-order__list">
                                            <li><b>Order #:</b> {{$order->number}}</li>
                                            <li><b>Amount:</b> ${{$order->amount}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-10 col-md-8 col-xl card-order__method-status">
                                    <h3 class="card__title">Description</h3>
                                    <div class="card-order__shipping">
                                        <div class="form-group">
                                            {{$order->description}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>

@endsection
