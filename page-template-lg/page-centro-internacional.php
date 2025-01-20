<?php
/**
 * Template Name: Plantilla Centro Internacional
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

get_header(); 

?>

<!-- CONTENIDO -->
    <main class="paginaCentroInternacional">
        <?php get_template_part('template-parts/centro-internacional/seccion', 'hero'); ?>
        <?php get_template_part('template-parts/centro-internacional/seccion', 'texto-items-imagen'); ?>
        <?php get_template_part('template-parts/centro-internacional/seccion', 'tarjeta-pequena'); ?>
        <?php get_template_part('template-parts/centro-internacional/seccion', 'tarjetas-carusel'); ?>
        <?php get_template_part('template-parts/centro-internacional/seccion', 'galeria'); ?>
        <?php get_template_part('template-parts/centro-internacional/seccion', 'tarjetas-carusel-grandes'); ?>
        <?php get_template_part('template-parts/centro-internacional/seccion', 'tarjetas-carusel-horizontal'); ?>
        <?php get_template_part('template-parts/centro-internacional/seccion', 'icono-texto'); ?>
        <?php get_template_part('template-parts/centro-internacional/seccion', 'texto-imagen'); ?>
        <?php get_template_part('template-parts/centro-internacional/seccion', 'tab-alianzas'); ?>
        <?php get_template_part('template-parts/centro-internacional/seccion', 'contacto'); ?>

        <?php get_template_part('template-parts/centro-internacional/seccion', 'formulario'); ?>
        
    </main>
<!-- FIN CONTENIDO -->

<?php get_footer();?>