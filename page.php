<?php get_header(); ?>
	<!-- Begin Loop -->
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

	<?php endwhile; endif;?>
	<!-- End loop -->
<?php get_footer(); ?>