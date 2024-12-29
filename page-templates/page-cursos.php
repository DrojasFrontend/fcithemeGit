<?php
/*
    Template Name: Cursos
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
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); 
$alt = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);

?>
<?= get_template_part('template-parts/content'); ?>
<main class="educacion_eventos">
    <section class="container-fluid g-0 educacion_eventos--contenido cursos--contenido" >
        <div class="container-fluid g-0">
            <div class="row g-0">
                <div class="col-12 col-md-8 blog-cont">
					
                    <div class="educacion_eventos--contenido__cont cursos--contenido__cont">
                        <div class="educacion_eventos--contenido__banner">
                            <?= get_the_post_thumbnail($post->ID, 'full', array('class' => 'w-100')); ?>
                        </div>
                        <div class="educacion_eventos--contenido__social">
                            <?php echo get_template_part('template-parts/content', 'compartir'); /* Módulo de compartir */ ?>
                        </div>
                        <div class="educacion_eventos--contenido__total">
                            <h1 class="d-none"><?php echo $titulo ?></h1>
							<div class="contenido-cursos">
								<?= the_content(); ?>
							</div>							
                            <div class="educacion_total">
                                <h2 class="h1"><?= $titulo ?></h2>
                                <div>
                                    <?php $contenido; ?>
                                </div>
                                <div>
                                    <?php $short_description; ?>
                                </div>
                                <?php if (!empty($tabs)) { ?>
                                    <?php foreach($tabs as $tab): ?>
                                        <div>
                                            <?= $tab["content-tab"] ?>
                                        </div>
                                    <?php endforeach ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="educacion_eventos--contenido__columnader">
						<h2 class="h1">
							<?= $titulo; ?>
						</h2> 
						
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
                        <?= do_shortcode('[contact-form-7 id="924" title="Formulario - Educación continua y eventos" html_name="Formulario_evento"]') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();