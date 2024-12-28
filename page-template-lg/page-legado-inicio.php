<?php
/**
 * Template Name: Plantilla Legado | Inicio
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
$sitename = esc_html(get_bloginfo('name'));
?>

<!-- CONTENIDO -->
    <main>
      <?php get_template_part('template-parts/legado/seccion', 'hero')?>
      <?php get_template_part('template-parts/legado/seccion', 'texto-imagen')?>
      <?php get_template_part('template-parts/legado/seccion', 'banner-imagen')?>
      <?php get_template_part('template-parts/legado/seccion', 'titulo-items')?>
      <?php get_template_part('template-parts/legado/seccion', 'texto')?>
      <?php get_template_part('template-parts/legado/seccion', 'texto-imagen-cta')?>
      <?php get_template_part('template-parts/legado/seccion', 'titulo-iconos')?>
      <?php get_template_part('template-parts/legado/seccion', 'texto-imagen-fondo')?>
      <?php get_template_part('template-parts/legado/seccion', 'formulario')?>
      <?php get_template_part('template-parts/legado/seccion', 'soluciones')?>
      <?php get_template_part('template-parts/legado/seccion', 'soluciones-carusel')?>

    </main>
<!-- FIN CONTENIDO -->

<?php get_footer();