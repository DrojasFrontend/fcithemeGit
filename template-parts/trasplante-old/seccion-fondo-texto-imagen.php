<?php 
$sitename                 = esc_html(get_bloginfo('name'));
$grupo_fondo_texto_img    = get_field('grupo_fondo_texto_img');
$posicion                 = !empty($grupo_fondo_texto_img['posicion']) ? esc_html($grupo_fondo_texto_img['posicion']) : '';
$fondo                    = !empty($grupo_fondo_texto_img['fondo']) ? $grupo_fondo_texto_img['fondo'] : '';
$subtitulo                = !empty($grupo_fondo_texto_img['subtitulo']) ? esc_html($grupo_fondo_texto_img['subtitulo']) : '';
$titulo                   = !empty($grupo_fondo_texto_img['titulo']) ? esc_html($grupo_fondo_texto_img['titulo']) : '';
$descripcion              = !empty($grupo_fondo_texto_img['descripcion']) ? wp_kses_post($grupo_fondo_texto_img['descripcion']) : '';
$cta                      = !empty($grupo_fondo_texto_img['cta']) ? $grupo_fondo_texto_img['cta'] : [];
$cta_url                  = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_titulo               = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_target               = !empty($cta['target']) ? $cta['target'] : '';

$imagen_id                = !empty($grupo_fondo_texto_img["imagen"]['ID']) ? $grupo_fondo_texto_img["imagen"]['ID'] : '';
?>

<section class="etapaTrasplanteFondoTextImg <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
  <div class="container--large">
    <div class="etapaTrasplanteFondoTextImg__fondo" style="background-color: <?php echo $fondo; ?>">
      <div class="etapaTrasplanteFondoTextImg__grid">
        <div class="etapaTrasplanteFondoTextImg__info">
          <?php if($subtitulo) : ?>
              <p class="subheading color--002D72 uppercase"><?php echo $subtitulo;?></p>
            <?php endif; ?>

            <?php if($titulo) : ?>
              <h2 class="heading--48 color--0C2448"><?php echo $titulo;?></h2>
            <?php endif; ?>

            <?php if($descripcion) : ?>
              <p class="heading--18 color--0C2448">
                <?php echo $descripcion;?>
              </p>
            <?php endif; ?>

            <?php if ($cta_url) : ?>
              <a href="<?php echo $cta_url;?>" class="boton-v2 boton-v2--blanco-rojo" target="<?php echo $cta_target;?>">
                <?php echo $cta_titulo;?>
              </a>
            <?php endif; ?>
        </div>
        <div class="etapaTrasplanteFondoTextImg__img">
          <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
        </div>
      </div>
    </div>
  </div>
</section>