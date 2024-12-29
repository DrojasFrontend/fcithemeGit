<?php
$sitename       = esc_html(get_bloginfo('name'));
$pagina_id       = get_page_by_path('noticias')->ID;

$grupo_targeta_texto_imagen = ($pagina_id) ? get_field('grupo_targeta_texto_imagen', $pagina_id) : null;
$targeta_titulo             = !empty($grupo_targeta_texto_imagen['titulo']) ? esc_html($grupo_targeta_texto_imagen['titulo']) : '';
$targeta_descripcion        = !empty($grupo_targeta_texto_imagen['descripcion']) ? $grupo_targeta_texto_imagen['descripcion'] : '';
$targeta_fecha              = !empty($grupo_targeta_texto_imagen['fecha']) ? esc_html($grupo_targeta_texto_imagen['fecha']) : '';

$targeta_cta                = !empty($grupo_targeta_texto_imagen['cta']) ? $grupo_targeta_texto_imagen['cta'] : [];
$targeta_cta_title          = !empty($targeta_cta['title']) ? esc_html($targeta_cta['title']) : '';
$targeta_cta_url            = !empty($targeta_cta['url']) ? esc_url($targeta_cta['url']) : '';
$targeta_cta_target         = !empty($targeta_cta['target']) ? esc_attr($targeta_cta['target']) : '';

$imagen_id                  = !empty($grupo_targeta_texto_imagen["imagen"]['ID']) ? $grupo_targeta_texto_imagen["imagen"]['ID'] : '';
?>

<section class="seccionTextoImagen">
    <div class="container--large">
        <div class="seccionTextoImagen__grid">
            <div class="seccionTextoImagen__info">
                <?php if($targeta_titulo) : ?>
                <h2 class="heading--30 color--002D72"><?php echo $targeta_titulo; ?></h2>
                <?php endif; ?>

                <?php if($targeta_descripcion) : ?>
                <p class="heading--18 color--263956"><?php echo $targeta_descripcion; ?></p>
                <?php endif; ?>

                <?php if($targeta_fecha) : ?>
                <p class="heading--12 color--717C7D"><?php echo $targeta_fecha; ?></p>
                <?php endif; ?>

                <?php if($targeta_cta_url) :?>
                <a class="heading--18 leer-mas" href="<?php echo $targeta_cta_url; ?>" title="<?php echo $targeta_cta_title; ?>" target="<?php echo $targeta_cta_target; ?>">
                    <span><?php echo $targeta_cta_title; ?></span>
                    <?php 
                        get_template_part('template-parts/content', 'icono');
                        display_icon('arrow-rojo'); 
                    ?>
                </a>
                <?php endif; ?>
            </div>
            <div class="seccionTextoImagen__img">
                <?php 
                    echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');
                ?>
            </div>
        </div>
    </div>
</section>