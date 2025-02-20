<?php 
$sitename                 = esc_html(get_bloginfo('name'));
  $grupo_imagen_texto_cta   = get_field('grupo_texto_imagen_cta2');
// $posicion                 = !empty($grupo_imagen_texto_cta['posicion']) ? esc_html($grupo_imagen_texto_cta['posicion']) : '';
  $subtitulo                = !empty($grupo_imagen_texto_cta['subtitulo']) ? esc_html($grupo_imagen_texto_cta['subtitulo']) : '';
  $titulo                   = !empty($grupo_imagen_texto_cta['titulo']) ? esc_html($grupo_imagen_texto_cta['titulo']) : '';
  $descripcion              = !empty($grupo_imagen_texto_cta['descripcion']) ? wp_kses_post($grupo_imagen_texto_cta['descripcion']) : '';
// $cta                      = !empty($grupo_imagen_texto_cta['cta']) ? $grupo_imagen_texto_cta['cta'] : [];
// $cta_url                  = !empty($cta['url']) ? esc_url($cta['url']) : '';
// $cta_titulo               = !empty($cta['title']) ? esc_html($cta['title']) : '';
// $cta_target               = !empty($cta['target']) ? $cta['target'] : '';

  $imagen_id                = !empty($grupo_imagen_texto_cta["imagen"]) ? $grupo_imagen_texto_cta["imagen"] : '';
?>

<section class="etapaEspecialidadesImagenTextoCTA <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
  <div class="container--large">
    <div class="etapaEspecialidadesImagenTextoCTA__flex">
      <div class="etapaEspecialidadesImagenTextoCTA__col">
        <div class="etapaEspecialidadesImagenTextoCTA__img">
          <!-- <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?> -->
          <img src="<?php echo esc_url($imagen_id['url']); ?>" alt="">
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
            <div class="heading--18 color--263956">
              <?php echo $descripcion;?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

</section>