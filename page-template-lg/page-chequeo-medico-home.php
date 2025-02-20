<?php
/**
 * Template Name: Chequeo Medico Home
*/

  get_header();

  $mostrarHero = get_field('mostrar_hero');
  $mostrarTextoImagen = get_field('mostrar_texto_imagen');
  $mostrarTarjetas = get_field('mostrar_tarjetas');
  $mostrarServicios = get_field('mostrar_servicios');
  $mostrarTextoImagenCTA = get_field('mostrar_texto_imagen_cta');
  $mostrarAcordeon = get_field('mostrar_acordeon');
  $mostrarCarrusel = get_field('mostrar_carrusel');
  $mostrarListadoIcono = get_field('mostrar_listado_icono');
  $mostrarTextoImagenFondo = get_field('mostrar_texto_imagen_fondo');
  $mostrarContactanos = get_field('mostrar_contactanos');
?>

<?php if($mostrarHero) : ?>
  <?php get_template_part('template-parts/chequeo-medico/seccion', 'hero'); ?>
<?php endif; ?>

<?php if($mostrarTextoImagen) : ?>
  <?php get_template_part('template-parts/chequeo-medico/seccion', 'texto-imagen'); ?>
<?php endif; ?>

<?php if($mostrarTarjetas) : ?>
  <?php get_template_part('template-parts/chequeo-medico/seccion', 'tarjetas'); ?>
<?php endif; ?>

<?php if($mostrarServicios) : ?>
  <?php get_template_part('template-parts/chequeo-medico/seccion', 'servicios'); ?>
<?php endif; ?>

<?php if($mostrarTextoImagenCTA) : ?>
  <?php get_template_part('template-parts/chequeo-medico/seccion', 'texto-imagen-cta'); ?>
<?php endif; ?>

<?php if($mostrarAcordeon) : ?>
  <?php get_template_part('template-parts/chequeo-medico/seccion', 'tab-content'); ?>
<?php endif; ?>

<?php if($mostrarCarrusel) : ?>
  <?php get_template_part('template-parts/chequeo-medico/seccion', 'carusel'); ?>
<?php endif; ?>

<?php if($mostrarListadoIcono) : ?>
  <?php get_template_part('template-parts/chequeo-medico/seccion', 'listado-icono'); ?>
<?php endif; ?>

<?php if($mostrarTextoImagenFondo) : ?>
  <?php get_template_part('template-parts/chequeo-medico/seccion', 'texto-imagen-fondo'); ?>
<?php endif; ?>

<?php if($mostrarContactanos) : ?>
  <?php get_template_part('template-parts/chequeo-medico/seccion', 'contactanos'); ?>
<?php endif; ?>

<?php get_footer(); ?>