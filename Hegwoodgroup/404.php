<?php get_header(); 
 get_template_part('inc/banner', 'inner'); ?>
<div class="page404 main">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 ">
                <div class="contentform contactInner p-0">  
                        <div class=" text-left  contnet-error">
                            <div class="page-title h2 "> 404 Page <span> Not Found </span></div>
                            <p>The page you are looking for can't be found. Try using the menus to 
                                the right, or contact us by filling the form below. We will get 
                                in touch with you shortly.</p>
                        </div>
                        <div class="contactus-form contactform">
                            <?php echo do_shortcode('[contact-form-7 id="268" title="404 Error Page"]'); ?>    
                        </div>
                   
                </div>
            </div>
            <div class=" col-lg-4">  
                <aside class="blog-sidebar fullwidth">
                    <div class="box-shadow most-Popular categories"> 
                        <div class= "sidebar-heading title"> Practice Areas </div>
                        <?php
                        wp_nav_menu(array(  
                                  'menu' => 'Practice Areas',
                                  'theme_location' => '__no_such_location',
                                  'menu_id' => 'PracticeNav',
                                  'menu_class' => 'most_postlist m-0 categories-list',
                                  'container' => '',
                                  'fallback_cb' => false
                        ));
                        ?>       
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
