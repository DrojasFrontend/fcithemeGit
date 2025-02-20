<?php
/**
 * Template Name: Plantilla Cardio U | Cursos
 * 
 * @package FCITheme
 * @subpackage Legger_Templates
 * @version 1.0
 * @author Legger
 * @link https://legger.com
 * 
 * This template is part of the custom development by Legger.
 * Template for the Revascularizacion page.
 */


// Asegúrate de que no se acceda directamente a este archivo
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('cardiou'); 
$sitename                   = esc_html(get_bloginfo('name'));
$imagen_curso               = get_field('imagen_curso_interna');
$horas                      = get_field('horas');
$modalidad                  = get_field('modalidad');
$tipo_oferta                = get_field('tipo_oferta');
$audiencia                  = get_field('audiencia');
$duracion                   = get_field('duracion');
$certificacion              = get_field('certificacion');
$boton_inscripcion          = get_field('boton_inscripcion');
$precio                     = get_field('precio');
$docentes                   = get_field('docentes');

$fecha_inicio                   = get_field('fecha_inicio');

$grupo_informcion_adicional = get_field('grupo_informcion_adicional');
$descripcion_corta          = $grupo_informcion_adicional['descripcion_corta'];
$descripcion_full           = $grupo_informcion_adicional['descripcion_full'];
$resumen                    = $grupo_informcion_adicional['resumen'];
$faqs                       = $grupo_informcion_adicional['preguntas_frecuentes'];
$logos                       = $grupo_informcion_adicional['logos_de_apoyo'];

$imagen_id                  = !empty($imagen_curso['ID']) ? $imagen_curso['ID'] : '';

$faqs                       = !empty($grupo_informcion_adicional['preguntas_frecuentes']) ? $grupo_informcion_adicional['preguntas_frecuentes'] : [];

$fondo                      = !empty($grupo_informcion_adicional['fondo']) ? esc_html($grupo_informcion_adicional['fondo']) : '';
$titulo                     = !empty($grupo_informcion_adicional['titulo']) ? esc_html($grupo_informcion_adicional['titulo']) : '';
$detalle                    = !empty($grupo_informcion_adicional['detalle']) ? esc_html($grupo_informcion_adicional['detalle']) : '';
$enlace                     = !empty($grupo_informcion_adicional['enlace']) ? $grupo_informcion_adicional['enlace'] : '';
$imagen_id_targeta          = !empty($grupo_informcion_adicional["imagen"]['ID']) ? $grupo_informcion_adicional["imagen"]['ID'] : '';

$cta_financiar              = !empty($grupo_informcion_adicional['financiar']) ? $grupo_informcion_adicional['financiar'] : '';
$titulo_financiar           = !empty($grupo_informcion_adicional['titulo_financiar']) ? $grupo_informcion_adicional['titulo_financiar'] : '';
$descripcion_financiar      = !empty($grupo_informcion_adicional['descripcion_financiar']) ? $grupo_informcion_adicional['descripcion_financiar'] : '';
$fondo_financiar            = !empty($grupo_informcion_adicional['fondo_financiar']) ? $grupo_informcion_adicional['fondo_financiar'] : '';
$imagen_financiar           = !empty($grupo_informcion_adicional['imagen_financiar']) ? $grupo_informcion_adicional['imagen_financiar'] : '';

$cursosIDPagina      = get_page_by_path('cardio-u')->ID;
$grupo_cursos        = ($cursosIDPagina) ? get_field('grupo_cursos', $cursosIDPagina) : null;
set_query_var('grupo_cursos', $grupo_cursos);

?>

