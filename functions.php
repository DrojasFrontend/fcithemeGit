<?php
@ini_set('upload_max_size', '200M');
@ini_set('post_max_size', '200M');
@ini_set('max_execution_time', '300');
include("classes/getID3-master/getid3/getid3.php");
/**
 *  El functions de mi Theme
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage jwm 
 * @since 1.0.0
 * @version 1.0.0
 */

function convertirEnMoneda($numero)
{
  return "" . number_format($numero, 0, ',', '.');
}

if (!function_exists('scripts_iniciales')) :
    function scripts_iniciales()
    {
        $version = '1.0.4';
        // Archivos y librerías JS
        wp_register_script('splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js', '', $version, true);
        // Scripts de JWM
        wp_register_script('fslightbox', get_template_directory_uri() . '/assets/js/fslightbox.js', '', $version, true);
        wp_register_script('masonry-js', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', '', $version, true);
        wp_register_script('jwm', get_template_directory_uri() . '/assets/js/scripts.min.js', '', $version, true);

        wp_localize_script( 'jwm', 'ajax_var', array(
            'url'    => admin_url( 'admin-ajax.php' ),
            'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
            'action' => 'acciones-ajax',
        ) );

        wp_localize_script('script', 'wp_theme_ajax_vars', array(
            'ajax_url' => admin_url('admin-ajax.php')
        ));
        wp_enqueue_script('splide');
        wp_enqueue_script('jwm');
        wp_enqueue_script('fslightbox');
        wp_enqueue_script('masonry-js');

        // Creamos los estilos y los insertamos al documento
        wp_register_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', '', $version );
        wp_register_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', '', $version );
        wp_register_style( 'style-min', get_template_directory_uri() . '/assets/css/style.min.css', '', $version );
        wp_register_style( 'customizacion', get_template_directory_uri() . '/assets/css/customizacion.css', '', $version);
        	
        wp_enqueue_style( 'slick' );
        wp_enqueue_style( 'slick-theme' );
        wp_enqueue_style( 'style-min' );
        wp_enqueue_style( 'customizacion' );

    }
endif;
add_action('wp_enqueue_scripts', 'scripts_iniciales');

function defer_parsing_of_js($url)
{
    // if (is_admin()) return $url; //don't break WP Admin
    // if (false === strpos($url, '.js')) return $url;
    if (strpos($url, 'jquery.js')) return $url;
    if (strpos($url, 'jquery.min.js')) return $url;
    // return str_replace(' src', ' defer src', $url);
    return $url;
}
add_filter('script_loader_tag', 'defer_parsing_of_js', 10);

function dequeue_gutenberg_theme_css() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'dequeue_gutenberg_theme_css', 100 );

function jwm_setup()
{
    load_theme_textdomain('jwm', get_template_directory() . '/languages');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption'
    ));

    //https://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats',  array(
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat'
    ));

    //Permite que los themes y plugins administren el título, si se activa, no debe usarse wp_title()
    add_theme_support('title-tag');
    //Activar Feeds RSS
    add_theme_support('automatic-feed-links');
    //Ocultar Tags innecesarios del head
    //Versión de WordPress
    remove_action('wp_head', 'wp_generator');
    //Imprime sugerencias de recursos para los navegadores para precargar, pre-renderizar y pre-conectarse a sitios web
    remove_action('wp_head', 'wp_resource_hints', 2);
    //Muestre el enlace al punto final del servicio Really Simple Discovery
    remove_action('wp_head', 'rsd_link');
    //Muestre el enlace al archivo de manifiesto de Windows Live Writer
    remove_action('wp_head', 'wlwmanifest_link');
    //Inyecta rel = shortlink en el encabezado si se define un shortlink para la página actual.
    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('after_setup_theme', 'jwm_setup');

// Agregar opciones de menu
function jwm_menus()
{   
    register_nav_menus(array(
        'main_menu' => __('Menú Principal', 'jwm'),
        'menu_footer_medicos' => __('Menú del footer Médicos', 'jwm'),
        'menu_footer_estudiantes' => __('Menú del footer Estudiantes', 'jwm'),
        'menu_footer_investigadores' => __('Menú del footer Investigadores', 'jwm'),
        'menu_footer_internacionales' => __('Menú del footer Pacientes Internacionales', 'jwm'),
        'menu_footer_caridad' => __('Menú del footer Caridad y Asistencia', 'jwm'),
        'menu_footer_barra' => __('Menú del footer barra blanca', 'jwm'),
        'accesos_rapidos' => __('Menú de accesos rápidos', 'jwm'),
        'top_menu' => __('Top Menú', 'jwm')
    ));

}
add_action('init', 'jwm_menus');

function excerpt_personalizado($content, $length = 40) {
    $excerpt = wp_strip_all_tags($content); // Elimina todas las etiquetas HTML y PHP del contenido
    $excerpt = strip_shortcodes($excerpt); // Elimina los shortcodes del contenido
    $excerpt = wp_trim_words($excerpt, $length, ''); // Limita la longitud del extracto a un número específico de palabras
  
    return $excerpt;
  }
  

function mes_numero_a_texto($mes){
    $salida = '';
    switch((int) $mes){
        case 1:
            $salida = 'Enero';
        break;
        case 2:
            $salida = 'Febrero';
        break;
        case 3:
            $salida = 'Marzo';
        break;
        case 4:
            $salida = 'Abril';
        break;
        case 5:
            $salida = 'Mayo';
        break;
        case 6:
            $salida = 'Junio';
        break;
        case 7:
            $salida = 'Julio';
        break;
        case 8:
            $salida = 'Agosto';
        break;
        case 9:
            $salida = 'Septiembre';
        break;
        case 10:
            $salida = 'Octubre';
        break;
        case 11:
            $salida = 'Noviembre';
        break;
        case 12:
            $salida = 'Diciembre';
        break;
    }
    return $salida;
}

function redesSocialesDisponibles($funcion = 1)
{
    if($funcion == 1)
    {
        $redes_socials = array(
            'my_facebook_url' => 'Facebook URL',
            'my_twitter_url' => 'Twitter URL',
            'my_tripadvisor' => 'Tripadvisor URL',
            'my_instagram' => 'Instagram URL',
            'my_google_business' => 'Google Business URL',
            'my_youtube' => 'Youtube URL',
            'my_pinterest' => 'Pinterest URL',
            'my_linkedin' => 'Linkedin URL',
            'my_yelp' => 'Yelp URL',
            'my_whatsapp' => 'Whatsapp URL',
        );
    }

    if($funcion == 2)
    {
        $redes_socials = array(
            'my_facebook_url' => 'fab fa-facebook-f',
            'my_twitter_url' => 'fab fa-twitter',
            'my_tripadvisor' => 'fab fa-tripadvisor',
            'my_instagram' => 'fab fa-instagram',
            'my_google_business' => 'fab fa-google',
            'my_youtube' => 'fab fa-youtube',
            'my_pinterest' => 'fab fa-pinterest',
            'my_linkedin' => 'fab fa-linkedin',
            'my_yelp' => 'fab fa-yelp',
            'my_whatsapp' => 'fab fa-whatsapp',
        );
    }

    return $redes_socials;
}

