<?php
/**
 * Template Name: Plantilla Investigacion | Grupos
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
$mostrar_texto_imagen       = get_field('mostrar_texto_imagen');
$mostrar_grupos             = get_field('mostrar_grupos');
$mostrar_equipos            = get_field('mostrar_equipos');
$mostrar_texto_imagen_fondo = get_field('mostrar_texto_imagen_fondo');
?>

<!-- CONTENIDO -->
  <main>

    <?php if($mostrar_hero) : ?>
      <!-- Hero -->
      <?php get_template_part('template-parts/investigacion/seccion', 'hero');?>
      <!-- Fin Hero -->
    <?php endif; ?>

    <?php if($mostrar_texto_imagen) : ?>
      <!-- Texto Imagen -->
      <?php get_template_part('template-parts/investigacion/seccion', 'texto-imagen');?>
      <!-- Fin Texto Imagen -->
    <?php endif; ?>

    <?php if($mostrar_grupos) : ?>
      <!-- Grupos -->
      <?php get_template_part('template-parts/investigacion/seccion', 'grupos');?>
      <!-- Fin Grupos -->
    <?php endif; ?>

    <?php if($mostrar_equipos) : ?>
      <!-- Equipos -->
      <?php get_template_part('template-parts/investigacion/seccion', 'equipos');?>
      <!-- Fin Equipos -->
    <?php endif; ?>

    <?php if($mostrar_texto_imagen_fondo) : ?>
      <!-- Texto imagen fondo cta -->
      <?php get_template_part('template-parts/investigacion/seccion', 'texto-imagen-fondo-cta');?>
      <!-- Fin Texto imagen fondo cta -->
    <?php endif; ?>

    
  </main>
<!-- FIN CONTENIDO -->

<?php get_footer() ?>