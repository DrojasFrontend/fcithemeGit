<?php

/* 
*   Configuración tema
*/

if ( ! function_exists('themelacardio_setup')) {
    function themelacardio_setup()
    {
        if (function_exists('add_theme_support')) {
            add_theme_support('custom-logo'); // Soporte para logo
        }
    }
}
add_action('after_setup_theme', 'themelacardio_setup');

/* 
*   Habilitación de menu
*/
function slacip_menus()
{
    register_nav_menus(array(
        'menu-principal' => 'Menu Principal',
    ));
}
add_action('init', 'slacip_menus');

/* Menu Escritorio */
class Custom_Nav_Walker extends Walker_Nav_Menu {
    // Almacena la imagen del elemento de menú actual
    private $current_item_image = ''; 

    // Función para comenzar un nivel de menú
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $classes = array('sub-menu-nivel-' . $depth);
        $class_names = join(' ', $classes);
        $output .= "\n$indent<div class=\"$class_names\">\n";
        $output .= "$indent<ul class=\"$class_names-wrapper\">\n";

        // Inserta la imagen del primer nivel en el sub-menú de nivel 0
        if ($depth === 0 && !empty($this->current_item_image)) {
            $output .= "$indent<li class=\"sub-menu-img\"><img src=\"{$this->current_item_image}\" alt=\"Menu Image\"></li>\n";
        }

        // Agrega el título si es el nivel 1 o 2 o 3
        if ($depth == 1 || $depth == 2 || $depth == 3) {
            $output .= "$indent<li class=\"link $class_names-title\">$args->item_title</li>\n";
        }
    }

    // Función para finalizar un nivel de menú
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
        $output .= "$indent</div>\n";
    }

    // Función para comenzar un elemento de menú
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Resetea la imagen del primer nivel si estamos comenzando a procesar el primer nivel
        if ($depth === 0) {
            $this->current_item_image = ''; // Resetea para cada elemento de nivel superior
        }

        $atts = array(
            'title' => !empty($item->attr_title) ? $item->attr_title : '',
            'target' => !empty($item->target) ? $item->target : '',
            'rel' => !empty($item->xfn) ? $item->xfn : '',
            'href' => !empty($item->url) ? $item->url : '',
        );
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        // Comprueba si el elemento de menú tiene hijos
        $has_submenu_class = '';
        $menu_items = wp_get_nav_menu_items($args->menu);
        foreach ($menu_items as $menu_item) {
            if ($menu_item->menu_item_parent == $item->ID) {
                $has_submenu_class = ' has-submenu';
                break;
            }
        }

        // Obtener el valor del campo ACF 'menu_imagen'
        $menu_image = get_field('menu_imagen', $item);
        if (!empty($menu_image) && $depth === 0) {
            $this->current_item_image = $menu_image; // Guarda la imagen para uso en sub-menús
        }

        $item_output = $args->before;
        $item_output .= $indent . '<li class="link' . $has_submenu_class . '">';

        $item_output .= '<span class="icon-blanco"></span>';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= '</li>';
        $item_output .= $args->after;

        // Guardamos el título del elemento de menú en una variable
        $args->item_title = $item->title;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/* Menu Mobile */
class Custom_Nav_Walker_Mobile extends Walker_Nav_Menu {
    // Función para comenzar un nivel de menú
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $classes = array('sub-menu-mobile-nivel-' . $depth);
        $class_names = join(' ', $classes);
        $output .= "\n$indent<div class=\"$class_names\">\n";
        $output .= "$indent<ul class=\"$class_names-wrapper\">\n";

        // Agrega el título si es el nivel 1 o 2 o 3
        if ($depth == 0 || $depth == 1 || $depth == 2 || $depth == 3) {
            $output .= "$indent<li class=\"link $class_names-title\">";
            $output .= "<span class='icon-rojo'></span>";
            $output .= "$args->item_title </li>\n";
        }
    }

    // Función para finalizar un nivel de menú
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
        $output .= "$indent</div>\n";
    }

    // Función para comenzar un elemento de menú
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $atts = array(
            'title' => !empty($item->attr_title) ? $item->attr_title : '',
            'target' => !empty($item->target) ? $item->target : '',
            'rel' => !empty($item->xfn) ? $item->xfn : '',
            'href' => !empty($item->url) ? $item->url : '',
        );
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        // Comprueba si el elemento de menú tiene hijos
        $has_submenu_class = '';
        $menu_items = wp_get_nav_menu_items($args->menu);
        foreach ($menu_items as $menu_item) {
            if ($menu_item->menu_item_parent == $item->ID) {
                $has_submenu_class = ' has-submenu-mobile';
                break;
            }
        }

        $item_output = $args->before;
        $item_output .= $indent . '<li class="link' . $has_submenu_class . '">';

        $item_output .= '<span class="icon-rojo"></span>';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= '</li>';
        $item_output .= $args->after;

        // Guardamos el título del elemento de menú en una variable
        $args->item_title = $item->title;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/* 
*   Habilitación subida de SVG
*/
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

