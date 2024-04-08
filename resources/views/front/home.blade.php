@extends('front.layouts.layout')

@section('content')
    <div class="main-slider">
        <!-- Оболонка слайдера -->
        <div class="main-slider__slider swiper" effect="fade">
            <!-- Частина слайдера, що рухається -->
            <div class="main-slider__wrapper swiper-wrapper">
                <!-- Слайд -->
                <div class="main-slider__slide swiper-slide">
                    <div class="main-slider__container">
                        <div class="main-slide-info ">
                            <div class="main-slider__subtitle" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="500" data-swiper-parallax="-500">
                                <h3>Топ продаж</h3>
                            </div>
                            <div class="main-slider__title" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="500" data-swiper-parallax="-300">
                                <h1>Умная домашняя камера безопасности</h1>
                            </div>
                            <div class="main-slider__button" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="500" data-swiper-parallax="-200">
                                <a href="#" class="button">Перейти в каталог</a>
                            </div>
                        </div>

                    </div>
                    <div class="main-slider__image _camera">
                        <img src="{{ asset('assets/front/img/slider/s1.png') }}" alt="Image">
                        <img src="{{ asset('assets/front/img/slider/s1m.png') }}" alt="Image">
                    </div>

                </div>
                <div class="main-slider__slide swiper-slide">
                    <div class="main-slider__container">
                        <div class="main-slide-info ">
                            <div class="main-slider__subtitle" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="500" data-swiper-parallax="-500">
                                <h3>Новинка</h3>
                            </div>
                            <div class="main-slider__title" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="500" data-swiper-parallax="-300">
                                <h1>Умная колонка яндекс станция 2 с Алисой</h1>
                            </div>
                            <div class="main-slider__button" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="500" data-swiper-parallax="-200">
                                <a href="#" class="button">Перейти в каталог</a>
                            </div>
                        </div>

                    </div>
                    <div class="main-slider__image ">
                        <img src="{{ asset('assets/front/img/slider/s2.png') }}" alt="Image">
                        <img src="{{ asset('assets/front/img/slider/s2m.png') }}" alt="Image">
                    </div>

                </div>
                <div class="main-slider__slide swiper-slide">
                    <div class="main-slider__container">
                        <div class="main-slide-info ">
                            <div class="main-slider__subtitle _red" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="500" data-swiper-parallax="-500">
                                <h3>Выгодное предложение</h3>
                            </div>
                            <div class="main-slider__title _grey" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="500" data-swiper-parallax="-300">
                                <h1>Мойка и увлажнитель воздуха Smartmi Evaporative Humidifier 3</h1>
                            </div>
                            <div class="main-slider__button" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="500" data-swiper-parallax="-200">
                                <a href="#" class="button">Перейти в каталог</a>
                            </div>
                        </div>

                    </div>
                    <div class="main-slider__image">
                        <img src="{{ asset('assets/front/img/slider/s3.png') }}" alt="Image">
                        <img src="{{ asset('assets/front/img/slider/s3m.png') }}" alt="Image">
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="slader-buttons">
                <button type="button" class="swiper-button-prev">
                    <svg>
                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#right') }}"></use>
                    </svg>
                </button>
                <button type="button" class="swiper-button-next">
                    <svg>
                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#left') }}"></use>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    @include('front.layouts.categories')

    <!-- main-popular -->
    <div class="main-salle">
        <div class="main-salle__container">
            <div class="main-salle__slider swiper">
                <div class="main-salle__wrapper swiper-wrapper">
                    <div class="main-salle__slide swiper-slide _blue">
                        <div class="swiper-slide-salle">
                            <div class="swiper-slide-salle-info">
                                <div class="swiper-slide-salle-info__subtitle">
                                    <h5>Выгода до 25%</h5>
                                </div>
                                <div class="swiper-slide-salle-info__title">
                                    <h2>Умный Wi-Fi дверной видеозвонок</h2>
                                </div>
                                <div class="swiper-slide-salle-info__button">
                                    <a href="#">
                                        <span>Подробнее</span>
                                        <svg>
                                            <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#right') }}"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide-salle-image"><img src="{{ asset('assets/front/img/popular/06.png') }}" alt="Image"></div>
                        </div>
                    </div>
                    <div class="main-salle__slide swiper-slide _puprpl">
                        <div class="swiper-slide-salle">
                            <div class="swiper-slide-salle-info">
                                <div class="swiper-slide-salle-info__subtitle">
                                    <h5>Новинка</h5>
                                </div>
                                <div class="swiper-slide-salle-info__title">
                                    <h2>Умный домашний очиститель воздуха</h2>
                                </div>
                                <div class="swiper-slide-salle-info__button">
                                    <a href="#">
                                        <span>Подробнее</span>
                                        <svg>
                                            <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#right') }}"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide-salle-image">
                                <img src="{{ asset('assets/front/img/popular/07.png') }}" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('front.layouts.companies')

    @include('front.layouts.products')

    <!-- main-bestseller -->
    <section class="main-banner">
        <div class="main-banner__container">
            <div class="main-banner-block">
                <div class="main-banner-block-info">
                    <div class="main-banner-block-info__subtitle">
                        <h5>Выгода до 20%</h5>
                    </div>
                    <div class="main-banner-block-info__title">
                        <h2>Новая коллекция с выгодой до 20%</h2>
                    </div>
                    <div class="main-banner-block-info__text">Оформите заказ прямо сейчас и получите скидку до 20%</div>
                    <div class="main-banner-block-info__button">
                        <a href="#" class="button">Купить сейчас</a>
                    </div>
                </div>
                <div class="main-banner-block-image">
                    <img src="{{ asset('assets/front/img/banner.png') }}" alt="Image">
                </div>
            </div>
        </div>
    </section>

    @include('front.layouts.services')

    <!-- services -->
    <section class="main-video">
        <div class="main-video__container">
            <div class="main-video-block">
                <div class="main-video-block-info">
                    <div class="main-video-block-info__title">
                        <h2>Отзывы наших клиентов</h2>
                    </div>
                    <div class="main-video-block-info__subtitle">
                        <h5>Более 100 000+ довольных клиентов пользуются устройствами умного дома!</h5>
                    </div>
                    <div class="main-video-block-info__text">Более 80 000+ положительных отзывов об устройствах умного дома (4,8/5,0 рейтинг). Вот самые популярные из них</div>
                    <div class="main-video-block-info__button">
                        <a href="#">
                            <span>Все отзывы</span>
                            <svg>
                                <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#right') }}"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <div data-da=".main-video-block-info,1050,1" class="main-video-block-video">
                    <iframe src="https://www.youtube.com/embed/9xe4MMsJgTM?si=fmgQa319V1iREaMc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    @include('front.layouts.feedbacks')

    <!-- main-review -->
    <div class="subscribe">
        <div class="subscribe__container">
            <div class="subscribe__title">
                <h2>Будьте в курсе новых акций и предложений</h2>
            </div>
            <div class="subscribe__subtitle">Мы ценим вас и присылаем только нужную информацию, об условиях акций и конкурсов, никакого спама!</div>
            <div class="subscribe-form">
                <form data-goto-error action="{{ route('front.mail.submit') }}" method="POST">
                    @csrf
                    <div class="form-block">
                        <input type="text" name="email" data-required="email" data-error="Введите E-mail корректно" placeholder="Введите ваш E-mail" class="input">
                        <button type="submit" class="button _sibscribe-button">Подписаться</button>
                    </div>
                    <div class="checkbox">
                        <input id="c_1" data-error="Ошибка" class="checkbox__input _subscribe-checkbox" type="checkbox" value="1" name="form[]" data-required="checkbox">
                        <label for="c_1" class="checkbox__label"><span class="checkbox__text">Даю согласие на обработку моих <a href="#" target="_blank">персональных данных</a> для получения рекламно-информационной рассылки</span></label>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
