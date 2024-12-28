<?php
/**
 * Template Name: Plantilla Legado | Inicio 3
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
      <?php get_template_part('template-parts/legado-3/seccion', 'hero')?>
      <?php get_template_part('template-parts/legado-3/seccion', 'preguntas')?>

    </main>
<!-- FIN CONTENIDO -->

<?php get_footer();