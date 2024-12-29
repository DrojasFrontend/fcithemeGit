<?php
/* Template name: Acceso a plataforma */
get_header('acceso');
?>
<main class="aplus__acceso">
    <div class="aplus__acceso--img">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/general/logo.png" alt="Amarilo Plus">
    </div>
    <?php the_content() ?>
</main>
<?php get_footer('acceso'); ?>