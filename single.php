<?php get_header(); ?>
	<!-- Inicio Loop -->
	<?php while(have_posts()) : the_post(); ?>

	<?php endwhile; ?>
	<!-- Final loop -->
<?php get_footer(); ?>