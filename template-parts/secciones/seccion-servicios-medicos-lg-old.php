<?php 
$sitename                   = esc_html(get_bloginfo('name'));
$grupo_servicios_medicos    = get_field("grupo_servicios_medicos");

if (!empty($grupo_servicios_medicos)) {
    $fondo = esc_html($grupo_servicios_medicos['fondo']);

    $servicios = $grupo_servicios_medicos['servicios'];
    if (isset($servicios) && is_array($servicios) && !empty($servicios)) {
        ?>
        <section class="sectionServiciosMedicos">
            <div class="sectionServiciosMedicos__fondo" style="background-color: <?php echo $fondo; ?>">
                <div class="container--large">
                    <div class="sectionServiciosMedicos__grid">
                        <?php foreach ($servicios as $key => $servicio) { 
                            $icono      = esc_url($servicio['icono']);
                            $nombre     = esc_html($servicio['nombre']);
                            $detalle    = esc_html($servicio['detalle']);
                            $cta        = $servicio['cta'];
                            $cta_title  = esc_html($cta['title']);
                            $cta_url    = esc_url($cta['url']);
                            $cta_target = esc_attr($cta['target']);
                        ?>
                            <div class="sectionServicioMedico">
                                <div class="sectionServicioMedico__icono">
                                    <img width="42" height="42" src="<?php echo $icono; ?>" alt="<?php echo esc_attr($nombre . ' - ' . $sitename); ?>" title="<?php echo $nombre; ?>">
                                </div>
                                <h3 class="heading--24"><?php echo $nombre; ?></h3>
                                <p class="font-sans heading--18"><?php echo $detalle; ?></p>
                                <a class="sectionServicioMedico__cta heading--18" href="<?php echo $cta_url; ?>" target="<?php echo $cta_target; ?>"><?php echo $cta_title; ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
} 
?>
