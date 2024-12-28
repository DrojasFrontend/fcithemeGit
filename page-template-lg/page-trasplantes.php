<?php
/**
 * Template Name: Plantilla Trasplantes
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

$mostrar_hero             = get_field('mostrar_hero');
$mostrar_texto_imagen     = get_field('mostrar_texto_imagen');
$mostrar_tarjetas         = get_field('mostrar_tarjetas');
$mostrar_tarjetas_carusel = get_field('mostrar_tarjetas_carusel');
$mostrar_iconos           = get_field('mostrar_iconos');
$mostrar_imagen_texto     = get_field('mostrar_imagen_texto');
$mostrar_imagen_cta       = get_field('mostrar_imagen_cta');
$mostrar_directorio       = get_field('mostrar_directorio');
$mostrar_faqs             = get_field('mostrar_faqs');

$mostrar_soluciones       = get_field('mostrar_soluciones');
$mostrar_expertos         = get_field('mostrar_expertos');
$mostrar_videos           = get_field('mostrar_videos');


?>

<!-- CONTENIDO -->
  <main class="paginaTrasplante">
  
  <?php if ($mostrar_hero) : ?>        
    <!-- Hero -->         
    <?php get_template_part('template-parts/trasplante/seccion', 'hero'); ?>          
    <!-- Fin Hero -->       
  <?php endif; ?>    

  <?php if ($mostrar_texto_imagen) : ?>        
    <!-- Texto Imagen -->    
    <?php get_template_part('template-parts/trasplante/seccion', 'texto-imagen'); ?>        
    <!-- Fin Texto Imagen -->
  <?php endif; ?>    

  <?php if ($mostrar_tarjetas) : ?>        
    <!-- Tarjetas -->    
    <?php get_template_part('template-parts/trasplante/seccion', 'tarjetas'); ?>        
    <!-- Fin Tarjetas -->
  <?php endif; ?>    

  <?php if ($mostrar_tarjetas_carusel) : ?>        
    <!-- Tarjetas Carusel -->    
    <?php get_template_part('template-parts/trasplante/seccion', 'tarjetas-carusel'); ?>        
    <!-- Fin Tarjetas Carusel -->
  <?php endif; ?>    

  <?php if ($mostrar_iconos) : ?>        
    <!-- Iconos -->    
    <?php get_template_part('template-parts/trasplante/seccion', 'iconos'); ?>        
    <!-- Fin Iconos -->
  <?php endif; ?>    

  <?php if ($mostrar_imagen_texto) : ?>        
    <!-- Imagen Texto -->    
    <?php get_template_part('template-parts/trasplante/seccion', 'imagen-texto'); ?>        
    <!-- Fin Imagen Texto -->
  <?php endif; ?>    

  <?php if ($mostrar_imagen_cta) : ?>        
    <!-- Imagen CTA -->      
    <?php get_template_part('template-parts/trasplante/seccion', 'imagen-cta'); ?>        
    <!-- Fin Imagen CTA -->
  <?php endif; ?>    

  <?php if ($mostrar_directorio) : ?>        
    <!-- Directorio -->    
    <?php get_template_part('template-parts/trasplante/seccion', 'directorio'); ?>        
    <!-- Fin Directorio -->
  <?php endif; ?>    

  <?php if ($mostrar_faqs) : ?>        
    <!-- FAQs -->    
    <?php get_template_part('template-parts/trasplante/seccion', 'faqs'); ?>        
    <!-- Fin FAQs -->
  <?php endif; ?>    

  <?php if ($mostrar_soluciones) : ?>        
    <!-- Soluciones -->    
    <?php get_template_part('template-parts/trasplante/seccion', 'soluciones'); ?>        
    <!-- Fin Soluciones -->
  <?php endif; ?>    

  <?php if ($mostrar_expertos) : ?>        
    <!-- Expertos -->    
    <?php get_template_part('template-parts/trasplante/seccion', 'expertos'); ?>        
    <!-- Fin Expertos -->
  <?php endif; ?>    

  <?php if ($mostrar_videos) : ?>        
    <!-- Videos -->    
    <?php get_template_part('template-parts/trasplante/seccion', 'videos'); ?>        
    <!-- Fin Videos -->
  <?php endif; ?>

  <?php get_template_part('template-parts/especialidades/seccion', 'flotante-contacto');?>

  </main>
<!-- FIN CONTENIDO -->
<?php get_footer(); ?>