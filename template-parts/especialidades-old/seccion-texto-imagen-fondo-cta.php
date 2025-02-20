<?php 
$sitename                       = esc_html(get_bloginfo('name'));
$grupo_texto_imagen_cta_fondo   = get_field('grupo_texto_imagen_cta_fondo');
$posicion                       = !empty($grupo_texto_imagen_cta_fondo['posicion']) ? esc_html($grupo_texto_imagen_cta_fondo['posicion']) : '';
$subtitulo                      = !empty($grupo_texto_imagen_cta_fondo['subtitulo']) ? esc_html($grupo_texto_imagen_cta_fondo['subtitulo']) : '';
$titulo                         = !empty($grupo_texto_imagen_cta_fondo['titulo']) ? esc_html($grupo_texto_imagen_cta_fondo['titulo']) : '';
$descripcion                    = !empty($grupo_texto_imagen_cta_fondo['descripcion']) ? esc_html($grupo_texto_imagen_cta_fondo['descripcion']) : '';
$cta                            = !empty($grupo_texto_imagen_cta_fondo['cta']) ? $grupo_texto_imagen_cta_fondo['cta'] : [];
$cta_url                        = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_titulo                     = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_target                     = !empty($cta['target']) ? $cta['target'] : '';

$imagen_id                      = !empty($grupo_texto_imagen_cta_fondo["imagen"]['ID']) ? $grupo_texto_imagen_cta_fondo["imagen"]['ID'] : '';
?>

<section class="etapaEspecialidadesTextoImagenFondoCTA" style="order: <?php echo $posicion; ?>">
  <div class="container--large">
    <div class="etapaEspecialidadesTextoImagenFondoCTA__flex">
      <div class="etapaEspecialidadesTextoImagenFondoCTA__col">
        <div class="etapaEspecialidadesTextoImagenFondoCTA__info">

          <?php if($subtitulo) : ?>
            <p class="subheading color--263956 uppercase"><?php echo $subtitulo;?></p>
          <?php endif; ?>

          <?php if($titulo) : ?>
            <h2 class="heading--48 color--263956"><?php echo $titulo;?></h2>
          <?php endif; ?>

          <?php if($descripcion) : ?>
            <p class="heading--18 color--263956">
              <?php echo $descripcion;?>
            </p>
          <?php endif; ?>

          <?php if ($cta_url) : ?>
            <a href="<?php echo $cta_url;?>" class="boton-v2 boton-v2--rojo-rojo" target="<?php echo $cta_target;?>">
              <?php echo $cta_titulo;?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    <div class="etapaEspecialidadesTextoImagenFondoCTA__col">
      <div class="etapaEspecialidadesTextoImagenFondoCTA__img">
        <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
      </div>
    </div>
  </div>
</section>