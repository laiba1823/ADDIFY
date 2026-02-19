@extends('admin.layouts.parent')

@section('title', 'Profile | Admin')

@section('content')
    <style>
        .space-upNdown{
            margin: 15px 0px;
        }
    </style>
    <main class="page-content">
        <div class="container">
            <div class="page-header">
                <h1 class="page-header__title">Profile</h1>
            </div>
            <div class="page-tools">
                <div class="page-tools__breadcrumbs">
                    <div class="breadcrumbs">
                        <div class="breadcrumbs__container">
                            <ol class="breadcrumbs__list">

                                <li class="breadcrumbs__item">
                                    <a class="breadcrumbs__link" href="{{ route('admin.dashboard') }}">
                                        <svg class="icon-icon-home breadcrumbs__icon">
                                            <use xlink:href="#icon-home"></use>
                                        </svg>
                                        <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                                            <use xlink:href="#icon-keyboard-right"></use>
                                        </svg>
                                    </a>
                                </li>

                                <li class="breadcrumbs__item active">
                                    <a class="breadcrumbs__link" href="{{ route('admin.profile') }}">
                                        <span>Profile</span>
                                    </a>
                                </li>

                            </ol>
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

            <div class="customer-account">
                <div class="customer-account__item-1 customer-profile customer-card card">
                    <div class="card__wrapper">
                        <div class="card__container">
                            <div class="card__header">
                                <div class="card__header-left">
                                    <h3 class="card__header-title">Admin Info</h3>
                                </div>
                                <div class="customer-card__header-right">
                                    {{-- <button class="button button--primary button--block" >
                                        <span class="button__text">Open Modal</span>
                                    </button> --}}

                                    <button class="customer-card__btn-task" data-dismiss="modal" data-modal="#editProfileInfo">
                                        <svg class="icon-icon-task">
                                            <use xlink:href="#icon-task"></use>
                                        </svg>
                                    </button>
                                    
                                </div>
                            </div>
                            <div class="card__body">
                                
                                <div class="customer-profile__avatar" style="overflow: hidden">
                                    <img src="{{ asset($admin->img ) }}" alt="" style="border-radius: 10px;height: -webkit-fill-available;">
                                    {{-- <svg viewBox="0 0 252 272" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g filter="url(#filter0_dd)">
                                            <path
                                                d="M55 199H197V221C197 221 153.752 224 126 224C98.248 224 55 221 55 221V199Z"
                                                fill="white"></path>
                                        </g>
                                        <g filter="url(#filter1_dd)">
                                            <path
                                                d="M18.235 43.2287C19.2494 23.1848 35.1848 7.24941 55.2287 6.23501C76.8855 5.13899 104.551 4 126 4C147.449 4 175.114 5.13898 196.771 6.23501C216.815 7.24941 232.751 23.1848 233.765 43.2287C234.861 64.8855 236 92.5512 236 114C236 135.449 234.861 163.114 233.765 184.771C232.751 204.815 216.815 220.751 196.771 221.765C175.114 222.861 147.449 224 126 224C104.551 224 76.8855 222.861 55.2287 221.765C35.1848 220.751 19.2494 204.815 18.235 184.771C17.139 163.114 16 135.449 16 114C16 92.5512 17.139 64.8855 18.235 43.2287Z"
                                                fill="url(#pattern0)"></path>
                                        </g>
                                        <defs>
                                            <filter id="filter0_dd" x="23" y="183" width="206" height="89"
                                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                                <feOffset dy="8"></feOffset>
                                                <feGaussianBlur stdDeviation="8"></feGaussianBlur>
                                                <feColorMatrix type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                    result="effect1_dropShadow"></feBlend>
                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                                <feOffset dy="16"></feOffset>
                                                <feGaussianBlur stdDeviation="16"></feGaussianBlur>
                                                <feColorMatrix type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
                                                <feBlend mode="normal" in2="effect1_dropShadow"
                                                    result="effect2_dropShadow"></feBlend>
                                                <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow"
                                                    result="shape"></feBlend>
                                            </filter>
                                            <filter id="filter1_dd" x="0" y="0" width="252" height="252"
                                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                                <feOffset dy="12"></feOffset>
                                                <feGaussianBlur stdDeviation="8"></feGaussianBlur>
                                                <feColorMatrix type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"></feColorMatrix>
                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                    result="effect1_dropShadow"></feBlend>
                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                                <feOffset dy="2"></feOffset>
                                                <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                                                <feColorMatrix type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0"></feColorMatrix>
                                                <feBlend mode="normal" in2="effect1_dropShadow"
                                                    result="effect2_dropShadow"></feBlend>
                                                <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow"
                                                    result="shape"></feBlend>
                                            </filter>
                                            <pattern id="pattern0" patternContentUnits="objectBoundingBox"
                                                width="1" height="1">
                                                <use xlink:href="#profileImage" transform="scale(0.00142857)"></use>
                                            </pattern>
                                            <image id="profileImage" width="700" height="700"
                                                xlink:href="{{ asset('img/content/avatar-full.jpg') }}"></image>
                                        </defs>
                                    </svg> --}}
                                </div>

                                <h4 class="customer-profile__title">{{ $admin->name }}</h4>
                                <div class="input-group input-group--white input-group--prepend">
                                    <div class="input-group__prepend">
                                        <i class="fa-solid fa-lock"></i>
                                    </div>
                                    <input class="input" type="password" placeholder="password" value="1234567890"
                                        disabled>
                                </div>
                            </div>
                            <div class="card__footer">
                                <div class="card__container">
                                    <ul class="customer-profile__address">
                                        <li>
                                            <svg class="icon-icon-email">
                                                <use xlink:href="#icon-email"></use>
                                            </svg> <a href="mailto:#">{{ $admin->email }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="customer-account__item-3 customer-payment customer-card card">
                    <div class="card__wrapper">
                        <div class="card__container">
                            <div class="card__header">
                                <div class="card__header-left">
                                    <h3 class="card__header-title">Financial Information</h3>
                                </div>
                                <div class="customer-card__header-right">
                                    <button class="customer-card__btn-task" data-dismiss="modal" data-modal="#editCardInfo">
                                        <svg class="icon-icon-task">
                                            <use xlink:href="#icon-task"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="card__body">
                                <div class="card__credit-card">
                                    <div class="credit-card">
                                        <img class="credit-card__image"
                                            src="{{ asset('img/content/credit-card%403x.png') }}" alt="#">
                                        <div class="credit-card__content">
                                            <input class="credit-card__number" type="text"
                                                value="{{ $bankAccount->card_number }}" readonly="readonly">
                                            <div class="credit-card__name">{{ $bankAccount->card_holder }}</div>
                                            <div class="credit-card__date">{{ $bankAccount->card_expiry }}</div>
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
                                                <div class="card-list__value">{{ $bankAccount->card_holder }}</div>
                                            </li>
                                            <li class="card-list__item">
                                                <div class="card-list__title">Expire</div>
                                                <div class="card-list__value">{{ $bankAccount->card_expiry }}</div>
                                            </li>
                                            <li class="card-list__item">
                                                <div class="card-list__title">Card Number</div>
                                                <div class="card-list__value">{{ $bankAccount->card_number }}</div>
                                            </li>
                                            <li class="card-list__item">
                                                <div class="card-list__title">Account Number</div>
                                                <div class="card-list__value">{{ $bankAccount->account_number }}</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        {{-- Edit Profile Modal --}}
        <div class="modal modal-compact modal-success scrollbar-thin " id="editProfileInfo"
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

                                            <form method="POST" action="{{ route("admin.update", $admin->id) }}" id="infoForm" enctype="multipart/form-data">
                                                @csrf
                                                @method("PUT")
                                                <div class="modal__body">
                                                    <div class="modal__container">
                                                        <div class="modal-account__upload profile-upload js-profile-upload">
                                                            <input class="profile-upload__input" type="file" name="img" accept="image/png, image/jpeg">
                                                            <svg class="profile-upload__thumbnail" viewBox="0 0 252 272" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <g filter="url(#filter0)">
                                                                    <path d="M55 199H197V221C197 221 153.752 224 126 224C98.248 224 55 221 55 221V199Z" fill="white"></path>
                                                                </g>
                                                                <g filter="url(#filter1)">
                                                                    <path d="M18.235 43.2287C19.2494 23.1848 35.1848 7.24941 55.2287 6.23501C76.8855 5.13899 104.551 4 126 4C147.449 4 175.114 5.13898 196.771 6.23501C216.815 7.24941 232.751 23.1848 233.765 43.2287C234.861 64.8855 236 92.5512 236 114C236 135.449 234.861 163.114 233.765 184.771C232.751 204.815 216.815 220.751 196.771 221.765C175.114 222.861 147.449 224 126 224C104.551 224 76.8855 222.861 55.2287 221.765C35.1848 220.751 19.2494 204.815 18.235 184.771C17.139 163.114 16 135.449 16 114C16 92.5512 17.139 64.8855 18.235 43.2287Z" fill="url(#pattern1)"></path>
                                                                </g>
                                                                <path class="profile-upload__overlay" opacity="0.6" d="M18.235 43.2287C19.2494 23.1848 35.1848 7.24941 55.2287 6.23501C76.8855 5.13899 104.551 4 126 4C147.449 4 175.114 5.13899 196.771 6.23501C216.815 7.24941 232.751 23.1848 233.765 43.2287C234.861 64.8855 236 92.5512 236 114C236 135.449 234.861 163.114 233.765 184.771C232.751 204.815 216.815 220.751 196.771 221.765C175.114 222.861 147.449 224 126 224C104.551 224 76.8855 222.861 55.2287 221.765C35.1848 220.751 19.2494 204.815 18.235 184.771C17.139 163.114 16 135.449 16 114C16 92.5512 17.139 64.8855 18.235 43.2287Z" fill="#44566C"></path>
                                                                <defs>
                                                                    <filter id="filter0" x="23" y="183" width="206" height="89" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                                        <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                                                        <feOffset dy="8"></feOffset>
                                                                        <feGaussianBlur stdDeviation="8"></feGaussianBlur>
                                                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
                                                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"></feBlend>
                                                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                                                        <feOffset dy="16"></feOffset>
                                                                        <feGaussianBlur stdDeviation="16"></feGaussianBlur>
                                                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
                                                                        <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow"></feBlend>
                                                                        <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape"></feBlend>
                                                                    </filter>
                                                                    <filter id="filter1" x="0" y="0" width="252" height="252" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                                        <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                                                        <feOffset dy="12"></feOffset>
                                                                        <feGaussianBlur stdDeviation="8"></feGaussianBlur>
                                                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"></feColorMatrix>
                                                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"></feBlend>
                                                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                                                        <feOffset dy="2"></feOffset>
                                                                        <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                                                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0"></feColorMatrix>
                                                                        <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow"></feBlend>
                                                                        <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape"></feBlend>
                                                                    </filter>
                                                                    <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                                        <use xlink:href="#profileImageAddPlaceholder" transform="scale(0.00142857)"></use>
                                                                        <use xlink:href="#profileImageAdd" transform="scale(0.00142857)"></use>
                                                                    </pattern>
                                                                    {{-- <image id="profileImageAddPlaceholder" width="700" height="700" xlink:href="  {{ asset("img/content/upload-placeholder.svg") }}"></image> --}}
                                                                    <image id="profileImageAddPlaceholder" width="700" height="700" xlink:href="  {{ asset($admin->img ) }}"></image>
                                                                    <image id="profileImageAdd" class="profile-upload__image" width="700" height="700" xlink:href="{{ asset($admin->img ) }}"></image>
                                                                </defs>
                                                            </svg>
                                                            <div class="profile-upload__label">
                                                                <svg class="icon-icon-camera" width="50px" height="50px">
                                                                    <use xlink:href="#icon-camera"></use>
                                                                </svg>
                                                                <p class="mb-0">Click &amp; Drop
                                                                    <br>to change photo</p>
                                                            </div>
                                                        </div>

                                                        <div class="space-upNdown input-group input-group--white input-group--prepend">
                                                            <div class="input-group__prepend">
                                                                <i class="fa-solid fa-user"></i>
                                                            </div>
                                                            <input class="input" type="text" name="name" value="{{ $admin->name }}" placeholder="Name">
                                                        </div>

                                                        <div class=" space-upNdown input-group input-group--white input-group--prepend">
                                                            <div class="input-group__prepend">
                                                                <i class="fa-solid fa-envelope"></i>
                                                            </div>
                                                            <input class="input" type="email" name="email" value="{{$admin->email }}" placeholder="Email" >
                                                        </div>
                                                        
                                                        <div class=" space-upNdown input-group input-group--white input-group--prepend">
                                                            <div class="input-group__prepend">
                                                                <i class="fa-solid fa-lock"></i>
                                                            </div>
                                                            <input class="input" type="password" name="password" placeholder="Change Password" >
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="modal-compact__buttons">
                                                    <div class="modal-compact__button-item">
                                                        <button class="modal-compact__button button" form="infoForm" type="submit">
                                                            <span class="button__text">Save</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-compact__button-item">
                                                        <button type="button" class="modal-compact__button button" data-dismiss="modal">
                                                            <span class="button__text">Close</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

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
                <div class="simplebar-scrollbar simplebar-visible"
                    style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                <div class="simplebar-scrollbar simplebar-visible"
                    style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
            </div>
        </div>
    
        {{-- Edit payment Info Modal --}}
        <div class="modal modal-compact modal-success scrollbar-thin " id="editCardInfo"
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
                                                <form id="bankAccountForm" action="{{ route("admin.bank_account.update", ['id' => $admin->id]) }}" method="POST">
                                                    @method("PUT")
                                                    @csrf
                                                    <input type="hidden" name="user_type" value="admin">
                                                    <div class="modal__container">
                                                        
                                                        <div class="space-upNdown input-group input-group--append input-group--append-lg">
                                                            <span class="input-group__append">
                                                                <img class="add-card__input-number-logo" src="{{asset("img/content/visa-logo.png") }}" alt="#">
                                                            </span>
                                                            <input class="input js-card-number" type="text" value="{{ $bankAccount->card_number }}" placeholder="**** **** **** 1234" name="card_number" required>
                                                        </div>

                                                        <div class="space-upNdown  input-group input-group--white input-group--prepend">
                                                            <div class="input-group__prepend">
                                                                <i class="fa-solid fa-credit-card"></i>
                                                            </div>
                                                            <input class="input" type="text" placeholder="Expiry" value="{{ $bankAccount->card_expiry }}" name="card_expiry" id="cardExpiry" required>
                                                        </div>

                                                        <div class="space-upNdown  input-group input-group--white input-group--prepend">
                                                            <div class="input-group__prepend">
                                                                <i class="fa-solid fa-user"></i>
                                                            </div>
                                                            <input class="input" type="text" placeholder="Card Holder" value="{{ $bankAccount->card_holder }}" name="card_holder" required>
                                                        </div>
                                                        
                                                        <div class="space-upNdown  input-group input-group--white input-group--prepend">
                                                            <div class="input-group__prepend">
                                                                <i class="fa-solid fa-file-invoice-dollar"></i>
                                                            </div>
                                                            <input class="input" type="numeric" placeholder="Account Number" value="{{ $bankAccount->account_number }}" name="account_number" maxlength="10" required>
                                                        </div>

                                                        {{-- <div class=" space-upNdown input-group input-group--white input-group--prepend">
                                                            <div class="input-group__prepend">
                                                                <i class="fa-solid fa-envelope"></i>
                                                            </div>
                                                            <input class="input" type="email" placeholder="Email" >
                                                        </div>
                                                        
                                                        <div class=" space-upNdown input-group input-group--white input-group--prepend">
                                                            <div class="input-group__prepend">
                                                                <i class="fa-solid fa-lock"></i>
                                                            </div>
                                                            <input class="input" type="password" placeholder="password" value="1234567"
                                                                disabled>
                                                        </div> --}}

                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-compact__buttons">
                                                <div class="modal-compact__button-item">
                                                    <button form="bankAccountForm" type="submit" class="modal-compact__button button">
                                                        <span class="button__text">Save</span>
                                                    </button>
                                                </div>
                                                <div class="modal-compact__button-item">
                                                    <button type="button" class="modal-compact__button button" data-dismiss="modal">
                                                        <span class="button__text">Close</span>
                                                    </button>
                                                </div>
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
                <div class="simplebar-scrollbar simplebar-visible" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
            </div>
        </div>
    </main>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          var cardExpiryInput = document.getElementById('cardExpiry');
      
          // Add input event listener to format card expiry
          cardExpiryInput.addEventListener('input', function() {
            var value = cardExpiryInput.value.replace(/\D/g, ''); // Remove non-numeric characters
            var formattedValue = formatCardExpiry(value);
            cardExpiryInput.value = formattedValue;
          });
      
          // Function to format card expiry as **/**
          function formatCardExpiry(value) {
            // Add '/' after the first two digits and limit to a maximum of 4 characters
            var formattedValue = value.replace(/^(\d{0,2})/, '$1/').substring(0, 5);
            return formattedValue;
          }
        });
    </script>
@endsection
