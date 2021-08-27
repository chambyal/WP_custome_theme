<aside class="blog-sidebar fullwidth">
        <div class="blogsearch boxshadow mb-5">
        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
            <div class="input-group add-on">
                <input class="form-control" onkeyup="validate();" type="text" placeholder="Search" value="" name="s" id="blogsearch" required/>
                <input type="hidden" name="post_type" value="post">
                <div class="input-group-btn">
                    <input class="search-btn" type="submit" value="" />
                </div>
            </div>  
        </form>
    </div>  

    <div class="box-shadow mb-5">
        <div class="contactusform pb-5">
            <div class="sidebar-heading title title-main text-left"> Free Case <span>Evaluation</span> </div>
            <div class="contact-form">
                <?php echo do_shortcode('[contact-form-7 id="267" title="Blog Sidebar"]'); ?>
            </div>   
        </div>
    </div>  

    <div class= "box-shadow most-Popular categories"> 
        <div class="sidebar-heading title title-main"> Categories </div>
        <?php
        $cat_id = get_queried_object_id();
        $taxonomy = "category";
        $terms = get_terms([
                  'taxonomy' => $taxonomy,
                  'hide_empty' => true
        ]);
        ?>
        <ul class="categories-list">
            <?php
            $termAlls = get_the_terms($post->ID, $taxonomy);
            $postTerms = array();
            foreach ($terms as $term) {
             if ($term->term_id === $cat_id) {
                    $active = "active";
             } else {
                    $active = null;
             }  
             ?>
            <li class="most_postlist m-0 categories-lis <?php echo $active; ?>">
            <a href="/<?php echo $taxonomy; ?>/<?php echo $term->slug; ?>">
                <?php echo $term->name; ?>
            </a>
            </li>  
            <?php
            }
           ?>    
        </ul>
    </div>
	
	

	
	
</aside>