/* 
*   Resoluciones de imagenes
*/
function img_setup_theme() {
    add_image_size('custom-size', 423, 519, true); // Normal resolution
    add_image_size('custom-size-2x', 846, 1038, true); // High resolution
}
add_action('after_img_setup_theme', 'setup_theme');

/* 
* Guarda archivos JSON de ACF en la carpeta '/acf-json' dentro del tema activo.
*/
function my_acf_json_save_point( $path ) {
	return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );

function cptui_register_my_cpts_blog_fellows() {

	/**
	 * Post Type: Blog Fellows.
	 */

	$labels = [
		"name" => esc_html__( "Blog Fellows", "jwm" ),
		"singular_name" => esc_html__( "Blog Fellows", "jwm" ),
	];

	$args = [
		"label" => esc_html__( "Blog Fellows", "jwm" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "blog_fellows", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "blog_fellows", $args );

    register_taxonomy(
        'blog_fellows_category',
        'blog_fellows',
        array(
            'label' => __( 'Categorías' ),
            'rewrite' => array( 'slug' => 'blog_fellows_category' ),
            'hierarchical' => true,
        )
    );
}

add_action( 'init', 'cptui_register_my_cpts_blog_fellows' );

// Función para registrar opciones de personalización
function mi_tema_customize_register($wp_customize) {
    // Sección para el logo secundario
    $wp_customize->add_section('secundary_logo_section', array(
        'title' => __('Logo Secundario', 'mi_tema'),
        'priority' => 30,
    ));

    // Campo para subir la imagen del logo secundario
    $wp_customize->add_setting('secundary_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'secundary_logo', array(
        'label' => __('Subir Logo Secundario', 'mi_tema'),
        'section' => 'secundary_logo_section',
        'settings' => 'secundary_logo',
    )));

    // Campo para ingresar la URL a la que llevará el logo secundario
    $wp_customize->add_setting('secundary_logo_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('secundary_logo_url', array(
        'label' => __('URL del Logo Secundario', 'mi_tema'),
        'section' => 'secundary_logo_section',
        'type' => 'url',
    ));
}
add_action('customize_register', 'mi_tema_customize_register');

// Funcion procedimientos
function filtrar_procedimientos() {
    $especialidad_seleccionada = isset($_POST['especialidad']) ? sanitize_text_field($_POST['especialidad']) : '';
    $busqueda = isset($_POST['busqueda']) ? sanitize_text_field($_POST['busqueda']) : '';
    $filtro_aplicado = !empty($especialidad_seleccionada) || !empty($busqueda);

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

    $query = new WP_Query($args);
    
    ob_start();
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
    
    $output = ob_get_clean();
    echo $output;
    wp_die();
}
add_action('wp_ajax_filtrar_procedimientos', 'filtrar_procedimientos');
add_action('wp_ajax_nopriv_filtrar_procedimientos', 'filtrar_procedimientos');

// Función para obtener todas las especialidades únicas
function get_unique_especialidades() {
    $especialidades = array();
    $procedimientos = get_posts(array(
        'post_type' => 'procedimientos',
        'posts_per_page' => -1
    ));

    foreach ($procedimientos as $procedimiento) {
        $especialidad = get_field('especialidad', $procedimiento->ID);
        if (!empty($especialidad) && !in_array($especialidad, $especialidades)) {
            $especialidades[] = $especialidad;
        }
    }

    return $especialidades;
}

