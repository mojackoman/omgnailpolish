<?php
/**
 * Template Name: Colors
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

    <div id="container">
    
      <?php
        // action hook for inserting content above #content
        thematic_abovecontent();    
        
        // filter for manipulating the element that wraps the content 
        echo apply_filters( 'thematic_open_id_content', '<div id="content">' . "\n\n" );
      
        // calling the widget area 'page-top'
              get_sidebar('page-top');
  
              // start the loop
              while ( have_posts() ) : the_post();
              
              // action hook for inserting content above #post
              thematic_abovepost();
          ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

        <?php

                // creating the post header
                #thematic_postheader();
              ?>
                  
          <div class="entry-content">

                      <?php
                        #the_content();
                      
                        #wp_link_pages( "\t\t\t\t\t<div class='page-link'>" . __( 'Pages: ', 'thematic' ), "</div>\n", 'number' );
                      
                        #edit_post_link( __( 'Edit', 'thematic' ), '<span class="edit-link">','</span>' );
                      ?>
          <?php $cats = get_colors_categories(); ?>

          <div class="whitebx">
            <div class="clr-bx">
              <div class="cutix-pad">
                <div class="pk-colorbx">
                  <img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pickyourcolor.png">
                </div>
                <div class="c-list-r">
                  <select id="selectColor">
                    <option value="">Filter All</option>
                    <?php
                      foreach ($cats as $cat) {
                        echo sprintf('<option value="%s">%s</option>', $cat->slug, $cat->name);
                      }
                    ?>
                  </select> 
                </div>
              </div>
            </div>
            <div class="cutix-bx" style="position:relative;">
              <div class="colors-overlay" style="display:none;"></div>
              <div id="spinner" style="position:absolute;top:40%;left:50%;"></div>
              <div class="pad2">
                <div id="cutix-container" class="cutix-set1">
                  <?php echo do_shortcode('[colors]'); ?>
                </div>

              </div>
                <div id="ColorModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-body" style="overflow-y: visible;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/wait.gif" />
                  </div>
                </div>
            </div>
					<div class="popover fade top in" id="tooltiphtml">
					<div class="arrow"></div>
					<div class="popover-content"></div>
					</div>	
          </div>
  
          </div>
          
        </div><!-- .post -->
  
      <?php
        // calls the do_action for inserting content below #post
            thematic_belowpost();
                      
            // action hook for calling the comments_template
            #thematic_comments_template();
            
            // end loop
            endwhile;
          
            // calling the widget area 'page-bottom'
            get_sidebar( 'page-bottom' );
          ?>
  
      </div><!-- #content -->
      
      <?php 
        // action hook for inserting content below #content
        thematic_belowcontent(); 
      ?> 
    </div><!-- #container -->

<?php 
    // action hook for placing content below #container
    thematic_belowcontainer();
    
    // calling footer.php
    get_footer();
?>