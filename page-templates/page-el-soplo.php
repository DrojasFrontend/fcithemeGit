<?php 
/*
    Template Name: El Soplo
*/


global $paged;
$curpage = $paged ? $paged : 1;
$args = array(
    'post_type' => 'revista_el_soplo',
    'orderby' => 'post_date',
    'posts_per_page' => -1,
    // 'paged' => $paged
);
$entrada_index = 0;
$publicaciones = array();
$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
    $imagen = get_the_post_thumbnail_url($post->ID, array(700, 460));
    $id_publicacion = $post->ID;
    $pdf = get_field('pdf', $id_publicacion);
    $publicaciones[$id_publicacion] = array(
        "titulo" => $post->post_title,
        "descripcion" => get_the_excerpt($id_publicacion),
        "imagen" => $imagen,
        "pdf" => $pdf,
    );
    $entrada_index++;
    endwhile;
    wp_reset_postdata();
endif;


get_header();

?>
<?= get_template_part('template-parts/content'); ?>
<main class="educacion_eventos">
    <section class="container-fluid g-0 educacion_eventos--contenido">
        <div class="container g-0">
            <div class="row g-0">
                <div class="col-12 col-lg-8 blog-cont">
                    <div class="educacion_eventos--contenido__cont">
                        <div class="educacion_eventos--contenido__total">
                            <h1><?= get_the_title() ?></h1>
                            <div class="slider_2">
                                <div class="wp-block-column">
                                    <?php foreach($publicaciones as $idSlide => $cadaSlide): ?>
                                        <div class="revistaIndv">
                                            <div class="revistaIndv__int">
                                                <div class="revistaIndv__imagen">
                                                    <img src="<?= $cadaSlide["imagen"] ?>" alt="<?= $cadaSlide["titulo"] ?>">
                                                </div>
                                                <div class="revistaIndv__content">
                                                    <div class="revistaIndv__content__int">
                                                        <h2><?= $cadaSlide["titulo"] ?></h2>
                                                        <p><?= $cadaSlide["descripcion"] ?></p>
                                                        <p><button data-id="<?= $idSlide ?>" class="btn btn_descargar">Descargar</button></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
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
                        <?php the_content(); ?>
                        <?= do_shortcode('[contact-form-7 id="1146" title="Formulario - El Soplo"]') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();