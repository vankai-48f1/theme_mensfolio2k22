<?php
function mensfolio_enqueue_style()
{
    // override all.min.js parent
    wp_dequeue_script('all_scripts');
    wp_dequeue_script('custom-script');
    wp_enqueue_script('child_theme_all_scripts', get_stylesheet_directory_uri() . '/dist/components/all.min.js', false, false, true);
    wp_enqueue_script('child_theme_all_scripts', get_stylesheet_directory_uri() . '/assets/js/back-to-top.js', false, false, true);

    // Css
    wp_enqueue_style('child_theme_style_css', get_stylesheet_directory_uri() . '/assets/css/style.css', false);
    // Javascript
    wp_enqueue_script('child_theme_app_script', get_stylesheet_directory_uri() . '/assets/js/app.js', false, true, true);
}
add_action('wp_enqueue_scripts', 'mensfolio_enqueue_style', 11);

function custom_child_theme_widget()
{
    register_sidebar(array(
        'name' => __('Business Banner', 'twentytwelve'),
        'id' => 'business-banner',
        'description' => __('Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve'),
        'before_widget' => '<aside id="%1$s" class="leftbanner %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'custom_child_theme_widget');

// Tạo related posts 
function mcustomize_blog_related_post($title = 'Bài viết liên quan', $count = 5)
{
    global $post;
    $tag_ids = array();
    $current_cat = get_the_category($post->ID);
    $current_cat = $current_cat[0]->cat_ID;
    $this_cat = '';
    $tags = get_the_tags($post->ID);
    if ($tags) {
        foreach ($tags as $tag) {
            $tag_ids[] = $tag->term_id;
        }
    } else {
        $this_cat = $current_cat;
    }

    $args = array(
        'post_type'   => get_post_type(),
        'showposts' => $count,
        'orderby'     => 'date',
        'cat'         => $current_cat,
        'post__not_in' => array($post->ID),
    );
    $the_query = new WP_Query($args);

    if (empty($the_query)) {
        $args['tag__in'] = '';
        $args['cat'] = $current_cat;
        $the_query = get_posts($args);
    }
    if (empty($the_query)) {
        return;
    }

    $post_list = '';
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
            //echo '<p>' . get_the_title() . '</p>';
            $post_list .= load_template_part('templates/articles/content', 'related-article');
        endwhile;
        wp_reset_postdata();
    endif;

    return sprintf('
			<div class="post-related my-4">
				<h3 class="post-related-title mb-4">%s</h3>
				<div class="row">%s</div>
			</div>
		', $title, $post_list);
}

function load_template_part($template_name, $part_name = null)
{
    ob_start();
    get_template_part($template_name, $part_name);
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

// Handle ajax 

add_action('wp_ajax_loadmore', 'ctheme_ajax_more_article');
add_action('wp_ajax_nopriv_loadmore', 'ctheme_ajax_more_article');
function ctheme_ajax_more_article()
{
    $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0; // lấy dữ liệu phái client gởi
    $author_id = isset($_POST['author_id']) ? (int)$_POST['author_id'] : 0; // lấy dữ liệu phái client gởi
    //var_dump('đã vô');
    if ($author_id) :
        $args = array(
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'orderby'          => 'date',
            'order'            => 'DESC',
            'showposts'        => 6,
            'author'           => $author_id,
            'offset'           => $offset
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
                get_template_part('templates/common/author', 'article');
            endwhile;
        else :
            echo '<div class="text-danger col-12 my-3 text-center">Did not find the article</div>';
        endif;
        wp_reset_postdata();

    else :
        echo '<div class="text-danger col-12 my-3 text-center">Author ID invalid</div>';
    endif;
    die();
}
