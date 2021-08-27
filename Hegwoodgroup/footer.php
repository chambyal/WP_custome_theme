<div class="clearfix"></div>
<?php if (!is_front_page()) { ?>
<div class="site-schema">
	<?php get_template_part('site', 'schema'); ?>
</div>
<?php } ?>
<div class="d-none">  
	<?php get_template_part('inc/footer', 'address'); ?>
</div>

<?php if (is_front_page()){
/** Announcement Schema Code Start * */
if (have_rows('announcement_schema_tab')):
while (have_rows('announcement_schema_tab')): the_row();
$name = get_sub_field('name');
$text = get_sub_field('text');
$date_posted = get_sub_field('date_posted');
$expires = get_sub_field('expires');
$quarantine_guidelines = get_sub_field('quarantine_guidelines');
$disease_prevention_info = get_sub_field('disease_prevention_info');
$category = get_sub_field('category');
$administrative_area_name = get_sub_field('administrative_area_name');
?>
<script type="application/ld+json">
	{
	"@context": "https://schema.org",
	"@type": "SpecialAnnouncement",
	"name": "<?php echo $name; ?>",
	"text": "<?php echo $text; ?>",
	"datePosted": "<?php echo $date_posted; ?>",
	"expires": "<?php echo $expires; ?>",
	"quarantineGuidelines": "<?php echo $quarantine_guidelines; ?>",
	"diseasePreventionInfo": "<?php echo $disease_prevention_info; ?>",
	"category": "<?php echo $category; ?>",
	"spatialCoverage": [
	{
	"type": "AdministrativeArea",
	"name": "<?php echo $administrative_area_name; ?>"
	}
	]
	}
</script>
<?php endwhile;
endif;
/* Announcement Schema Code End */
/** Event Schema Code Start * */
if (have_rows('event_schema_tab')):
while (have_rows('event_schema_tab')): the_row();
$name = get_sub_field('name');
$start_date = get_sub_field('start_date');
$end_date = get_sub_field('end_date');
$event_attendance_mode = get_sub_field('event_attendance_mode');
$event_status = get_sub_field('event_status');
$event_description = get_sub_field('event_description');
$event_performer = get_sub_field('event_performer');
$event_image = get_sub_field('event_image');
?>
<script type="application/ld+json">
	{
	"@context": "https://schema.org",
	"@type": "Event",
	"name": "<?php echo $name; ?>",
	"startDate": "<?php echo $start_date; ?>",
	"endDate": "<?php echo $end_date; ?>",
	"eventAttendanceMode": "<?php echo $event_attendance_mode; ?>",
	"eventStatus": "<?php echo $event_status; ?>",
	<?php if (have_rows('event_location')):
while (have_rows('event_location')): the_row();
$location_name = get_sub_field('location_name');
$street_address = get_sub_field('street_address');
$address_locality = get_sub_field('address_locality');
$postal_code = get_sub_field('postal_code');
$address_region = get_sub_field('address_region');
$address_country = get_sub_field('address_country');
?>
	"location": {
	"@type": "Place",
	"name": "<?php echo $location_name; ?>",
	"address": {
	"@type": "PostalAddress",
	"streetAddress": "<?php echo $street_address; ?>",
	"addressLocality": "<?php echo $address_locality; ?>",
	"postalCode": "<?php echo $postal_code; ?>",
	"addressRegion": "<?php echo $address_region; ?>",
	"addressCountry": "<?php echo $address_country; ?>"
	}
	},
	<?php endwhile;
endif;
?>
	"image": [
	"<?php echo $event_image; ?>"
	],
	"description": "<?php echo $event_description; ?>",
	<?php if (have_rows('event_offers')):
while (have_rows('event_offers')): the_row();
$offer_url = get_sub_field('offer_url');
$price = get_sub_field('price');
$price_currency = get_sub_field('price_currency');
$availability = get_sub_field('availability');
$valid_from = get_sub_field('valid_from');
?>
	"offers": {
	"@type": "Offer",
	"url": "<?php echo $offer_url; ?>",
	"price": "<?php echo $price; ?>",
	"priceCurrency": "<?php echo $price_currency; ?>",
	"availability": "<?php echo $availability; ?>",
	"validFrom": "<?php echo $valid_from; ?>"
	},
	<?php endwhile;
endif;
?>
	"performer": {
	"@type": "PerformingGroup",
	"name": "<?php echo $event_performer; ?>"
	},  
	<?php if (have_rows('event_organizer')):
while (have_rows('event_organizer')): the_row();
$organizer_name = get_sub_field('organizer_name');
$organizer_url = get_sub_field('organizer_url');
?>
	"organizer": {
	"@type": "Organization",
	"name": "<?php echo $organizer_name; ?>",
	"url": "<?php echo $organizer_url; ?>"
	}
	<?php endwhile;
endif;
?>
	}
</script>
<?php endwhile;
endif;
/* Event Schema Code End */  
}
?>  

