<?php
/* Template Name: Restricted to Authors only */
if ( !current_user_can($rol)) {
        get_template_part('error');
        exit(0);
}
?>
<?php get_header(); ?>

<?php get_footer(); ?>