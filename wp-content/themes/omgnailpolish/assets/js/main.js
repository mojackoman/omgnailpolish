$.main = {};

$.main.events = function()
{

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

/*  $('#more-tools-btn').on('click', function(e){
    e.preventDefault();

    var data = {};

    var offset = $('.nt-tools .tool-imgbx1').length;

    data = {offset : offset};

    $.ajax({
      type:"post",
      url:myVars.admin_ajax + '?action=get-nail-tools-ajax',
      dataType:"json",
      data:data,
      success:function(result){
      }
    });
  });*/

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

}

jQuery(document).ready(function()
{
  $.main.events();
	$('body').on('mouseenter', "a[rel='tooltip']", function(event){
		event.preventDefault();
		$('#tooltiphtml div.popover-content').html("");
		var left = $(this).find('div.cutix-container').offset().left - 23;
		var top = $(this).find('div.cutix-container').offset().top - 10;
		$('#tooltiphtml div.popover-content').html('<h6 class="tooltiptitle">'+$(this).attr('title')+'</h6><a href="'+$(this).attr('href')+'" style="font-size: 10px;" data-toggle="modal" data-target="#ColorModal">View Details</a>');
		$('#tooltiphtml').css({top: top,left: left}).show();
		return true;
	});
	
	$('body').on('click', 'div#ColorModal div.os-holder1', function(){
		var title = $(this).find('a.pop-txtlink').html();
		var image = $(this).find('img');
		var starimage = $(this).find('div.prod-pad');

		$('div.pop-content1 h1').html(title);
		$('div.pop-content1 small').html(image.attr('alt'));

		if(starimage.attr('data-star') != ''){
			$('div#starcontainer').html('<img src="'+starimage.attr('data-star')+'"/>');
		}else{
			$('div#starcontainer').html('');
		}

		$('div.pop-content1 div.pop-imgbx').html('<img src="'+image.attr('src')+'" style="width: 100px;'+image.attr('style')+'">');
	});

	$('body').on('click', 'div#myModal div.os-holder1', function(){
		var title = $(this).find('a.pop-txtlink').html();
		var image = $(this).find('img.smallimg');

		$('div.pop-content1 h1').html(title);
		$('div.pop-content1 small').html(image.attr('alt'));


		$('div.pop-content1 div.pop-imgbx').html('<img src="'+image.attr('data-largeimage')+'" style="'+image.attr('style')+'">');
	});
});