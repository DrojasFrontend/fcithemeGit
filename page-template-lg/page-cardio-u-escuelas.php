<?php
/**
 * Template Name: Plantilla Cardio U | Escuelas
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

$mostrar_banner_texto = get_field('mostrar_banner_texto');
$grupo_banner_texto   =  get_field('grupo_banner_texto');
set_query_var('grupo_banner_texto', $grupo_banner_texto);

$mostrar_cursos = get_field('mostrar_cursos');
$grupo_cursos   =  get_field('grupo_cursos');
set_query_var('grupo_cursos', $grupo_cursos);

$mostrar_titulo_items = get_field('mostrar_titulo_items');
$grupo_titulo_items   =  get_field('grupo_titulo_items');
set_query_var('grupo_titulo_items', $grupo_titulo_items);

$mostrar_titulo_cta_imagen_2 = get_field('mostrar_titulo_cta_imagen_2');
$grupo_titulo_cta_imagen_2   =  get_field('grupo_titulo_cta_imagen_2');
set_query_var('grupo_titulo_cta_imagen_2', $grupo_titulo_cta_imagen_2);

?>
<!-- CONTENIDO -->
    <main>
        <?php if($mostrar_banner_texto) : ?>
            <!-- Banner texto -->
        <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'banner-texto') ?>
            <!-- Fin Banner texto -->
        <?php endif; ?>

        <?php if($mostrar_cursos) : ?>
            <!-- Cursos grid -->
        <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'cursos-grid') ?>
            <!-- Fin Cursos grid -->
        <?php endif; ?>

        <?php if($mostrar_titulo_items) : ?>
            <!-- Titulo items -->
        <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'titulo-items') ?>
            <!-- Fin Titulo items -->
        <?php endif; ?>

        <?php if($mostrar_titulo_cta_imagen_2) : ?>
            <!-- Titulo cta imagen 2 -->
        <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'titulo-cta-imagen-2') ?>
            <!-- Fin Titulo cta imagen 2 -->
        <?php endif; ?>

    </main>
<!-- FIN CONTENIDO -->

<?php get_footer('cardiou') ?>