jQuery(document).ready(function(){
  $('#myModal').on('hidden', function () {
    $(this).removeData('modal');
  });

  $('#ColorModal').on('hidden', function () {
    $(this).removeData('modal');
  });

  $('#myModal').on('show', function () {

  $('.slider1').bxSlider({
    slideWidth: 139,
    minSlides: 2,
    maxSlides: 4,
    slideMargin: 10
  });

  });

  $('#slides').slidesjs({
    width: 1175,
    height: 506,
    navigation: {
      active: true,
        // [boolean] Generates next and previous buttons.
        // You can set to false and use your own buttons.
        // User defined buttons must have the following:
        // previous button: class="slidesjs-previous slidesjs-navigation"
        // next button: class="slidesjs-next slidesjs-navigation"
      effect: "fade"
        // [string] Can be either "slide" or "fade".
    },
    play: {
      active: true,
        // [boolean] Generate the play and stop buttons.
        // You cannot use your own buttons. Sorry.
      effect: "fade",
        // [string] Can be either "slide" or "fade".
      interval: 4000,
        // [number] Time spent on each slide in milliseconds.
      auto: true,
        // [boolean] Start playing the slideshow on load.
      swap: false,
        // [boolean] show/hide stop and play buttons
      pauseOnHover: true,
        // [boolean] pause a playing slideshow on hover
      restartDelay: 2500
        // [number] restart delay on inactive slideshow
    },
    pagination: {
      active: true,
        // [boolean] Create pagination items.
        // You cannot use your own pagination. Sorry.
      effect: "fade"
        // [string] Can be either "slide" or "fade".
    }
  });

});