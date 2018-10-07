<!-- HEADER -->
<?php get_header(); ?>

<!-- Roep de homepagine-template op -->
<?php get_template_part('homepage-template' , $name = null); ?>

<!-- SIDEBAR -->
<?php get_sidebar(); ?>

<!-- FOOTER -->
<?php get_footer(); ?>