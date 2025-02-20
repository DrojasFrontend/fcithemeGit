<?php 
$sitename               = esc_html(get_bloginfo('name'));
$grupo_targetas_grid    = get_field('grupo_targetas_grid');
$posicion               = !empty($grupo_targetas_grid['posicion']) ? esc_html($grupo_targetas_grid['posicion']) : '';
$fondo                  = !empty($grupo_targetas_grid['fondo']) ? $grupo_targetas_grid['fondo'] : '';
$subtitulo              = !empty($grupo_targetas_grid['subtitulo']) ? esc_html($grupo_targetas_grid['subtitulo']) : '';
$titulo                 = !empty($grupo_targetas_grid['titulo']) ? esc_html($grupo_targetas_grid['titulo']) : '';
$items                  = $grupo_targetas_grid['items'];
?>

<section class="etapaTrasplanteTargetaGrid <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
  <div class="etapaTrasplanteTargetaGrid__fondo" style="background-color: <?php echo $fondo; ?>">
    <div class="container--large">
      <div class="etapaTrasplanteTargetaGrid__titulo">
        <?php if($subtitulo):?>
          <p class="subheading color--002D72"><?php echo $subtitulo; ?></p>
        <?php endif; ?>

        <?php if($titulo):?>
          <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
        <?php endif; ?>
      </div>
      <div class="etapaTrasplanteTargetaGrid__grid">
        <?php foreach ($items as $key => $item) {
          $targeta_titulo       = !empty($item['titulo']) ? esc_html($item['titulo']) : '';
		      $cta                  = !empty($item['cta']) ? esc_url($item['cta']) : '';
          $targeta_descripcion  = !empty($item['descripcion']) ? $item['descripcion'] : '';
          $imagen_id            = !empty($item["imagen"]['ID']) ? $item["imagen"]['ID'] : '';
        ?>
          <div class="etapaTrasplanteTargetaGrid__col">
            <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
            <div class="etapaTrasplanteTargetaGrid__info">
              <?php if($targeta_titulo):?>
                <h3 class="heading--24 color--002D72"><?php echo $targeta_titulo; ?></h3>
              <?php endif; ?>

              <?php if($targeta_descripcion):?>
                <p class="heading--18 color--263956">
                  <?php echo $targeta_descripcion; ?>
                </p>
              <?php endif; ?>

              <?php if($cta):?>
                <a href="<?php echo $cta['url']; ?>">
                  Ver video
                </a>
              <?php endif; ?>
            </div>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</section>