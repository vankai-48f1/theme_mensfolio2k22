<?php
get_header();
?>
<div class="container leaderboard-zone">
    <?php include(TEMPLATEPATH . '/templates/adzones/ad_leaderboard.php'); ?>
</div>


<?php
$sticky_post = get_field('sticky_stories', 'options');
$stick_post_id = get_ad_internal_ids($sticky_post);
$author_id = get_the_author_meta('ID');
$cat_id = get_query_var('cat');
$cat_name = get_cat_name($cat_id);
$request_type = "post";
$request_id = 0;
$page_no = get_query_var('paged');

$args = array(
    'post_type'        => 'post',
    'posts_per_page'   => 6,
    'post_status'      => 'publish',
    'orderby'          => 'date',
    'order'            => 'DESC',
    'paged'            => $page_no,
    'author'           => $author_id,
);
$the_query = new WP_Query($args);
?>
<?php if ($the_query->have_posts()) : ?>
    <div class="ctheme-author">
        <div class="container">
            <div class="author-header">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 col-12">
                        <div class="row align-items-center">
                            <!-- Author avatar -->
                            <div class="col-md-4 col-12">
                                <!-- Author -->
                                <div class="post-author">
                                    <?php $avatar_url = get_avatar_url(get_the_author_meta('ID'), array('size' => 450)); ?>
                                    <div class="author-picture-wrap">
                                        <img src="<?php echo esc_url($avatar_url); ?>" alt="" class="author-picture">
                                    </div>
                                </div>
                            </div>
                            <!-- Author info -->
                            <div class="col-md-8 col-12">
                                <?php $author_data = get_userdata(get_the_author_meta('ID')); ?>
                                <div class="author-info">
                                    <div class="author-name mb-3">
                                        <h3 class="font-primary-01 my-0"><?php echo get_the_author_meta('display_name'); ?></h3>
                                        <div class="author-role font-family-01 pt-1"><?php echo $author_data->roles[0]; ?></div>
                                    </div>
                                    <div class="author-desc font-family-01"><?php echo get_the_author_meta('description'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="author-wrap">
                <div class="row">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php
                        $thumb = generate_image(get_the_ID(), 'format_2');
                        $custom_title = get_field("display_title", get_the_ID());
                        $post_title = trim(limit_text((!empty($custom_title) ? $custom_title : (apply_filters('the_title', $post->post_title))), 115));
                        $categories = get_the_category($id);
                        $post_date = date('d M Y', strtotime($post->post_date));
                        $limit_excerpt = strlen($post_title) >= 113 ? 50 : 130;
                        $excerpt = !empty($post->post_excerpt) ? $post->post_excerpt : $post->post_content;
                        $post_excerpt = limit_text(strip_tags($excerpt), $limit_excerpt);
                        $request_id = $request_type == "cat" ? $cat_id : $id;
                        $cats = get_the_category($id);
                        ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                            <div class="latest-card mb-2">
                                <!-- card -->
                                <a href="<?php echo get_permalink(); ?>" data_url="<?php echo get_permalink(); ?>" class="click_me">
                                    <img class="card-img-top lazy_loading" data-src="<?php echo $thumb; ?>" data-holder-rendered="true">
                                </a>
                                <div class="py-3 px-3 text-center">
                                    <div class="author-post-cate mb-2">
                                        <?php foreach ($cats as $cat) : ?>
                                            <a href="<?php echo get_category_link($cat->cat_ID); ?>" class="ctheme-cate-post">
                                                <?php echo $cat->name; ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                    <a href="<?php echo get_permalink($id); ?>" title="<?php echo $post_title; ?>" alt="<?php echo $post_title; ?>">
                                        <h5 class="card-title text-center font-family-01">
                                            <?php echo $post_title ?>
                                        </h5>
                                    </a>
                                </div>
                            </div>
                            <!-- card end -->
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="row ctheme-author-listmore"></div>

                <!-- Button load more -->
                <div class="ajax-loadmore text-center mb-5">
                    <input type="hidden" name="ctheme_author_id" value="<?php echo get_the_author_meta('ID'); ?>">
                    <button class="ajax-loadmore-btn ctheme-loadmore-btn more-articles">More Articles</button>
                </div>
                <!-- Button load more End -->

                <div class="row">
                    <?php
                    // echo '<div class="col-12 text-center">';
                    // the_posts_pagination(array(
                    //     'prev_text'          => __('<', 'twentyfifteen'),
                    //     'next_text'          => __('>', 'twentyfifteen'),
                    //     'class'              => 'ctheme-pagination',
                    //     'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('', 'twentyfifteen') . ' </span>',
                    // ));
                    // echo '</div>';

                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php get_footer(); ?>