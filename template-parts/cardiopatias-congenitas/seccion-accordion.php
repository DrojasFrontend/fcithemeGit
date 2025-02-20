<?php 
$sitename       = esc_html(get_bloginfo('name'));
  $grupo_acordion = get_field('grupo_acordeon');
  $titulo         = !empty($grupo_acordion['titulo']) ? esc_html($grupo_acordion['titulo']) : '';
  $items          = !empty($grupo_acordion['items']) ? $grupo_acordion['items'] : [];

?>

<section class="etapaEspecialidadesAccordion">
  <div class="container--large">
    <div class="etapaEspecialidadesAccordion__titulo">
      <?php if($titulo) : ?>
        <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
      <?php endif; ?>
    </div>

    <?php foreach ($items as $key => $item) { $key++; ?>
      <div class="accordion__item">
        <button class="accordion__trigger <?php echo $key == 1 ? 'is-active' : ''; ?>">
          <h3 class="accordion__title heading--24 color--002D72"><?php echo $item['titulo']; ?></h3>
          <span class="accordion__icon">
            <?php 
              if (function_exists('display_icon')) {
                display_icon('ico-mas-circulo');
              } 
            ?>
          </span>
        </button>
        <div class="accordion__panel" <?php echo $key == 1 ? 'style="display:block;"' : ''; ?>>
          <div class="accordion__content">
          	<?php echo $item['detalle']; ?>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</section>