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