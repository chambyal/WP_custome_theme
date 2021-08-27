<?php 
$hide_banner = get_field('hide_banner', get_the_id());
 if (!$hide_banner) { 
 if (get_field('banner_image')) { ?>
   <section class="inner-banner" style="background-image: url('<?php the_field('banner_image'); ?>')">
   <div class="container">
    <div class="banner-title"><?php the_title(); ?></div>
    <?php if(get_field('banner_sub_heading')) { ?>
 <div class="banner-subheading">
 <?php  the_field('banner_sub_heading'); ?>
 </div>
 <?php } ?>
    </div>
    </section>
<?php } else {  ?> 
	<section class="inner-banner " style="background-image: url('<?php echo the_field('global_banner', options); ?>')">
        <div class="container">
            <div class="banner-layout">
			
            <h1 class="banner-title m-0">
                <?php
                if (is_singular('post')):
                    echo 'Blog';
                elseif (!is_front_page() && is_home()):
                    echo "Our Blog";
                elseif (is_singular('Blog')):
                    echo "Our Blog";
                elseif ((is_tax())):
                   $current_page = get_queried_object();
                   echo $category = $current_page->name;
				// echo "Category";  
                elseif (is_search()):
                    echo 'Search Result';
               elseif (is_archive()):
                          echo single_cat_title ();					   
               elseif (is_404()):
                    echo 'ERROR 404';
                else:
                    the_title();
                endif;
                ?>
            </h1>
			
	    <?php if( get_field('banner_sub_heading')) { ?>
 <div class="banner-subheading">
 <?php  the_field('banner_sub_heading'); ?>
 </div>
 <?php } ?>

    </div>
    </section>
<?php } } ?>
