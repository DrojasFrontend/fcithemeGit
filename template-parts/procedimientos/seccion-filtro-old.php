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
      <button type="button" class="abrir-filtro" id="abrir-filtro" aria-label="abrir filtro">
        <?php 
          get_template_part('template-parts/content', 'icono');
          display_icon('ico-filter'); 
        ?>
        Filtrar por especialidad
      </button>
      <div class="procedimientoFiltro__form-mobile">
        <button type="button" class="cerrar-filtro" id="cerrar-filtro" aria-label="boton cerrar filtro">
          <span class="sr-only">Cerrar</span>
          <?php 
            get_template_part('template-parts/content', 'icono');
            display_icon('ico-close'); 
          ?>
        </button>
        <form method="GET" action="" id="filtro-form">
          <select name="especialidad" id="especialidad">
            <option value="">Filtrar por especialidad</option>
            <?php foreach ($especialidades as $especialidad) : ?>
              <option value="<?php echo esc_attr($especialidad); ?>" <?php selected($especialidad_seleccionada, $especialidad); ?>>
                <?php echo esc_html($especialidad); ?>
              </option>
            <?php endforeach; ?>
          </select>
          <div class="procedimientoFiltro__buscar">
            <input type="text" name="busqueda" id="busqueda" placeholder="Busca tu examen" value="<?php echo esc_attr($busqueda); ?>">
            <button type="submit" id="buscar-btn">
              <?php 
                get_template_part('template-parts/content', 'icono');
                display_icon('ico-search'); 
              ?>
              Buscar
            </button>
          </div>
        </form>
      </div>
    
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
                <a href="<?php echo $url; ?>" target="<?php echo $target; ?>" title="mas sobre <?php echo $titulo; ?>">
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
            <p class="resultados heading--24 color--263956">No se encontraron procedimientos.</p>
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
  function cargarProcedimientos(especialidad, busqueda) {
    $.ajax({
      url: '<?php echo admin_url('admin-ajax.php'); ?>',
      type: 'POST',
      data: {
        action: 'filtrar_procedimientos',
        especialidad: especialidad,
        busqueda: busqueda
      },
      success: function(response) {
        $('#procedimientos-container').html(response);
        initProcedimientoClick();
      }
    });
  }

  function initProcedimientoClick() {
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
  }

  $('#filtro-form').on('submit', function(e) {
    e.preventDefault();
    var especialidad = $('#especialidad').val();
    var busqueda = $('#busqueda').val();
    cargarProcedimientos(especialidad, busqueda);
  });

  function toggleMenuFiltro(action) {
    if (action === "abrir") {
      $("body").css("overflow", "hidden");
      $(".procedimientoFiltro__form-mobile").fadeIn();
    } else if (action === "cerrar") {
      $("body").css("overflow", "");
      $(".procedimientoFiltro__form-mobile").fadeOut();
    }
  }

  function manejarMenuFiltro() {
    if (window.innerWidth < 1024) {
      $("#abrir-filtro").on("click", function() {
        toggleMenuFiltro("abrir");
      });

      $("#cerrar-filtro").on("click", function() {
        toggleMenuFiltro("cerrar");
      });

      $("#buscar-btn").on("click", function() {
        toggleMenuFiltro("cerrar");
      });
    }
  }

  $(document).ready(function() {
    manejarMenuFiltro();
    $(window).resize(function() {
      manejarMenuFiltro();
    });
  });

});
</script>