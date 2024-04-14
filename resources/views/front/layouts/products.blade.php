@php use App\Http\Resources\ProductResource; @endphp
@isset($products)
    <!-- main-brand -->
    <section class="main-bestseller">
        <div class="main-bestseller__container">
            <div class="main-bestseller__title">
                <h2>Хиты продаж</h2>
            </div>
            <div class="main-bestseller-block">
                <!-- Оболонка слайдера -->
                <div class="main-bestseller-block__slider swiper">
                    <!-- Частина слайдера, що рухається -->
                    <div class="main-bestseller-block__wrapper swiper-wrapper">
                        <!-- Слайд -->
                        @foreach($products as $product)
                            <div class="main-bestseller-block__slide swiper-slide" data-category="{{ $product->category_id }}" data-id="{{ $product->id }}">
                                <div class="main-bestseller-block-card">
                                    <div class="main-bestseller-block-card__head">
                                        <div class="main-bestseller-block-card__head-image">
                                            <img data-popup="#card-{{ $product->id }}" src="{{ $product->getPhoto() }}" alt="{{ $product->title }}">
                                        </div>
                                        <div class="main-bestseller-block-card__head-favorit">
                                            <span class="heart">
                                                <svg>
                                                    <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#heart') }}"></use>
                                                </svg>
                                            </span>
                                            <span class="compare">
                                                <svg>
                                                    <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#sr') }}"></use>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="main-bestseller-block-card__body">
                                        <div class="main-bestseller-block-card__body-type">{{ $product->category }}</div>
                                        <div class="main-bestseller-block-card__body-title">
                                            <h5>{{ $product->title }}</h5>
                                        </div>
                                        <div class="main-bestseller-block-card__body-coast">
                                            <div class="body-coast-block">
                                                <div class="body-coast-block__price">
                                                    <span>{{ ($product->getSalePrice() != 0) ? $product->getSalePrice() : $product->getPrice() }}</span>
                                                    <span> руб</span>
                                                    @if($product->getSalePrice())
                                                        <s>{{ $product->getPrice() }} руб</s>
                                                    @endif
                                                </div>
                                                <a data-popup="#popup" href="#" class="body-coast-block__cart">
                                                    <svg>
                                                        <use
                                                            xlink:href="{{ asset('assets/front/img/icons/icons.svg#cart') }}"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="product_data" value="{{ json_encode(new ProductResource($product)) }}">
                            </div>
                        @endforeach
                    </div>

                    <!-- Якщо потрібна навігація (ліворуч/праворуч) -->
                    <button type="button" class="swiper-button-prev _body-coast-prev">
                        <svg>
                            <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#left') }}"></use>
                        </svg>
                    </button>
                    <button type="button" class="swiper-button-next _body-coast-next">
                        <svg>
                            <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#right') }}"></use>
                        </svg>
                    </button>
                </div>


            </div>
        </div>
    </section>
@endisset
