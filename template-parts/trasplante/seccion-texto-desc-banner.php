<?php 
$sitename                 = esc_html(get_bloginfo('name'));
$grupo_texto_desc_banner  = get_field('grupo_texto_desc_banner');
$posicion                 = !empty($grupo_texto_desc_banner['posicion']) ? esc_html($grupo_texto_desc_banner['posicion']) : '';
$fondo                    = !empty($grupo_texto_desc_banner['fondo']) ? esc_html($grupo_texto_desc_banner['fondo']) : '';
$subtitulo                = !empty($grupo_texto_desc_banner['subtitulo']) ? esc_html($grupo_texto_desc_banner['subtitulo']) : '';
$titulo                   = !empty($grupo_texto_desc_banner['titulo']) ? esc_html($grupo_texto_desc_banner['titulo']) : '';
$descripcion              = !empty($grupo_texto_desc_banner['descripcion']) ? $grupo_texto_desc_banner['descripcion'] : '';
$descripcion_2            = !empty($grupo_texto_desc_banner['descripcion_2']) ? $grupo_texto_desc_banner['descripcion_2'] : '';

$imagen_id                = !empty($grupo_texto_desc_banner["imagen"]['ID']) ? $grupo_texto_desc_banner["imagen"]['ID'] : '';
?>
<section class="paginaTrasplanteTextDescBanner <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>; background-color: <?php echo $fondo; ?>">
  <div class="container--large">
    <div class="paginaTrasplanteTextDescBanner__grid">
      <div class="paginaTrasplanteTextDescBanner__title">
        <?php if($subtitulo) : ?>
          <p class="subheading color--002D72">
          <?php echo $subtitulo; ?>
          </p>
        <?php endif ?>

        <?php if($titulo) : ?>
          <h2 class="heading--48 color--002D72">
            <?php echo $titulo; ?>
          </h2>
        <?php endif ?>
        
      </div>
      <div class="paginaTrasplanteTextDescBanner__info">
        <?php if($descripcion) : ?>
          <p class="heading--18 color--263956">
            <?php echo $descripcion; ?>
          </p>
        <?php endif ?>
      </div>
    </div>
  </div>
  <div class="container--large paginaTrasplanteTextDescBanner__container">
    <div class="paginaTrasplanteTextDescBanner__img">
      <?php echo generar_imagen_responsive($imagen_id, 'custom-size-2x', $sitename, '');?>
    </div>
  </div>
  <?php if($descripcion_2) : ?>
    <div class="container--large">
      <div class="paginaTrasplanteTextDescBanner__desc">
        <p class="heading--18 color--263956">
        <?php echo $descripcion_2; ?>
        </p>
      </div>
    </div>
  <?php endif ?>
</section>