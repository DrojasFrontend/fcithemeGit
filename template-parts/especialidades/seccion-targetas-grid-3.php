<?php 
$sitename               = esc_html(get_bloginfo('name'));
$grupo_targetas_grid_3    = get_field('grupo_targetas_grid_3');
$posicion               = !empty($grupo_targetas_grid_3['posicion']) ? esc_html($grupo_targetas_grid_3['posicion']) : '';
$fondo                  = !empty($grupo_targetas_grid_3['fondo']) ? $grupo_targetas_grid_3['fondo'] : '';
$subtitulo              = !empty($grupo_targetas_grid_3['subtitulo']) ? esc_html($grupo_targetas_grid_3['subtitulo']) : '';
$titulo                 = !empty($grupo_targetas_grid_3['titulo']) ? esc_html($grupo_targetas_grid_3['titulo']) : '';
$descripcion            = !empty($grupo_targetas_grid_3['descripcion']) ? $grupo_targetas_grid_3['descripcion'] : '';
$items                  = !empty($grupo_targetas_grid_3['items']) ? $grupo_targetas_grid_3['items'] : [];
?>

<section class="etapaEspecialidadesTargetaGrid <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
  <div class="etapaEspecialidadesTargetaGrid__fondo" style="background-color: <?php echo $fondo; ?>">
    <div class="wrapper">
      <div class="etapaEspecialidadesTargetaGrid__titulo">
        <?php if($subtitulo):?>
          <p class="subheading color--002D72"><?php echo $subtitulo; ?></p>
        <?php endif; ?>

        <?php if($titulo):?>
          <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
        <?php endif; ?>

        <?php if($descripcion):?>
          <div class="descripcion heading--18 color--263956"><?php echo $descripcion; ?></div>
        <?php endif; ?>
      </div>
      <div class="etapaEspecialidadesTargetaGrid__grid">
        <?php foreach ($items as $key => $item) {
          $targeta_titulo       = !empty($item['titulo']) ? $item['titulo'] : '';
          $targeta_descripcion  = !empty($item['descripcion']) ? $item['descripcion'] : '';
          $imagen_id            = !empty($item["imagen"]['ID']) ? $item["imagen"]['ID'] : '';
        ?>
          <div class="etapaEspecialidadesTargetaGrid__col">
            <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
            <div class="etapaEspecialidadesTargetaGrid__info">
              <?php if($targeta_titulo):?>
                <h3 class="heading--24 color--002D72"><?php echo $targeta_titulo; ?></h3>
              <?php endif; ?>

              <?php if($targeta_descripcion):?>
                <div class="heading--18 color--263956">
                  <?php echo $targeta_descripcion; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</section>