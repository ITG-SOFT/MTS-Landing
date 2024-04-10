<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Главная MTS</title>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <!-- <style>body{opacity: 0;}</style> -->

    @vite([
        'public/assets/front/intl-tel-input-master/css/intlTelInput.min.css',
        'public/assets/front/css/style.min.css',
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
                            <a href="/">
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
                            <a data-popup="#compared" class="header-body__panel-compare" href="#">
                                <span>
                                    <svg>
                                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#sr') }}"></use>
                                    </svg>
                                </span>
                                <span>Сравнение</span>
                                <div class="compare-count">0</div>
                            </a>
                            <a data-popup="#favorites" class="header-body__panel-like" href="#">
                                <span>
                                    <svg>
                                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#heart') }}"></use>
                                    </svg>
                                </span>
                                <span>Избранное</span>
                                <div class="like-count">0</div>
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
                            <a href="/">
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
    <script src="{{ asset('assets/front/js/app.min.js?_v=20240408125514') }}"></script>

    <div id="popup" aria-hidden="true" class="popup">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close">
                    <svg>
                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#close') }}"></use>
                    </svg>
                </button>
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
                                    <input id="phone" type="text" name="form[]" placeholder="" class="input">
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
                                <button data-popup="#accepted" type="submit" class="button">Оформить заказ</button>
                                <div class="checkbox">
                                    <input data-required="checkbox" id="c_3" data-error="Ошибка" class="checkbox__input" type="checkbox" value="1" name="form[]">
                                    <label for="c_3" class="checkbox__label">
                                        <span class="checkbox__text">
                                            Нажимая кнопку «Оформить заказ» вы даёте согласие на обработку ваших
                                            <a href="#" target="_blank">персональных данных</a>
                                        </span>
                                    </label>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- popup accepted -->
    <div id="accepted" aria-hidden="true" class="popup _popup-accepted">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close">
                    <svg>
                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#close') }}"></use>
                    </svg>
                </button>
                <div class="popup__text">
                    <div class="accepted-block">
                        <div class="accepted-block__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="101" height="100" viewBox="0 0 101 100"
                                 fill="none">
                                <path
                                    d="M44.9366 63.9989C44.3729 63.9981 43.8288 63.792 43.406 63.4191C39.4865 59.9635 32.7608 53.9567 31.8099 52.6811C31.4624 52.1706 31.3319 51.543 31.4472 50.9362C31.5624 50.3295 31.914 49.7934 32.4245 49.4458C32.9351 49.0983 33.5627 48.9678 34.1695 49.0831C34.7762 49.1983 35.3123 49.5499 35.6598 50.0604C36.286 50.849 40.5302 54.6989 44.8207 58.5256L67.5721 36.9337C68.0181 36.5093 68.6143 36.2794 69.2298 36.2947C69.8452 36.3099 70.4294 36.5689 70.8538 37.0149C71.2782 37.4608 71.5081 38.0571 71.4929 38.6725C71.4776 39.288 71.2186 39.8722 70.7726 40.2966L46.4673 63.4887C46.0346 63.8365 45.4915 64.0175 44.9366 63.9989Z"
                                    fill="#E30611"/>
                                <path
                                    d="M51.4463 95.8925C42.5567 95.8925 33.8668 93.2565 26.4755 88.3177C19.0841 83.379 13.3232 76.3593 9.92134 68.1465C6.51947 59.9336 5.62939 50.8964 7.36365 42.1777C9.09791 33.459 13.3786 25.4503 19.6645 19.1645C25.9503 12.8786 33.959 8.59791 42.6777 6.86364C51.3964 5.12938 60.4336 6.01949 68.6465 9.42137C76.8593 12.8232 83.879 18.5841 88.8177 25.9755C93.7565 33.3669 96.3926 42.0568 96.3926 50.9463C96.3742 62.8611 91.6328 74.2827 83.2078 82.7078C74.7827 91.1329 63.3611 95.8741 51.4463 95.8925ZM51.4463 10.6384C43.4741 10.6384 35.681 13.0025 29.0524 17.4316C22.4239 21.8606 17.2575 28.1558 14.2067 35.5211C11.1559 42.8864 10.3577 50.991 11.9129 58.81C13.4682 66.6289 17.3072 73.8111 22.9443 79.4482C28.5815 85.0854 35.7636 88.9243 43.5826 90.4796C51.4016 92.0349 59.5061 91.2367 66.8714 88.1859C74.2367 85.1351 80.532 79.9687 84.961 73.3401C89.3901 66.7115 91.7541 58.9184 91.7541 50.9463C91.7419 40.2598 87.4912 30.0144 79.9347 22.4579C72.3782 14.9014 62.1328 10.6507 51.4463 10.6384Z"
                                    fill="#E30611"/>
                            </svg>
                        </div>
                        <div class="accepted-block__title">
                            <h2>Спасибо, <br> Ваша заказ принят!</h2>
                        </div>
                        <div class="accepted-block__text">Наши специалисты свяжутся с вами в ближайшее время</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- popup reviev -->
    <div id="reviev-popup" aria-hidden="true" class="popup _popup-reviev">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close">
                    <svg>
                        <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#close') }}"></use>
                    </svg>
                </button>
                <div class="popup__text">
                    <div class="main-review-card">
                        <div class="main-review-card-head">
                            <div class="main-review-card-head__user">
                                <img src="img/user/02.png" alt="Image">
                            </div>
                            <div class="main-review-card-head__info">
                                <div class="main-review-card-head__info-star">4,9
                                    <span>
                                        <svg>
											<use xlink:href="img/icons/icons.svg#star"></use>
										</svg>
                                    </span>
                                </div>
                                <div class="ain-review-card-head__info-title">
                                    <h5>Михаил Покровский</h5>
                                </div>
                                <div class="ain-review-card-head__info-date">17 марта 2024</div>
                            </div>
                        </div>
                        <div class="main-review-card-body">
                            <p>
                                Эта умная колонка - настоящее чудо техники! Она не только воспроизводит мою любимую
                                музыку с отличным качеством звука, но и отвечает на мои голосовые команды, помогает
                                управлять умным домом и даже рассказывает шутки. Это так удобно - просто спросить у
                                колонки о погоде или последних новостях, не отрываясь от дел. Она стала незаменимым
                                ассистентом в моем повседневном быте, и я наслаждаюсь каждой минутой, проведенной с ней.
                                Очень рекомендую всем, кто ценит современные технологии и удобство!"
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- _popup-favorites -->
    <div id="favorites" aria-hidden="true" class="popup _popup-favorites">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close">
                    <svg>
                        <use xlink:href="img/icons/icons.svg#close"></use>
                    </svg>
                </button>
                <div class="popup__text">
                    <div class="popup-favorite">
                        <div class="popup-favorite__title">
                            <h2>Мое избранное</h2>
                        </div>
                        <div class="popup-favorite-wrapper">
                            <table class="popup-favorite-table" border="1">
                                <thead>
                                <tr>
                                    <th>Изображение</th>
                                    <th>Наименование</th>
                                    <th>Модель</th>
                                    <th>Наличие</th>
                                    <th>Цена</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody class="popup-favorite-table-body">
                                <!-- Здесь будут добавляться строки -->
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- popup cart -->
    <div id="cart" aria-hidden="true" class="popup _popup-cart">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close">
                    <svg>
                        <use xlink:href="img/icons/icons.svg#close"></use>
                    </svg>
                </button>
                <div class="popup__text">
                    <div class="popup-cart">
                        <div class="popup-cart-title">
                            <h2>Моя корзина</h2><span class="remove-all">Удалить все</span>
                        </div>
                        <div class="popup-cart-table">
                            <table class="cart-table">
                                <thead>
                                <tr>
                                    <th>Товар</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                    <th>Итого</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="cart-table-body">
                                <tr>
                                    <td>
                                        <div class="image-cart-block">
                                            <div class="image-cart"><img src="img/cards/01.png" alt="Image"></div>
                                            <div class="cart-name">
                                                <h5>Умный Wi-Fi дверной видеозвонок Ring XS53 - H4</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart-price">240 руб</td>
                                    <td class="cart-counts">
                                        <div class="quantity-block">
                                            <div data-quantity class="quantity">
                                                <button data-quantity-minus type="button"
                                                        class="quantity__button quantity__button--minus"></button>
                                                <div class="quantity__input">
                                                    <input data-quantity-value autocomplete="off" type="text"
                                                           name="form[]" value="1">
                                                </div>
                                                <button data-quantity-plus type="button"
                                                        class="quantity__button quantity__button--plus"></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-cost-gud">480 руб</td>
                                    <td class="remuve-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31"
                                             viewBox="0 0 31 31" fill="none">
                                            <path d="M8.40234 8.5L22.4023 22.5M8.40234 22.5L22.4023 8.5"
                                                  stroke-width="1.5" stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
                                        </svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="image-cart-block">
                                            <div class="image-cart"><img src="img/cards/01.png" alt="Image"></div>
                                            <div class="cart-name">
                                                <h5>Умный Wi-Fi дверной видеозвонок Ring XS53 - H4</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart-price">240 руб</td>
                                    <td class="cart-counts">
                                        <div class="quantity-block">
                                            <div data-quantity class="quantity">
                                                <button data-quantity-minus type="button"
                                                        class="quantity__button quantity__button--minus"></button>
                                                <div class="quantity__input">
                                                    <input data-quantity-value autocomplete="off" type="text"
                                                           name="form[]" value="1">
                                                </div>
                                                <button data-quantity-plus type="button"
                                                        class="quantity__button quantity__button--plus"></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-cost-gud">480 руб</td>
                                    <td class="remuve-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31"
                                             viewBox="0 0 31 31" fill="none">
                                            <path d="M8.40234 8.5L22.4023 22.5M8.40234 22.5L22.4023 8.5"
                                                  stroke-width="1.5" stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
                                        </svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="image-cart-block">
                                            <div class="image-cart"><img src="img/cards/01.png" alt="Image"></div>
                                            <div class="cart-name">
                                                <h5>Умный Wi-Fi дверной видеозвонок Ring XS53 - H4</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart-price">240 руб</td>
                                    <td class="cart-counts">
                                        <div class="quantity-block">
                                            <div data-quantity class="quantity">
                                                <button data-quantity-minus type="button"
                                                        class="quantity__button quantity__button--minus"></button>
                                                <div class="quantity__input">
                                                    <input data-quantity-value autocomplete="off" type="text"
                                                           name="form[]" value="1">
                                                </div>
                                                <button data-quantity-plus type="button"
                                                        class="quantity__button quantity__button--plus"></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-cost-gud">480 руб</td>
                                    <td class="remuve-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31"
                                             viewBox="0 0 31 31" fill="none">
                                            <path d="M8.40234 8.5L22.4023 22.5M8.40234 22.5L22.4023 8.5"
                                                  stroke-width="1.5" stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
                                        </svg>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="popup-cart-info">
                            <div class="popup-cart-info__title">
                                <h5>Детали заказа:</h5>
                            </div>
                            <div class="popup-cart-info-block">
                                <ul>
                                    <li>
                                        <span>Товаров</span>
                                        <span>3шт</span>
                                    </li>
                                    <li>
                                        <span>Способ доставки</span>
                                        <span>Самовывоз</span>
                                    </li>
                                    <li>
                                        <span>Итоговая стоимость</span>
                                        <span>2 009 руб</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="popup-cart-info-buttons">
                                <a data-popup="#order" href="#" class="button _popup-button">К оформлению</a>
                                <a href="#" class="button _popup-button ">Продолжить покупки</a>
                            </div>
                            <div class="popup-cart-info-text">
                                ! Способ и время доставки можно выбрать при оформлении заказа.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- order popup -->
    <div id="order" aria-hidden="true" class="popup">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close">
                    <svg>
                        <use xlink:href="img/icons/icons.svg#close"></use>
                    </svg>
                </button>
                <div class="popup__text">
                    <div class="popup__image"><img src="img/banner.png" alt="Image"></div>
                    <div class="popup__title">
                        <h2>Быстрое оформление акустической системы Sonos</h2>
                    </div>
                    <div class="popup__form">
                        <form action="#">
                            <div class="form-group">
                                <label>Введите ФИО</label>
                                <input type="text" name="form[email]" data-required="email" data-error="Ошибка"
                                       placeholder="Иванов Иван Иванович" class="input">
                            </div>
                            <div class="form-group _form-group-block">
                                <div class="form-group-tel">
                                    <label>Телефон</label>
                                    <input id="phone" type="text" name="form[]" placeholder="" class="input">
                                </div>
                                <div class="form-group-mail">
                                    <label>E-mail</label>
                                    <input type="text" data-required="email" name="form[email]"
                                           data-error="Введен не верный E-mail" placeholder="Ivanov_Ivan@gmail.ru"
                                           class="input">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Комментарий</label>
                                <textarea cols="60" data-required="message" name="message" data-autoheight-min='145'
                                          placeholder="Введите текст" class="input"></textarea>
                            </div>
                            <div class="form-button-block">
                                <button data-popup="#accepted" type="submit" class="button">Оформить заказ</button>
                                <div class="checkbox">
                                    <input data-required="checkbox" id="c_3" data-error="Помилка"
                                           class="checkbox__input" type="checkbox" value="1" name="form[]">
                                    <label for="c_3" class="checkbox__label"><span class="checkbox__text">Нажимая кнопку «Оформить заказ» вы даёте согласие на обработку ваших <a
                                                href="#" target="_blank">персональных данных</a></span></label>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('front.layouts.compared')

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js?_v=20240408205909"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js?_v=20240408205909"></script>
    <script>
        $(document).ready(function() {
            $('.product__slider-main').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                asNavFor: '.product__slider-thmb',
                loop: true
            });

            $('.product__slider-thmb').slick({
                slidesToShow: 4,
                // slidesToScroll: 1,
                asNavFor: '.product__slider-main',
                centerMode: false,
                focusOnSelect: true,
                vertical: true,
                arrows: false,
                // loop: true,
                draggable: false,
                loop: true,
                responsive: [{
                    breakpoint: 320,
                    settings: {
                        slidesToShow: 2,
                        //   slidesToScroll: 1
                    },
                    breakpoint: 370,
                    settings: {
                        slidesToShow: 2,
                        //   slidesToScroll: 1
                    },
                    breakpoint: 946,
                    settings: {
                        vertical: false,
                    }
                }],
                draggable: false,
                swipe: false,
                loop: true,
            });

        })
    </script>

    <script>
        document.querySelector('.compared-block-table').addEventListener('mousedown', function(event) {
            event.preventDefault();
            const startX = event.pageX - this.offsetLeft;
            const scrollLeft = this.scrollLeft;
            this.style.cursor = 'grabbing';

            document.onmousemove = e => {
                const x = e.pageX - this.offsetLeft;
                const walk = (x - startX) * 2;
                this.scrollLeft = scrollLeft - walk;
            };

            document.onmouseup = () => {
                this.style.cursor = 'grab';
                document.onmousemove = null;
                document.onmouseup = null;
            };
        });
    </script>

    <script src="{{ asset('assets/front/intl-tel-input-master/js/intlTelInput.min.js') }}"></script>
    <script>
        var input = document.querySelector("#phone");

        window.intlTelInput(input, ({
            // excludeCountries: ["by"],
            localizedCountries: {'by': 'Belarus'},
            autoPlaceholder: "polite",
            placeholderNumberType: "MOBILE",


        }));
    </script>

    <script>

        const reviewLinks = document.querySelectorAll('a[data-popup="#reviev-popup"]');
        const popup = document.getElementById('reviev-popup');

        reviewLinks.forEach(reviewLink => {
            reviewLink.addEventListener('click', event => {
                event.preventDefault();
                const reviewCard = reviewLink.closest('.main-review-card');

                // Получаем данные из карточки
                const userImageSrc = reviewCard.querySelector('.main-review-card-head__user img').src;
                const userName = reviewCard.querySelector('.ain-review-card-head__info-title h5').innerText;
                const userRating = reviewCard.querySelector('.main-review-card-head__info-star').innerText;
                const reviewDate = reviewCard.querySelector('.ain-review-card-head__info-date').innerText;
                const reviewContent = reviewCard.querySelector('.main-review-card-body p').innerHTML;

                // Заполняем попап данными из карточки
                const popupUserImage = popup.querySelector('.main-review-card-head__user img');
                const popupUserName = popup.querySelector('.ain-review-card-head__info-title h5');
                const popupUserRating = popup.querySelector('.main-review-card-head__info-star');
                const popupReviewDate = popup.querySelector('.ain-review-card-head__info-date');
                const popupReviewContent = popup.querySelector('.main-review-card-body p');

                popupUserImage.src = userImageSrc;
                popupUserName.innerText = userName;
                popupUserRating.innerHTML = userRating + ' <span><svg><use xlink:href="img/icons/icons.svg#star"></use></svg></span>';
                popupReviewDate.innerText = reviewDate;
                popupReviewContent.innerHTML = reviewContent;
            });
        });
    </script>


    <script src="{{ asset('assets/front/backend/compare.js') }}"></script>
</body>
</html>

