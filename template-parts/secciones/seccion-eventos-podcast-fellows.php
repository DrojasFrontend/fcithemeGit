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
    <div class="seccionEventos__fondo">
        <div class="container--large">
            <div class="seccionEventos__titulo">
                <div>
                    <p class="heading--14 color--002D72">VIDEOPODCAST FELLOWS LACARDIO</p>
                    <h2>
                        <span class="heading--48" style="color:#002d72;font-weight:300;font-family:Prompt;">
                            Disfruta de nuestro contenido
                        </span>
                    </h2>
                </div>
                <a href="#" class="boton-v2 boton-v2--blanco-rojo desktop">Ver todos los podcast</a>
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
                        $video_corto = get_field('video_corto');
                        $default_image = 'https://www.lacardio.org/wp-content/uploads/2024/11/podcast_featured.jpg';
                        ?>
                        <div>
                            <div class="seccionEventos__grid podcast-fellows">
                                <div class="seccionEvento__info">
                                    <?php if ($video_corto): ?>
                                        <!-- Mostrar el video corto si está disponible -->
                                        <div class="youtube-video" >
                                            <video width="100%" height="auto" controls>
                                                <source src="<?php echo esc_url($video_corto); ?>" type="video/mp4">
                                                Tu navegador no soporta la etiqueta de video.
                                            </video>
                                        </div>
                                    <?php else: ?>
                                        <!-- Mostrar la imagen predeterminada si no hay video -->
                                        <div class="youtube-placeholder">
                                            <img src="<?php echo esc_url($default_image); ?>" alt="Podcast Fellows"
                                                style="width: 100%; height: auto; display: block;">
                                        </div>
                                    <?php endif; ?>

                                    <span class="card-podcast-tema">Tema:</span>
                                    <h3 class="card-podcast-titulo">
                                        <?php the_title(); ?>
                                    </h3>

                                    <div class="lacardio_podcast__cadaresult__content__mp3">
                                        <?php if ($mp3): ?>
                                            <!-- Botón para reproducir el audio -->
                                            <div class="audioControl audio-container" style="cursor: pointer;">
                                                <button class="playAudioButton ButtonplayAudio">Escuchar ahora</button>
                                                <audio class="audioPlayer">
                                                    <source src="<?php echo esc_url($mp3['url']); ?>" type="audio/mpeg">
                                                    Tu navegador no soporta la reproducción de audio.
                                                </audio>
                                                <img src="https://www.lacardio.org/wp-content/uploads/2024/11/icono-escuchar-1.png"
                                                        width="60px" alt="Ver">
                                            </div>
                                        <?php elseif ($youtube_link): ?>
                                            <!-- Botón para redirigir al video -->
                                            <div class="audioControl youtube-container" style="cursor: pointer;">
                                                <a class="btn-modal playAudioButton" href="<?php echo esc_url($youtube_link); ?>"
                                                    target="_blank">
                                                    Ver ahora
                                                    <img src="https://www.lacardio.org/wp-content/uploads/2024/11/icono-escuchar-1-2.png"
                                                        width="60px" alt="Ver">
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            <p>No hay contenido disponible.</p>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Controlar los botones solo para audio
        const audioContainers = document.querySelectorAll('.audio-container');
        const audioPlayers = document.querySelectorAll('.audioPlayer');

        audioContainers.forEach((container, index) => {
            const button = container.querySelector('.ButtonplayAudio');
            const audioPlayer = audioPlayers[index];

            container.addEventListener('click', () => {
                if (audioPlayer.paused) {
                    // Pausar todos los demás audios
                    audioPlayers.forEach(audio => audio.pause());
                    audioPlayer.play();
                    button.textContent = 'Pausar Audio';
                } else {
                    audioPlayer.pause();
                    button.textContent = 'Escuchar ahora';
                }

                // Restaurar el texto de otros botones
                audioContainers.forEach((otherContainer, otherIndex) => {
                    if (otherIndex !== index) {
                        otherContainer.querySelector('.ButtonplayAudio').textContent = 'Escuchar ahora';
                    }
                });
            });
        });
    });
</script>


<?php wp_reset_postdata(); ?>