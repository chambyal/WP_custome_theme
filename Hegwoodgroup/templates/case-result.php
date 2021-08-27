<?php /* Template Name: Case Result Page */
get_header();
get_template_part('inc/banner', 'inner'); ?>
<section class="main caseresult">

 <div class="container">
<div class="row m-0 justify-content-center align-items-center">
<h2 class="title mb-5 text-center"> Our Firm&#39;s Success Speaks For Itself </h2>
<?php      wp_reset_query();
		$args = array(
		'post_type' => 'casereview',
		'order' => 'ASC',
		'posts_per_page' => 9
		);
		$wp_query = new WP_Query($args);
		if ($wp_query->have_posts()):
		
	
			$i = 1;
		    while ($wp_query->have_posts()): $wp_query->the_post();   
		  	$case_amount = get_field('case_amount');
			$case_status = get_field('case_status');
	if ($i % 3 == 1) { 
   echo "<div class='row caseblock  caseblock$i '>";
	}	?>
     <div class="col-md-4 p-0">
		<div class="reviewblock  text-center">
			<div class="case_amount">
				<div class="amount"><?php echo $case_amount ?></div>
				<div class="status"><?php echo $case_status ?></div>
			</div>
			<div class="case_content">
			<?php the_content();?>  
			</div>
		</div>
	</div>
<?php  
		if ($i % 3 == 0) {
	echo "</div>";
	}   
	$i++;
	endwhile;  
	 ?>
	 
	 
<?php 	 
if ($count % 3 !== 0) {
	echo "</div>";  
 }  
 endif; 
 ?>

</div>  
</div>

</section> 
<?php get_footer(); ?>