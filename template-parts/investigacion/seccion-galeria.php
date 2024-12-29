<?php
$sitename       = esc_html(get_bloginfo('name'));
$grupo_galeria  = get_field('grupo_galeria');
$fondo          = !empty($grupo_galeria['fondo']) ? $grupo_galeria['fondo'] : '';
$titulo         = !empty($grupo_galeria['titulo']) ? $grupo_galeria['titulo'] : '';
$galeria        = !empty($grupo_galeria['galeria']) ? $grupo_galeria['galeria'] : [];
?>

<section class="investigacionGaleria">
  <div class="investigacionGaleria__fondo" style="background-color: <?php echo $fondo; ?>">
    <div class="container--large">
      <div class="investigacionGaleria__titulo">
        <?php if($titulo) : ?>
          <h2 class="heading--36 color--002D72 fw-400 text-transform-none"><?php echo $titulo;?></h2>
        <?php endif; ?>
      </div>
    </div>
    <div class="swiper swiperGaleria">
      <div class="swiper-wrapper">
        <?php foreach ($galeria as $key => $imagen) { 
          $imagen_id = !empty($imagen['ID']) ? $imagen['ID'] : '';
        ?>
          <div class="swiper-slide">
            <div class="investigacionGaleria__imagen">
              <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="swiper-custom-button swiper-button-prev-gal"></div>
    <div class="swiper-custom-button swiper-button-next-gal"></div>
    <div class="swiper-pagination-gal"></div>
  </div>
</section>
