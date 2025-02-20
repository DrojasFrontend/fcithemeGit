<?php
$args = array(
    'post_type' => 'educacion_eventos',
    'posts_per_page' => -1,
    'orderby' => 'meta_value',
    'order' => 'DESC', // El más reciente primero
    'meta_query' => array(
        array(
            'key' => 'year_event', // Campo ACF con el año del evento
            'value' => '2025', // Año que queremos filtrar
            'compare' => '=', // Compara el valor exactamente con 2025
            'type' => 'NUMERIC' // Asegúrate de que sea numérico para la comparación
        )
    )
);

$eventos_query = new WP_Query($args);
?>

<style>
    .slick-slide[data-slick-index="0"] {
        transform: translate3d(0, 0, 0) !important;
        margin-left: 0 !important;
    }
    .seccionEvento__imagen img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        object-position: right;
    }
</style>
<section class="seccionEventos seccionEventosSliderFellows">
    <div class="seccionEventos__fondo">
        <div class="container--large">
            <div class="seccionEventos__titulo">
                <div>
                    <p class="heading--14 color--002D72">Agéndate con nuestros eventos académicos</p>
                    <h2>
                        <span class="heading--48" style="color:#002d72;font-weight:300;font-family:Prompt;">Eventos
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
                        // Obtener los valores de los campos ACF
                        $anio_evento = get_field('year_event'); // Año del evento
                        $mes_evento_raw = get_field('month_event'); // Mes del evento (posible número con ceros iniciales)
                        $dia_evento = get_field('day_event'); // Día del evento

                        // Convertir el mes en un número entero
                        $mes_evento_num = intval($mes_evento_raw); 

                        // Convertir el número del mes en nombre corto
                        $meses = [
                            1 => 'ENE',
                            2 => 'FEB',
                            3 => 'MAR',
                            4 => 'ABR',
                            5 => 'MAY',
                            6 => 'JUN',
                            7 => 'JUL',
                            8 => 'AGO',
                            9 => 'SEP',
                            10 => 'OCT',
                            11 => 'NOV',
                            12 => 'DIC'
                        ];
                        $mes_evento = $meses[$mes_evento_num] ?? 'Mes no válido';

                        // Validar y asignar valores predeterminados si faltan datos
                        if (!$anio_evento || !$dia_evento) {
                            $dia_evento = 'N/A';
                            $mes_evento = 'N/A';
                        }

                        // Obtener el lugar del evento
                        $evento_lugar = get_field('lugar_event') ?: '';
                        ?>
                        <div>
                            <a href="<?php echo esc_url(get_permalink()); ?>" style="text-decoration: none!important;">
                                <div class="seccionEventos__grid fellows">
                                    <div class="seccionEvento__imagen">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php 
                                                $post_id = get_the_ID(); 
                                                echo generar_thumbnail($post_id, 'full', '');
                                            ?>
                                        <?php endif; ?>

                                        <?php if ($dia_evento && $mes_evento && $dia_evento !== 'N/A'): ?>
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
