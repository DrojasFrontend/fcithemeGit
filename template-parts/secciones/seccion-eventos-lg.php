<?php
global $Mounth;

$dias_semana = array(
    'Monday' => 'Lunes',
    'Tuesday' => 'Martes',
    'Wednesday' => 'Miércoles',
    'Thursday' => 'Jueves',
    'Friday' => 'Viernes',
    'Saturday' => 'Sábado',
    'Sunday' => 'Domingo',
);
	
// Obtener el mes actual en español
$mes_actual = date('F');
$formatter_mes = new IntlDateFormatter('es_ES', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'MMMM');
$mes_actual_esp = strtolower($formatter_mes->format(DateTime::createFromFormat('!m', date('m'))));
$ano_actual = date('Y');



$fecha_actual = date('d/m/Y');
$fecha_actual_obj = DateTime::createFromFormat('d/m/Y', $fecha_actual);

$args = array(
    'post_type' => 'eventos', 
    'posts_per_page' => -1, 
    'orderby' => 'meta_value',
    'meta_key' => 'evento_dia', 
    'order' => 'ASC', 
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
<section class="seccionEventos">
    <div class="seccionEventos__fondo">
        <div class="container--large">
            <div class="seccionEventos__titulo">
                <div>
                    <p class="heading--14 color--002D72">NUESTROS EVENTOS</p>
                    <h2>
                        <span class="heading--48" style="color:#002d72;font-weight:300;font-family:Prompt;"> Agéndate,</span>
                        <span class="heading--48" style="color:#002d72;font-weight:300;font-family:Prompt;text-transform: lowercase;" id="mes-actual">
    <?php echo strtoupper($mes_actual_esp); ?> <?php echo $ano_actual; ?>
</span>

                        
                    </h2>
                </div>
                <a href="#" class="boton-v2 boton-v2--blanco-rojo desktop">Ver todos los eventos</a>
            </div>
           
        </div>
        <div class="container--large" id="sliderEventos">
            <?php if ($eventos_query->have_posts()) : ?>
                <div class="slickEventoDia seccionEventos__dias">
                    <?php while ($eventos_query->have_posts()) : $eventos_query->the_post(); ?>
                        <?php
                            $fecha_evento = get_field('evento_dia');
                            $fecha_objeto = DateTime::createFromFormat('d/m/Y', $fecha_evento);
                            $fecha_formato_display = $fecha_objeto->format('d/m/Y');
                            $dia_semana_ingles = $fecha_objeto->format('l');
                            $dia_semana_espanol = $dias_semana[$dia_semana_ingles];
                            $numero_dia = $fecha_objeto->format('j');
							
							 // Obtener el mes en español    
                            $formatter_mes = new IntlDateFormatter('es_ES', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'MMMM');
                            $mes_espanol = strtolower($formatter_mes->format($fecha_objeto));

					
                            if ($fecha_objeto >= $fecha_actual_obj && $closest_event_index == -1) {
                                $closest_event_index = $index;
                            }
                            $index++;
                        ?>
                        <div class="seccionEventos__semanas">
                            <p class="seccionEventos__dia heading--14"><?php echo $dia_semana_espanol; ?></p>
                            <h3 class="seccionEventos__numero heading--64"><?php echo $numero_dia; ?></h3>
							<p style="display:none;" id="mes-evento"><?php echo $mes_espanol; ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
        
                <div class="slickEventoInfo  seccionEventos__info slickPersonalizado">
                    <?php while ($eventos_query->have_posts()) : $eventos_query->the_post(); ?>
                        <?php
        
                        $fecha_evento = get_field('evento_dia');
                        $fecha_objeto = DateTime::createFromFormat('d/m/Y', $fecha_evento);
                        $fecha_formateada = $fecha_objeto->format('j F \d\e Y');
                        $formatter = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
                        $fecha_inicial = $formatter->format($fecha_objeto);
        
                        $evento_tipo            = !empty(get_field('evento_tipo')) ? get_field('evento_tipo') : '';
                        $evento_lugar           = !empty(get_field('evento_lugar')) ? get_field('evento_lugar') : '';
                        $evento_hora            = !empty(get_field('evento_hora')) ? get_field('evento_hora') : '';
        
                        $evento_cta             = !empty(get_field('evento_cta')) ? get_field('evento_cta') : [];
                        $evento_cta_title       = !empty($evento_cta['title']) ? esc_html( $evento_cta['title']) : '';
                        $evento_cta_url         = !empty($evento_cta['url']) ? esc_url( $evento_cta['url']) : '';
                        $evento_cta_target      = !empty($evento_cta['target']) ? esc_attr($evento_cta['target']) : '';

                        $evento_cta_entradas             = !empty(get_field('evento_cta_entradas')) ? get_field('evento_cta_entradas') : [];
                        $evento_cta_entradas_title       = !empty($evento_cta_entradas['title']) ? esc_html( $evento_cta_entradas['title']) : '';
                        $evento_cta_entradas_url         = !empty($evento_cta_entradas['url']) ? esc_url( $evento_cta_entradas['url']) : '';
                        $evento_cta_entradas_target      = !empty($evento_cta_entradas['target']) ? esc_attr($evento_cta_entradas['target']) : '';
        
                        ?>
                        <div>
                            <div class="seccionEventos__grid">
                                <div class="seccionEvento__info">
                                    <?php $titulo = trim(get_the_title()); ?>
                                    <?php if (!empty($titulo)): ?>
                                        <h3 class="heading--30"><?php echo $titulo; ?></h3>
                                    <?php endif; ?>

                                    <?php if ($evento_tipo): ?>
                                        <p class="font-sans heading--18"><strong>Tipo:</strong> <?php echo $evento_tipo; ?></p>
                                    <?php endif; ?>

                                    <?php if ($fecha_inicial): ?>
                                        <p class="font-sans heading--18"><strong>Día:</strong> <?php echo $fecha_inicial; ?></p>
                                    <?php endif; ?>

                                    <?php if ($evento_lugar): ?>
                                        <p class="font-sans heading--18"><strong>Lugar:</strong> <?php echo $evento_lugar; ?></p>
                                    <?php endif; ?>

                                    <?php if ($evento_hora): ?>
                                        <p class="font-sans heading--18"><strong>Hora:</strong> <?php echo $evento_hora; ?></p>
                                    <?php endif; ?>

                                    <div class="seccionEvento__cta">
                                        <?php if ($evento_cta_url && $evento_cta_title): ?>
                                            <a class="link-hover" href="<?php echo $evento_cta_url; ?>" target="<?php echo $evento_cta_target; ?>" title="<?php echo $evento_cta_title; ?>">
                                                <span><?php echo $evento_cta_title; ?></span>
                                                <?php 
                                                    get_template_part('template-parts/content', 'icono');
                                                    display_icon('arrow-rojo'); 
                                                ?>
                                            </a>
                                        <?php endif; ?>

                                        <?php if ($evento_cta_entradas_url && $evento_cta_entradas_title): ?>
                                            <a class="link-hover" href="<?php echo $evento_cta_entradas_url; ?>" target="<?php echo $evento_cta_entradas_target; ?>" title="<?php echo $evento_cta_entradas_title; ?>">
                                                <span><?php echo $evento_cta_entradas_title; ?></span>
                                                <?php 
                                                    get_template_part('template-parts/content', 'icono');
                                                    display_icon('arrow-rojo'); 
                                                ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="seccionEvento__imagen">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php 
                                            $post_id = get_the_ID(); 
                                            echo generar_thumbnail($post_id, 'full', '');
                                        ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <div class="seccionEventos__cta mobile">
                <a href="#" class="boton-v2 boton-v2--blanco-rojo">Ver todos los eventos</a>
            </div>
        </div>
    </div>
</section>

<script>
    var closestEventIndex = <?php echo $closest_event_index; ?>;
	
jQuery(document).ready(function() { 
    var slickInterval = setInterval(function() {
        if (jQuery('.slick-slider').hasClass('slick-initialized')) {
            clearInterval(slickInterval);
            
            // Ejecuta el código una vez que Slick está inicializado
            jQuery(".slick-slide").click(function(){
                jQuery("#mes-actual").html(jQuery(this).find("#mes-evento").html());
            });

            // También actualizar al hacer clic en el botón siguiente y anterior
            jQuery("button.slick-next, button.slick-prev").click(function(){
                jQuery("#mes-actual").html(jQuery(".slick-current").find("#mes-evento").html());
            });

            // Usar el evento 'afterChange' de Slick para detectar cualquier cambio de slide
            jQuery('.slick-slider').on('afterChange', function(event, slick, currentSlide) {
                jQuery("#mes-actual").html(jQuery(".slick-current").find("#mes-evento").html());
            });
        }
    }, 100);
});

	
</script>

<?php wp_reset_postdata(); ?>