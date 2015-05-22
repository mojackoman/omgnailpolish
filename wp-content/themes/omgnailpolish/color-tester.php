<?php
/**
 * Template Name: Color Tester
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
          <?php #$cats = get_colors_categories(); ?>
          <div class="whitebx">
            <h3 class="tester-title"><?php echo get_the_title(); ?></h3>
            <div class="tester-mainbox color-tester">
              <div class="tester-pad">

                <div class="t-bx-l">
                  <div class="tabscontentbx">
                    <div class="h-f-pad">
                      <h4 id="colorName"></h4>
                      <small id="colorId"></small>
                      <div class="canvass">
                        <div class="control top">
                          <a href="#" class="bottle">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bottle-naillacquer-black.png">
                          </a>
                          <a href="#" class="text">Click here to zoom</a>
                        </div>
                        <p id="nail-description" style="display:none;margin-top:15px;text-align:center;"></p>
                        <div class="main">
                          <div class="hand" >
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/color-tester/hand/01.jpg" class="layer-01" alt="">
                            <div class="layer-02">
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/color-tester/hand/02.png" alt="">
                            </div>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/color-tester/hand/03.png" class="layer-03" alt="">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/color-tester/hand/04.png" class="layer-04" alt="">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/color-tester/hand/05.png" class="layer-05" alt="">
                          </div>
                          <div class="feet" style="display:none">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/color-tester/feet/01.jpg" class="layer-01" alt="">
                            <div class="layer-02">
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/color-tester/feet/02.png" alt="">
                            </div>
                            <img style="opacity:0.7;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/color-tester/feet/04.png" class="layer-04" alt="">
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="t-btns-bx">
                    <div class="ctrl-holder-l">
                      <p>Nail Height</p>
                      <div class="ctrl-bx1 slider">
                        <div id="slider_height">
                        </div>
                      </div>
                    </div>
                    <div class="ctrl-holder-r">
                      <p>Skin Tone</p>
                      <div class="ctrl-bx2 slider">
                        <div id="slider_tone">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="menutabs">
                    <div class="contrl-bx1">
                      <a href="#" class="select-hand button-ctrl">hands</a>
                    </div>
                    <div class="contrl-bx2">
                      <a href="#" class="select-feet button-ctrl">feet</a>
                    </div>
                  </div>
                </div>

                <div class="t-bx-r">
                  <div class="btns-mainbox">
                    <?php $cats_cnt = 1;$cats = $cats = get_colors_categories(); ?>
                    <div class="btns-set1">
                      <?php
                        foreach ($cats as $cat) {
                          echo sprintf('<div class="%s"><a data-slug="%s" href="#" class="choose-category button-blue2">%s</a></div>', ($cats_cnt%3 == 0) ? 'btn-box2' : 'btn-box1', $cat->slug, $cat->name);

                          if ($cats_cnt%3 == 0) {
                            echo '</div><div class="btns-set1">';
                          }

                          $cats_cnt += 1;
                        }
                      ?>
                      <?php echo sprintf('<div class="%s"><a data-slug="" href="#" class="choose-category button-blue2">%s</a></div>', ($cats_cnt%3 == 0) ? 'btn-box2' : 'btn-box1', 'See all colors'); ?>

                    </div>

                  </div>
                  <div class="srchbx">
                    <input id="colorSearch" name="q" type="text" value="" autocomplete="off" placeholder="Search" required />
                  </div>
                  <div class="t-colors" style="position:relative;">
                    <div class="colors-overlay" style="display:none;"></div>
                      <img class="load-image" style="position: absolute;left: 30%;top: 35%;display:none;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/wait.gif">
                    <div class="colors-pad" >
                      <?php echo do_shortcode('[color-tester-colors]'); ?>
                    </div>
                  </div>
                </div>

              </div>
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