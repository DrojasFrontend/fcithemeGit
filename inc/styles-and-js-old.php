<?php
function enqueue_scripts() {
    // Enqueue CSS
    $mainFileURI = get_template_directory_uri() . '/assets/css/main-v2.css';
    wp_enqueue_style('main_css', $mainFileURI);
	
	$revascularizacionFileURI = get_template_directory_uri() . '/page-template-lg/page-revascularizacion.css';
    wp_enqueue_style('revascularizacion_css', $revascularizacionFileURI);

    $pages          = array('cardio-u-nosotros', 'cardio-u', 'cardio-u-escuelas');
    $pagesTemplates = array(
        'page-template-lg/page-cardio-u-cursos.php', 
        'page-template-lg/page-cardio-u-escuelas.php',
        'page-template-lg/page-cardio-u-incio.php',
        'page-template-lg/page-cardio-u-nosotros.php',
        'page-template-lg/page-cardio-u-formulario-contacto.php',
        'page-template-lg/page-cardio-u-formulario-gracia.php',
    );

    
    if(is_page($pages) || is_page_template($pagesTemplates)) {
        $cardioUCssFileURI = get_template_directory_uri() . '/page-template-lg/page-cardio-u.css';
        wp_enqueue_style('cardioU_css', $cardioUCssFileURI);
    }
    
	$slickFileURI = get_template_directory_uri() . '/assets/css/slick.css';
    wp_enqueue_style('slick_css', $slickFileURI);
	
	$slickThemecssFileURI = get_template_directory_uri() . '/assets/css/slick-theme.css';
    wp_enqueue_style('slick_theme_css', $slickThemecssFileURI);
 
    // Enqueue jQuery
    wp_enqueue_script('jquery');
 
    // Enqueue slick.min.js
    $version = '1.0.0'; // Puedes ajustar la versión según necesites
    $slickFileURI = get_template_directory_uri() . '/assets/js/slick.min.js';
    wp_register_script('slickmin', $slickFileURI, array('jquery'), $version, true);
    wp_enqueue_script('slickmin');
 
    // Enqueue main-v2.js
    $jsFileURI = get_template_directory_uri() . '/assets/js/main-v2.js';
    wp_enqueue_script('main_js', $jsFileURI, array('jquery', 'slickmin'), null, true);

    if(is_page($pages) || is_page_template($pagesTemplates)) {
        $cardioUJsFileURI = get_template_directory_uri() . '/page-template-lg/page-cardio-u.js';
        wp_register_script('cardioU_js', $cardioUJsFileURI, array('jquery'), $version, true);
        wp_enqueue_script('cardioU_js');
    }

    function enqueue_swiper_assets() {
        // Enqueue Swiper CSS
        wp_enqueue_style('swiper_css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null);
    
        // Enqueue Swiper JS
        wp_enqueue_script('swiper_js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), null, true);
    }

    // Mes del corazon 
    $pageTemplateMesCorazon = array('page-template-lg/page-mes-corazon.php');
    if(is_page_template($pageTemplateMesCorazon) ) {
        $cardioMesCorazonCssFileURI = get_template_directory_uri() . '/page-template-lg/page-mes-corazon.css';
        wp_enqueue_style('cardioMesCorazon_css', $cardioMesCorazonCssFileURI);
        
        enqueue_swiper_assets();

        $cardioMesCorazonJsFileURI = get_template_directory_uri() . '/page-template-lg/page-mes-corazon.js';
        wp_register_script('cardioMesCorazon_js', $cardioMesCorazonJsFileURI, array('jquery'), $version, true);
        wp_enqueue_script('cardioMesCorazon_js');
     }

     // Legado
     $pageTemplateLegado = array(
        'page-template-lg/page-legado-inicio.php',
        'page-template-lg/page-legado-inicio-1.php',
        'page-template-lg/page-legado-inicio-2.php',
        'page-template-lg/page-legado-inicio-3.php',
        'page-template-lg/page-legado-inicio-4.php',
    );
    if(is_page_template($pageTemplateLegado) ) {
        $cardioLegadoCssFileURI = get_template_directory_uri() . '/page-template-lg/page-legado.css';
        wp_enqueue_style('cardioLegado_css', $cardioLegadoCssFileURI);
        
        enqueue_swiper_assets();

        $cardioLegadoJsFileURI = get_template_directory_uri() . '/page-template-lg/page-legado.js';
        wp_register_script('cardioLegado_js', $cardioLegadoJsFileURI, array('jquery'), $version, true);
        wp_enqueue_script('cardioLegado_js');
     }

      // Etapas Especialidades
    $pageEspecialidades = array(
        'page-template-lg/page-urgencias.php',
        'page-template-lg/page-otorrino.php',
        'page-template-lg/page-ginecologia.php',
        'page-template-lg/page-cirugia-plastica.php',
        'page-template-lg/page-procedimientos.php',
        'page-template-lg/page-cirugia-torax.php',
        'page-template-lg/page-medicina-nuclear.php',
        'page-template-lg/page-medicina-interna.php',
        'page-template-lg/page-gastro.php',
        'page-template-lg/page-gastroenterologia-pediatrica.php',
		'page-template-lg/page-tecnologia-pet-ct.php',
        'page-template-lg/page-tecnologia-spcet-ct.php',
    );

    if(is_page_template($pageEspecialidades) ) {
        $cardioEspecialidadesCssFileURI = get_template_directory_uri() . '/page-template-lg/page-especialidades.css';
        wp_enqueue_style('especialidades_css', $cardioEspecialidadesCssFileURI);
        
        enqueue_swiper_assets();

        $especialidadesJsFileURI = get_template_directory_uri() . '/page-template-lg/page-especialidades.js';
        wp_register_script('especialidades_js', $especialidadesJsFileURI, array('jquery'), $version, true);
        wp_enqueue_script('especialidades_js');
    }

    // Citas Medicas
    $pageCitasMedicas = array(
        'page-template-lg/page-citas-medicas.php',
    );
    if(is_page_template($pageCitasMedicas) ) {
        $citasMedicasCssFileURI = get_template_directory_uri() . '/page-template-lg/page-citasmedicas.css';
        wp_enqueue_style('citasmedicas_css', $citasMedicasCssFileURI);

        enqueue_swiper_assets();
        
        $citasMedicasJsFileURI = get_template_directory_uri() . '/page-template-lg/page-citasmedicas.js';
        wp_register_script('citasmedicas_js', $citasMedicasJsFileURI, array('jquery'), $version, true);
        wp_enqueue_script('citasmedicas_js');
    }

    $pageConvenios = array(
        'page-template-lg/page-convenios.php',
    );
    if(is_page_template($pageConvenios) ) {
        $conveniosCssFileURI = get_template_directory_uri() . '/page-template-lg/page-convenios.css';
        wp_enqueue_style('convenios_css', $conveniosCssFileURI);

        enqueue_swiper_assets();
        
        $conveniosJsFileURI = get_template_directory_uri() . '/page-template-lg/page-convenios.js';
        wp_register_script('convenios_js', $conveniosJsFileURI, array('jquery'), $version, true);
        wp_enqueue_script('convenios_js');
    }

    $pageConvenios = array(
        'page-template-lg/page-servicios.php',
    );
    if(is_page_template($pageConvenios) ) {
        $serviciosCssFileURI = get_template_directory_uri() . '/page-template-lg/page-servicios.css';
        wp_enqueue_style('servicios_css', $serviciosCssFileURI);
    }

    // Etapas Trasplante
    $pageTrasplante = array(
        'page-template-lg/page-trasplante-corazon.php',
        'page-template-lg/page-trasplante-renal.php',
    );

    if(is_page_template($pageTrasplante) ) {
        $cardioTrasplante = get_template_directory_uri() . '/page-template-lg/page-trasplantes.css';
        wp_enqueue_style('trasplante_css', $cardioTrasplante);
        
        enqueue_swiper_assets();

        $trasplanteJsFileURI = get_template_directory_uri() . '/page-template-lg/page-trasplantes.js';
        wp_register_script('trasplante_js', $trasplanteJsFileURI, array('jquery'), $version, true);
        wp_enqueue_script('trasplante_js');
    }

    // Localize Script
    wp_localize_script('main_js', 'lm_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
 
add_action('wp_enqueue_scripts', 'enqueue_scripts');