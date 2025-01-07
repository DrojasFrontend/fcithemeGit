<?php
/**
 * Template Name: Plantilla Trasplante | Corazon
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
$mostrar_texto_imagen_cta   = get_field('mostrar_texto_imagen_cta');
$mostrar_cursos             = get_field('mostrar_cursos');
$mostrar_targetas_grid      = get_field('mostrar_targetas_grid');
$mostrar_lista_numerada     = get_field('mostrar_lista_numerada');
$mostrar_texto_desc_banner  = get_field('mostrar_texto_desc_banner');
$mostrar_fondo_texto_img    = get_field('mostrar_fondo_texto_img');
$mostrar_texto_imagen_cta_2 = get_field('mostrar_texto_imagen_cta_2');
$mostrar_items_iconos       = get_field('mostrar_items_iconos');
$mostrar_texto_imagen_fondo = get_field('mostrar_texto_imagen_fondo');
$mostrar_experto            = get_field('mostrar_experto');

?>

<!-- CONTENIDO -->
  <main class="paginaTrasplante">

    <?php if($mostrar_hero) : ?>
      <!-- Hero -->
        <?php get_template_part('template-parts/trasplante/seccion', 'hero');?>
      <!-- Fin Hero -->
    <?php endif; ?>

    <?php 
      $menu_items = array(
        array('link' => '/trasplante-de-corazon-2', 'name' => 'Corazón adulto', 'class' => 'active'),
        array('link' => '/trasplante-renal/', 'name' => 'Transplante Renal', 'class' => ''),
        array('link' => '', 'name' => 'Hepático y Páncreas', 'class' => ''), 
        array('link' => '', 'name' => 'Pulmonar', 'class' => '')
      );
      get_template_part('template-parts/trasplante/seccion', 'menu', array('items' => $menu_items));
    ?>

     <?php if($mostrar_texto_imagen_cta) : ?>
    <!-- Texto Imagen -->
      <?php get_template_part('template-parts/trasplante/seccion', 'texto-imagen-cta');?>
    <!-- Fin Texto Imagen -->
    <?php endif; ?>

    <?php if($mostrar_cursos) : ?>
      <!-- Cursos -->
      <?php get_template_part('template-parts/trasplante/seccion', 'cursos');?>
      <!-- Fin Cursos -->
    <?php endif; ?>

    <?php if($mostrar_targetas_grid) : ?>
      <!-- Targetas Grid -->
        <?php get_template_part('template-parts/trasplante/seccion', 'targetas-grid');?>
      <!-- Fin Targetas Grid -->
    <?php endif; ?>

    <?php if($mostrar_lista_numerada) : ?>
    <!-- Lista Numerada -->
      <?php get_template_part('template-parts/trasplante/seccion', 'lista-numerada');?>
    <!-- Fin Lista Numerada -->
    <?php endif; ?>

    <?php if($mostrar_texto_desc_banner) : ?>
    <!-- Texto Descripcion Banner -->
      <?php get_template_part('template-parts/trasplante/seccion', 'texto-desc-banner', array('class' => 'trasplanteCorazon'));?>
    <!-- Fin Texto Descripcion Banner -->
    <?php endif; ?>

    <?php if($mostrar_fondo_texto_img) : ?>
    <!-- Fondo Texto Imagen -->
      <?php get_template_part('template-parts/trasplante/seccion', 'fondo-texto-imagen');?>
    <!-- Fin Fondo Texto Imagen -->
    <?php endif; ?>

    <?php if($mostrar_texto_imagen_cta_2) : ?>
      <!-- Texto Imagen 2 -->
        <?php get_template_part('template-parts/trasplante/seccion', 'texto-imagen-cta-2');?>
      <!-- Fin Texto Imagen 2 -->
    <?php endif; ?>

    <?php if($mostrar_items_iconos) : ?>
      <!-- Items Iconos -->
        <?php get_template_part('template-parts/trasplante/seccion', 'items-iconos');?>
      <!-- Fin Items Iconos -->
    <?php endif; ?>

    <?php if($mostrar_texto_imagen_fondo) : ?>
      <!-- Texto Imagen Fondo -->
        <?php get_template_part('template-parts/trasplante/seccion', 'texto-imagen-fondo-cta', array('class' => 'trasplanteCorazon'));?>
      <!-- Fin Texto Imagen Fondo -->
    <?php endif; ?>

    <?php if($mostrar_experto) : ?>
    <!-- Experto -->
      <?php get_template_part('template-parts/trasplante/seccion', 'expertos');?>
    <!-- Fin Experto -->
    <?php endif; ?>
   
    <?php get_template_part('template-parts/especialidades/seccion', 'flotante-contacto');?>

  </main>
<!-- FIN CONTENIDO -->
<?php get_footer(); ?>