<?php
/**
 * Footer Template
 *
 * This template closes #main div and displays the #footer div.
 * 
 * Thematic Action Hooks: thematic_abovefooter thematic_belowfooter thematic_after
 * Thematic Filters: thematic_close_wrapper can be used to remove the closing of the #wrapper div
 * 
 * @package Thematic
 * @subpackage Templates
 */
?>
<?php // action hook for placing content above the closing of the #main div
thematic_abovemainclose();
?>

<?php
// action hook for placing content above the footer
thematic_abovefooter();

?>	

<?php
// action hook creating the footer 
thematic_footer();
?>
        	
<?php
// action hook for placing content below the footer
thematic_belowfooter();
?>
    	
<?php
// action hook for placing content before closing the BODY tag
thematic_after(); 

// calling WordPress' footer action hook
wp_footer();
?>
</div>
</div> <!-- /fx-wrapper -->

<footer>
  <div class="f-inside-bg">
    <div class="container">
    <div class="copyright">
      <p>Copyright &copy; 2013-<?php echo date('Y'); ?> Ming Mei Cosmetics All Rights Reserved</p>
    </div>
    <div class="h-l-bx2">
        <div class="sn-holder">
          <div class="sn-main-holder">
            <div class="snico-bx">
              <a href="#"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sn-icon-fb.png"></a>
            </div>
            <div class="snico-bx">
              <a href="#"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sn-icon-twit.png"></a>
            </div>
            <div class="snico-bx">
              <a href="#"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sn-icon-link.png"></a>
            </div>
          </div>
        </div>
      </div>
      <div class="logobot">
        <a href="<?php echo get_bloginfo('url'); ?>"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-bot.png"></a>
      </div>
    </div>
  </div>
</footer>

</body>
</html>