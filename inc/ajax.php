<?php

function get_blog_follows_categories() {
    $categories = get_categories(array(
        'taxonomy' => 'blog_fellows_category',
        'post_type' => 'blog_fellows'
    ));

    $output = '';
    foreach ($categories as $category) {
        $output .= '<a href="#" class="category-link heading--13" data-cat-id="' . $category->term_id . '">' . $category->name . '</a>';
    }
    echo $output;

    wp_die();
}
add_action('wp_ajax_get_blog_follows_categories', 'get_blog_follows_categories');
add_action('wp_ajax_nopriv_get_blog_follows_categories', 'get_blog_follows_categories');

// Obtener posts por categoría
function get_posts_by_category() {
    $sitename = get_bloginfo('name');
    $catID = $_POST['catID'];
    $args = [
        'post_type' => 'blog_fellows',
        'tax_query' => [
            [
                'taxonomy' => 'blog_fellows_category',
                'terms' => $catID,
                'include_children' => false // Remove if you need posts from term 7 child terms
            ],
        ],
    ];

    $posts = new WP_Query($args);
    if ($posts->have_posts()) {
        $output = '<div class="blogFellowSlider">';
        while ($posts->have_posts()) {
            $posts->the_post();
            $doctor_nombre          = get_field('nombre_doctor');
            $doctor_apellido        = get_field('apellido_doctor');
            $autor_home             = $doctor_nombre . ' ' . $doctor_apellido;
            $foto_doctor_home   = get_field('foto_doctor_home');
            $output .= '<div>';
            $output .= '<article id="' . get_the_ID() .'">';
            $output .= '<a href="'. get_the_permalink() .'">';
            $output .= '<figure>';
            $output .= '<img width="164" height="164" src="' . $foto_doctor_home . '" alt="' . $autor_home . ' - ' . $sitename . '" title="' . $autor_home .'">';
            $output .= '</figure>';
            $output .= '<h3 class="heading--15">' . $autor_home .'</h3>';
            $output .= '<div class="sr-only">' . get_the_title() . '</div>';
            $output .= '</article>';
            $output .= '</div>';
        }
        $output .= '</div>';
        echo $output;
    } else {
        echo 'No hay posts en esta categoría';
    }
    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_get_posts_by_category', 'get_posts_by_category');
add_action('wp_ajax_nopriv_get_posts_by_category', 'get_posts_by_category');

// Obtener ID de la primera categoría
function get_first_category_id() {
    $categories = get_categories(array(
        'taxonomy' => 'blog_fellows_category',
        'post_type' => 'blog_fellows'
    ));

    if (!empty($categories)) {
        $firstCategory = reset($categories);
        echo $firstCategory->term_id;
    } else {
        echo 'No hay categorías';
    }

    wp_die();
}
add_action('wp_ajax_get_first_category_id', 'get_first_category_id');
add_action('wp_ajax_nopriv_get_first_category_id', 'get_first_category_id');

// Función para realizar la búsqueda de posts
function search_blog_fellows() {
    $sitename   = get_bloginfo('name');
    $searchTerm = $_POST['searchTerm'];

    $args = array(
        'meta_query' => array(
            array(
                'key' => 'nombre_doctor', // Buscar en el campo nombre_doctor
                'value' => $searchTerm,
                'compare' => 'LIKE', // Realizar una búsqueda similar
            ),
        ),
        'post_type' => 'blog_fellows',
        'posts_per_page' => -1 
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $output .= '<div class="blogFellowSlider">';
        $output .= '<h2 class="seccionBuscarArticulo__titulo heading--26">BUSCAR POR AUTOR</h2>';
        $output .= '<div class="seccionBuscarArticulo__contenido">';
        while ($query->have_posts()) {
            $query->the_post();
            $doctor_nombre          = get_field('nombre_doctor');
            $doctor_apellido        = get_field('apellido_doctor');
            $autor_home             = $doctor_nombre . ' ' . $doctor_apellido;
            $foto_doctor_home       = get_field('foto_doctor_home');
            // Formato personalizado "25 abril, 2024"
            $fecha_publicacion      = get_the_date('j F, Y'); 

            $output .= '<div class="post-item">';
            $output .= '<article id="' . get_the_ID() .'">';
            $output .= '<a class="seccionBuscarArticulo__grid" href="'. get_the_permalink() .'" title="' . $autor_home . '">';
            $output .= '<figure>';
            $output .= '<img width="164" height="164" src="' . $foto_doctor_home . '" alt="' . $autor_home . ' - ' . $sitename . '" title="' . $autor_home .'">';
            $output .= '</figure>';
            $output .= '<div class="seccionBuscarArticulo__info">';
            $output .= '<h3 class="heading--15">' . $autor_home .'</h3>';
            $output .= '<p class="heading--20">' . get_the_title() . '</p>';
            $output .= '<p class="heading--11">' . $fecha_publicacion . '</p>';
            $output .= '</div>';
            $output .= '</a>';
            $output .= '</article>';
            $output .= '</div>';
        }
        $output .= '</div>';
        $output .= '<button type="button" class="boton boton--rojo m-auto" data-vermas>Ver más noticias</button>'; // Aquí se agrega el botón

        echo $output;
    } else {
        echo 'No se encontraron resultados';
    }

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_search_blog_fellows', 'search_blog_fellows');
add_action('wp_ajax_nopriv_search_blog_fellows', 'search_blog_fellows');

/* Laboratorio clinico */
add_action('wp_ajax_filtrar_laboratorios', 'filtrar_laboratorios_callback');
add_action('wp_ajax_nopriv_filtrar_laboratorios', 'filtrar_laboratorios_callback');

function filtrar_laboratorios_callback() {
  $area = isset($_POST['area']) ? sanitize_text_field($_POST['area']) : '';
  $busqueda = isset($_POST['busqueda']) ? sanitize_text_field($_POST['busqueda']) : '';
  
  $args = array(
    'post_type' => 'labs-clinicos',
    'posts_per_page' => -1
  );

  if (!empty($area)) {
    $args['meta_query'][] = array(
      'key' => 'area',
      'value' => $area,
      'compare' => '='
    );
  }

  if (!empty($busqueda)) {
    $args['s'] = $busqueda;
  }

  $query = new WP_Query($args);

  ob_start();
  if ($query->have_posts()) : ?>
    <div class="procedimientoFiltro__procedimientos">
      <div id="procedimientos-lista">
        <?php while ($query->have_posts()): $query->the_post(); ?>
          <div class="procedimiento" data-id="<?php echo get_the_ID(); ?>">
            <h3 class="heading--18 color--002D72"><?php the_title(); ?></h3>
          </div>
        <?php endwhile; ?>
      </div>
      <div id="procedimiento-detalle"></div>
    </div>
  <?php else: ?>
    <p class="resultados heading--24 color--263956">No se encontraron laboratorios clínicos.</p>
  <?php endif;
  
  wp_reset_postdata();
  $html = ob_get_clean();
  echo $html;
  die();
}