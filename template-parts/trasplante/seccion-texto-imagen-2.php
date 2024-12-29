<?php 
$sitename             = esc_html(get_bloginfo('name'));
$grupo_texto_imagen_2 = get_field('grupo_texto_imagen_2');
$posicion             = !empty($grupo_texto_imagen_2['posicion']) ? esc_html($grupo_texto_imagen_2['posicion']) : '';
$fondo                = !empty($grupo_texto_imagen_2['fondo']) ? esc_html($grupo_texto_imagen_2['fondo']) : '';
$subtitulo            = !empty($grupo_texto_imagen_2['subtitulo']) ? esc_html($grupo_texto_imagen_2['subtitulo']) : '';
$titulo               = !empty($grupo_texto_imagen_2['titulo']) ? esc_html($grupo_texto_imagen_2['titulo']) : '';
$descripcion          = !empty($grupo_texto_imagen_2['descripcion']) ? wp_kses_post($grupo_texto_imagen_2['descripcion']) : '';

$imagen_id           = !empty($grupo_texto_imagen_2["imagen"]['ID']) ? $grupo_texto_imagen_2["imagen"]['ID'] : '';
?>

<section class="paginaTrasplanteTextoImagen <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>; background-color: <?php echo $fondo; ?>">
  <div class="container--large">
    <div class="paginaTrasplanteTextoImagen__flex">
      <div class="paginaTrasplanteTextoImagen__col">
        <div class="paginaTrasplanteTextoImagen__info">
          <?php if($subtitulo) : ?>
            <p class="subheading color--002D72 uppercase"><?php echo $subtitulo;?></p>
          <?php endif; ?>

          <?php if($titulo) : ?>
            <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
          <?php endif; ?>

          <?php if($descripcion) : ?>
            <div class="copy">
              <?php echo $descripcion;?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <div class="paginaTrasplanteTextoImagen__col">
      <div class="paginaTrasplanteTextoImagen__img">
        <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
      </div>
    </div>
  </div>
</section>