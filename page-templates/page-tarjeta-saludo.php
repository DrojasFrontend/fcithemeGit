<?php
/*
    Template Name: Página (tarjeta de saludo)
*/
get_header();

$ano = get_field('year_event');
$mes = get_field('month_event');
$dia = get_field('day_event');

$lugar_event = get_field('lugar_event');
$direccion_del_evento = get_field('direccion_del_evento');

$ubicacion = $lugar_event ."<br />". $direccion_del_evento;
$fecha_del_evento = $dia . " de " . mes_numero_a_texto($mes) . " de " . $ano;

// Contenidos
$titulo = (get_field('title_custom') != '') ? get_field('title_custom') : get_the_title();
$contenido = get_the_content();
$short_description = get_field('short_description');
$tabs = get_field('tabs-group');

?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="educacion_eventos">
    <section class="container-fluid g-0 educacion_eventos--contenido">
        <div class="container g-0">
            <div class="row g-0">
                <div class="col-12 col-md-8 blog-cont">
                    <div class="educacion_eventos--contenido__cont">
                        <div class="educacion_eventos--contenido__banner">
                            <?= get_the_post_thumbnail($post->ID, 'full', array('class' => 'w-100')); ?>
                        </div>
                        <div class="educacion_eventos--contenido__social">
                            <?php echo get_template_part('template-parts/content', 'compartir'); /* Módulo de compartir */ ?>
                        </div>
                        <div class="educacion_eventos--contenido__total">
                            <div class="educacion_total">
                                <div>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="educacion_eventos--contenido__columnader">
                        <h1>Diseña tu tarjeta de saludo</h1>
                        <?= do_shortcode('[contact-form-7 id="4863" title="Campaña - Tarjeta de saludo"]') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();