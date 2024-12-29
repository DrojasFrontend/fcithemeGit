<?php
get_header();
$categorias = get_terms_enbotones(get_the_terms($post->id, 'temas_educativos_categorias'));
?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="diario_medico_int">
    <div class="diario_medico_int--header">
        <div class="diario_medico_int--header__titulo">
            <h1><?= get_the_title() ?></h1>
        </div>
        <div class="diario_medico_int--header__meta">
            <div class="diario_medico_int--header__meta--categorias">
                <div class="diario_medico_int--header__meta--categorias__int">
                    <?= $categorias ?>
                </div>
            </div>
            <div class="diario_medico_int--header__meta--comparte">
                <?= do_shortcode('[addtoany]') ?>
            </div>
        </div>
        <?php /*
        <div class="diario_medico_int--header__imgfeat">
            <?= //get_the_post_thumbnail($post->ID, 'full', array('class' => 'w-100')); ?>
        </div>
        */ ?>
    </div>
    <section class="container-fluid g-0 diario_medico_int--contenido">
        <div class="container g-0">
            <div class="row g-0">
                <div class="col-12 blog-cont">
                    <div class="diario_medico_int--contenido__cont">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();