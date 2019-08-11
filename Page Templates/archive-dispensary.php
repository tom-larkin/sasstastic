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

      <main class='content <?php avia_layout_class( 'content' ); ?> units'
         <?php avia_markup_helper(array('context' => 'content','post_type'=>'post'));?>>
         <div class="archive_top">


            <div
               class="flex_column av_one_full  flex_column_div av-zero-column-padding first  avia-builder-el-6  el_after_av_one_full  avia-builder-el-last  column-top-margin"
               style="border-radius:0px; ">

             



               <section class="av_textblock_section " itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
                  <div
                     class="flex_column av_one_full  flex_column_div av-zero-column-padding first  avia-builder-el-2  el_after_av_one_full  el_before_av_one_full  column-top-margin"
                     style="border-radius:0px; ">


                     <section class="av_textblock_section " itemscope="itemscope"
                        itemtype="https://schema.org/CreativeWork">
                        <div class="avia_textblock  " itemprop="text">
                        <h1>Find Medical Cannabis Dispensaries </h1>   
                        <p>Locate a medical marijuana dispensary near you along with user reviews, menus, and contact information. </p>
                        </div>
                     </section>
                  </div>


                  <div class="avia_textblock  " itemprop="text">

                  
                  <?php 
                        $shortcode1 ='[gmw_ajax_form map="9"]';
                        $shortcode2 ='[gmw_ajax_form search_form="9"]';
                        $shortcode3 ='[gmw_ajax_form search_results="9"]';
                        echo do_shortcode($shortcode1);
                        echo do_shortcode($shortcode2);
                        echo do_shortcode($shortcode3);
                     ?>

</div>
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

   </div>
   <!--end container-->

</div><!-- close default .container_wrap element -->


<?php echo do_shortcode('	
[hfcm id="1"]'); ?>

<?php 
		get_footer();
