<?php
/* 
Template Name: Plantilla Convenios
*/ 

get_header();

$mostrar_hero               = get_field('mostrar_hero');
$mostrar_texto_imagen_cta   = get_field('mostrar_texto_imagen_cta');
$mostrar_targetas_grid      = get_field('mostrar_targetas_grid');
$mostrar_alianza            = get_field('mostrar_alianza');
$mostrar_texto_imagen_fondo = get_field('mostrar_texto_imagen_fondo');


?>

<!-- CONTENIDO -->
  <main class="paginaEtapaExpecialidades">
    <?php if($mostrar_hero) : ?>
    <!-- Hero -->
      <?php get_template_part('template-parts/convenios/seccion', 'hero', array('class' => '') );?>
    <!-- Fin Hero -->
    <?php endif; ?>

    <?php if($mostrar_texto_imagen_cta) : ?>
    <!-- Texto Imagen -->
      <?php get_template_part('template-parts/convenios/seccion', 'texto-imagen-cta');?>
    <!-- Fin Texto Imagen -->
    <?php endif; ?>

    <?php if($mostrar_alianza) : ?>
      <!-- Alianza -->
      <?php get_template_part('template-parts/convenios/seccion', 'convenios');?>
      <!-- Fin Alianza -->
    <?php endif; ?>

    <?php if($mostrar_texto_imagen_fondo) : ?>
    <!-- Texto Imagen Fondo -->
      <?php get_template_part('template-parts/citas-medicas/seccion', 'texto-imagen-fondo-cta');?>
    <!-- Fin Texto Imagen Fondo -->
    <?php endif; ?>

    <?php get_template_part('template-parts/especialidades/seccion', 'flotante-contacto');?>

  </main>
<!-- FIN CONTENIDO -->
<?php get_footer(); ?>