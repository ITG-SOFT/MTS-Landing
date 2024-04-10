<div data-da=".menu__body,992,0" class="header-body__search _search-drop">
    <label>
        <svg>
            <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#search') }}"></use>
        </svg>
    </label>
    <input autocomplete="off" type="search" name="search" placeholder="Поиск товара" class="input _search-input">
    <!-- search -->
    <div class="drop-search">
        <div class="drop-search-block">
            <div class="drop-search-block-list">
                @isset($categories)
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="#">{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                @endisset
            </div>
            <div class="drop-search-block-items">
                <ul>
                    <li>
                        <a href="#" class="drop-search-block-items-link">
                            <div class="search-atem-link__image">
                                <img src="img/card/06.png" alt="Image">
                            </div>
                            <div class="search-atem-link__title">
                                <h5>Портативная колонка Xiaomi Mi Outdoor Speaker Blue (MDZ-36-DB)</h5>
                            </div>
                            <div class="search-atem-link__coast">
                                <span>129 руб</span>
                                <s>149 руб</s>
                            </div>
                            <div data-popup="#popup" class="search-atem-link__cart">
                                <svg>
                                    <use xlink:href="img/icons/icons.svg#cart"></use>
                                </svg>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
