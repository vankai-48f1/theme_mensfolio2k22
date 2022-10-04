<?php
get_header();
$current_cate = get_queried_object();
?>
<div class="ctheme-cate-banner ctheme-banner pb-5">
    <?php if (get_field('banner_slider_tax', $current_cate)) : ?>
        <?php get_template_part('templates/common/banner', 'slider') ?>
    <?php endif; ?>
</div>

<?php
$sticky_post = get_field('sticky_stories', 'options');
$stick_post_id = get_ad_internal_ids($sticky_post);
$cat_id = get_query_var('cat');
$cat_name = get_cat_name($cat_id);
$request_type = "post";
$request_id = 0;
$page_no = get_query_var('paged');

$args = array(
    'post_type'        => 'post',
    'posts_per_page'   => 10,
    'post_status'      => 'publish',
    'orderby'          => 'date',
    'order'            => 'DESC',
    'paged'            => $page_no,
);
if (!empty($cat_id)) {
    $args = array_merge($args, array('cat' => $cat_id));
    $request_type = "cat";
}

$the_query = new WP_Query($args);
?>
<?php if ($the_query->have_posts()) : ?>
    <div class="container">
        <div class="category-header">
            <h3 class="text-center pb-4 text-uppercase"><?php echo get_cat_name($cat_id); ?></h3>
        </div>
        <div class="category-wrap">
            <div class="row">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php
                    $thumb = ctheme_generate_image(get_the_ID(), 'format_2');
                    $custom_title = get_field("display_title", get_the_ID());
                    $post_title = trim(limit_text((!empty($custom_title) ? $custom_title : (apply_filters('the_title', $post->post_title))), 115));
                    $categories = get_the_category($id);
                    $post_date = date('d M Y', strtotime($post->post_date));
                    $limit_excerpt = strlen($post_title) >= 113 ? 50 : 130;
                    $excerpt = !empty($post->post_excerpt) ? $post->post_excerpt : $post->post_content;
                    $post_excerpt = limit_text(strip_tags($excerpt), $limit_excerpt);
                    $request_id = $request_type == "cat" ? $cat_id : $id;
                    $cat_name = get_cat_name($cat_id);
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="latest-card mb-2">
                            <!-- card -->
                            <a href="<?php echo get_permalink(); ?>" data_url="<?php echo get_permalink(); ?>" class="click_me">
                                <img class="card-img-top lazy_loading" data-src="<?php echo $thumb; ?>" data-holder-rendered="true">
                            </a>
                            <div class="py-3 px-3 text-center">
                                <a href="<?php echo get_category_link($cat_id) ?>" class="d-block mb-2 ctheme-cate-post">
                                    <?php echo $cat_name; ?>
                                </a>
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
            <div class="row">
                <?php
                echo '<div class="col-12 text-center">';
                the_posts_pagination(array(
                    'prev_text'          => __('<', 'twentyfifteen'),
                    'next_text'          => __('>', 'twentyfifteen'),
                    'class'              => 'ctheme-pagination',
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('', 'twentyfifteen') . ' </span>',
                ));
                echo '</div>';

                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php get_footer(); ?>