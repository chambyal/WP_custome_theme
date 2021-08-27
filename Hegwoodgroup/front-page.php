<?php get_header(); ?>
<?php if(!wp_is_mobile()) { ?>
<?php
    if (have_rows('home_banner')):
	while (have_rows('home_banner')): the_row();
	$bannerImg = get_sub_field('bannerImage');
	$small_heading = get_sub_field('small_heading');
	$bannerheading = get_sub_field('BannerHeading');
	$bannercontent = get_sub_field('BannerContent');
	$btnink = get_sub_field('bannerbuttonlink');
	$btntext = get_sub_field('bannerbuttontext');
	$banner_video = get_sub_field('banner_video');
?>
<div style="background-image: url('<?php echo $bannerImg; ?>');" class="banner-home  norepeat bgcover d-flex align-items-end">
	<?php if(!wp_is_mobile()): if(!empty($banner_video)): ?>
		<video autoplay loop muted>
			<source src="<?php echo $banner_video; ?>" type="video/mp4">
		</video>
		<div class="video_overLay"></div>
	<?php endif; endif;?>
	<div class="container">
		<div class="bannercontent">
			<!--<div class="smallheading">
				<?php //echo $small_heading; ?>
			</div> -->
			<div class="banner-title m-0"><?php echo $bannerheading; ?></div>
			<div class="banner-content">
				<?php echo $bannercontent; ?></div>
			<div class="btndiv mt-3">
				<a class="btn" href="<?php echo $btnink ?>"><?php echo $btntext; ?></a>
			</div>
		</div>
	</div>
</div>
<?php
endwhile;
endif;
?>

  <?php 
		$args = array(
		'post_type' => 'casereview',
		'order' => 'ASC',
		'posts_per_page' => 5
		);
		$the_query = new WP_Query($args);
		if ($the_query->have_posts()):
		$crbg =  get_field('case_review_background');
  ?>
  
<section  data-src="<?php echo $crbg['url']; ?>" class="casereview norepeat bgcover  differ-img main pt-0">
	<div class="d-flex casereviewrow">
		<?php while ($the_query->have_posts()): $the_query->the_post();
	     	$case_amount = get_field('case_amount');
			$case_status = get_field('case_status');
			?>
		<div class="casereview-block">
			<div class="caseamount">
				<div class="case_amount"><?php echo $case_amount ?></div>
				<div class="case_status"><?php echo $case_status ?></div>
			</div>
			<div class="casecontent">
			<?php the_content();?> 
			</div>
		</div>
		<?php
		endwhile;
		wp_reset_query();
		?>  
	</div>
	<div class="btndv text-center mt-5">
	<a class="btn hoverblack" href="/case-results/"> See More Case Results</a>
	</div>
</section>
<?php
endif;
?>




<?php
	if (have_rows('experienced_personal')): 
	while (have_rows('experienced_personal')): the_row();
	$extitle = get_sub_field('experienced_personal_section');
	$excontent = get_sub_field('experienced_personal_injury_content');
?>
<section class="main experienced">
 <div class="container">
 <div class="row">
<div class="col-lg-9 text-center m-auto col-md-12">
<h1 class="section-title title"><?php echo $extitle; ?></h1>
<?php echo $excontent; ?>
 </div>
 </div>
 </div>
</section>
<?php
endwhile;
endif;
?>



<?php
	if (have_rows('trust_logo_section')): 
	while (have_rows('trust_logo_section')): the_row();
	$leftsectionimage = get_sub_field('left_section_image');
    $btmcontent = get_sub_field('trust_logo_bottom_content');
	$tlbg = get_sub_field('trust_logo_background');
?>
<section id="trustlogo">
<div class="container-fluid  trustlogoInner"> 
<div class="row">
<div class="col-md-5  trustLeft p-0">
<div class="trustLeftimg">
<img class="w-100" src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' 
	data-src="<?php echo $leftsectionimage['url']; ?>" alt="<?php echo $leftsectionimage['title']; ?>"/>
</div>
</div>
<div class="col-md-6 p-0 trustmain">
<div class="trustcontent">
<ul class="trust-icon d-flex"> 
<?php 
	while (have_rows('trust_logo')): the_row();
	$trustlogo = get_sub_field('trust_logo_images');
 ?>
<li><img class="trustlogolist" src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' 
	data-src="<?php echo $trustlogo['url']; ?>" alt="<?php echo $trustlogo['title']; ?>"/>
</li>
<?php
endwhile;
?>
</ul>

<div class="btmcontent">
<?php echo  $btmcontent; ?>
</div>
</div>

</div>

</div>  
</div>
<div data-src="<?php echo $tlbg['url']; ?>" class="trustbg differ-img "> </div>
</section>
<?php 
endwhile;
endif;
?>

 

<?php
$w = 1;
	if (have_rows('in_the_news_media')): 
	while (have_rows('in_the_news_media')): the_row();
	$inthenewstitle = get_sub_field('in_the_news_title');
	$inthenewscontent = get_sub_field('in_the_news_content');
?>
<section id="inthenews" class="main">
<div class="container-fluid">
<div class="row">

<div class="col-lg-3 inthenewsleft offset-lg-1">
<div class="in_news">
<h3 class="title section-title"> <?php echo $inthenewstitle; ?></h3>
<?php echo $inthenewscontent; ?>


	<?php
	$header_phone = get_field('header_phone', options);
	$headerphone = preg_replace("/[^0-9]/", "", $header_phone); 
	?>
	<?php if($header_phone) { ?>
 <a class="headerphone" href="tel:<?php echo $headerphone; ?>">
<img src="<?php echo get_stylesheet_directory_uri()?>/img/phone.svg" alt="phone"/>  
 <span class="casefree d-block">Free case Consultation</span>
 <?php echo $header_phone; ?>
 </a>
<?php } ?>
</div>
</div>
<div class="col-lg-8 inthenewsright pr-0">
<div id="in_thenews" class="owl-carousel">
<?php

 while (have_rows('in_thenewsmedia')): the_row();
 $media = get_sub_field('media'); 
  $popupimage = get_sub_field('popup_image');
  $shortcaptions = get_sub_field('short_captions_content');  
  
 ?>
<div class="item"> 
<a class="fancybox" data-fancybox="image"   href="<?php echo $popupimage['url']; ?>"  data-caption="<?php echo $shortcaptions; ?>">
<img class="sliderimg" src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' 
 data-src="<?php echo $media['url']; ?>" alt="<?php echo $media['title']; ?>"/>
</a>
</div>
<?php    
$w++;
endwhile;  
?>
</div>
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
					if (have_rows('practiceareas')): 
					$count = 1;
				while (have_rows('practiceareas')): the_row();
				$pname = get_sub_field('practice_areas_name');
				$picon = get_sub_field('practice_areas_icon');
			   $plink = get_sub_field('practice_areas_link');
                ?>
						<li id="loc-<?php echo $count; ?>"  class="practicelist page-link-item <?php
                                            if ($count == 1) {
                                                echo 'active'; 
                                            }
                                            ?>">
							<a href="<?php echo $plink ;?>">
								<div class="practicebox">
									<img src="<?php echo $picon['url']; ?>"
   										alt="<?php $pname; ?>"/>
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
				<div class="col-md-8 p-0">
					
				<?php 
				if (have_rows('practiceareas')): 
			$countt = 1;
				while (have_rows('practiceareas')): the_row();
               $pname = get_sub_field('practice_areas_name');
			   $pdescription = get_sub_field('practice_areas_description');
			    $practiceimage = get_sub_field('practice_areas_image');
			   $picon = get_sub_field('practice_areas_icon');
			  
				?>      
					<div data-src="<?php echo $practiceimage['url']; ?>"  id="imagecount-<?php echo $countt; ?>" class="differ-img practiceInner practice-image norepeat bgcover <?php
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
						<?php if($pdescription) { ?>
						<?php echo $pdescription ?>
						<?php } ?>
					</div>
					</div>
					
					<?php
					$countt++;	  
						endwhile;
						endif;  
				?>
					    
			
              </div>				
			</div>
		</div>
	</section>

<?php } ?>