function jw_customizar_template($wp_customize)
{
    $wp_customize->add_panel('jw_opciones_custom', array(
        'title' => __('JWM Theme', 'textdomain'),
        'priority' => 160,
        'capability' => 'edit_theme_options',
    ));

    // 1. 
    // Campos de la cabezera (dirección, teléfono, etc)
    $wp_customize->add_section('jw_subheader_section', array(
        'title' => __('Opciones de cabecera', 'textdomain'),
        'panel' => 'jw_opciones_custom',
        'priority' => 10,
        'capability' => 'edit_theme_options',
    ));

    // 2.
    // Section para Google Analytics
    $wp_customize->add_section('google_analytics_section', array(
        'title' => __('Google Analytics', 'textdomain'),
        'panel' => 'jw_opciones_custom',
        'priority' => 30,
        'capability' => 'edit_theme_options',
    ));

    // 3. 
    // Section para Redes Sociales
    $wp_customize->add_section('social_section', array(
        'title' => __('Redes Sociales', 'textdomain'),
        'panel' => 'jw_opciones_custom',
        'priority' => 100,
        'capability' => 'edit_theme_options',
    ));

    // 4. 
    // Section estilos en general
    $wp_customize->add_section('estilos_seccion', array(
        'title' => __('Estilos', 'textdomain'),
        'panel' => 'jw_opciones_custom',
        'priority' => 200,
        'capability' => 'edit_theme_options',
    ));

    // 5. 
    // Section Contenidos del home central
    $wp_customize->add_section('contenidos_body_central', array(
        'title' => __('Contenidos del body central', 'textdomain'),
        'panel' => 'jw_opciones_custom',
        'priority' => 300,
        'capability' => 'edit_theme_options',
    ));

    // 6. 
    // Section Contenidos del home central
    $wp_customize->add_section('contenidos_google_maps', array(
        'title' => __('Google Maps Config', 'textdomain'),
        'panel' => 'jw_opciones_custom',
        'priority' => 1000,
        'capability' => 'edit_theme_options',
    ));

    /* Acá se ponen las características */

    //Logo
    /*
    $wp_customize->add_setting('jw_logo_personalizado', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'jw_logo_personalizado', array(
        'priority' => 1,
        'label' => __('Logo del sitio', 'textdomain'),
        'section' => 'logo_personalizado_section',
        'mime_type' => 'image',
    )));
    */

    /* Iniciamos las opciones del subheader */
    // Número de whatsapp
    $wp_customize->add_setting('jw_whatsapp_numero', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control('jw_whatsapp_numero', array(
        'label' => __('Número de Whatsapp', 'textdomain'),
        'section' => 'jw_subheader_section',
        'priority' => 10,
        'type' => 'text',
    ));
    // Dirección
    $wp_customize->add_setting('jw_direccion_subheader', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control('jw_direccion_subheader', array(
        'label' => __('Dirección', 'textdomain'),
        'section' => 'jw_subheader_section',
        'priority' => 10,
        'type' => 'text',
    ));

    // Correo electrónico
    $wp_customize->add_setting('jw_correoe_subheader', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control('jw_correoe_subheader', array(
        'label' => __('Correo electrónico', 'textdomain'),
        'section' => 'jw_subheader_section',
        'priority' => 10,
        'type' => 'text',
    ));

    /* GOOGLE ANALYTICS */
    //Google Analytics
    $wp_customize->add_setting('my_google_analytics', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('my_google_analytics', array(
        'label' => __('Código de Google Analytics', 'textdomain'),
        'section' => 'google_analytics_section',
        'priority' => 30,
        'type' => 'textarea',
    ));

    $redes_socials = redesSocialesDisponibles(1);

    $prioridad = 10;
    foreach($redes_socials as $llave => $cadaRed)
    {

        //Redes Sociales: Facebook
        $wp_customize->add_setting($llave, array(
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
    
        $wp_customize->add_control($llave, array(
            'label' => __($cadaRed, 'textdomain'),
            'section' => 'social_section',
            'priority' => $prioridad,
            'type' => 'text',
        ));

        $prioridad++;

    }

    // 4. - Estilos
    // 4.1. Color central - 
    $wp_customize->add_setting('estilos_seccion_colorcentral1', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $color = array();
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'estilos_seccion_colorcentral1',
        array(
            'label' => 'Color central Body',
            'section' => 'estilos_seccion',
            'priority' => 50,
            'settings' => $color['slug']
        )
    ));
    // 4.2. Color fondo del formulario
    $wp_customize->add_setting('estilos_seccion_form_central', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'estilos_seccion_form_central',
        array(
            'label' => 'Color fondo formulario',
            'section' => 'estilos_seccion',
            'priority' => 70,
            'settings' => $color['slug']
        )
    ));

    // 5. - Contenidos body central
    // 5.1. - Formulario
    $wp_customize->add_setting('body_central_form_code', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('body_central_form_code', array(
        'label' => __('Código del formulario', 'textdomain'),
        'section' => 'contenidos_body_central',
        'priority' => 90,
        'type' => 'textarea',
    ));
    // 5.2. - Título del formulario
    $wp_customize->add_setting('body_central_form_titulo', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('body_central_form_titulo', array(
        'label' => __('Título del formulario', 'textdomain'),
        'section' => 'contenidos_body_central',
        'priority' => 10,
        'type' => 'text',
    ));
    // 5.3. - Descripción del formulario
    $wp_customize->add_setting('body_central_form_descripcion', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('body_central_form_descripcion', array(
        'label' => __('Título del formulario', 'textdomain'),
        'section' => 'contenidos_body_central',
        'priority' => 20,
        'type' => 'textarea',
    ));
    // 6.1. - Código de Google API
    $wp_customize->add_setting('contenidos_google_maps_apimaps', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('contenidos_google_maps_apimaps', array(
        'label' => __('Código Google API', 'textdomain'),
        'section' => 'contenidos_google_maps',
        'priority' => 20,
        'type' => 'text',
    ));
    // 6.2. - Longitud
    $wp_customize->add_setting('contenidos_google_maps_longitud', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('contenidos_google_maps_longitud', array(
        'label' => __('Longitud', 'textdomain'),
        'section' => 'contenidos_google_maps',
        'priority' => 30,
        'type' => 'text',
    ));
    // 6.3. - Latitud
    $wp_customize->add_setting('contenidos_google_maps_latitud', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('contenidos_google_maps_latitud', array(
        'label' => __('Latitud', 'textdomain'),
        'section' => 'contenidos_google_maps',
        'priority' => 40,
        'type' => 'text',
    ));
    // 6.4. - Zoom
    $wp_customize->add_setting('contenidos_google_maps_zoom', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('contenidos_google_maps_zoom', array(
        'label' => __('Zoom', 'textdomain'),
        'section' => 'contenidos_google_maps',
        'priority' => 50,
        'type' => 'text',
    ));
    // 6.5. - Ubicación en mapa Google
    $wp_customize->add_setting('contenidos_google_maps_ubicacion', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('contenidos_google_maps_ubicacion', array(
        'label' => __('Ubicación en Google Maps', 'textdomain'),
        'section' => 'contenidos_google_maps',
        'priority' => 60,
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'jw_customizar_template');


/* Cargamos las opciones del template */
/*
if (get_option('jw_logo_personalizado')) {
    function add_google_analytics_code()
    {
        // echo get_option('jw_logo_personalizado');
        $foto = wp_get_attachment_image( get_option('jw_logo_personalizado'), $size, $icon, $attr );
    }
    add_action('wp_head', 'add_google_analytics_code');
}
*/


add_theme_support('custom-logo');
function jwmtheme_custom_logo_setup()
{
    $defaults = array(
        'height'               => 'auto',
        'width'                => 760,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );

    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'jwmtheme_custom_logo_setup');

function euro($numero)
{
    return number_format($numero, 2, ',', '.') . "&euro;";
}

function quitar_guttenberg(){
    remove_post_type_support( 'page', 'editor' );
    remove_post_type_support( 'page', 'author' );
    remove_post_type_support( 'page', 'comments' );
}

function disable_block_editor_for_page_ids( $use_block_editor, $post ) {

    $pageID = id_del_home(); 
    if($pageID == $post->ID){
        quitar_guttenberg();
        return false;
        
    }
    if($post->post_type == "servicios"){
        quitar_guttenberg();
        return false;
    }
    
    return $use_block_editor;
}
add_filter( 'use_block_editor_for_post', 'disable_block_editor_for_page_ids', 10, 2 );

function id_del_home(){
    $pageID = get_option('page_on_front'); 
    return $pageID;
}

function primeraPalabraSpan($frase){
    $e = explode(" ", $frase);
    $salida = '';
    foreach($e as $clave => $palabra):
        if($clave == 0)
            $salida .= '<span>'.$palabra.'</span>';
        else
            $salida .= ' '.$palabra;
    endforeach;
    $salida = trim($salida);
    return $salida;
}

function estructura_contenidos($estructura_contenidos){

    // Estructuramos las variables de contenidos para imprimir
    $salida = '';
    if(is_array($estructura_contenidos)){
        foreach($estructura_contenidos as $cUno){
            switch($cUno["acf_fc_layout"]){
                case "contenido_titulo":
                    ob_start(); 
                    ?>
                    <<?= $cUno["tipo_titulo"] ?>><?= $cUno["titulo"] ?></<?= $cUno["tipo_titulo"] ?>>
                    <?php
                    $salida .= ob_get_contents();
                    ob_end_clean();
                break;
                case "contenido_html":
                    ob_start(); 
                    ?>
                    <div class="contenido_html">
                        <?= $cUno["html"] ?>
                    </div>
                    <?php
                    $salida .= ob_get_contents();
                    ob_end_clean();
                break;
                case "contenido_youtube":
                    ob_start(); 
                    ?>
                    <div class="contenido_youtube">
                        <figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio">
                            <div class="wp-block-embed__wrapper">
                                <?= $cUno["youtube"] ?>
                            </div>
                        </figure>
                    </div>
                    <?php
                    $salida .= ob_get_contents();
                    ob_end_clean();
                break;
                case "contenido_imagen":
                    ob_start(); 
                    ?>
                    <div class="contenido_imagen">
                        <img src="<?= $cUno["imagen"]["url"] ?>" alt="<?= $cUno["imagen"]["alt"] ?>">
                    </div>
                    <?php
                    $salida .= ob_get_contents();
                    ob_end_clean();
                break;
                case "foto_texto":
                    ob_start(); 
                    ?>
                    <div class="contenido__foto_texto">
                        <div class="foto">
                            <img src="<?= $cUno["foto"]["url"] ?>" alt="<?= $cUno["foto"]["alt"] ?>">
                        </div>
                        <div class="texto">
                            <?= $cUno["texto"] ?>
                        </div>
                    </div>
                    <?php
                    $salida .= ob_get_contents();
                    ob_end_clean();
                break;
                case "texto_foto":
                    ob_start(); 
                    ?>
                    <div class="contenido__texto_foto">
                        <div class="texto">
                            <?= $cUno["texto"] ?>
                        </div>
                        <div class="foto">
                            <img src="<?= $cUno["foto"]["url"] ?>" alt="<?= $cUno["foto"]["alt"] ?>">
                        </div>
                    </div>
                    <?php
                    $salida .= ob_get_contents();
                    ob_end_clean();
                break;
                case "contenido":
                    ob_start(); 
                    ?>
                    <div class="contenido__contenido">
                        <?= $cUno["contenido"] ?>
                    </div>
                    <?php
                    $salida .= ob_get_contents();
                    ob_end_clean();
                break;
                case "instrucciones_bloque":
                    ob_start(); 
                    ?>
                    <div class="instrucciones_bloque__imagen">
                        <img src="<?= $cUno["imagen"]["url"] ?>" alt="<?= $cUno["imagen"]["alt"] ?>">
                    </div>
                    <div class="instrucciones_bloque__imagen">
                        <?= $cUno["texto"] ?>
                    </div>
                    <?php
                    $salida .= ob_get_contents();
                    ob_end_clean();
                break;
            }
        }
    }
    // $salida = $estructura_contenidos;
    return $salida;
}

function get_terms_formateadas($terms){
    $cargosprnt = '';
    if(is_array($terms)){
        foreach($terms as $cadaCargo){
            if($cargosprnt == ''){
                $cargosprnt = $cadaCargo->name;
            }else{
                $cargosprnt .= ', ' . $cadaCargo->name;
            }
        }
    }
    return $cargosprnt;
}

function get_terms_enbotones($terms){
    $cargosprnt = '';
    if(is_array($terms)){
        foreach($terms as $cadaCargo){
            if($cargosprnt == ''){
                $cargosprnt = '<div class="diario_categoria">'.$cadaCargo->name.'</div>';
            }else{
                $cargosprnt .= '<div class="diario_categoria">'.$cadaCargo->name.'</div>';
            }
        }
    }
    return $cargosprnt;
}

function listado_de_documentos($atts) {
    $salida = '';
    $args = array(
        'post_type' => 'Recursos',
        'tax_query' => array(
            array(
                'taxonomy' => 'tipo_de_recurso',
                'field' => 'slug',
                'terms' => 'gobierno-corporativo',
            ),
        ),
    );
    $query = new WP_Query($args);
    ob_start();
    if ($query->have_posts()) {
        echo '<div class="listado_documentos">
                <div class="listado_documentos__int">';
        while ($query->have_posts()) {
            $query->the_post();

            $img = get_field('imagen_post');
            $excerpt = get_field('resumen_archivo');
            $link = get_field('Link_arch');
            echo '
                <div class="documento_indv">
                    <div class="documento_indv__int">
                        <div class="documento_indv__imagen">
                            <img src="'. $img["url"]  .'" alt="'. $img["alt"]  .'">
                        </div>
                        <div class="documento_indv__contenido">
                            <div class="documento_indv__contenido--int">
                                <h3>'. get_the_title() .'</h3>
                                <p>'. $excerpt  .'</p>
                                <p><a href="'. $link  .'" class="btn" target="_blank">Descargar</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
        echo '</div></div>';
    } else {
        echo 'No resources found.';
    }
    $salida .= ob_get_contents();
    ob_end_clean();
    return $salida;
}
add_shortcode('jwm_documentos', 'listado_de_documentos');

function get_local_filename($archivo){
    $filename = $_SERVER['SCRIPT_FILENAME'];
    $filename = str_replace("/index.php", "", $filename);
    $domain_name = $_SERVER['HTTP_HOST'];
    $salida = explode($domain_name, $archivo);
    return $filename . $salida[1];
}

function get_tiempo_de_mp3($archivo_mp3){
    $archivo_mp3 = get_local_filename($archivo_mp3);
    $filename = $archivo_mp3;
    $getID3 = new getID3;
    $file = $getID3->analyze($filename);
    $playtime_seconds = $file['playtime_seconds'];
    return gmdate("i:s", $playtime_seconds);
}

function get_taxonomias_generales($taxo, $empty){
    $terms = get_terms( array(
        'taxonomy' => $taxo,
        'hide_empty' => $empty,
    ) );
    
    if ( empty( $terms ) || is_wp_error( $terms ) ) {
        return;
    }
    $taxonomias = array();
    
    foreach( $terms as $term ) {
        $taxonomias[$term->slug] = $term->name;
    }

    return $taxonomias;
    
}

function convertir_fecha_idioma($cadena){
    $cadena = str_replace("Monday", "Lunes", $cadena);
    $cadena = str_replace("Tuesday", "Martes", $cadena);
    $cadena = str_replace("Wednesday", "Miércoles", $cadena);
    $cadena = str_replace("Thursday", "Jueves", $cadena);
    $cadena = str_replace("Friday", "Viernes", $cadena);
    $cadena = str_replace("Saturday", "Sábado", $cadena);
    $cadena = str_replace("Sunday", "Domingo", $cadena);

    $cadena = str_replace("January", "Ene", $cadena);
    $cadena = str_replace("Febrary", "Feb", $cadena);
    $cadena = str_replace("March", "Mar", $cadena);
    $cadena = str_replace("April", "Abr", $cadena);
    $cadena = str_replace("June", "Jun", $cadena);
    $cadena = str_replace("July", "Jul", $cadena);
    $cadena = str_replace("August", "Ago", $cadena);
    $cadena = str_replace("September", "Sep", $cadena);
    $cadena = str_replace("October", "Oct", $cadena);
    $cadena = str_replace("November", "Nov", $cadena);
    $cadena = str_replace("December", "Dic", $cadena);
    $salida = $cadena;
    return $salida;
}

function fecha_informes_descargas($fecha){
    $time_input = strtotime($fecha); 
    $date_input = getDate($time_input); 
    $cadena = $date_input["weekday"] . " " . $date_input["mday"] . " " . $date_input["month"] . " " . $date_input["year"];
    $salida = convertir_fecha_idioma($cadena);
    $arreglo = explode(" ", $salida);
    $salida = '';
    foreach($arreglo as $cadaUno){
        $salida .= ' <span>'.$cadaUno.'</span> ';
    }
    return $salida;
}




// Limitar el número de repeticiones en dos campos de repetidor a 4
function limitar_repeticiones_acf_admin($field) {

    if ($field['name'] === 'cards_primera_columna') {
        $field['max'] = 4;
    }
    
 
    if ($field['name'] === 'cards_segunda_columna') {
        $field['max'] = 4;
    }
    
    return $field;
}
add_filter('acf/load_field', 'limitar_repeticiones_acf_admin');


/* Modificar formulario */
$nombre_formulario = add_filter('wpcf7_form_name_attr', function($contact_form) {
    if($contact_form == 'Teleconsultas'){
        add_filter("wpcf7_form_tag", function ($scanned_tag, $replace) {
            global $wpdb;
            $default = '';
        
            /* Seteamos la Tipo de cita */
            if ("tipo_cita" === $scanned_tag["name"]):
                array_unshift($scanned_tag['raw_values'], 'Tipo de cita|');
                $scanned_tag['options'][] = sprintf('default:%s', $default);
                $pipes = new WPCF7_Pipes($scanned_tag['raw_values']);
                // Armamos el HTML
                $scanned_tag['labels'] = $pipes->collect_befores(); // this is the html info for each option
                $scanned_tag['pipes'] = $pipes; // this is separator
                $scanned_tag['values'] = $pipes->collect_afters(); // this is the value for each option
            endif;
            /* Seteamos la EPS */
            if ("eps-user" === $scanned_tag["name"]):
                array_unshift($scanned_tag['raw_values'], 'EPS / Aseguradora|');
                $scanned_tag['options'][] = sprintf('default:%s', $default);
                $pipes = new WPCF7_Pipes($scanned_tag['raw_values']);
                // Armamos el HTML
                $scanned_tag['labels'] = $pipes->collect_befores(); // this is the html info for each option
                $scanned_tag['pipes'] = $pipes; // this is separator
                $scanned_tag['values'] = $pipes->collect_afters(); // this is the value for each option
            endif;
            /* Seteamos la SEDE */
            if ("sede" === $scanned_tag["name"]):
                array_unshift($scanned_tag['raw_values'], 'Selección de Sede|');
                $scanned_tag['options'][] = sprintf('default:%s', $default);
                $pipes = new WPCF7_Pipes($scanned_tag['raw_values']);
                // Armamos el HTML
                $scanned_tag['labels'] = $pipes->collect_befores(); // this is the html info for each option
                $scanned_tag['pipes'] = $pipes; // this is separator
                $scanned_tag['values'] = $pipes->collect_afters(); // this is the value for each option
            endif;
            /* Seteamos el Tipo de documento */
            if ("tipo-documento" === $scanned_tag["name"]):
                array_unshift($scanned_tag['raw_values'], 'Tipo de documento|');
                $scanned_tag['options'][] = sprintf('default:%s', $default);
                $pipes = new WPCF7_Pipes($scanned_tag['raw_values']);
                // Armamos el HTML
                $scanned_tag['labels'] = $pipes->collect_befores(); // this is the html info for each option
                $scanned_tag['pipes'] = $pipes; // this is separator
                $scanned_tag['values'] = $pipes->collect_afters(); // this is the value for each option
            endif;
            /* Termina el proceso individual de campos */
        
            return $scanned_tag;
        }, 10, 2);


    }
    if($contact_form == 'Cita_con_Especialista'){
        add_filter("wpcf7_form_tag", function ($scanned_tag, $replace) {
            global $wpdb;
            $default = '';
        
            /* Seteamos al especialista */
            if ("especialista" === $scanned_tag["name"]):
                $nombre_doctor = get_the_title();
                $scanned_tag['raw_values'] = array($nombre_doctor);
                $scanned_tag['options'][] = sprintf('default:%s', $default);
                $pipes = new WPCF7_Pipes($scanned_tag['raw_values']);
                // Armamos el HTML
                $scanned_tag['labels'] = $pipes->collect_befores(); // this is the html info for each option
                $scanned_tag['pipes'] = $pipes; // this is separator
                $scanned_tag['values'] = $pipes->collect_afters(); // this is the value for each option
            endif;
            /* Termina el proceso individual de campos */
        
            return $scanned_tag;
        }, 10, 2);
    }
    if($contact_form == 'Formulario_evento'){
        add_filter("wpcf7_form_tag", function ($scanned_tag, $replace) {
            global $wpdb;
            $default = '';
        
            /* Seteamos al especialista */
            if ("evento" === $scanned_tag["name"]):
                $evento = get_the_title();
                $scanned_tag['raw_values'] = array($evento);
                $scanned_tag['options'][] = sprintf('default:%s', $default);
                $pipes = new WPCF7_Pipes($scanned_tag['raw_values']);
                // Armamos el HTML
                $scanned_tag['labels'] = $pipes->collect_befores(); // this is the html info for each option
                $scanned_tag['pipes'] = $pipes; // this is separator
                $scanned_tag['values'] = $pipes->collect_afters(); // this is the value for each option
            endif;
            /* Termina el proceso individual de campos */
        
            return $scanned_tag;
        }, 10, 2);
    }
});


function procesos_ajax_internos() {
    global $wpdb;
    // veriicamos que los post vengan
    if(!isset($_POST["accion"])){
        return;
    }

    // Verificamos proceso nonce por seguridad
    $id_usuario = get_current_user_id();
    $nonce = sanitize_text_field( $_POST['nonce'] );
    if ( ! wp_verify_nonce( $nonce, 'my-ajax-nonce' ) ) {
        die ( 'Solicitud de acceso denegada. La solicitud POST que usted está haciendo es insegura.');
    }
    // Verificación correcta. Continuamos con el proceso AJAX.
    $filtros = array();
    $filtro_valores = (isset($_POST["filtro_valores"])) ? $_POST["filtro_valores"] : '';
    $filtro_idiomas = (isset($_POST["filtro_idiomas"])) ? $_POST["filtro_idiomas"] : '';
    $filtro_tipo = (isset($_POST["filtro_tipo"])) ? $_POST["filtro_tipo"] : '';
    $filtro_accion = (isset($_POST["accion"])) ? $_POST["accion"] : '';
    $filtro_buscar = (isset($_POST["buscar"])) ? $_POST["buscar"] : '';
    $servicio = (isset($_POST["servicio"])) ? $_POST["servicio"] : '';
    $letra = (isset($_POST["letra"])) ? $_POST["letra"] : '';

    // Armamos los filtros para buscar por taxonomias
    if(is_array($filtro_valores)){
        foreach($filtro_valores as $llave => $cValor){
            $filtros[] = array(
                'taxonomy' => $llave,
                'field'    => 'term_id',
                'terms'    => $cValor,
            );
        }
    }
    if(is_array($filtro_idiomas)){
        foreach($filtro_idiomas as $llave => $cValor){
            $filtros[] = array(
                'taxonomy' => 'idiomas',
                'field'    => 'slug',
                'terms'    => $cValor,
            );
        }
    }

    // Verificamos qué es lo que vamos a buscar - directorio, ofertas, empleos, etc
    if($filtro_tipo == 'directorio'){
        $post_type = 'lideres';
    }
    if($filtro_tipo == 'empleo'){
        $post_type = 'bolsa_de_empleo';
    }
    if($filtro_tipo == 'ofertas'){
        $post_type = 'ofertas';
    }
    if($filtro_tipo == 'especialistas'){
        $post_type = 'especialistas';
    }

    // Verificamos si es una búsqueda o si es un filtro de variables:
    if($filtro_accion == 'buscador'){
        $argumentos = array(  
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'order' => 'ASC',
            'orderby' => 'title',
            // 's' => $filtro_buscar,
        );
    }
    if($filtro_accion == 'filtro'){
        $argumentos = array(  
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'order' => 'ASC',
            'orderby' => 'title',
            'tax_query' => $filtros,
        );
        
    }

    $doctores = get_doctores_con_servicios();
    $datos = array();
    $query = new WP_Query($argumentos);
    $entrada_index = 0;
    if ($query->have_posts()) { while ($query->have_posts()) { $query->the_post();
        if($filtro_tipo == 'directorio'){ /* Datos si es directorio */
            $id = get_the_ID();
            $imagen = get_the_post_thumbnail($id, 'full');
            $cargosprnt = get_terms_formateadas(get_the_terms($id, 'cargo'));

            $cargos = get_terms_formateadas(get_the_terms($id, 'cargo'));
            $sectores = get_terms_formateadas(get_the_terms($id, 'sectores'));
            $empresas = get_terms_formateadas(get_the_terms($id, 'empresa'));
            $paises = get_terms_formateadas(get_the_terms($id, 'pais'));
            $departamentos = get_terms_formateadas(get_the_terms($id, 'departamentos'));
            $intereses = get_terms_formateadas(get_the_terms($id, 'intereses'));
            $profesion = get_terms_formateadas(get_the_terms($id, 'profesion'));
            $perfiles = get_terms_formateadas(get_terms( 'perfil', array( 'parent' => 0 ) ));

            $card_perfil = get_field('card_perfil', $id);
            $card_cargo = get_field('card_cargo', $id);
            $card_sector = get_field('card_sector', $id);
            $card_intereses = get_field('card_intereses', $id);
            $correo = get_field('correo');
            $linkedin = get_field('linkedin');

            if(!(is_user_logged_in())){
                $linkedin = '';
                $correo = '';
            }

            $all = $cargos . $sectores . $empresas . $paises . $departamentos . $intereses . $profesion . $perfiles;
            $all .= get_the_title() . " " . get_the_permalink() . " " . get_field('apellido') . " ";
            $all .= get_field('nombre') . $correo . $linkedin . $cargosprnt;
            $all .= $card_perfil . $card_cargo . $card_sector . $card_intereses;

            $datos[$id]["all"] = $all;
            $datos[$id]["nombre"] = get_the_title();
            $datos[$id]["indice"] = $entrada_index;
            $datos[$id]["post_id"] = $id;
            $datos[$id]["titulo"] = get_the_title();
            $datos[$id]["fecha"] = get_the_date();
            $datos[$id]["enlace"] = get_the_permalink();
            $datos[$id]["imagen"] = ($imagen == '') ? '<span></span>' : $imagen;
            $datos[$id]["nombre"] = get_field('nombre');
            $datos[$id]["apellido"] = get_field('apellido');
            $datos[$id]["correo"] = get_field('correo');
            $datos[$id]["linkedin"] = get_field('linkedin');
            $datos[$id]["cargo"] = $cargosprnt;
            $datos[$id]["clase"] = ($imagen == '') ? 'sin-imagen' : '';
            $entrada_index++;
        }/* directorio */
        if($filtro_tipo == 'empleo'){ /* Datos si es empleo */
            $id = get_the_ID();
            $imagen = get_the_post_thumbnail($id, 'full');
            $cargosprnt = get_terms_formateadas(get_the_terms($id, 'cargo'));
            $areas = get_terms_formateadas(get_the_terms($id, 'areas'));

            $rango_de_salario = get_terms_formateadas(get_the_terms($id, 'rango_de_salario'));

            $all = $rango_de_salario . $areas . $cargosprnt;
            $all .= get_the_title() . " " . get_the_permalink() . " " . get_field('descripcion') . " ";
            $all .= get_field('salario') . get_field('mas_detalles') . get_field('contacto');

            $datos[$id]["all"] = $all;
            $datos[$id]["indice"] = $entrada_index;
            $datos[$id]["post_id"] = $id;
            $datos[$id]["titulo"] = get_the_title();
            $datos[$id]["fecha"] = get_the_date();
            $datos[$id]["hace"] = tiempoTranscurrido(get_the_date("Y-m-d"));
            $datos[$id]["descripcion"] = get_field('descripcion');
            $datos[$id]["salario"] = (get_field('salario') == "") ? '' : formato_moneda(get_field('salario'));
            $datos[$id]["mas_detalles"] = get_field('mas_detalles');
            $datos[$id]["contacto"] = get_field('contacto');
            $datos[$id]["fecha_finalizacion"] = get_field('fecha_finalizacion');
            $datos[$id]["autor"] = get_the_author();
            $datos[$id]["areas"] = $areas;
            $entrada_index++;
        }/* empleo */
        if($filtro_tipo == 'ofertas'){
            $id = get_the_ID();
            $imagen = get_the_post_thumbnail($id, 'full');
            $tipos_de_anuncio = get_terms_formateadas(get_the_terms($id, 'tipos_de_anuncio'));
            $tipos_de_anuncio = ($tipos_de_anuncio == '') ? 'Oferta' : $tipos_de_anuncio;

            $all = $tipos_de_anuncio;
            $all .= get_the_title() . get_field('descripcion') . get_field('contacto') . get_field('anunciante') . $tipos_de_anuncio . get_the_author();

            $datos[$id]["all"] = $all;
            $datos[$id]["indice"] = $entrada_index;
            $datos[$id]["post_id"] = $id;
            $datos[$id]["titulo"] = get_the_title();
            $datos[$id]["fecha"] = get_the_date();
            $datos[$id]["hace"] = tiempoTranscurrido(get_the_date('Y-m-d H:i:s'));
            $datos[$id]["tipo"] = $tipos_de_anuncio;
            $datos[$id]["autor"] = get_the_author();
            $datos[$id]["descripcion"] = get_field('descripcion', $id);
            $datos[$id]["anunciante"] = get_field("anunciante", $id);


        }
        if($filtro_tipo == 'especialistas'){ /* Datos si es directorio */
            $id = get_the_ID();

            /*
            $cargos = get_terms_formateadas(get_the_terms($id, 'cargo'));
            $sectores = get_terms_formateadas(get_the_terms($id, 'sectores'));
            $empresas = get_terms_formateadas(get_the_terms($id, 'empresa'));
            */
            
            $id_publicacion = $id;
            $imagen = get_field('image_doctor', $id_publicacion)["url"];
            $fecha_del_evento = get_field('fecha_del_evento', $id_publicacion);
            $nombre = get_field('nombre', $id_publicacion);
            $apellido = get_field('apellido', $id_publicacion);
            $slug = get_post_field('post_name', $id_publicacion);
            $titulo = get_the_title();
            $nombre_completo = (($nombre != "" && $apellido != "")) ? $nombre . " " . $apellido : $titulo;
            $servicios = formatear_servicios($doctores[$slug]);
            $especialidades_y_sub = get_field('specialties_doctor', $id_publicacion);
            $clase = '';
            if(!(isset($imagen))){
                $clase = 'sin_imagen';
            }

            $all = $cargos . $titulo . $nombre_completo . $imagen . $servicios . $especialidades_y_sub;

            $datos[$id]["all"] = $all;
            $datos[$id]["nombre"] = $nombre;
            $datos[$id]["apellido"] = $apellido;
            $datos[$id]["indice"] = $entrada_index;
            $datos[$id]["post_id"] = $id;

            $datos[$id]["nombre_completo"] = $nombre_completo;
            $datos[$id]["descripcion"] = get_the_excerpt();
            $datos[$id]["fecha_del_evento"] = $fecha_del_evento;
            $datos[$id]["enlace"] = get_the_permalink($id_publicacion);
            $datos[$id]["imagen"] = $imagen;
            $datos[$id]["especialidades_y_sub"] = $especialidades_y_sub;
            $datos[$id]["servicios"] = $servicios;
            $datos[$id]["clase"] = $clase;

            $entrada_index++;
        }/* directorio */

        }/*while*/
        wp_reset_postdata();
    }/*if*/

    // si es buscador, vamos a peluquear la búsqueda
    if($filtro_accion == 'buscador'){
        foreach($datos as $idcadaP => $cadaP){
            if (!(strpos(strtoupper($cadaP["all"]), strtoupper($filtro_buscar)) !== false)){
                unset($datos[$idcadaP]);
            }
        }
    }

    if($filtro_tipo == 'especialistas'){
        if($servicio != ""){
            foreach($datos as $idcadaP => $cadaP){
                if (!(strpos(strtoupper($cadaP["all"]), strtoupper($servicio)) !== false)){
                    unset($datos[$idcadaP]);
                }
            }
        }
        if($letra != ""){
            foreach($datos as $idcadaP => $cadaP){
                $analizar = $cadaP["apellido"];
                if($cadaP["apellido"] == ""){
                    $analizar = $cadaP["nombre_completo"];
                }
                if(!(strtoupper($analizar[0]) == strtoupper($letra))){
                    unset($datos[$idcadaP]);
                }
            }
        }
    }
        
    
    ob_start();
    foreach($datos as $cadaP){
        if($filtro_tipo == 'directorio'){
            ?>
            <a href="<?= $cadaP["enlace"] ?>" class="directoriolist__card">
                <div class="directoriolist__card__int <?= $cadaP["clase"] ?>">
                    <div class="directoriolist__card--foto">
                        <?= $cadaP["imagen"] ?>
                    </div>
                    <div class="directoriolist__card--content">
                        <div class="directoriolist__card--content__cont">
                            <h2><?= $cadaP["nombre"] ?> <?= $cadaP["apellido"] ?></h2>
                            <h3><?= $cadaP["cargo"]; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
            <?php
        } // Termina el directorio
        if($filtro_tipo == 'empleo'){
            ?>
            <div class="ofertalist__card">
                <div class="ofertalist__card__int">
                    <div class="ofertalist__card__int--fecha">
                        <p><?= $cadaP["hace"]; ?></p>
                    </div>
                    <div class="ofertalist__card__int--titulo">
                        <h3 class="titulo"><?= $cadaP["titulo"]; ?></h3>
                    </div>
                    <div class="ofertalist__card__int--descripcion">
                        <p class="descripcion"><?= $cadaP["descripcion"]; ?> </p>
                    </div>
                    <div class="ofertalist__card__int--botones">
                        <div>
                            
                            <a href="#" class="ver_mas modalOfertaAct" data-salario="<?= $cadaP["salario"]; ?>" data-detalles="<?= $cadaP["mas_detalles"]; ?>" data-autor="<?= $cadaP["autor"]; ?>" data-finalizacion="<?= $cadaP["fecha_finalizacion"]; ?>" data-areas="<?= $cadaP["areas"]; ?>" data-contacto="<?= $cadaP["contacto"]; ?>" data-bs-toggle="modal" data-bs-target="#ofertaModal">Ver más <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <div>
                            <a href="#" class="aplicar">Quiero aplicar <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
            <?php
        }
        if($filtro_tipo == 'ofertas'){
            ?>
            <div class="ofertalist__card <?= $cadaP["tipo"] ?>">
                <div class="ofertalist__card__int">
                    <div class="oferta__tipo">
                        <p><?= $cadaP["tipo"] ?></p>
                    </div>
                    <div class="ofertalist__card__int--fecha">
                        <p><?= (isset($cadaP["hace"])) ? $cadaP["hace"] : ''; ?></p>
                    </div>
                    <div class="ofertalist__card__int--titulo">
                        <h3 class="titulo"><?= $cadaP["titulo"]; ?></h3>
                    </div>
                    <div class="ofertalist__card__int--descripcion">
                        <p class="descripcion"><?= $cadaP["descripcion"]; ?> </p>
                    </div>
                    <div class="ofertalist__card__int--botones">
                        <div>
                            <a href="#" class="ver_mas modalOfertaAct" data-autor="<?= $cadaP["autor"] ?>" data-detalles="" data-finalizacion="<?= $cadaP["fecha_finalizacion"] ?>" data-contacto="<?= $cadaP["contacto"]; ?>" data-bs-toggle="modal" data-bs-target="#ofertaModal">Me interesa <i class="fas fa-arrow-right"></i></a>
                        </div>

                    </div>

                </div>
            </div>
            <?php
        }
        if($filtro_tipo == 'especialistas'){
            ?>
            <div class="especialistaindv">
                <div class="especialistaindv__int <?= $cadaP["clase"] ?>">
                    <?php if($cadaP["clase"] != "sin_imagen"): ?>
                        <div class="especialistaindv__foto">
                            <a href="<?= $cadaP["enlace"] ?>">
                                <img src="<?= $cadaP["imagen"] ?>" alt="<?= $cadaP["titulo"] ?>">
                            </a>
                        </div>
                    <?php endif ?>
                    <div class="especialistaindv__contenido">
                        <h2><a href="<?= $cadaP["enlace"] ?>"><?= $cadaP["nombre_completo"] ?></a></h2>
                        <p><?= $cadaP["servicios"] ?></p>
                        <h3>ESPECIALIDADES Y SUBESPECIALIDADES</h3>
                        <p><?= $cadaP["especialidades_y_sub"] ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    $html = ob_get_contents(); 
    ob_end_clean();

    if(count($datos) == 0){
        $html = '
        <div class="sinresultados">
            <p>No se encontraron resultados con los filtros aplicados.</p>
        </div>
        ';
    }


    $salida = array(
        'html' => $html,
        'argumentos' => $argumentos
    );
    echo json_encode($salida);
        
    // Termina proceso AJAX. Damos wp_die para que no cargue la página completa
    wp_die();
}
add_action( 'wp_ajax_nopriv_acciones-ajax', 'procesos_ajax_internos' );
add_action( 'wp_ajax_acciones-ajax', 'procesos_ajax_internos' );


function formatear_servicios($array){
    $salida = '';
    if(is_array($array)){
        foreach($array as $cadaUno){
            $servicio = '<a href="/servicios/'.$cadaUno["slug"].'/">'.$cadaUno["servicio"].'</a>';
            if($salida == ''){
                $salida = $servicio;
            }else{
                $salida .= ", " . $servicio;
            }
        }
    }
    return $salida;
}

function get_doctores_con_servicios(){
    
    global $post;
    
    $args = array(
        'post_type' => 'servicios',
        'orderby' => 'post_title',
        'order' => 'ASC',
        'posts_per_page' => -1,
    );
    $entrada_index = 0;
    $publicaciones = array();
    
    $query = new WP_Query($args);
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
        $id_publicacion = $post->ID;
        $data_imagen = get_field('image_doctor', $id_publicacion);
        $imagen = isset($data_imagen["url"]) ? $data_imagen["url"] : '';
        $fecha_del_evento = get_field('fecha_del_evento', $id_publicacion);
    
        $nombre = get_field('nombre', $id_publicacion);
        $apellido = get_field('apellido', $id_publicacion);
        $nombre_completo = (($nombre != "" && $apellido != "")) ? $nombre . " " . $apellido : get_the_title();
        $clase = '';
        if(!(isset($imagen))){
            $clase = 'sin_imagen';
        }
    
        $publicaciones[$id_publicacion] = array(
            "titulo" => $post->post_title,
            "slug" => $post->post_name,
            "doctores" => get_field('doctors_service'),
        );
        $entrada_index++;
        endwhile;
        wp_reset_postdata();
    endif;
    
    $doctores = array();
    foreach($publicaciones as $publicacion){
        if(is_array($publicacion["doctores"])){
            foreach($publicacion["doctores"] as $doctor){
                $doctores[$doctor->post_name][] = array(
                    'nombre' => $doctor->post_title,
                    'slug' => $publicacion["slug"],
                    'servicio' => $publicacion["titulo"],
                );
            }
        }
    }
    return $doctores;
}

function get_ubicaciones(){
    
    global $post;
    
    $args = array(
        'post_type' => 'ubicaciones',
        'orderby' => 'post_title',
        'order' => 'ASC',
        'posts_per_page' => -1,
    );
    $entrada_index = 0;
    $publicaciones = array();
    
    $query = new WP_Query($args);
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
        $id_publicacion = $post->ID;
        $imagen_ubicacion = get_field('image_location', $id_publicacion)["url"];
        $lugar = get_field('place_location', $id_publicacion);
        $letra = get_field('lyric_location', $id_publicacion);
        $pisos = get_field('floors_repeater', $id_publicacion);

        $ubicacion = array(
            'letra' => $letra,
            'nombre' => $lugar,
            'imagen' => $imagen_ubicacion,
            'ver_ubicacion' => array(
                'enlace' => '#',
                'label' => 'Ver ubicación',
                'ventana' => '_blank',
            ),
        );
        
        $indice = 0;
        foreach($pisos as $piso){
            $secciones = $piso["sections_floor_repeater"];
            $seccion_salida = '<ul>';
            foreach($secciones as $seccion){
                $seccion_nombre = $seccion['section_floor'];
                $seccion_link = $seccion['section_floor_link'];
                $enlace = '';

                $link_type = $seccion_link["link_type"];
                if($link_type == 'internal_link'){
                    if($seccion_link["link_btn_internal"] != ""){
                        $enlace = $seccion_link["link_btn_internal"];
                    }
                }
                if($link_type == 'external_link'){
                    if($seccion_link["link_btn_external"] != ""){
                        $enlace = $seccion_link["link_btn_external"];
                    }
                }

                if($enlace != ''){
                    $seccion_nombre = '<a href="'.$enlace.'">'.$seccion_nombre.'</a>';
                }
                $seccion_salida .= "
                    <li>{$seccion_nombre}</li>
                ";
            }
            $seccion_salida .= '</ul>';

            $ubicacion['niveles'][$indice] = array(
                'nombre' => $piso["floor_name"],
                'contenido' => $seccion_salida,
            );

            $indice++;
        }
    
        $publicaciones[$id_publicacion] = $ubicacion;
        $entrada_index++;
        endwhile;
        wp_reset_postdata();
    endif;

    return $publicaciones;

}

function get_ubicaciones_102(){
    
    global $post;
    
    $args = array(
        'post_type' => 'ubicaciones102',
        'orderby' => 'post_title',
        'order' => 'ASC',
        'posts_per_page' => -1,
    );
    $entrada_index = 0;
    $publicaciones = array();
    
    $query = new WP_Query($args);
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
        $id_publicacion = $post->ID;
        $imagen = get_field('image_location', $id_publicacion);
        $imagen_ubicacion = isset($imagen["url"]) ? $imagen["url"] : '';
        $lugar = get_field('place_location', $id_publicacion);
        $letra = get_field('lyric_location', $id_publicacion);
        $pisos = get_field('floors_repeater', $id_publicacion);

        $ubicacion = array(
            'letra' => $letra,
            'nombre' => $lugar,
            'imagen' => $imagen_ubicacion,
            'ver_ubicacion' => array(
                'enlace' => '#',
                'label' => 'Ver ubicación',
                'ventana' => '_blank',
            ),
        );
        
        $indice = 0;
        if ($pisos) { 
            foreach($pisos as $piso){
                $secciones = $piso["sections_floor_repeater"];
                $seccion_salida = '<ul>';
                foreach($secciones as $seccion){
                    $seccion_nombre = $seccion['section_floor'];
                    $seccion_link = $seccion['section_floor_link'];
                    $enlace = '';
    
                    $link_type = $seccion_link["link_type"];
                    if($link_type == 'internal_link'){
                        if($seccion_link["link_btn_internal"] != ""){
                            $enlace = $seccion_link["link_btn_internal"];
                        }
                    }
                    if($link_type == 'external_link'){
                        if($seccion_link["link_btn_external"] != ""){
                            $enlace = $seccion_link["link_btn_external"];
                        }
                    }
    
                    if($enlace != ''){
                        $seccion_nombre = '<a href="'.$enlace.'">'.$seccion_nombre.'</a>';
                    }
                    $seccion_salida .= "
                        <li>{$seccion_nombre}</li>
                    ";
                }
                $seccion_salida .= '</ul>';
    
                $ubicacion['niveles'][$indice] = array(
                    'nombre' => $piso["floor_name"],
                    'contenido' => $seccion_salida,
                );
    
                $indice++;
            }
        }
    
        $publicaciones[$id_publicacion] = $ubicacion;
        $entrada_index++;
        endwhile;
        wp_reset_postdata();
    endif;

    return $publicaciones;

}

function get_1erservicio_x_grupo($grupo){
    $filtros[] = array(
        'taxonomy' => 'grupos',
        'field'    => 'slug',
        'terms'    => $grupo,
    );
    $argumentos = array(  
        'post_type' => 'servicios',
        'post_status' => 'publish',
        'posts_per_page' => 1, 
        'order' => 'ASC',
        'orderby' => 'title',
        'tax_query' => $filtros,
    );
    $salida = array();
    $query = new WP_Query($argumentos);
    $entrada_index = 0;
    if ($query->have_posts()) { while ($query->have_posts()) { $query->the_post();
        $id = get_the_ID();
        $salida["id"] = $id;
        $salida["slug"] = get_post_field('post_name', $id);
        $salida["nombre"] = get_the_title();

        }/*while*/
        wp_reset_postdata();
    }/*if*/
    return $salida;
}

function get_field_choices($field_name, $multi = false) {
  $results = array();
  foreach (get_posts(array('post_type' => 'acf-field', 'posts_per_page' => -1)) as $acf) {
    if ($acf->post_excerpt === $field_name) {
      $field = unserialize($acf->post_content);
      if(isset($field['choices'])) {
        if(!$multi) return $field['choices'];
        else $results []= $field;
      }
    }
  }
  return $results;
}




add_action('wp_ajax_my_ajax_function', 'my_ajax_function');
add_action('wp_ajax_nopriv_my_ajax_function', 'my_ajax_function');

function my_ajax_function() {
  $selected_date_id = $_POST['selected_date_id'];
  $args = array(
    'post_type' => 'eventos',
    'meta_query' => array(
      array(
        'key' => 'fecha_evento',
        'value' => $selected_date_id,
        'compare' => '=',
      ),
    ),
  );
  $events_query = new WP_Query($args);
  $events = array();
  if ($events_query->have_posts()) {
    while ($events_query->have_posts()) {
      $events_query->the_post();
      $event = array(
        'title' => get_the_title(),
          'content' => get_the_content(),
		  'image' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
		  'informacion_del_evento' => get_field('informacion_del_evento'),
		  'texto_del_boton' => get_field('texto_del_boton'),
		  'link_del_boton' => get_field('link_del_boton'),
      );
      array_push($events, $event);
    }
    wp_reset_postdata();
  }
  wp_send_json($events);
  exit; // leave ajax call
}

function getEventos(){
    
    $args = array(
        'post_type' => 'eventos',
      );
      $events_query = new WP_Query($args);
      $events = array();
      if ($events_query->have_posts()) {
        while ($events_query->have_posts()) {
          $events_query->the_post();
          $event = array(
            'fecha_evento' => get_field('fecha_evento'),
          );
          array_push($events, $event);
        }
        wp_reset_postdata();
      }
      wp_send_json($events);
    exit; // leave ajax call
}
add_action( 'wp_ajax_getEventos', 'getEventos' );   
add_action( 'wp_ajax_nopriv_getEventos', 'getEventos'); 


// Capturamos el formulario de envío de tarjeta de saludo a pacientes
// Capturamos antes de enviar para: 1. validar, 2. crear el PDF, 3. Adjuntar un archivo.
/*
    INSTRUCCIONES: 
    - En local el formulario ID es 8189. Esto se cambia en Prod (que es 8189).
    - Límite de caracteres $limite_caracteres no solo se debe ajustar acá, sino en el scripts.min.js. Actualmente es de 440.
    - Las validaciones que se hacen son: 1. Limite de caracteres en mensaje, 2. Que el correo del paciente esté cuando sea digital.
    - Pilas con la ubicación de la librería. Está en una carpeta llamada "pdf/" en la misma raíz del template.
    - Si podemos mover la librería a una ubicación por fuera del sistema de archivos, para evitar posibles ataques, mejor.
    - Pilas con la carpeta /wp-content/uploads/pdfs/, que debe tener permisos de escritura (probablemente 777)
    - Esa misma carpeta pdfs debería tener un index.php vacío
    - Deben indicar un correo de FCI donde van a recibir las tarjetas en caso que no sean virtuales. Está en la variable $correo_fci.
*/
// Add a filter for hidden fields in WPCF7 forms
function custom_validate_func($result, $tags)
{
    $wpcf7 = WPCF7_ContactForm::get_current();
    $id_form = $wpcf7->id;
	

    if ($id_form == 8189) { // Solo aplica al form 

        $limite_caracteres = 440;
        $submission = WPCF7_Submission::get_instance();
        $data = $submission->get_posted_data();

        // Validamos no exceder el límite de caracteres
        if (strlen($data["mensaje"]) > $limite_caracteres) {
            $result->invalidate('mensaje', 'Lo sentimos, pero este campo no debe tener más de ' . $limite_caracteres . ' caracteres.');
        }
        // Validamos que si la tarjeta se debe enviar virtual, el correo del paciente esté diligenciado.
        if ($data["enviar_tarjeta_virtual"][0] == 'Sí' && empty($data["correo_paciente"])) {
            $result->invalidate('correo_paciente', 'Este campo no puede quedar vacío. Por favor digite el correo del paciente.');
        }
		
    }

    return $result;
}
add_filter('wpcf7_validate', 'custom_validate_func', 11, 2);


function crear_pdf($plantilla, $mensaje, $paciente, $firma)
{
    // Importo la librería
    // require_once('../../../../pdf/tcpdf.php');
	require_once('/var/www/vhosts/lacardio.org/pdf/tcpdf.php');
    // Ruta 
    $raiz = explode('/index.php', $_SERVER['SCRIPT_FILENAME'])[0];
    $ruta = explode($_SERVER['HTTP_HOST'], $plantilla)[1];
    $carpeta_guardar = '/wp-content/uploads/pdfs/';

    $pdf = new TCPDF('L', 'px', array(1884, 950), true, 'UTF-8', false, false, array(), false, '1.3', '', '', '', '', '', '', '', '', array(0, 0, 0, 0));

    // Establece el título del documento
    // $pdf->SetTitle('Mi PDF Personalizado');

    $pdf->SetMargins(0, 0, 0);
    $pdf->AddPage();

    // Agrega una página al PDF
    $imagenFondo = $raiz . $ruta;
    $pdf->Image($imagenFondo, 0, 0, 2084, 950, '', '', '', false, 300, '', false, false, 0, true, false, true);

    $nombre = 'Apreciado/a ' . $paciente;
    $mensaje = $mensaje;
    $firma = 'Con aprecio, ' . $firma[0] . ' ' . $firma[1];

    $cant_saltos = 11 - (ceil(strlen($mensaje) / 45));
    $cant_saltos = ceil($cant_saltos / 2);
    $saltos = '';
    for ($i = 0; $i < $cant_saltos; $i++) {
        $saltos .= '<br />';
    }

    $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
                *{ 
                    margin:0;
                    padding:0;
                }
                body{
                    background-image: url(img/tarjeta_01.png);
                    background-size: cover; /* Ajustar la imagen al tamaño del contenedor */
                    background-repeat: no-repeat;
                    font-family: Helvetica;
                }
                .capa_ppal{
                    font-size:36px;
                }
                table{
                }
                table td{
                }
                .contenido_texto{    
                    color:#022d7b;
                    padding-left:40px;
                    padding-right:80px;
                }
                .contenido_texto p{
                    margin-bottom:0;
                }
            </style>
        </head>
        <body>
            <div class="capa_ppal" style="width:2084px; margin: 0 auto; ">
                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
                    <tr>
                        <td style="width:1021px;">
                        </td>
                        <td style="width:783px;">
                            <div class="contenido_texto">
                            ' . $saltos . '
                            <table>
                                <tr>
                                    <td style="height:52px;"><span style="margin-bottom:0;">' . $nombre . '</span></td>
                                </tr>
                                <tr>
                                    <td><span>' . $mensaje . '</span></td>
                                </tr>
                                <tr>
                                    <td><p style="font-size:8px;">&nbsp;</p><span>' . $firma . '</span></td>
                                </tr>
                            </table>                      
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </body>
        </html>
    ';
    $pdf->writeHTML($html, false, false, true, false, 'C');

    // Genera el PDF y lo guarda en el servidor (reemplaza 'archivo.pdf' con el nombre que desees)
    $directorio = $raiz . $carpeta_guardar;
    $nombre = 'pdf_' . date("Y-m-d_H_i_s") . '_' . rand(10, 99) . '.pdf';
    $url_final = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $carpeta_guardar . $nombre; // Consulta http
    $url_carpeta = $directorio . $nombre;
    $pdf->Output($url_carpeta, 'F');
    return array(
        $url_carpeta,
        $url_final
    );
}

add_action('wpcf7_before_send_mail', 'capturar_formulario');
function capturar_formulario($cf7)
{
    // Verificar que se trata del formulario específico (reemplaza 'FORM_ID' con el ID de tu formulario)
    if ($cf7->id() == 8189) {

        // get the current CF7 submission
        $submission = WPCF7_Submission::get_instance();
        if (!$submission || !is_a($submission, WPCF7_Submission::class)) {
            return;
        }

        // get the contact form for this subimssion
        $contact_form = $submission->get_contact_form();

        // Obtener los valores de los campos
        $mensaje = $_POST['mensaje'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $pacienteNombres = $_POST['paciente_nombres'];
        $pacienteApellidos = $_POST['paciente_apellidos'];
        $enviarTarjetaVirtual = $_POST['enviar_tarjeta_virtual'];
        $correoPaciente = $_POST['correo_paciente'];
        $habitacion = $_POST['habitacion'];
        $plantilla = $_POST['plantilla'];

        // Generamos el PDF

        $pdf = crear_pdf($plantilla, $mensaje, $pacienteNombres, array($nombres, $apellidos));

        $url_pdf = $pdf[0];
        $url_pdf_internet = $pdf[1];

        // Actualizamos el enlace en el último registro
        global $wpdb;

        $tabla = $wpdb->prefix . 'db7_forms';
        $query = "SELECT * FROM $tabla WHERE form_post_id = 8189 AND form_value LIKE '%{$nombres}%' AND form_value LIKE '%{$apellidos}%' ORDER BY form_id DESC LIMIT 1";
        $resultados = $wpdb->get_results($query);
        // Deserializamos la información para poder almacenarla
        $data = $resultados[0]->form_value;
        $data = unserialize($data);
        $data["plantilla_imagen"] = $data["plantilla"];
        $data["plantilla"] = $url_pdf_internet;
        $data = serialize($data);

        $datos_actualizados = array(
            'form_value' => $data,
        );
        $formato_datos = array(
            '%s', // '%s' para datos de cadena (string)
        );
        $resultado = $wpdb->update(
            $tabla,
            $datos_actualizados,
            array('form_id' => $resultados[0]->form_id),
            $formato_datos,
            array('%d')
        );


        // Empezamos a generar el correo
        $correo_fci = 'john.martinez@mentor360.net';
        $correo_recibe = (empty($correoPaciente)) ? $correo_fci : $correoPaciente;

        $headers = array(
            'From: ' . $nombres . ' ' . $apellidos . ' <info@local.fciclinica.com>',
            'Reply-To: ' . $correo,
            'Cc: john.martinez@mentor360.net',
            // 'Bcc: unavidaenremoto@gmail.com',
        );

        $subject  = 'Recibiste una nueva tarjeta de saludo';
        $titulo = 'Hola ' . $pacienteNombres . '. Haz recibido una tarjeta de saludo';
        $mensaje = 'Hola ' . $pacienteNombres . '. Haz recibido una tarjeta de saludo de parte de ' . $nombres . '. Te invitamos a que la descargues del adjunto del correo y la imprimas.';
        if ($enviarTarjetaVirtual != "Sí") {
            $titulo = 'Paciente ' . $pacienteNombres . ' ' . $pacienteApellidos . ' en la habitación ' . $habitacion . ' ha recibido una nueva tarjeta de saludo';
            $mensaje = 'Hola equipo de Cardio Infantil. El paciente <strong>' . $pacienteNombres . ' ' . $pacienteApellidos . '</strong> ha recibido una tarjeta de saludo. Se encuentra en la habitación <strong>' . $habitacion . '</strong> y se la ha enviado <strong>' . $nombres . ' ' . $apellidos . '</strong>. Por favor imprimirla y hacérsela llegar.';
            $subject  = 'Paciente ' . $pacienteNombres . ' ' . $pacienteApellidos . ' ha recibido una nueva tarjeta de saludo';
        }

        $message  = '
            <div class="mensaje" style="background-color:#f5f5f5; font-family: Helvetica; max-width:600px; margin: 0 auto;">
                <div class="mensaje__cont" style="padding: 30px; text-align:center;">
                    <h2 style="margin-bottom:2em;text-align:center;">' . $titulo . '</h2>
                    <p>' . $mensaje . '</p>
                </div>
                <div class="logo" style="background-color:#041e42;padding:20px;text-align:center;">
                    <img src="https://www.lacardio.org/wp-content/uploads/2023/09/fci_logo.png" style="width:150px;" alt="Cardio Infantil">
                </div>
            </div>
        ';
        $content_type = function () {
            return 'text/html';
        };
        add_filter('wp_mail_content_type', $content_type);
        $attachments = array($url_pdf);
        wp_mail($correo_recibe, $subject, $message, $headers, $attachments);
        remove_filter('wp_mail_content_type', $content_type);
    }
}

/* Capturar formulario */
add_filter('wpcf7_ajax_json_echo', 'modificar_respuesta_cf7', 10, 2);
function modificar_respuesta_cf7($response, $result)
{
    // Verificar si el envío fue exitoso
    if ($result['status'] === 'mail_sent') {
        /*  */
        $form_data = $_POST;
        $response['db_indicador'] = 0;
        
        $nombres = $form_data["nombres"];
        $apellidos = $form_data["apellidos"];

        global $wpdb;

        $tabla = $wpdb->prefix . 'db7_forms';
        $query = "SELECT * FROM $tabla WHERE form_post_id = 8189 AND form_value LIKE '%{$nombres}%' AND form_value LIKE '%{$apellidos}%' ORDER BY form_id DESC LIMIT 1";
        $resultados = $wpdb->get_results($query);
        $data = $resultados[0]->form_id;
        $data = hash_hmac('sha256', $data, 'johnwmartinez');
        $response['db_indicador'] = $data;

    }
    return $response;
}

/* Aquí termina el código generado para las tarjetas de saludo */
add_action('wp_footer', 'despues_de_enviar_formulario');
function despues_de_enviar_formulario()
{
    ?>
    <script>
        document.addEventListener('wpcf7submit', function(event) {
            const url = 'tarjeta-de-saludo-gracias/?db=' + event.detail.apiResponse.db_indicador
            console.log(event)
            if ('8189' == event.detail.contactFormId) {
                window.location = url
            }
        }, false);
    </script>
<?php
}


/**
 * Custom block category
 */

function fci_block_categories( $categories ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'fci_blocks', // The slug of our new category
                'title' => __( 'FCI Custom Blocks', 'fci' ), // The name of our new category
                'icon'  => 'welcome-widgets-menus', // an icon choose from the https://developer.wordpress.org/resource/dashicons/#wordpress Dashicon icons 
            ),
        )
    );
}
add_filter( 'block_categories', 'fci_block_categories', 10, 2 );

// Register a simple block
if( function_exists('acf_register_block') ) {
      
    $result = acf_register_block(array(
        'name'              => 'block-fci-slider', // Name of our block
        'title'             => __('FCI - Slider Banner'), // Title of our block
        'description'       => __('Banner slider dinámico.'), // Description of our block
        'render_callback'   => 'fci_slider_render_callback',// Callback function ( the once that contain the template of our block )
        'category'          => 'fci_blocks',// The category in which the block will be inserted 
        'icon'              => '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="140px" height="140px" viewBox="0 0 140 140" enable-background="new 0 0 140 140" xml:space="preserve">  <image id="image0" width="140" height="140" x="0" y="0"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAAAAACLqx7iAAAABGdBTUEAALGPC/xhBQAAACBjSFJN
    AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElN
    RQfkAR0AFCorB0tFAAAFLElEQVR42u2bW2xURRzGf70svVC6BWyQooEghIIatGBbLCJgFeUSkJBU
    bQSMGIgmokAC0aiRB0kNUXkwogkEGmNQVAxgLQm1yFWqeCElTcVaWgia0tISKF22LZ8PLdBd2Ms5
    u9ttdL6nM//z7ezvzMzOZc8MCosWEQ7FhiWXMMnAGBgDY2AMjIExMAbGwPxXYeL93GseCID77OXU
    oXEhfcudj2eNSKSxev8+t1+f70l2Ubmki+snxgHxOWvrbE/I79/dec3X+NYAWzA/xJVL3wy5bnSs
    cduCcRR19nTWZduA+ft2yjteBRKyZ8+YkAAwy2UDJqlUkg6umjFxcuFHjZJap1uHyYc982Dsp22S
    5NqRBSyxAbNDUnVedyL5bbd0cYxlGCeMhJevF4b7SaDMMswKSWU92kl+q1QRYwMGXusROJ8OT1iF
    GdYq/eHRZgskFdqBmewReR36uS3CfCgpzzNUIh2zA3PEI3IQOGUNJqVV2u0Vy5fko9X464HH5Xok
    s4AGLGluMmz2iu39B2ZZh3nUM5mUAK3WYGZAa4l38BA8aB3mHq90ojUSIAd+cnkHq27OOQiY2yx/
    uZcco+DXm6LnYcSt/f4GyqRQYYbEwmmA+P2TPG4kpFyyWjIJocI4gRaAdZO87gyyXDIhKw64CoyZ
    sM/rzpXeh7kApAHV04PzR3Smdw7IsOCPKMzlc3BvX4HhOEy8aYh+v7x8YzRgDkB6rlcsdsnUqW3R
    gNkFLPOKzUyBvdGA+aUSnvHq+1fA2dJowPAuxG/16DwXToONnT7sfuYz5YFDgSZXMT9K2pl8IzCt
    TTqT4sMd4ZJRYRPMqbg2Zei/pjSRzsWXfLgj2gMDNTO/G8Tdhyq+rWrsf0fO3IFw9cW9Pt2RrSZg
    9FEPZ8Ns39bIL/xP5i4+fj1xvihzt2+rz2pad4VRgUPBSFu3jnt47LBk14WaI/vtLvytyLyJMzAG
    xsAYGANjYAyMgTEw/hSmpUqCM9oP0kM7wjKT7lPVZGAMjIExMAbGwBgYA2NggtPVM30IZu3PIcAk
    Op1O7+0GA5xOp8MeS+naYFy+YMY1tLSc8HwVM6W5paUy1RZLXaHsPUS3XpG0qWcgrV5qz/PhDrA6
    mAof19bW1jb5t/mm2SVpXo/0dkmrsQczvNu23C7M4NNSw41tes9LKiGyML5XlE2F38elb762B2j0
    B3Dm2RCqvSATyLX/+TclLe26dByT3Hm+rYFLJoAjQDVB7D7p0mgAiiStJJowZJyTjsYBj3RKO4k4
    jN8e+OwiyF4Cg4tjqQ/P+y2/8j8clLxH/RewKYP2gubIwwSQ43AuLAvQYOiVNgM44L7LARpM2GAC
    jdrtpH2V1CsNhmCmEMUjYX3vNJiAMCvnAG8M7RMwueugk/TimKByiyxM2ucOfp8P+auDyy6i+lpq
    zWSD5M7x6+uNn/ZySS9AQqVUkxplmAeuSF8CjHdJn0UXxvmXVN91RGSVpOeiCrNd6nio6zKmzO95
    gcj3wC8tgHcOdF1rYTMp2/oRLWW5pEM3Du8USNoQrWpK/VNqGd4jUCxpln2Y4lCq6ZO7YGldz1o7
    BVtsDgsDoM3eJwFYKsnrxMDkDqnMx7AQoGSmwNNBlIyPE11jtnS4qhe0e8Tq48e7hl6quKX/qUy/
    j1Z1mMqapt/27Alyy3RoClAyVd3/F4y3/dMOozK3pQGQ4t8W6e2U3Zr/WNnJjoxs/5XZWzCkzA3C
    9L/8T8/AGBgDY2D6hAyMgTEw4VKYJlf1J8KRy7+6+gGGw00dsQAAACV0RVh0ZGF0ZTpjcmVhdGUA
    MjAyMC0wMS0yOVQwNzoyMDo0Mi0wNzowMK99A10AAAAldEVYdGRhdGU6bW9kaWZ5ADIwMjAtMDEt
    MjlUMDc6MjA6NDItMDc6MDDeILvhAAAAAElFTkSuQmCC" />
    </svg>
    ', // The icon associated with the block ( here i have used a custom SVG )
        //'keywords'        => array(),
    ));
   
}
   
   
function fci_slider_render_callback( $block ) {
       
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);
    // include a template part from within the "template-parts/block" folder
    if( file_exists( get_theme_file_path("/blocks/{$slug}.php") ) ) {
        include( get_theme_file_path("/blocks/{$slug}.php") );
    }
}

// Laboratorios Clinicos
function create_posttype() {
  
    register_post_type( 'labs-clinicos',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Laboratorios Clínicos' ),
                'singular_name' => __( 'Laboratorio Clínico' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'labs-clinicos'),
            'show_in_rest' => true,
  
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

// Incluir archivos necesarios
define('URL_BASE', get_stylesheet_directory_uri() . '/');
define('IMG_BASE', URL_BASE . 'assets/images/');
$incPath = get_template_directory() . '/inc/';
require_once($incPath . 'ajax.php');
require_once($incPath . 'styles-and-js.php');
require_once($incPath . 'theme-setup.php');
require_once($incPath . 'functions-custom.php');
require_once($incPath . 'custom-postype.php');


// ESPECIALISTAS
// 
// 
add_action('wp_ajax_nopriv_filtrar_especialistas', 'filtrar_especialistas');
add_action('wp_ajax_filtrar_especialistas', 'filtrar_especialistas');

function filtrar_especialistas() {
    $servicio = isset($_POST['servicio']) ? sanitize_text_field($_POST['servicio']) : '';

    $args = array(
        'post_type' => 'especialistas',
        'posts_per_page' => 12,
        'paged' => (isset($_POST['paged']) ? intval($_POST['paged']) : 1),
        'meta_key' => 'apellido',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'specialties_doctor',
                'value' => $servicio,
                'compare' => 'LIKE'
            )
        )
    );

    $query = new WP_Query($args);
    $publicaciones = array();

    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
        $id_publicacion = get_the_ID();
        $imagen = get_field('image_doctor', $id_publicacion)["url"];
        $fecha_del_evento = get_field('fecha_del_evento', $id_publicacion);

        $nombre = get_field('nombre', $id_publicacion);
        $apellido = get_field('apellido', $id_publicacion);
        $especialidades_y_sub = get_field('specialties_doctor', $id_publicacion);
        $nombre_completo = (($nombre != "" && $apellido != "")) ? $nombre . " " . $apellido : get_the_title();
        $clase = (isset($imagen) && !empty($imagen)) ? '' : 'sin_imagen';

        $publicaciones[] = array(
            "titulo" => get_the_title(),
            "slug" => $post->post_name,
            "nombre_completo" => $nombre_completo,
            "descripcion" => get_the_excerpt(),
            "fecha_del_evento" => $fecha_del_evento,
            "enlace" => get_the_permalink($id_publicacion),
            "imagen" => $imagen,
            "especialidades_y_sub" => $especialidades_y_sub,
            "clase" => $clase,
            "fecha" => get_the_date("d M"),
        );
    endwhile; wp_reset_postdata(); endif;

    wp_send_json(array(
        'publicaciones' => $publicaciones
    ));
}



add_filter("wpcf7_form_tag", function ($scanned_tag, $replace) {
    global $wpdb;
    $default = '';

    /* Seteamos al curso */
    if ("curso" === $scanned_tag["name"]):  // Verifica si el campo tiene el nombre "curso"
        $curso = get_the_title();  // Obtener el título de la página
        $scanned_tag['raw_values'] = array($curso);
        $scanned_tag['options'][] = sprintf('default:%s', $default);
        $pipes = new WPCF7_Pipes($scanned_tag['raw_values']);
        
        // Armamos el HTML
        $scanned_tag['labels'] = $pipes->collect_befores(); // Esto es la información HTML para cada opción
        $scanned_tag['pipes'] = $pipes; // Esto es el separador
        $scanned_tag['values'] = $pipes->collect_afters(); // Esto es el valor para cada opción
    endif;
    /* Termina el proceso individual de campos */

    return $scanned_tag;
}, 10, 2);