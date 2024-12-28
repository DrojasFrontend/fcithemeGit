<?php
/**
 * Template Name: Plantilla Investigacion
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

$mostrar_carusel            = get_field('mostrar_carusel');
$mostrar_texto_imagen       = get_field('mostrar_texto_imagen');
$mostrar_tarjetas           = get_field('mostrar_tarjetas');
$mostrar_targetas_grid      = get_field('mostrar_targetas_grid');
$mostrar_servicios          = get_field('mostrar_servicios');
$mostrar_texto_imagen_fondo = get_field('mostrar_texto_imagen_fondo');
?>

<!-- CONTENIDO -->
  <main>

    <?php if($mostrar_carusel) : ?>
      <!-- Carusel -->
      <?php get_template_part('template-parts/investigacion/seccion', 'carusel');?>
      <!-- Fin Carusel -->
    <?php endif; ?>

    <?php if($mostrar_texto_imagen) : ?>
      <!-- Texto Imagen -->
      <?php get_template_part('template-parts/investigacion/seccion', 'texto-imagen');?>
      <!-- Fin Texto Imagen -->
    <?php endif; ?>

    <?php if($mostrar_tarjetas) : ?>
      <!-- Tarjetas -->
      <?php get_template_part('template-parts/investigacion/seccion', 'tarjetas');?>
      <!-- Fin Tarjetas -->
    <?php endif; ?>

    <?php if($mostrar_targetas_grid) : ?>
      <!-- Tarjetas Grid -->
      <?php get_template_part('template-parts/investigacion/seccion', 'tarjetas-grid');?>
      <!-- Fin Tarjetas Grid -->
    <?php endif; ?>

    <?php if($mostrar_servicios) : ?>
      <!-- Servicios -->
      <?php get_template_part('template-parts/investigacion/seccion', 'servicios');?>
      <!-- Fin Servicios -->
    <?php endif; ?>

    <?php if($mostrar_texto_imagen_fondo) : ?>
      <!-- Texto imagen fondo cta -->
      <?php get_template_part('template-parts/investigacion/seccion', 'texto-imagen-fondo-cta');?>
      <!-- Fin Texto imagen fondo cta -->
    <?php endif; ?>

    
  </main>
<!-- FIN CONTENIDO -->

<?php get_footer() ?>