<?php 
$sitename                 = esc_html(get_bloginfo('name'));
// $grupo_imagen_texto_cta   = get_field('grupo_imagen_texto_cta');
// $posicion                 = !empty($grupo_imagen_texto_cta['posicion']) ? esc_html($grupo_imagen_texto_cta['posicion']) : '';
// $subtitulo                = !empty($grupo_imagen_texto_cta['subtitulo']) ? esc_html($grupo_imagen_texto_cta['subtitulo']) : '';
// $titulo                   = !empty($grupo_imagen_texto_cta['titulo']) ? esc_html($grupo_imagen_texto_cta['titulo']) : '';
// $descripcion              = !empty($grupo_imagen_texto_cta['descripcion']) ? wp_kses_post($grupo_imagen_texto_cta['descripcion']) : '';
// $cta                      = !empty($grupo_imagen_texto_cta['cta']) ? $grupo_imagen_texto_cta['cta'] : [];
// $cta_url                  = !empty($cta['url']) ? esc_url($cta['url']) : '';
// $cta_titulo               = !empty($cta['title']) ? esc_html($cta['title']) : '';
// $cta_target               = !empty($cta['target']) ? $cta['target'] : '';

// $imagen_id                = !empty($grupo_imagen_texto_cta["imagen"]['ID']) ? $grupo_imagen_texto_cta["imagen"]['ID'] : '';

$imagen_id = "/wp-content/themes/fcitheme/template-parts/cardiopatias-congenitas/img/text-img.png";
$imagen_id_mobile = "";
$subtitulo = "CUJIDADO PERSONALIZADO";
$titulo = "Tratamiento de las cardiopatías";
$descripcion = "Una persona nacida con un defecto cardíaco congénito a menudo puede ser tratada con éxito durante la infancia. Sin embargo, en algunos casos, la afección cardíaca puede no requerir reparación en la niñez, o los síntomas pueden no detectarse hasta la edad adulta. <br><br> El tratamiento de las cardiopatías congénitas en adultos depende del tipo específico de afección cardíaca y de su gravedad. Si la afección es leve, los chequeos médicos regulares pueden ser el único tratamiento necesario.<br><br> Otros tratamientos para las cardiopatías congénitas en adultos pueden incluir medicamentos y cirugía.";
?>

<section class="etapaEspecialidadesImagenTextoCTA <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
  <div class="container--large">
    <div class="etapaEspecialidadesImagenTextoCTA__flex">
      <div class="etapaEspecialidadesImagenTextoCTA__col">
        <div class="etapaEspecialidadesImagenTextoCTA__img">
          <!-- <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?> -->
          <img src="<?php echo $imagen_id; ?>" alt="">
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