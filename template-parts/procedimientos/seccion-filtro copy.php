<?php 
$sitename   = esc_html(get_bloginfo('name'));
$grupo_info = get_field('grupo_info');
$imagen_id  = !empty($grupo_hero["fondo"]['ID']) ? $grupo_hero["fondo"]['ID'] : '';
$subtitulo  = !empty($grupo_hero['subtitulo']) ? esc_html($grupo_hero['subtitulo']) : '';
$titulo     = !empty($grupo_hero['titulo']) ? esc_html($grupo_hero['titulo']) : '';

$info_titulo         = !empty($grupo_info['titulo']) ? esc_html($grupo_info['titulo']) : '';
$info_descripcion    = !empty($grupo_info['descripcion']) ? esc_html($grupo_info['descripcion']) : '';
$info_subtitulo      = !empty($grupo_info['subtitulo']) ? esc_html($grupo_info['subtitulo']) : '';
$info_enlaces        = !empty($grupo_info['enlaces']) ? $grupo_info['enlaces'] : [];
$imagen_info_id     = !empty($grupo_info["imagen"]['ID']) ? $grupo_info["imagen"]['ID'] : '';

// Obtener todas las especialidades únicas
$especialidades = get_unique_especialidades();

$especialidad_seleccionada = isset($_GET['especialidad']) ? sanitize_text_field($_GET['especialidad']) : '';
$busqueda = isset($_GET['busqueda']) ? sanitize_text_field($_GET['busqueda']) : '';
$filtro_aplicado = !empty($especialidad_seleccionada) || !empty($busqueda);

$args = array();
if ($filtro_aplicado) {
  $args = array(
    'post_type' => 'procedimientos',
    'posts_per_page' => -1
  );

  if (!empty($especialidad_seleccionada)) {
    $args['meta_query'][] = array(
      'key' => 'especialidad',
      'value' => $especialidad_seleccionada,
      'compare' => '='
    );
  }

  if (!empty($busqueda)) {
    $args['s'] = $busqueda;
  }
}
?>
<section class="procedimientoFiltro">
  <div class="container--large">
    <div class="procedimientoFiltro__titulo">
      <?php if($info_titulo) : ?>
        <h2 class="heading--36 color--002D72""><?php echo $info_titulo; ?></h2>
      <?php endif; ?>

      <?php if($info_descripcion) : ?>
        <p class="heading--18 color--263956"><?php echo $info_descripcion; ?></p>
      <?php endif; ?>
    </div>
  </div>

  <div class="procedimientoFiltro__form">
    <div class="container--large">
      <!-- Form -->
      <form method="GET" action="" id="filtro-form">
        <select name="especialidad">
          <option value="">Filtrar por especialidad</option>
          <?php foreach ($especialidades as $especialidad) : ?>
            <option value="<?php echo esc_attr($especialidad); ?>" <?php selected($especialidad_seleccionada, $especialidad); ?>>
              <?php echo esc_html($especialidad); ?>
            </option>
          <?php endforeach; ?>
        </select>
        <div class="procedimientoFiltro__buscar">
          <input type="text" name="busqueda" placeholder="Busca tu examen" value="<?php echo esc_attr($busqueda); ?>">
          <button type="submit">
            <?php 
              get_template_part('template-parts/content', 'icono');
              display_icon('ico-search'); 
            ?>
            Buscar
          </button>
        </div>
        <!-- <button type="button" id="limpiar-filtro">Limpiar</button> -->
      </form>
    
      <div id="procedimientos-container">
        <?php if (!$filtro_aplicado) : ?>
          <div class="procedimientoFiltro__grid">
            <div class="procedimientoFiltro__enlaces">
              <?php if($info_subtitulo) : ?>
                <p class="heading--18 color--002D72""><?php echo $info_subtitulo; ?></p>
                <?php foreach ($info_enlaces as $key => $enlace) { 
                  $url    = !empty($enlace['enlace']['url']) ? esc_url($enlace['enlace']['url']) : '';
                  $target = !empty($enlace['enlace']['target']) ? esc_attr($enlace['enlace']['target']) : '';
                  $titulo = !empty($enlace['enlace']['title']) ? esc_html($enlace['enlace']['title']) : '';
                ?>
                <a class="heading--24 color--002D72" href="<?php echo $url; ?>" target="<?php echo $target; ?>" title="mas sobre <?php echo $titulo; ?>">
                  <?php echo $titulo; ?>
                  <span class="heading--18 color--E40046">
                    Ver más
                    <?php 
                      get_template_part('template-parts/content', 'icono');
                      display_icon('arrow-rojo'); 
                    ?>
                  </span>
                </a>
                <?php } ?>
              <?php endif; ?>
            </div>
            <?php echo generar_imagen_responsive($imagen_info_id, 'custom-size', $sitename, ''); ?>
          </div>
        <?php else : ?>
          <?php
          $query = new WP_Query($args);
          if ($query->have_posts()) : ?>
            <div class="procedimientoFiltro__procedimientos">
              <div id="procedimientos-lista">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                  <div class="procedimiento" data-id="<?php echo get_the_ID(); ?>">
                    <h3 class="heading--18 color--002D72"><?php the_title(); ?></h3>
                  </div>
                <?php endwhile; ?>
              </div>
              <div id="procedimiento-detalle">
                <!-- Aquí se cargará el detalle del procedimiento -->
              </div>
            </div>
          <?php else : ?>
              <p>No se encontraron procedimientos.</p>
          <?php endif;
          wp_reset_postdata();
          ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<script>
  jQuery(document).ready(function($) {
    $('.procedimiento').on('click', function() {
      var procedimientoId = $(this).data('id');
      $('.procedimiento').removeClass('active');
      $(this).addClass('active');
      
      $.ajax({
          url: '<?php echo admin_url('admin-ajax.php'); ?>',
          type: 'POST',
          data: {
              action: 'cargar_detalle_procedimiento',
              procedimiento_id: procedimientoId
          },
          success: function(response) {
              $('#procedimiento-detalle').html(response);
          }
      });
    });

    $('#limpiar-filtro').on('click', function() {
      window.location.href = '<?php echo get_permalink(); ?>';
    });
  });
</script>