<aside class="blog-sidebar fullwidth">

    <div class="box-shadow mb-5">
        <div class="contactusform pb-5">
            <div class="sidebar-heading title title-main text-left"> Free Case <span>Evaluation</span> </div>
            <div class="contact-form">
			
			<?php if( (!is_page(396)) & (!is_page(399)) & (!is_page(397)) ) { ?>
                <?php echo do_shortcode('[contact-form-7 id="267" title="Blog Sidebar"]'); ?>
			<?php } ?>
			
			<?php if(is_page(396)) { ?>
			  <?php echo do_shortcode('[contact-form-7 id="468" title="Trucking Accidents Page Form"]'); ?>
			<?php } ?>
				  
				  <?php if(is_page(397)) { ?>
				<?php echo do_shortcode('[contact-form-7 id="467" title="Accidents Page Form"]'); ?>
				  <?php } ?>
				  
				  
			   <?php if(is_page(399)) { ?>
				<?php echo do_shortcode('[contact-form-7 id="466" title="Personal Injury Page Form"]'); ?>
			  <?php } ?>
				  
				  
            </div>   
        </div>
    </div>  
 
 <?php 
 if (!is_page_template('templates/the-news.php')) {  ?>
      <div class="box-shadow most-Popular categories"> 	 
        <?php echo do_shortcode('[child-pages ]'); ?>  
   </div>  
 <?php } ?>



</aside>  