<?php 
/*
    Template Name: Página (sin título)
*/
get_header(); ?>
<?php echo get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="pagina">
  <?php the_content() ?>
</main>
<?php  get_footer(); ?>
