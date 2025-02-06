<?php 
// $sitename                 = esc_html(get_bloginfo('name'));
// $grupo_texto_imagen       = get_field('grupo_texto_imagen');
// $subtitulo                = !empty($grupo_texto_imagen['subtitulo']) ? esc_html($grupo_texto_imagen['subtitulo']) : '';
// $titulo                   = !empty($grupo_texto_imagen['titulo']) ? esc_html($grupo_texto_imagen['titulo']) : '';
// $descripcion              = !empty($grupo_texto_imagen['descripcion']) ? wp_kses_post($grupo_texto_imagen['descripcion']) : '';
// $imagen_id                = !empty($grupo_texto_imagen["imagen"]['ID']) ? $grupo_texto_imagen["imagen"]['ID'] : '';

$imagen_id = "/wp-content/themes/fcitheme/template-parts/cardiopatias-congenitas/img/text-img.png";
$subtitulo = "SALVAMOS CORAZONES";
$titulo = "Brigadas de salud: Regale una vida";
$descripcion = "En el país 1 de cada 100 niños nace con una cardiopatía congénita, nuestra misión es realizar diagnósticos oportunos que puedan salvar el corazón de niños, niñas y adolescentes que por sus bajos recursos no pueden acceder a los servicios de salud.";

$hero_cta_url      = "#";
$hero_cta_titulo   = "Conoce más";
$hero_cta_target   = "";
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

          <a class="boton-v2 boton-v2--rojo-rojo" 
            href="<?php echo esc_url($hero_cta_url); ?>" 
            title="<?php echo esc_attr($hero_cta_titulo); ?>">
            <?php echo esc_html($hero_cta_titulo); ?>
          </a>
        </div>
      </div>
    <div class="seccionTextoDescImagen__col">
      <div class="seccionTextoDescImagen__img">
        <!-- <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?> -->
        <img src="<?php echo $imagen_id; ?>" alt="">
      </div>
    </div>
  </div>
</section>