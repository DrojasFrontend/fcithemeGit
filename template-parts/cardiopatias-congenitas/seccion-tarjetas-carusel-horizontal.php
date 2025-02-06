<?php 
$sitename                           = esc_html(get_bloginfo('name'));
// $grupo_tarjetas_horizontal_carusel  = get_field('grupo_tarjetas_horizontal_carusel');
// $fondo                              = !empty($grupo_tarjetas_horizontal_carusel['fondo']) ? $grupo_tarjetas_horizontal_carusel['fondo'] : '';
// $subtitulo                          = !empty($grupo_tarjetas_horizontal_carusel['subtitulo']) ? esc_html($grupo_tarjetas_horizontal_carusel['subtitulo']) : '';
// $titulo                             = !empty($grupo_tarjetas_horizontal_carusel['titulo']) ? esc_html($grupo_tarjetas_horizontal_carusel['titulo']) : '';
// $items                              = !empty($grupo_tarjetas_horizontal_carusel['items']) ? $grupo_tarjetas_horizontal_carusel['items'] : [];

$subtitulo = "TESTIMONIOS DE NUESTROS PACIENTES";
$titulo = "Corazones renovados";
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
          // foreach ($items as $key => $item) {
          //   $targeta_titulo       = !empty($item['titulo']) ? $item['titulo'] : '';
          //   $targeta_descripcion  = !empty($item['descripcion']) ? $item['descripcion'] : '';
          //   $targeta_cta          = !empty($item['cta']) ? $item['cta'] : [];
          //   $targeta_cta_url      = !empty($targeta_cta['url']) ? $targeta_cta['url'] : "";
          //   $targeta_cta_titulo   = !empty($targeta_cta['title']) ? $targeta_cta['title'] : "";
          //   $targeta_cta_target   = !empty($targeta_cta['target']) ? $targeta_cta['target'] : "";
          //   $imagen_id            = !empty($item["imagen"]['ID']) ? $item["imagen"]['ID'] : '';
          ?>
          <?php for ($i=0; $i < 2; $i++) { 
            $targeta_titulo = "Conoce la historia de Keisy";
            $targeta_descripcion = "Ella es Keysi, un corazón Dominicano que no ha dejado de soñar. Esta pequeña nació hace 11 años con una cardiopatía congénita y desde sus primeros días de vida, recibió su atención en la Fundación Cardioinfantil – LaCardio, en donde junto a su familia han vivido importantes momentos que han marcado su vida.";
            $imagen_id = "/wp-content/themes/fcitheme/template-parts/cardiopatias-congenitas/img/text-img.png";
            $tarjeta_cta_url      = "#";
            $tarjeta_cta_titulo   = "Apoya nuestra causa";
            $tarjeta_cta_target   = "";
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

                  <a class="boton-v2 boton-v2--rojo-rojo" 
                    href="<?php echo esc_url($tarjeta_cta_url); ?>" 
                    title="<?php echo esc_attr($tarjeta_cta_titulo); ?>">
                    <?php echo esc_html($tarjeta_cta_titulo); ?>
                  </a>
                </div>
                <!-- <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?> -->
                <img src="<?php echo $imagen_id; ?>" alt="">
              </div>
            </div>
          <?php } ?>
          <?php /* } */?>
        </div>
      </div>
      <div class="swiper-custom-button swiper-button-next-hor"></div>
      <div class="swiper-custom-button swiper-button-prev-hor"></div>
      <div class="swiper-pagination-hor"></div>
    </div>
  </div>
</section>