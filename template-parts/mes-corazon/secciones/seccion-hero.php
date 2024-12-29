<?php 
$sitename           = esc_html(get_bloginfo('name'));
$grupo_banner       = get_field('grupo_banner');
$imagen_id          = !empty($grupo_banner["imagen"]['ID']) ? $grupo_banner["imagen"]['ID'] : '';
$imagen_mobile_id   = !empty($grupo_banner["imagen_mobile"]['ID']) ? $grupo_banner["imagen_mobile"]['ID'] : '';
$imagen_pequena_id  = !empty($grupo_banner["imagen_pequena"]['ID']) ? $grupo_banner["imagen_pequena"]['ID'] : '';

?>
<section class="paginaMesCorazonHero">
  <div class="paginaMesCorazonHero__fondo">
    <?php echo generar_imagen_responsive($imagen_id, 'custom-size-x2', $sitename, 'desktop');?>
    <?php echo generar_imagen_responsive($imagen_mobile_id, 'custom-size', $sitename, 'mobile');?>
  </div>
  <div class="paginaMesCorazonHero__contenido">
    <div class="container--large">
      <div class="paginaMesCorazonHero__corazon">
        <h1 class="sr-only">Mes del corazon</h1>
        <?php echo generar_imagen_responsive($imagen_pequena_id, 'custom-size', $sitename, '');?>
      </div>
    </div>
  </div>
</section>