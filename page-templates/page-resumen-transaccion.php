<?php
/*
    Template Name: Payu (Resumen de transacción)
*/
get_header();
?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="pagina">
    <h1 class="mb-5"><?php the_title(); ?></h1>
    <div class="payuform">
        Código de resumen
    </div>
</main>
<?php
get_footer();
?>