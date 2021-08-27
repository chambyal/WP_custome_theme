<?php
get_header();
get_template_part('inc/banner', 'inner');
?>
<div class="staticpage">
<div class="main">  
    <div class="container">
        <div class="row ">
            <div class="col-lg-8">
			        <div class="page-contnet mainpage">
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
            <div class="col-lg-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
	</div>
<?php get_template_part('inc/home', 'contact'); ?>
</div>
<?php get_footer();





