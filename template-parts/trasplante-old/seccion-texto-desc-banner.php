<?php 
$sitename                 = esc_html(get_bloginfo('name'));
$grupo_texto_desc_banner  = get_field('grupo_texto_desc_banner');
$posicion                 = !empty($grupo_texto_desc_banner['posicion']) ? esc_html($grupo_texto_desc_banner['posicion']) : '';
$subtitulo                = !empty($grupo_texto_desc_banner['subtitulo']) ? esc_html($grupo_texto_desc_banner['subtitulo']) : '';
$titulo                   = !empty($grupo_texto_desc_banner['titulo']) ? esc_html($grupo_texto_desc_banner['titulo']) : '';
$descripcion              = !empty($grupo_texto_desc_banner['descripcion']) ? $grupo_texto_desc_banner['descripcion'] : '';
$descripcion_2            = !empty($grupo_texto_desc_banner['descripcion_2']) ? $grupo_texto_desc_banner['descripcion_2'] : '';

$imagen_id                = !empty($grupo_texto_desc_banner["imagen"]['ID']) ? $grupo_texto_desc_banner["imagen"]['ID'] : '';
?>
<section class="etapaTrasplanteTextDescBanner <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
  <div class="container--large">
    <div class="etapaTrasplanteTextDescBanner__grid">
      <div class="etapaTrasplanteTextDescBanner__title">
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
      <div class="etapaTrasplanteTextDescBanner__info">
        <?php if($descripcion) : ?>
          <p class="heading--18 color--263956">
            <?php echo $descripcion; ?>
          </p>
        <?php endif ?>
      </div>
    </div>
  </div>
  <div class="container--large etapaTrasplanteTextDescBanner__container">
    <div class="etapaTrasplanteTextDescBanner__img">
      <?php echo generar_imagen_responsive($imagen_id, 'custom-size-2x', $sitename, '');?>
    </div>
  </div>
  <?php if($descripcion_2) : ?>
    <div class="container--large">
      <div class="etapaTrasplanteTextDescBanner__desc">
        <p class="heading--18 color--263956">
        <?php echo $descripcion_2; ?>
        </p>
      </div>
    </div>
  <?php endif ?>
</section>