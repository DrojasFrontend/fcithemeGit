<?php 
$sitename         = esc_html(get_bloginfo('name'));
$grupo_tarjetas   = get_field('grupo_tarjetas');
$fondo            = !empty($grupo_tarjetas['fondo']) ? $grupo_tarjetas['fondo'] : '';
$subtitulo        = !empty($grupo_tarjetas['subtitulo']) ? esc_html($grupo_tarjetas['subtitulo']) : '';
$titulo           = !empty($grupo_tarjetas['titulo']) ? esc_html($grupo_tarjetas['titulo']) : '';
$items            = !empty($grupo_tarjetas['tarjetas']) ? $grupo_tarjetas['tarjetas'] : [];

?>

<section class="investigacionTarjetas">
  <div class="investigacionTarjetas__fondo" style="background-color: <?php echo $fondo;?>">
    <div class="container--large">
      <div class="investigacionTarjetas__tiulo">
        <?php if($subtitulo) : ?>
          <p class="subheading color--002D72 uppercase"><?php echo $subtitulo;?></p>
        <?php endif; ?>
      
        <?php if($titulo) : ?>
          <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
        <?php endif; ?>
      </div>

      <div class="swiper swiperTarjetas swiperDestroy">
        <div class="swiper-wrapper investigacionTarjetas__grid">
            <?php foreach ($items as $key => $item) {
              $targeta_titulo       = !empty($item['titulo']) ? esc_html($item['titulo']) : '';
              $targeta_descripcion  = !empty($item['descripcion']) ? $item['descripcion'] : '';
              $targeta_cta          = !empty($item['cta']) ? $item['cta'] : [];
              $targeta_cta_url      = $targeta_cta['url'];
              $targeta_cta_titulo   = $targeta_cta['title'];
              $targeta_cta_target   = $targeta_cta['target'];
              $imagen_id            = !empty($item["imagen"]['ID']) ? $item["imagen"]['ID'] : '';
            ?>
            <div class="swiper-slide">
              <a href="<?php echo $targeta_cta_url; ?>" class="investigacionTarjetas__col">
                <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
                <div class="investigacionTarjetas__info">
                  <?php if($targeta_titulo):?>
                    <h3 class="heading--24 color--002D72"><?php echo $targeta_titulo; ?></h3>
                  <?php endif; ?>
        
                  <?php if($targeta_descripcion):?>
                    <p class="heading--18 color--263956">
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
      <div class="swiper-pagination swiper-pagination-tar"></div>
    </div>
  </div>
</section>