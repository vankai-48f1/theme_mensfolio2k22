<?php
get_header();
?>

<div class="ctheme-hm-slider">
    <?php get_template_part('templates/common/content', 'slider') ?>
</div>

<!-- <div class="ctheme-banner">
    < ?php get_template_part('templates/common/cover', 'story') ?>
</div> -->

<!-- Trending BEGIN -->
<div class="ctheme-hm-trending">
    <!-- < ?php include (TEMPLATEPATH . '/templates/common/trending.php'); ?> -->
    <?php get_template_part('templates/common/trending') ?>
</div>
<!-- Trending End -->

<?php
$sticky_post = get_field('sticky_stories', 'options');
$stick_post_id = get_ad_internal_ids($sticky_post);
$cat_id = get_query_var('cat');
$cat_name = get_cat_name($cat_id);
$request_type = "post";
$request_id = 0;
$page_no = get_query_var('paged');
?>
<div class="container-fluid">
    <div class="">
        <h3 class="text-center py-3 text-uppercase">STYLE</h3>
        <div class="row style-container mb-5">

            <!-- Style List Start -->
            <!-- < ?php include(TEMPLATEPATH . '/templates/common/style-list.php'); ?> -->
            <?php get_template_part('templates/common/style', 'list') ?>
            <!-- Style List End -->

            <!-- Local List Start -->
            <!-- < ?php include(TEMPLATEPATH . '/templates/common/local.php'); ?> -->
            <!-- Local List End -->

        </div>
    </div>

    <hr>
    <!-- Time List Start -->
    <!-- < ?php include(TEMPLATEPATH . '/templates/common/time.php'); ?> -->
    <!-- Time List End -->

    <!-- <hr> -->
    <!-- cover story -->
    <!-- < ?php include(TEMPLATEPATH . '/templates/common/sticky-story.php'); ?> -->

    <!-- Grooming List Start -->
    <!-- < ?php include(TEMPLATEPATH . '/templates/common/grooming.php'); ?> -->
    <?php get_template_part('templates/common/grooming') ?>

    <!-- Grooming List End -->
    <hr>
    <!-- Health & Fitness -->
    <?php get_template_part('templates/common/health', 'fitness') ?>

    <!-- cover story -->
    <div class="ctheme-banner py-5">
        <?php get_template_part('templates/common/cover', 'story') ?>
    </div>
    <hr>

    <!-- < ?php get_template_part('templates/common/sticky', 'story') ?> -->

    <!-- Lifestyle List Start -->
    <?php get_template_part('templates/common/life', 'style') ?>
    <!-- Lifestyle List End -->

    <!-- Business Start -->
    <!-- < ?php get_template_part('templates/common/business') ?> -->
    <!-- Business End -->
    
    <!-- Car Start -->
    <?php get_template_part('templates/common/car') ?>
    <!-- Car End -->
    <hr>
    
    <!-- Business Start-->
    <?php get_template_part('templates/common/business') ?>
    <!-- Business End -->

    <?php get_template_part('templates/common/sticky', 'story') ?>

    <!-- Talent hub Start -->
    <?php get_template_part('templates/common/talent', 'hub') ?>
    <!-- Talent hub End -->

    <!-- < ?php include(TEMPLATEPATH . '/templates/common/sticky-story3.php'); ?> -->

    <!-- Trending BEGIN -->
    <!-- < ?php include(TEMPLATEPATH . '/templates/common/an-by-men.php'); ?> -->
    <!-- Trending End -->

    <!-- POP List Start -->
    <!-- < ?php include(TEMPLATEPATH . '/templates/common/pop.php'); ?> -->
    <!-- POP List End -->

    <!-- MF TV List Start -->
    <?php get_template_part('templates/common/mf', 'tv') ?>
    <!-- < ?php include(TEMPLATEPATH . '/templates/common/mf-tv.php'); ?> -->
    <!-- MF TV List End -->
</div>

<!-- Begin Mailchimp Signup Form -->
<div id="mc_embed_signup" class="d-none">
    <form action="https://heart-media.us15.list-manage.com/subscribe/post?u=5abb8fbf256bd37c2cc8d4c30&amp;id=bf0a836fb4&Source=MFSG-Homepage" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="hustle-title-hm">Men’s Folio Vietnam</h2>
                    <p class="hustle-subtitle-hm"><strong>CẬP NHẬT NGAY<br> Đăng ký nhận email mỗi tuần để cập nhật những tin tức về xu hướng, thời trang, phong cách sống sành điệu dành cho phái mạnh.</strong></p>
                    <div class="mc-field-group">
                        <label for="mce-EMAIL">Email Address <span class="asterisk">*</span>
                        </label>
                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                    </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5abb8fbf256bd37c2cc8d4c30_bf0a836fb4" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" style="background-color: #000;color: #fff"></div>
                    <?php dynamic_sidebar('booking-banner2'); ?>
                </div>
                <div class="col-md-3">
                    <?php dynamic_sidebar('booking-banner'); ?>
                </div>

            </div>
        </div>
    </form>
</div>
<script type='text/javascript' src='/wp-content/themes/mensfolio2k19/js/local-mc-validate.js'></script>
<script type='text/javascript'>
    (function($) {
        window.fnames = new Array();
        window.ftypes = new Array();
        fnames[0] = 'EMAIL';
        ftypes[0] = 'email';
        fnames[1] = 'FNAME';
        ftypes[1] = 'text';
        fnames[2] = 'LNAME';
        ftypes[2] = 'text';
    }(jQuery));
    var $mcj = jQuery.noConflict(true);
</script>
<!--End mc_embed_signup-->
</div>

<?php //include(TEMPLATEPATH . '/templates/adzones/ad_billboard_2.php'); 
?>
<?php //include(TEMPLATEPATH . '/templates/common/sidebar.php'); 
?>
<?php get_footer(); ?>