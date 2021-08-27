<?php /* Template Name: News Page */
get_header();
get_template_part('inc/banner', 'inner'); ?>
<section class="main newspage">

<div class="container">
        <div class="row ">
            <div class="col-lg-8">
				<div class="page-contnet">
			        <div class="newscontnet mainpage newslist">
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
				
		   <h2>Here Are Some Links To Notable Articles In The Media:</h2>
			
				<div class="loadpost row">
                       <?php 
						$args = array(
						'post_type' => 'inthenews',
						'order' => 'ASC',
						'posts_per_page' => -1
						);
						$the_query = new WP_Query($args);
						if ($the_query->have_posts()):
                        while ($the_query->have_posts()): $the_query->the_post();
						$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
						$publisher_logo = get_field('publisher_logo');
						$read_more_button_link = get_field('read_more_button_link');
						 
                                ?>  
                                <div id="post-<?php the_ID(); ?>" <?php post_class(' newslist col-md-6'); ?>>
              				         <a target="_blank" href="<?php echo $read_more_button_link; ?>" class="news-post">
									   <?php if($publisher_logo){ ?>
                                            <div class="news-thum">
											<img src="<?php echo $publisher_logo['url']; ?>" alt="<?php the_title(); ?>" />
                                            </div>
                                        <?php } ?>
 
                                        <div class="recent-post-content">
                                         <h3><?php the_title(); ?></h3>
									     <div class="postcontent mb-3"><?php  echo wp_trim_words(get_the_content(), 40);  ?></div>
                                            <div class="btn hoverblack">Read More  </div>
                                        </div>  
                                    </a>
                                </div>
                                <?php
                            endwhile;
						wp_reset_query();
                        endif;
                        ?>
                    </div>
				</div>
			  
            </div>
            <div class="col-lg-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
</div>

</section> 
<?php get_template_part('inc/home', 'contact'); ?>
<?php get_footer(); ?>