<div class="pb-5">
    <h3 class="text-center py-3 text-uppercase">MEN'S FOLIO's TV</h3>
    <div class="row lifestyle-container">
        
        <div class="col-lg-12">
            <div class="row">
                <!-- card -->
                <?php
                $cat_id = 76; //mf
                $args = array('cat' => $cat_id, 'posts_per_page' => '6', 'post_status' => 'publish');
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php
                        $custom_title = get_field("display_title", get_the_ID());
                        $link_youtube = get_field("link_youtube", get_the_ID());
                        $post_title = trim(limit_text((!empty($custom_title) ? $custom_title : (apply_filters('the_title', $post->post_title))), 90));
                        $cat_name = get_cat_name($cat_id);
                        $thumb = generate_image(get_the_ID(), 'format_3');
                        $post_date = date('d M Y', strtotime($post->post_date));
                        $limit_excerpt = strlen($post_title) >= 113 ? 50 : 70;
                        $excerpt = !empty($post->post_excerpt) ? $post->post_excerpt : $post->post_content;
                        $post_excerpt = limit_text(strip_tags($excerpt), $limit_excerpt);
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="mb-4">
                                <!-- card -->
                                <a href="<?php echo get_permalink(); ?>" data_url="<?php echo get_permalink(); ?>" class="click_me">
                                    <?php $link_youtube;
                                    $url = get_field("link_youtube", get_the_ID());
                                    parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
                                    $urlyoutube =  $my_array_of_vars['v'];
                                    if ($url != null) {
                                    ?>
                                        <iframe width="100%" height="300" src="https://www.youtube.com/embed/<?php echo $urlyoutube; ?>?width=640&amp;height=360&amp;autoplay&amp;origin=https%3A%2F%2Fmensfolio.vn" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                    <?php } else { ?>

                                        <img class="card-img-top lazy_loading" data-src="<?php echo $thumb; ?>" data-holder-rendered="true">
                                    <?php } ?>
                                </a>
                                <div class="text-center py-3 px-3">
                                    <a href="<?php echo get_permalink($id); ?>" title="<?php echo $post_title; ?>" alt="<?php echo $post_title; ?>">
                                        <h5 class="card-title font-family-01"><?php echo wp_trim_words(get_the_title(), 20); ?></h5>
                                    </a>
                                </div>
                            </div>
                            <!--card end -->
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <a href="/category/mf-tv" class="ctheme-more-articles more-articles">More Articles</a>
    </div>
</div>