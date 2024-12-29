<?php 
$sitename     = esc_html(get_bloginfo('name'));
$grupo_banner = get_query_var('grupo_banner');
$titulo       = !empty($grupo_banner['titulo']) ? esc_html($grupo_banner['titulo']) : '';
$descripcion  = !empty($grupo_banner['descripcion']) ? esc_html($grupo_banner['descripcion']) : '';
$fondo        = !empty($grupo_banner['fondo']) ? esc_html($grupo_banner['fondo']) : '';
$imagen_id    = !empty($grupo_banner["imagen"]['ID']) ? $grupo_banner["imagen"]['ID'] : '';
?>
<section class="seccionCardioUNosotrosBanner">
    <div class="seccionCardioUNosotrosBanner__fondo" style="background-color: <?php echo $fondo; ?>">
        <div class="wrapper">
            <div class="seccionCardioUNosotrosBanner__grid">
                <div class="seccionCardioUNosotrosBanner__info">
                    <?php if($titulo) : ?>
                    <h1 class="heading--64 color--fff">
                        <?php echo $titulo; ?>
                    </h1>
                    <?php endif; ?>

                    <?php if($descripcion) : ?>
                        <p class="heading--18 color--fff">
                            <?php echo $descripcion; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="seccionCardioUNosotrosBanner__imagen">
                    <?php if($imagen_id) : ?>
                        <?php 
                            echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');
                        ?>
                    <?php else : ?>
                        <img src="https://via.placeholder.com/372x532" alt="Imagen">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>