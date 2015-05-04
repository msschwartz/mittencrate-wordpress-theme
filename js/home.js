(function($) {
  
  // Home page seen on carousel
  $(function() {
    $('#home-seen-on').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      autoplay: true,
      autoplaySpeed: 4000,
      arrows: false,
      accessibility: false,
      draggable: false,
      touchMove: false,
      swipe: false,
      pauseOnHover: false,
      responsive: [
        {
          breakpoint: 960,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  });
  
})(jQuery);
