<?php
	if ( !defined('ABSPATH') ){ die(); }
	
	global $avia_config;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();

	$title  = __('Blog - Latest News', 'avia_framework'); //default blog title
	$t_link = home_url('/');
	$t_sub = "";

	if(avia_get_option('frontpage') && $new = avia_get_option('blogpage'))
	{
		$title 	= get_the_title($new); //if the blog is attached to a page use this title
		$t_link = get_permalink($new);
		$t_sub =  avia_post_meta($new, 'subtitle');
	}

	if( get_post_meta(get_the_ID(), 'header', true) != 'no') echo avia_title(array('heading'=>'strong', 'title' => $title, 'link' => $t_link, 'subtitle' => $t_sub));
	
	do_action( 'ava_after_main_title' );


	if( get_field('veg_spicy') ){
		$spicy = get_field('veg_spicy');
		
		} else {
	   $spicy = ('0');
	}

	if( get_field('veg_sweet') ){
		$sweet = get_field('veg_sweet');
		
		} else {
	   $sweet = ('0');
	}

	if( get_the_post_thumbnail_url('') ){
		$hero_img = get_the_post_thumbnail_url('');
		
		} else {
	   $hero_img = ('https://sqft.specialops.io/wp-content/uploads/no-image-uploaded-1.jpg');
	}

	global $post;
$terms = wp_get_post_terms($post->ID, 'vegetable_type', array('fields' => 'ids'));
	$color = get_field('veg_type_color', 'vegetable_type_'.$terms[0]); 
?>

<?php



//print_r($terms);



?>


<style>
	.glsr-button {
		background-color: <?php echo $color; ?> !important;
		border-color: <?php echo $color ; ?> !important;
		border-radius: .25rem;
	}
	#socket {
		background-color: <?php echo $color; ?> !important;
	}

	span.glsr-button-text {
	font-weight: bold;
	}
	.veg-vitamin-container {
		background-color: <? echo $color;?>25;
	}

	div.veg-other-nutrients > p.nutrients > a{
		color: <? echo $color;?> !important;
	}

	a.av-masonry-pagination.av-masonry-load-more{
		color: <? echo $color;?> !important;
	}

	 
</style>


<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

	<div class='container template-blog template-single-blog '>

		<main class='content units <?php avia_layout_class( 'content' ); ?> <?php echo avia_blog_class_string(); ?>'
			<?php avia_markup_helper(array('context' => 'content','post_type'=>'post'));?>>
			<div class="entry-content-wrapper clearfix">

			

<div class="breadcrumbs">
<ul class="breadcrumb-list"></ul>
	<li class="breadcrumbs-list-item"><a href="https://sqft.specialops.io/" class="link">Home</a></li>
	<li class="breadcrumbs-list-item"><a href="https://sqft.specialops.io/vegetables"class="link">Vegetables</a></li>
	<li class="breadcrumbs-list-item"><?php
								$taxonomy = 'vegetable_type';

								// get the term IDs assigned to post.
								$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
								// separator between links
								$separator = ', ';

								if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

								$term_ids = implode( ',' , $post_terms );
								$terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
								$terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

									// display post categories
									
								echo $terms;
								
							
								}
							?></li>
							<li class="breadcrumbs-list-item"><? echo get_the_title(); ?></li>
