<?php
/**
 * Template Name: Full Width
 *
 * This Full Width template removes the primary and secondary asides so that content
 * can be displayed the entire width of the #content area.
 * 
 * @package Thematic
 * @subpackage Templates
 */

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();
?>

	<div class="slider-holder">
	  <div class="wait">
	    <span>Loading images</span>
	    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/wait.gif" alt="">
	  </div>
	  <a href="#" class="control prev">Previous</a>
	  <a href="#" class="control next">Next</a>
	  <div class="slider slide-box">
	    <div class="imgbx">
	      <img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner1.png">
	    </div>
	    <div class="b-cont-r">
	      <h1>Why not dress your nails today and everyday in <span> luxurious gold without the heavy price tag!</span></h1></ br>
	      <p>Yes! Premium nail polish doesn't always cost an arm and a leg. We've created polishes that keep you in line with current trends at pocket-friendly prices.</p>
	<p>Get beautiful, spectacular, and bold nails with OMG Nail Polish!</p>
	      <div class="btn-bx1">
	        <a href="#" class="button-banner">more<span></span></a>
	      </div>
	    </div>
	  </div>
	  <div class="slider slide-box">
	    <div class="imgbx">
	      <img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner2.png">
	    </div>
	    <div class="b-cont-r">
	      <h1>Want intricate & multi-dimensional nails all in one swipe? Then get your hands on <span>OMG Crystal Sand Nail Polish.</span></h1>
	      <p>OMG Crystal Sand Nail Polish comes in 8 colors, all designed for ladies who love all things shiny and sparkly!</p>
	<p>Visit the collection!</p>
	      <div class="btn-bx1">
	        <a href="#" class="button-banner">more<span></span></a>
	      </div>
	    </div>
	  </div>
	  <div class="slider slide-box">
	    <div class="imgbx">
	      <img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner3.png">
	    </div>
	    <div class="b-cont-r">
	      <h1>Nail every look with <span>OMG Nail Polish.</span></h1>
	      <p>Get colors that's perfect for every occasion in your life. Apply them on their own, mix them with other polishes, or create nail art that describes your mood.</p>
	<p>These all-time colors are available 24/7, whenever you want them! Get cult classics that won't fail to impress.</p>
	<p>Check out the collection.</p>
	      <div class="btn-bx1">
	        <a href="#" class="button-banner">more<span></span></a>
	      </div>
	    </div>
	  </div>
	  <div class="slider slide-box">
	    <div class="imgbx">
	      <img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner4.png">
	    </div>
	    <div class="b-cont-r">
	      <h1>It's a revolution you don't want to miss! <span>Neon Revolution</span></h1>
	      <p>Tired of boring colors? Want to stand out? Make a statement with your nails alone with OMG's Neon Nail Polishes.</p>
	<p>Choose among colors such as spiked lemonade yellow, fiery orange, or bright cobalt blue to let friends know you mean to impress!</p>
	      <div class="btn-bx1">
	        <a href="#" class="button-banner">more<span></span></a>
	      </div>
	    </div>
	  </div>
	</div>

<?php 
    // action hook for placing content below #container
    thematic_belowcontainer();
    
    // calling footer.php
    get_footer();
?>