<?php

/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-180x180.png">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicons/manifest.json">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;700&family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favicons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="/wp-content/themes/mensfolio2k19/dist/components/local-classic-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #mc_embed_signup {
            background: #fff;
            clear: left;
            font: 14px Helvetica, Arial, sans-serif;
        }

        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. 
    ?>
    <?php wp_head(); ?>

    <script type="text/javascript">
        var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-178740059-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-178740059-1');
    </script>

    <?php //include(TEMPLATEPATH . '/templates/adzones/ad_gpt.php'); 
    ?>
</head>

<body <?php body_class(); ?>>


    <div id="main">
        <?php
        $is_sponsored = is_single() ? get_field('sponsored_article', $post->ID) : false;
        $logo = get_field('logo', 'options');
        $site_name = get_bloginfo('name');
        $description = get_bloginfo('description');

        set_query_var("is_sponsored", $is_sponsored);
        ?>
        <header class="ctheme-header">
            <!-- <div class="container">
                < ?php
                function isMobileDevice()
                {
                    return preg_match(
                        "/(android|avantgo|blackberry|bolt|boost|cricket|docomo 
                        |fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",
                        $_SERVER["HTTP_USER_AGENT"]
                    );
                }
                if (isMobileDevice()) {
                    dynamic_sidebar('top-mobile-banner');
                } else {
                    dynamic_sidebar('top-banner');
                }
                ?>

            </div> -->
            <div class="site_navigation">
                <section id="desktop-container">
                    <div class="container desktop_config">
                        <div class="row align-items-center">
                            <!-- Social -->
                            <div class="col-lg-3 col-12">
                                <?php
                                $social_medias = get_field('social_medias', 'options');
                                ?>
                                <div class="social_media social_media--social">
                                    <ul>
                                        <?php
                                        if (!empty($social_medias)) {
                                            foreach ($social_medias as $sm) {
                                                $name = $sm['name'];
                                                $icon = $sm['icon'];
                                                $url  = $sm['url'];

                                        ?>
                                                <li class="icon">
                                                    <?php
                                                    if ($name == 'Facebook' || $name == 'Instagram' || $name == 'Youtube') {
                                                        echo (!empty($icon) ? '<a href="' . $url . '" title="' . $site_name . ' ' . $name . '"  alt="' . $site_name . ' ' . $name . '" target="_blank"><img src="' . $icon . '"  title="' . $site_name . ' ' . $name . '"  alt="' . $site_name . ' ' . $name . '" ></a>' : '<span class="s_heading">' . $name . '</span>');
                                                    }

                                                    ?>
                                                </li>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </ul>

                                </div>
                            </div>
                            <!-- Logo -->
                            <div class="col-lg-6 col-12 text-center pt-2 pb-4 ctheme-logo-ctn">
                                <h1>
                                    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo  $site_name . ' - ' . $description; ?>" alt="<?php echo  $site_name . ' - ' . $description; ?>>">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/mf-logo-black.png" title="<?php echo  $site_name . ' - ' . $description; ?>" alt="<?php echo  $site_name . ' - ' . $description; ?>">
                                    </a>
                                </h1>
                            </div>
                            <!-- Language -->
                            <div class="col-lg-3 col-12">
                                <div class="ctheme-header__top-right">
                                    <!-- <div class="ctheme-header__hashtag"><span>#Fitclub</span>&nbsp;<span>#Trending</span>&nbsp;<span>#CQQJZ</span></div> -->
                                    <?php
                                    $tags = get_tags(array(
                                        'taxonomy'                  => 'post_tag',
                                        'orderby'                   => 'count',
                                        'number'                    => 3,
                                        'order'                     => 'DESC',
                                        'ignore_term_order' => TRUE
                                    ));
                                    echo '<div class="ctheme-header__hashtag">';
                                    foreach ($tags as $tag) {
                                        $tag_link = get_tag_link($tag->term_id);
                                        echo "<span class='ctheme-header__hashtag-item'><a href='$tag_link' title='$tag->name'>#$tag->name($tag->count)</a></span>";
                                    }
                                    echo '</div>';
                                    ?>
                                    <!-- <div class="ctheme-header__hashtag">
                                        <a href="< ?php echo get_tag_link(267) ?>">#< ?php echo get_tag(267)->name ?></a>
                                        <a href="< ?php echo get_tag_link(321) ?>">#< ?php echo get_tag(321)->name ?></a>
                                        <a href="< ?php echo get_tag_link(51) ?>">#< ?php echo get_tag(51)->name ?></a>
                                    </div> -->
                                    <div class="social_media--language">
                                        <ul>
                                            <li>
                                                <div class="language-default dropbtn">VIET NAM</div>
                                                <ul class="dropdown">
                                                    <li>
                                                        <a href="http://mens-folio.com">SINGAPORE</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://mens-folio.com.my">MALAYSIA</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://mens-folio.id">INDONESIA</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ctheme-navbar">
                        <div class="container">
                            <div class="row ctheme-navbar__row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="ctheme-menu-ctn">
                                        <!-- Menu -->
                                        <?php
                                        wp_nav_menu(array(
                                            'menu'           => 'Menu 2', // Do not fall back to first non-empty menu.
                                            'theme_location' => '__no_such_location',
                                            'menu_class'     => 'ctheme-nav',
                                            'container_class' => 'ctheme-nav-wrap menu-menu-2-container',
                                        ));
                                        ?>
                                        <!-- Search -->
                                        <div class="icon ctheme-search-icon">
                                            <a href="#" title="Men's Folio Search" alt="Men's Folio Search" class="search">
                                                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/icon_search_white.png" title="Men's Folio Search" alt="Men's Folio Search">
                                            </a>
                                        </div>
                                        <?php echo get_search_form(true); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="mobile-container" class="ctheme-mobile-menu">
                    <div class="container mobile_config">
                        <div class="row">
                            <div class="col-12">
                                <nav class="navbar navbar-light">
                                    <!--fixed-top-->
                                    <a class="logo navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo  $site_name . ' - ' . $description; ?>" alt="<?php echo  $site_name . ' - ' . $description; ?>">
                                        <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/mf-logo-black.png" title="<?php echo  $site_name . ' - ' . $description; ?>" alt="<?php echo  $site_name . ' - ' . $description; ?>">
                                    </a>

                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <!--Separator-->
                                    <hr>

                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <?php
                                        wp_nav_menu(array(
                                            'menu'           => 'Menu 2', // Do not fall back to first non-empty menu.
                                            'theme_location' => '__no_such_location',
                                            'items_wrap'     => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>'
                                        ));
                                        ?>
                                    </div>

                                    <div class="social_media">
                                        <div class="ctheme-mobile-social">
                                            <div class="ctheme-mobile-social__left">
                                                <?php echo get_search_form(true); ?>
                                            </div>
                                            <div class="ctheme-mobile-social__right">
                                                <ul>
                                                    <li onclick="dropdowntoggle()" class="dropbtn">
                                                        <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/flags/4x3/vn.svg" class="flag dropbtn">
                                                        <ul id="dropdowncontent" class="dropdown">
                                                            <li>
                                                                <a href="https://www.mens-folio.com/"><img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/flags/4x3/sg.svg" class="flag"></a>
                                                            </li>
                                                            <li>
                                                                <a href="http://mens-folio.com.my"><img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/flags/4x3/my.svg" class="flag"></a>
                                                            </li>
                                                            <li>
                                                                <a href="https://mens-folio.id"><img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/flags/4x3/id.svg" class="flag"></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <?php
                                                    if (!empty($social_medias)) {
                                                        foreach ($social_medias as $sm) {
                                                            $name = $sm['name'];
                                                            $icon = $sm['icon'];
                                                            $url  = $sm['url'];

                                                    ?>
                                                            <li class="icon <?php echo strtolower($name); ?>">
                                                                <?php
                                                                echo (!empty($icon) ? '<a href="' . $url . '" title="' . $site_name . ' ' . $name . '"  alt="' . $site_name . ' ' . $name . '" target="_blank"><img src="' . $icon . '"  title="' . $site_name . ' ' . $name . '"  alt="' . $site_name . ' ' . $name . '" ></a>' : '<span class="s_heading">' . $name . '</span>')
                                                                ?>
                                                            </li>
                                                    <?php
                                                            //echo '<li class="icon">'.(!empty($icon) ? '<a href="'.$url.'" style="background:url('.$icon.')" title="'.$name.'"  alt="'.$name.'" targe="_blank">&nbsp;</a>' : '<span class="s_heading">'.$name.'</span>').'</li>';
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </header>
        <!-- <section id="statusbar">
    <div class="alert alert-warning"><a href="https://www.mens-folio.com/magazine/" target="_blank">CLICK HERE TO READ THE AUGUST 2020 ISSUE!</a><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>
  </section> -->