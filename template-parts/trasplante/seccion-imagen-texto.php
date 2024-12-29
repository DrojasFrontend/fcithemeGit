<?php 
$sitename            = esc_html(get_bloginfo('name'));
$grupo_imagen_texto  = get_field('grupo_imagen_texto');
$posicion            = !empty($grupo_imagen_texto['posicion']) ? esc_html($grupo_imagen_texto['posicion']) : '';
$subtitulo           = !empty($grupo_imagen_texto['subtitulo']) ? esc_html($grupo_imagen_texto['subtitulo']) : '';
$titulo              = !empty($grupo_imagen_texto['titulo']) ? esc_html($grupo_imagen_texto['titulo']) : '';
$descripcion         = !empty($grupo_imagen_texto['descripcion']) ? $grupo_imagen_texto['descripcion'] : '';

$imagen_id           = !empty($grupo_imagen_texto["imagen"]['ID']) ? $grupo_imagen_texto["imagen"]['ID'] : '';
?>

<section class="paginaTrasplantesImagenTexto <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
  <div class="container--large">
    <div class="paginaTrasplantesImagenTexto__flex">
      <div class="paginaTrasplantesImagenTexto__col">
        <div class="paginaTrasplantesImagenTexto__img">
          <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
        </div>
      </div>
      <div class="paginaTrasplantesImagenTexto__col">
        <div class="paginaTrasplantesImagenTexto__info">
          <?php if($subtitulo) : ?>
            <p class="subheading color--263956 uppercase"><?php echo $subtitulo;?></p>
          <?php endif; ?>

          <?php if($titulo) : ?>
            <h2 class="heading--48 color--263956"><?php echo $titulo;?></h2>
          <?php endif; ?>

          <?php if($descripcion) : ?>
            <div class="heading--18 color--263956">
              <?php echo $descripcion;?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>