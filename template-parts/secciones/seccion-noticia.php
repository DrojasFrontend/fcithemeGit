<?php 
$sitename = get_bloginfo('name');

$imagen_id      = get_post_thumbnail_id(get_the_ID());
$imagen_src     = wp_get_attachment_image_url($imagen_id, 'custom-size-2x');
$imagen_srcset  = wp_get_attachment_image_srcset($imagen_id, 'custom-size-2x');
$imagen_info    = wp_get_attachment_image_src($imagen_id, 'full');
$imagen_width   = ($imagen_info) ? $imagen_info[1] : '';
$imagen_height  = ($imagen_info) ? $imagen_info[2] : '';
$imagen_alt     = ($imagen_id) ? get_post_meta($imagen_id, '_wp_attachment_image_alt', true) : ''; 
$imagen_title   = ($imagen_id) ? get_the_title($imagen_id) : '';

$categories = get_the_category();
if ( ! empty( $categories ) ) {
    $first_category = $categories[0];
}

$contenido              = get_the_excerpt();
$contenido_format       = substr($contenido, 0, 90);
$contenido_format       .= ' [...]';

$fecha                  = get_the_date('j F, Y');

$link                   = get_the_permalink();
?>
<article id="post-<?php the_ID(); ?>" aria-label="<?php echo the_title(); ?>">
    <a class="articulo" href="<?php echo $link; ?>" title="<?php echo the_title(); ?>">
        <figure class="imagen">
            <img width="<?php echo $imagen_width; ?>" height="<?php echo $imagen_height; ?>" src="<?php echo $imagen_src; ?>" data-src="<?php echo $imagen_src; ?>" srcset="<?php echo $imagen_srcset; ?>" data-srcset="<?php echo $imagen_srcset; ?>" alt="<?php echo $imagen_alt . ' - ' . $sitename; ?>" title="<?php echo $imagen_title; ?>">
        </figure>
        <div class="contenido">
            <span class="categoria"><?php echo $first_category->name; ?></span>
            <header class="titulo">
                <h3 class="heading--20 color--002D72 h4 m-0"><?php the_title(); ?></h3>
            </header>
            <div class="texto">
                <p>
                    <?php echo $contenido_format ?>
                </p>
                <p class="fecha"><?php echo $fecha; ?></p>
            </div>
            <footer>
                <p href="" class="leer-mas">
                    <span>Leer noticia</span>
                    <?php 
                        get_template_part('template-parts/content', 'icono');
                        display_icon('arrow-rojo'); 
                    ?>
                </p>
            </footer>
        </div>
    </a>

</article>