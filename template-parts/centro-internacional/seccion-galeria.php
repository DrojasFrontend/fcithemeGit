<?php 
$sitename         = esc_html(get_bloginfo('name'));
$grupo_galeria    = get_field("grupo_galeria");
$subtitulo        = !empty($grupo_galeria["subtitulo"]) ? esc_html($grupo_galeria["subtitulo"]) : '';
$titulo           = !empty($grupo_galeria["titulo"]) ? esc_html($grupo_galeria["titulo"]) : '';
$descripcion      = !empty($grupo_galeria["descripcion"]) ? $grupo_galeria["descripcion"] : '';
$galerias         = !empty($grupo_galeria["galerias"]) ? $grupo_galeria["galerias"] : '';
?>

<section class="seccionGaleria">
  <div class="seccionGaleria__fondo">
    <div class="container--large">
      <div class="seccionGaleria__titulo">
        <?php if($subtitulo) : ?>
          <p class="heading--14 color--002D72 uppercase"><?php echo $subtitulo;?></p>
        <?php endif; ?>
        
        <?php if($titulo) : ?>
          <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
        <?php endif; ?>
        
        <?php if($descripcion) : ?>
          <p class="heading--18 color--263956"><?php echo $descripcion;?></p>
        <?php endif; ?>
      </div>
    </div>

    <div class="swiper swiperGaleria">
      <div class="swiper-wrapper">
        <?php foreach ($galerias as $key => $galeria) { 
          $imagen_id = !empty($galeria["imagen"]['ID']) ? $galeria["imagen"]['ID'] : ''; 
          $detalle   = !empty($galeria["detalle"]) ? esc_html($galeria["detalle"]) : '';
        ?>
          <div class="swiper-slide">
            <div class="seccionGaleria__img">
              <?php echo generar_imagen_responsive($imagen_id, 'custom-size-2x', $sitename, ''); ?>
              <?php if($detalle) { ?>
                <div class="seccionGaleria__detalle">
                  <h3 class="heading--30 color--002D72"><?php echo $detalle; ?></h3>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="swiper-custom-button swiper-button-next-gal"></div>
    <div class="swiper-custom-button swiper-button-prev-gal"></div>
    <div class="swiper-pagination-gal"></div>
  </div>
</section>
