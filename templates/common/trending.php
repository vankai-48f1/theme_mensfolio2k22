<div class="container">
    <h3 class="text-center mb-3 text-uppercase">Men's Folio Recommends</h3>
    <div class="row">
        <!-- Trending Start -->
        <?php
        $cat_id = 4; //Trending
        $args = array('cat' => $cat_id, 'posts_per_page' => '4', 'post_status' => 'publish');
        $the_query = new WP_Query($args);
        ?>
        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php
                $custom_title = get_field("display_title", get_the_ID());
                $post_title = trim(limit_text((!empty($custom_title) ? $custom_title : (apply_filters('the_title', $post->post_title))), 125));
                $post_date = date('d M Y', strtotime($post->post_date));
                $cat_name = get_cat_name($cat_id);
                $thumb = ctheme_generate_image(get_the_ID(), 'format_6');
                ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="latest-card mb-2">
                        <!-- card -->
                        <a href="
					<?php echo get_permalink(); ?>" data_url="
					<?php echo get_permalink(); ?>" class="click_me">
                            <img class="card-img-top lazy_loading" data-src="
						<?php echo $thumb; ?>" data-holder-rendered="true">
                        </a>
                        <div class="py-3 px-3 text-center">
                            <a href="<?php echo get_category_link($cat_id) ?>" class="d-block mb-2 ctheme-cate-post">
                                <?php echo $cat_name; ?>
                            </a>
                            <a href="
							<?php echo get_permalink($id); ?>" title="
							<?php echo $post_title; ?>" alt="
							<?php echo $post_title; ?>">
                                <h5 class="card-title text-center font-family-01">
                                    <?php echo $post_title ?>
                                </h5>
                            </a>
                        </div>
                    </div>
                    <!-- card end -->
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <!-- Trending End -->
    </div>
</div>