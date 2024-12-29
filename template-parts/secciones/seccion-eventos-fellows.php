<?php

$args = array(
    'post_type' => 'educacion_eventos',
    'posts_per_page' => -1,
    'orderby' => 'meta_value',
    'order' => 'DESC',        // El más reciente primero
    'meta_type' => 'DATE',       // Asegura que sea tratado como fecha
);

$eventos_query = new WP_Query($args);

$closest_event_index = -1;
$index = 0;
?>
<style>
    .slick-slide[data-slick-index="0"] {
        transform: translate3d(0, 0, 0) !important;
        margin-left: 0 !important;
    }
</style>
<section class="seccionEventos seccionEventosSliderFellows">
    <div class="seccionEventos__fondo">
        <div class="container--large">
            <div class="seccionEventos__titulo">
                <div>
                    <p class="heading--14 color--002D72">Agéndate con nuestros eventos académicos</p>
                    <h2>
                        <span class="heading--48" style="color:#002d72;font-weight:300;font-family:Prompt;"> Eventos
                            especiales LaCardio</span>

                    </h2>
                </div>
                <a href="https://www.lacardio.org/educacion-medica-continua/" class="boton-v2 boton-v2--blanco-rojo desktop">Ver todos los eventos</a>
            </div>
        </div>
        <div class="container--large" id="sliderEventosFellows">
            <?php if ($eventos_query->have_posts()): ?>

                <div class="slickEventoFellows seccionEventos__info slickPersonalizado">
                    <?php while ($eventos_query->have_posts()):
                        $eventos_query->the_post(); ?>
                        <?php
                        // Obtener la fecha desde ACF
                        $fecha_evento = get_field('date_event'); // Campo ACF del selector de fecha en formato d/m/Y
                        $dia_evento = '';
                        $mes_evento = '';

                        if ($fecha_evento) {
                            // Convertir la fecha desde el formato d/m/Y a un timestamp
                            $timestamp = DateTime::createFromFormat('d/m/Y', $fecha_evento);
                            if ($timestamp) {
                                $dia_evento = $timestamp->format('j'); // Día sin ceros iniciales
                                $mes_evento_num = $timestamp->format('n'); // Mes en número sin ceros iniciales
                
                                // Convertir el número del mes en nombre del mes
                                $meses = [
                                    '1' => 'ENE',
                                    '2' => 'FEB',
                                    '3' => 'MAR',
                                    '4' => 'ABR',
                                    '5' => 'MAY',
                                    '6' => 'JUN',
                                    '7' => 'JUL',
                                    '8' => 'AGOS',
                                    '9' => 'SEP',
                                    '10' => 'OCT',
                                    '11' => 'NOV',
                                    '12' => 'DIC'
                                ];
                                $mes_evento = $meses[$mes_evento_num] ?? 'Mes no disponible';
                            } else {
                                // Error en la conversión de la fecha
                                $dia_evento = 'Fecha no válida';
                                $mes_evento = 'Fecha no válida';
                            }
                        } else {
                            // Campo ACF vacío o no definido
                            $dia_evento = 'Día no disponible';
                            $mes_evento = 'Mes no disponible';
                        }

                        // Obtener el lugar del evento
                        $evento_lugar = get_field('lugar_event') ?: '';
                        ?>
                        <div>
                            <a href="<?php echo esc_url(get_permalink()); ?>" style="text-decoration: none!important;">
                                <div class="seccionEventos__grid fellows">
                                    <div class="seccionEvento__imagen">
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php echo generar_thumbnail(get_the_ID(), 'full', ''); ?>
                                        <?php endif; ?>

                                        <?php if ($dia_evento && $mes_evento && $dia_evento !== 'Fecha no válida'): ?>
                                            <div class="contenedor-fecha-slider">
                                                <span class="mes"><?php echo esc_html($mes_evento); ?></span><br>
                                                <span class="dia"><?php echo esc_html($dia_evento); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="seccionEvento__info">
                                        <?php if (get_the_title()): ?>
                                            <h3 class="heading--30">
                                                <?php
                                                $titulo = get_the_title();
                                                $max_length = 66;

                                                // Cortar el título si excede la longitud máxima
                                                if (mb_strlen($titulo) > $max_length) {
                                                    echo esc_html(mb_substr($titulo, 0, $max_length)) . '...';
                                                } else {
                                                    echo esc_html($titulo);
                                                }
                                                ?>
                                            </h3>
                                        <?php endif; ?>


                                        <?php if ($evento_lugar): ?>
                                            <div class="contenedor-lugar">
                                                <img src="https://www.lacardio.org/wp-content/themes/fcitheme/assets/img/fci/location_icon.svg"
                                                    alt="Dirección">
                                                <p class="font-sans heading--18"> <?php echo esc_html($evento_lugar); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>

                <div class="slick-dots"></div>
            <?php endif; ?>

            <div class="seccionEventos__cta mobile">
                <a href="#" class="boton-v2 boton-v2--blanco-rojo">Ver todos los eventos</a>
            </div>
        </div>
    </div>
</section>




<?php wp_reset_postdata(); ?>