// Nueva función para cargar el detalle del procedimiento
function cargar_detalle_procedimiento() {
    $procedimiento_id = isset($_POST['procedimiento_id']) ? intval($_POST['procedimiento_id']) : 0;
    
    if ($procedimiento_id > 0) {
        $procedimiento = get_post($procedimiento_id);
        if ($procedimiento && $procedimiento->post_type == 'procedimientos') {
            echo '<div class="procedimiento__detalle">';
            echo '<div class="procedimientoFiltro__nombre">';
            echo '<h3 class="heading--30 color--263956">' . esc_html($procedimiento->post_title) . '</h3>';
            echo '<div class="procedimientoFiltro__info">';
            echo '<p class="heading--12 color--263956">Tipo: ' . esc_html(get_field('tipo_de_servico', $procedimiento_id)) . '</p>';
            echo '<p class="heading--12 color--263956">Duración: ' . esc_html(get_field('duracion', $procedimiento_id)) . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="procedimientoFiltro__recomendacion">';
            echo '<p class="heading--24 color--263956"> Recomendaciones generales </p>';
            echo '<div class="detalle">' . wp_kses_post(get_field('preparaciones', $procedimiento_id)) . '</div>';
            echo '</div>';
            echo '</div>';
            // Añade aquí más campos personalizados si los tienes
        } else {
            echo 'Procedimiento no encontrado.';
        }
    } else {
        echo 'ID de procedimiento inválido.';
    }
    
    wp_die();
}
add_action('wp_ajax_cargar_detalle_procedimiento', 'cargar_detalle_procedimiento');
add_action('wp_ajax_nopriv_cargar_detalle_procedimiento', 'cargar_detalle_procedimiento');





