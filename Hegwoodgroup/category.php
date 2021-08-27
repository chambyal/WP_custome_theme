<?php
get_header();
get_template_part('inc/banner', 'inner');
?>
<div class="bloglistpage  main">
    <div class="container">
        <div class="row bloglistmain">
            <div class="col-lg-8 p-0">
                <div class="container bloglist">  

                    <div class="row  loadpost">
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                ?>  
                                <div id="post-<?php the_ID(); ?>" <?php post_class(' postlist col-md-6 col-lg-12'); ?>>
              				         <a href="<?php the_permalink() ?>" class="recent-post postlist ">
									 
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
            </div>
            <div class="col-lg-4">
                <?php get_sidebar('blog'); ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();

