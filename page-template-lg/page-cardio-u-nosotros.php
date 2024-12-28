<?php
/**
 * Template Name: Plantilla Cardio U | Nosotros
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

$mostrar_banner     =  get_field('mostrar_banner_principal');
$grupo_banner       =  get_field('grupo_banner');
set_query_var('grupo_banner', $grupo_banner);

$mostrar_ofertas    =  get_field('mostrar_ofertas');
$grupo_ofertas      =  get_field('grupo_ofertas');
set_query_var('grupo_ofertas', $grupo_ofertas);

$mostrar_cursos    =  get_field('mostrar_cursos');
$grupo_cursos      =  get_field('grupo_cursos');
set_query_var('grupo_cursos', $grupo_cursos);

get_header('cardiou')
?>

<!-- CONTENIDO -->
    <main>
        
        <?php if($mostrar_banner) : ?>
            <!-- Banner carusel -->
            <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'banner') ?>
            <!-- Fin Banner carusel -->
        <?php endif; ?>

        <?php if($mostrar_ofertas) : ?>
            <!-- Banner carusel -->
            <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'titulo-items-imagen') ?>
            <!-- Fin Banner carusel -->
        <?php endif; ?>

        <?php if($mostrar_cursos) : ?>
            <!-- Banner carusel -->
            <?php get_template_part('template-parts/cardio-u/secciones/seccion', 'targetas-grandes') ?>
            <!-- Fin Banner carusel -->
        <?php endif; ?>

    </main>
<!-- FIN CONTENIDO -->

<?php get_footer('cardiou') ?>