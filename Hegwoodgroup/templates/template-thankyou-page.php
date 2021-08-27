<?php
/**
 * Template Name: Thank you Page
 */
 get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>
<div class="thankyou main">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-8 m-auto blog-content right-box ">
                <!--div class="page-title bg-center">Thank <span> You!</span> </div-->
                <?php
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
                ?>
                <?php $header_phone = get_field('header_phone', 'options'); ?>
                <div class="home-banner-link btn-main">
                    <a class="btn white-text hoverblack headerphone" href="tel:<?php echo preg_replace('/\D+/', '', $header_phone); ?>">
                        <?php echo $header_phone; ?>
                    </a>
                </div>

            </div>
        </div> 
    </div>   
</div>
<?php get_footer(); ?>