<?php
$custom_title = get_field("display_title", get_the_ID());
$post_title = trim(limit_text((!empty($custom_title) ? $custom_title : (apply_filters('the_title', $post->post_title))), 115));
$cat_name = get_cat_name($cat_id);
$thumb = generate_image(get_the_ID(), 'format_6');
$post_date = date('d M Y', strtotime($post->post_date));
$limit_excerpt = strlen($post_title) >= 113 ? 50 : 130;
$excerpt = !empty($post->post_excerpt) ? $post->post_excerpt : $post->post_content;
$post_excerpt = limit_text(strip_tags($excerpt), $limit_excerpt);
?>
<div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
    <div class="mb-4">
        <!-- card -->
        <a href="<?php echo get_permalink(); ?>" data_url="<?php echo get_permalink(); ?>" class="click_me d-block mb-2">
            <img class="card-img-top" src="<?php echo $thumb; ?>">
        </a>
        <div class="text-center py-3 px-3">
            <a href="<?php echo get_permalink($id); ?>" title="<?php echo $post_title; ?>" alt="<?php echo $post_title; ?>">
                <h5 class="card-title font-family-01"><?php echo wp_trim_words(get_the_title(), 20); ?></h5>
            </a>

        </div>
    </div>
    <!--card end -->
</div>