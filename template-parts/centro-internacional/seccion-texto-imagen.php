<?php 
$sitename                 = esc_html(get_bloginfo('name'));
$grupo_texto_imagen       = get_field('grupo_texto_imagen');
$subtitulo                = !empty($grupo_texto_imagen['subtitulo']) ? esc_html($grupo_texto_imagen['subtitulo']) : '';
$titulo                   = !empty($grupo_texto_imagen['titulo']) ? esc_html($grupo_texto_imagen['titulo']) : '';
$descripcion              = !empty($grupo_texto_imagen['descripcion']) ? wp_kses_post($grupo_texto_imagen['descripcion']) : '';

$imagen_id                = !empty($grupo_texto_imagen["imagen"]['ID']) ? $grupo_texto_imagen["imagen"]['ID'] : '';
?>

<section class="seccionTextoDescImagen">
  <div class="container--large">
    <div class="seccionTextoDescImagen__grid estilo-1">
      <div class="seccionTextoDescImagen__col">
        <div class="seccionTextoDescImagen__contenido">
          <?php if($subtitulo) : ?>
            <p class="heading--14 color--002D72 uppercase"><?php echo $subtitulo;?></p>
          <?php endif; ?>

          <?php if($titulo) : ?>
            <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
          <?php endif; ?>

          <div class="seccionTextoDescImagen__info">
            <?php if($descripcion) : ?>
              <?php echo $descripcion;?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <div class="seccionTextoDescImagen__col">
      <div class="seccionTextoDescImagen__img">
        <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
      </div>
    </div>
  </div>
</section>