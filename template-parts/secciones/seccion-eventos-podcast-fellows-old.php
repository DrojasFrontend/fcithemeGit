<?php

$args = array(
    'post_type' => 'lacardio_podcast',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
);

$eventos_query = new WP_Query($args);

?>
<section class="seccionEventos seccionEventosSliderPodcastFellows">
    <div class="seccionEventos__fondo ">
        <div class="container--large">
            <div class="seccionEventos__titulo">
                <div>
                    <p class="heading--14 color--002D72">PODCAST FELLOWS LACARDIO</p>
                    <h2>
                        <span class="heading--48" style="color:#002d72;font-weight:300;font-family:Prompt;">
                            Disfruta de nuestro contenido
                        </span>
                    </h2>
                </div>
                <a href="https://www.lacardio.org/lacardio-podcast/" class="boton-v2 boton-v2--blanco-rojo desktop">Ver todos los podcast</a>
            </div>
        </div>
        <div class="container--large" id="sliderEventosPodcastFellows">
            <?php if ($eventos_query->have_posts()): ?>
                <div class="slickEventoPodcatsFellows seccionEventos__info slickPersonalizado">
                    <?php while ($eventos_query->have_posts()):
                        $eventos_query->the_post(); ?>
                        <?php
                        // Obtener los datos necesarios
                        $imagen_doctor = get_field('imagen_doctor') ?: '';
                        $nombre_doctor = get_field('nombre_doctor') ?: '';
                        $universidad = get_field('universidad') ?: '';
                        $cohorte = get_field('cohorte') ?: '';

                        $mp3 = get_field('mp3');
                        $youtube_link = get_field('youtube_link');
                        ?>
                        <div>
                            <div class="seccionEventos__grid podcast-fellows">
                                <div class="seccionEvento__imagen">
                                    <div class="contenedor-header-doctor-podcast">
                                        <div class="imagen-doctor-podcast">
                                            <img src="<?php echo esc_html($imagen_doctor); ?>" alt="">
                                        </div>
                                        <div>
                                            <p class="card-podcast-nombre-doc"> <?php echo esc_html($nombre_doctor); ?></p>
                                            <span class="card-podcast-uni-coh"><?php echo esc_html($universidad); ?></span>
                                            <span class="card-podcast-uni-coh"><?php echo esc_html($cohorte); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="seccionEvento__info">
                                    <span class="card-podcast-tema">Tema:</span>
                                    <h3 class="card-podcast-titulo">
                                        <?php the_title(); ?>
                                    </h3>

                                    <div class="lacardio_podcast__cadaresult__content__mp3">
                                        <?php if ($mp3): ?>
                                            <div class="audioControl" style="cursor: pointer;">
                                                <button class="playAudioButton">Escuchar ahora</button>
                                                <audio class="audioPlayer">
                                                    <source src="<?php echo esc_url($mp3['url']); ?>" type="audio/mpeg">
                                                    Tu navegador no soporta la reproducción de audio.
                                                </audio>
                                                <img src="https://www.lacardio.org/wp-content/uploads/2024/11/icono-escuchar-1.png"
                                                    width="60px" alt="Escuchar">
                                            </div>
                                        <?php elseif ($youtube_link): ?>
                                            <button class="playAudioButton btn-modal" data-bs-toggle="modal"
                                                data-bs-target="#youtubeModal"
                                                data-youtube="<?php echo esc_url($youtube_link); ?>">Ver ahora
                                                <img src="https://www.lacardio.org/wp-content/uploads/2024/11/icono-escuchar-1.png"
                                                    width="60px" alt="Escuchar">
                                            </button>
                                        <?php else: ?>
                                            <p>No hay contenido multimedia disponible.</p>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
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

<!-- Modal para videos -->
<div class="modal fade" id="youtubeModal" tabindex="-1" aria-labelledby="youtubeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <iframe id="youtubeIframe" src="" title="YouTube video" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const youtubeModal = document.getElementById('youtubeModal');
        const youtubeIframe = document.getElementById('youtubeIframe');

        youtubeModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const youtubeLink = button.getAttribute('data-youtube');
            const embedUrl = youtubeLink.replace("watch?v=", "embed/");
            youtubeIframe.src = embedUrl;
        });

        youtubeModal.addEventListener('hide.bs.modal', function () {
            youtubeIframe.src = '';
        });
    });

    // Selecciona todos los contenedores de control de audio
    const audioControls = document.querySelectorAll('.audioControl');
    const audioPlayers = document.querySelectorAll('.audioPlayer');

    // Agrega un evento a cada contenedor
    audioControls.forEach((control, index) => {
        const button = control.querySelector('.playAudioButton');
        const audioPlayer = audioPlayers[index];
        const image = control.querySelector('img');

        // Evento de clic para el contenedor (imagen y botón)
        control.addEventListener('click', () => {
            if (audioPlayer.paused) {
                // Pausa todos los audios antes de reproducir el actual
                audioPlayers.forEach(audio => audio.pause());
                audioPlayer.play();
                button.textContent = 'Pausar Audio';
            } else {
                audioPlayer.pause();
                button.textContent = 'Escuchar ahora';
            }

            // Actualiza el texto de los demás botones
            audioControls.forEach((otherControl, otherIndex) => {
                if (otherIndex !== index) {
                    otherControl.querySelector('.playAudioButton').textContent = 'Escuchar ahora';
                }
            });
        });
    });


</script>





<?php wp_reset_postdata(); ?>