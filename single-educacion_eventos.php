<?php
get_header();

$ano = get_field('year_event');
$mes = get_field('month_event');
$dia = get_field('day_event');
$form = get_field('codigo_formulario');

$lugar_event = get_field('lugar_event');
$direccion_del_evento = get_field('direccion_del_evento');

$ubicacion = $lugar_event ."<br />". $direccion_del_evento;
$fecha_del_evento = $dia . " de " . mes_numero_a_texto($mes) . " de " . $ano;

$boton_inscribete = get_field('boton_inscribete');
$boton_conoce_programa = get_field('boton_conoce_programa');

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
                                <h1><?= $titulo ?></h1>
                                <div>
                                    <?php echo $contenido; ?>
                                </div>
                                <div>
                                    <?php echo $short_description; ?>
                                </div>
                                <?php foreach($tabs as $tab): ?>
                                    <div>
                                        <?= $tab["content-tab"] ?>
                                    </div>
                                <?php endforeach ?>
                            </div>

                            <div style="display: flex; align-items: center; justify-content: center;">

							<?php if (!empty($boton_inscribete)): ?>
								<p class="text-center py-4 m-1">
									<a href="<?= htmlspecialchars($boton_inscribete, ENT_QUOTES, 'UTF-8') ?>" class="btn btn-principal" data-wpel-link="internal" tabindex="0">
										Inscríbete
									</a>
								</p>
							<?php endif; ?>

							<?php if (!empty($boton_conoce_programa)): ?>
								<p class="text-center py-4 m-1">
									<a href="<?= htmlspecialchars($boton_conoce_programa, ENT_QUOTES, 'UTF-8') ?>" class="btn btn-principal" data-wpel-link="internal" tabindex="0">
										Conoce el programa
									</a>
								</p>
							<?php endif; ?>

						</div>


                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="educacion_eventos--contenido__columnader">
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
                        <?= do_shortcode($form) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
   

</main>

<?php
get_footer();