<!-- Mobile HTML-->
<?php if(wp_is_mobile()) { ?>
<?php get_template_part('inc/mobile', 'home'); ?>
<?php } ?>
<!--Mobile HTML End-->



<?php
	if (have_rows('content_section')): 
	while (have_rows('content_section')): the_row();
	$contenttitle = get_sub_field('content_section_title');
	$content_content = get_sub_field('content_section_content');
?>
<section class="main">
 <div class="container ullist mb-0"> 
 <div class="row">
<div class="text-center col-md-12">
<h2 class="section-title title"><?php echo $contenttitle; ?></h2>
<?php echo $content_content; ?>
 </div>
 </div>
 </div>
</section>
<?php
endwhile;
endif;
?>




<div class="section-title title text-center mb-5 gallerytitle">Gallery</div>
<ul class="gallery"> 
	<?php 
	    if (have_rows('gallery_section')):
		while (have_rows('gallery_section')): the_row();
		$gallery_thumbnail = get_sub_field('gallery_images');
		$shortcontent = get_sub_field('short_content');
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

<?php if(get_field('branding_video_id')){ ?>
<section class="galleryVideo main">
	 <div class="container">
	      <div class="section-title title text-center mb-5 gallerytitle">Our Firm's History</div>
		  
		 <div class="row">
		 
		 <div class="col-md-8 m-auto">
			   <div class="videoBox">
   
          
          <a href="https://www.youtube.com/watch?v=<?php echo get_field('branding_video_id') ; ?>"  data-fancybox="video"  class="fancybox">
          
              <?php if(get_field('branding_video_image')){ ?>
                <div class="videoImage" style="background-image: url('<?php the_field('branding_video_image'); ?>');">
                 </div>
              <?php } else { ?>
                  <div class="videoImage" style="background-image: url('https://i.ytimg.com/vi/<?php echo get_field('branding_video_id') ; ?>/maxresdefault.jpg');">
                 </div>
              <?php } ?>


          </a>
          
         </div>
		 
		 </div>
		 </div>
	 </div>
</section>

  <?php } ?>
  
  
  
<?php
	if (have_rows('content_section_two')): 
	while (have_rows('content_section_two')): the_row();
	$content_title = get_sub_field('content_section_title');
	$contentcontent = get_sub_field('content_section_content');
?>
<section class="main">
 <div class="container">
 <div class="row">
<div class="text-center col-md-12">
<h2 class="section-title title"><?php echo $content_title; ?></h2>
<?php echo $contentcontent; ?>
 </div>
 </div>
 </div>
</section>
<?php
endwhile;
endif;
?>

<?php get_template_part('inc/home', 'contact'); ?>

<?php get_footer(); ?>