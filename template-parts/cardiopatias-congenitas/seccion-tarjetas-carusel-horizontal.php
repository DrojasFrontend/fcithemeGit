<?php 
$sitename                           = esc_html(get_bloginfo('name'));
  $grupo_tarjetas_horizontal_carusel  = get_field('grupo_tarjetas_horizontal_carusel');
// $fondo                              = !empty($grupo_tarjetas_horizontal_carusel['fondo']) ? $grupo_tarjetas_horizontal_carusel['fondo'] : '';
  $subtitulo                          = !empty($grupo_tarjetas_horizontal_carusel['subtitulo']) ? esc_html($grupo_tarjetas_horizontal_carusel['subtitulo']) : '';
  $titulo                             = !empty($grupo_tarjetas_horizontal_carusel['titulo']) ? esc_html($grupo_tarjetas_horizontal_carusel['titulo']) : '';
  $items                              = !empty($grupo_tarjetas_horizontal_carusel['items']) ? $grupo_tarjetas_horizontal_carusel['items'] : [];
?>

<section class="seccionTarjetasHorizontalCarusel">
  <div class="seccionTarjetasHorizontalCarusel__fondo">
    <div class="container--large">
      <div class="seccionTarjetasHorizontalCarusel__titulo">
        <?php if($subtitulo) : ?>
          <p class="subheading color--002D72 uppercase"><?php echo $subtitulo;?></p>
        <?php endif; ?>
      
        <?php if($titulo) : ?>
          <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
        <?php endif; ?>
      </div>

      <div class="swiper swiperTarjetasHorizontal">
        <div class="swiper-wrapper">
          <?php 
          foreach ($items as $key => $item) {
            $targeta_titulo       = !empty($item['titulo']) ? $item['titulo'] : '';
            $targeta_descripcion  = !empty($item['descripcion']) ? $item['descripcion'] : '';
            $targeta_cta          = !empty($item['cta']) ? $item['cta'] : [];
            $targeta_cta_url      = !empty($targeta_cta['url']) ? $targeta_cta['url'] : "";
            $targeta_cta_titulo   = !empty($targeta_cta['title']) ? $targeta_cta['title'] : "";
            $targeta_cta_target   = !empty($targeta_cta['target']) ? $targeta_cta['target'] : "";
            $imagen_id            = !empty($item["imagen"]) ? $item["imagen"] : '';
          ?>
            <div class="swiper-slide">
              <div class="seccionTarjetasHorizontalCarusel__grid">
                <div class="seccionTarjetasHorizontalCarusel__info">
                  <?php if($targeta_titulo):?>
                    <h3 class="heading--36 color--002D72"><?php echo $targeta_titulo; ?></h3>
                  <?php endif; ?>
        
                  <?php if($targeta_descripcion):?>
                    <p class="heading--18 color--677283">
                      <?php echo $targeta_descripcion; ?>
                    </p>
                  <?php endif; ?>

                  <?php
                      if (is_array($targeta_cta) && isset($targeta_cta['url'], $targeta_cta['title'], $targeta_cta['target'])) :
                          $url = $targeta_cta['url'];
                          $texto = $targeta_cta['title'];
                          $target = $targeta_cta['target'] ? $targeta_cta['target'] : '_self';
                  ?>
                  <a class="boton-v2 boton-v2--rojo-rojo" 
                    href="<?php echo esc_url($url); ?>" 
                    target="<?php echo esc_attr($target); ?>">
                    <?php echo esc_html($texto); ?>
                  </a>
                  <?php endif; ?>
                </div>
                <!-- <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?> -->
                <img src="<?php echo esc_url($imagen_id['url']); ?>" alt="">
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="swiper-custom-button swiper-button-next-hor"></div>
      <div class="swiper-custom-button swiper-button-prev-hor"></div>
      <div class="swiper-pagination-hor"></div>
    </div>
  </div>
</section>