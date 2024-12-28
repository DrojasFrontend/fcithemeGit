<?php
/**
 * Template Name: Plantilla Cardio U | Inicio
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

$mostrar_banner_principal = get_field('mostrar_banner_principal');
$grupo_banner_pricipal   =  get_field('grupo_banner_pricipal');
set_query_var('grupo_banner_pricipal', $grupo_banner_pricipal);

$mostrar_ofertas = get_field('mostrar_ofertas');
$grupo_ofertas   =  get_field('grupo_ofertas');
set_query_var('grupo_ofertas', $grupo_ofertas);

$mostrar_cursos = get_field('mostrar_cursos');
$grupo_cursos   =  get_field('grupo_cursos');
set_query_var('grupo_cursos', $grupo_cursos);

$mostrar_imagen_titulo_cta = get_field('mostrar_imagen_titulo_cta');
$grupo_imagen_titulo_cta   =  get_field('grupo_imagen_titulo_cta');
set_query_var('grupo_imagen_titulo_cta', $grupo_imagen_titulo_cta);

$mostrar_titulo_cta_imagen = get_field('mostrar_titulo_cta_imagen');
$grupo_titulo_cta_imagen   =  get_field('grupo_titulo_cta_imagen');
set_query_var('grupo_titulo_cta_imagen', $grupo_titulo_cta_imagen);

$mostrar_testimonios = get_field('mostrar_testimonios');
$grupo_testimonios   =  get_field('grupo_testimonios');
set_query_var('grupo_testimonios', $grupo_testimonios);

$mostrar_preguntas = get_field('mostrar_preguntas');
$grupo_preguntas   =  get_field('grupo_preguntas');
set_query_var('grupo_preguntas', $grupo_preguntas);
?>
<!-- CONTENIDO -->
    <main>

        <?php if($mostrar_banner_principal) : ?>
            <!-- Banner carusel -->
            <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'banner-carusel') ?>
            <!-- Fin Banner carusel -->
        <?php endif; ?>
        <?php if($mostrar_ofertas) : ?>
            <!-- Ofertas -->
            <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'ofertas') ?>
            <!-- Fin Ofertas -->
        <?php endif; ?>
        <?php if($mostrar_cursos) : ?>
            <!-- Cursos -->
            <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'cursos') ?>
            <!-- Fin Cursos -->
        <?php endif; ?>
        <?php if($mostrar_imagen_titulo_cta) : ?>
            <!-- Imagen titulo cta -->
            <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'imagen-titulo-cta') ?>
            <!-- Fin Imagen titulo cta -->
        <?php endif; ?>
        <?php if($mostrar_titulo_cta_imagen) : ?>
            <!--Titulo cta imagen -->
            <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'titulo-cta-imagen') ?>
            <!-- Fin Titulo cta imagen -->
        <?php endif; ?>
        <?php if($mostrar_testimonios) : ?>
            <!-- Testimonios -->
            <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'testimonios') ?>
            <!-- Fin Testimonios -->
        <?php endif; ?>
        <?php if($mostrar_preguntas) : ?>
            <!-- Preguntas frecuentes -->
            <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'faqs') ?>
            <!-- Fin Preguntas frecuentes -->
        <?php endif; ?>

        <!-- CTAS -->
        <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'cta') ?>
        <!-- CTAS -->

    </main>
<!-- FIN CONTENIDO -->

<?php get_footer('cardiou') ?>