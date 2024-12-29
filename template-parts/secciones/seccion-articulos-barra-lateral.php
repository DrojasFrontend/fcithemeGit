<?php 
$sitename               = get_bloginfo('name');

get_query_var('grupo_barra_lateral', $grupo_barra_lateral);
$mostrar_articulos_categorias   = !empty($grupo_barra_lateral['grupo_articulos_categorias']['mostrar_articulos_categorias']) ? esc_html($grupo_barra_lateral['grupo_articulos_categorias']['mostrar_articulos_categorias']) : '' ;
$titulo_categoria               = !empty($grupo_barra_lateral['grupo_articulos_categorias']['titulo']) ? esc_html($grupo_barra_lateral['grupo_articulos_categorias']['titulo']) : '';
set_query_var('titulo_categoria', $titulo_categoria);

$mostrar_articulos_ultimos      = !empty($grupo_barra_lateral['grupo_articulos_ultimos']['mostrar_articulos_ultimos']) ? esc_html($grupo_barra_lateral['grupo_articulos_ultimos']['mostrar_articulos_ultimos']) : '' ;
$titulo_articulos_ultimos       = !empty($grupo_barra_lateral['grupo_articulos_ultimos']['titulo']) ? esc_html($grupo_barra_lateral['grupo_articulos_ultimos']['titulo']) : '' ;
set_query_var('titulo_articulos_ultimos', $titulo_articulos_ultimos);

$mostrar_recomendados           = !empty($grupo_barra_lateral['grupo_articulos_recomendados']['mostrar_recomendados']) ? esc_html($grupo_barra_lateral['grupo_articulos_recomendados']['mostrar_recomendados']) : '' ;
$titulo_recomendados            = !empty($grupo_barra_lateral['grupo_articulos_recomendados']['titulo']) ? esc_html($grupo_barra_lateral['grupo_articulos_recomendados']['titulo']) : '' ;
set_query_var('titulo_recomendados', $titulo_recomendados);


$autor = !empty(get_query_var('autor')) ? get_query_var('autor') : '';
$autor_home = !empty(get_query_var('autor_home')) ? get_query_var('autor_home') : '';

$foto_doctor_home   = !empty(get_query_var('foto_doctor_home')) ? get_query_var('foto_doctor_home') : '';
$image_id           = attachment_url_to_postid($foto_doctor_home);
$image_src          = wp_get_attachment_image_url($image_id, 'custom-size');
$image_srcset       = wp_get_attachment_image_srcset($image_id, 'custom-size');
$image_info         = wp_get_attachment_image_src($image_id, 'full');
$image_width        = ($image_info) ? $image_info[1] : '';
$image_height       = ($image_info) ? $image_info[2] : '';
$image_alt          = ($image_id) ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : ''; 
$image_title        = ($image_id) ? get_the_title($image_id) : '';
?>

<div class="seccionBarraLateral">
    <?php if($autor) {  ?>
        <section class="seccionBarraLateral__autor seccionBarraLateral__escritorio">
            <figure class="seccionBarraLateral__img">
                <img width="<?php echo $image_width ?>" height="<?php echo $image_height ?>" src="<?php echo $image_src ?>" data-src="<?php echo $image_src ?>" srcset="<?php echo $image_srcset ?>" data-srcset="<?php echo $image_srcset ?>" alt="<?php echo $autor_home . ' - ' . $sitename; ?> " title="<?php echo $autor_home ?>">
            </figure>
            <?php echo $autor; ?>
        </section>
    <?php } ?>
    <!-- Categorias -->
    <?php if($mostrar_articulos_categorias) { ?>
        <?php get_template_part('template-parts/secciones/seccion', 'articulos-categorias') ?>
    <?php } ?>
    <!-- Fin Categorias -->

    <!-- Últimos artículos -->
    <?php if($mostrar_articulos_ultimos) { ?>
        <?php get_template_part('template-parts/secciones/seccion', 'articulos-ultimos') ?>
    <?php } ?>
    <!-- Fin Últimos artículos -->
    
    <!-- Recomendados -->
    <?php if($mostrar_recomendados) { ?>
        <?php 
            $tipo_entrada = 'blog_fellows';
            set_query_var('tipo_entrada', $tipo_entrada);
            get_template_part('template-parts/secciones/seccion', 'articulos-recomendados') 
        ?>
    <?php } ?>
    <!-- Fin Recomendados -->
</div>