</ul></div>
				<div class="flex_column av_one_full  avia-full-stretch flex_column_div first  avia-builder-el-0  el_before_av_textblock  avia-builder-el-first  veg-hero-container hero-container "
					style="background:url(<? echo $hero_img;?>)  center no-repeat ; padding:16px; border-radius:0px; ">
					<section class="av_textblock_section " itemscope="itemscope"
						itemtype="https://schema.org/CreativeWork">
						<div class="avia_textblock  " itemprop="text">
							<div id="veg-hero">
								<div class="veg-hero-top">
									<div class="veg-hero-side-1">
										<h1 class="veg-name"><? echo get_the_title() ?></h1>
										<p><em class="veg-latin"><?php if ( get_field('veg_latin') ) : ?>
											<?php echo get_field('veg_latin'); ?>
										<?php endif; ?>
										</em></p>
									</div>
									<div class="veg-hero-side-2">
									
											
											<p class="veg-type" style="background-color: <?php echo $color; ?>!important;"><?php
								$taxonomy = 'vegetable_type';

								// get the term IDs assigned to post.
								$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
								// separator between links
								$separator = '&nbsp ';

								if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

								$term_ids = implode( ',' , $post_terms );
								$terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
								$terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

									// display post categories
									
								echo $terms;
								
							
								}
							?></p>
										
										
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<section class="av_textblock_section " itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
					<div class="avia_textblock  " itemprop="text">
						<div class="veg-hero-bottom" style="background-color: <?php echo $color; ?>!important;">
							<div class="veg-seasons-container">
							<?php
								$taxonomy = 'seasons';

								// get the term IDs assigned to post.
								$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
								// separator between links
								$separator = '&nbsp ';

								if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

								$term_ids = implode( ',' , $post_terms );
								$terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
								$terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

									// display post categories
									
								echo '<p class="veg-season"> '.$terms.'</p>';
								
							
								}
							?>
							
								
							</div>
							<div class="veg-availability-container">
								<p class="veg-availability"><?php if ( get_field('availability') ) : ?>
									In Stock!
								<?php else: ?>
									Out of Stock
								<?php endif; ?>
								</p>
							</div>
						</div>
					</div>
				</section>
				<div class="flex_column av_one_full  flex_column_div av-zero-column-padding first  avia-builder-el-3  el_after_av_textblock  el_before_av_one_third  veg-description description column-top-margin"
					style="border-radius:0px; ">
					<section class="av_textblock_section " itemscope="itemscope"
						itemtype="https://schema.org/CreativeWork">
						<div class="avia_textblock  " itemprop="text">
							<p class="veg-description"><?php if ( get_field('veg_description') ) : ?>
								<?php echo get_field('veg_description'); ?>
							<?php endif; ?>
							</p>
							<p class="veg-wiki-link" style="text-align: right;"><a class="veg-wiki-link link" href="<?php if ( get_field('wiki_link') ) : ?>
										<?php echo get_field('wiki_link'); ?>
									<?php endif; ?>" style="color: <? echo $color;?> !important">More
									on Wikipedia</a></p> 
									
									
						</div>
					</section>
				</div>
				<div class="flex_column av_one_third  flex_column_div av-zero-column-padding first  avia-builder-el-5  el_after_av_one_full  el_before_av_one_third  taste-container column-top-margin"
					style="border-radius:0px; ">
					<section class="av_textblock_section " itemscope="itemscope"
						itemtype="https://schema.org/CreativeWork">
						<div class="avia_textblock  " itemprop="text">
							<h2 class="veg-tastes-label">Taste</h2>
							<p class="veg-tastes-items"><?php if ( have_rows('veg_flavors') ) : ?>
							
								<?php while( have_rows('veg_flavors') ) : the_row(); ?>
							
									<?php the_sub_field('veg_flavor'); ?>,
							
								<?php endwhile; ?>
							
							<?php endif; ?>
							</p>
						</div>
					</section>
				</div>
				<p></p>
				<div class="flex_column av_one_third  flex_column_div av-zero-column-padding   avia-builder-el-7  el_after_av_one_third  el_before_av_one_third  spiciness-container column-top-margin"
					style="border-radius:0px; ">
					<div
						class="avia-progress-bar-container  avia_animate_when_almost_visible  avia-builder-el-8  avia-builder-el-no-sibling  spicy-bar av-striped-bar av-animated-bar av-small-bar avia_start_animation">
						<div class="avia-progress-bar red-bar icon-bar-no">
							<div class="progressbar-title-wrap">
								<div class="progressbar-icon"><span class="progressbar-char" aria-hidden="true"
										data-av_icon="" data-av_iconfont="entypo-fontello"></span></div>
								<div class="progressbar-title">Spiciness</div>
							</div>
							<div class="progressbar-percent avia_sc_animated_number_active number_prepared avia_animation_done"
								data-timer="2200"><span class="av-bar-counter __av-single-number"
									data-number="<? echo $spicy; ?>"><? echo $spicy; ?></span>%</div>
							<div class="progress avia_start_animation" style="height:12px;">
								<div class="bar-outer">
									<div class="bar" style="width: <? echo $spicy; ?>%" data-progress="<? echo $spicy; ?>"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="flex_column av_one_third  flex_column_div av-zero-column-padding   avia-builder-el-9  el_after_av_one_third  el_before_av_one_half  sweetness-container column-top-margin"
					style="border-radius:0px; ">
					<div
						class="avia-progress-bar-container  avia_animate_when_almost_visible  avia-builder-el-10  avia-builder-el-no-sibling  spicy-bar av-striped-bar av-animated-bar av-small-bar avia_start_animation">
						<div class="avia-progress-bar green-bar icon-bar-no">
							<div class="progressbar-title-wrap">
								<div class="progressbar-icon"><span class="progressbar-char" aria-hidden="true"
										data-av_icon="" data-av_iconfont="entypo-fontello"></span></div>
								<div class="progressbar-title">Sweetness</div>
							</div>
							<div class="progressbar-percent avia_sc_animated_number_active number_prepared avia_animation_done"
								data-timer="2200"><span class="av-bar-counter __av-single-number"
									data-number="<? echo $sweet; ?>"><? echo $sweet; ?></span>%</div>
							<div class="progress avia_start_animation" style="height:12px;">
								<div class="bar-outer">
									<div class="bar" style="width: <? echo $sweet; ?>%" data-progress="<? echo $sweet; ?>"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="flex_column av_one_half  flex_column_div av-zero-column-padding first  avia-builder-el-11  el_after_av_one_third  el_before_av_one_half  veg-great-with great-with column-top-margin"
					style="border-radius:0px; background-color: <?php echo $color;?>; ">
					<section class="av_textblock_section " itemscope="itemscope"
						itemtype="https://schema.org/CreativeWork">
						<div class="avia_textblock  " itemprop="text">
							<h2 style="text-align: center;" id="great-with">Great With</h2>
						</div>
					</section>
					<section class="av_textblock_section " itemscope="itemscope"
						itemtype="https://schema.org/CreativeWork">
						<div class="avia_textblock  " itemprop="text">
						<div class="great-with-items-container">
                                <?php 
                                        $uses = wp_get_object_terms( $post->ID, uses, array( 'fields' => 'ids' ) ); 
                                                
                                        foreach($uses as $use) : 
                                            $termObj = get_term($use);
                                    ?>

                                        
                                            <div class="great-with-item">
                                                <div class="great-with-item-picture-container">
												<a href="<? echo get_term_link($termObj) ;?>">
                                                    <img class="great-with-item-picture hvr-ripple-out" src="<?php the_field('img', 'term_'.$use);?>"></a>

												</div>
												<a class="link" href="<? echo get_term_link($termObj) ;?>">
                                                <p class="great-with-item-name"><?php echo $termObj->name; ?></p></a>
                                            
                                                
                                            </div>
								
									

								<?php 
								endforeach; 
								?>
								
							</div>
						</div>
					</section>
				</div>
				<div class="flex_column av_one_half  flex_column_div av-zero-column-padding   avia-builder-el-14  el_after_av_one_half  el_before_av_one_full  veg-benefits benefits column-top-margin"
					style="border-radius:0px; ">
					<section class="av_textblock_section " itemscope="itemscope"
						itemtype="https://schema.org/CreativeWork">
						<div class="avia_textblock  " itemprop="text">
							<h3 id="benefits" style="text-align: center;" class="chock-full-of">Chock full of</h3>
						</div>
					</section>
					<section class="av_textblock_section " itemscope="itemscope"
						itemtype="https://schema.org/CreativeWork">
						<div class="avia_textblock  " itemprop="text">
						<div class="veg-vitamins-container">
							<?php 
									$vitamins = wp_get_object_terms( $post->ID, 'vitamins', array( 'fields' => 'names' ) ); 

									foreach($vitamins as $vitamin) : 
										
								?>
								
									<div class="veg-vitamin-container">
									
									<h4 class="veg-vitamin-label">Vitamin</h4>
									<a ref="<? echo get_the_permalink();?>" class="veg-vitamin veg-vitamin-link">
									
									<h3 class="veg-vitamin"><? echo $vitamin; ?></h3></a>
									</div>
									
									
										
								
									

								<?php 
								endforeach; 
								?>	
									
								</div>
								
							</div>
							<div class="veg-other-nutrients">
								<p class="veg-great-source-heading">Also a great source of:</p>
								<p class="nutrients"><?php
								$taxonomy = 'nutrients';

								// get the term IDs assigned to post.
								$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
								// separator between links
								$separator = ', ';

								if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

								$term_ids = implode( ',' , $post_terms );
								$terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
								$terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

									// display post categories
									
								echo $terms;
								
							
								}
							?></p>
							</div>
						
					</section>
				</div>
				<div class="flex_column av_one_full  flex_column_div av-zero-column-padding first  avia-builder-el-17  el_after_av_one_half  el_before_av_one_full  column-top-margin"
					style="border-radius:0px; ">
					<section class="av_textblock_section " itemscope="itemscope"
						itemtype="https://schema.org/CreativeWork">
						<div class="avia_textblock  " itemprop="text">
							
						</div>
                    </section>
                    
					<?php $images = get_field('veg_gallery'); 
						$size = 'thumbnail';
						if( $images ): 
							echo '<h2 class="veg-gallery-label">Our Crop</<h2><div class="veg-image-gallery">';
                        ?> <!-- This is the gallery filed slug -->

                        <?php foreach( $images as $image ): ?>
				
                        <a href="<?php echo $image['url']; ?>" class="veg-image-gallery__link">
                        <img src="<?php echo $image['sizes']['medium']; ?>" class="veg-image-gallery__image">
                        </a>
                        
                        <?php endforeach; ?> <!-- This is where the image loop ends -->
						</div>
<?php endif; ?> <!-- This is where the gallery loop ends -->
                    
                </div>
                

				<div class="flex_column av_one_full  flex_column_div av-zero-column-padding first  avia-builder-el-20  el_after_av_one_full  avia-builder-el-last  veg-reviews reviews column-top-margin"
					style="border-radius:0px; ">
					<section class="av_textblock_section " itemscope="itemscope"
						itemtype="https://schema.org/CreativeWork">
						<div class="avia_textblock  " itemprop="text">
							<h2 id="reviews">Reviews</h2>
							<?php echo do_shortcode('[site_reviews_form assigned_to="post_id"]');?>
						</div>
					</section>
				</div>
			</div>
	

			<!--end content-->
		</main>
		<?php
				$avia_config['currently_viewing'] = "blog";
				//get the sidebar
				get_sidebar();


				?>

	</div>
	<!--end container-->

</div><!-- close default .container_wrap element -->


<?php 
		get_footer();
		
		