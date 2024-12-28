<?php
/**
 * Template Name: Plantilla Mes del Corazon
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
$mostrar_banner     = get_field("mostrar_banner");
$mostrar_menu       = get_field("mostrar_menu");
$mostrar_noticias   = get_field("mostrar_noticias");
$mostrar_experto    = get_field("mostrar_experto");
$mostrar_multimedia = get_field("mostrar_multimedia");
$mostrar_donar      = get_field("mostrar_donar");
$mostrar_socio      = get_field("mostrar_socio");
?>

<!-- CONTENIDO -->
  <main>
    <?php if($mostrar_banner) : ?>
    <!-- Hero -->
    <?php get_template_part('template-parts/mes-corazon/secciones/seccion', 'hero') ?>
    <!-- Fin Hero -->
    <?php endif; ?>

    <?php if($mostrar_menu) : ?>
    <!-- Menu -->
    <?php get_template_part('template-parts/mes-corazon/secciones/seccion', 'menu') ?>
    <!-- Fin Menu -->
    <?php endif; ?>

    <?php if($mostrar_noticias) : ?>
    <!-- Noticias -->
    <?php get_template_part('template-parts/mes-corazon/secciones/seccion', 'noticias') ?>
    <!-- Fin Noticias -->
    <?php endif; ?>

    <?php if($mostrar_experto) : ?>
    <!-- Expertos -->
    <?php get_template_part('template-parts/mes-corazon/secciones/seccion', 'expertos') ?>
    <!-- Fin Socios -->
    <?php endif; ?>

    <?php if($mostrar_multimedia) : ?>
    <!-- Video -->
    <?php get_template_part('template-parts/mes-corazon/secciones/seccion', 'video') ?>
    <!-- Fin Video -->
    <?php endif; ?>

    <?php if($mostrar_donar) : ?>
    <!-- Dona -->
    <?php get_template_part('template-parts/mes-corazon/secciones/seccion', 'dona') ?>
    <!-- Fin Dona -->
    <?php endif; ?>

    <?php if($mostrar_socio) : ?>
    <!-- Socios -->
    <?php get_template_part('template-parts/mes-corazon/secciones/seccion', 'socios') ?>
    <!-- Fin Socios -->
    <?php endif; ?>
  </main>
<!-- FIN CONTENIDO -->
<?php get_footer();