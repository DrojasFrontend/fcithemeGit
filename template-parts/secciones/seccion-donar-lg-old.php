<?php 
$sitename       = esc_html(get_bloginfo('name'));
$grupo_donar    = get_field("grupo_donar");

$fondo          = $grupo_donar['fondo'];
$subtitulo      = $grupo_donar['subtitulo'];
$titulo         = $grupo_donar['titulo'];
$descripcion    = $grupo_donar['descripcion'];
$fondo          = $grupo_donar['fondo'];

$cta = isset($grupo_donar["cta"]) ? $grupo_donar["cta"] : [];

$imagen_id         = !empty($grupo_donar["imagen"]['ID']) ? $grupo_donar["imagen"]['ID'] : '';
?>
<style>
    .seccionDonar__fondo:before {
        background-color: <?php echo $fondo ?>;
    }
</style>
<section class="seccionDonar">
    <div class="container--large">
        <div class="seccionDonar__fondo">
            <div class="seccionDonar__grid">
                <div class="seccionDonar__info">
                    <?php if($subtitulo) : ?>
                    <p class="heading--14"><?php echo $subtitulo; ?></p>
                    <?php endif; ?>

                    <?php if($titulo) : ?>
                    <h2 class="heading--48"><?php echo $titulo; ?></h2>
                    <?php endif; ?>

                    <?php if($descripcion) : ?>
                    <p class="font-sans heading--18"><?php echo $descripcion; ?></p>
                    <?php endif; ?>

                    <?php echo generar_cta_desde_array($cta, 'boton-v2 boton-v2--blanco'); ?>
                </div>
                <div class="seccionDonar__img">
                    <?php 
                        echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>