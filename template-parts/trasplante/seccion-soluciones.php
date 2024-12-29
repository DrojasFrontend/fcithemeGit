<?php 
$grupo_soluciones = get_field('grupo_soluciones');
$posicion         = !empty($grupo_soluciones['posicion']) ? esc_html($grupo_soluciones['posicion']) : '';
$fondo            = !empty($grupo_soluciones['fondo']) ? $grupo_soluciones['fondo'] : '';
$subtitulo        = !empty($grupo_soluciones['subtitulo']) ? esc_html($grupo_soluciones['subtitulo']) : '';
$titulo           = !empty($grupo_soluciones['titulo']) ? esc_html($grupo_soluciones['titulo']) : '';
$items            = !empty($grupo_soluciones['items']) ? $grupo_soluciones['items'] : [];
?>

<section class="paginaTrasplanteSoluciones <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
  <div class="paginaTrasplanteSoluciones__fondo" style="background-color: <?php echo $fondo; ?>">
    <div class="container--large">
      <div class="paginaTrasplanteSoluciones__titulo">
        <?php if ($subtitulo) : ?>
          <p class="subheading color--002D72"><?php echo esc_html($subtitulo); ?></p>
        <?php endif; ?>

        <?php if ($titulo) : ?>
          <h2 class="heading--48 color--002D72"><?php echo esc_html($titulo); ?></h2>
        <?php endif; ?>
      </div>
      <?php if($items) : ?>
        <ul class="paginaTrasplanteSoluciones__items">
          <?php foreach ($items as $key => $item) { ?>
            <?php if(!empty($item['titulo'])) : ?>
			<a href="<?php echo esc_html($item['link_curso']); ?>" target="_blank">
              <li class="heading--18 color--263956"><?php echo esc_html($item['titulo']); ?></li>
			</a>
            <?php endif; ?>
          <?php } ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</section>