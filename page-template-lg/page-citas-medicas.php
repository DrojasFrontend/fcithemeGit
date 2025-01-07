<?php
/* 
Template Name: Plantilla Citas Medicas
*/

get_header();

$mostrar_hero = get_field('mostrar_hero');
$mostrar_texto_imagen_cta = get_field('mostrar_texto_imagen_cta');
$mostrar_targetas_grid = get_field('mostrar_targetas_grid');
$mostrar_alianza = get_field('mostrar_alianza');
$mostrar_texto_imagen_fondo = get_field('mostrar_texto_imagen_fondo');


?>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-983428478"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }
  gtag('js', new Date());

  gtag('config', 'AW-983428478');
</script>

<div class="breadcrumbs">
  <p id="breadcrumbs" class="claro">
    <span>
      <a style="text-decoration: none!important;" href="https://www.lacardio.org/"
        data-wpel-link="internal">LaCardio</a>
    </span> »
    <span>
      <a style="text-decoration: none!important;" href="#" data-wpel-link="internal">Pacientes, familiares,
        cuidadores</a>
    </span> »
    <span>
      <a style="text-decoration: none!important;" href="#" data-wpel-link="internal">Pide y prepárate para tu cita</a>
    </span> »

    <span>
      <a style="text-decoration: none!important;" href="https://www.lacardio.org/citas-y-teleconsultas/"
        data-wpel-link="internal">Pide una cita</a>
    </span>
  </p>
</div>

<!-- CONTENIDO -->
<main class="paginaEtapaExpecialidades">
  <?php if ($mostrar_hero): ?>
    <!-- Hero -->
    <?php get_template_part('template-parts/citas-medicas/seccion', 'hero', array('class' => '')); ?>
    <!-- Fin Hero -->
  <?php endif; ?>

  <?php if ($mostrar_texto_imagen_cta): ?>
    <!-- Texto Imagen -->
    <?php get_template_part('template-parts/citas-medicas/seccion', 'texto-imagen-cta'); ?>
    <!-- Fin Texto Imagen -->
  <?php endif; ?>

  <?php if ($mostrar_targetas_grid): ?>
    <!-- Targetas Grid -->
    <?php get_template_part('template-parts/citas-medicas/seccion', 'targetas-grid'); ?>
    <!-- Fin Targetas Grid -->
  <?php endif; ?>

  <?php if ($mostrar_alianza): ?>
    <!-- Alianza -->
    <?php get_template_part('template-parts/citas-medicas/seccion', 'alianzas'); ?>
    <!-- Fin Alianza -->
  <?php endif; ?>

  <?php if ($mostrar_texto_imagen_fondo): ?>
    <!-- Texto Imagen Fondo -->
    <?php get_template_part('template-parts/citas-medicas/seccion', 'texto-imagen-fondo-cta'); ?>
    <!-- Fin Texto Imagen Fondo -->
  <?php endif; ?>

  <?php get_template_part('template-parts/especialidades/seccion', 'flotante-contacto');?>

</main>
<!-- FIN CONTENIDO -->
<?php get_footer(); ?>