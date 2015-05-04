(function($) {

  $(document).on( 'click', '.accordion-title', function(e) {
    e.preventDefault();
    $accordion = $(this).parents('.accordion');
    $accordionContent = $accordion.find('.accordion-content');
    if ($accordion.hasClass('active')) {
      $accordion.removeClass('active');
      $accordionContent.height('');
    }
    else {
      $accordion.addClass('active');
      $accordionContent.height( $accordionContent[0].scrollHeight );
    }
  });
  
})(jQuery);
