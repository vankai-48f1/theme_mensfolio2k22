<!-- Content banner slider -->
<?php
$category = get_queried_object();
$banner = get_field('banner_slider_tax', $category);
// var_dump($banner);
?>
<?php if ($banner) : ?>
    <div class="banner-slider">
        <div class="banner-slider__wrapper">
            <div class="banner-slider__main">
                <div class="banner-slider__item">
                    <a href="<?php echo $banner['link'] ? $banner['link'] : '#'; ?>" class="banner-slider__link">
                        <?php
                        if ($banner['image']['url']) : ?>
                            <div class="banner-slider__image">
                                <?php echo '<img src="' . $banner['image']['url'] . '" alt="' . $banner['image']['title'] . '" class="author-picture"/>'; ?>
                            </div>
                        <?php endif; ?>
                        <div class="banner-slider__content">
                            <h2><?php echo $banner['title'] ?></h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>