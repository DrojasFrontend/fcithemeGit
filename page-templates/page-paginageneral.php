<?php 
/*
    Template Name: Página (general)
*/
get_header(); ?>
<?php echo get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="pagina">
    <h1><?php the_title() ?></h1>
    <?php the_content() ?>
</main>
<?php  get_footer(); ?>
