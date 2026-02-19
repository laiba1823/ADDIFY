@extends('buyer.layouts.parent')

@section('title', 'Orders | Buyer')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <main class="page-content">
        <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success some-space-upNdown" role="alert">
                    <center style="">
                        {{ session('success') }}
                        <br>
                    </center>
                </div>
            @endif

            @if (Session::has('fail'))
                <div class="alert alert-danger some-space-upNdown" role="alert">
                    <center style="">
                        {{ session('fail') }}
                        <br>
                    </center>
                </div>
            @endif

            {{-- Page Title --}}
            <div class="page-header">
                <h1 class="page-header__title">Orders</h1>
            </div>

            {{-- Bread Crumbs --}}
            <div class="page-tools">
                <div class="page-tools__breadcrumbs">
                    <div class="breadcrumbs">
                        <div class="breadcrumbs__container">
                            <ol class="breadcrumbs__list">

                                <li class="breadcrumbs__item">
                                    <a class="breadcrumbs__link" href="{{ route('buyers.dashboard') }}">
                                        <svg class="icon-icon-home breadcrumbs__icon">
                                            <use xlink:href="#icon-home"></use>
                                        </svg>
                                        <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                                            <use xlink:href="#icon-keyboard-right"></use>
                                        </svg>
                                    </a>
                                </li>

                                <li class="breadcrumbs__item active">
                                    <a class="breadcrumbs__link" href="{{ route('buyers.orders.index') }}">
                                        <span>Orders</span>
                                    </a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>

            </div>

            <div class="widgets">
                <div class="widgets__row row gutter-bottom-xl">

                </div>
            </div>

            <section class="section">
                <div class="section__title d-none">
                    <h2>Section</h2>
                </div>
                <div class="row gutter-bottom-xl">

                </div>
            </section>

            <div class="table-wrapper">
                <div style="height: 50vh" class="table-wrapper__content table-collapse scrollbar-thin scrollbar-visible" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: auto;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <table class="table table--lines">
                                            <colgroup>
                                                <col width="90px">
                                                <col width="100px">
                                                <col width="16%">
                                                <col>
                                                <col>
                                                <col>
                                                <col>
                                                <col>
                                            </colgroup>
                                            <thead class="table__header">
                                                <tr class="table__header-row">
                                                    <th class="d-none d-lg-table-cell"><span>Order No</span>
                                                    </th>
                                                    <th class="table__th-sort"><span class="align-middle">Vendor
                                                            Name</span>
                                                    </th>
                                                    <th class="table__th-sort d-none d-sm-table-cell"><span
                                                            class="align-middle">Time Assigned</span>
                                                    </th>
                                                    <th class="table__th-sort"><span class="align-middle">Amount</span>
                                                    </th>
                                                    <th class="table__th-sort"><span class="align-middle">Placed On</span>
                                                    </th>
                                                    <th class="table__th-sort d-none d-sm-table-cell"><span
                                                            class="align-middle">Status</span>
                                                    </th>
                                                    <th class="table__actions"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr class="table__row">

                                                        <td class="d-none d-lg-table-cell table__td"><span
                                                                class="text-grey">#{{ $order->number }}</span>
                                                        </td>
                                                        <td class="table__td">{{ $order->vendor->name }}</td>
                                                        <td class="d-none d-sm-table-cell table__td"><span
                                                                class="text-grey">{{ $order->time }} Month</span>
                                                        </td>
                                                        <td class="table__td"><span>${{ $order->amount }}</span>
                                                        </td>
                                                        <td class="table__td text-nowrap">
                                                            <span
                                                                class="text-grey">{{ \Carbon\Carbon::parse($order->created_on)->format('jS F Y') }}</span>
                                                        </td>

                                                        <td class="d-none d-sm-table-cell table__td">
                                                            <div class="table__status">
                                                                @if ($order->status == 'completed')
                                                                    <span class="table__status-icon color-green"></span>
                                                                    Completed
                                                                @endif
                                                                @if ($order->status == 'cancelled')
                                                                    <span class="table__status-icon color-red"></span>
                                                                    Cancelled
                                                                @endif
                                                                @if ($order->status == 'pending')
                                                                    <span class="table__status-icon color-blue"></span>
                                                                    Pending
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="table__td table__actions">
                                                            
                                                            <div class="items-more">
                                                                <button class="items-more__button">
                                                                    <svg class="icon-icon-more">
                                                                        <use xlink:href="#icon-more"></use>
                                                                    </svg>
                                                                </button>
                                                                <div class="dropdown-items dropdown-items--right">
                                                                    <div class="dropdown-items__container">
                                                                        <ul class="dropdown-items__list">
                                                                            <li class="dropdown-items__item"><a target="_blank"
                                                                                    class="dropdown-items__link"
                                                                                    href="{{ route("buyers.orders.show", ["id" => $order->id]) }}"><span
                                                                                        class="dropdown-items__link-icon">
                                                                                        <svg class="icon-icon-view">
                                                                                            <use xlink:href="#icon-view">
                                                                                            </use>
                                                                                        </svg></span>View Order</a>
                                                                            </li>
                                                                            <li class="dropdown-items__item"><a target="_blank"
                                                                                    class="dropdown-items__link"
                                                                                    href="{{ route("public.billboard.show", ["id" => $order->billboard->id]) }}"><span
                                                                                        class="dropdown-items__link-icon">
                                                                                        <svg class="icon-icon-view">
                                                                                            <use xlink:href="#icon-view">
                                                                                            </use>
                                                                                        </svg></span>View BillBoard</a>
                                                                            </li>
                                                                            <li class="dropdown-items__item"><a target="_blank"
                                                                                    class="dropdown-items__link"
                                                                                    href="{{ route("public.vendor.show", ["id" => $order->vendor->id]) }}"><span
                                                                                        class="dropdown-items__link-icon">
                                                                                        <svg class="icon-icon-view">
                                                                                            <use xlink:href="#icon-view">
                                                                                            </use>
                                                                                        </svg></span>View Vendor</a>
                                                                            </li>
                                                                            {{-- <li class="dropdown-items__item">
                                                                                <button onclick="updateStatus({{ $order->id }}, 'cancelled')" class="dropdown-items__link">
                                                                                    <span class="dropdown-items__link-icon">
                                                                                        <i class="fa-solid fa-ban"></i>
                                                                                    </span>
                                                                                    Cancel
                                                                                </button>
                                                                            </li>
                                                                            <li class="dropdown-items__item">
                                                                                <button onclick="updateStatus({{ $order->id }}, 'completed')" class="dropdown-items__link">
                                                                                    <span class="dropdown-items__link-icon">
                                                                                        <i class="fa-solid fa-check"></i>
                                                                                    </span>
                                                                                    Complete
                                                                                </button>
                                                                            </li>
                                                                            <li class="dropdown-items__item">
                                                                                <button onclick="updateStatus({{ $order->id }}, 'pending')" class="dropdown-items__link">
                                                                                    <span class="dropdown-items__link-icon">
                                                                                        <i class="fa-solid fa-clock-rotate-left"></i>
                                                                                    </span>
                                                                                    Pending
                                                                                </button>
                                                                            </li> --}}
                                                                        </ul>
                                                                    </div>
                                                                </div>
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
                        <div class="simplebar-placeholder" style="width: auto; height: 550px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar simplebar-visible"
                            style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                        <div class="simplebar-scrollbar simplebar-visible"
                            style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                    </div>
                </div>
                <div class="table-wrapper__footer">
                    <div class="row">
                        <div class="table-wrapper__show-result col text-grey"><span
                                class="d-none d-sm-inline-block">Showing</span> 1 to 10 <span
                                class="d-none d-sm-inline-block">of 50 items</span>
                        </div>
                        <div class="table-wrapper__pagination col-auto">
                            <ol class="pagination">
                                <li class="pagination__item">
                                    <a class="pagination__arrow pagination__arrow--prev" href="#">
                                        <svg class="icon-icon-keyboard-left">
                                            <use xlink:href="#icon-keyboard-left"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li class="pagination__item active"><a class="pagination__link" href="#">1</a>
                                </li>
                                <li class="pagination__item"><a class="pagination__link" href="#">2</a>
                                </li>
                                <li class="pagination__item"><a class="pagination__link" href="#">3</a>
                                </li>
                                <li class="pagination__item pagination__item--dots">...</li>
                                <li class="pagination__item"><a class="pagination__link" href="#">10</a>
                                </li>
                                <li class="pagination__item">
                                    <a class="pagination__arrow pagination__arrow--next" href="#">
                                        <svg class="icon-icon-keyboard-right">
                                            <use xlink:href="#icon-keyboard-right"></use>
                                        </svg>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

    {{-- <script>
        function updateStatus(orderId, newStatus) {
            // Send an Ajax request to the backend
            axios.put(`${orderId}/update-status/${newStatus}`)
                .then(response => {
                    // Handle success (update the UI as needed)
                    alert(response.data.message);
                    // Optionally update the UI here
                })
                .catch(error => {
                    // Handle error (display an error message or handle accordingly)
                    alert(error.response.data.error);
                    console.log(error.response.data.error);
                });
        }
    </script> --}}
@endsection
