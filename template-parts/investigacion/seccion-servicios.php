<?php 
$sitename          = esc_html(get_bloginfo('name'));
$grupo_servicios   = get_field('grupo_servicios');
$fondo             = !empty($grupo_servicios['fondo']) ? $grupo_servicios['fondo'] : '';
$subtitulo         = !empty($grupo_servicios['subtitulo']) ? esc_html($grupo_servicios['subtitulo']) : '';
$titulo            = !empty($grupo_servicios['titulo']) ? esc_html($grupo_servicios['titulo']) : '';
$items             = !empty($grupo_servicios['servicios']) ? $grupo_servicios['servicios'] : [];
?>
<section class="investigacionServicios">
  <div class="investigacionServicios__fondo" style="background-color: <?php echo $fondo; ?>">
    <div class="container--large">
      <div class="investigacionServicios__titulo">
        <?php if($subtitulo):?>
          <p class="subheading color--002D72"><?php echo $subtitulo; ?></p>
        <?php endif; ?>

        <?php if($titulo):?>
          <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
        <?php endif; ?>
      </div>

      <div class="swiper swiperServicios">
        <div class="swiper-wrapper">

        <?php foreach ($items as $key => $item) {
          $targeta_titulo       = !empty($item['titulo']) ? esc_html($item['titulo']) : '';
          $imagen_id            = !empty($item["imagen"]) ? $item["imagen"] : '';
        ?>
          <div class="swiper-slide">
            <div class="investigacionServicios__tarjeta">
              <img src="<?php echo $imagen_id; ?>" alt="<?php echo $targeta_titulo; ?>" title="mas sobre <?php echo $targeta_titulo; ?>">
              <h3 class="heading--24 color--002D72"><?php echo $targeta_titulo; ?></h3>
            </div>
          </div>
        <?php }?>
        </div>
      </div>

      <div class="swiper-custom-button swiper-button-prev-ser"></div>
      <div class="swiper-custom-button swiper-button-next-ser"></div>
      <div class="swiper-pagination-ser"></div>
    </div>
  </div>
</section>