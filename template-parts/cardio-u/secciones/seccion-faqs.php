<?php 
$grupo_preguntas = get_query_var('grupo_preguntas');
$fondo           = !empty($grupo_preguntas['fondo']) ? esc_html($grupo_preguntas['fondo']) : '';
$titulo          = !empty($grupo_preguntas['titulo']) ? esc_html($grupo_preguntas['titulo']) : '';
$descripcion     = !empty($grupo_preguntas['descripcion']) ? esc_html($grupo_preguntas['descripcion']) : '';
$preguntas       = !empty($grupo_preguntas['preguntas']) ? $grupo_preguntas['preguntas'] : [];
?>
<section class="seccionCardioUPreguntas">
    <div class="seccionCardioUPreguntas__fondo" style="background-color: <?php echo $fondo; ?>">
        <div class="wrapper">
            <div class="seccionCardioUPreguntas__titulo">
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
            <div class="seccionCardioUPreguntasAccordion">
                <?php foreach ($preguntas as $key => $pregunta) { $key++?>
                    <div class="seccionCardioUPreguntasAccordion__item">
                        <span class="heading--14 color--002D72">0<?php echo $key; ?></span>
                        <button type="button" aria-label="<?php echo $pregunta['pregunta']?>" class="seccionCardioUPreguntasAccordion__title <?php echo $key == 1 ? 'active' : '' ?>">
                            <h3 class="heading--24 color--002D72"><?php echo $pregunta['pregunta']?></h3>
                            <?php 
                                get_template_part('template-parts/content', 'icono');
                                display_icon('arrow-down'); 
                            ?>
                        </button>
                        <div class="seccionCardioUPreguntasAccordion__tab" <?php echo $key == 1 ? 'style="display:block;"' : '' ?>>
                            <p class="heading--18 color--263956"><?php echo $pregunta['respuesta']?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>