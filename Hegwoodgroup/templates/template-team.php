<?php /* Template Name: Our Team */
get_header();
get_template_part('inc/banner', 'inner');
?>
<section id="teampage"
       	class="main">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-9 m-auto">
				<div class="team-content text-center">
					<?php
					if (have_posts()):
				while (have_posts()) : the_post();
				the_content();
				endwhile;
				endif;
				?>
				</div>
			</div>
			<div class="col-lg-11 m-auto col-md-12">
				<div class="row teammain justify-content-center">
					<?php 
					$args = array(
					'post_type' => 'ourteam',
					'order' => 'ASC',
					'posts_per_page' => -1
					);
					$the_query = new WP_Query($args);
					if ($the_query->have_posts()):
					while ($the_query->have_posts()): $the_query->the_post();
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID),'full');
					
					?>
					<div class="col-lg-3 col-md-4 text-left text-left">
						<a class="team-wrap d-block mt-5"
 							href="<?php the_permalink();  ?>">
							<div class="block-team">
								<div class="TeamImg">
								
								<img class="w-100" src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' 
	                              data-src="<?php echo $image['0']; ?>" alt="<?php echo $image['title']; ; ?>"/>
		
							</div>
								<div class="member_name"><?php the_title();?></div>
								
							</div>
						</a>
					</div>  
					<?php
					endwhile;
					wp_reset_query();
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('inc/home', 'contact'); ?>

<?php get_footer(); ?>