<!-- CONTENIDO -->
    <main>
        <div class="seccionCardioUInternaCurso">
            <div class="wrapper">
                <div class="seccionCardioUInternaCurso__grid">
                    <div class="seccionCardioUInternaCurso__info">
                        <!-- Titulo -->
                        <section class="seccionCardioUInternaCurso__titulo">
                            <h1 class="heading--48 color--002D72"><?php the_title();?></h1>
                            <?php if($descripcion_corta) : ?>
                            <p class="heading--18 color--263956"><?php echo $descripcion_corta; ?></p>
                            <?php endif; ?>
                        </section>
                
                        <!-- Imagen e info -->
                        <section class="seccionCardioUInternaCurso__img">
                            <?php if($imagen_id) : ?>
                                <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
                            <?php else : ?>
                                    <img src="https://via.placeholder.com/372x532" alt="Imagen">
                            <?php endif; ?>
                            <div class="seccionCardioUInternaCurso__img-info">
                                <?php if($horas) : ?>
                                <div class="informacion">
                                    <span class="icono">
                                        <?php 
                                            get_template_part('template-parts/content', 'icono');
                                            display_icon('ico-calendario'); 
                                        ?>
                                    </span>
                                    <div>
                                        <p class="heading--14 color--677283">Horas certificables:</p>
                                        <p class="heading--15 color--677283"><?php echo $horas;?></p>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if($modalidad) : ?>
                                <div class="informacion">
                                    <span class="icono">
                                        <?php 
                                            get_template_part('template-parts/content', 'icono');
                                            display_icon('ico-libro'); 
                                        ?>
                                    </span>
                                    <div>
                                        <p class="heading--14 color--677283">Modalidad:</p>
                                        <p class="heading--15 color--677283"><?php echo $modalidad;?></p>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if($tipo_oferta) : ?>
                                <div class="informacion">
                                    <span class="icono">
                                        <?php 
                                            get_template_part('template-parts/content', 'icono');
                                            display_icon('ico-check'); 
                                        ?>
                                    </span>
                                    <div>
                                        <p class="heading--14 color--677283">Tipo:</p>
                                        <p class="heading--15 color--677283"><?php echo $tipo_oferta;?></p>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </section>
                
                        <?php if($descripcion_full) : ?>
                        <!-- Detalle descripcion -->
                        <section class="seccionCardioUInternaCurso__detalle">
                            <h2 class="heading--36 color--002D72">Descripción</h2>
                            <p class="heading--18 color--263956">
                                <?php echo $descripcion_full; ?>
                            </p>
                        </section>
                        <?php endif; ?>
                
                        <?php if($resumen) : ?>
                        <!-- ¿Qué aprenderás en la CardioU -->
                        <section class="seccionCardioUInternaCurso__detalle">
                            <h2 class="heading--36 color--002D72">¿Qué aprenderás en la CardioU?</h2>
                            <div class="heading--18 color--263956">
                                <?php echo $resumen; ?>
                            </div>
                        </section>
                        <?php endif; ?>
                
                        <?php if($audiencia) : ?>
                        <!-- ¿A quién va dirigido el curso? -->
                        <section class="seccionCardioUInternaCurso__detalle">
                            <h2 class="heading--36 color--002D72">¿A quién va dirigido el curso?</h2>
                            <p class="heading--18 color--263956">
                                <?php echo $audiencia; ?>
                            </p>
                        </section>
                        <?php endif; ?>
						
                        <?php if ($logos) : ?>
							<section class="seccionCardioUInternaCurso__detalle">
								<h2 class="heading--36 color--002D72">Con el apoyo de:</h2>
								<div class="heading--18 color--263956">
									<div class="logos-apoyo">
										<?php foreach ($logos as $logo) : ?>
											<div class="logo-item">
												<img src="<?php echo esc_url($logo['imagen']['url']); ?>" alt="<?php echo esc_attr($logo['imagen']['alt']); ?>">
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</section>
						<?php endif; ?>

                        <section class="seccionCardioUInternaCurso__financiar">
                            <?php if($fondo_financiar) { ?>
                            <img class="seccionCardioUInternaCurso__financiar-banner" class="" src="<?php echo $fondo_financiar; ?>" alt="">
                            <?php } ?>
                            <div class="seccionCardioUInternaCurso__financiar-grid">
                                <div class="seccionCardioUInternaCurso__financiar-titulo">
                                    <?php if($titulo_financiar) { ?>
                                    <h2 class="heading--24 color--002D72"><?php echo $titulo_financiar; ?></h2>
                                    <?php } ?>
                                    <?php if($descripcion_financiar) { ?>
                                    <p class="heading--18 color--0C2448"><?php echo $descripcion_financiar; ?></p>
                                    <?php } ?>

                                    <?php if($cta_financiar) { ?>
                                    <a href="<?php echo $cta_financiar['url']; ?>" class="boton-v2 boton-v2--blanco-rojo">
                                        Financiar curso
                                        <?php 
                                            get_template_part('template-parts/content', 'icono');
                                            display_icon('icono-arrow-next-rojo'); 
                                        ?>
                                    </a>
                                    <?php } ?>
                                </div>
                                <?php if($imagen_financiar) { ?>
                                <img src="<?php echo $imagen_financiar; ?>" alt="">
                                <?php } ?>
                            </div>
                        </section>
                
                        <?php if($faqs) : ?>
                        <!-- Preguntas frecuentes -->
                        <section class="seccionCardioUInternaCurso__detalle">
                            <h2 class="heading--36 color--002D72">Preguntas frecuentes</h2>
                            <div class="">
                                <?php foreach ($faqs as $key => $pregunta) { $key++?>
                                    <div class="seccionCardioUPreguntasAccordion__item">
                                        <span class="heading--14 color--002D72">0<?php echo $key; ?></span>
                                        <button type="button" aria-label="<?php echo $pregunta['pregunta']?>" class="seccionCardioUPreguntasAccordion__title <?php echo $key == 1 ? 'active' : '' ?>">
                                            <h3 class="heading--24 color--002D72"><?php echo $pregunta['pregunta']?></h3>
                                            <?php 
                                                get_template_part('template-parts/content', 'icono');
                                                display_icon('arrow-down'); 
                                            ?>
                                        </button>
                                        <div class="seccionCardioUPreguntasAccordion__tab" <?php echo $key == 1 ? 'style="display:block;"' : '' ?>>
                                            <p class="heading--18 color--263956"><?php echo $pregunta['respuesta']?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </section>
                        <?php endif; ?>
                    </div>
                    <!-- Caja flotante -->
                    <div class="seccionCardioUInterna__flotante" id="seccionCardioUInterna__flotante">
                        <div class="seccionCardioUInterna__flotante-info">
                            <h2 class="heading--18 color--002D72"><?php the_title(); ?></h2>
                            <div>
                                <p class="info heading--14 color--677283">
                                    <span>
                                        <?php 
                                            get_template_part('template-parts/content', 'icono');
                                            display_icon('ico-calendario'); 
                                        ?>
                                    </span>
                                    <strong>Duración:</strong> 
                                    <?php echo $duracion; ?>
                                </p>
                                <p class="info heading--14 color--677283">
                                    <span>
                                        <?php 
                                            get_template_part('template-parts/content', 'icono');
                                            display_icon('ico-libro'); 
                                        ?>
                                    </span>
                                    <strong>Modalidad:</strong> 
                                    <?php echo $modalidad; ?>
                                </p>
                                <p class="info heading--14 color--677283">
                                    <span>
                                        <?php 
                                            get_template_part('template-parts/content', 'icono');
                                            display_icon('ico-check'); 
                                        ?>
                                    </span>
                                    <strong>Tipo:</strong> 
                                    <?php echo $tipo_oferta; ?>
                                </p>
                                <p class="info heading--14 color--677283">
                                    <span>
                                        <?php 
                                            get_template_part('template-parts/content', 'icono');
                                            display_icon('ico-reloj-2'); 
                                        ?>
                                    </span>
                                    <strong>Horas certificables:</strong> 
                                    <?php echo $horas; ?>
                                </p>
								
								<p class="info heading--14 color--677283">
                                    <?php echo $certificacion; ?>
                                </p>
								
								
                                <?php if (!empty($fecha_inicio)): ?>
                                    <p class="info heading--14 color--677283">
                                        <span>
                                            <?php 
                                                get_template_part('template-pparts/content', 'icono');
                                                display_icon('ico-calendario'); 
                                            ?>
                                        </span>
                                        <strong>Fecha de inicio:</strong> 
                                        <?php echo $fecha_inicio; ?>
                                    </p>
                                <?php endif; ?>
    
                            </div>
                            <div class="seccionCardioUInterna__flotante-precio">
                                <?php if($precio !== '$' || $precio == '#') : ?>
                                    <h3 class="heading--14 color--677283">Precio inscripción:</h3>
                                    <?php if ($precio) { ?>
                                        <h4 class="heading--30 color--002D72"><?php echo $precio; ?></h4>
                                    <?php } ?>
                                <?php endif; ?>
                                <!-- Si no hay precio envia al formulario de inscripcion -->
                                 <?php if($boton_inscripcion['url'] == '#') : ?>
                                        <button class="open-modal-form boton-v2 boton-v2--rojo-rojo" id="open-modal-form" type="button" aria-label="abrir modal">
                                            <?php echo $boton_inscripcion['title']; ?>
                                        </button>
                                    <?php else: ?>
                                        <a class="boton-v2 boton-v2--rojo-rojo" href="<?php echo $boton_inscripcion['url']; ?>" title="<?php echo $boton_inscripcion['title']; ?>" target="<?php echo $boton_inscripcion['target']; ?>">
                                            <?php echo $boton_inscripcion['title']; ?>
                                        </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="wompi">
                            <p class="heading--18 color--002D72">
                                Con <img src="/wp-content/uploads/2025/01/wompi.png" alt=""> financia tu curso y recibe aprobación inmediata. 
                            </p> 
                            <?php if($cta_financiar) { ?>
                            <a href="<?php echo $cta_financiar['url']; ?>" class="boton-v2 boton-v2--blanco-rojo">
                                Financiar curso
                                <?php 
                                    get_template_part('template-parts/content', 'icono');
                                    display_icon('icono-arrow-next-rojo'); 
                                ?>
                            </a>
                            <?php } ?>
                        </div>
                        <a href="/cardio-u/" class="conoce heading--18 color--002D72">
                            <img src="/wp-content/uploads/2025/01/icono-info.png" alt="">
                            <span class="color--E40046">
                                Conoce más
                            </span>
                            sobre como inscribirte a este curso
                        </a>
                    </div>
                </div>
            </div>
            
            <?php if($docentes) :?>
            <!-- Docentes -->
            <section class="seccionCardioUInterna__docente">
                <div class="seccionCardioUInterna__docente-fondo">
                    <div class="wrapper">
                        <div class="seccionCardioUInterna__docente-titulo">
                            <h2 class="heading--36 color--002D72">¿Con quién aprenderás?</h2>
                        </div>  
                    </div>
                    <div class="seccionCardioUInterna__docente-wrapper">
                        <div class="slickCardioUInternaDocente slickPersonalizado">
                            <?php foreach ($docentes as $key => $docente) { 
                                $doc_nombre      = !empty($docente['nombre']) ? esc_html($docente['nombre']) : '';
                                $doc_profesion   = !empty($docente['profesion']) ? esc_html($docente['profesion']) : '';
                                $doc_sector      = !empty($docente['sector']) ? $docente['sector'] : '';
                                $doc_imagen_id   = !empty($docente["foto_docente"]['ID']) ? $docente["foto_docente"]['ID'] : '';
                                
                            ?>
                                <div class="seccionCardioUInterna__item">
                                    <div class="seccionCardioUInterna__item-img">
                                    <?php if($imagen_id) : ?>
                                        <?php 
                                            echo generar_imagen_responsive($doc_imagen_id, 'custom-size', $sitename, '');
                                        ?>
                                    <?php else : ?>
                                        <img src="https://via.placeholder.com/372x532" alt="Imagen">
                                    <?php endif; ?>
                                    </div>
                                    <div class="seccionCardioUInterna__item-info">
                                        <h3 class="nombre heading--24 color--002D72"><?php echo $doc_nombre; ?></h3>
                                        <p class="profesion heading--18 color--002D72"><?php echo $doc_profesion; ?></p>
                                        <p class="sector heading--18 color--677283"><?php echo $doc_sector; ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <?php if($titulo) : ?>
            <!-- Targeta -->
            <section class="seccionCardioUTituloCtaImg">
                <div class="seccionCardioUTituloCtaImg__grid">
                    <div class="seccionCardioUTituloCtaImg__fondo" style="background-color: <?php echo $fondo; ?>">
                        <div class="seccionCardioUTituloCtaImg__info">
                            <?php if($titulo) : ?>
                            <h2 class="heading--48 color--fff">
                                <?php echo $titulo; ?>
                            </h2>
                            <?php endif; ?>
                
                            <?php if($detalle) : ?>
                            <p class="heading--18 color--fff">
                                <?php echo $detalle; ?>
                            </p>
                            <?php endif; ?>

                            <div class="seccionCardioUTituloCtaImg__fecha">
                                <span>
                                    <?php 
                                        get_template_part('template-parts/content', 'icono');
                                        display_icon('ico-calendario-corazon'); 
                                    ?>
                                </span>
                                <div>
                                    <p class="heading--14 color--fff">Fecha de inicio del curso:</p>
                                    <p class="heading--18 color--fff"><?php echo $modalidad; ?></p>
                                </div>
                            </div>

                            <?php if($enlace) : ?>
                            <a class="boton-v2 boton-v2--blanco" href="<?php echo esc_url($enlace['url']); ?>" target="<?php echo $enlace['target']; ?>" title="<?php echo $enlace['title']; ?> - Más información">
                                <?php echo $enlace['title']; ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="seccionCardioUTituloCtaImg__imagen">
                        <?php if($imagen_id_targeta) : ?>
                            <?php 
                                echo generar_imagen_responsive($imagen_id_targeta, 'custom-size', $sitename, '');
                            ?>
                        <?php else : ?>
                            <img src="https://via.placeholder.com/372x532" alt="Imagen">
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <?php if($grupo_cursos) : ?>
            <!-- Cursos -->
             <section>
                <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'cursos') ?>
             </section>
             <?php endif; ?>
        </div>

        <!-- Modal -->
        <section class="seccionCardioUFormularioContacto__modal">
            <button type="button" class="seccionCardioUFormularioContacto__close" id="close-modal-form" type="button" aria-label="cerrar modal">
                <?php 
                    get_template_part('template-parts/content', 'icono');
                    display_icon('ico-close'); 
                ?>
            </button>
            <div class="seccionCardioUFormularioContacto">
                <div class="wrapper">
                    <div class="seccionCardioUFormularioContacto__contenido">
                        <div class="seccionCardioUFormularioContacto__titulo">
                            <h2 class="heading--64 color--002D72">Tu experiencia comienza ahora</h2>
                            <p class="heading--18 color--263956">Ingresa tus datos a continuación y al correo electrónico, te enviaremos toda la información para realizar el pago.</p>
                        </div>
                        <div class="seccionCardioUFormularioContacto__grid">
                            <div class="seccionCardioUFormularioContacto__form">
                                <?php echo do_shortcode('[contact-form-7 id="913028f" title="Cardio U - informacion cursos"]'); ?>
                            </div>
                            <div class="seccionCardioUFormularioContacto__img">
                                <!-- Caja flotante -->
                                <div class="seccionCardioUInterna__flotante" id="seccionCardioUInterna__flotante">
                                    <h3 class="heading--18 color--002D72"><?php the_title(); ?></h3>
                                    <div>
                                        <p class="info heading--14 color--677283">
                                            <span>
                                                <?php 
                                                    get_template_part('template-parts/content', 'icono');
                                                    display_icon('ico-calendario'); 
                                                ?>
                                            </span>
                                            <strong>Duración:</strong> 
                                            <?php echo $duracion; ?>
                                        </p>
                                        <p class="info heading--14 color--677283">
                                            <span>
                                                <?php 
                                                    get_template_part('template-parts/content', 'icono');
                                                    display_icon('ico-libro'); 
                                                ?>
                                            </span>
                                            <strong>Modalidad:</strong> 
                                            <?php echo $modalidad; ?>
                                        </p>
                                        <p class="info heading--14 color--677283">
                                            <span>
                                                <?php 
                                                    get_template_part('template-parts/content', 'icono');
                                                    display_icon('ico-check'); 
                                                ?>
                                            </span>
                                            <strong>Tipo:</strong> 
                                            <?php echo $tipo_oferta; ?>
                                        </p>
                                        <p class="info heading--14 color--677283">
                                            <span>
                                                <?php 
                                                    get_template_part('template-parts/content', 'icono');
                                                    display_icon('ico-reloj-2'); 
                                                ?>
                                            </span>
                                            <strong>Horas certificables:</strong> 
                                            <?php echo $horas; ?>
                                        </p>
                                    </div>
                                    <div class="seccionCardioUInterna__flotante-precio">
                                    <?php if($precio !== '$' || $precio == '#') : ?>
                                        <p class="heading--14 color--677283">Precio inscripción:</p>
                                        <?php if ($precio) { ?>
                                            <h4 class="heading--36 color--002D72"><?php echo $precio; ?></h4>
                                        <?php } ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Fin Modal -->
    </main>
<!-- FIN CONTENIDO -->

<?php get_footer('cardiou');?>