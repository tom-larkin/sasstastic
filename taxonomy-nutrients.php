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
		
		$taxonomy = get_queried_object();
		

	?>

		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

			<div class='container template-blog '>

				<main class='content <?php avia_layout_class( 'content' ); ?> units' <?php avia_markup_helper(array('context' => 'content','post_type'=>'post'));?>>
					
					<?php 
						
						$tds =  term_description(); 
					
					?>



<div class="post-entry post-entry-type-page post-entry-1015">
	<div class="entry-content-wrapper clearfix">
	
			
				<div class="avia_textblock  " itemprop="text">
					<h1 class="term-heading">Vegetables, microgreens, and produce rich in <? echo $taxonomy->name; ?>.</h1>
				</div>
			
		
		<div class="flex_column av_two_third  flex_column_div first  avia-builder-el-2  el_after_av_one_full  el_before_av_one_third   column-top-margin"
			style="padding:0 0px 0 0px ; border-radius:.25rem; ">
			<section class="av_textblock_section " itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
				<div class="avia_textblock  " itemprop="text">
				<? echo $tds; ?>
				
				
				</div>
			</section>
			
		</div>
		
		<div class="flex_column av_one_third  flex_column_div   avia-builder-el-4  el_after_av_two_third  el_before_av_hr   column-top-margin"
			style="background: #eeeeee; padding:1.5rem; background-color:#eeeeee; border-radius:.25rem; ">
			<section class="av_textblock_section " itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
				<div class="avia_textblock  " itemprop="text">
				<h5 style="text-align: center;"><? echo $taxonomy->name; ?> helps with</h5>
				<ul> 
				<?php
        
        // vars
        $queried_object = get_queried_object();
        $taxonomy = $queried_object->taxonomy;
        $term_id = $queried_object->term_id;  
        
               // load desc for this taxonomy term (term string)
        $thumbnail = the_repeater_field('helps_with', $taxonomy);
        ?>  
         
         <?php while(the_repeater_field('helps_with', $taxonomy . '_' . $term_id)): ?> 
        <?php if(get_sub_field('helps_with_item', $taxonomy . '_' . $term_id)): ?>
		<li>
         <?php the_sub_field('helps_with_item', $queried_object); ?>
		 </li>
        <?php endif; ?>
        <?php endwhile; ?>
			
			</ul>
				</div>
			</section>
		</div>
		<div style="height:1rem" class="hr hr-invisible   avia-builder-el-6  el_after_av_one_third  el_before_av_hr  ">
			<span class="hr-inner "><span class="hr-inner-style"></span></span></div>
		<a style="text-align: right !important" href="<?

// get the current taxonomy term
$term = get_queried_object();


// vars
$wiki = get_field('wiki_link', $term);

 echo $wiki;
	

		?>" class="term-wiki-link" ><p style="text-align:right !important;">Learn more on Wikipedia</p> </a>
		<div style="height:1rem" class="hr hr-invisible   avia-builder-el-6  el_after_av_one_third  el_before_av_hr  ">
			<span class="hr-inner "><span class="hr-inner-style"></span></span></div>
		<p></p>
		<div class="hr hr-short hr-center   avia-builder-el-7  el_after_av_hr  avia-builder-el-last  "><span
				class="hr-inner "><span class="hr-inner-style"></span></span></div>
	</div>
</div>

<h2 class="get-your-fix">Get your <? echo $taxonomy->name ?> fix </h2>

<?
if( $terms = get_terms( array( 'taxonomy' => 'vegetable_type', 'orderby' => 'name' ) ) ) : 
			echo '
			<div class="button-group filter-button-group">
			<button class="isotope-btn isotope-btn-all" data-filter="*">All</button>
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
				 while ( have_posts() ) : the_post(); ?>

				<?php 
				if( get_the_post_thumbnail_url('') ){
				$img = get_the_post_thumbnail_url('');
		
				} else {
	   			$img = ('https://sqft.specialops.io/wp-content/uploads/no-image-uploaded-1.jpg');
				}

			
				$terms = wp_get_post_terms(get_the_id(), 'vegetable_type', array('fields' => 'ids'));
				$color = get_field('veg_type_color', 'vegetable_type_'.$terms[0]); ?>

				 
				  
				  <div class="img-wrap third grid-item <?php
	if( $terms = get_the_terms( get_the_id(), 'vegetable_type' ) ): 
					
		foreach ( $terms as $term ) :
			echo  $term->slug.' ';
			
		endforeach;
	endif;


?>"><a class="veg-archive-name-link" href="<? echo the_permalink();?>"><? echo the_title();?></a><a class="veg-archive-image-link" href="<? echo the_permalink();?>">
				  <img src="<?php echo $img;?>" caption="<? echo the_title();?>" class="veg-archive-image" style="z-index:-1; border: 4px solid <? echo $color; ?> !important;"></a>

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


		