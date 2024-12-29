<?php 
$grupo_expertos = get_field("grupo_expertos");
$subtitulo      = !empty($grupo_expertos['subtitulo']) ? esc_html($grupo_expertos['subtitulo']) : "";
$titulo         = !empty($grupo_expertos['titulo']) ? esc_html($grupo_expertos['titulo']) : "";
$expertos       = $grupo_expertos['expertos'];

$post_count = count($expertos);
?>
<section class="paginaMesCorazonExpertos <?php  echo $post_count <= 3 ? 'hiden' : ''?>">
  <div class="paginaMesCorazonExpertos__fondo">
    <div class="container--large">
      <div class="paginaMesCorazonExpertos__titulo">
        <?php if ($subtitulo) : ?>
          <p class="heading--14 color--002D72"><?php echo $subtitulo; ?></p>
        <?php endif; ?>

        <?php if ($titulo) : ?>
          <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
        <?php endif; ?>
      </div>

      <div class="swiper swiperMesCorazonExpertos">
        <div class="swiper-wrapper">
          <?php foreach ($expertos as $experto_id) { 
            $experto_post = get_post($experto_id);
            if ($experto_post) {
              $nombre = get_the_title($experto_post);
              $rol = get_field('specialties_doctor', $experto_id); 
              $imagen = get_field('image_doctor', $experto_id);
              $perfil_url = get_permalink($experto_id); 
          ?>
            <div class="swiper-slide">
              <a href="<?php echo esc_url($perfil_url); ?>"  class="paginaMesCorazonExpertos__slide" title="doctor - <?php echo esc_html($nombre); ?>">
                <div class="paginaMesCorazonExpertos__img">
                  <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($nombre); ?>">
                </div>
                <div class="paginaMesCorazonExpertos__info">
                  <h3 class="heading--24 color--002D72"><?php echo esc_html($nombre); ?></h3>
                  <p class="heading--18 color--677283 ff--sans"><?php echo esc_html($rol); ?></p>
                  <span class="link-hover">
                    <span>Ver perfil</span>
                    <?php 
                      get_template_part('template-parts/content', 'icono');
                      display_icon('arrow-rojo'); 
                    ?>
                  </span>
                </div>
              </a>
            </div>
          <?php } } ?>
        </div>
      </div>
      <div class="swiper-custom-button swiper-button-next-exp"></div>
      <div class="swiper-custom-button swiper-button-prev-exp"></div>
      <div class="swiper-pagination-exp"></div>
    </div>
  </div>
</section>