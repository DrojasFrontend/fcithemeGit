<?php
/**
 * Template Name: Plantilla Especialidades | Cardiopatías congénitas
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
    <?php get_template_part('template-parts/cardiopatias-congenitas/seccion', 'hero'); ?>
    <?php get_template_part('template-parts/cardiopatias-congenitas/seccion', 'texto-imagen'); ?>
    <?php get_template_part('template-parts/cardiopatias-congenitas/seccion', 'texto-descripcion-tab'); ?>
    <?php get_template_part('template-parts/cardiopatias-congenitas/seccion', 'accordion'); ?>
    <?php get_template_part('template-parts/cardiopatias-congenitas/seccion', 'tarjetas-carusel'); ?>
    <?php get_template_part('template-parts/cardiopatias-congenitas/seccion', 'imagen-texto-cta'); ?>
    <?php get_template_part('template-parts/cardiopatias-congenitas/seccion', 'tarjetas-carusel-horizontal'); ?>
    <?php get_template_part('template-parts/cardiopatias-congenitas/seccion', 'texto-imagen-fondo-cta'); ?>
    <?php get_template_part('template-parts/cardiopatias-congenitas/seccion', 'texto-descripcion-items'); ?>
    
	<?php get_template_part('template-parts/formularios/citas', 'teleconsultas'); ?>
        
  </main>
<!-- FIN CONTENIDO -->

<?php get_footer();?>