// Función para filtrar laboratorios
function filtrar_laboratorios() {
    $especialidad_seleccionada = isset($_POST['especialidad']) ? sanitize_text_field($_POST['especialidad']) : '';
    $busqueda = isset($_POST['busqueda']) ? sanitize_text_field($_POST['busqueda']) : '';

    $args = array(
        'post_type' => 'labs-clinicos',
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

    $query = new WP_Query($args);
    
    ob_start();
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
        <p class="resultados heading--24 color--263956">No se encontraron laboratorios clínicos.</p>
    <?php endif;
    wp_reset_postdata();
    
    $output = ob_get_clean();
    echo $output;
    wp_die();
}
add_action('wp_ajax_filtrar_laboratorios', 'filtrar_laboratorios');
add_action('wp_ajax_nopriv_filtrar_laboratorios', 'filtrar_laboratorios');

// Nueva función para cargar el detalle del procedimiento
function cargar_detalle_laboratorios_clinicos() {
    $procedimiento_id = isset($_POST['procedimiento_id']) ? intval($_POST['procedimiento_id']) : 0;
    
    if ($procedimiento_id > 0) {
        $procedimiento = get_post($procedimiento_id);
        if ($procedimiento && $procedimiento->post_type == 'labs-clinicos') { // Asegúrate de que el tipo de post sea 'labs-clinicos'
            echo '<div class="procedimiento__detalle">';
            echo '<div class="procedimientoFiltro__nombre">';
            echo '<h3 class="heading--30 color--263956">' . esc_html($procedimiento->post_title) . '</h3>';
            echo '<div class="procedimientoFiltro__info">';
            echo '<p class="heading--12 color--263956">Día de montaje: ' . esc_html(get_field('dia_montaje', $procedimiento_id)) . '</p>';
            echo '<p class="heading--12 color--263956">Reporte: ' . esc_html(get_field('reporte', $procedimiento_id)) . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } else {
            echo 'Laboratorio Clínicos no encontrado.';
        }
    } else {
        echo 'ID de procedimiento inválido.';
    }
    
    wp_die();
}
add_action('wp_ajax_cargar_detalle_laboratorios_clinicos', 'cargar_detalle_laboratorios_clinicos');
add_action('wp_ajax_nopriv_cargar_detalle_laboratorios_clinicos', 'cargar_detalle_laboratorios_clinicos');


function asignar_slug_medicina_interna($post_id) {
    // Verificar si es una revisión o autoguardado
    if (wp_is_post_revision($post_id) || defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Obtener el post actual
    $post = get_post($post_id);

    // Verificar si es una página y si el título es "Medicina Interna"
    if ($post->post_type == 'page' && $post->post_title == 'Medicina Interna') {
        // Asignar el slug "Medicina-Interna" sin la barra "/"
        $nuevo_slug = 'Medicina-Interna';

        // Actualizar el slug de la página si es diferente al que ya tiene
        if ($post->post_name != $nuevo_slug) {
            wp_update_post(array(
                'ID' => $post_id,
                'post_name' => $nuevo_slug
            ));
        }
    }
}
add_action('save_post', 'asignar_slug_medicina_interna');


// Buacador Blog Fellow
function filtrar_posts() {
    $author = sanitize_text_field($_POST['author_name']);
    $order = sanitize_text_field($_POST['order']);
    $search = sanitize_text_field($_POST['s']);

    // Base de los argumentos para la consulta
    $args = [
        'post_type' => 'blog_fellows',
        'posts_per_page' => -1,
    ];

    // Configurar ordenamiento
    if ($order === 'ASC' || $order === 'DESC') {
        $args['orderby'] = 'date';
        $args['order'] = $order;
    }

    // Búsqueda global (título y contenido)
    if (!empty($search)) {
        $args['s'] = $search;
    }

    // Búsqueda por autor si se selecciona uno
    if (!empty($author)) {
        $args['meta_query'] = [
            [
                'key' => 'nombre_doctor',
                'value' => $author,
                'compare' => 'LIKE',
            ],
        ];
    }

    // Debug
    error_log('Búsqueda con argumentos: ' . print_r($args, true));

    // Ejecutar consulta
    $query = new WP_Query($args);
    
    // Debug
    error_log('Número de posts encontrados: ' . $query->found_posts);

    $html_output = '';

    if ($query->have_posts()) {
        $html_output .= '<section>';
        $html_output .= '<h2 class="heading--48 color--002D72" style="text-align: center;">Resultados de tu búsqueda</h2>';
        $html_output .= '<div class="seccionArticulos__articulos">';

        while ($query->have_posts()) {
            $query->the_post();
            
            $titulo = get_the_title();
            $link = get_the_permalink();
            $foto_doctor_home = !empty(get_field('foto_doctor_home')) ? esc_url(get_field('foto_doctor_home')) : '';
            $foto_doctor_grande = !empty(get_field('foto_doctor_grande')) ? esc_url(get_field('foto_doctor_grande')) :  '';
            $nombre_doctor = !empty(get_field('nombre_doctor')) ? esc_html(get_field('nombre_doctor')) : '';
            $apellido_doctor = !empty(get_field('apellido_doctor')) ? esc_html(get_field('apellido_doctor')) : '';
            $fecha = get_the_date('j F, Y');

            $html_output .= '<article class="seccionArticulos__articulo">';
            $html_output .= '<a href="' . $link . '" class="seccionArticulos__link" style="height: 100%;" title="">';
            
            $html_output .= '<div class="seccionArticulosBuscados__info" style="height: 100%;">';
			/*
            $html_output .= '<div class="seccionArticulosBuscados__imgCabecera">';
            if ($foto_doctor_grande) {
                $html_output .= '<img class="seccionArticulos__img" width="100%" height="auto" src="' . $foto_doctor_grande . '" alt="' . $nombre_doctor . ' ' . $apellido_doctor . '">';
            } else {
                $html_output .= '<img class="seccionArticulos__img" width="100%" height="auto" src="' . IMG_BASE . 'placeholder-image.webp" alt="' . $nombre_doctor . ' ' . $apellido_doctor . '">';
            }
            $html_output .= '</div>';
			*/
            $html_output .= '<header class="seccionArticulosBuscados__footer">';
            $html_output .= '<h3 class="heading--18 color--002D72">' . $titulo . '</h3>';
            $html_output .= '</header>';
            $html_output .= '<footer class="seccionArticulosBuscados__header">';
            if ($foto_doctor_home) {
                $html_output .= '<img class="seccionArticulos__img" width="42" height="42" src="' . $foto_doctor_home . '" alt="' . $nombre_doctor . ' ' . $apellido_doctor . '">';
            } else {
                $html_output .= '<img class="seccionArticulos__img" width="42" height="42" src="' . IMG_BASE . 'placeholder-image.webp" alt="' . $nombre_doctor . ' ' . $apellido_doctor . '">';
            }
            $html_output .= '<p class="heading--11 color--717C7D">' . $nombre_doctor . ' ' . $apellido_doctor . '</p>';
            $html_output .= '</footer>';
            $html_output .= '</div>';
            $html_output .= '</a>';
            $html_output .= '</article>';
        }

        wp_reset_postdata();
    } else {
        $html_output .= '<p>No se encontraron artículos.</p>';
    }

    echo $html_output;
    die();
}
add_action('wp_ajax_filter_posts', 'filtrar_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filtrar_posts');


// Función para obtener los posts
function get_filtered_posts($search = '', $tipo = '', $tematica = '', $offset = 0) {
    $args = array(
        'post_type' => 'unidad_sintesis',
        'posts_per_page' => 6,
        'offset' => $offset,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish' // Asegurarnos de que solo muestre posts publicados
    );

    // Agregar búsqueda por palabra si existe
    if (!empty($search)) {
        $args['s'] = sanitize_text_field($search);
    }

    // Array para almacenar términos de taxonomía
    $tax_query = array();

    // Agregar filtro por tipo de recado
    if (!empty($tipo)) {
        $tax_query[] = array(
            'taxonomy' => 'tipos_de_recados',
            'field' => 'term_id',
            'terms' => $tipo
        );
    }

    // Agregar filtro por temática
    if (!empty($tematica)) {
        $tax_query[] = array(
            'taxonomy' => 'tematicas_de_recados',
            'field' => 'term_id',
            'terms' => $tematica
        );
    }

    if (!empty($tax_query)) {
        if (count($tax_query) > 1) {
            $tax_query['relation'] = 'AND';
        }
        $args['tax_query'] = $tax_query;
    }

    return new WP_Query($args);
}

// Función Unidad Sintesis
function handle_search_request() {
    check_ajax_referer('search_nonce', 'nonce');

    $search = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';
    $tipo = isset($_POST['tipo']) ? sanitize_text_field($_POST['tipo']) : '';
    $tematica = isset($_POST['tematica']) ? sanitize_text_field($_POST['tematica']) : '';
    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;

    $query = get_filtered_posts($search, $tipo, $tematica, $offset);
    
    // Debug
    error_log('Query SQL: ' . $query->request);
    error_log('Found Posts: ' . $query->found_posts);

    $response = array(
        'posts' => array(),
        'has_more' => false,
        'total' => $query->found_posts,
        'debug' => array(
            'args' => $query->query,
            'sql' => $query->request
        )
    );

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $response['posts'][] = array(
                'title' => html_entity_decode(get_the_title()),
                'date' => get_the_date(),
                'link' => get_permalink(),
            );
        }
        
        $response['has_more'] = $query->found_posts > ($offset + 6);
    }

    wp_reset_postdata();
    wp_send_json($response);
}
add_action('wp_ajax_search_posts', 'handle_search_request');
add_action('wp_ajax_nopriv_search_posts', 'handle_search_request');

