<?php
/**
 * Template Name: Plantilla Investigacion | Investigar
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

$mostrar_hero               = get_field('mostrar_hero');
$mostrar_faqs               = get_field('mostrar_faqs');
$mostrar_texto_imagen_fondo = get_field('mostrar_texto_imagen_fondo');
$mostrar_equipo             = get_field('mostrar_equipo');
?>

<!-- CONTENIDO -->
  <main>

    <?php if($mostrar_hero) : ?>
      <!-- Hero -->
      <?php get_template_part('template-parts/investigacion/seccion', 'hero');?>
      <!-- Fin Hero -->
    <?php endif; ?>

    <?php if($mostrar_faqs) : ?>
      <!-- Faqs -->
      <?php get_template_part('template-parts/investigacion/seccion', 'faqs');?>
      <!-- Fin Faqs -->
    <?php endif; ?>

    <?php if($mostrar_equipo) : ?>
      <!-- Equipo -->
      <?php get_template_part('template-parts/investigacion/seccion', 'equipo');?>
      <!-- Fin Equipo -->
    <?php endif; ?>

    <?php if($mostrar_texto_imagen_fondo) : ?>
      <!-- Texto imagen fondo cta -->
      <?php get_template_part('template-parts/investigacion/seccion', 'texto-imagen-fondo-cta');?>
      <!-- Fin Texto imagen fondo cta -->
    <?php endif; ?>

    
  </main>
<!-- FIN CONTENIDO -->

<?php get_footer() ?>