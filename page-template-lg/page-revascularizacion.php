<?php
/**
 * Template Name: Plantilla Revascularizacion
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

$mostrar_banner_principal = get_field("mostrar_banner_principal");
$grupo_banner_principal   = get_field("grupo_banner_principal");
set_query_var('grupo_banner_principal', $grupo_banner_principal);

$mostrar_texto_imagen = get_field("mostrar_texto_imagen");

$mostrar_bloque_texto = get_field("mostrar_bloque_texto");
$grupo_bloque_texto   = get_field("grupo_bloque_texto");
set_query_var('grupo_bloque_texto', $grupo_bloque_texto);

$mostrar_targetas = get_field("mostrar_targetas");
$grupo_targetas   = get_field("grupo_targetas");
set_query_var('grupo_targetas', $grupo_targetas);

$mostrar_lista_numerada = get_field("mostrar_lista_numerada");
$grupo_lista_numerada   = get_field("grupo_lista_numerada");
set_query_var('grupo_lista_numerada', $grupo_lista_numerada);

$mostrar_titulo_desc_banner = get_field("mostrar_titulo_desc_banner");
$grupo_titulo_desc_banner   = get_field("grupo_titulo_desc_banner");
set_query_var('grupo_titulo_desc_banner', $grupo_titulo_desc_banner);

$mostrar_profesionales = get_field("mostrar_profesionales");
$grupo_profesionales   = get_field("grupo_profesionales");
set_query_var('grupo_profesionales_urg', $grupo_profesionales);

$mostrar_texto_imagen_2 = get_field("mostrar_texto_imagen_2");

$mostrar_texto_cta_imagen = get_field("mostrar_texto_cta_imagen");
$grupo_texto_cta_imagen   = get_field("grupo_texto_cta_imagen");
set_query_var('grupo_texto_cta_imagen', $grupo_texto_cta_imagen);

get_header();
?>
    <!-- CONTENIDO -->
    <main class="legger-template revascularizacion-template">
        <?= get_template_part('template-parts/content', 'breadcrumbs-nuevo'); ?>

        <?php if($mostrar_banner_principal) : ?>
        <!-- Banner principal -->
            <?php get_template_part('template-parts/secciones/revascularizacion/seccion', 'banner-principal' );?>
        <!-- Fin Banner principal -->
        <?php endif; ?>

        <?php if($mostrar_texto_imagen) : ?>
        <!-- Texto Imagen -->
            <?php 
            $grupo_texto_imagen = get_field("grupo_texto_imagen");
            set_query_var('grupo_texto_imagen', $grupo_texto_imagen);
            get_template_part('template-parts/secciones/revascularizacion/seccion', 'texto-imagen' );
            ?>
        <!-- Fin Texto Imagen -->
         <?php endif; ?>

        <?php if($mostrar_bloque_texto) : ?>
        <!-- Bloque texto -->
            <?php get_template_part('template-parts/secciones/revascularizacion/seccion', 'bloque-texto' );?>
        <!-- Fin Bloque texto -->
        <?php endif; ?>

        <?php if($mostrar_targetas) : ?>
        <!-- Targeta columna -->
            <?php get_template_part('template-parts/secciones/revascularizacion/seccion', 'targeta-columna' );?>
        <!-- Fin Targeta columna -->
        <?php endif; ?>

        <?php if($mostrar_lista_numerada) : ?>
        <!-- Lista numerada -->
            <?php get_template_part('template-parts/secciones/revascularizacion/seccion', 'lista-numerada' );?>
        <!-- Fin Lista numerada -->
        <?php endif; ?>

        <?php if($mostrar_titulo_desc_banner) : ?>
        <!-- Titulo descipcion banner -->
            <?php get_template_part('template-parts/secciones/revascularizacion/seccion', 'titulo-desc-banner' );?>
        <!-- Fin Titulo descipcion banner -->
        <?php endif; ?>

        <?php if($mostrar_profesionales) : ?>
        <!-- Profesionales -->
            <?php get_template_part('template-parts/secciones/seccion', 'profesionales-urg' );?>
        <!-- Fin Profesionales -->
        <?php endif; ?>

        <?php if($mostrar_texto_imagen_2) : ?>
            <?php 
            $grupo_texto_imagen_2 = get_field("grupo_texto_imagen_2");
            set_query_var('grupo_texto_imagen', $grupo_texto_imagen_2);
            get_template_part('template-parts/secciones/revascularizacion/seccion', 'texto-imagen' );
            ?>
        <?php endif; ?>
        
        <?php if($mostrar_texto_cta_imagen) : ?>
        <!-- Texto boton imagen -->
            <?php get_template_part('template-parts/secciones/revascularizacion/seccion', 'texto-boton-imagen' );?>
        <!-- Fin Texto boton imagen -->
        <?php endif; ?>

        <?php get_template_part('template-parts/especialidades/seccion', 'flotante-contacto');?>
    </main>
    <!-- FIN CONTENIDO -->

<?php
get_footer();