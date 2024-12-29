<?php
get_header();
$fecha_del_evento = get_field('fecha_del_evento');
$ubicacion = get_field('ubicacion');
$fecha = get_field('fecha');
$fecha_actual = date("Y-m-d H:i:s");
if($fecha_actual > $fecha){
    $estado_form = 'material'; // Pasado
}else{
    $estado_form = 'taller'; // Futuro
}
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
                            <h1><?= get_the_title() ?></h1>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="educacion_eventos--contenido__columnader">
                        <?php if($estado_form == 'taller'): ?>
                            <?php if($fecha_del_evento != ""): ?>
                                <div class="fecha">
                                    <div class="icono">
                                        <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/fci/calendar_icon.svg" alt="Fecha">
                                    </div>
                                    <div class="contenido">
                                        <?= $fecha_del_evento ?>
                                    </div>
                                </div>
                            <?php endif ?>
                            <?php if($ubicacion != ""): ?>
                                <div class="direccion">
                                    <div class="icono">
                                        <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/fci/location_icon.svg" alt="Dirección">
                                    </div>
                                    <div class="contenido">
                                        <?= $ubicacion ?>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                        <?php if($estado_form == 'material'): ?>
                            <h2>Descarga el material: <?= get_the_title() ?></h2>
                            <?= do_shortcode('[contact-form-7 id="1667" title="Formulario - Descargar el material"]') ?>
                        <?php endif ?>
                        <?php if($estado_form == 'taller'): ?>
                            <h2>Taller: <?= get_the_title() ?></h2>
                            <?= do_shortcode('[contact-form-7 id="924" title="Formulario - Educación continua y eventos"]') ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();