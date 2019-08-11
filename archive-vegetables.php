<?php
	if ( !defined('ABSPATH') ){ die(); }
	
	global $avia_config, $more;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();
	
		
		$showheader = true;
		if(avia_get_option('frontpage') && $blogpage_id = avia_get_option('blogpage'))
		{
			if(get_post_meta($blogpage_id, 'header', true) == 'no') $showheader = false;
		}
		
	 	if($showheader)
	 	{
			echo avia_title(array('title' => avia_which_archive()));
		}
		
		do_action( 'ava_after_main_title' );

		
	?>

		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>
		    


			<div class='container template-blog '>

				<main class='content <?php avia_layout_class( 'content' ); ?> units' <?php avia_markup_helper(array('context' => 'content','post_type'=>'post'));?>>
				   <div class="archive_top">
				   <h1 class="archive_heading">Locally Grown Organic Produce</h1>

<p class="archive_description">At Squarefoot Gardens, we pride ourselves in having the freshest, most flavorful, and most importantly most healthy produce available for our loyal customers. </p>


</div>
<br>
<?
if( $terms = get_terms( array( 'taxonomy' => 'vegetable_type', 'orderby' => 'name' ) ) ) : 
			echo '
			<div class="button-group filter-button-group">
			<button class="isotope-btn isotope-btn-all" data-filter="*">All</button>
			<button class="shuffle-button isotope-btn isotope-btn--shuffle">Shuffle</button>
			';
			foreach ( $terms as $term ) :
				$plural = get_field('plural', $term);
				echo '<button class="isotope-btn isotope-btn-'.$term->slug.'" data-filter=".'.$term->slug.'">'.$plural.'</button>'; 
				
			endforeach;
			echo '</div>';
		endif;
		?>

  
  



<div class="responsive-gallery grid" id="response" >



 	
	
				<?php
				if ( have_posts() ) :
				 while ( have_posts() ) : the_post(); 
/*
				
				if( get_the_post_thumbnail_url() ){
				$img = get_the_post_thumbnail_url('veg-gallery');
		
				} else {
	   			$img = ('https://sqft.specialops.io/wp-content/uploads/no-image-uploaded-1-278x156.jpg');
				}
*/
			
				$terms = wp_get_post_terms(get_the_id(), 'vegetable_type', array('fields' => 'ids'));
				$color = get_field('veg_type_color', 'vegetable_type_'.$terms[0]); ?>

				 
				  
				  <div class="img-wrap third grid-item <?php
	if( $terms = get_the_terms( get_the_id(), 'vegetable_type' ) ): 
					
		foreach ( $terms as $term ) :
			echo  $term->slug.' ';
			
		endforeach;
	endif;


?>"><a class="veg-archive-name-link" href="<? echo the_permalink();?>"><? echo the_title();?></a><a class="veg-archive-image-link" href="<? echo the_permalink();?>">
				  <img src="<?php echo the_post_thumbnail_url('veg-gallery');?>" caption="<? echo the_title();?>" class="veg-archive-image" style="z-index:-1; border: 4px solid <? echo $color; ?> !important;"></a>
				  
				</div>
				
				 
                    <?php endwhile;
                    endif;
                    
                ?>

 
</div>

				<!--end content-->
				</main>

				<?php

				//get the sidebar
                if (avia_get_option('archive_sidebar') == 'archive_sidebar_separate') {
                    $avia_config['currently_viewing'] = 'archive';
                }
                else {
                    $avia_config['currently_viewing'] = 'blog';
                }
				get_sidebar();

				?>
	 

			</div><!--end container-->


		</div><!-- close default .container_wrap element -->

		



<?php 
		get_footer();


		