<?php get_header();
get_template_part('inc/banner', 'inner');
?>
		<?php
if (have_rows('about_content')):
	while (have_rows('about_content')): the_row();
	$aboutcontent = get_sub_field('about_content_top');
	$aboutcontentright = get_sub_field('about_content_right');
	$title = get_sub_field('title');
   $destination = get_sub_field('destination');
   $aboutbackgroundimage = get_sub_field('about_background_image', 281);
?>
<section <?php if(!wp_is_mobile()) { ?> data-src="<?php echo $aboutbackgroundimage['url']; ?>" <?php } ?> id="team-detail" class="main team-detail norepeat bgcover  differ-img">
		<div class="container">

			<div class="row  row align-items-center">
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID),'full');  ?>
					<div class="col-lg-5">
				<div data-src="<?php echo $image['0']; ?>" class="teamimg norepeat bgcover  differ-img"></div>
			</div>
				
				<div class="col-lg-7">
					<div class="about-right-content">
				 <h2 class="title"> <?php echo $title; ?></h2>
			     <div class="destination"><?php echo $destination; ?></div>
						<?php echo $aboutcontent;  ?>
					<?php if(($aboutcontentright)) { ?>
						<?php echo $aboutcontentright; ?>
						<?php } ?>
						
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


<?php if(have_rows('trust_iocn')):?>
<ul>
<?php
while (have_rows('trust_iocn')): the_row();
$trusticonimage = get_sub_field('trust_icon_image');
?>
<li><img class="sliderimg" src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' 
data-src="<?php echo $trusticonimage['url']; ?>" alt="<?php echo $trusticonimage['title']; ?>"/></li>
<?php endwhile; ?>
</ul>
<?php endif; ?>
						
 </div>
</div>
</div>
</div> 
</section>
<?php 
endwhile;
endif;
?>


<?php
if (have_rows('in_the_news_section')):
while (have_rows('in_the_news_section')): the_row();
$in_the_news_title = get_sub_field('in_the_news_title');
?>
<?php if(have_rows('in_the_news_media')):?>  
<section  class="newssection norepeat bgcover  differ-img main">
<div class="container">
<div class="row">
<div class="title mb-5 col-12 text-center"> <?php echo $in_the_news_title; ?></div>
<ul class="d-flex">
<?php
while (have_rows('in_the_news_media')): the_row();
$inthenewsmediaimage = get_sub_field('in_the_news_media_image');
?>
<li><img class="mediaimage" src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' 
data-src="<?php echo $inthenewsmediaimage['url']; ?>" alt="<?php echo $inthenewsmediaimage['title']; ?>"/></li>
<?php endwhile; ?>
</ul>
</div>
</div>
</section>
<?php endif; ?>
 <?php 
endwhile;  
endif;
?>


<?php
$attorneysection = get_field('experience_section');
$heading3 = $attorneysection['heading'];
$experience = $attorneysection['experience'];
if ($heading3 || $experience):
    ?>
    <div class="attorney-exp-section main list-content">
        <div class="container">
            <h2 class="heading h2 heading-icon mb-4"><?php echo $heading3; ?></h2>
            <div class="accordion" id="accordion">
                <?php
                $i = 1;
                foreach ($experience as $exp):
                    $title = $exp['title'];
                    $content = $exp['content'];
                    ?>
				
					<div class="faqmain">
                                    <div class="faqlist">   
									<div class="faq-heading" id="heading<?php echo $i; ?>">
                                            <a class="plusicon faq-title collapsed" data-toggle="collapse"
                                                    data-target="#collapse-<?php echo $i; ?>"  
                                                    aria-controls="collapse<?php echo $i; ?>">
                                                        <?php echo $title; ?>
												<span class="arrow">
												<img class="arrow-svg" src="<?php echo get_stylesheet_directory_uri() ?>/img/next.jpg" alt="arrow"/>
												</span>  
                                            </a>
                                        </div>
                                           
                                        <div id="collapse-<?php echo $i; ?>" class="collapse" 
                                             aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">  
                                             
                                           	 <div class="faq-description ullist"><?php echo $content; ?></div>
                               
                                     </div>    
                                     </div>
									</div>
                    <?php
                    $i++;
                endforeach;
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>




 
  
 
<?php get_template_part('inc/home', 'contact'); ?>
<!--attorney Schema-->
<div class="d-none">
<?php get_template_part('inc/schema', 'attorney'); ?>
</div>

<?php get_footer(); ?>