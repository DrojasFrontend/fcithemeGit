<?php 
/*
    Template Name: Educación Atención
*/
$titulo = get_the_title();
$descripcion = get_the_content();
$foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
$titulo_logos = get_field('titulo');
$socios = get_field('socios');
get_header(); 

global $paged;
$curpage = $paged ? $paged : 1;
$args = array(
    'post_type' => 'temas_educativos',
    'orderby' => 'post_date',
    'posts_per_page' => -1,
    'paged' => $paged
);
$entrada_index = 0;
$publicaciones = array();
$paginacion = "";
$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
    $imagen = get_the_post_thumbnail_url($post->ID, array(700, 460));
    $id_publicacion = $post->ID;
    $fecha_del_evento = get_field('fecha_del_evento', $id_publicacion);
    $ubicacion = get_field('ubicacion', $id_publicacion);
    $categoria_informacion = get_field('categoria_informacion', $id_publicacion);
    $publicaciones[$id_publicacion] = array(
        "titulo" => $post->post_title,
        "descripcion" => get_the_excerpt(),
        "fecha_del_evento" => $fecha_del_evento,
        "enlace" => get_the_permalink($id_publicacion),
        "ubicacion" => $ubicacion,
        "categoria_informacion" => $categoria_informacion,
        "imagen" => $imagen,
        "fecha" => get_the_date("d M"),
    );
    $entrada_index++;
    endwhile;

    if($query->max_num_pages > 1): /* Si hay más de 1 página */
        $paginacion .= '<div class="wp_pagination my-5" id="wp_pagination">';

        if($curpage > 1): /* Si estoy más adelante de la pag 1 */
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
<?= get_template_part('template-parts/content'); ?>
<main class="pagina">
    <h1 class="px-0"><?= get_the_title() ?></h1>
    <div class="noticiasgeneral">
        <div class="noticiasgeneral__contenido">
            <?php the_content() ?>
        </div>
        <div class="noticiasgeneral__tituloh2">
            <h2>A tu ingreso al hospital</h2>
            <p>Durante tu ingreso y hospitalización recibirás temas claves como:</p>
        </div>
        <div class="noticiasgeneral__resultados mb-4">
            <?php $indicepubli = 0; foreach($publicaciones as $idPublicacion => $cadaPublicacion): ?>
                <?php if($cadaPublicacion["categoria_informacion"] == 'ingreso_hospital'): ?>
                    <div class="noticiasgeneral__cadaresult">
                        <div class="noticiasgeneral__cadaresult__int">
                            <div class="noticiasgeneral__cadaresult__content">
                                <div class="noticiasgeneral__cadaresult__content__foto">
                                    <?php if($cadaPublicacion["imagen"]): ?>
                                        <a href="<?= $cadaPublicacion["enlace"] ?>">
                                            <img src="<?= $cadaPublicacion["imagen"] ?>" alt="<?= $cadaPublicacion["titulo"] ?>">
                                        </a>
                                    <?php endif ?>
                                </div>
                                <div class="noticiasgeneral__cadaresult__content__content">
                                    <h3 class="border-0">
                                        <a href="<?= $cadaPublicacion["enlace"] ?>">
                                            <?= $cadaPublicacion["titulo"] ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            <?php $indicepubli++ ; endforeach ?>
        </div>
        <div class="noticiasgeneral__tituloh2">
            <h2>En la continuidad de la atención</h2>
            <p>En la continuidad de tu atención recibirás información por parte del personal de salud sobre:</p>
        </div>
        <div class="noticiasgeneral__resultados">
            <?php $indicepubli = 0; foreach($publicaciones as $idPublicacion => $cadaPublicacion): ?>
                <?php if($cadaPublicacion["categoria_informacion"] == 'continuidad'): ?>
                    <div class="noticiasgeneral__cadaresult">
                        <div class="noticiasgeneral__cadaresult__int">
                            <div class="noticiasgeneral__cadaresult__content">
                                <div class="noticiasgeneral__cadaresult__content__foto">
                                    <?php if($cadaPublicacion["imagen"]): ?>
                                        <a href="<?= $cadaPublicacion["enlace"] ?>">
                                            <img src="<?= $cadaPublicacion["imagen"] ?>" alt="<?= $cadaPublicacion["titulo"] ?>">
                                        </a>
                                    <?php endif ?>
                                </div>
                                <div class="noticiasgeneral__cadaresult__content__content">
                                    <h3 class="border-0">
                                        <a href="<?= $cadaPublicacion["enlace"] ?>">
                                            <?= $cadaPublicacion["titulo"] ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            <?php $indicepubli++ ; endforeach ?>
        </div>
        <div class="noticiasgeneral__paginacion">
            <?= $paginacion ?>
        </div>
        <?php if(is_array($socios)): ?>
            <div class="noticiasgeneral__socios">
                <div class="noticiasgeneral__socios__titulo">
                    <h3><?= $titulo_logos ?></h3>
                </div>
                <div class="noticiasgeneral__socios__contenido">
                    <div class="socios">
                        <?php foreach($socios as $socio): ?>
                            <div class="socios__indv">
                                <img src="<?= $socio["logo"]["url"] ?>" alt="<?= $socio["logo"]["alt"] ?>">
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</main>
<?php  get_footer(); ?>