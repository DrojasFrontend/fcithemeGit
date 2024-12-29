<?php 
$sitename       = esc_html(get_bloginfo('name'));
$grupo_carusel  = get_field('grupo_carusel');
$slides         = !empty($grupo_carusel['slides']) ? $grupo_carusel['slides'] : [];
?>

<div class="investigacionesHeroCarusel">
  <div class="swiper swiperHero">
    <div class="swiper-wrapper">
      <?php 
        $slide_counter = 0; 
        foreach ($slides as $key => $slide) {
          $titulo       = !empty($slide['titulo']) ? esc_html($slide['titulo']) : '';
          $descripcion  = !empty($slide['descripcion']) ? esc_html($slide['descripcion']) : '';
          $cta          = !empty($slide['cta']) ? $slide['cta'] : [];
          $cta_url      = !empty($cta['url']) ? esc_url($cta['url']) : '';
          $cta_titulo   = !empty($cta['title']) ? esc_html($cta['title']) : '';
          $cta_target   = !empty($cta['target']) ? $cta['target'] : '';
          $imagen_id    = !empty($slide["imagen"]['ID']) ? $slide["imagen"]['ID'] : '';
          
          $slide_counter++;
      ?>
        <div class="swiper-slide">
          <div class="investigacionesHeroCarusel__fondo desktop">
            <div></div>
            <div>
              <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
            </div>
          </div>
          <div class="container--large">
            <div class="investigacionesHeroCarusel__grid">
              <div class="investigacionesHeroCarusel__text">
                <?php if($titulo) : ?>
                  <<?php echo ($slide_counter === 1) ? 'h1' : 'h2'; ?> class="heading--64 color--fff fw-400">
                    <?php echo $titulo;?>
                  </<?php echo ($slide_counter === 1) ? 'h1' : 'h2'; ?>>
                <?php endif; ?>

                <?php if($descripcion) : ?>
                  <p class="heading--18 color--fff">
                    <?php echo $descripcion;?>
                  </p>
                <?php endif; ?>

                <?php if ($cta_url) : ?>
                  <a href="<?php echo $cta_url;?>" class="boton-v2 boton-v2--blanco-rojo" target="<?php echo $cta_target;?>">
                    <?php 
                      get_template_part('template-parts/content', 'icono');
                      display_icon('ico-email'); 
                    ?>
                    <?php echo $cta_titulo;?>
                  </a>
                <?php endif; ?>
              </div>
              <div class="investigacionesHeroCarusel__img">
                <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <div class="investigacionesHeroCarusel__paginacion">
    <div class="container--large">
      <div class="swiper-pagination swiper-pagination-her"></div>
    </div>
  </div>
  <div class="swiper-custom-button swiper-button-next-her"></div>
  <div class="swiper-custom-button swiper-button-prev-her"></div>
</div>