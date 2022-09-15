<div class="ctheme-grooming">
	<h3 class="text-center py-3 text-uppercase"><?php echo get_cat_name(15); ?></h3>
	<div class="row grooming-container">
		<div class="col-lg-8 col-12 mb-5">
			<div class="row">
				<!-- card -->
				<?php
            $cat_id = 15; //grooming
            $args = array('cat' => $cat_id, 'posts_per_page' => '4', 'post_status' => 'publish');
            $the_query = new WP_Query( $args );
          ?>
				<?php if ($the_query->have_posts()) : ?>
				<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<?php 
                $custom_title = get_field("display_title",get_the_ID()); 
                $post_title = trim(limit_text((!empty($custom_title) ? $custom_title : (apply_filters('the_title', $post->post_title))), 115));
                $cat_name = get_cat_name($cat_id);
                $thumb = generate_image(get_the_ID(),'format_3');
                $post_date = date('d M Y', strtotime($post->post_date));
                $limit_excerpt = strlen($post_title) >= 113 ? 50 : 130;
                $excerpt = !empty($post->post_excerpt) ? $post->post_excerpt : $post->post_content;
                $post_excerpt = limit_text(strip_tags($excerpt), $limit_excerpt);
              ?>
				<div class="col-lg-6 col-md-6 col-sm-6 col-12">
					<div class="mb-4">
						<!-- card -->
						<a href="
							<?php echo get_permalink(); ?>" data_url="
							<?php echo get_permalink(); ?>" class="click_me">
							<img class="card-img-top lazy_loading" data-src="
								<?php echo $thumb; ?>" data-holder-rendered="true">
							</a>
							<div class="py-3 px-3">
								<a href="
									<?php echo get_permalink( $id );?>" title="
									<?php echo $post_title; ?>" alt="
									<?php echo $post_title; ?>">
									<h5 class="card-title text-center font-family-01">
										<?php echo wp_trim_words(get_the_title(), 20); ?>
									</h5>
								</a>
							</div>
						</div>
						<!--card end -->
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<a href="/category/grooming" class="ctheme-more-articles more-articles">More Articles</a>
			</div>
			<div class="col-lg-4 col-12 mb-5">
				<?php dynamic_sidebar( 'grooming-banner' ); ?>
			</div>
		</div>
	</div>