<?php
get_header();
?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="noticias_interna">
    <section class="noticias_interna--featimg">
        <?php
        echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'w-100'));
        ?>
    </section>
    <section class="container-fluid g-0 noticias_interna--contenido">
        <div class="container g-0">
            <div class="row g-0">
                <div class="col-12 col-md-10 blog-cont order-2 order-md-1">
                    <div class="noticias_interna--contenido__cont py-5">
                        <h1><?= get_the_title() ?></h1>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
