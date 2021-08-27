<?php get_header();
get_template_part('inc/banner', 'inner'); ?>
<div class=" blog-detail main">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 postlist-single page-contnet  mainpage">
				<?php while (have_posts()) : the_post(); ?>
				<div class="postexcerpt">
					
					<?php if (has_post_thumbnail()) { ?>
					<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
					<div style="background-image: url('<?php echo $thumb['0']; ?>');"
   						class="postthumnail post-thum post-thum-single mb-4">
					</div>
					<?php } ?>
					<h1 class="title mb-1 w-100"><?php the_title(); ?></h1>
					<?php the_content(); ?>  
				</div>
				<?php endwhile; ?>
			</div>
			<div class="col-lg-4">
				<?php get_sidebar('blog'); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
