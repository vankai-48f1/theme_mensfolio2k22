<?php
$id = $post->ID;
$categories = get_the_category();

$post_title = single_post_title('', false);
$author = ucwords(get_the_author());
$photography_by = get_field('photography_by');
$styling_by = get_field('styling_by');
$sponsored_article = get_field("sponsored_article", get_the_ID());
$cat_id = 0;
$category_id = 0;
?>

<div class="container">
    <?php
    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($id), "large");

    if (!empty($featured_image)) {
    ?>
        <div class="post-featured-image">
            <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($id), "large")[0]; ?>" title="<?php echo $post_title; ?>" alt="<?php echo $post_title; ?>">
        </div>
    <?php
    }
    ?>

    <section class="single_post_content ctheme-post-content">
        <div class="row">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-10 col-md-10">
                <div class="entry_blog_meta">
                    <!-- Category -->
                    <?php
                    if (!empty($categories)) {
                    ?>
                        <span class="post_cat">
                            <?php
                            $cat = array();
                            $c_id = array();
                            foreach ($categories as $key => $c) {
                                if ($key == 0) {
                                    $cat_id = $c->term_id;
                                }

                                $c_id[] = $c->term_id;
                                $cat[] = '<a href="' . get_term_link($c) . '" class="ctheme-cate-post">' . $c->name . '</a>';
                            }

                            $category_id = implode($c_id);

                            echo implode('&ensp;', $cat);
                            ?>
                        </span>
                    <?php } ?>

                    <div class="text-center">
                        <h2 class="heading_title font-primary-01 text-uppercase mb-1"><?php echo $post_title; ?></h2>

                        <ul class="ctheme-post-meta">
                            <?php if (has_excerpt()) : ?>
                                <li class="post-excerpt ctheme-post-excerpt"><?php echo get_the_excerpt($id) ?></li>
                            <?php endif; ?>

                            <li class="publish-date mb-3" title="Published Date">
                                <time class="entry-date">
                                    <?php echo get_the_date("F d, Y"); ?>
                                </time>
                            </li>
                            <li class="author-by" title="Posted By">

                                <!-- Author -->
                                <div class="post-author">
                                    <?php $avatar_url = get_avatar_url(get_the_author_meta('ID'), array('size' => 450)); ?>
                                    <div class="post-author-info article-latest__category">
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author-picture-wrap">
                                            <?php
                                            $avatar_user = get_field('avatar_user', 'user_' . get_the_author_meta('ID'));
                                            if ($avatar_user['url']) {
                                                echo '<img src="' . $avatar_user['url'] . '" alt="' . $avatar_user['title'] . '" class="author-picture"/>';
                                            }
                                            ?>

                                            <!-- <img src="< ?php echo esc_url($avatar_url); ?>" alt="" class="author-picture"> -->
                                        </a>
                                        <div class="post-author-name font-secondary-medium-01 cl-white pt-2">
                                            <span class="author">
                                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>"> <?php echo $author; ?> </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="entry_summary ctheme-entry-summary">

                    <?php echo the_content(); ?>
                </div>
            </div>
            <div class="col-lg-1 col-md-1"></div>
        </div>
    </section>
</div>

<div class="container">
    <div id="end-content">&nbsp;</div>
</div>

<div class="container">
    <?php echo mcustomize_blog_related_post('Related Article', 3) ?>
</div>