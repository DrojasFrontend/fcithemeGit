<?php 
$sitename = esc_html(get_bloginfo('name'));
$grupo_somos_lacardio = get_field("grupo_somos_lacardio");

if (!empty($grupo_somos_lacardio)) {
    $subtitulo      = isset($grupo_somos_lacardio["subtitulo"]) ? esc_html($grupo_somos_lacardio["subtitulo"]) : '';
    $titulo         = isset($grupo_somos_lacardio["titulo"]) ? esc_html($grupo_somos_lacardio["titulo"]) : '';
    $descripcion    = isset($grupo_somos_lacardio["descripcion"]) ? $grupo_somos_lacardio["descripcion"] : '';

    $items          = isset($grupo_somos_lacardio["items"]) && is_array($grupo_somos_lacardio["items"]) ? $grupo_somos_lacardio["items"] : [];

    $cta            = isset($grupo_somos_lacardio["cta"]) ? $grupo_somos_lacardio["cta"] : [];
    $cta_titulo     = isset($cta["title"]) ? esc_html($cta["title"]) : '';
    $cta_url        = isset($cta["url"]) ? esc_url($cta["url"]) : '';
    $cta_target     = isset($cta["target"]) ? esc_attr($cta["target"]) : '';

    $imagen_id          = !empty($grupo_somos_lacardio["imagen"]['ID']) ? $grupo_somos_lacardio["imagen"]['ID'] : '';
    $imagen_mobile_id   = !empty($grupo_somos_lacardio["imagen_mobile"]['ID']) ? $grupo_somos_lacardio["imagen_mobile"]['ID'] : '';
    ?>

    <section class="seccionSomosLacardio">
        <div class="container--large">
            <div class="seccionSomosLacardio__grid">
                <div class="seccionSomosLacardio__info">
                    <?php if ($subtitulo): ?>
                        <p class="heading--14"><?php echo $subtitulo; ?></p>
                    <?php endif; ?>
                    <?php if ($titulo): ?>
                        <h2 class="heading--48"><?php echo $titulo; ?></h2>
                    <?php endif; ?>
                    <?php if ($descripcion): ?>
                        <div class="font-sans heading--18">
                            <?php echo $descripcion; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($items)): ?>
                        <ul class="seccionSomosLacardio__detalle">
                            <?php foreach ($items as $item) {
                                $numero = isset($item['numero']) ? esc_html($item['numero']) : '';
                                $detalle = isset($item['detalle']) ? esc_html($item['detalle']) : '';
                            ?>
                                <li>
                                    <?php if ($numero): ?>
										<p class="heading--48"><strong><?php echo $numero; ?></strong></p>
                                    <?php endif; ?>
                                    <?php if ($detalle): ?>
                                        <p class="font-sans detalle"><?php echo $detalle; ?></p>
                                    <?php endif; ?>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php endif; ?>
                    <?php if ($cta_titulo): ?>
                        <a href="<?php echo $cta_url; ?>" class="boton-v2 boton-v2--blanco-rojo" title="<?php echo $cta_titulo; ?>" target="<?php echo $cta_target; ?>"><?php echo $cta_titulo; ?></a>
                    <?php endif; ?>
                </div>
                <div class="seccionSomosLacardio__img border-radius-5">
                    <?php 
                    // Mostrar imagenes
                        echo generar_imagen_responsive($imagen_id, 'custom-size-2x', $sitename, 'desktop');
                        echo generar_imagen_responsive($imagen_mobile_id, 'custom-size', $sitename, 'mobile');
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>