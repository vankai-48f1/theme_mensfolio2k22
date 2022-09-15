<?php
$site_name = get_bloginfo( 'name' );
$year = date('Y');
$copyright = get_field('copyright', 'options');
$copyright_text = str_replace('{year}', $year, $copyright);
?>
        <footer class="ctheme-footer">
            <div class="container">
                
                <div class="row">
                    <div class="col-12">
                        <div class="footer_menu_container">
                            <?php
                            wp_nav_menu( array(
                                'menu'           => 'Footer Menu', // Do not fall back to first non-empty menu.
                                'theme_location' => '__no_such_location',
                            ) );
                            ?>
                        </div>
                        
                        <?php
                        $download_sites = get_field('download_sites', 'options');
                        ?>
                        <div class="download_sites">
                            <ul>
                                <?php
                                if(!empty($download_sites)){                                
                                    foreach($download_sites as $sm){
                                        $name = $sm['name'];
                                        $icon = $sm['icon'];
                                        $url  = $sm['url'];
                                        
                                        echo '<li class="icon">
                                                <a href="'.$url.'" target="_blank"  title="'.$site_name.' '.$name.'" alt="'.$site_name.' on '.$name.'">
                                                    <img src="'.$icon.'">
                                                </a>
                                              </li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <p class="copyright"><?php echo $copyright_text; ?></p>
            </div>
        </footer>
    </div>

    <!-- Url wp admin ajax -->
    <input type="hidden" name="ctheme_wp_admin_ajax" value="<?php echo admin_url("admin-ajax.php")?>">
    <script type="text/javascript">
		var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
		var element = document.getElementById('text');
		if (isMobile) {
  		
		} else {
			const boxes = document.querySelectorAll('.postads');
            boxes.forEach(box => {
            box.remove();
            });
		}
	</script>
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/e1d7a9b3edd56d51707872d13/449053c38b22357927e81c3c3.js");</script>
    <?php //get_template_part('/templates/adzones/ad_floater'); ?>
    <?php //get_template_part('templates/adzones/ad_oop'); ?>
    <?php //get_template_part('templates/adzones/ad_inskin-pageskin'); ?>
</body>
<?php wp_footer(); ?>
</html>
