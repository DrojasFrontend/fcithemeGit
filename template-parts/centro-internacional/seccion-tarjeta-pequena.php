<?php 
$sitename = esc_html(get_bloginfo('name'));
$grupo_garantias = get_field("grupo_garantias");
$subtitulo      = !empty($grupo_garantias["subtitulo"]) ? esc_html($grupo_garantias["subtitulo"]) : '';
$titulo         = !empty($grupo_garantias["titulo"]) ? esc_html($grupo_garantias["titulo"]) : '';
$descripcion    = !empty($grupo_garantias["descripcion"]) ? $grupo_garantias["descripcion"] : '';
$items          = !empty($grupo_garantias["items"]) && is_array($grupo_garantias["items"]) ? $grupo_garantias["items"] : [];
?>

<section class="seccionTarjetaPequena">
  <div class="container--large">
    <div class="seccionTarjetaPequena__titulo">
      <?php if ($subtitulo): ?>
        <p class="heading--14 color--002D72"><?php echo $subtitulo; ?></p>
      <?php endif; ?>
      <?php if ($titulo): ?>
        <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
      <?php endif; ?>
    </div>

    <div class="seccionTarjetaPequena__tarjetas">
      <?php foreach ($items as $key => $item) { 
        $nombre    = !empty($item["nombre"]) ? esc_html($item["nombre"]) : '';
        $detalle   = !empty($item["detalle"]) ? esc_html($item["detalle"]) : '';
        $imagen_id = !empty($item["imagen"]['ID']) ? $item["imagen"]['ID'] : '';
      ?>
        <div class="seccionTarjetaPequena__tarjeta">
          <div class="seccionTarjetaPequena__img">
            <?php echo generar_imagen_responsive($imagen_id, 'custom-size-2x', $sitename, 'desktop'); ?>
          </div>
          <div class="seccionTarjetaPequena__info">
            <?php if ($nombre): ?>
              <h3 class="heading--24 color--002D72"><?php echo $nombre; ?></h3>
            <?php endif; ?>
            <?php if ($detalle): ?>
              <p class="font-sans heading--18 color--263956"><?php echo $detalle; ?></p>
            <?php endif; ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>