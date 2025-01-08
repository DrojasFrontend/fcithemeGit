<?php 
$sitename = esc_html(get_bloginfo('name'));
$grupo_centro_internacional = get_field("grupo_centro_internacional");
$subtitulo      = !empty($grupo_centro_internacional["subtitulo"]) ? esc_html($grupo_centro_internacional["subtitulo"]) : '';
$titulo         = !empty($grupo_centro_internacional["titulo"]) ? esc_html($grupo_centro_internacional["titulo"]) : '';
$descripcion    = !empty($grupo_centro_internacional["descripcion"]) ? $grupo_centro_internacional["descripcion"] : '';
$items          = !empty($grupo_centro_internacional["items"]) && is_array($grupo_centro_internacional["items"]) ? $grupo_centro_internacional["items"] : [];
$cta            = !empty($grupo_centro_internacional["cta"]) ? $grupo_centro_internacional["cta"] : [];
$cta_titulo     = !empty($cta["title"]) ? esc_html($cta["title"]) : '';
$cta_url        = !empty($cta["url"]) ? esc_url($cta["url"]) : '';
$cta_target     = !empty($cta["target"]) ? esc_attr($cta["target"]) : '';

$imagen_id          = !empty($grupo_centro_internacional["imagen"]['ID']) ? $grupo_centro_internacional["imagen"]['ID'] : '';
$imagen_mobile_id   = !empty($grupo_centro_internacional["imagen_mobile"]['ID']) ? $grupo_centro_internacional["imagen_mobile"]['ID'] : '';
?>

<section class="seccionTextoItemsImagen">
    <div class="container--large">
        <div class="seccionTextoItemsImagen__grid">
            <div class="seccionTextoItemsImagen__info">
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
                    <ul class="seccionTextoItemsImagen__detalle">
                        <?php foreach ($items as $item) {
                            $numero = !empty($item['numero']) ? esc_html($item['numero']) : '';
                            $detalle = !empty($item['detalle']) ? esc_html($item['detalle']) : '';
                        ?>
                            <li>
                                <?php if ($numero || $detalle) { ?>
                                    <h3 class="d-flex flex-column">
                                        <?php if ($numero): ?>
                                            <span class="heading--48"><?php echo $numero; ?></span>
                                        <?php endif; ?>
                                        <?php if ($detalle): ?>
                                            <span class="font-sans detalle"> <?php echo $detalle; ?></span>
                                        <?php endif; ?>
                                    </h3>
                                <?php } ?> 
                            </li>
                        <?php } ?>
                    </ul>
                <?php endif; ?>
                
                <?php echo generar_cta_desde_array($cta, 'boton-v2 boton-v2--blanco-rojo'); ?>
            </div>
            <div class="seccionTextoItemsImagen__img border-radius-5">
                <?php echo generar_imagen_responsive($imagen_id, 'custom-size-2x', $sitename, '');?>
            </div>
        </div>
    </div>
</section>
