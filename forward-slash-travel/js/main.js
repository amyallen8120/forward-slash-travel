var $j=jQuery.noConflict();

window.addEventListener('scroll', function(e){
  var distanceY = window.pageYOffset || document.documentElement.scrollTop,
      shrinkOn = 100,
      header = $j(".top-header");
  if (distanceY > shrinkOn) {
      header.addClass('top-header--scroll');
  } else {
      if ( header.hasClass('top-header--scroll') ) {
          header.removeClass('top-header--scroll');
      }
  }
});




