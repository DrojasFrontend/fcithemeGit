<?php

/**
 * Genera una etiqueta de imagen responsive.
 *
 * @param int    $imagen_id     ID de la imagen en la biblioteca de medios.
 * @param string $resolucion Tamaño de la imagen que se va a obtener.
 * @param string $sitename   Nombre del sitio para usar en el atributo alt.
 * @param string $clase      Clase CSS que se aplicará a la etiqueta img.
 *
 * @return string
 */
function generar_imagen_responsive($imagen_id, $resolucion, $sitename, $clase) {
    if (empty($imagen_id)) {
        return '';
    }

    $imagen_src    = wp_get_attachment_image_url($imagen_id, $resolucion);
    $imagen_srcset = wp_get_attachment_image_srcset($imagen_id, $resolucion);
    $imagen_info   = wp_get_attachment_image_src($imagen_id, 'full');
    $imagen_width  = isset($imagen_info[1]) ? $imagen_info[1] : '';
    $imagen_height = isset($imagen_info[2]) ? $imagen_info[2] : '';
    $imagen_alt    = get_post_meta($imagen_id, '_wp_attachment_image_alt', true);
    $imagen_title  = get_the_title($imagen_id);

    return sprintf(
        '<img class="%s" width="%s" height="%s" src="%s" data-src="%s" srcset="%s" data-srcset="%s" alt="%s" title="%s">',
        esc_attr($clase),
        esc_attr($imagen_width),
        esc_attr($imagen_height),
        esc_url($imagen_src),
        esc_url($imagen_src),
        esc_attr($imagen_srcset),
        esc_attr($imagen_srcset),
        esc_attr($imagen_alt . ' - ' . $sitename),
        esc_attr($imagen_title)
    );
}

/**
 * Genera un enlace CTA (Call To Action) a partir de un array.
 *
 * @param array $cta El array con los datos del CTA.
 * @param string $clase La clase CSS que se aplicará al enlace.
 *
 * @return string El HTML del enlace CTA.
 */
function generar_cta_desde_array($cta, $clase = '') {
    // Sanea y asigna valores de título, URL y target desde el array
    $titulo     = !empty($cta["title"]) ? esc_html($cta["title"]) : '';
    $url        = !empty($cta["url"]) ? esc_url($cta["url"]) : '';
    $target     = !empty($cta["target"]) ? esc_attr($cta["target"]) : '';

    // Verifica si título o URL están vacíos
    if (empty($titulo) || empty($url)) {
        // Si cualquiera de ellos está vacío, no se muestra el botón
        return '';
    }

    // Genera y devuelve el HTML del enlace CTA
    return sprintf(
        '<a href="%s" class="%s" target="%s">%s</a>',
        esc_url($url),    
        esc_attr($clase), 
        esc_attr($target),
        esc_html($titulo) 
    );
}

/**
 * Genera el HTML de la imagen destacada (thumbnail) de un post con srcset y otros atributos.
 *
 * @param int $post_id La ID del post.
 * @param string $size El tamaño de la imagen (por defecto 'full').
 * @param string $class La clase CSS que se aplicará a la imagen (opcional).
 *
 * @return string El HTML de la imagen destacada.
 */
function generar_thumbnail($post_id, $size = 'full', $class = '') {
    $imagen_destacada_url = get_the_post_thumbnail_url($post_id, $size);

    if (!$imagen_destacada_url) {
        return '';
    }
    $image_sizes = wp_get_attachment_image_sizes(get_post_thumbnail_id($post_id), $size);
    $srcset = wp_get_attachment_image_srcset(get_post_thumbnail_id($post_id), $size);
    $imagen_destacada_ancho = get_post_meta(get_post_thumbnail_id($post_id), '_wp_attachment_image_width', true);
    $imagen_destacada_alto = get_post_meta(get_post_thumbnail_id($post_id), '_wp_attachment_image_height', true);

    $img_html = '<img src="' . esc_url($imagen_destacada_url) . '"';
    if ($srcset) {
        $img_html .= ' srcset="' . esc_attr($srcset) . '"';
    }
    if ($image_sizes) {
        $img_html .= ' sizes="' . esc_attr($image_sizes) . '"';
    }
    if ($class) {
        $img_html .= ' class="' . esc_attr($class) . '"';
    }
    $img_html .= ' alt="' . esc_attr(get_the_title($post_id)) . '"';
    if ($imagen_destacada_ancho) {
        $img_html .= ' width="' . esc_attr($imagen_destacada_ancho) . '"';
    }
    if ($imagen_destacada_alto) {
        $img_html .= ' height="' . esc_attr($imagen_destacada_alto) . '"';
    }
    $img_html .= '>';
    return $img_html;
}

/**
 * Genera un extracto truncado con '[...]' al final.
 *
 * @param string $texto     El texto que se desea truncar y al que se le añadirá '[...]' al final.
 * @param int    $longitud  Longitud máxima del texto truncado.
 * @return string Extracto truncado con '[...]' al final.
 */
function generar_extracto_truncado($texto, $longitud = 110) {
    if (strlen($texto) > $longitud) {
        $texto = substr($texto, 0, $longitud);
        $ultimo_espacio = strrpos($texto, ' ');
        if ($ultimo_espacio !== false) {
            $texto = substr($texto, 0, $ultimo_espacio);
        }
        $texto .= ' [...]';
    }
    return $texto;
} 

/**
 * Elimina la primera y última etiqueta <p> de un contenido.
 *
 * @param string $content El contenido HTML.
 */
function remove_tag_p($content) { 
    $content = preg_replace('/^<p>/', '', $content);
    $content = preg_replace('/<\/p>$/', '', $content);
    return $content;
}