<?php
/**
 * Template for displaying search forms in mensfolio2k17
 *
 * @package WordPress
 * @subpackage mensfolio2k17
 * @since 1.0
 * @version 1.0
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<div class="ctheme-search <?php echo !empty(get_search_query()) ? 'active' : ''; ?>" style="<?php echo !empty(get_search_query()) ? 'display:block' : ''; ?>">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="search" id="<?php echo $unique_id; ?>" class="search-field form-control" placeholder="Nhập từ khóa tìm kiếm" value="<?php echo get_search_query(); ?>" name="s" />
    </form>
</div>
