<?php 
$sitename                = esc_html(get_bloginfo('name'));
$grupo_titulo_cta_imagen = get_query_var('grupo_titulo_cta_imagen');
$subtitulo               = !empty($grupo_titulo_cta_imagen['subtitulo']) ? esc_html($grupo_titulo_cta_imagen['subtitulo']) : '';
$titulo                  = !empty($grupo_titulo_cta_imagen['titulo']) ? esc_html($grupo_titulo_cta_imagen['titulo']) : '';
$descripcion             = !empty($grupo_titulo_cta_imagen['descripcion']) ? esc_html($grupo_titulo_cta_imagen['descripcion']) : '';
$fondo                   = !empty($grupo_titulo_cta_imagen['fondo']) ? esc_html($grupo_titulo_cta_imagen['fondo']) : '';
$enlace                  = !empty($grupo_titulo_cta_imagen['enlace']) ? $grupo_titulo_cta_imagen['enlace'] : '';
$imagen_id               = !empty($grupo_titulo_cta_imagen["imagen"]['ID']) ? $grupo_titulo_cta_imagen["imagen"]['ID'] : '';
?>

<section class="seccionCardioUTituloCtaImg">
    <div class="seccionCardioUTituloCtaImg__grid">
        <div class="seccionCardioUTituloCtaImg__fondo" style="background-color: <?php echo $fondo; ?>">
            <div class="seccionCardioUTituloCtaImg__info">
                <?php if($subtitulo) : ?>
                <p class="subheading color--fff">
                    <?php echo $subtitulo; ?>
                </p>
                <?php endif; ?>
    
                <?php if($titulo) : ?>
                <h2 class="heading--48 color--fff">
                    <?php echo $titulo; ?>
                </h2>
                <?php endif; ?>
    
                <?php if($descripcion) : ?>
                <p class="heading--18 color--fff">
                    <?php echo $descripcion; ?>
                </p>
                <?php endif; ?>

                <?php if($enlace) : ?>
                <a class="boton-v2 boton-v2--blanco" href="<?php echo esc_url($enlace['url']); ?>" target="<?php echo $enlace['target']; ?>" title="<?php echo $enlace['title']; ?> - Más información">
                    <?php echo $enlace['title']; ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="seccionCardioUTituloCtaImg__imagen">
            <?php if($imagen_id) : ?>
                <?php 
                    echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');
                ?>
            <?php else : ?>
                <img src="https://via.placeholder.com/372x532" alt="Imagen">
            <?php endif; ?>
        </div>
    </div>
</section>
