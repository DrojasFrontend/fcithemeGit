<?php 
$sitename                 = esc_html(get_bloginfo('name'));
$grupo_texto_imagen_cta   = get_field('grupo_texto_imagen_cta_2');
$posicion                 = !empty($grupo_texto_imagen_cta['posicion']) ? esc_html($grupo_texto_imagen_cta['posicion']) : '';
$subtitulo                = !empty($grupo_texto_imagen_cta['subtitulo']) ? esc_html($grupo_texto_imagen_cta['subtitulo']) : '';
$titulo                   = !empty($grupo_texto_imagen_cta['titulo']) ? esc_html($grupo_texto_imagen_cta['titulo']) : '';
$descripcion              = !empty($grupo_texto_imagen_cta['descripcion']) ? $grupo_texto_imagen_cta['descripcion'] : '';
$cta                      = !empty($grupo_texto_imagen_cta['cta']) ? $grupo_texto_imagen_cta['cta'] : [];
$cta_url                  = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_titulo               = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_target               = !empty($cta['target']) ? $cta['target'] : '';

$imagen_id                = !empty($grupo_texto_imagen_cta["imagen"]['ID']) ? $grupo_texto_imagen_cta["imagen"]['ID'] : '';
?>

<section class="etapaEspecialidadesTextoImagenCTA estilo-2 <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
  <div class="wrapper">
    <div class="etapaEspecialidadesTextoImagenCTA__flex">
      <div class="etapaEspecialidadesTextoImagenCTA__col">
        <div class="etapaEspecialidadesTextoImagenCTA__info">
          <?php if($subtitulo) : ?>
            <p class="subheading color--002D72 uppercase"><?php echo $subtitulo;?></p>
          <?php endif; ?>

          <?php if($titulo) : ?>
            <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
          <?php endif; ?>

          <?php if($descripcion) : ?>
            <div class="heading--18 color--263956 text">
              <?php echo $descripcion;?>
            </div>
          <?php endif; ?>

          <?php if ($cta_url) : ?>
            <a href="<?php echo $cta_url;?>" class="boton-v2 boton-v2--blanco-rojo" target="<?php echo $cta_target;?>">
              <?php echo $cta_titulo;?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    <div class="etapaEspecialidadesTextoImagenCTA__col">
      <div class="etapaEspecialidadesTextoImagenCTA__img">
        <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
      </div>
    </div>
  </div>
</section>