<div class="cover_story">
 <?php 
    $sliders = get_field('slider_slides', 254);
    //print_r ($sliders);
    $i=1;
    foreach($sliders as $sl){
        $link_to_post = $sl['link_to_post_post'][0];
        //print_r ($link_to_post);
        $id = $link_to_post->ID;
        $slide_url = get_permalink($id);
        $title = $link_to_post->post_title;
        $slide_image = get_acf_image($sl['link_to_post_custom_image'], 'large');
        if($i==1){
        
 ?>
    <div class="item">
	<a href="<?php echo $slide_url; ?>">
		<img src="
			<?php echo $slide_image; ?>" class="img-cover-story">
			<div class="description">
				<h2>
					<?php echo $title; ?>
				</h2>
			</div>
		</a>
	</div>
 
 <?php }
    $i++;
    } ?>
 </div>
 
 
 
 
 