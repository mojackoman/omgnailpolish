<!DOCTYPE html>
<html>

<head>
	<meta content="en-us" http-equiv="Content-Language">
	<meta charset="utf-8">
	<title>Oh My Golly Nail Colors</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	
	<!-- Le styles -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom.css">		
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom-responsive.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fonts.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
	
	<!-- Le scripts -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.8.2.min.js"><\/script>')</script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
     <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
     <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/respond.js"></script>
    <![endif]-->
    <!--[if gte IE 9]>
	  <style type="text/css">
	    .g-white-yellow, .g-white-gold, .g-white-blue, .blg-in-bx-r, .top-blue-bar, .top-pink-bar, .b-catlistbx1, .ctrl-bx1, .ctrl-bx2 {
	       filter: none;
	    }
	  </style>
	<![endif]-->

	<?php if ( is_home() ) : ?>
	<script type="text/javascript">
	$.omg = {};
	$.omg.banner = {
		init: function () {
			var _el = $('.slider-holder .slider');
			$.omg.banner.item.length = _el.length - 1;
			$.omg.banner.events();
			var _i = 0;

			_el.each( function () {
				$(this).attr('item', _i);
				var _class = _i == 0 ? ' class="active"' : '';
				$('.circle-bx ul').append('<li><a href="#" item="' + _i + '"' + _class + '></a>');
				_i++;
			} );
			$.omg.banner.image.load();
		},
		events: function () {
			$('a.control').click( function ( e ) {
				e.preventDefault();
				var _next = 0;
				var _active = $.omg.banner.item.active;
				if ( $(this).attr('class').match(/next/) ) {
					_next = _active + 1;
				} else {
					_next = _active - 1;
				}

				if ( _next >= 0 && _next <= $.omg.banner.item.length ) {
					$.omg.banner.item.active = _next;
					$('.slider[item=' + _active + ']').fadeOut(500);
					$('.slider[item=' + _next + ']').fadeIn(400);
					$('.circle-bx a').removeClass('active');
					$('.circle-bx a[item=' + _next + ']').addClass('active');
				}
				
			} );
		},
		item: {
			active: 0
		},
		image: {
			container: false,
			load: function () {
				if ( $.omg.banner.image.container ) {
					var _length = $.omg.banner.image.container.length;
					var _loaded = 0;
					$.omg.banner.image.container.load( function () {
						_loaded++;
						if ( _loaded == _length ) {
							var _height = $('.slider').first().height();
							console.log(_height);
							$('.wait').hide();
							$('.slider-holder').animate({
								height: _height + 'px',
								background: '#a23960'
							}, 300, 'linear', function () {
								$('.slider').first().show();
								$('.circle-bx').show();
								setTimeout( function () {
									$('.control').css('display', 'block').show();
								} );
							});
						}
					} );	
				}
			}
		}

	}
	$(document).ready( function () {
		$.omg.banner.image.container = $('.slider-holder img');
		$.omg.banner.init();
	} );
	$(window).resize( function () {
		$('.slider-holder').css('height', $('.slider').first().height() + 'px');
	} );
	</script>
	<?php endif; ?>

</head>

<body>
	<div class="fx-wrapper">
		<div class="container">
			<div class="h-inside-bg">
				<div class="h-l-bx">
					<p class="h-txt">Connect with us</p>
					<div class="sn-holder">
						<div class="sn-main-holder">
							<div class="snico-bx">
								<a href="#"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/sn-icon-fb.png"></a>
							</div>
							<div class="snico-bx">
								<a href="#"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/sn-icon-twit.png"></a>
							</div>
							<div class="snico-bx">
								<a href="#"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/sn-icon-link.png"></a>
							</div>
							<div class="snico-bx">
								<a href="#"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/sn-icon-pinterest.png"></a>
							</div>
							<div class="snico-bx">
								<a href="#"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/sn-icon-blog.png"></a>
							</div>
						</div>
					</div>
				</div>
				<div class="h-r-bx">
					<p class="h-txt">Call us now!</p>
					<div class="call-holder">
						<h1 class="call">0750 672 2050</h1>
					</div>
				</div>
				<div class="logobx">
					<a href="/"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/logo-top.png"></a>
				</div>
			</div>
		</div>
		<div class="container">
			<?php
				$menu = array(
					'Home' => '/',
					'Colors' => '/colors',
					'Nail Tools' => '/nail-tools',
					'Opportunities' => '/opportunities',
					'Partners' => '/partners',
					'Contact Us' => '/contact-us',
					'About Us' => '/about-us',
					'Nail Studio' => '/color-tester',
					'Blog' => '/blog'
				);
			?>
			<div class="nav-container">
				<div class="main-nav">
					<ul>
						<?php foreach ( $menu as $name => $link ) : ?>
						<?php
							$class = '';
							if ( ($_SERVER['REQUEST_URI'] == '/' && $_SERVER['REQUEST_URI'] == $link) || ($name != 'Home' && preg_match('#' . $link . '#', $_SERVER['REQUEST_URI'])) )
							{
								$class = ' class="active"';	
							}
						?>
						<li<?php echo $class; ?>><a href="<?php echo $link; ?>"><?php echo strtoupper($name); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<nav>
					<a href="#" class="nav-btn pull-right" data-toggle="collapse" data-target=".nav-collapse"></a>
					<ul class="collapse nav-collapse">
						<?php foreach ( $menu as $name => $link ) : ?>
						<?php
							$class = '';
							if ( ($_SERVER['REQUEST_URI'] == '/' && $_SERVER['REQUEST_URI'] == $link) || ($name != 'Home' && preg_match('#' . $link . '#', $_SERVER['REQUEST_URI'])) )
							{
								$class = ' class="active"';	
							}
						?>
						<li<?php echo $class; ?>><a href="<?php echo $link; ?>"><?php echo strtoupper($name); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</nav>
			</div>
		</div>
		<div class="container">