<!DOCTYPE html>
<html lang="ru">

<head>
    <title>LandingPage</title>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <!-- <style>body{opacity: 0;}</style> -->

    @vite([
        'public/assets/front/intl-tel-input-master/css/intlTelInput.min.css',
        'public/assets/front/css/style.min.css?_v=20240405161408',
    ])

    <link rel="shortcut icon" href="{{ asset('Fav.png') }}">
    <!-- <meta name="robots" content="noindex, nofollow"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="header-top">
                <div class="header-top__container">
                    <div class="header-top-block">
                        <div class="header-top__support">
                            <span>Круглосуточная поддержка</span>
                            <div class="header-top__support-phone">
                                <svg>
                                    <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#phone') }}"></use>
                                </svg>
                                <a href="tel:+375295450000">+375 29 545-00-00</a>
                            </div>

                        </div>
                        <div data-da=".menu__body,992,1" class="header-top__sale">
                            <div class="header-top__sale-links">
                                <ul>
                                    <li><a href="#">Рассрочка</a></li>
                                    <li><a href="#">Оплата</a></li>
                                    <li><a href="#">Доставка</a></li>
                                    <li><a href="#">Гарантия</a></li>
                                    <li><a href="#">Страхование</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="header-top__social">
                            <div class="header-top__social-mail">
                                <svg>
                                    <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#mail') }}"></use>
                                </svg>
                                <a href="mailto:mm@mtsbel.by">mm@mtsbel.by</a>
                            </div>
                            <div data-da=".menu__body,625,3" class="header-top__social-links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <svg>
                                                <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#telegram') }}"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg>
                                                <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#viber') }}"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg>
                                                <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#whatsap') }}"></use>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-body">
                <div class="header-body__container">
                    <div class="header-body-block">
                        <div class="header-body-block-button">
                            <div class="header-body-button">
                                <button type="button" class="menu__icon icon-menu"><span></span></button>
                            </div>
                            <div>Меню</div>
                        </div>

                        <div class="header-body__logo">
                            <a href="index.html">
                                <svg>
                                    <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#logo') }}"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="header-body__button">
                            <button type="button">
                                <svg>
                                    <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#burger') }}"></use>
                                </svg>
                                <span>Каталог</span>
                            </button>
                        </div>
                        <div data-da=".menu__body,992,0" class="header-body__search">
                            <label>
                                <svg>
                                    <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#search') }}"></use>
                                </svg>
                            </label>
                            <input autocomplete="off" type="search" name="form[]" placeholder="Поиск товара" class="input">
                        </div>
                        <div class="header-body__panel">
                            <a class="header-body__panel-compare" href="#">
                                <span>
                                    <svg>
                                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#sr') }}"></use>
                                    </svg>
                                </span>
                                <span>Сравнение</span>
                            </a>
                            <a class="header-body__panel-like" href="#">
                                <span>
                                    <svg>
                                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#heart') }}"></use>
                                    </svg>
                                </span>
                                <span>Избранное</span>
                            </a>
                            <a class="header-body__panel-cart" href="#">
                                <span>
                                    <svg>
                                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#cart') }}"></use>
                                    </svg>
                                </span>
                                <span>Корзина</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="header-bottom__container">
                    <div class="header-bottom-block">
                        <div class="header__menu menu">
                            <nav class="menu__body">
                                <ul class="menu__list">
                                    <li class="menu__item">
                                        <a href="#" class="menu__link">
                                            <svg>
                                                <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#sell') }}"></use>
                                            </svg>
                                            <span>Акции</span>
                                        </a>
                                    </li>
                                    <li class="menu__item"><a href="#" class="menu__link">Новинки</a></li>
                                    <li class="menu__item"><a href="#" class="menu__link">Увлажнители воздуха</a></li>
                                    <li class="menu__item"><a href="#" class="menu__link">Фены</a></li>
                                    <li class="menu__item"><a href="#" class="menu__link">Камеры видеонаблюдения</a></li>
                                    <li class="menu__item"><a href="#" class="menu__link">Умные колонки</a></li>
                                    <li class="menu__item"><a href="#" class="menu__link">Аксессуары</a></li>
                                    <li class="menu__item"><a href="#" class="menu__link">Освещение</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="page">
            @yield('content')
        </main>
        <footer class="footer">
            <div class="footer__container">
                <div class="footer-block">
                    <div class="footer-block-logo">
                        <div class="footer-block-logo__logo">
                            <a href="index.html">
                                <svg>
                                    <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#logo') }}"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="footer-block-logo__adress">
                            ул. Революционная, 24Б, каб.16 Минск, Республика Беларусь 220030
                        </div>
                        <div class="footer-block-logo__social">
                            <a href="#">
                                <svg>
                                    <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#instagram') }}"></use>
                                </svg>
                            </a>
                            <a href="#">
                                <svg>
                                    <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#vk') }}"></use>
                                </svg>
                            </a>
                            <a href="#">
                                <svg>
                                    <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#facebook') }}"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="footer-block-link">
                        <div class="footer-block-link__support">
                            <div class="support">Служба поддержки</div>
                            <a class="support-phone" href="tel:+375339900099">
                                <span>
                                    <svg>
                                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#phone') }}"></use>
                                    </svg>
                                </span>
                                +375 33 99 000 99
                            </a>
                            <div class="support-text">Круглосуточно 24/7</div>
                            <a class="support-mail" href="mailto:mm@mtsbel.by">
                                <span>
                                    <svg>
                                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#mail') }}"></use>
                                    </svg>
                                </span>
                                mm@mtsbel.by
                            </a>
                        </div>
                        <div class="footer-block-link__fast">
                            <div class="fast">Быстрые ссылки</div>
                            <ul>
                                <li>
                                    <a href="#">
                                        <svg>
                                            <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#sell') }}"></use>
                                        </svg>
                                        <span>Акции</span>
                                    </a>
                                </li>
                                <li><a href="#">Новинки</a></li>
                                <li><a href="#">Увлажнители воздуха</a></li>
                                <li><a href="#">Фены</a></li>
                                <li><a href="#">Камеры видеонаблюдения</a></li>
                                <li><a href="#">Умные колонки</a></li>
                                <li><a href="#">Аксессуары</a></li>
                                <li><a href="#">Освещение</a></li>
                            </ul>
                        </div>
                        <div class="footer-block-link__clients">
                            <div class="clients">Клиентам</div>
                            <ul>
                                <li><a href="#">Рассрочка</a></li>
                                <li><a href="#">Оплата</a></li>
                                <li><a href="#">Доставка</a></li>
                                <li><a href="#">Гарантия</a></li>
                                <li><a href="#">Страхование</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-copir">
                    © 2021 УП «МТС БЕЛИНВЕСТ» - провайдер экосистемных продуктов ПАО «МТС» (Российская Федерация) в Республике Беларусь
                    Все права защищены
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('assets/front/js/app.min.js?_v=20240405161408') }}"></script>
    <div id="popup" aria-hidden="true" class="popup">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close"><svg>
                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#close') }}"></use>
                    </svg></button>
                <div class="popup__text">
                    <div class="popup__image"><img src="{{ asset('assets/front/img/banner.png') }}" alt="Image"></div>
                    <div class="popup__title">
                        <h2>Быстрое оформление акустической системы Sonos</h2>
                    </div>
                    <div class="popup__form">
                        <form action="#">
                            <div class="form-group">
                                <label>Введите ФИО</label>
                                <input type="text" name="form[email]" data-required="email" data-error="Ошибка" placeholder="Иванов Иван Иванович" class="input">
                            </div>
                            <div class="form-group _form-group-block">
                                <div class="form-group-tel">
                                    <label>Телефон</label>
                                    <input id="phone" type="text" placeholder="" class="input">

                                </div>
                                <div class="form-group-mail">
                                    <label>E-mail</label>
                                    <input type="text" data-required="email" name="form[email]" data-error="Введен не верный E-mail" placeholder="Ivanov_Ivan@gmail.ru" class="input">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Комментарий</label>
                                <textarea cols="60" data-required="message" name="message" data-autoheight-min='145' placeholder="Введите текст" class="input"></textarea>
                            </div>
                            <div class="form-button-block">
                                <button type="submit" class="button">Оформить заказ</button>
                                <div class="checkbox">
                                    <input id="c_3" data-error="Помилка" class="checkbox__input" type="checkbox" value="1" name="form[]">
                                    <label for="c_3" class="checkbox__label"><span class="checkbox__text">Нажимая кнопку «Оформить заказ» вы даёте согласие на обработку ваших <a href="#" target="_blank">персональных данных</a></span></label>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/front/intl-tel-input-master/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/iti.js') }}"></script>
    <script>
        var input = document.querySelector("#phone");

        window.intlTelInput(input,({
            // excludeCountries: ["by"],
            localizedCountries: { 'by': 'Belarus' },
            autoPlaceholder:"polite",
            placeholderNumberType:"MOBILE",
        }));

    </script>
</body>
</html>

