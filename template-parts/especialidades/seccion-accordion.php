<?php 
$sitename       = esc_html(get_bloginfo('name'));
$grupo_acordion = get_field('grupo_acordion');
$posicion       = !empty($grupo_acordion['posicion']) ? esc_html($grupo_acordion['posicion']) : '';
$subtitulo      = !empty($grupo_acordion['subtitulo']) ? esc_html($grupo_acordion['subtitulo']) : '';
$titulo         = !empty($grupo_acordion['titulo']) ? esc_html($grupo_acordion['titulo']) : '';
$descripcion    = !empty($grupo_acordion['descripcion']) ? esc_html($grupo_acordion['descripcion']) : '';
$items          = !empty($grupo_acordion['items']) ? $grupo_acordion['items'] : [];
?>

<section class="etapaEspecialidadesAccordion <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
  <div class="container--large">
    <div class="etapaEspecialidadesAccordion__titulo">
      <?php if($subtitulo) : ?>
        <p class="subheading color--002D72">
          <?php echo $subtitulo;?>
        </p>
      <?php endif; ?>
      
      <?php if($titulo) : ?>
        <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
      <?php endif; ?>
      
      <?php if($descripcion) : ?>
        <p class="heading--18 color--263956">
          <?php echo $descripcion;?>
        </p>
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
        