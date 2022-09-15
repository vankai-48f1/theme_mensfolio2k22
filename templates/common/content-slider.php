<?php
$sliders = get_field('slider_slides', 209);
//pre_data(get_field('slider_slides', 19621));
// var_dump($sliders);
?>

<div class="row section_slider">
    <div class="col-12">
        <div id="owl" class="homepage-owl-container">
            <div id="hompage-owl" class="owl-carousel owl-loaded">
                <?php
                foreach($sliders as $sl){
                    $link_to_post = $sl['link_to_post_post'][0];
                    $id = $link_to_post->ID;
                    $slide_url = get_permalink($id);
                    $title = $link_to_post->post_title;
                    $slide_image = get_acf_image($sl['link_to_post_custom_image'], '1536x1536'); //"http://s3-ap-southeast-1.amazonaws.com/mensfolio-sg-production/2016/03/yoga_lin_slider.jpg";
                ?>
                <!-- <div class="owl-stage-outer"> -->
                  <!-- <div class="owl-item"> -->
                    <div class="item">
                      <a href="<?php echo $slide_url; ?>">
                          <img src="<?php echo $slide_image; ?>">
                      
                          <div class="carousel-description">
                              <div class="">
                                  <h2>
                                      <?php echo $title; ?>
                                  </h2>
                              </div>
                          </div>
                      </a>
                    </div>
                  <!-- </div> -->
                <!-- </div> -->
                
                <?php
                }
                ?>
            </div>
        </div>
        
        
        <?php
        /*
        <div id="owl" class="homepage-owl-container">
            <div id="hompage-owl" class="owl-carousel">
        
                <?php
                $args = array(
                  'post_type' => 'sliders',
                  'posts_per_page' => 1
                );
                $sliders = get_posts($args);

                if ($sliders && count($sliders) > 0):
                      $post = $sliders[0];
                      setup_postdata($post);

                      $original_post = $post;
                      $show_descriptions = get_field('show_slide_descriptions');
                
                      

                      while (have_rows('slider_slides')): the_row();
                        $slide_info = '';
                        $slide_image = null;
                        $slide_url = null;
                        $show_info = false;

                        if (get_row_layout() == 'link_to_post') {
                          $post_relation = get_sub_field('link_to_post_post')[0];
                          $post = $post_relation;
                          setup_postdata($post);

                          $custom_image = get_sub_field('link_to_post_custom_image');
                          if (!empty($custom_image)) {
                            $slide_image = '<img src="' . $custom_image['sizes']['1200x400'] . '" />';
                          }
                          else {
                            $slide_image = get_the_post_thumbnail($post->ID, '1200x400');
                          }

                          $slide_url = get_the_permalink();

                          // titles
                          $custom_title = get_sub_field('link_to_post_custom_title');
                          $title = !empty($custom_title) ? $custom_title : get_the_title();
                          $slide_info = !empty($title) ? '<div class="slider-home-item-caption"><span>' . $title . '</span></div>' : null;

                          $show_info = !empty($slide_info);

                          // reset global $post to the parent slider post otherwise other layouts can't be found
                          wp_reset_postdata();
                          $post = $original_post;
                        }
                        elseif (get_row_layout() == 'upload_image') {
                          // image
                          $image_field = get_sub_field('upload_image_image');
                          $image_url = $image_field['sizes']['1200x400'];
                          $slide_image = '<img src="'. $image_url .'" />';
                          $slide_url = get_sub_field('upload_image_link_url');

                          // titles
                          $slide_title = get_sub_field('upload_image_custom_title');

                          // descriptions
                          $custom_description = get_sub_field('upload_image_custom_description');
                        }

                        //echo '<div class="slider-home-item">';
                        //echo '<a href="' . $slide_url . '">';
                        //echo $slide_image;
                        //echo $show_info ? $slide_info : null;
                        //echo '</a>';
                        //echo '</div>';
                
                        ?>
                            <div class="item">
                                <a href="<?php echo $slide_url; ?>">
                                    <?php echo $slide_image; ?>
                                </a>
                                <div class="carousel-description">
                                    <div class="">
                                        <h2>
                                            <a href="<?php echo $slide_url; ?>">
                                              <?php
                                              echo $title;
                                              ?>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        <?php
                      endwhile;
                      wp_reset_postdata();
                      ?>

                  <?php
                endif;
                ?>
            </div>
        </div>
        */
        ?>
    </div>
</div>