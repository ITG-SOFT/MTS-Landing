@isset($feedbacks)
    <!-- main-video -->
    <div class="main-review">
        <div class="main-review__container">
            <div class="main-review__slider swiper">
                <div class="main-review__wrapper swiper-wrapper">
                    @foreach($feedbacks as $feedback)
                        <div class="main-review__slide swiper-slide">
                            <div class="main-review-card">
                                <div class="main-review-card-head">
                                    <div class="main-review-card-head__user">
                                        <img src="{{ $feedback->getPhoto() }}" alt="{{ $feedback->name }}">
                                    </div>
                                    <div class="main-review-card-head__info">
                                        <div class="main-review-card-head__info-star">{{ $feedback->rate }},0
                                            <span>
                                                    <svg>
                                                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#star') }}"></use>
                                                    </svg>
                                                </span>
                                        </div>
                                        <div class="ain-review-card-head__info-title">
                                            <h5>{{ $feedback->name }}</h5>
                                        </div>
                                        <div class="ain-review-card-head__info-date">{{ $feedback->getCreatedAt() }}</div>
                                    </div>
                                </div>
                                <div class="main-review-card-body">
                                    <div>
                                        {!! $feedback->text !!}
                                    </div>
                                    <div class="main-review-card-body__button">
                                        <a href="#">
                                            <span>Все отзывы</span>
                                            <svg>
                                                <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#right') }}"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <button type="button" class="swiper-button-prev _rebiew-prev">
                    <svg>
                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#left') }}"></use>
                    </svg>
                </button>
                <button type="button" class="swiper-button-next _rebiew-next">
                    <svg>
                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#right') }}"></use>
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endisset
