<?php
/* 
Template Name: Plantilla Especialidad | Ecocardiografía pediátrica
*/ 

get_header();

$mostrar_hero                         = get_field('mostrar_hero');
$mostrar_texto_imagen_cta             = get_field('mostrar_texto_imagen_cta');
$mostrar_imagen_texto_cta             = get_field('mostrar_imagen_texto_cta');
$mostrar_imagen_texto_cta_invertido   = get_field('mostrar_imagen_texto_cta_invertido');
$mostrar_bloque_texto                 = get_field('mostrar_bloque_texto');
$mostrar_texto_desc_banner            = get_field('mostrar_texto_desc_banner');
$mostrar_texto_desc_banner_2          = get_field('mostrar_texto_desc_banner_2');
$mostrar_texto_desc_banner_3          = get_field('mostrar_texto_desc_banner_3');
$mostrar_lista_numerada               = get_field('mostrar_lista_numerada');
$mostrar_items_iconos                 = get_field('mostrar_items_iconos');
$mostrar_texto_imagen_cta_2           = get_field('mostrar_texto_imagen_cta_2');
$mostrar_texto_imagen_fondo           = get_field('mostrar_texto_imagen_fondo');
$mostrar_targetas_grid                = get_field('mostrar_targetas_grid');
$mostrar_acordion                     = get_field('mostrar_acordion');
$mostrar_experto                      = get_field('mostrar_experto');
$mostrar_ctas                         = get_field('mostrar_ctas');
$mostrar_tarjetas_imagen_texto        = get_field('mostrar_tarjetas_imagen_texto');

?>
<!-- CONTENIDO -->
<main class="paginaEtapaExpecialidades">
<?php if($mostrar_hero) : ?>
    <!-- Hero -->
    <?php get_template_part('template-parts/especialidades/seccion', 'hero-especialidades', array('class' => 'paginaCardiologiasClinicas') );?>
    <!-- Fin Hero -->
<?php endif; ?>

<?php if($mostrar_texto_imagen_cta) : ?>
    <!-- Texto Imagen CTA -->
    <?php get_template_part('template-parts/especialidades/seccion', 'texto-imagen-cta', array('class' =>'paginaCardiologiasClinicas'));?>
    <!-- Fin Texto Imagen CTA -->
<?php endif; ?>

    <?php if($mostrar_imagen_texto_cta) : ?>
    <!-- Imagen Texto CTA -->
    <?php get_template_part('template-parts/especialidades/seccion', 'imagen-texto-cta', array('class' =>'paginaCardiologiasClinicas'));?>
    <!-- Fin Imagen Texto CTA -->
<?php endif; ?>

<?php if($mostrar_imagen_texto_cta_invertido) : ?>
    <!-- Imagen Texto CTA -->
    <?php get_template_part('template-parts/especialidades/seccion', 'imagen-texto-cta_invertido', array('class' =>'paginaCardiologiasClinicas'));?>
    <!-- Fin Imagen Texto CTA -->
<?php endif; ?>

<?php if($mostrar_bloque_texto) : ?>
    <!-- Bloque Texto -->
    <?php get_template_part('template-parts/especialidades/seccion', 'bloque-texto', array('class' => '') );?>
    <!-- Fin Bloque Texto -->
<?php endif; ?>

<?php if($mostrar_texto_desc_banner) : ?>
    <!-- Texto Descripcion Banner -->
    <?php get_template_part('template-parts/especialidades/seccion', 'texto-desc-banner', array('class' =>'paginaHemodinamia'));?>
    <!-- Fin Texto Descripcion Banner -->
<?php endif; ?>

<?php if($mostrar_texto_desc_banner_2) : ?>
    <!-- Texto Descripcion Banner -->
    <?php get_template_part('template-parts/especialidades/seccion', 'texto-desc-banner-especialidades', array('class' =>'paginaCardiologiasClinicas'));?>
    <!-- Fin Texto Descripcion Banner -->
<?php endif; ?>

<?php if($mostrar_texto_desc_banner_3) : ?>
    <!-- Texto Descripcion Banner -->
    <?php get_template_part('template-parts/especialidades/seccion', 'texto-desc-banner-3', array('class' =>'paginaCardiologiasClinicas'));?>
    <!-- Fin Texto Descripcion Banner -->
<?php endif; ?>

<?php if($mostrar_lista_numerada) : ?>
    <!-- Lista Numerada -->
    <?php get_template_part('template-parts/especialidades/seccion', 'lista-numerada',  array('class' => '') );?>
    <!-- Fin Lista Numerada -->
<?php endif; ?>

<?php if($mostrar_items_iconos) : ?>
    <!-- Items Iconos -->
    <?php get_template_part('template-parts/especialidades/seccion', 'items-iconos',  array('class' => 'paginaEcocardiografia') );?>
    <!-- Fin Items Iconos -->
<?php endif; ?>

<?php if($mostrar_texto_imagen_cta_2) : ?>
    <!-- Texto Imagen 2 -->
    <?php get_template_part('template-parts/especialidades/seccion', 'texto-imagen-cta-2', array('class' =>'paginaCardiologiasClinicas paddingBottom'));?>
    <!-- Fin Texto Imagen 2 -->
<?php endif; ?>

<?php if($mostrar_texto_imagen_fondo) : ?>
    <!-- Texto Imagen Fondo -->
    <?php get_template_part('template-parts/especialidades/seccion', 'texto-imagen-fondo-cta');?>
    <!-- Fin Texto Imagen Fondo -->
<?php endif; ?>

<?php if($mostrar_targetas_grid) : ?>
    <!-- Targetas Grid -->
    <?php get_template_part('template-parts/especialidades/seccion', 'targetas-grid');?>
    <!-- Fin Targetas Grid -->
<?php endif; ?>

<?php if($mostrar_acordion) : ?>
    <!-- Accordion -->
    <?php get_template_part('template-parts/especialidades/seccion', 'accordion');?>
    <!-- Fin Accordion -->
<?php endif; ?>

<?php if($mostrar_experto) : ?>
    <!-- Experto -->
    <?php get_template_part('template-parts/especialidades/seccion', 'expertos', array("class" => "marginTop paginaHemodinamia"));?>
    <!-- Fin Experto -->
<?php endif; ?>

<?php if($mostrar_ctas) : ?>
    <!-- CTAS -->
    <?php get_template_part('template-parts/especialidades/seccion', 'ctas');?>
    <!-- Fin CTAS -->
<?php endif; ?>

<?php if($mostrar_tarjetas_imagen_texto) : ?>
    <!-- CTAS -->
    <?php get_template_part('template-parts/especialidades/seccion', 'tarjetas-imagen-texto');?>
    <!-- Fin CTAS -->
<?php endif; ?>

<?php get_template_part('template-parts/especialidades/seccion', 'flotante-contacto');?>
</main>
<!-- CONTENIDO -->

<?php get_footer(); ?>