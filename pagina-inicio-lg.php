<?php
/* 
Template Name: Página Inicio
*/
get_header(); 
$sitename = get_bloginfo('name');

$mostrar_banner_slider      = get_field("mostrar_banner_slider");
$mostrar_servicios_medicos  = get_field("mostrar_servicios_medicos");
$mostrar_somos_lacardio     = get_field("mostrar_somos_lacardio");
$mostrar_nosotros           = get_field("mostrar_nosotros");
$mostrar_sede               = get_field("mostrar_sede");
$mostrar_donar               = get_field("mostrar_donar");

$grupo_noticias             = get_field("grupo_noticias");
$mostrar_noticias           = !empty(get_field("mostrar_noticias")) ? esc_html(get_field("mostrar_noticias")) : '';
$titulo_noticias            = !empty($grupo_noticias['titulo']) ? esc_html($grupo_noticias['titulo'] ) : '';
$fondo_noticias             = !empty($grupo_noticias['fondo']) ? esc_html($grupo_noticias['fondo'] ) : '';
$numero_entradas            = !empty($grupo_noticias['numero_entradas']) ? esc_html($grupo_noticias['numero_entradas'] ) : '';


?>

<!-- INICIO CONTENIDO -->
    <main>
        <?php if($mostrar_banner_slider) { ?>
            <!-- Carusel -->
            <?php get_template_part('template-parts/secciones/seccion', 'carusel-lg'); ?>
            <!-- Fin Carusel -->
        <?php } ?>

<?php if($mostrar_servicios_medicos) { ?>
            <!-- Servicios medicos -->
            <?php get_template_part('template-parts/secciones/seccion', 'servicios-medicos-lg'); ?>
            <!-- Fin Servicios medicos -->
        <?php } ?>


        <?php if($mostrar_somos_lacardio) { ?>
            <!-- Servicios medicos -->
            <?php get_template_part('template-parts/secciones/seccion', 'somos-lacardio-lg'); ?>
            <!-- Fin Servicios medicos -->
        <?php } ?>

        <?php get_template_part('template-parts/secciones/seccion', 'tab-especialidades'); ?>

        <?php if($mostrar_noticias) { ?>
            <!-- Noticias -->
            <?php
                set_query_var('titulo_noticias', $titulo_noticias);
                set_query_var('fondo_noticias', $fondo_noticias);
                set_query_var('numero_entradas', $numero_entradas);
                set_query_var('orden_entradas', 'DESC');
                get_template_part('template-parts/secciones/seccion', 'noticias');
            ?>
            <!-- Fin Noticias -->
        <?php } ?>

        

        <?php if($mostrar_nosotros) { ?>
            <!-- conoce más de nosotros -->
            <?php 
                get_template_part('template-parts/secciones/seccion', 'targetas-lg'); 
            ?>
            <!-- Fin conoce más de nosotros -->
        <?php } ?>

        <?php if($mostrar_sede) { ?>
            <!-- Sedes -->
            <?php get_template_part('template-parts/secciones/seccion', 'sedes-lg'); ?>
            <!-- Fin Sedes -->
        <?php } ?>

        <?php if($mostrar_donar) { ?>
            <!-- Sedes -->
            <?php get_template_part('template-parts/secciones/seccion', 'donar-lg'); ?>
            <!-- Fin Sedes -->
        <?php } ?>

        <?php get_template_part('template-parts/secciones/seccion', 'eventos-lg'); ?>
        
        
        <?php get_template_part('template-parts/secciones/seccion', 'servicios-slider'); ?>

    </main>
<!-- INICIO CONTENIDO -->


<?php get_footer("new");