<!-- card -->
<div id="card-{{ $product->id }}" aria-hidden="true" class="popup _popup-card">
    <div class="popup__wrapper">
        <div class="popup__content">
            <button data-close type="button" class="popup__close">
                <svg>
                    <use xlink:href="{{ asset('assets/front/img/icons/icons.svg#close') }}"></use>
                </svg>
            </button>
            <div class="popup__text">
                <div class="popup-card">
                    <div class="popup-card-slider">
                        <div class="product__slider">
                            <div class="product__slider-thmb">
                                <div class="slide _thumb-slide">
                                    <img src="{{ $product->getPhoto() }}" alt="{{ $product->title }}" class="img-responsive-thumb" width="100" height="100">
                                </div>
                                @foreach($product->photos as $photo)
                                    <div class="slide _thumb-slide">
                                        <img src="{{ $photo->getPath() }}" alt="{{ $product->title }}" class="img-responsive-thumb" width="100" height="100">
                                    </div>
                                @endforeach
                            </div>
                            <div class="product__slider-main ">
                                <div class="slide">
                                    <img src="{{ $product->getPhoto() }}" alt="{{ $product->title }}" class="img-responsive">
                                </div>
                                @foreach($product->photos as $photo)
                                    <div class="slide">
                                        <img src="{{ $photo->getPath() }}" alt="{{ $product->title }}" class="img-responsive">
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="popup-card-info">
                        @if($product->feedbacks?->count() != 0)
                            <div class="popup-card-info-rating">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M10.392 0.256421L13.2457 6.32115L19.625 7.2939C19.7902 7.31957 19.9272 7.44082 19.9786 7.60687C20.03 7.77292 19.9871 7.9551 19.8677 8.07711L15.2524 12.7968L16.3421 19.4624C16.3708 19.6343 16.3034 19.8083 16.1685 19.911C16.0336 20.0138 15.8545 20.0273 15.7068 19.9461L10.0007 16.7996L4.29447 19.947C4.14686 20.0286 3.96771 20.0152 3.8327 19.9125C3.6977 19.8098 3.63038 19.6357 3.65919 19.4638L4.74886 12.7968L0.132336 8.07711C0.0129372 7.9551 -0.0300433 7.77292 0.0213977 7.60687C0.0728387 7.44082 0.209821 7.31957 0.374968 7.2939L6.75426 6.32115L9.60931 0.256421C9.68196 0.0996028 9.83397 0 10.0007 0C10.1673 0 10.3193 0.0996028 10.392 0.256421Z" fill="#FCAD38" />
                                    </svg>
    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">--}}
    {{--                                    <path d="M10.392 0.256421L13.2457 6.32115L19.625 7.2939C19.7902 7.31957 19.9272 7.44082 19.9786 7.60687C20.03 7.77292 19.9871 7.9551 19.8677 8.07711L15.2524 12.7968L16.3421 19.4624C16.3708 19.6343 16.3034 19.8083 16.1685 19.911C16.0336 20.0138 15.8545 20.0273 15.7068 19.9461L10.0007 16.7996L4.29447 19.947C4.14686 20.0286 3.96771 20.0152 3.8327 19.9125C3.6977 19.8098 3.63038 19.6357 3.65919 19.4638L4.74886 12.7968L0.132336 8.07711C0.0129372 7.9551 -0.0300433 7.77292 0.0213977 7.60687C0.0728387 7.44082 0.209821 7.31957 0.374968 7.2939L6.75426 6.32115L9.60931 0.256421C9.68196 0.0996028 9.83397 0 10.0007 0C10.1673 0 10.3193 0.0996028 10.392 0.256421Z" fill="#FCAD38" />--}}
    {{--                                </svg>--}}
    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">--}}
    {{--                                    <path d="M10.392 0.256421L13.2457 6.32115L19.625 7.2939C19.7902 7.31957 19.9272 7.44082 19.9786 7.60687C20.03 7.77292 19.9871 7.9551 19.8677 8.07711L15.2524 12.7968L16.3421 19.4624C16.3708 19.6343 16.3034 19.8083 16.1685 19.911C16.0336 20.0138 15.8545 20.0273 15.7068 19.9461L10.0007 16.7996L4.29447 19.947C4.14686 20.0286 3.96771 20.0152 3.8327 19.9125C3.6977 19.8098 3.63038 19.6357 3.65919 19.4638L4.74886 12.7968L0.132336 8.07711C0.0129372 7.9551 -0.0300433 7.77292 0.0213977 7.60687C0.0728387 7.44082 0.209821 7.31957 0.374968 7.2939L6.75426 6.32115L9.60931 0.256421C9.68196 0.0996028 9.83397 0 10.0007 0C10.1673 0 10.3193 0.0996028 10.392 0.256421Z" fill="#FCAD38" />--}}
    {{--                                </svg>--}}
    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">--}}
    {{--                                    <path d="M10.392 0.256421L13.2457 6.32115L19.625 7.2939C19.7902 7.31957 19.9272 7.44082 19.9786 7.60687C20.03 7.77292 19.9871 7.9551 19.8677 8.07711L15.2524 12.7968L16.3421 19.4624C16.3708 19.6343 16.3034 19.8083 16.1685 19.911C16.0336 20.0138 15.8545 20.0273 15.7068 19.9461L10.0007 16.7996L4.29447 19.947C4.14686 20.0286 3.96771 20.0152 3.8327 19.9125C3.6977 19.8098 3.63038 19.6357 3.65919 19.4638L4.74886 12.7968L0.132336 8.07711C0.0129372 7.9551 -0.0300433 7.77292 0.0213977 7.60687C0.0728387 7.44082 0.209821 7.31957 0.374968 7.2939L6.75426 6.32115L9.60931 0.256421C9.68196 0.0996028 9.83397 0 10.0007 0C10.1673 0 10.3193 0.0996028 10.392 0.256421Z" fill="#FCAD38" />--}}
    {{--                                </svg>--}}
    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">--}}
    {{--                                    <path d="M10.392 0.256421L13.2457 6.32115L19.625 7.2939C19.7902 7.31957 19.9272 7.44082 19.9786 7.60687C20.03 7.77292 19.9871 7.9551 19.8677 8.07711L15.2524 12.7968L16.3421 19.4624C16.3708 19.6343 16.3034 19.8083 16.1685 19.911C16.0336 20.0138 15.8545 20.0273 15.7068 19.9461L10.0007 16.7996L4.29447 19.947C4.14686 20.0286 3.96771 20.0152 3.8327 19.9125C3.6977 19.8098 3.63038 19.6357 3.65919 19.4638L4.74886 12.7968L0.132336 8.07711C0.0129372 7.9551 -0.0300433 7.77292 0.0213977 7.60687C0.0728387 7.44082 0.209821 7.31957 0.374968 7.2939L6.75426 6.32115L9.60931 0.256421C9.68196 0.0996028 9.83397 0 10.0007 0C10.1673 0 10.3193 0.0996028 10.392 0.256421Z" fill="#FCAD38" />--}}
    {{--                                </svg>--}}
                                </span>
                                <div>{{ $product->getStars() }} (<span>{{ $product->feedbacks()->count() }}</span>)</div>
                            </div>
                        @endif
                        <div class="popup-card-info__type">{{ $product->category }}</div>
                        <div class="popup-card-info__title">
                            <h2>{{ $product->title }}</h2>
                        </div>
                        <div class="popup-card-info__coast">
                            <div class="popup-card-info__coast-block">
                                <ul>
                                    @if($product->getSalePrice() != 0)
                                        <li>
                                            <span>Прошлая цена:</span>
                                            <s>{{ $product->getPrice() }} руб</s>
                                        </li>
                                    @endif
                                    <li>
                                        <span>Цена:</span>
                                        <span>{{ ($product->getSalePrice() != 0) ? $product->getSalePrice() : $product->getPrice() }} руб</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="popup-card-info__buttons">
                            <a data-popup="#popup" href="#" class="button ">Купить сейчас</a>
                        </div>
                    </div>

                </div>
                <div class="popup-card-info-description">
                    <div data-tabs class="tabs">
                        <nav data-tabs-titles class="tabs__navigation">
                            <button type="button" class="tabs__title _tab-active">Описание</button>
                            <button type="button" class="tabs__title">Характеристики</button>
                            @if($product->feedbacks?->count() != 0)
                                <button type="button" class="tabs__title">Отзывы</button>
                            @endif
                        </nav>
                        <div data-tabs-body class="tabs__content">
                            <div class="tabs__body">
                                {!! $product->text !!}
                            </div>
                            <div class="tabs__body">
                                @foreach($product->category->attributes as $attribute)
                                    @php
                                        $attribute_value = $product->attributeValues()->where('attribute_id', $attribute->id)->first();

                                        if (!$attribute_value) {
                                            continue;
                                        }
                                    @endphp

                                    <p><span class="strong">{{ $attribute->title }}</span>: {{ $attribute_value->value }}</p>
                                @endforeach
                                <!-- <h5>Дизайн</h5> -->
                            </div>
                            @if($product->feedbacks?->count() != 0)
                                <div class="tabs__body">
                                    @foreach($product->feedbacks as $feedback)
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
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
