<?php
// Funciones principales:
// 1. get_filtered_posts()
// Maneja la consulta WP_Query para filtrar posts
// Ubicación: inc/theme-setup.php

// 2. handle_search_request()
// Procesa la petición AJAX
// Ubicación: inc/theme-setup.php

// 3. display_search_form()
// Renderiza el formulario de búsqueda
// Ubicación: inc/theme-setup.php

// Funciones principales:
// 1. loadPosts()
// Maneja la carga de posts vía AJAX
// Ubicación: template-parts-lg/page-investigacion.js

// 2. Event Handlers
// - Submit del formulario
// - Click en "Cargar más"
// Ubicación: template-parts-lg/page-investigacion.js

// Uso del shortcode:
echo display_search_form();