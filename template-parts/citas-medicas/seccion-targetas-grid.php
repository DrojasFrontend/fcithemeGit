<?php 
$sitename               = esc_html(get_bloginfo('name'));
$grupo_targetas_grid    = get_field('grupo_targetas_grid');
$fondo                  = !empty($grupo_targetas_grid['fondo']) ? $grupo_targetas_grid['fondo'] : '';
$subtitulo              = !empty($grupo_targetas_grid['subtitulo']) ? esc_html($grupo_targetas_grid['subtitulo']) : '';
$titulo                 = !empty($grupo_targetas_grid['titulo']) ? esc_html($grupo_targetas_grid['titulo']) : '';
$items                  = !empty($grupo_targetas_grid['items']) ? $grupo_targetas_grid['items'] : [];
?>

<section class="citasMedicasTargetaGrid">
  <div class="citasMedicasTargetaGrid__fondo" style="background-color: <?php echo $fondo; ?>">
    <div class="wrapper">
      <div class="citasMedicasTargetaGrid__titulo">
        <?php if($subtitulo):?>
          <p class="subheading color--002D72"><?php echo $subtitulo; ?></p>
        <?php endif; ?>

        <?php if($titulo):?>
          <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
        <?php endif; ?>
      </div>
      <div class="citasMedicasTargetaGrid__grid">
        <?php foreach ($items as $key => $item) {
          $targeta_titulo       = !empty($item['titulo']) ? esc_html($item['titulo']) : '';
          $targeta_descripcion  = !empty($item['descripcion']) ? $item['descripcion'] : '';
          $imagen_id            = !empty($item["imagen"]['ID']) ? $item["imagen"]['ID'] : '';
        ?>
          <div class="citasMedicasTargetaGrid__col">
            <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
            <div class="citasMedicasTargetaGrid__info">
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