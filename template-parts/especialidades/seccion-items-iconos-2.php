<?php 
$grupo_items_iconos_2 = get_field('grupo_items_iconos_2');
$posicion           = !empty($grupo_items_iconos_2['posicion']) ? esc_html($grupo_items_iconos_2['posicion']) : '';
$fondo              = !empty($grupo_items_iconos_2['fondo']) ? $grupo_items_iconos_2['fondo'] : '';
$subtitulo          = !empty($grupo_items_iconos_2['subtitulo']) ? esc_html($grupo_items_iconos_2['subtitulo']) : '';
$titulo             = !empty($grupo_items_iconos_2['titulo']) ? esc_html($grupo_items_iconos_2['titulo']) : '';
$descripcion        = !empty($grupo_items_iconos_2['descripcion']) ? $grupo_items_iconos_2['descripcion'] : '';
$items              = !empty($grupo_items_iconos_2['items']) ? $grupo_items_iconos_2['items'] : [];

?>

<section class="etapaEspecialidadesItemsIconos <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
  <div class="etapaEspecialidadesItemsIconos__fondo" style="background-color: <?php echo $fondo; ?>">
    <div class="container--large">
      <div class="etapaEspecialidadesItemsIconos__titulo">
        <?php if ($subtitulo) : ?>
          <p class="subheading color--002D72"><?php echo esc_html($subtitulo); ?></p>
        <?php endif; ?>

        <?php if ($titulo) : ?>
          <h2 class="heading--48 color--002D72"><?php echo esc_html($titulo); ?></h2>
        <?php endif; ?>

        <?php if ($descripcion) : ?>
          <p class="heading--18 color--263956">
            <?php echo $descripcion; ?>
          </p>
        <?php endif; ?>

      </div>
      <?php if($items) : ?>
        <ul class="etapaEspecialidadesItemsIconos__items">
          <?php foreach ($items as $key => $item) { ?>
            <?php if(!empty($item['texto'])) : ?>
              <li class="heading--18 color--263956"><?php echo $item['texto']; ?></li>
            <?php endif; ?>
          <?php } ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</section>