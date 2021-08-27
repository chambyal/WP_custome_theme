<?php
/* Template Name: Video Page */
get_header();
?>
<?php get_template_part('inc/banner', 'inner'); ?>
<style type="text/css">
    a.video-holder{
    height: 250px;
    max-width: 650px;
    width: 100%;
    margin: 0 auto;
    display: block;
    position: relative;
    background-size: cover!important;
    background-position: center!important;
}
a.video-holder.html5lightbox::before{
    content: "";
    width: 50px;
    height: 50px;
    background-image: url('/wp-content/themes/yoshalawfirm/img/play-button.png');
    background-size: 50px;
    background-position: center;
    position: absolute;
    bottom: 20px;
    right: 20px;
}
.video-box {
    box-shadow: 0px 0px 10px #7b7878;
    height: 100%;
}
.video-info-bar {
    padding: 10px 15px;
}
.video-info-bar a {
    font-family: 'Tungsten-SemiBold', sans-serif;
    font-size: 28px;
    font-weight: 600;
    line-height: 40px;
    letter-spacing: 0.5px;
}
.video-slider-listing {
    padding-top: 15px;
    padding-bottom: 15px;
}
.video-load-btn .elm-button {
    margin-top: 20px;
}

.video-load-btn .elm-button.ajax-inactive {
    margin-top: 0;
}
</style>
<div class="videoPage main">
    <div class="container">
        <div class="row">
            <?php $con = get_the_content();
            if(!$con == ""):
            ?>
            <div class="col-md-12 text-center mb-4"> 
               <?php echo $con; ?>
            </div>
        <?php endif; ?>
    </div>
        <div class="row loadpost">
            <?php
            $postType = "video";
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $args = array('post_type' => $postType, 'posts_per_page' => 9, 'paged' => $paged);
            $wp_query = new WP_Query($args);
            ?>
            <?php
            if ($wp_query->have_posts()) :
                while ($wp_query->have_posts()) : $wp_query->the_post();
                    
                    ?>
					<?php
                	$v_id = get_field('video_id');
                	$v_img = get_field('video_image');
                	?>
                	<?php if($v_img) { ?>
                	   <?php 
                	     $v_image = get_field('video_image') ;
                		 ?>
                		 
                	<?php } else { ?>
                	   <?php 
                 	     $v_image = "//i.ytimg.com/vi/". $v_id ."/mqdefault.jpg" ;
                		 ?>
                	<?php } ;?>

					<div class="video-slider-listing col-sm-6 col-md-6 col-lg-4"> 
                        <div class="video-box">  
                            <a  class="video-holder html5lightbox" style="background:url(<?php echo $v_image; ?>)"  href="https://youtu.be/<?php echo $v_id; ?>&?rel=0"></a>
                            <div class="video-info-bar">
                                <div class="video-heading">
                                    <a class="html5lightbox" href="https://youtu.be/<?php echo $v_id; ?>&?rel=0">
                                      <?php the_title(); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
						
                    
                    <?php
                endwhile;
            endif;
            
            ?>
        </div>
        <div class="loadmore col-12 video-load-btn">
                    <?php
                 load_more_button();
                    wp_reset_query();
                    ?>
                </div> 
    </div>
</div>
<?php get_template_part('inc/award-logos'); ?>
<?php get_footer(); ?>