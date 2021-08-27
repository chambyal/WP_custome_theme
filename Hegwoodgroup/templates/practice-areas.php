<?php /* Template Name: Practice Areas */
get_header();
get_template_part('inc/banner', 'inner');
?>
<div class="practiceareaspage">
	<?php
	if (have_rows('practiceareastop')):
	while (have_rows('practiceareastop')): the_row();
	$title = get_sub_field('title');
	$content = get_sub_field('content');
	$leftsectionimage = get_sub_field('left_section_content_image');
	$rightcontent = get_sub_field('right_section_content');
	?>
	<section id="practiceareastop" class="main">
		<div class="container">
			<div class="row text-center">
				<div class="col-lg-9 m-auto">
					<div class="practicecontent mb-5">
						<h3 class="title">
							<?php echo $title; ?></h3>
						<?php echo $content; ?>
					</div>
				</div>
			</div>
			<div class="row align-items-center justify-content-center ">
				<div class="col-lg-6">
					<div class="leftImg">
						<img class="w-100"
   							src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs='
   							data-src="<?php echo $leftsectionimage['url']; ?>"
   							alt="<?php echo $title; ?>"/>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="rightcontent text-left">
						<?php echo $rightcontent;?>
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
						if (have_rows('practiceareas', 2)):
						$count = 1;
						while (have_rows('practiceareas', 2)): the_row();
						$pname = get_sub_field('practice_areas_name', 2);
						$picon = get_sub_field('practice_areas_icon', 2);
						$plink = get_sub_field('practice_areas_link', 2);
					?>
						<li id="loc-<?php echo $count; ?>"	class="practicelist page-link-item <?php  if ($count == 1) {
                                                echo 'active'; 
                                            }
                                            ?>">
							<a href="<?php echo $plink ;?>">
								<div class="practicebox">
										<img src="<?php echo $picon['url']; ?>"
   										alt="<?php $pname; ?>"/>
									<div class="ptitle">
										<?php echo $pname; ?></div>
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
					<div data-src="<?php echo $practiceimage['url']; ?>"
   						id="imagecount-<?php echo $countt; ?>"	class="differ-img practiceInner practice-image norepeat bgcover <?php
                            if($countt == 1){   echo 'active';  }
                            ?>">
						<div class="practice-content">
							<div class="title">
								<div class="icon">
									<img src="<?php echo $picon['url']; ?>"
   										alt="<?php $pname; ?>"/>
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
	
	
	
	
	<?php /*
	$types_of_injury_cases = get_field('types_of_injury_cases');
	if (have_rows('types_of_injury_cases_list')):
    ?>	
	<!--section id="InjuryCases" class="InjuryCases main">
		<div class="container">
		<div class="row"> 

<div class="title col-12 mb-5 text-center"><?php echo $types_of_injury_cases; ?></div>		
	<?php
	$i = 1;
	while (have_rows('types_of_injury_cases_list')): the_row();
	$list_item = get_sub_field('list_item');
	$item_link = get_sub_field('item_link');
	if ($i % 3 == 1) {
   echo "<div class='col-md-4 listitem  listitem$i '>";
	}
	?>
   <div class="list_item">
	    <a href="<?php echo $item_link; ?>"> <img class="arrow-svg" src="<?php echo get_stylesheet_directory_uri() ?>/img/next.jpg" alt="arrow"/> <?php echo $list_item; ?></a>
	</div>

  <?php
	if ($i % 3 == 0) {
	echo "</div>";
	} 
	$i++;
    endwhile;
	if ($count % 3 !== 0) {
	echo "</div>";
	}	
	?>
	</div>
	</div>
	</section-->
		<?php 
	    endif; */
		?>
				
<?php $client_quotes = get_field('client_quotes'); ?>
<?php if($client_quotes) { ?>	
	<section id="clientquotes" class="client_quotes main">
		<div class="container">
		<div class="row"> 
		<div class="col-lg-9 m-auto">
		<div class="quote">
		<img class="quotesvg" src="<?php echo get_stylesheet_directory_uri() ?>/img/quote02.svg" alt="quote"/> 
		<?php echo $client_quotes; ?>
		</div>
		</div>
	    </div>
		</div>
		</section>
	<?php } ?>
		
	
	<?php get_template_part('inc/home', 'contact'); ?>
	<?php get_footer(); ?>