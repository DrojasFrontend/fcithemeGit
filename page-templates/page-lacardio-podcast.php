<?php 
/*
    Template Name: LaCardio Podcast
*/
$titulo = get_the_title();
$descripcion = get_the_content();
$foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
get_header(); 

global $paged;
$curpage = $paged ? $paged : 1;
$args = array(
    'post_type' => 'lacardio_podcast',
    'orderby' => 'post_date',
    'posts_per_page' => 12,
    'paged' => $paged
);
$entrada_index = 0;
$publicaciones = array();
$paginacion = "";
$query = new WP_Query($args);

if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
    $imagen = get_the_post_thumbnail_url($post->ID, array(700, 460));
    $id_publicacion = $post->ID;
    $temporadas = get_the_terms($id_publicacion , 'temporadas' );
    $mp3_field = get_field('mp3', $id_publicacion);
    $mp3 = $mp3_field && is_array($mp3_field) && isset($mp3_field["url"]) ? $mp3_field["url"] : null;

    $youtube_link = get_field('youtube_link', $id_publicacion);
    $tiempo_mp3 = $mp3 ? get_tiempo_de_mp3($mp3) : '';
    $publicaciones[$id_publicacion] = array(
        "titulo" => $post->post_title,
        "descripcion" => get_field('descripcion', $id_publicacion),
        "mp3" => array(
            "archivo" => $mp3,
            "tiempo" => $tiempo_mp3,
        ),
        "youtube_link" => $youtube_link,
        "fecha" => get_the_date("d M"),
        "temporadas" => array(
            "id" => $temporadas[0]->term_taxonomy_id ?? '',
            "slug" => $temporadas[0]->slug ?? '',
            "nombre" => $temporadas[0]->name ?? '',
        ),
    );
    $entrada_index++;
    endwhile;

    if($query->max_num_pages > 1): 
        $paginacion .= '<div class="wp_pagination my-5" id="wp_pagination">';
        if($curpage > 1): 
            $paginacion .= '<a class="first page button" href="' . get_pagenum_link(1) . '">&laquo;</a>';
            $paginacion .= '<a class="previous page button" href="' . get_pagenum_link(($curpage - 1 > 0 ? $curpage - 1 : 1)) . '">&lsaquo;</a>';
        endif;
        for ($i = 1; $i <= $query->max_num_pages; $i++)
            $paginacion .= '<a class="' . ($i == $curpage ? 'active ' : '') . 'page button" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
        if($curpage < $query->max_num_pages):
            $paginacion .= '<a class="next page button" href="' . get_pagenum_link(($curpage + 1 <= $query->max_num_pages ? $curpage + 1 : $query->max_num_pages)) . '">&rsaquo;</a>';
            $paginacion .= '<a class="last page button" href="' . get_pagenum_link($query->max_num_pages) . '">&raquo;</a>';
        endif;
        $paginacion .=  '</div>';
    endif;

    wp_reset_postdata();
endif;
?>

<?php echo get_template_part('template-parts/content'); ?>
<main class="pagina">
    <h1><?= $titulo ?></h1>
    <?= $descripcion ?>
    <div class="lacardio_podcast">
        <div class="lacardio_podcast__resultados">
            <?php foreach($publicaciones as $idPublicacion => $cadaPublicacion): ?>
            <div class="lacardio_podcast__cadaresult">
                <div class="lacardio_podcast__cadaresult__int">
                    <div class="lacardio_podcast__cadaresult__img">
                        <img src="<?= $foto_destacada ?>" alt="<?= $titulo ?>">
                    </div>
                    <div class="lacardio_podcast__cadaresult__content">
                        <h2><?= $cadaPublicacion["titulo"] ?></h2>
                        <div class="lacardio_podcast__cadaresult__content__descripcion">
                            <p><?= $cadaPublicacion["descripcion"] ?></p>
                        </div>
                        <div class="lacardio_podcast__cadaresult__content__mp3">
                            <?php if (!empty($cadaPublicacion["mp3"]["archivo"])): ?>
                                <div class="lacardio_podcast__cadaresult__content__mp3__reproductor">
                                    <a href="#" class="play_stop_general play_stop_<?= $idPublicacion ?>">
                                        <span class="play seleccionado"><i class="fas fa-play"></i></span>
                                        <span class="stop"><i class="fas fa-stop"></i></span>
                                    </a>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function(){
                                            var play_stop_<?= $idPublicacion ?> = new Audio('<?= $cadaPublicacion["mp3"]["archivo"] ?>');
                                            var play_stop_<?= $idPublicacion ?>_estado = 'stop'
                                            document.querySelector('.play_stop_<?= $idPublicacion ?>').addEventListener('click', function( event ){
                                                event.preventDefault()
                                                if(play_stop_<?= $idPublicacion ?>_estado == 'stop'){
                                                    parar_todos_losaudios()
                                                    play_stop_<?= $idPublicacion ?>.play();
                                                    play_stop_<?= $idPublicacion ?>_estado = 'play';
                                                    this.querySelector('.play').classList.remove('seleccionado')
                                                    this.querySelector('.stop').classList.add('seleccionado')
                                                }else{
                                                    play_stop_<?= $idPublicacion ?>.pause();
                                                    play_stop_<?= $idPublicacion ?>_estado = 'stop';
                                                    this.querySelector('.play').classList.add('seleccionado')
                                                    this.querySelector('.stop').classList.remove('seleccionado')
                                                }
                                            })
                                        })
                                    </script>
                                </div>
                                <div class="lacardio_podcast__cadaresult__content__mp3__fecha">
                                    <?= $cadaPublicacion["fecha"] ?>, 
                                </div>
                                <div class="lacardio_podcast__cadaresult__content__mp3__tiempo">
                                    <strong>Duración: </strong><?= $cadaPublicacion["mp3"]["tiempo"] ?> minutos
                                </div>
                            <?php elseif (!empty($cadaPublicacion["youtube_link"])): ?>
                                <button class="btn btn-modal" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#youtubeModal" 
                                    data-youtube="<?= $cadaPublicacion["youtube_link"] ?>">
                                    <i class="fas fa-play"></i> Ver Video
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <div class="lacardio_podcast__paginacion">
            <?= $paginacion ?>
        </div>
    </div>
</main>

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
</script>

<?php  get_footer(); ?>
