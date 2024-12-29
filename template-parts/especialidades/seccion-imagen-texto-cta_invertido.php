<?php 
$sitename                           = esc_html(get_bloginfo('name'));
$grupo_imagen_texto_cta_invertido   = get_field('grupo_imagen_texto_cta_invertido');
$posicion                           = !empty($grupo_imagen_texto_cta_invertido['posicion']) ? esc_html($grupo_imagen_texto_cta_invertido['posicion']) : '';
$subtitulo                          = !empty($grupo_imagen_texto_cta_invertido['subtitulo']) ? esc_html($grupo_imagen_texto_cta_invertido['subtitulo']) : '';
$titulo                             = !empty($grupo_imagen_texto_cta_invertido['titulo']) ? esc_html($grupo_imagen_texto_cta_invertido['titulo']) : '';
$descripcion                        = !empty($grupo_imagen_texto_cta_invertido['descripcion']) ? wp_kses_post($grupo_imagen_texto_cta_invertido['descripcion']) : '';
$cta                                = !empty($grupo_imagen_texto_cta_invertido['cta']) ? $grupo_imagen_texto_cta_invertido['cta'] : [];
$cta_url                            = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_titulo                         = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_target                         = !empty($cta['target']) ? $cta['target'] : '';

$imagen_id                          = !empty($grupo_imagen_texto_cta_invertido["imagen"]['ID']) ? $grupo_imagen_texto_cta_invertido["imagen"]['ID'] : '';
?>

<section class="etapaEspecialidadesImagenTextoCTA <?php echo isset($args['class']) ? $args['class'] : ''; ?> estilo-invertido" style="order: <?php echo $posicion; ?>">
  <div class="container--large">
    <div class="etapaEspecialidadesImagenTextoCTA__flex">
      <div class="etapaEspecialidadesImagenTextoCTA__col">
        <div class="etapaEspecialidadesImagenTextoCTA__img">
          <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
        </div>
      </div>
      <div class="etapaEspecialidadesImagenTextoCTA__col">
        <div class="etapaEspecialidadesImagenTextoCTA__info">
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
    </div>
  </div>
</section>