<?php /* Template Name: Testimonial */ 
get_header();
get_template_part('inc/banner', 'inner'); ?>

<div class="main">
         <div class="container text-center">
                <div class="row">
                    <div class="col-lg-9 col-md-10 m-auto">
                      <div class="content mb-4">
				<?php  
if (have_posts()):
  while (have_posts()) : the_post();
    the_content();
  endwhile;
endif;
?>
</div>
               </div>
                </div>
            </div> 

     	
		<div class="testimonials-container mt-4">
	   <div class="container">
              <div class="row">
			<div class="card-columns">
			<div class="loadpost">
                <?php
                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                $args = array(
                          'post_type' => 'testimonials',
                          'posts_per_page' => 10,
                          'paged' => $paged, 
                          'post_status' => 'publish'
                );
                $wp_query = new WP_Query($args);
                if ($wp_query->have_posts()):
				    while ($wp_query->have_posts()): $wp_query->the_post();

					
                        ?>
                       
					<div class="card  testimonialsmain">
           	   
		   		<div class="review-inner">
				
				<img class="svg quote" src="<?php echo get_template_directory_uri() ?>/img/quote.svg"  alt="client review"/>
				
						<div class="review-block">
							<div class="client-review">
								<?php the_content(); ?>
								<div class="client-name">
									- <?php the_title();?>
								</div>
							</div>
						</div>
					</div>
		   
			</div>
        
					

				<?php		
                endwhile; 
	           endif;
                    ?>
					
		</div>
		</div>
		</div>
		  
			<div class="loadmore col-12">
                    <?php
                 load_more_button();
                    wp_reset_query();
                    ?>
                </div>  
		
		</div>
		</div>
		</div>


<?php get_footer(); ?>