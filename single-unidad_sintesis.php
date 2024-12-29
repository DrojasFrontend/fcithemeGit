<?php
get_header();
$subtitulo = get_field('subtitulo');
?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="unidad_sintesis">
    <section class="unidad_sintesis--banner">
        <div class="unidad_sintesis--banner__int">
            <div class="unidad_sintesis--banner__contenido">
                <h1><?= get_the_title() ?></h1>
                <div class="unidad_sintesis--banner__contenido--share">
                    <?= get_template_part('template-parts/content', 'compartir'); /* Módulo de compartir */ ?>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid g-0 unidad_sintesis--contenido">
        <div class="container g-0">
            <div class="row g-0">
                <div class="col-12 blog-cont">
                    <div class="unidad_sintesis--contenido__cont">
                    <?php if( get_field('banner') ): ?>
                        <img src="<?= get_field('banner')['url'] ?>" alt="<?= get_field('banner')['alt'] ?>">
                    <?php endif; ?>
                    <?php if( get_field('version') ): ?>
                        <p class="text-end my-3"><?= get_field('version') ?> </p>
                    <?php endif; ?>
                    <?php if( get_field('recado') ): ?>
                        <div class="my-3"><?= get_field('recado') ?> </div>
                    <?php endif; ?>
                    <?php if( get_field('certeza') ): ?>
                        <p class="text-end my-3"><strong>Certeza en la evidencia:</strong><?= get_field('certeza') ?> </p>
                    <?php endif; ?>
                    <?php if( get_field('contenido_general') ): ?>
                        <div class="my-3"><?= get_field('contenido_general') ?> </div>
                    <?php endif; ?>
                        
                    <?php 
                    if( have_rows('referencias') ): ?>
                        <h2 class="fw-bold">Referencias</h2>
                        <ol>
                        <?php while( have_rows('referencias') ): the_row(); 
                        $referencia = get_sub_field('referencia');?>
                            <li><p><?= $referencia; ?> </p></li>
                        <?php
                        endwhile; ?>
                        </ol>
                    <?php endif; ?>
                    <?php if( get_field('formulario') ): 
                        $shortcode = get_field('formulario');
                        echo do_shortcode(  "  $shortcode  ");
                        ?>
                        
                    <?php endif; ?>
                        <?php the_content(); ?>
                    </div>
					
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
