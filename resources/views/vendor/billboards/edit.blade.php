@extends('vendor.layouts.parent')

@section('title', 'Edit your Billboard | Vendor')

@section('content')

    <main class="page-content">
        <div class="container">

            <div class="page-header">
                <h1 class="page-header__title">Edit your BillBoard</h1>
            </div>

            <div class="page-tools">
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

                                <li class="breadcrumbs__item ">
                                    <a class="breadcrumbs__link" href="{{ route('vendors.billboards.index') }}">
                                        <span>BillBoards</span>
                                        <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                                            <use xlink:href="#icon-keyboard-right"></use>
                                        </svg>
                                    </a>
                                </li>

                                <li class="breadcrumbs__item active">
                                    <a class="breadcrumbs__link" href="{{ route('vendors.billboards.edit', ['billboard' => $billboard->id]) }}">
                                        <span>Edit</span>
                                    </a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card add-product card--content-center">
                <div class="card__wrapper">
                    <div class="card__container">
                        <form class="add-product__form" method="POST" action="{{ route("vendors.billboards.update", ['billboard' => $billboard->id]) }}" id="myForm" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                            <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                            <div class="add-product__row">

                                <div class="add-product__slider" id="addProductSlider">
                                    <div class="add-product__thumbs">
                                        <div class="add-product__thumbs-slider swiper-container swiper-container-initialized swiper-container-vertical swiper-container-pointer-events swiper-container-thumbs">
                                            <div class="swiper-wrapper" id="swiper-wrapper-68311aca513610350" aria-live="polite">
                                                {{-- @foreach ($gig->images as $image)
                                                @endforeach --}}
                                                {{-- {{ $gig->images[0] }} --}}
                                                @for ($i = 0; $i <= 4; $i++)

                                                    <div class="add-product__thumb swiper-slide" role="group" aria-label="{{ $i }} / 6">

                                                        <img class="add-product__thumb-image swiper-lazy swiper-lazy-loaded" src="{{ asset(isset($gig->images[$i]) ? 'storage/'.$gig->images[$i] : 'img/content/default-img.svg') }}" alt="#">
                                                        
                                                    </div>
                                                
                                                @endfor
                                            </div>
                                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                        </div>
                                
                                        <div class="add-product__thumbs-prev">
                                            <a class="add-product__thumbs-arrow add-product__thumbs-arrow--prev swiper-button-disabled" href="#" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-68311aca513610350" aria-disabled="true">
                                                <svg class="icon-icon-chevron">
                                                    <use xlink:href="#icon-chevron"></use>
                                                </svg>
                                            </a>
                                        </div>
                                
                                        <div class="add-product__thumbs-next">
                                            <a class="add-product__thumbs-arrow add-product__thumbs-arrow--next" href="#" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-68311aca513610350" aria-disabled="false">
                                                <svg class="icon-icon-chevron">
                                                    <use xlink:href="#icon-chevron"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                
                                    <div class="add-product__gallery">
                                        <div class="add-product__gallery-slider swiper-container swiper-container-fade swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                                            <div class="swiper-wrapper" id="swiper-wrapper-dbd864ba8426eded" aria-live="polite">
                                                @for ($i = 0; $i <= 4; $i++)
                                                    <div class="add-product__gallery-slide swiper-slide" role="group" aria-label="{{ $i }} / 6">
                                                        <label class="add-product__gallery-label">
                                                            
                                                            <img class="add-product__gallery-image" src="{{ asset(isset($gig->images[$i]) ? 'storage/'.$gig->images[$i] : 'img/content/default-img.svg') }}" alt="#" style="cursor: pointer">
                                                            <input type="file" name="images[]" style="display: none;" accept="image/*" />
                                                        </label>
                                                    </div>
                                                @endfor
                                            </div>
                                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                        </div>
                                        <br>
                                        <span class="text-danger">@error('images'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="add-product__right">
                                    <div class="row row--md">

                                        <div class="col-12 form-group form-group--lg">
                                            <label class="form-label">Title</label>
                                            <div class="input-group">
                                                <input class="input" type="text" placeholder="Billboard Title" name="title" value="{{ $billboard->title }}" required="">
                                            </div>
                                            <br>
                                            <span class="text-danger">@error('title'){{$message}}@enderror</span>
                                        </div>

                                        <div class="col-12 form-group form-group--lg">
                                            <label class="form-label">Description</label>
                                            <div class="input-editor">
                                                <div class="js-description-editor ql-container ql-snow">
                                                    <div class="ql-editor" data-gramm="false" contenteditable="true" data-placeholder="Type your description here...">
                                                        {!! $billboard->description !!}
                                                    </div>
                                                    <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                                                    <div class="ql-tooltip ql-hidden">
                                                        <a class="ql-preview" target="_blank" href="about:blank"></a>
                                                        <input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL">
                                                        <a class="ql-action"></a>
                                                        <a class="ql-remove"></a>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="description" id="descriptionInput">
                                            </div>
                                            <br>
                                            <span class="text-danger">@error('description'){{$message}}@enderror</span>
                                            
                                        </div>

                                        <div class="col-12 form-group form-group--lg">
                                            <label class="form-label">Location</label>
                                            <div class="input-group input-group--append">
                                                <select class="input js-input-select input--fluid select2-hidden-accessible" data-placeholder="" tabindex="-1" aria-hidden="true" name="category">
                                                    <option value="{{ $billboard->category->id }}" selected style="display: none">{{ $billboard->category->name }}</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                
                                                <span class="input-group__arrow">
                                                    <svg class="icon-icon-keyboard-down">
                                                        <use xlink:href="#icon-keyboard-down"></use>
                                                    </svg>
                                                </span>
                                                
                                                <span class="text-danger">@error('category'){{$message}}@enderror</span>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 form-group form-group--lg">
                                            <label class="form-label">Price</label>
                                            <div class="input-group input-group--prepend">
                                                <div class="input-group__prepend"><span
                                                        class="input-group__symbol">$</span>
                                                </div>
                                                <input class="input" type="number" min="10" max="99999" placeholder="" value="{{ $billboard->price }}" required="" name="price">
                                            </div>
                                            <br>
                                            <span class="text-danger">@error('price'){{$message}}@enderror</span>
                                        </div>

                                    </div>
                                    <div class="add-product__submit" style="justify-content: start;">
                                        <button type="button" class="button button--primary button--block" onclick="submitForm()">
                                            Update
                                        </button>
                                        <a href="{{ route("vendors.billboards.index") }}" type="button" class="button button--primary button--block" onclick="submitForm()">
                                            Cancel
                                        </a>
                                        {{-- <div class="modal__footer-button">
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Your existing Swiper initialization code
            // ...
    
            var gallerySlides = document.querySelectorAll('.add-product__gallery-slide input[type="file"]');
            var galleryImages = document.querySelectorAll('.add-product__gallery-image');
            var thumbnailImages = document.querySelectorAll('.add-product__thumb-image');
    
            gallerySlides.forEach(function (fileInput, index) {
                fileInput.addEventListener('change', function () {
                    var selectedFile = fileInput.files[0];
    
                    // Check if a file is selected
                    if (selectedFile) {
                        // Debugging: Log the selected file name
                        // console.log('Selected file for slide ' + (index + 1) + ': ' + selectedFile.name);
    
                        // // Debugging: Log the gallery image element
                        // console.log('Gallery image element:', galleryImages[index]);
    
                        // // Debugging: Log the thumbnail image element
                        // console.log('Thumbnail image element:', thumbnailImages[index]);
    
                        // Set the src attribute of the corresponding gallery image
                        galleryImages[index].src = URL.createObjectURL(selectedFile);
    
                        // Set the src attribute of the corresponding thumbnail image
                        thumbnailImages[index].src = URL.createObjectURL(selectedFile);
                    }
                });
            });
    
            // Additional JavaScript logic can be added as needed
            // ...
        });
        function submitForm() {
            // Get the HTML content from the Quill editor
            var quillHtml = document.querySelector('.js-description-editor .ql-editor').innerHTML;

            // Set the HTML content to the hidden input field
            document.getElementById('descriptionInput').value = quillHtml;
            console.log(document.getElementById('descriptionInput').value)

            // Submit the form
            document.getElementById('myForm').submit();
        }
    </script>
    
    
    

@endsection
