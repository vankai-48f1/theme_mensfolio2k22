<div class="mb-5">
    <h3 class="text-center py-3 text-uppercase"><?php echo get_cat_name(4681); ?></h3>
    <div class="row lifestyle-container">
        <div class="col-lg-12">
            <div class="row">
                <!-- card -->
                <?php
                $cat_id = 4681; //lifestyle
                $args = array('cat' => $cat_id, 'posts_per_page' => '3', 'post_status' => 'publish');
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php
                        $custom_title = get_field("display_title", get_the_ID());
                        $post_title = trim(limit_text((!empty($custom_title) ? $custom_title : (apply_filters('the_title', $post->post_title))), 90));
                        $cat_name = get_cat_name($cat_id);
                        $thumb = generate_image(get_the_ID(), 'format_3');
                        $post_date = date('d M Y', strtotime($post->post_date));
                        $limit_excerpt = strlen($post_title) >= 113 ? 50 : 70;
                        $excerpt = !empty($post->post_excerpt) ? $post->post_excerpt : $post->post_content;
                        $post_excerpt = limit_text(strip_tags($excerpt), $limit_excerpt);
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="mb-4">
                            <!-- card -->
                            <a href="<?php echo get_permalink(); ?>" data_url="<?php echo get_permalink(); ?>" class="click_me d-block mb-3">
                                <img class="card-img-top lazy_loading" data-src="<?php echo $thumb; ?>" data-holder-rendered="true">
                            </a>
                            <div class="text-center py-3 px-3">
                                <a href="<?php echo get_permalink($id); ?>" title="<?php echo $post_title; ?>" alt="<?php echo $post_title; ?>">
                                    <h5 class="card-title font-family-01"><?php echo wp_trim_words(get_the_title(), 4681); ?></h5>
                                </a>

                            </div>
                        </div>
                        <!--card end -->
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <a href="/category/business" class="ctheme-more-articles more-articles">More Articles</a>
        </div>
    </div>
</div>
<hr>