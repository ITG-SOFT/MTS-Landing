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
                </ul>
            </div>
        </div>
    </div>
</div>
