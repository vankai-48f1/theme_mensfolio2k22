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
            <img class="card-img-top" src="<?php echo $thumb; ?>">
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