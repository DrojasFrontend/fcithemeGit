<?php
$sitename = esc_html(get_bloginfo('name'));
$grupo_imagen_cta = get_field('grupo_imagen_cta');
$posicion = !empty($grupo_imagen_cta['posicion']) ? esc_html($grupo_imagen_cta['posicion']) : '';
$items = !empty($grupo_imagen_cta['items']) ? $grupo_imagen_cta['items'] : [];

$primero = true; 
?>
<section class="paginaTrasplanteImagenCTA <?php echo isset($args['class']) ? $args['class'] : ''; ?>"
    style="order: <?php echo $posicion; ?>">
    <div class="container--large">
        <div class="paginaTrasplanteImagenCTA__grid">
            <?php foreach ($items as $key => $item) {
                $targeta_titulo = !empty($item['titulo']) ? esc_html($item['titulo']) : '';
                $targeta_cta = !empty($item['cta']) ? $item['cta'] : [];
                $targeta_cta_url = !empty($targeta_cta['url']) ? esc_url($targeta_cta['url']) : '';
                $targeta_cta_titulo = !empty($targeta_cta['title']) ? esc_attr($targeta_cta['title']) : '';
                $targeta_cta_target = !empty($targeta_cta['target']) ? esc_attr($targeta_cta['target']) : '';
                $imagen_id = !empty($item["imagen"]['ID']) ? $item["imagen"]['ID'] : '';
                $imagen_id_mobile = !empty($item["imagen_mobile"]['ID']) ? $item["imagen_mobile"]['ID'] : '';
                ?>
                <div class="paginaTrasplanteImagenCTA__item">
                    <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, 'desktop'); ?>
                    <?php echo generar_imagen_responsive($imagen_id_mobile, 'custom-size', $sitename, 'mobile'); ?>
                    <a href="<?php echo ($targeta_cta_url === '#') ? '#' : esc_url($targeta_cta_url); ?>" 
					   class="paginaTrasplanteImagenCTA__info"
					   target="<?php echo esc_attr($targeta_cta_target); ?>" 
					   title="<?php echo esc_attr($targeta_cta_titulo); ?>">

					   <?php if ($targeta_titulo): ?>
						   <h3 class="heading--36 color--fff"><?php echo esc_html($targeta_titulo); ?></h3>
					   <?php endif; ?>

					   <?php if ($targeta_cta_url === '#'): ?>
						   <button class="open-modal-form boton-v2 boton-v2--rojo-rojo" id="open-modal-form" type="button" aria-label="abrir modal">
							   Contáctanos
						   </button>
					   <?php else: ?>
						   <!-- Span que se muestra cuando el URL no es "modal" -->
						   <span class="boton-v2 boton-v2--rojo-rojo"><?php echo esc_html($targeta_cta_titulo); ?></span>
					   <?php endif; ?>

					</a>

                </div>
            <?php } ?>
        </div>
    </div>

    
</section>

<!-- Modal -->
<section class="seccionTrasplanteFormularioContacto__modal">
    <button type="button" class="seccionTrasplanteFormularioContacto__close" id="close-modal-form"
        aria-label="cerrar modal">
        <?php
        get_template_part('template-parts/content', 'icono');
        display_icon('ico-close');
        ?>
    </button>
    <div class="seccionCardioUFormularioContacto">
        <div class="wrapper">
            <div class="seccionTrasplanteFormularioContacto__contenido">
                <div class="seccionTrasplanteFormularioContacto__titulo">
                    <h2 class="heading--64 color--002D72">¿Necesitas un trasplante?</h2>
                    <p class="heading--18 color--263956">Ingresa tus datos a continuación y al correo electrónico, te
                        enviaremos toda la información.</p>
                </div>
                <div class="seccionTrasplanteFormularioContacto__grid">
                    <div class="seccionTrasplanteFormularioContacto__form">
                        <?php echo do_shortcode('[contact-form-7 id="5d5bf8a" title="Formulario contacto trasplantes"]'); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fin Modal -->


