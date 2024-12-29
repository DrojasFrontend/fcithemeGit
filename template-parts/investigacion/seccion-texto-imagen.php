<?php 
$sitename                 = esc_html(get_bloginfo('name'));
$grupo_texto_imagen       = get_field('grupo_texto_imagen');
$subtitulo                = !empty($grupo_texto_imagen['subtitulo']) ? esc_html($grupo_texto_imagen['subtitulo']) : '';
$titulo                   = !empty($grupo_texto_imagen['titulo']) ? esc_html($grupo_texto_imagen['titulo']) : '';
$descripcion              = !empty($grupo_texto_imagen['descripcion']) ? $grupo_texto_imagen['descripcion'] : '';
$imagen_id                = !empty($grupo_texto_imagen["imagen"]['ID']) ? $grupo_texto_imagen["imagen"]['ID'] : '';
$items                    = !empty($grupo_texto_imagen['items']) ? $grupo_texto_imagen['items'] : [];
?>

<section class="investigacionTextoImagenCTA">
  <div class="container--large">
    <div class="investigacionTextoImagenCTA__flex">
      <div class="investigacionTextoImagenCTA__col">
        <div class="investigacionTextoImagenCTA__info">
          <?php if($subtitulo) : ?>
            <p class="subheading color--002D72 uppercase"><?php echo $subtitulo;?></p>
          <?php endif; ?>

          <?php if($titulo) : ?>
            <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
          <?php endif; ?>

          <?php if($descripcion) : ?>
            <p class="heading--18 color--263956">
              <?php echo $descripcion;?>
            </p>
          <?php endif; ?>
          
          <?php if ($items) : ?>
            <div class="investigacionTextoImagenCTA__items">
              <?php foreach ($items as $key => $item) { ?>
                <div class="investigacionTextoImagenCTA__item">
                  <span class="heading--48 color--002D72">
                    <?php echo $item['cantidad']?>
                  </span>
                  <h3 class="heading--14 color--263956">
                    <?php echo $item['detalle']?>
                  </h3>
                </div>
              <?php } ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="investigacionTextoImagenCTA__col">
        <div class="investigacionTextoImagenCTA__img">
          <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
        </div>
      </div>
    </div>
  </div>
</section>