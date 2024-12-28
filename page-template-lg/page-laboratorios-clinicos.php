<?php
/**
 * Template Name: Plantilla Laboratorios Clínicos
 * 
 */


// Asegúrate de que no se acceda directamente a este archivo
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
get_header(); 

$mostrar_hero = get_field('mostrar_hero');
$mostrar_info = get_field('mostrar_info');
?>
  <!-- CONTENIDO -->
    <main>

      <?php if($mostrar_hero) : ?>
        <!-- Hero -->
        <?php get_template_part('template-parts/laboratorios-clinicos/seccion', 'hero' );?>
        <!-- Fin Hero -->
      <?php endif; ?>

      <?php if($mostrar_info) : ?>
        <!-- Hero -->
        <?php get_template_part('template-parts/laboratorios-clinicos/seccion', 'filtro' );?>
        <!-- Fin Hero -->
      <?php endif; ?>

    </main>
  <!-- FIN CONTENIDO -->
<?php get_footer();