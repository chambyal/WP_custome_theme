<?php
/* Template Name: FullWidth */ 
get_header();
get_template_part('inc/banner', 'inner');
?>
<div class="staticpage">
<div class=" main fullwidth">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="page-contnet mainpage">
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
          </div>
    </div>
</div>
<?php get_template_part('inc/home', 'contact'); ?>
</div>
<?php get_footer();  





