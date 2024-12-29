<?php 
$sitename           = esc_html(get_bloginfo('name'));
$grupo_cursos = get_query_var('grupo_cursos');
$fondo              = !empty($grupo_cursos['fondo']) ? $grupo_cursos['fondo'] : '';
$titulo             = !empty($grupo_cursos['titulo']) ? esc_html($grupo_cursos['titulo']) : '';
$descripcion        = !empty($grupo_cursos['descripcion']) ? esc_html($grupo_cursos['descripcion']) : '';
$items              = !empty($grupo_cursos["cursos"]) ? $grupo_cursos["cursos"] : [];
?>

<section class="seccionCardioUTargetasGrandes">
    <div class="seccionCardioUTargetasGrandes__fondo" style="background-color: <?php echo $fondo; ?>">
        <div class="wrapper">
            <div class="seccionCardioUTargetasGrandes__titulo">
                <?php if($titulo) : ?>
                <h2 class="heading--48 color--002D72">
                    <?php echo $titulo; ?>
                </h2>
                <?php endif; ?>

                <?php if($descripcion) : ?>
                <p class="heading--18 color--263956">
                    <?php echo $descripcion; ?>
                </p>
                <?php endif; ?>
            </div>
            <?php if($items) : ?>
                <ul class="seccionCardioUTargetasGrandes__items">
                    <?php foreach ($items as $key => $item) { 
                    $imagen_id = !empty($item["imagen"]['ID']) ? $item["imagen"]['ID'] : '';
                    ?>
                        <li>
                            <div class="seccionCardioUTargetasGrandes__img">
                                <?php if($imagen_id) : ?>
                                    <?php 
                                        echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');
                                    ?>
                                <?php else : ?>
                                    <img src="https://via.placeholder.com/1164x408" alt="Imagen">
                                <?php endif; ?>
                            </div>
                            <div class="seccionCardioUTargetasGrandes__info" >
                                <h3 class="heading--24 color--002D72">
                                    <?php echo $item['nombre']?>
                                </h3>
                                <p class="heading--18 color--263956">
                                    <?php echo $item['detalle']?>
                                </p>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</section>