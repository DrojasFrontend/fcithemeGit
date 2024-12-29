<?php 
$sitename      = esc_html(get_bloginfo('name'));
$grupo_videos  = get_field('grupo_videos');
$posicion      = !empty($grupo_videos['posicion']) ? esc_html($grupo_videos['posicion']) : '';
$fondo         = !empty($grupo_videos['fondo']) ? $grupo_videos['fondo'] : '';
$subtitulo     = !empty($grupo_videos['subtitulo']) ? esc_html($grupo_videos['subtitulo']) : '';
$titulo        = !empty($grupo_videos['titulo']) ? esc_html($grupo_videos['titulo']) : '';
$items         = !empty($grupo_videos['videos']) ? $grupo_videos['videos'] : [];
?>

<section class="paginaTrasplanteVideos" style="order: <?php echo $posicion; ?>">
  <div class="paginaTrasplanteVideos__fondo" style="background-color: <?php echo $fondo; ?>">
    <div class="container--large">
      <div class="paginaTrasplanteVideos__titulo">
        <?php if($subtitulo):?>
          <p class="subheading color--002D72"><?php echo $subtitulo; ?></p>
        <?php endif; ?>
    
        <?php if($titulo):?>
          <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
        <?php endif; ?>
      </div>
    </div>
    
    <div class="paginaTrasplanteVideos__videos">
      <div class="swiper swiperVideos">
        <div class="swiper-wrapper">
          <?php foreach ($items as $key => $item) { ?>
            <div class="swiper-slide">
              <?php echo $item['codigo']?>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="swiper-custom-button swiper-button-next-vid"></div>
      <div class="swiper-custom-button swiper-button-prev-vid"></div>
      <div class="swiper-pagination-vid"></div>
    </div>
  </div>
</section>