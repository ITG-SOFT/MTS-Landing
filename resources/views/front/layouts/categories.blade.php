@isset($categories)
    @if($categories?->count() != 0)
        <section class="main-popular">
            <div class="main-popular__container">
                <div class="main-popular__title">
                    <h2>Популярные категории</h2>
                    <a href="#">
                        <span>Все категории</span>
                        <svg>
                            <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#right') }}"></use>
                        </svg>
                    </a>
                </div>
                <div class="main-popular-block">
                    <div class="main-popular-block__slider swiper">
                        <div class="main-popular-block__wrapper swiper-wrapper">
                            @foreach($categories as $category)
                                <div class="main-popular-block__slide swiper-slide">
                                    <a href="#" class="main-popular-block-card">
                                        <div class="main-popular-block-card__image">
                                            <img src="{{ $category->getPhoto() }}" alt="{{ $category->title }}">
                                        </div>
                                        <div class="main-popular-block-card__title">
                                            <h4>{{ $category->title }}</h4>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endisset
