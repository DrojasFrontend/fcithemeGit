<?php 
$sitename               = esc_html(get_bloginfo('name'));
$grupo_tarjetas         = get_field('grupo_tarjetas');
$posicion               = !empty($grupo_tarjetas['posicion']) ? esc_html($grupo_tarjetas['posicion']) : '';
$fondo                  = !empty($grupo_tarjetas['fondo']) ? $grupo_tarjetas['fondo'] : '';
$subtitulo              = !empty($grupo_tarjetas['subtitulo']) ? esc_html($grupo_tarjetas['subtitulo']) : '';
$titulo                 = !empty($grupo_tarjetas['titulo']) ? esc_html($grupo_tarjetas['titulo']) : '';
$items                  = !empty($grupo_tarjetas['items']) ? $grupo_tarjetas['items'] : [];
?>

<section class="paginaTrasplanteTarjetas" style="order: <?php echo $posicion; ?>">
  <div class="paginaTrasplanteTarjetas__fondo" style="background-color: <?php echo $fondo; ?>">
    <div class="container--large">
      <div class="paginaTrasplanteTarjetas__titulo">
        <?php if($subtitulo):?>
          <p class="subheading color--002D72"><?php echo $subtitulo; ?></p>
        <?php endif; ?>

        <?php if($titulo):?>
          <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
        <?php endif; ?>
      </div>
      <div class="paginaTrasplanteTarjetas__grid">
        <?php foreach ($items as $key => $item) {
          $targeta_titulo       = !empty($item['titulo']) ? esc_html($item['titulo']) : '';
          $targeta_descripcion  = !empty($item['descripcion']) ? $item['descripcion'] : '';
          $imagen_id            = !empty($item["imagen"]['ID']) ? $item["imagen"]['ID'] : '';
        ?>
          <div class="paginaTrasplanteTarjetas__tarjeta">
            <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
            <div class="paginaTrasplanteTarjetas__info">
              <?php if($targeta_titulo):?>
                <h3 class="heading--24 color--002D72"><?php echo $targeta_titulo; ?></h3>
              <?php endif; ?>

              <?php if($targeta_descripcion):?>
                <p class="heading--18 color--263956">
                    <?php echo $targeta_descripcion; ?>
                </p>
              <?php endif; ?>
            </div>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</section>