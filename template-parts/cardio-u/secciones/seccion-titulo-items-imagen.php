<?php 
$sitename      = esc_html(get_bloginfo('name'));
$grupo_ofertas = get_query_var('grupo_ofertas');
$subtitulo     = !empty($grupo_ofertas['subtitulo']) ? esc_html($grupo_ofertas['subtitulo']) : '';
$titulo        = !empty($grupo_ofertas['titulo']) ? esc_html($grupo_ofertas['titulo']) : '';
$descripcion   = !empty($grupo_ofertas['descripcion']) ? $grupo_ofertas['descripcion'] : '';
$imagen_id     = !empty($grupo_ofertas["imagen"]['ID']) ? $grupo_ofertas["imagen"]['ID'] : '';

$programas     = !empty($grupo_ofertas["programas"]) ? $grupo_ofertas["programas"] : [];
?>

<section class="seccionCardioUTituloItemsImg">
    <div class="wrapper">
        <div class="seccionCardioUTituloItemsImg__grid">
            <div class="seccionCardioUTituloItemsImg_info">
                <?php if($subtitulo) : ?>
                <p class="subheading color--002D72">
                    <?php echo $subtitulo; ?>
                </p>
                <?php endif; ?>

                <?php if($titulo) : ?>
                <h2 class="heading--48 color--002D72">
                    <?php echo $titulo; ?>
                </h2>
                <?php endif; ?>

                <?php if($descripcion) : ?>
                    <div class="heading--18 color--263956">
                        <?php echo $descripcion; ?>
                    </div>
                <?php endif; ?>

                <?php if($programas) : ?>
                <ul class="seccionCardioUTituloItemsImg__programas">
                    <?php foreach ($programas as $key => $programa) { ?>
                        <li>
                            <img src="<?php echo $programa['icono']?>" alt="<?php echo $programa['nombre'] . ' - ' . $sitename?>" title="<?php echo $programa['nombre']?>">
                            <h2 class="heading--24 color--263956">
                                <?php echo $programa['nombre']?>
                            </h2>
                        </li>
                    <?php } ?>
                </ul>
                <?php endif; ?>
            </div>
            <div class="seccionCardioUTituloItemsImg__img">
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
</section>