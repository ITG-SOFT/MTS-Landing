@isset($companies)
    <!-- main-salle -->
    <div class="main-brand">
        <div class="main-brand__container">
            <div class="main-brand__slider swiper">
                <div class="main-brand__wrapper swiper-wrapper">
                    @foreach($companies as $company)
                        <div class="main-brand__slide swiper-slide">
                            <img src="{{ $company->getLogo() }}" alt="{{ $company->title }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endisset
