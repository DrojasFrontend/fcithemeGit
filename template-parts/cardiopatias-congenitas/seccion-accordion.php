<?php 
$sitename       = esc_html(get_bloginfo('name'));
// $grupo_acordion = get_field('grupo_acordion');
// $posicion       = !empty($grupo_acordion['posicion']) ? esc_html($grupo_acordion['posicion']) : '';
// $subtitulo      = !empty($grupo_acordion['subtitulo']) ? esc_html($grupo_acordion['subtitulo']) : '';
// $titulo         = !empty($grupo_acordion['titulo']) ? esc_html($grupo_acordion['titulo']) : '';
// $descripcion    = !empty($grupo_acordion['descripcion']) ? esc_html($grupo_acordion['descripcion']) : '';
// $items          = !empty($grupo_acordion['items']) ? $grupo_acordion['items'] : [];

$titulo = "Problemas más frecuentes";

$items = [
  [
    'titulo' => 'Título del primer acordeón',
    'detalle' => 'Contenido detallado del primer acordeón. Aquí puedes poner todo el contenido que necesites mostrar.'
  ],
  [
    'titulo' => 'Título del segundo acordeón',
    'detalle' => 'Contenido detallado del segundo acordeón. Puede incluir texto formateado, HTML, etc.'
  ],
  [
    'titulo' => 'Título del tercer acordeón',
    'detalle' => 'Contenido detallado del tercer acordeón. Este es el contenido que se mostrará cuando se expanda.'
  ]
];
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
            <p><?php echo $item['detalle']; ?></p>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</section>
        