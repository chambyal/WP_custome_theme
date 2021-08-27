<?php
/* Template Name: Contact US */
get_header();
get_template_part('inc/banner', 'inner');
?>
<?php
$crbg =  get_field('case_review_background', 2);
?>
<section data-src="<?php echo $crbg['url']; ?>" class="main contactuspage differ-img norepeat bgcover">
 <div class="container">
        <div class="row ">
            <div class="col-lg-10 m-auto text-center col-md-12">
			        <div class="contactusContent mb-4">  
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
            </div>
		</div>
	
	
<div class="col-lg-12  col-md-12">	
<div class="row">	
<?php

$args = array(
'post_type' => 'nap',
'posts_per_page' => 1,
'order' => 'ASC'
);
$the_query = new WP_Query($args);
if ($the_query->have_posts()):
while ($the_query->have_posts()) : $the_query->the_post();
$nap_attorney_business_name = get_field('nap_attorney_business_name');
$nap_street_address = get_field('nap_street_address');
$nap_suite_number = get_field('nap_suite_number');
$nap_city_county = get_field('nap_city_county');
$nap_state = get_field('nap_state');
$nap_zip_code = get_field('nap_zip_code');
$nap_phone_number = get_field('nap_phone_number');
$phone_number_post = preg_replace("/[^0-9]/", "", $nap_phone_number);
$nap_text_number = get_field('nap_text_number');
$get_directions_link = get_field('get_directions_link');
$address_type = get_field('address_type');
$nap_email_address = get_field('nap_email_address');
$nap_fax = get_field('nap_fax');
$working_hour = get_field('working_hour');
$address_bottom_content = get_field('address_bottom_content');
$working_bottom_content = get_field('working_bottom_content');

?>
	
                                                  
					<div class="block">		
					<div class="contact-address">
						<img class="pinicon" src="<?php echo get_stylesheet_directory_uri();?>/img/pin.svg"	alt="phone"/>
				  	<?php if ($nap_street_address || $nap_suite_number) { ?>
					<span class="cp_location">
						<?php echo $nap_street_address; ?>
						<?php if ($nap_suite_number) {
						echo '' . $nap_suite_number . '';
						}
						?>
				
					<br/>
					<?php } ?>
					<?php if ($nap_city_county) {
					echo '<span>' . $nap_city_county . '</span>&nbsp;';
					}
					?>
					<?php if ($nap_state) {
					echo '<span> ' . $nap_state . '</span>';
					}
					?>
					<?php if ($nap_zip_code) {
					echo '<span>' . $nap_zip_code . '</span>';
					}
					?>
			      	<?php if (get_field('get_directions_link')): ?>
											<div class="nap-global-direction m-0">
												<a class="direction-link"
 													href="<?php the_field('get_directions_link') ?>"
 													target="_blank"
 													rel="nofollow">Get Directions</a>
											</div>
											<?php endif; ?>
			
					<div class="add-content"> <?php echo $address_bottom_content;  ?> </div>
		
					</span>
				</div>
				</div>
				
				<div class="block">
				
				<?php if ($phone_number_post !=''): ?>
										<span class="phone-icon">
											<img src="<?php echo get_stylesheet_directory_uri()?>/img/phone.svg"
   												alt="phone"/>
											<a href="tel:<?php echo $phone_number_post; ?>">
												<?php echo $nap_phone_number; ?></a>
										</span>
										<?php endif; ?>
				
				<?php if($nap_fax){ ?>
										<div class="fexnumber mt-4 mb-4">
											<span class="phone-icon">
												<img class="svg"
   													src="<?php echo get_stylesheet_directory_uri() ?>/img/fax.svg"
   													alt="smartphone"/>
												<?php echo $nap_fax; ?>
											</span>
										</div>
										<?php } ?>
				
				
				<?php  if ($nap_email_address !=''): ?>
											<span class="email-icon">
												<img src="<?php echo get_stylesheet_directory_uri()?>/img/mail.svg"
   													alt="email"/>     
												<a href="tel:<?php echo $nap_email_address; ?>">
													<?php echo $nap_email_address; ?>
												</a>
											</span>
											<?php endif; ?>
				
				
				</div>
				
				<div class="block">
								<?php  if ($working_hour !=''): ?>
								<span class="working-hours">
								<img src="<?php echo get_stylesheet_directory_uri()?>/img/time.svg"													alt="time"/>     
													<?php echo $working_hour; ?>
											</span>
											<?php endif; ?>
											
											<div class="add-content"> <?php echo $working_bottom_content;  ?> </div>
				
				</div>
			<?php 
			endwhile;
			endif;
			wp_reset_query();
			?>
		</div>	
			</div>
	

	</div>
</div>
</section>



<section class="contact-us-section-two">
	<div class="container-fluid">
	<div class="cd-section">
		<div class="row">

<?php if(!wp_is_mobile()) { ?>	
<div class="col-md-12 col-lg-4 p-0 contactmap">
<?php
$args = array(
'post_type' => 'nap',
'posts_per_page' => 1,
'order' => 'ASC'
);		
$the_query = new WP_Query($args);
if ($the_query->have_posts()):
while ($the_query->have_posts()) : $the_query->the_post();
$nap_map = get_field('nap_map');
?>				
<?php if ($nap_map !=''): ?>
<div class="contact-map pb-0">
	<iframe src="<?php echo $nap_map; ?>"></iframe>
</div>
<?php  
 endif; 				
 endwhile; 
wp_reset_query();
endif;
?>			
</div>
 <?php } ?>
			<div class="col-md-12 col-lg-8 contactform">
				<div class="contact-us-form">
				<div class="title"><?php the_field('contact_form_title'); ?></div>
				
				<?php if(get_field('contact_form_content')) { ?>
				<div class="form_content mb-5">
				<?php the_field('contact_form_content'); ?>
				</div>
				<?php } ?>
                    <?php echo do_shortcode('[contact-form-7 id="228" title="Contact Us Page"]'); ?> 
				</div>
			</div>
		</div>
		</div>
	</div>
</section>  



<div class="gallerymain">
<div class="section-title title text-center mb-5 gallerytitle">Gallery</div>
<ul class="gallery">  
	<?php 
	    if (have_rows('gallery_section', 2)):
		while (have_rows('gallery_section', 2)): the_row();
		$gallery_thumbnail = get_sub_field('gallery_images', 2);
		$shortcontent = get_sub_field('short_content', 2);
		?>
	<li>
	  <a href="<?php echo $gallery_thumbnail['url']; ?>" data-fancybox="images"  class="fancybox" data-caption="<?php echo $shortcontent; ?>">
	   <img class="w-100" src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' 
	data-src="<?php echo $gallery_thumbnail['url']; ?>" alt="gallery-img"/>
	 </a>
	</li>
	<?php
   endwhile;
	endif;
	?>
</ul>
</div>


<?php get_footer(); ?>


