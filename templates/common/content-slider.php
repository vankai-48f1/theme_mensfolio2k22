<?php
$sliders = get_field('slider_slides', 209);
//pre_data(get_field('slider_slides', 19621));
// var_dump($sliders);
?>

<div class="row section_slider">
    <div class="col-12">
        <div id="owl" class="homepage-owl-container">
            <div id="hompage-owl" class="owl-carousel owl-loaded">
                <style>
                    .homepage-owl-cate {
                        text-transform: uppercase;
                        color: #ffffff;
                        line-height: 1.5;
                        font-size: 16px;
                        display: inline-block;
                        margin-bottom: 8px;
                    }

                    .homepage-owl-cate span {
                       text-decoration: underline;
                    }
                    .homepage-owl-cate span:not(:last-child)::after {
                        content: " ,";
                    }
                </style>

                <?php
                foreach ($sliders as $sl) {
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
                            <div class="slide-image-wrap">
                                <img src="<?php echo $slide_image; ?>">
                            </div>

                            <div class="carousel-description">
                                <div class="">
                                    <div class="homepage-owl-cate">
                                        <?php
                                        $postcat = get_the_category($sl->ID);
                                        foreach ($postcat as $cat) {
                                            echo '<span>' . esc_html($cat->name) . '</span>';
                                        }
                                        ?>
                                    </div>
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
    </div>
</div>