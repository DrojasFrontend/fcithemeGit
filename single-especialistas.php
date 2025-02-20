<?php
get_header();

$doctores = get_doctores_con_servicios();

if(get_field('nombre') != "" && get_field('apellido') != ""){
    $titulo = get_field('nombre') . " " . get_field('apellido');
}else{
    $titulo = get_the_title();
}

$cargo = get_field('position_doctor');
$especialidades = get_field('specialties_doctor');
$idiomas = get_terms_formateadas(get_the_terms($post->ID, 'idiomas'));

$imagen = get_field('image_doctor');
$biografia = get_field('bio_doctor');
$areas_interes = get_field('area_doctor');
$sociedades_cientificas = get_field('sociedades_doctor');
$publicaciones = get_field('publications_repeater_doctor');
$servicios = (isset($doctores[$post->post_name])) ? formatear_servicios($doctores[$post->post_name]) : "";

?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="especialistas">
    <section class="container-fluid g-0 especialistas--contenido">
        <div class="container g-0">
            <div class="row g-0">
                <div class="col-12 col-md-8 blog-cont">
                    <div class="especialistas--contenido__cont">
                        <div class="especialistas--contenido__card">
                            <div class="especialistas--contenido__card__int">
                                <div class="especialistas--contenido__card__texto">
                                    <h1><?= $titulo ?></h1>
                                    <?php if ($cargo) { ?>
                                        <h2><?= $cargo ?></h2>
                                    <?php } ?>
                                    <div class="atributos">
                                        <?php if($especialidades != ""): ?>
                                            <p><strong>Especialidades y subespecialidades: </strong><?= $especialidades ?></p>
                                        <?php endif ?>
                                        <?php if($idiomas != ""): ?>
                                            <p><strong>Idiomas: </strong><?= $idiomas ?></p>
                                        <?php endif ?>
                                        <?php if($servicios != ""): ?>
                                            <p><strong>Servicios: </strong><?= $servicios ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="especialistas--contenido__card__imagen">
                                    <?php if ($imagen) { ?>
                                        <img src="<?= $imagen["url"] ?>" alt="<?= $imagen["alt"] ?>">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="especialistas--contenido__content especialidad_tabs">
                            <div class="especialistas--contenido__content__tabs tabs">
                                <div class="especialistas--contenido__content__tabs--cadaTab cadaTab elegido">
                                    <button>Descripción General</button>
                                </div>
                                <div class="especialistas--contenido__content__tabs--cadaTab cadaTab">
                                    <button>Publicaciones</button>
                                </div>
                            </div>
                            <div class="especialistas--contenido__content__internas contenidos">
                                <div class="especialistas--contenido__content__internas--cadaUna cadaBloq elegido">
                                    <div class="texto">
                                        <h2>Biografía</h2>
                                        <?= $biografia ?>
                                        <h2>Áreas de interés</h2>
                                        <?= $areas_interes ?>
                                        <h2>Sociedades científicas</h2>
                                        <?= $sociedades_cientificas ?>
                                    </div>
                                </div>
                                <?php if(is_array($publicaciones )): ?>
                                    <div class="especialistas--contenido__content__internas--cadaUna cadaBloq">
                                        <div class="texto">
                                            <h2>Publicaciones</h2>
                                            <ul>
                                                <?php foreach($publicaciones as $publicacion): ?>
                                                    <li><?= $publicacion["publication"] ?></li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="especialistas--contenido__columnader">
                        <h2>Deja tus datos  y te contactaremos para asignar tu cita</h2>
                        <?= do_shortcode('[contact-form-7 id="2986" title="Solicitud con médico especialista particular" html_name="Cita_con_Especialista"]') ?>                       
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();