<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>
<div class="blog-detail  main">  
    <div class="container">
        <div class="row">
            <?php
            $post_type = "";
            if (isset($_GET['s'])) {
                $keyword = $_GET['s'];
            }
            if (isset($_GET['post_type'])) {
                $post_type = $_GET['post_type'];
            }
            ?>
            <?php if ($keyword && $post_type == "post") { ?>
                <div class="col-lg-8">
                    <h2 class="title  col-12 mb-4">Search Results for 
                        "<em><?php echo $_GET['s'] ?></em>"
                    </h2>
                    <?php
                    if (have_posts()) :
                        ?>
			
			
			<div class="container bloglist">  
         <div class="row  loadpost">
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                ?>  
                                <div id="post-<?php the_ID(); ?>" <?php post_class(' postlist col-md-6 col-lg-12'); ?>>
              				         <a href="<?php the_permalink() ?>" class="recent-post">
									 
                                        <?php if ($thumb) { ?>
                                            <div style="background-image: url('<?php echo $thumb['0']; ?>');"   class="post-thum">
                                            </div>
                                        <?php } else { ?>
                                            <?php $header_logo = get_field('header_logo', 'option'); ?>
                                            <div style="background-image: url('<?php echo $header_logo; ?>');"   class="post-thum noimg">
                                            </div>
                                        <?php } ?>

                                        <div class="recent-post-content">
                                           <h3 class="title"><?php the_title(); ?></h3>
										    <div class="postcontent"><?php  echo wp_trim_words(get_the_content(), 40);  ?></div>
                                            <div class="btn hoverblack">Read More  </div>
                                        </div>  
                                    </a>
                                </div>
                                <?php
                            endwhile;
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
			
                    <?php else : ?>
                        <div class="no_result  postlist page-contnet">
                            <h2 class="postlist-title title-main mt3">
                                Nothing Found 
                            </h2>
                            <p>Sorry No Result Found. Please try a different search 
                                term or <a href="<?php echo get_home_url(); ?>">click here</a> 
                                for back to home.</p>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>
				
                <div class=" col-lg-4">
                    <?php get_sidebar('blog'); ?>  
                </div> 
            <?php } ?>
            
			
			<?php if ($keyword && empty($post_type) || $keyword && $post_type == "undefined" || $keyword && $post_type == "") { ?>

                <div class="col-lg-8">
                    <h2 class="title col-12 mb-4">Search Results for 
                        "<em><?php echo $_GET['s'] ?></em> "
                    </h2>
                    
					<div class="container bloglist">  

<div class="row  loadpost">
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                ?>  
                                <div id="post-<?php the_ID(); ?>" <?php post_class(' postlist col-md-6 col-lg-12'); ?>>
              				         <a href="<?php the_permalink() ?>" class="recent-post  ">
									 
                                        <?php if ($thumb) { ?>
                                            <div style="background-image: url('<?php echo $thumb['0']; ?>');"   class="post-thum">
                                            </div>
                                        <?php } else { ?>
                                            <?php $header_logo = get_field('header_logo', 'option'); ?>
                                            <div style="background-image: url('<?php echo $header_logo; ?>');"   class="post-thum noimg">
                                            </div>
                                        <?php } ?>

                                        <div class="recent-post-content">
                                           <h3 class="title"><?php the_title(); ?></h3>
										   <div class="postcontent"><?php  echo wp_trim_words(get_the_content(), 40);  ?></div>
                                            <div class="btn hoverblack">Read More  </div>
                                        </div>  
                                    </a>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
		          </div>
		         </div>
                <div class=" col-lg-4">
                    <div class="blog-sidebar">
                        <div class="box-shadow mb-5">
                            <div class="contactusform pb-5">
                                <div class = "sidebar-heading title title-main"> Free case Consultation  </div>
                                <div class="contact-form">
                           <?php echo do_shortcode('[contact-form-7 id="267" title="Blog Sidebar"]'); ?>
                                </div>   
                            </div>
                        </div>
                        <div class="box-shadow most-Popular categories">
                            <div class="sidebar-heading title title-main"> Practice Areas </div>
                            <?php
                            wp_nav_menu(array(
                                      'menu' => 'Practice Areas', // Do not fall back to first non-empty menu.
                                      'theme_location' => '__no_such_location',
                                      'menu_id' => 'PracticeNav',
                                      'menu_class' => 'most_postlist m-0 categories-list',
                                      'container' => '',
                                      'fallback_cb' => false // Do not fall back to wp_page_menu()
                            ));
                            ?>      
                        </div>    
                    </div>  
                </div>
            </div> 
        <?php } ?> 
    </div> 
</div>
</div>
<?php
get_footer();
