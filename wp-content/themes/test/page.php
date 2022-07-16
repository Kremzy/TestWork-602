<?php
get_header();
?><div class="container">
	<div class="main__body">
		<div class="article">
			<div class="search">
				<div class="search__blog">
					<div class="block-title">
					</div>
					<div class="blog-list">
						<div class="blog-list__list">
							<?php
							$args = array(  
								'post_type' => 'product',
								'post_status' => 'publish',
								'posts_per_page' => 9, 
								'orderby' => 'date', 
								'order' => 'DESC', 
							);

							$loop = new WP_Query( $args ); 

							while ( $loop->have_posts() ) : $loop->the_post();?>
								<?php $thumbnail = get_the_post_thumbnail_url();?>
								<?php $product = wc_get_product();?> 
								<div class="blog-list__item">
									<span class="blog-list-item__image" style="background-image: url(<?php echo $thumbnail;?>)"></span>
									<span class="blog-list-item__caption"><span class="blog-list-item__title"><?php the_title();?></span>
									<span class="blog-list-item__description"><?php the_content();?></span>
									<span class="blog-list-item__bottom"><span class="blog-list-item__date">
										<?php $sale_price = $product->sale_price;?>
										<?php $product_price = $product->regular_price;?>
										<?php if(!empty($sale_price)):?>
											<?php echo $sale_price.'$';?>

										<?php else:?>
											<?php echo $product_price.'$';?>

											<?php endif;?>
												
											</span>
										</span></span>
									</div>
								<?php endwhile;?>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
	<?php
	get_footer();
