<?php 
$sitename                 = esc_html(get_bloginfo('name'));
$grupo_texto_imagen       = get_field('grupo_texto_imagen');
$posicion                 = !empty($grupo_texto_imagen['posicion']) ? esc_html($grupo_texto_imagen['posicion']) : '';
$subtitulo                = !empty($grupo_texto_imagen['subtitulo']) ? esc_html($grupo_texto_imagen['subtitulo']) : '';
$titulo                   = !empty($grupo_texto_imagen['titulo']) ? esc_html($grupo_texto_imagen['titulo']) : '';
$descripcion              = !empty($grupo_texto_imagen['descripcion']) ? wp_kses_post($grupo_texto_imagen['descripcion']) : '';
$cta                      = !empty($grupo_texto_imagen['cta']) ? $grupo_texto_imagen['cta'] : [];
$cta_url                  = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_titulo               = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_target               = !empty($cta['target']) ? $cta['target'] : '';

$imagen_id                = !empty($grupo_texto_imagen["imagen"]['ID']) ? $grupo_texto_imagen["imagen"]['ID'] : '';
?>

<section class="paginaTrasplanteTextoImagen <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
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
            <p class="heading--18 color--263956">
              <?php echo $descripcion;?>
            </p>
          <?php endif; ?>

          <?php if ($cta_url) : ?>
            <a href="<?php echo $cta_url;?>" class="boton-v2 boton-v2--blanco-rojo" target="<?php echo $cta_target;?>">
              <?php echo $cta_titulo;?>
            </a>
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