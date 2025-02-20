<?php 
// $sitename                 = esc_html(get_bloginfo('name'));
	$grupo_texto_imagen       = get_field('grupo_texto_imagen');
	$subtitulo                = !empty($grupo_texto_imagen['subtitulo']) ? esc_html($grupo_texto_imagen['subtitulo']) : '';
	$titulo                   = !empty($grupo_texto_imagen['titulo']) ? esc_html($grupo_texto_imagen['titulo']) : '';
	$descripcion              = !empty($grupo_texto_imagen['descripcion']) ? wp_kses_post($grupo_texto_imagen['descripcion']) : '';
	$imagen_id                = !empty($grupo_texto_imagen["imagen"]) ? $grupo_texto_imagen["imagen"] : '';
	$video_url                = !empty($grupo_texto_imagen["video_url"]) ? esc_url($grupo_texto_imagen["video_url"]) : '';
 	$cta                      = !empty($grupo_texto_imagen['cta']) ? $grupo_texto_imagen["cta"] : '';

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
              <p><?php echo $descripcion;?></p>
            <?php endif; ?>
          </div>
          <?php
              if (is_array($cta) && isset($cta['url'], $cta['title'], $cta['target'])) :
                  $url = $cta['url'];
                  $texto = $cta['title'];
                  $target = $cta['target'] ? $cta['target'] : '_self';
          ?>
          <a class="boton-v2 boton-v2--rojo-rojo" 
              href="<?php echo esc_url($url); ?>" 
              target="<?php echo esc_attr($target); ?>">
              <?php echo esc_html($texto); ?>
          </a>
          <?php endif; ?>
        </div>
      </div>
    <div class="seccionTextoDescImagen__col">
      <div class="seccionTextoDescImagen__img">
        <?php if (!empty($imagen_id)) : ?>
            <img src="<?php echo esc_url($imagen_id['url']); ?>" alt=""
                 class="video-thumbnail" 
                 data-video="<?php echo esc_attr($video_url); ?>">
          <?php endif; ?>
      </div>
    </div>
  </div>
</section>
	
<div id="videoModal" class="seccionTextoDescImagenModal">
  <div class="video-modal__content">
    <span class="video-modal__close">&times;</span>
    <div class="video-modal__video">
      <iframe id="videoIframe" width="700" height="315" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
  </div>
</div>