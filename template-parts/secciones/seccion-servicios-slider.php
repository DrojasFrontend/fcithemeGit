<?php
$sitename       = esc_html(get_bloginfo('name'));
$grupo_alianza  = get_field("grupo_alianza");
$subtitulo      = !empty($grupo_alianza["subtitulo"]) ? esc_html($grupo_alianza["subtitulo"]) : '';
$titulo         = !empty($grupo_alianza["titulo"]) ? esc_html($grupo_alianza["titulo"]) : '';
$galerias       = !empty($grupo_alianza["galeria"]) ? $grupo_alianza["galeria"] : [];

?>
<section class="seccionServiciosSlider">
  <div class="container--large">
    <div class="seccionServiciosSlider__title">
      <?php if($subtitulo) : ?>
        <p class="subheading color--002D72"><?php echo $subtitulo;?></p>
      <?php endif; ?>

      <?php if($titulo) : ?>
        <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
      <?php endif; ?>
    </div>
  </div>

  <div class="seccionServiciosSlider__container">
    <div class="slickServiciosHome slickPersonalizado">
      <?php foreach ($galerias as $galeria) { 
        $imagen_id   = !empty($galeria["imagen"]['ID']) ? $galeria["imagen"]['ID'] : '';
        $cta_link    = !empty($galeria["cta"]['url']) ? esc_url($galeria["cta"]['url']) : '';
        $cta_title   = !empty($galeria["cta"]['title']) ? esc_html($galeria["cta"]['title']) : '';
        $cta_target  = !empty($galeria["cta"]['target']) ? $galeria["cta"]['target'] : '';
      ?>
        <div class="seccionServiciosSlider__padding">
          <a href="<?php echo $cta_link; ?>" class="seccionServiciosSlider__img" title="<?php echo $cta_title; ?>" target="<?php echo $cta_target; ?>">
            <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</section>