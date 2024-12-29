<?php 
$sitename                = esc_html(get_bloginfo('name'));
$grupo_titulo_cta_imagen_2 = get_query_var('grupo_titulo_cta_imagen_2');
$titulo                  = !empty($grupo_titulo_cta_imagen_2['titulo']) ? esc_html($grupo_titulo_cta_imagen_2['titulo']) : '';
$fondo                   = !empty($grupo_titulo_cta_imagen_2['fondo']) ? esc_html($grupo_titulo_cta_imagen_2['fondo']) : '';
$enlace                  = !empty($grupo_titulo_cta_imagen_2['enlace']) ? $grupo_titulo_cta_imagen_2['enlace'] : '';
$imagen_id               = !empty($grupo_titulo_cta_imagen_2["imagen"]['ID']) ? $grupo_titulo_cta_imagen_2["imagen"]['ID'] : '';
?>

<section class="seccionCardioUTituloCtaImg seccionCardioUTituloCtaImg2">
    <div class="seccionCardioUTituloCtaImg__grid">
        <div class="seccionCardioUTituloCtaImg__fondo" style="background-color: <?php echo $fondo; ?>">
            <div class="seccionCardioUTituloCtaImg__info">
    
                <?php if($titulo) : ?>
                <h2 class="heading--30 color--fff">
                    <?php echo $titulo; ?>
                </h2>
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
