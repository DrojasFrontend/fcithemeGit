<?php 
$sitename                 = esc_html(get_bloginfo('name'));
  $grupo_tarjetas_carusel   = get_field('grupo_tarjetas_carusel');
// $posicion                 = !empty($grupo_tarjetas_carusel['posicion']) ? esc_html($grupo_tarjetas_carusel['posicion']) : '';
  $fondo                    = !empty($grupo_tarjetas_carusel['fondo']) ? $grupo_tarjetas_carusel['fondo'] : '';
  $subtitulo                = !empty($grupo_tarjetas_carusel['subtitulo']) ? esc_html($grupo_tarjetas_carusel['subtitulo']) : '';
  $titulo                   = !empty($grupo_tarjetas_carusel['titulo']) ? esc_html($grupo_tarjetas_carusel['titulo']) : '';
// $items                    = !empty($grupo_tarjetas_carusel['items']) ? $grupo_tarjetas_carusel['items'] : [];

$args = array(
  'post_type' => 'diario_medico',
  'posts_per_page' => 10,
  'post_status' => 'publish',
  'orderby' => 'date',
  'order' => 'ASC'
);

$query = new WP_Query($args); 
?>

<section class="seccionTarjetasCarusel">
  <div class="seccionTarjetasCarusel__fondo" style="background-color: <?php echo $fondo;?>">
    <div class="container--large">
      <div class="seccionTarjetasCarusel__titulo">
        <?php if($subtitulo) : ?>
          <p class="subheading color--002D72 uppercase"><?php echo $subtitulo;?></p>
        <?php endif; ?>
      
        <?php if($titulo) : ?>
          <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
        <?php endif; ?>
      </div>
    </div>

    <div class="container--large"> 
      <div class="swiper swiperTarjetas">
          <div class="swiper-wrapper seccionTarjetasCarusel__grid">
              <?php while ($query->have_posts()) : $query->the_post(); 
                  $imagen_id = get_post_thumbnail_id();
                  $targeta_titulo = get_the_title();
                  $targeta_descripcion = get_the_excerpt();
                  $targeta_cta_url = get_permalink();
                  $targeta_cta_titulo = 'Seguir leyendo';
              ?>
              <div class="swiper-slide">
                  <a href="<?php echo esc_url($targeta_cta_url); ?>" class="seccionTarjetasCarusel__col">
                      <img src="<?php echo wp_get_attachment_url($imagen_id); ?>" alt="">
                      <div class="seccionTarjetasCarusel__info">
                          <h3 class="heading--24 color--002D72"><?php echo esc_html($targeta_titulo); ?></h3>
                          <p class="heading--18 color--677283"><?php echo wp_trim_words($targeta_descripcion, 20, '...'); ?></p>
                          <span class="heading--18 color--E40046">
                              <span class="link--hover"><?php echo esc_html($targeta_cta_titulo); ?></span>
                              <?php 
                                  get_template_part('template-parts/content', 'icono');
                                  display_icon('icono-arrow-next-rojo'); 
                              ?>
                          </span>
                      </div>
                  </a>
              </div>
              <?php endwhile; wp_reset_postdata(); ?>
          </div>
      </div>
      <div class="swiper-custom-button swiper-button-next"></div>
      <div class="swiper-custom-button swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
  </div>
  </div>
</section>