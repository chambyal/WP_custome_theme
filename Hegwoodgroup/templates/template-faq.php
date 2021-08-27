<?php /* Template Name: FAQ Page */
get_header();
get_template_part('inc/banner', 'inner'); ?>

<div class="main faqs">
<div class="container">
		<div class="row">
			<div class="col-lg-10 col-md-12  text-center m-auto">
				<div class="mb-5 faqtopcontent">
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


	<div class="container">		
<div class="row faqtab loadpost"> 
        
		 <?php
                              $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                              $args = array(
                                        'post_type' => 'faq',
                                        'posts_per_page' => -10,
                                     );

                              $wp_query = new WP_Query($args);
                              ?>

                       <div id="accordion<?php echo $e; ?>" class="fullwidth col-lg-10 m-auto col-md-12 faqsmall ">
						
                                       <?php
                            if ($wp_query->have_posts()) :
                                $count = 1;
                                ?>
                               
						             <?php
                                while ($wp_query->have_posts()) : $wp_query->the_post();
                                    $faqid = get_the_id();
                                    ?> 
                          <div class="faqmain">
                                    <div class="faqlist">   
									
                                        
                                        
										<div class="faq-heading" id="heading<?php echo $faqid; ?>">
                                            <a class="plusicon faq-title collapsed" data-toggle="collapse"
                                                    data-target="#collapse<?php echo $faqid; ?>_<?php echo $e; ?>"  

                                                    aria-controls="collapse<?php echo $faqid; ?>">
                                                        <?php the_title(); ?>
												<span class="arrow">
												<img class="arrow-svg" src="<?php echo get_stylesheet_directory_uri() ?>/img/next.jpg" alt="arrow"/>
												</span>  
                                            </a>
                                        </div>
                                           
                                        <div id="collapse<?php echo $faqid; ?>_<?php echo $e; ?>" class="collapse" 
                                             aria-labelledby="heading<?php echo $faqid; ?>" data-parent="#accordion<?php echo $e; ?>">  
                                            
                                           	 <div class="faq-description"><?php the_content(); ?></div>
                               
                                     </div>   
                                     </div>
									</div> 
                                    <?php
                                    $count++;
                               endwhile;
                      wp_reset_postdata();
   						endif;
                            ?>
                        
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

<?php get_template_part('inc/home', 'contact'); ?>
<?php get_footer(); ?>