<div class="d-none">  
<?php get_template_part('inc/faq', 'schema'); ?>
</div>

<?php wp_reset_query(); ?>
<footer id="footer"   	class="footer">
	<div class="container">
		<div class="row no-gutters footer-top-row">
			<div class="col-lg-5 col-md-5 footerc1">
				<div class="logoinner">
				
						<?php   
				  $footer_logo = get_field('footer_logo', 'options');
									if ($footer_logo):
                          ?>
					<div class="footer-logo">
						<img src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs='
   							data-src="<?php echo $footer_logo; ?>"
   							alt="<?php echo bloginfo('name'); ?>">
							
						</div>
						<?php 
					endif;
                    	?>
					<?php 	
					   $footer_site_description = get_field('footer_content', 'options');
						if ($footer_site_description) { ?>
						<div class="footer-content">
							<?php echo $footer_site_description; ?>
						</div>
						<?php } ?>
		
					
					</div>
					
				</div>  
			
		
				<div class="col-md-3 col-lg-3 justify-content-center footerc2">
				<div class="footer-top-nav">
					<div class="h4 footer-heading text-left">Important Links</div>
						<?php 
						wp_nav_menu(array(
								'menu' => 'Menu Footer', // Do not fall back to first non-empty menu.
								'theme_location' => '__no_such_location',
								'container' => 'false',
								'menu_class' => 'pre-footer-nav'
								));
                         ?>
						 
					
					</div>
					</div>
					
				 <div class="col-lg-4 col-md-4 d-flex justify-content-center text-left  footerc3">
						<div class="pullrights">
						<div class="h4 w-100 footer-heading"> Contact Us </div>
						<?php 
									if (get_field('q_choose_nap')) {
									$posts = get_field('q_choose_nap');   
									?>
						<div class="footer-nap-row">
							<?php $post = $posts->ID;
									$nap_attorney_business_name = get_field('nap_attorney_business_name', $post);
									$nap_street_address = get_field('nap_street_address', $post);
									$nap_suite_number = get_field('nap_suite_number', $post);
									$nap_city_county = get_field('nap_city_county', $post);
									$nap_state = get_field('nap_state', $post);
									$nap_zip_code = get_field('nap_zip_code', $post);
									$nap_phone_number = get_field('nap_phone_number', $post);
									$phone_number_post = preg_replace("/[^0-9]/", "", $nap_phone_number);
									$nap_text_number = get_field('nap_text_number', $post);
									$get_directions_link = get_field('get_directions_link', $post);
									$location_background = get_field('location_background', $post);
									$address_type = get_field('address_type', $post);
									$nap_fax = get_field('nap_fax');
									$nap_email_address = get_field('nap_email_address');
									$working_hour = get_field('working_hour');
									?> 
							<div class="footer-nap-col">
								<div class="nap-postal-address-wrap">
									<?php if ($address_type) { ?>
									<!--div class="widget-title h5"><?php // echo $address_type;  ?></div-->
									<?php } ?>
									<div class="address-wrap footeraddress">
										<div class="address">
											<div class="addressInner">
											<div class="responsive-footer-layout">
												<img src="<?php echo get_stylesheet_directory_uri()
                                        ?>/img/pin.svg"	alt="phone"/>
												<?php if ($nap_attorney_business_name) {
													// echo "<div>" . $nap_attorney_business_name . "</div>";
													}
													?>
												<?php if ($nap_street_address || $nap_suite_number) { ?>
												<span>
													<?php echo $nap_street_address; ?>
													<br/>
													<?php if ($nap_suite_number) {
														echo '' . $nap_suite_number . '';
														}
														?>
												</span>
												<?php } ?> 
												<br/>
												</div>
												<?php if ($nap_city_county) {
												echo '<span>' . $nap_city_county . '</span>&nbsp;';
													}
                                                       ?>															
												<?php if ($nap_state) {
												echo '<span> ' . $nap_state . '</span><br/>';
															}
															?>	
                                               															
												<?php if ($nap_zip_code) {
												echo '<span>' . $nap_zip_code . '</span>';
												}
												?>
											</div>
											<?php if (get_field('get_directions_link')): ?>
											<div class="nap-global-direction">
												<a class="direction-link"
 													href="<?php the_field('get_directions_link') ?>"
 													target="_blank"
 													rel="nofollow">Get Directions</a>
											</div>
											<?php endif; ?>
										</div>
										
										<?php if ($phone_number_post !=''): ?>
										<span class="phone-icon">
											<img src="<?php echo get_stylesheet_directory_uri()?>/img/phone.svg"
   												alt="phone"/>
											<a href="tel:<?php echo $phone_number_post; ?>">
												<?php echo $nap_phone_number; ?></a>
										</span>
										<?php endif; ?>
										<?php /* if($nap_fax){ ?>
										<div class="fexnumber mt-2">
											<span class="phone-icon">
												<img class="svg"
   													src="<?php echo get_stylesheet_directory_uri() ?>/img/fax.svg"
   													alt="smartphone"/>
												<?php echo $nap_fax; ?>
											</span>
										</div>
										<?php }  */ ?>
										
										
												<?php  if ($nap_email_address !=''): ?>
											<span class="email-icon">
												<img src="<?php echo get_stylesheet_directory_uri()?>/img/mail.svg"
   													alt="email"/>     
												<a href="tel:<?php echo $nap_email_address; ?>">
													<?php echo $nap_email_address; ?>
												</a>
											</span>
											<?php endif; ?>
											
											
													<?php  if ($working_hour !=''): ?>
											<span class="working-hours">
												<img src="<?php echo get_stylesheet_directory_uri()?>/img/time.svg"
   													alt="email"/>     
													<?php echo $working_hour; ?>
											</span>
											<?php endif; ?>
										
									</div>
								</div>
							</div>
						</div>
				
					<?php } else { ?>
					<div class="footer-nap-row">
						<?php $args = array(
									'post_type' => 'nap',
									'posts_per_page' => 1,
									'order' => 'ASC'
									);
									$the_query = new WP_Query($args);
									if ($the_query->have_posts()) {
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
									$nap_map_location = get_field('nap_map_location');
									$address_type = get_field('address_type');
									$nap_fax = get_field('nap_fax');
								   $nap_email_address = get_field('nap_email_address'); 
									$working_hour = get_field('working_hour');								  
									?>
						<div class="footer-nap-col">
							<div class="nap-postal-address-wrap footeraddress">
								<?php if ($address_type) { ?>
								<div class="widget-title h5">
									<?php // echo $address_type; ?>
								</div>
								<?php } ?>
								<div class="address-wrap">
									<div class="address">
										<div class="addressInner">
										<div class="responsive-footer-layout">
											<img src="<?php echo get_stylesheet_directory_uri()
                                                ?>/img/pin.svg"
   												alt="phone"/>
											<?php if ($nap_attorney_business_name) {
													//  echo "<div>" . $nap_attorney_business_name . "</div>";
														}
														?>
											<?php if ($nap_street_address || $nap_suite_number) { ?>
											<span>
												<?php echo $nap_street_address; ?>
												<br/>
												<?php if ($nap_suite_number) {
													echo '' . $nap_suite_number . '';
													}
													?>
											</span>
											<br/>
											
											<?php } ?>
											<?php if ($nap_city_county) {
												echo '<span>' . $nap_city_county . '</span>';
												}
												?>
											<?php if ($nap_state) {
													echo '<span> ' . $nap_state . '</span>&nbsp;';
													}
													?>
																		<?php if ($nap_zip_code) {
												echo '<span>' . $nap_zip_code . '</span><br/>';
												}
												?>
											<?php if (get_field('get_directions_link')): ?>
											</div>
										<div class="responsive-footer-layout2">
											<div class="nap-global-direction">
												<a class="direction-link"
 													href="<?php the_field('get_directions_link') ?>"
 													target="_blank"
 													rel="nofollow">Get Directions</a>
											</div>
											<?php endif; ?>
											
											
										
											  
											<?php if ($phone_number_post !=''): ?>
											<span class="phone-icon">
												<img src="<?php echo get_stylesheet_directory_uri()?>/img/phone.svg"
   													alt="phone"/>     
												<a href="tel:<?php echo $phone_number_post; ?>">
													<?php echo $nap_phone_number; ?>
												</a>
											</span>
											<?php endif; ?>  
											
											
											<?php /* if($nap_fax){ ?>  
											<div class="fexnumber mt-2">
												<span class="phone-icon">
													<img class="svg"
   														src="<?php echo get_stylesheet_directory_uri() ?>/img/fax.svg"
   														alt="smartphone"/>
													<?php echo $nap_fax; ?>
												</span>
											</div>
											<?php } */ ?>
											
											
												<?php 
											if ($nap_email_address !=''): ?>
											<span class="email-icon">
												<img src="<?php echo get_stylesheet_directory_uri()?>/img/mail.svg"
   													alt="email"/>     
												<a href="tel:<?php echo $nap_email_address; ?>">
													<?php echo $nap_email_address; ?>
												</a>
											</span>
											<?php endif; 
											 ?>
											
														<?php  if ($working_hour !=''): ?>
											<span class="working-hours">
												<img src="<?php echo get_stylesheet_directory_uri()?>/img/time.svg"
   													alt="email"/>     
													<?php echo $working_hour; ?>
											</span>
											<?php endif; ?>
											
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endwhile;
						}
						wp_reset_query();
						
						?>
					</div>
					<?php } ?>
		
		
		
		
			</div>
		
		  </div>
		</div>
		</div>

