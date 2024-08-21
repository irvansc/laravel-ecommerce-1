@extends('layouts.app')

@section('content')
    <style>
        .filled-heart {
            color: orange;
        }
    </style>
    <main class="pt-90">
        <section class="shop-main container d-flex pt-4 pt-xl-5">
            <div class="shop-sidebar side-sticky bg-body" id="shopFilter">
                <div class="aside-header d-flex d-lg-none align-items-center">
                    <h3 class="text-uppercase fs-6 mb-0">Filter By</h3>
                    <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
                </div>

                <div class="pt-4 pt-lg-0"></div>

                <div class="accordion" id="categories-list">
                    <div class="accordion-item mb-4 pb-3">
                        <h5 class="accordion-header" id="accordion-heading-1">
                            <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                                data-bs-toggle="collapse" data-bs-target="#accordion-filter-1" aria-expanded="true"
                                aria-controls="accordion-filter-1">
                                Product Categories
                                <svg class="accordion-button__icon type2" viewBox="0 0 10 6"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                        <path
                                            d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                    </g>
                                </svg>
                            </button>
                        </h5>
                        <div id="accordion-filter-1" class="accordion-collapse collapse show border-0"
                            aria-labelledby="accordion-heading-1" data-bs-parent="#categories-list">
                            <div class="accordion-body px-0 pb-0 pt-3">
                                <ul class="list list-inline mb-0 category-list">
                                    @foreach ($categories as $category)
                                        <li class="list-item d-flex justify-content-between align-items-center">
                                            <span class="menu-link py-1"> <input type="checkbox" name="categories"
                                                    value="{{ $category->id }}" class="chk-category"
                                                    @if (in_array($category->id, explode(',', $f_categories))) checked="checked" @endif />
                                                {{ $category->name }}</span> <span
                                                class="text-right">{{ $category->products()->count() }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion" id="color-filters">
                    <div class="accordion-item mb-4 pb-3">
                        <h5 class="accordion-header" id="accordion-heading-1">
                            <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                                data-bs-toggle="collapse" data-bs-target="#accordion-filter-2" aria-expanded="true"
                                aria-controls="accordion-filter-2">
                                Color
                                <svg class="accordion-button__icon type2" viewBox="0 0 10 6"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                        <path
                                            d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                    </g>
                                </svg>
                            </button>
                        </h5>
                        <div id="accordion-filter-2" class="accordion-collapse collapse show border-0"
                            aria-labelledby="accordion-heading-1" data-bs-parent="#color-filters">
                            <div class="accordion-body px-0 pb-0">
                                <div class="d-flex flex-wrap">
                                    <a href="#" class="swatch-color js-filter" style="color: #0a2472"></a>
                                    <a href="#" class="swatch-color js-filter" style="color: #d7bb4f"></a>
                                    <a href="#" class="swatch-color js-filter" style="color: #282828"></a>
                                    <a href="#" class="swatch-color js-filter" style="color: #b1d6e8"></a>
                                    <a href="#" class="swatch-color js-filter" style="color: #9c7539"></a>
                                    <a href="#" class="swatch-color js-filter" style="color: #d29b48"></a>
                                    <a href="#" class="swatch-color js-filter" style="color: #e6ae95"></a>
                                    <a href="#" class="swatch-color js-filter" style="color: #d76b67"></a>
                                    <a href="#" class="swatch-color swatch_active js-filter"
                                        style="color: #bababa"></a>
                                    <a href="#" class="swatch-color js-filter" style="color: #bfdcc4"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="accordion" id="size-filters">
                    <div class="accordion-item mb-4 pb-3">
                        <h5 class="accordion-header" id="accordion-heading-size">
                            <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                                data-bs-toggle="collapse" data-bs-target="#accordion-filter-size" aria-expanded="true"
                                aria-controls="accordion-filter-size">
                                Sizes
                                <svg class="accordion-button__icon type2" viewBox="0 0 10 6"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                        <path
                                            d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                    </g>
                                </svg>
                            </button>
                        </h5>
                        <div id="accordion-filter-size" class="accordion-collapse collapse show border-0"
                            aria-labelledby="accordion-heading-size" data-bs-parent="#size-filters">
                            <div class="accordion-body px-0 pb-0">
                                <div class="d-flex flex-wrap">
                                    <a href="#"
                                        class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">XS</a>
                                    <a href="#"
                                        class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">S</a>
                                    <a href="#"
                                        class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">M</a>
                                    <a href="#"
                                        class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">L</a>
                                    <a href="#"
                                        class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">XL</a>
                                    <a href="#"
                                        class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">XXL</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="accordion" id="brand-filters">
                    <div class="accordion-item mb-4 pb-3">
                        <h5 class="accordion-header" id="accordion-heading-brand">
                            <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                                data-bs-toggle="collapse" data-bs-target="#accordion-filter-brand" aria-expanded="true"
                                aria-controls="accordion-filter-brand">
                                Brands
                                <svg class="accordion-button__icon type2" viewBox="0 0 10 6"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                        <path
                                            d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                    </g>
                                </svg>
                            </button>
                        </h5>
                        <div id="accordion-filter-brand" class="accordion-collapse collapse show border-0"
                            aria-labelledby="accordion-heading-brand" data-bs-parent="#brand-filters">
                            <div class="search-field multi-select accordion-body px-0 pb-0">
                                <ul class="list list-inline mb-0 brand-list">
                                    @foreach ($brands as $brand)
                                        <li class="list-item d-flex justify-content-between align-items-center">
                                            <span class="menu-link py-1">
                                                <input type="checkbox" name="brands" value="{{ $brand->id }}"
                                                    class="chk-brand"
                                                    @if (in_array($brand->id, explode(',', $f_brands))) checked="checked" @endif />
                                                {{ $brand->name }}
                                            </span>
                                            <span class="text-right">
                                                {{ $brand->products()->count() }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="accordion" id="price-filters">
                    <div class="accordion-item mb-4">
                        <h5 class="accordion-header mb-2" id="accordion-heading-price">
                            <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                                data-bs-toggle="collapse" data-bs-target="#accordion-filter-price" aria-expanded="true"
                                aria-controls="accordion-filter-price">
                                Price
                                <svg class="accordion-button__icon type2" viewBox="0 0 10 6"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                        <path
                                            d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                    </g>
                                </svg>
                            </button>
                        </h5>
                        <div id="accordion-filter-price" class="accordion-collapse collapse show border-0"
                            aria-labelledby="accordion-heading-price" data-bs-parent="#price-filters">
                            <input class="price-range-slider" type="text" name="price_range" value=""
                                data-slider-min="1" data-slider-max="1000" data-slider-step="5"
                                data-slider-value="[{{ $min_price }},{{ $max_price }}]" data-currency="$" />
                            <div class="price-range__info d-flex align-items-center mt-2">
                                <div class="me-auto">
                                    <span class="text-secondary">Min Price: </span>
                                    <span class="price-range__min">$1</span>
                                </div>
                                <div>
                                    <span class="text-secondary">Max Price: </span>
                                    <span class="price-range__max">$1000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shop-list flex-grow-1">
                <div class="swiper-container js-swiper-slider slideshow slideshow_small slideshow_split"
                    data-settings='{
                            "autoplay": {
                            "delay": 5000
                            },
                            "slidesPerView": 1,
                            "effect": "fade",
                            "loop": true,
                            "pagination": {
                            "el": ".slideshow-pagination",
                            "type": "bullets",
                            "clickable": true
                            }
                        }'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slide-split h-100 d-block d-md-flex overflow-hidden">
                                <div class="slide-split_text position-relative d-flex align-items-center"
                                    style="background-color: #f5e6e0;">
                                    <div class="slideshow-text container p-3 p-xl-5">
                                        <h2
                                            class="text-uppercase section-title fw-normal mb-3 animate animate_fade animate_btt animate_delay-2">
                                            Women's <br /><strong>ACCESSORIES</strong></h2>
                                        <p class="mb-0 animate animate_fade animate_btt animate_delay-5">Accessories are
                                            the best way to
                                            update your look. Add a title edge with new styles and new colors, or go for
                                            timeless pieces.</h6>
                                    </div>
                                </div>
                                <div class="slide-split_media position-relative">
                                    <div class="slideshow-bg" style="background-color: #f5e6e0;">
                                        <img loading="lazy"
                                            src="{{ asset('frontend') }}/assets/images/shop/shop_banner3.jpg"
                                            width="630" height="450" alt="Women's accessories"
                                            class="slideshow-bg__img object-fit-cover" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="slide-split h-100 d-block d-md-flex overflow-hidden">
                                <div class="slide-split_text position-relative d-flex align-items-center"
                                    style="background-color: #f5e6e0;">
                                    <div class="slideshow-text container p-3 p-xl-5">
                                        <h2
                                            class="text-uppercase section-title fw-normal mb-3 animate animate_fade animate_btt animate_delay-2">
                                            Women's <br /><strong>ACCESSORIES</strong></h2>
                                        <p class="mb-0 animate animate_fade animate_btt animate_delay-5">Accessories are
                                            the best way to
                                            update your look. Add a title edge with new styles and new colors, or go for
                                            timeless pieces.</h6>
                                    </div>
                                </div>
                                <div class="slide-split_media position-relative">
                                    <div class="slideshow-bg" style="background-color: #f5e6e0;">
                                        <img loading="lazy"
                                            src="{{ asset('frontend') }}/assets/images/shop/shop_banner3.jpg"
                                            width="630" height="450" alt="Women's accessories"
                                            class="slideshow-bg__img object-fit-cover" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="slide-split h-100 d-block d-md-flex overflow-hidden">
                                <div class="slide-split_text position-relative d-flex align-items-center"
                                    style="background-color: #f5e6e0;">
                                    <div class="slideshow-text container p-3 p-xl-5">
                                        <h2
                                            class="text-uppercase section-title fw-normal mb-3 animate animate_fade animate_btt animate_delay-2">
                                            Women's <br /><strong>ACCESSORIES</strong></h2>
                                        <p class="mb-0 animate animate_fade animate_btt animate_delay-5">Accessories are
                                            the best way to
                                            update your look. Add a title edge with new styles and new colors, or go for
                                            timeless pieces.</h6>
                                    </div>
                                </div>
                                <div class="slide-split_media position-relative">
                                    <div class="slideshow-bg" style="background-color: #f5e6e0;">
                                        <img loading="lazy"
                                            src="{{ asset('frontend') }}/assets/images/shop/shop_banner3.jpg"
                                            width="630" height="450" alt="Women's accessories"
                                            class="slideshow-bg__img object-fit-cover" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container p-3 p-xl-5">
                        <div
                            class="slideshow-pagination d-flex align-items-center position-absolute bottom-0 mb-4 pb-xl-2">
                        </div>

                    </div>
                </div>

                <div class="mb-3 pb-2 pb-xl-3"></div>

                <div class="d-flex justify-content-between mb-4 pb-md-2">
                    <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
                        <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
                        <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                        <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">The Shop</a>
                    </div>

                    <div
                        class="shop-acs d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
                        <select class="shop-acs__select form-select w-auto border-0 py-0 order-1 order-md-0"
                            aria-label="Sort Items" id="sorting" name="sorting">
                            <option value="default" {{ $sorting == 'default' ? 'selected' : '' }}>Default Sorting</option>
                            <option value="date" {{ $sorting == 'date' ? 'selected' : '' }}>Sort by newness</option>
                            <option value="price"{{ $sorting == 'price' ? 'selected' : '' }}>Sort by price: low to high
                            </option>
                            <option value="price-desc" {{ $sorting == 'price-desc' ? 'selected' : '' }}>Sort by price:
                                high
                                to
                                low</option>
                        </select>

                        <div class="shop-asc__seprator mx-3 bg-light d-none d-md-block order-md-0"></div>

                        <div class="col-size align-items-center order-1 d-none d-lg-flex">
                            <span class="text-uppercase fw-medium me-2">View</span>
                            <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid"
                                data-cols="2">2</button>
                            <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid"
                                data-cols="3">3</button>
                            <button class="btn-link fw-medium js-cols-size" data-target="products-grid"
                                data-cols="4">4</button>
                        </div>

                        <div class="shop-filter d-flex align-items-center order-0 order-md-3 d-lg-none">
                            <button class="btn-link btn-link_f d-flex align-items-center ps-0 js-open-aside"
                                data-aside="shopFilter">
                                <svg class="d-inline-block align-middle me-2" width="14" height="10"
                                    viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_filter" />
                                </svg>
                                <span class="text-uppercase fw-medium d-inline-block align-middle">Filter</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="products-grid row row-cols-2 row-cols-md-3" id="products-grid">
                    @foreach ($products as $product)
                        <div class="product-card-wrapper">
                            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                                <div class="pc__img-wrapper">
                                    <div class="swiper-container background-img js-swiper-slider"
                                        data-settings='{"resizeObserver": true}'>
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <a
                                                    href="{{ route('shop.product.details', ['product_slug' => $product->slug]) }}">
                                                    <img loading="lazy"
                                                        src="{{ asset('uploads/products') }}/{{ $product->image }}"
                                                        width="330" height="400" alt="Cropped Faux leather Jacket"
                                                        class="pc__img">
                                                </a>
                                            </div>
                                            @foreach (explode(',', $product->images) as $gimg)
                                                <div class="swiper-slide">
                                                    <a
                                                        href="{{ route('shop.product.details', ['product_slug' => $product->slug]) }}">
                                                        <img loading="lazy"
                                                            src="{{ asset('uploads/products') }}/{{ trim($gimg) }}"
                                                            width="330" height="400"
                                                            alt="Cropped Faux leather Jacket" class="pc__img">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_prev_sm" />
                                            </svg></span>
                                        <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_next_sm" />
                                            </svg></span>
                                    </div>
                                    @if (Cart::instance('cart')->content()->Where('id', $product->id)->count() > 0)
                                        <a href="{{ route('cart.index') }}"
                                            class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart btn-warning">Go
                                            to Cart</a>
                                    @else
                                        <form name="addtocart-form" method="POST" action="{{ route('cart.store') }}">
                                            @csrf
                                            <div class="product-single__addtocart">
                                                <input type="hidden" name="id" value="{{ $product->id }}" />
                                                <input type="hidden" name="name" value="{{ $product->name }}" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="price"
                                                    value="{{ $product->sale_price == '' ? $product->regular_price : $product->sale_price }}" />
                                                <button type="submit"
                                                    class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart">Add
                                                    to Cart</button>
                                            </div>
                                        </form>
                                    @endif
                                </div>

                                <div class="pc__info position-relative">
                                    <p class="pc__category">{{ $product->category->name }}</p>
                                    <h6 class="pc__title"><a
                                            href="{{ route('shop.product.details', ['product_slug' => $product->slug]) }}">{{ $product->name }}</a>
                                    </h6>
                                    <div class="product-card__price d-flex">
                                        <span class="money price">
                                            @if ($product->sale_price)
                                                <s>${{ $product->regular_price }}</s> ${{ $product->sale_price }}
                                                {{ round((($product->regular_price - $product->sale_price) * 100) / $product->regular_price) }}
                                                % OFF
                                            @else
                                                {{ $product->regular_price }}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="product-card__review d-flex align-items-center">
                                        <div class="reviews-group d-flex">
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                        </div>
                                        <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
                                    </div>

                                    @if (Cart::instance('wishlist')->content()->Where('id', $product->id)->count() > 0)
                                        <form method="POST"
                                            action="{{ route('wishlist.remove', ['rowId' => Cart::instance('wishlist')->content()->Where('id', $product->id)->first()->rowId]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 filled-heart"
                                                title="Remove from Wishlist">
                                                <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <use href="#icon_heart" />
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('wishlist.add') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}" />
                                            <input type="hidden" name="name" value="{{ $product->name }}" />
                                            <input type="hidden" name="quantity" value="1" />
                                            <input type="hidden" name="price"
                                                value="{{ $product->sale_price == '' ? $product->regular_price : $product->sale_price }}" />
                                            <button type="submit"
                                                class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0"
                                                title="Add To Wishlist">
                                                <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <use href="#icon_heart" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </section>
    </main>

    <form id="frmfilter" method="GET">
        <input type="hidden" name="page" value="{{ $products->currentPage() }}">
        <input type="hidden" name="size" value="{{ $size }}">
        <input type="hidden" id="order" name="order" value="{{ $order }}" />
        <input type="hidden" name="brands" id="hdnBrands" />
        <input type="hidden" name="categories" id="hdnCategories" />
        <input type="hidden" name="min" id="hdnMinPrice" value="{{ $min_price }}" />
        <input type="hidden" name="max" id="hdnMaxPrice" value="{{ $max_price }}" />
    </form>
@endsection

@push('scripts')
    <script>
        $(function() {
            // Event listener untuk sorting
            $("#sorting").on("change", function() {
                $("#order").val($("#sorting option:selected").val());
                $("#frmfilter").submit();
            });

            // Event listener untuk brand filter
            $("input[name='brands']").on("change", function() {
                var brands = "";
                $("input[name='brands']:checked").each(function() {
                    if (brands == "") {
                        brands += $(this).val();
                    } else {
                        brands += "," + $(this).val();
                    }
                });
                $("#hdnBrands").val(brands);
                $("#frmfilter").submit();
            });

            // Event listener untuk category filter
            $("input[name='categories']").on("change", function() {
                var categories = "";
                $("input[name='categories']:checked").each(function() {
                    if (categories == "") {
                        categories += $(this).val();
                    } else {
                        categories += "," + $(this).val();
                    }
                });
                $("#hdnCategories").val(categories);
                $("#frmfilter").submit();
            });
            // price range
            $("[name='price_range']").on("change", function() {
                $("#hdnMinPrice").val($(this).val().split(',')[0]);
                $("#hdnMaxPrice").val($(this).val().split(',')[1]);
                $("#frmfilter").submit();
            });
        });
    </script>
@endpush
