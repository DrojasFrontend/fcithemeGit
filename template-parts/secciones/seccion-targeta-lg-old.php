<?php 
$sitename    = esc_html(get_bloginfo('name'));
$targeta     = get_query_var('targeta', $targeta);

// Verificación y escape de los valores
$imagen_id   = !empty($targeta["imagen"]['ID']) ? $targeta["imagen"]['ID'] : '';
$titulo      = !empty($targeta['titulo']) ? esc_html($targeta['titulo']) : '';
$descripcion = !empty($targeta['descripcion']) ? esc_html($targeta['descripcion']) : '';
$short_excerpt = generar_extracto_truncado($descripcion);

$cta         = !empty($targeta['cta']) ? $targeta['cta'] : [];
$cta_titulo  = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_url     = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_target  = !empty($cta['target']) ? esc_attr($cta['target']) : '';
?>
<article class="seccionTargeta" aria-label="<?php echo $titulo; ?>">
    <a href="<?php echo $cta_url; ?>" target="<?php echo $cta_target; ?>" title="<?php echo $titulo; ?>">
        <div class="seccionTargeta__img">
            <?php 
                echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');
            ?>
        </div>
        <div class="seccionTargeta__contenido">
            <div>
                <?php if($titulo) : ?>
                    <h3 class="heading--24"><?php echo $titulo; ?></h3>
                <?php endif; ?>
                
                <?php if($descripcion) : ?>
                    <p class="heading--18"><?php echo $short_excerpt; ?></p>
                <?php endif; ?>
            </div>
            <span class="seccionTargeta__leermas">
                <?php if($cta_titulo && $cta_url) : ?>
                    <?php echo $cta_titulo; ?>
                    <?php 
                        get_template_part('template-parts/content', 'icono');
                        display_icon('arrow-rojo'); 
                    ?>
                <?php endif; ?>
            </span>
        </div>
        
    </a>
</article>
