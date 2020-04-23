<?php get_header(); ?>
	<!-- Inicio Loop -->
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

	<?php endwhile; endif;?>
	<!-- Final loop -->
<?php get_footer(); ?>