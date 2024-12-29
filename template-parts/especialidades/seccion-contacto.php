<?php 
$sitename         = esc_html(get_bloginfo('name'));
$grupo_contacto   = get_field('grupo_contacto');
$posicion         = !empty($grupo_contacto['posicion']) ? esc_html($grupo_contacto['posicion']) : '';
$subtitulo        = !empty($grupo_contacto['subtitulo']) ? esc_html($grupo_contacto['subtitulo']) : '';
$titulo           = !empty($grupo_contacto['titulo']) ? esc_html($grupo_contacto['titulo']) : '';
$items            = !empty($grupo_contacto['items']) ? $grupo_contacto['items'] : [];
$cta              = !empty($grupo_contacto['cta']) ? $grupo_contacto['cta'] : [];
$cta_url          = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_titulo       = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_target       = !empty($cta['target']) ? $cta['target'] : '';

$imagen_id        = !empty($grupo_contacto["imagen"]['ID']) ? $grupo_contacto["imagen"]['ID'] : '';
?>

<section class="etapaEspecialidadesTextoImagenFondoCTA <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
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

          <?php 
            if (!empty($items) && is_array($items)) : ?>
                <?php foreach ($items as $key => $item) : 
                    $icono = isset($item['icono']) ? esc_url($item['icono']) : '';
                    $texto = isset($item['texto']) ? $item['texto'] : '';
                    if ($icono || $texto) : ?>
                      <div class="item">
                        <?php if ($icono) : ?>
                          <img width="24" height="24" src="<?php echo $icono; ?>" alt="icono">
                        <?php endif; ?>
                        <?php if ($texto) : ?>
                          <?php echo $texto; ?>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

          <?php if ($cta_url) : ?>
            <a href="<?php echo $cta_url;?>" class="boton-v2 boton-v2--blanco-rojo" target="<?php echo $cta_target;?>">
              <?php 
                if (function_exists('display_icon')) {
                  display_icon('ico-whatsapp');
                } 
              ?>
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