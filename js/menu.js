
(function($) {
  
  $(document).on( 'click', '#masthead-mobile-menu-icon', function(e) {
    console.log('menu clicked');
    e.preventDefault();
    if ( $('#masthead-navigation').hasClass('opened') ) {
      $('#masthead-navigation').removeClass('opened');
      $('#masthead-navigation').height('');
    }
    else {
      $('#masthead-navigation').addClass('opened');
      $('#masthead-navigation').height( $('#masthead-navigation').get(0).scrollHeight );
    }
  });
  
})(jQuery);
