<?php
/* Template Name: About Us */
get_header();
get_template_part('inc/banner', 'inner');
?>
<div class="aboutuspage">

  <?php
	if (have_rows('about_us')): 
	while (have_rows('about_us')): the_row();
	$about_title = get_sub_field('about_title');
	$about_content = get_sub_field('about_content');
	$about_us_background = get_sub_field('about_us_background');
	$about_us_right_image = get_sub_field('about_us_right_image');
	?>
<section data-src="<?php echo $about_us_background; ?>" id="aboutus" class="main norepeat  bgcover differ-img">
 <div class="container">
 <div class="row align-items-center">  
 
<div class="col-lg-8 text-left">
<div class="aboutuscontent">
<h3 class="title"><?php echo $about_title; ?></h3>
<?php echo $about_content; ?>
</div>
 </div>
 
 <div class="col-lg-4">
 <div class="aboutrightimg">
 <img class="w-100" src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' 
	data-src="<?php echo $about_us_right_image['url']; ?>" alt="<?php echo $about_title; ?>"/>
 </div>
 </div>
 
 </div>
</section>
<?php
endwhile;
endif; 
?>

<section id="practicebg" class="practiceblock">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4  practicemain">
					<ul class="practice">
			  <?php  
					if (have_rows('practiceareas', 2)): 
					$count = 1;
				while (have_rows('practiceareas', 2)): the_row();
				$pname = get_sub_field('practice_areas_name', 2);
				$picon = get_sub_field('practice_areas_icon', 2);
			   $plink = get_sub_field('practice_areas_link', 2);
                ?>
						<li id="loc-<?php echo $count; ?>"  class="practicelist page-link-item <?php
                                            if ($count == 1) {
                                                echo 'active'; 
                                            }
                                            ?>">
							<a href="<?php echo $plink ;?>">
								<div class="practicebox">
								<img src="<?php echo $picon['url']; ?>"	alt="<?php $pname; ?>"/>
									<div class="ptitle"><?php echo $pname; ?></div>
								</div>
							</a>
						</li>  
						<?php
					$count++; 
						endwhile;
						endif;
						?>
					</ul>  
				</div>
				<?php if(!wp_is_mobile()) { ?>
				<div class="col-md-8 p-0">
				<?php 
				if (have_rows('practiceareas', 2)): 
		     	$countt = 1;
				while (have_rows('practiceareas', 2)): the_row();
               $pname = get_sub_field('practice_areas_name', 2);
			   $pdescription = get_sub_field('practice_areas_description', 2);
			    $practiceimage = get_sub_field('practice_areas_image', 2);
			   $picon = get_sub_field('practice_areas_icon', 2);
			   ?>      
				<div data-src="<?php echo $practiceimage['url']; ?>"  id="imagecount-<?php echo $countt; ?>" class="differ-img  practiceInner practice-image norepeat bgcover <?php
                            if($countt == 1){
                             echo 'active';  
                            }
                            ?>">
         						  
                     <div class="practice-content">
 
						<div class="title">
						<div class="icon">
						<img src="<?php echo $picon['url']; ?>"	alt="<?php $pname; ?>"/>
					    </div>
						<?php echo $pname; ?>
						</div>
						<?php echo $pdescription ?>
					</div>
					</div>
					
					<?php
					$countt++;	  
						endwhile;
						endif;  
				?>
              </div>
           <?php } ?>			  
			</div>
		</div>
	</section>

<?php
	if (have_rows('reputation_section')): 
	while (have_rows('reputation_section')): the_row();
	$reputation_title = get_sub_field('reputation_title');
	$reputation_content = get_sub_field('reputation_content');
	$reputation_image = get_sub_field('reputation_image');
?>  
<section <?php if(!wp_is_mobile()) { ?> data-src="<?php echo $reputation_image[url]; ?>" <?php } ?> 
id="reputation" class="main norepeat bgcover differ-img">
<div class="reputationcontent"> 
<div class="title"><?php echo $reputation_title; ?></div>
<?php echo $reputation_content; ?>
<div class="btndv d-flex text-left mt-4">
	<a class="btn hoverblack" href="/contact-us/"> Contact Us </a>
	<?php
	$header_phone = get_field('header_phone', options);
	$headerphone = preg_replace("/[^0-9]/", "", $header_phone); 
	?>
	<?php if($header_phone) { ?>
 <a class="headerphone" href="tel:<?php echo $headerphone; ?>">
<img src="<?php echo get_stylesheet_directory_uri()?>/img/phone.svg" alt="phone"/>  
 <span class="casefree d-block">Call Us Today!</span>
 <?php echo $header_phone; ?>
 </a>
<?php } ?>
	
</div>

 </div>
</section>
<?php
endwhile;
endif; 
?>
	



<?php
	if (have_rows('credentials_content_section')): 
	while (have_rows('credentials_content_section')): the_row();
	$Credentials_title = get_sub_field('Credentials_title');
	$credentials_content = get_sub_field('credentials_content');
	$Credentialsbackground = get_sub_field('Credentialsbackground');
	$credentials_right_image = get_sub_field('credentials_right_image');
	
?>
<section data-src="<?php echo $Credentialsbackground; ?>" id="about_us" class="main norepeat  bgcover differ-img">
 <div class="container">
 <div class="row align-items-center">  
 
<div class="col-lg-7 text-left">
<div class="aboutuscontent">
<h3 class="title"><?php echo $Credentials_title; ?></h3>
<?php echo $credentials_content; ?>
</div>
 </div>
  <div class="col-lg-5">
 <div class="rightimg">
 <img class="w-100" src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' 
	data-src="<?php echo $credentials_right_image['url']; ?>" alt="<?php echo $Credentials_title; ?>"/>
 </div>
 </div>
 
 </div>
</section>
<?php
endwhile;  
endif; 
?>




<?php $btmcontent = get_field('about_us_bottom_content'); ?>
<?php if($btmcontent) { ?>
<section class="main bottom_content">
 <div class="container">
 <div class="row">  
 <div class="col-lg-10 text-left m-auto col-md-12 m-auto">
<div class="bottom-content">
<?php echo $btmcontent; ?>
</div>
 </div>
 
 <div class="btndv text-center mt-5 col-12">
	<a class="btn hoverblack" href="/contact-us/"> Contact Us </a>
	</div>
 
  </div>
 </div>  
</section>
<?php } ?>




</div>
<?php get_footer(); ?>