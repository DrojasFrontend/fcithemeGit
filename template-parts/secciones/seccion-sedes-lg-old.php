<?php 
$sitename       = esc_html(get_bloginfo('name'));
$grupo_sedes    = get_field("grupo_sedes");

if ($grupo_sedes) {
    $subtitulo      = !empty($grupo_sedes["subtitulo"]) ? esc_html($grupo_sedes["subtitulo"]) : '';
    $titulo         = !empty($grupo_sedes["titulo"]) ? esc_html($grupo_sedes["titulo"]) : '';
    $descripcion    = !empty($grupo_sedes["descripcion"]) ? esc_html($grupo_sedes["descripcion"]) : '';

    $cta            = !empty($grupo_sedes["cta"]) ? $grupo_sedes["cta"] : [];
    $cta_titulo     = !empty($cta["title"]) ? esc_html($cta["title"]) : '';
    $cta_url        = !empty($cta["url"]) ? esc_url($cta["url"]) : '';
    $cta_target     = !empty($cta["target"]) ? esc_attr($cta["target"]) : '';

    $sedes          = !empty($grupo_sedes["sedes"]) ? $grupo_sedes["sedes"] : [];
?>
<section class="seccionSedes">
    <div class="container--large">
        <div class="seccionSedes__grid">
            <div class="seccionSedes__info">
                <?php if ($subtitulo): ?>
                    <p class="heading--14"><?php echo $subtitulo; ?></p>
                <?php endif; ?>

                <?php if ($titulo): ?>
                    <h2 class="heading--48"><?php echo $titulo; ?></h2>
                <?php endif; ?>

                <?php if ($descripcion): ?>
                    <h2 class="font-sans heading--18"><?php echo $descripcion; ?></h2>
                <?php endif; ?>

                <?php if ($cta_titulo && $cta_url): ?>
                    <a class="boton-v2 boton-v2--blanco-rojo" href="<?php echo $cta_url; ?>" target="<?php echo $cta_target; ?>"><?php echo $cta_titulo; ?></a>
                <?php endif; ?>
            </div>
            <div class="seccionSedes__sedes">
                <?php foreach ($sedes as $sede) { 
                    $nombre         = !empty($sede["nombre"]) ? esc_html($sede["nombre"]) : '';
                    $ubicacion      = !empty($sede["sede"]) ? esc_html($sede["sede"]) : '';
                    $ciudad         = !empty($sede["ubicacion"]) ? esc_html($sede["ubicacion"]) : '';
                    $imagen_id      = !empty($sede["imagen"]['ID']) ? $sede["imagen"]['ID'] : '';

                    $enlace         = !empty($sede["enlace"]) ? $sede["enlace"] : [];
                    $enlace_titulo  = !empty($enlace["title"]) ? esc_html($enlace["title"]) : '';
                    $enlace_url     = !empty($enlace["url"]) ? esc_url($enlace["url"]) : '';
                    $enlace_target  = !empty($enlace["target"]) ? esc_attr($enlace["target"]) : '';
                ?>
                    <a href="<?php echo $enlace_url; ?>" class="seccionSedes__sede border-radius-5" title="<?php echo $nombre; ?>" target="<?php echo $enlace_target; ?>">
                        <div class="seccionSedes__sede-img">
                            <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, ''); ?>
                        </div>
                        <div class="seccionSedes__sede-info">
                            <?php if ($nombre): ?>
                                <p class="heading--24"><?php echo $nombre; ?></p>
                            <?php endif; ?>
                            <?php if ($ubicacion): ?>
                                <p class="heading--24"><?php echo $ubicacion; ?></p>
                            <?php endif; ?>
                            <?php if ($ciudad): ?>
                                <p class="heading--14"><?php echo $ciudad; ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php
}
?>
