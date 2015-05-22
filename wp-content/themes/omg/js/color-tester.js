$.buzz = {};
$.buzz.animate = false;

$.buzz.events = function () {

	$.buzz.slider();

	$('.layer-01').load( function () { $.buzz.canvass.init(); });
	$(window).resize( function () { $.buzz.canvass.resize(); });

	$('.control.top a').click( function (e) {
		e.preventDefault();
		if ( !$.buzz.animate ) {
			$.buzz.animate = true;

			if ( !$.buzz.canvass.zoom ) {
				$('.color-tester .canvass .control.top').fadeOut( 300 );
				$('.color-tester .canvass .main .hand').animate( { opacity: 0 }, 300, function () {
						$('.color-tester .main').hide();
						$('.color-tester .canvass .control.top a.text').hide();
						$('.color-tester .canvass .control.top').css({ position: 'static', margin: '0 auto', display: 'block', opacity: 0	});
						$('.color-tester .canvass .control.top').animate( { width: '44%', opacity: 1 },	300, function () {
							$.buzz.animate = false;
							$.buzz.canvass.zoom = true;
						});
					}
				);
			} else {
				
				$('.color-tester .canvass .control.top').animate( { width: '59px', opacity: 0 }, 300, function () {
					$('.color-tester .canvass .control.top').css({ position: 'absolute', margin: '0 auto', display: 'none', opacity: 1	});
					$('.color-tester .canvass .control.top').fadeIn( 300 );
					$('.color-tester .main').show();
					$('.color-tester .canvass .control.top a.text').show();
					$('.color-tester .canvass .main .hand').animate( { opacity: 1 }, 300, function () {
						$.buzz.animate = false;
						$.buzz.canvass.zoom = false;
					});
				});

			}
		}
	});

	$('.color-container a').click( function (e) {
		e.preventDefault();
		$('.color-tester .canvass .control.top a.bottle').css('background', $(this).attr('canvass-data'));
		$('.color-tester .canvass .layer-02').css('background', $(this).attr('canvass-data'));
	});
}

$.buzz.slider = function () {
	
	var _height = $('#slider_height');
	var _tone = $('#slider_tone');


	_height.slider({
		value: 50,
		slide: function (event, ui) {
			var _value = _height.slider('value');
			var _top = -4;

			if ( _value >= 0 && _value <= 7 ) {
				_top = 2;
			} else if ( _value >= 8 && _value <= 15 ) {
				_top = 1;
			} else if ( _value >= 16 && _value <= 23 ) {
				_top = 0;
			} else if ( _value >= 24 && _value <= 31 ) {
				_top = -1;
			} else if ( _value >= 32 && _value <= 39 ) {
				_top = -2;
			} else if ( _value >= 40 && _value <= 47 ) {
				_top = -3;
			} else if ( _value >= 48 && _value <= 55 ) {
				_top = -4;
			} else if ( _value >= 56 && _value <= 63 ) {
				_top = -5;
			} else if ( _value >= 70 && _value <= 77 ) {
				_top = -6;
			} else if ( _value >= 84 && _value <= 91 ) {
				_top = -7;
			} else if ( _value >= 92 && _value <= 99 ) {
				_top = -8;
			} else if ( _value >= 100 ) {
				_top = -9;
			}

			$('.layer-05').css('top', _top + 'px');

		}
	});

	_tone.slider({
		value: 50,
		slide: function (event, ui) {
			var _value = _tone.slider('value')/100;
			$('.layer-04').css('opacity', _value);
		}
	});

};

$.buzz.canvass = {

	init: function () {
		$.buzz.canvass.resize();
		$('.color-tester .canvass .hand .layer-04').css('opacity', 0.5);

	},

	resize: function () {
		if ( $('.color-tester .canvass .hand:visible').length > 0 ) {
			
			$('.color-tester .canvass .main').css('height', $('.layer-01').css('height') );
			$('.color-tester .canvass .hand').css('width', $('.color-tester .canvass').css('width'));

			var _center = ( $('.color-tester .canvass .hand').width() - $('.layer-01').width() ) / 2;
			$('.color-tester .canvass .hand [class*=layer-]').css('left', _center + 'px');
		}
		$('.ui-slider').css('width', ($('.slider').width() - 34) + 'px');
	},

	zoom: false
}

$(document).ready( function () { $.buzz.events(); });