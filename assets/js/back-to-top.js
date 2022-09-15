jQuery( document ).ready(function($){
  var offset = 1000,
      speed = 250,
      duration = 500,
      scrollButton = $('#topbutton');
      mrec = $('#ad-mrec_zone');
  
  $( window ).scroll( function() {
    if ( $( this ).scrollTop() < offset) {
      scrollButton.fadeOut( duration );
      mrec.removeClass('fixed');
    } else {
      scrollButton.fadeIn( duration );
      mrec.addClass('fixed');
    }
  });
  
  scrollButton.on( 'click', function(e){
    e.preventDefault();
    $( 'html, body' ).animate({
      scrollTop: 0
    }, speed);
  });
});