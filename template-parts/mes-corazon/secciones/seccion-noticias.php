<?php 
$grupo_noticias   = get_field('grupo_noticias');
$subtitulo        = $grupo_noticias['subtitulo'];
$titulo           = $grupo_noticias['titulo'];
$cta              = $grupo_noticias['cta'];

$cta_title        = $cta['title'];
$cta_url          = $cta['url'];
$cta_target       = $cta['target'];

$noticias         = $grupo_noticias['noticias'];

if( $noticias ): 
  $post_count = count($noticias);
?>
<section class="paginaMesCorazonNoticias <?php echo $post_count <= 3 ? 'hiden' : ''?>">
  <div class="paginaMesCorazonNoticias__fondo">
    <div class="container--large">
      <div class="paginaMesCorazonNoticias__titulo">
        <div>
          <?php if($subtitulo): ?>
          <p class="heading--14 color--002D72"><?php echo $subtitulo; ?></p>
          <?php endif; ?>

          <?php if($titulo): ?>
          <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
          <?php endif; ?>
        </div>
        <a href="<?php echo $cta_url; ?>" class="boton-v2 boton-v2--blanco-rojo" title="mas noticas" target="<?php echo $cta_target; ?>"><?php echo $cta_title; ?></a>
      </div>
      <div class="swiper swiperMesCorazonNoticias">
        <div class="swiper-wrapper">
          <?php foreach( $noticias as $post ): ?>
            <?php setup_postdata($post); ?>
            <div class="swiper-slide">
              <div class="paginaMesCorazonNoticias__slide">
                <div class="paginaMesCorazonNoticias__img">
                  <?php if( has_post_thumbnail() ): ?>
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url($post, 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                  <?php endif; ?>
                </div>
                <div class="paginaMesCorazonNoticias__info">
                  <h3 class="heading--24 color--002D72"><?php echo esc_html(get_the_title()); ?></h3>
                  <p class="heading--18 color--677283">
                    <?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?>
                  </p>
                  <span class="heading--12 color--677283">
                    <?php echo esc_html(get_the_date('d F, Y')); ?> - <?php echo esc_html(get_field('tiempo_lectura')); ?> min de lectura
                  </span>
                  <span class="link-hover">
                    <span>Leer Noticia</span>
                    <?php 
                      get_template_part('template-parts/content', 'icono');
                      display_icon('arrow-rojo'); 
                    ?>
                  </span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
      
      <div class="swiper-custom-button swiper-button-next-noti"></div>
      <div class="swiper-custom-button swiper-button-prev-noti"></div>
      <div class="swiper-pagination-noti"></div>
      
    </div>
    <div class="paginaMesCorazonNoticias__bottom">
      <a href="#" class="boton-v2 boton-v2--blanco-rojo">Ver todas las noticias</a>
    </div>
  </div>
</section>
<?php endif; ?>