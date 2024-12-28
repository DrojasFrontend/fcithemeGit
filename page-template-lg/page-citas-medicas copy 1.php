<?php
/* 
Template Name: Plantilla Citas Medicas OLD
*/ 

get_header();

$mostrar_hero               = get_field('mostrar_hero');
$mostrar_texto_imagen_cta   = get_field('mostrar_texto_imagen_cta');
$mostrar_targetas_grid      = get_field('mostrar_targetas_grid');
$mostrar_texto_imagen_fondo = get_field('mostrar_texto_imagen_fondo');

?>

<!-- CONTENIDO -->
  <main class="paginaEtapaExpecialidades">
    
    <!-- Hero -->
      <?php get_template_part('template-parts/citas-medicas/seccion', 'hero', array('class' => '') );?>
    <!-- Fin Hero -->
    

    
    <!-- Texto Imagen -->
      <?php get_template_part('template-parts/citas-medicas/seccion', 'texto-imagen-cta');?>
    <!-- Fin Texto Imagen -->
  

    
    <!-- Targetas Grid -->
      <?php get_template_part('template-parts/citas-medicas/seccion', 'targetas-grid');?>
    <!-- Fin Targetas Grid -->
    

    <?php get_template_part('template-parts/especialidades/seccion', 'servicios-eps')?>

   
    <!-- Texto Imagen Fondo -->
      <?php get_template_part('template-parts/citas-medicas/seccion', 'texto-imagen-fondo-cta');?>
    <!-- Fin Texto Imagen Fondo -->
   


  </main>
<!-- FIN CONTENIDO -->
<?php get_footer(); ?>