// Función para mostrar el formulario de búsqueda
function display_search_form() {
    // Obtener términos para los selectores
    $tipos = get_terms(array(
        'taxonomy' => 'tipos_de_recados',
        'hide_empty' => false,
    ));

    $tematicas = get_terms(array(
        'taxonomy' => 'tematicas_de_recados',
        'hide_empty' => false,
    ));

    ob_start();
    ?>
    <div class="investigacionesBuscador">
        <div class="container--large">
        <div class="investigacionesBuscador__titulo">
        	<h2 class="heading--48 color--002D72 fw-300">Encuentra todo el contenido</h2>
        </div>
            <form id="custom-search-form" class="">
                <div class="investigacionesBuscador__campos">
                    <div class="investigacionesBuscador__submit">
                        <input type="text" id="search-input" placeholder="Encuentra lo que necesites" class="form-control mb-2">
                        <button type="submit" class="">
                            <?php 
                                get_template_part('template-parts/content', 'icono');
                                display_icon('ico-buscar'); 
                            ?>
                            Buscar
                        </button>
                    </div>
                    <div class="investigacionesBuscador__select">
                        <select id="tipo-select" class="form-control">
                            <option value="">Todos los tipos de recados</option>
                            <?php foreach ($tipos as $tipo): ?>
                                <option value="<?php echo esc_attr($tipo->term_id); ?>">
                                    <?php echo esc_html($tipo->name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
        
                        <select id="tematica-select" class="form-control">
                            <option value="">Todas las temáticas</option>
                            <?php foreach ($tematicas as $tematica): ?>
                                <option value="<?php echo esc_attr($tematica->term_id); ?>">
                                    <?php echo esc_html($tematica->name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <div class="container--large">
            <div id="search-results" class="investigacionesBuscador__tarjetas"></div>
        </div>

        <div id="load-more-container" class="investigacionesBuscador__cargarmas">
            <button id="load-more" class="boton-v2 boton-v2--blanco-rojo" style="display: none;">
                Ver más informes
            </button>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

// Asegurarse de que el script se cargue
function register_search_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-search', get_template_directory_uri() . '/js/custom-search.js', array('jquery'), '1.0.1', true);
    wp_localize_script('custom-search', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('search_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'register_search_scripts');



function bloquear_api_users( $endpoints ) {
    if ( isset( $endpoints['/wp/v2/users'] ) ) {
        unset( $endpoints['/wp/v2/users'] );
    }
    if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
        unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
    }
    return $endpoints;
}
add_filter( 'rest_endpoints', 'bloquear_api_users' );