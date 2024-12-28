<?php
/**
 * Template Name: Plantilla Investigacion | Proyectos
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

$mostrar_hero         = get_field('mostrar_hero');
$mostrar_texto_imagen = get_field('mostrar_texto_imagen');
$mostrar_proyectos    = get_field('mostrar_proyectos');
$mostrar_informes     = get_field('mostrar_informes');
$mostrar_galeria      = get_field('mostrar_galeria');
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

    <?php if($mostrar_proyectos) : ?>
      <!-- Proyectos -->
      <?php get_template_part('template-parts/investigacion/seccion', 'proyectos');?>
      <!-- Fin Proyectos -->
    <?php endif; ?>

    <?php if($mostrar_informes) : ?>
      <!-- Informes -->
      <?php get_template_part('template-parts/investigacion/seccion', 'informes');?>
      <!-- Fin Informes -->
    <?php endif; ?>

    <?php if($mostrar_galeria) : ?>
      <!-- Galeria -->
      <?php get_template_part('template-parts/investigacion/seccion', 'galeria');?>
      <!-- Fin Galeria -->
    <?php endif; ?>
    
  </main>
<!-- FIN CONTENIDO -->

<?php get_footer() ?>