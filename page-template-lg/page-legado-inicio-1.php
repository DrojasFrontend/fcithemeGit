<?php
/**
 * Template Name: Plantilla Legado | Inicio 1
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
      <?php get_template_part('template-parts/legado-1/seccion', 'hero')?>
      <?php get_template_part('template-parts/legado-1/seccion', 'texto-imagen')?>
      <?php get_template_part('template-parts/legado-1/seccion', 'texto')?>
      <?php get_template_part('template-parts/legado-1/seccion', 'grid-carusel')?>
      <?php get_template_part('template-parts/legado-1/seccion', 'texto-imagen-fondo', array('class' => 'fondo-azul-claro'))?>
      <?php get_template_part('template-parts/legado-1/seccion', 'soluciones-carusel')?>
    </main>
<!-- FIN CONTENIDO -->

<?php get_footer();