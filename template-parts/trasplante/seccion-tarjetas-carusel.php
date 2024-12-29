<?php 
$sitename                 = esc_html(get_bloginfo('name'));
$grupo_tarjetas_carusel   = get_field('grupo_tarjetas_carusel');
$posicion                 = !empty($grupo_tarjetas_carusel['posicion']) ? esc_html($grupo_tarjetas_carusel['posicion']) : '';
$fondo                    = !empty($grupo_tarjetas_carusel['fondo']) ? $grupo_tarjetas_carusel['fondo'] : '';
$subtitulo                = !empty($grupo_tarjetas_carusel['subtitulo']) ? esc_html($grupo_tarjetas_carusel['subtitulo']) : '';
$titulo                   = !empty($grupo_tarjetas_carusel['titulo']) ? esc_html($grupo_tarjetas_carusel['titulo']) : '';
$items                    = !empty($grupo_tarjetas_carusel['items']) ? $grupo_tarjetas_carusel['items'] : [];
?>

<section class="paginaTrasplanteTarjetaCarusel <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
  <div class="paginaTrasplanteTarjetaCarusel__fondo" style="background-color: <?php echo $fondo;?>">
    <div class="container--large">
      <div class="paginaTrasplanteTarjetaCarusel__titulo">
        <?php if($subtitulo) : ?>
          <p class="subheading color--002D72 uppercase"><?php echo $subtitulo;?></p>
        <?php endif; ?>
      
        <?php if($titulo) : ?>
          <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
        <?php endif; ?>
      </div>

      <div class="swiper swiperTarjetas">
        <div class="swiper-wrapper paginaTrasplanteTarjetaCarusel__grid">
          <?php foreach ($items as $key => $item) {
            $targeta_titulo       = !empty($item['titulo']) ? esc_html($item['titulo']) : '';
            $targeta_descripcion  = !empty($item['descripcion']) ? $item['descripcion'] : '';
            $targeta_cta          = !empty($item['cta']) ? $item['cta'] : [];
            $targeta_cta_url      = !empty($targeta_cta['url']) ? $targeta_cta['url'] : "";
            $targeta_cta_titulo   = !empty($targeta_cta['title']) ? $targeta_cta['title'] : "";
            $targeta_cta_target   = !empty($targeta_cta['target']) ? $targeta_cta['target'] : "";
            $imagen_id            = !empty($item["imagen"]['ID']) ? $item["imagen"]['ID'] : '';
          ?>
            <div class="swiper-slide">
              <a href="<?php echo $targeta_cta_url; ?>" class="paginaTrasplanteTarjetaCarusel__col">
                <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
                <div class="paginaTrasplanteTarjetaCarusel__info">
                  <?php if($targeta_titulo):?>
                    <h3 class="heading--24 color--002D72"><?php echo $targeta_titulo; ?></h3>
                  <?php endif; ?>
        
                  <?php if($targeta_descripcion):?>
                    <p class="heading--18 color--677283">
                      <?php echo $targeta_descripcion; ?>
                    </p>
                  <?php endif; ?>

                  <?php if($targeta_cta_titulo) : ?>
                    <span class="heading--18 color--E40046">
                      <span class="link--hover"><?php echo $targeta_cta_titulo; ?></span>
                      <?php 
                        get_template_part('template-parts/content', 'icono');
                        display_icon('icono-arrow-next-rojo'); 
                      ?>
                    </span>
                  <?php endif; ?>
                </div>
              </a>
            </div>
          <?php }?>
        </div>
      </div>
      <div class="swiper-custom-button swiper-button-next"></div>
      <div class="swiper-custom-button swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>