<div class="copyright text-center">
		Copyright &copy; <?php echo date('Y'); ?> Yosha Cook &#38; Tisch - Personal Injury Lawyers, All Rights Reserved.
		<a  rel="noindex" href="/privacy-policy/"> Privacy Policy</a> |
		<a  rel="noindex" href="/disclaimer/">Disclaimer </a>
</div>
</footer>

<script>
	function init() {
	var imgDefer = document.getElementsByTagName('img');
	for (var i=0; i<imgDefer.length; i++) {
                		if(imgDefer[i].getAttribute('data-src'
                		)) {
                		imgDefer[i].setAttribute('src'
                		,imgDefer[i].getAttribute('data-src'
                		));
                		}}

 var igDefer = document.querySelectorAll('.differ-img[data-src]');
 var style = "background-image: url({url})";
 for (var i = 0; i < igDefer.length; i++) { 
 igDefer[i].setAttribute('style', style.replace("{url}", igDefer[i].getAttribute('data-src')));
 }			
						
					}
                		window.onload = init;  
                	</script>    
  
  	<div class="d-none">  
		<?php get_template_part('inc/faq', 'schema'); ?>
	</div>
	<?php if (is_front_page()) { ?>
	<script type='application/ld+json'>
		{
		"@context": "http://www.schema.org",
		"@type": "Organization",
		"name" : "<?php echo bloginfo('name'); ?>",
		"url" : "<?php echo get_site_url(); ?>",
		"sameAs": ["<?php the_field('facebook', 'option'); ?>",
		"<?php the_field('twitter', 'option'); ?>",
		"<?php the_field('linkedin', 'option'); ?>",
		"<?php the_field('youtube', 'option'); ?>",
		"<?php the_field('google_plus', 'option'); ?>",
		"<?php the_field('you_tube', 'option'); ?>"]
		}
	</script>
	<?php } ?>
	<?php if (is_front_page()) { ?>
	<script type='application/ld+json'> {
		"@context": "https:\/\/schema.org",
		"@type": "WebSite",
		"@id": "#website",
		"url": "<?php echo get_site_url(); ?>",
		"name": "<?php echo bloginfo('name'); ?>",
		"potentialAction": {
		"@type": "SearchAction",
		"target": "<?php echo get_site_url(); ?>?s={search_term_string}",
		"query-input": "required name=search_term_string"
		}}
	</script>
	<?php } ?>
	
	<!--script>(function(ng,a,g,e,l,i,ve){l = a.createElement(g),l.async=1,l.src=ng+e;var c=a.getElementsByTagName(g)[0];c.parentNode.insertBefore(l,c);var i=a.createElement('div');var ve='style';i.id='nGageLH',i[ve].position='fixed',i[ve].right='0px',i[ve].bottom='0px',i[ve].zIndex='5000',a.body&&a.body.appendChild(i);}('https://messenger.ngageics.com/ilnksrvr.aspx?websiteid=',document,'script','15-88-198-197-149-120-152-174')); 
	</script-->

<?php wp_footer(); ?>
</body>
</html>