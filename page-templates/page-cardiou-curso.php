<?php 
/*
    Template Name: CardioU - Curso
*/
$titulo = get_the_title();
$descripcion = get_the_content();
$foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
get_header();

/* ACF Variables */
$imgcurso = get_field('imagen_curso');
$nombrecurso = get_field('nombre_curso');
$precio = get_field('precio');
$ctainscripcion = get_field('boton_inscripcion');
$modalidad = get_field('modalidad');
$lugar = get_field('lugar');
$tipo_oferta = get_field('tipo_oferta');
$audiencia = get_field('audiencia');
$horas = get_field('horas');
$duracion = get_field('duracion');
$cupoestudiantes = get_field('cupo_estudiantes');
$certificacion = get_field('certificacion');
$descuentos = get_field('descuentos');
$descripcion = get_field('descripcion');
$docentes = get_field('docentes');
$descarga = get_field('enlace_descarga');

?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="cardiou-curso--container">

    <section class="info-curso">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 order-2 order-md-1">
                    <div class="img-curso">
                        <img src="<?= $imgcurso["url"] ?>" alt="<?= $imgcurso["alt"] ?>" class="img-fluid">
                    </div>
                </div>
                <div class="col-12 col-md-6 order-1 order-md-2">
                    <div class="curso-intro">
                        <h2><?= $nombrecurso ?></h2>
                    </div>
                    <div class="curso-info">
                        <div class="content-item">
                            <h5> Modalidad:</h5>
                            <p><?= $modalidad ?></p>
                        </div>
                        <div class="content-item">
                            <h5> Lugar de práctica:</h5>
                            <p><?= $lugar ?></p>
                        </div>
                        <div class="content-item">
                            <h5> Tipo de Oferta:</h5>
                            <p><?= $tipo_oferta ?></p>
                        </div>
                        <div class="content-item">
                            <h5>Audiencia:</h5>
                            <p><?= $audiencia ?></p>
                        </div>
                        <div class="content-item">
                            <h5>Horas certificables:</h5>
                            <p><?= $horas ?></p>
                        </div>
                        <div class="content-item">
                            <h5>Duración:</h5>
                            <p><?= $duracion ?></p>
                        </div>
                        <div class="content-item">
                            <h5>Cupo de estudiantes por grupo:</h5>
                            <p><?= $cupoestudiantes ?></p>
                        </div>
                        <div class="content-item">
                            <h5>Certificación:</h5>
                            <p><?= $certificacion ?></p>
                        </div>
                        <div class="content-item">
                            <h5>Precio:</h5>
                            <p><b><?= $precio ?></b></p>
                        </div>
                        <div class="curso-cta text-center">
                            <a href="<?= $ctainscripcion["url"] ?>" target="<?= $ctainscripcion["target"] ?>" class="btn"><?= $ctainscripcion["title"] ?></a>
                        </div>

                    </div>
                    
                </div>

            </div>
        </div>
        
        <!--
        <div class="container">
            <div class="row">
                <div class="col-12 cursos-descuentos">
                        <?= $descuentos ?>
                </div>
            </div>
        </div>
        --->

    </section>

    <section class="curso-descripcion">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <!-- <?= $descripcion ?> -->

                   <?php the_content() ?>
                </div>
                
            </div>
        </div>
    </section>


    
    <section class="docentes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="carruselDocentes" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carruselDocentes" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carruselDocentes" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row justify-content-center">
                                    <?php $counter = 0; ?>
                                    <?php foreach ($docentes as $docente): ?>
                                        <?php if ($counter < 4): ?>
                                            <div class="col-12 col-md-3">
                                                <div class="docente-card">
                                                    <div class="img-docente">
                                                        <img src="<?= $docente["foto_docente"]["url"] ?>" alt="<?= $docente["foto_docente"]["alt"] ?>" class="img-fluid">
                                                    </div>
                                                    <div class="info-docente">
                                                        <h4><?= $docente["nombre"] ?></h4>
                                                        <h5 class="profesion_txt"><?= $docente["profesion"] ?></h5>
                                                        <hr>
                                                        <?php if ($docente["egresado"]): ?>
                                                            <h5>Egresado</h5>
                                                            <p><?= $docente["egresado"] ?></p>
                                                        <?php endif; ?>
                                                        <?php if ($docente["especialista"]): ?>
                                                            <h5>Especialista</h5>
                                                            <p><?= $docente["especialista"] ?></p>
                                                        <?php endif; ?>
                                                        <?php if ($docente["experiencia"]): ?>
                                                            <h5>Experiencia</h5>
                                                            <p><?= $docente["experiencia"] ?></p>
                                                        <?php endif; ?>
                                                        <?php if ($docente["sector"]): ?>
                                                            <h5>Experiencia en sector</h5>
                                                            <p><?= $docente["sector"] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php $counter++ ?>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row justify-content-center">
                                    <?php $counter = 0; ?>
                                    <?php foreach ($docentes as $docente): ?>
                                        <?php if ($counter > 4): ?>
                                            <div class="col-12 col-md-3">
                                                <div class="docente-card">
                                                    <div class="img-docente">
                                                        <img src="<?= $docente["foto_docente"]["url"] ?>" alt="<?= $docente["foto_docente"]["alt"] ?>" class="img-fluid">
                                                    </div>
                                                    <div class="info-docente">
                                                        <h4><?= $docente["nombre"] ?></h4>
                                                        <h5 class="profesion_txt"><?= $docente["profesion"] ?></h5>
                                                        <hr>
                                                        <?php if ($docente["egresado"]): ?>
                                                            <h5>Egresado</h5>
                                                            <p><?= $docente["egresado"] ?></p>
                                                        <?php endif; ?>
                                                        <?php if ($docente["especialista"]): ?>
                                                            <h5>Especialista</h5>
                                                            <p><?= $docente["especialista"] ?></p>
                                                        <?php endif; ?>
                                                        <?php if ($docente["experiencia"]): ?>
                                                            <h5>Experiencia</h5>
                                                            <p><?= $docente["experiencia"] ?></p>
                                                        <?php endif; ?>
                                                        <?php if ($docente["sector"]): ?>
                                                            <h5>Experiencia en sector</h5>
                                                            <p><?= $docente["sector"] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php $counter++ ?>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carruselDocentes" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carruselDocentes" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    


    <section class="descarga">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center">
                    <h2>Cronograma y plan de estudios</h2>
                    <a href="<?= $descarga["url"] ?>" target="<?= $descarga["target"] ?>" class="btn"><?= $descarga["title"] ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="formulario mt-5 mb-5" >
    <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-10" style="border-radius: 25px;border: 1px solid #D9D9D9;padding: 1.5rem; margin:0 auto;">
                    <h2 style="color: #00266e;font-weight: bold;font-size: 1.7rem;margin-bottom: 1rem; text-align: center;">Solicita más información</h2>
                    <?php echo do_shortcode('[contact-form-7 id="913028f" title="Cardio U - informacion cursos"]'); ?>
                    </div>
                </div>            
            </div>
    </div>
    </section>

    <!--
    <section class="canales-contacto">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Canales de contacto</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="contacto">
                            <div class="icono">
                                <svg width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.6666 27.4167L39.95 45.629C44.1279 48.7623 49.8721 48.7623 54.05 45.629L78.3333 27.4165" stroke="#002D72" stroke-width="7.83333" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M74.4166 19.5835H19.5833C15.2571 19.5835 11.75 23.0906 11.75 27.4168V66.5835C11.75 70.9097 15.2571 74.4168 19.5833 74.4168H74.4166C78.7429 74.4168 82.25 70.9097 82.25 66.5835V27.4168C82.25 23.0906 78.7429 19.5835 74.4166 19.5835Z" stroke="#002D72" stroke-width="7.83333" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <div class="canal">
                                <a href="mailto:campusvirtual@lacardio.org" target="_blank">campusvirtual@lacardio.org</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="contacto">
                            <div class="icono">
                                <svg width="66" height="64" viewBox="0 0 66 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2855_62)">
                                    <path d="M6.53587 1.47314H60.025C62.9759 1.47314 65.3917 3.83993 65.3917 6.84135V41.595C65.3917 44.5964 62.9759 47.1437 60.025 47.1437H39.1852V56.1508H54.3921C56.6275 56.1508 56.8079 63.6122 57.0769 63.8829H9.58127C9.58127 63.8829 9.58127 56.1508 12.266 56.1508H27.473V47.1437H6.54159C3.59064 47.1437 1.26366 44.5964 1.26366 41.595V6.84135C1.26366 3.83993 3.59064 1.47314 6.54159 1.47314H6.53587ZM6.53587 41.595H60.025V6.84135H6.53587V41.595Z" fill="#002D72"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_2855_62">
                                    <rect width="64.4571" height="63.1143" fill="white" transform="translate(0.799988 0.771484)"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="canal">
                                <p>
                                    Campus Virtual: <br>
                                    <a href="https://lacardio.elmg.net/" target="_blank">lacardio.elmg.net</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="contacto">
                            <div class="icono">
                                <svg width="75" height="74" viewBox="0 0 75 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.0321 16.9825C10.0321 43.3261 31.3879 64.6819 57.7315 64.6819C58.92 64.6819 60.0984 64.6385 61.2653 64.553C62.6043 64.4548 63.2736 64.4059 63.8832 64.0551C64.3879 63.7646 64.8664 63.2494 65.1194 62.7247C65.425 62.0914 65.425 61.3525 65.425 59.875V51.2051C65.425 49.9625 65.425 49.3412 65.2203 48.8088C65.04 48.3383 64.7464 47.9194 64.3661 47.5889C63.9355 47.2147 63.3515 47.0024 62.1839 46.5777L52.3153 42.9892C50.9567 42.4952 50.2772 42.2481 49.6328 42.29C49.0644 42.3269 48.5176 42.5211 48.0529 42.8504C47.526 43.2236 47.1543 43.8434 46.4105 45.0833L43.8833 49.295C35.7286 45.6018 29.1177 38.9824 25.419 30.8307L29.6308 28.3036C30.8705 27.5599 31.4903 27.188 31.8637 26.6611C32.193 26.1964 32.3872 25.6496 32.4241 25.0813C32.4659 24.4368 32.2188 23.7575 31.7249 22.3989L28.1363 12.5302C27.7117 11.3625 27.4994 10.7786 27.1252 10.348C26.7947 9.96759 26.3758 9.6742 25.9053 9.49355C25.3728 9.28906 24.7515 9.28906 23.509 9.28906H14.839C13.3615 9.28906 12.6227 9.28906 11.9893 9.59449C11.4647 9.84748 10.9496 10.3262 10.659 10.8309C10.3081 11.4404 10.2591 12.1099 10.161 13.4489C10.0756 14.6156 10.0321 15.794 10.0321 16.9825Z" stroke="#002D72" stroke-width="6.15476" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="canal">
                                <a href="http://wa.me/+573176682013" target="_blank">317 668 2013</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --->
</main>
<?php  get_footer(); ?>