<?php 
/*
    Template Name: Recursos
*/
$titulo = get_the_title();
get_header(); 

global $paged;
$curpage = $paged ? $paged : 1;
$args = array(
    'post_type' => 'recursos',
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
    $fecha_del_evento = get_field('fecha_del_evento', $id_publicacion);
    $ubicacion = get_field('ubicacion', $id_publicacion);
    $archivo = get_field('file_resource', $id_publicacion);
	
	$resumen_archivo = get_field('resumen_archivo');

    $publicaciones[$id_publicacion] = array(
        "id" => get_the_ID(),
        "titulo" => $post->post_title,
        "descripcion" => get_the_excerpt(),
        "fecha_del_evento" => $fecha_del_evento,
        "enlace" => get_the_permalink($id_publicacion),
        "archivo" => isset($archivo["url"]) ? $archivo["url"]: '',
        "imagen" => $imagen,
		"resumen_archivo" => $resumen_archivo,
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
    $pagina = $query;
    wp_reset_postdata();
endif;

?>

<?= get_template_part('template-parts/content'); ?>
<main class="pagina">
    <h1 class="px-0"><?= get_the_title() ?></h1>
    <div class="noticiasgeneral">
        <div class="noticiasgeneral__filtro">
            <div class="noticiasgeneral__filtro__int">
                <div>
                    Busca por palabra clave: 
                </div>
                <div>
                    <input type="text" name="" id="" class="form-control" placeholder="Buscar">
                </div>
                <div>
                    <input type="date" name="" id="" class="form-control" placeholder="Fecha">
                </div>
                <div>
                    <select name="" id="" class="form-select">
                        <option value="">Categoría</option>
                        <option value="1">Categoría 1</option>
                        <option value="2">Categoría 2</option>
                        <option value="3">Categoría 3</option>
                    </select>
                </div>
                <div>
                    <button class="btn btn_limpiar">Limpiar</button>
                </div>
            </div>
        </div>
        <div class="listado_documentos">
            <div class="listado_documentos__int">
                <?php $indicepubli = 0; foreach($publicaciones as $idPublicacion => $cadaPublicacion): ?>
                    <div class="documento_indv">
                        <div class="documento_indv__int">
                            <div class="documento_indv__imagen">
                                <img src="<?= $cadaPublicacion["imagen"] ?>" alt="<?= $cadaPublicacion["titulo"] ?>">
                            </div>
                            <div class="documento_indv__contenido">
                                <div class="documento_indv__contenido--int">
                                    <h2><?= $cadaPublicacion["titulo"] ?></h2>
                                    <p><?= $cadaPublicacion["resumen_archivo"] ?></p>
                                    <?php if($cadaPublicacion["archivo"] != ""): ?>
                                        <!--<p><button data-bs-toggle="modal" data-bs-target="#modalDescarga" href="<?= $cadaPublicacion["archivo"] ?>" descarga-id="<?= $cadaPublicacion["id"] ?>" descarga-titulo="<?= $cadaPublicacion["titulo"] ?>"  class="btn recursosDecargaBtn">Descargar</button></p> -->
									<p><a href="<?= $cadaPublicacion["archivo"] ?>" descarga-id="<?= $cadaPublicacion["id"] ?>" descarga-titulo="<?= $cadaPublicacion["titulo"] ?>"  class="btn">Descargar</a></p>
									
									
									
									
									
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $indicepubli++ ; endforeach ?>
            </div>
        </div>
        <div class="noticiasgeneral__paginacion">
            <div class="container">
                <div class="row g-0">
                    <div class="col-12">
                        <?php get_template_part('template-parts/content', 'paginador'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if(isset($socios) && is_array($socios)): ?>
            <div class="noticiasgeneral__socios">
                <div class="noticiasgeneral__socios__titulo">
                    <h2><?= $titulo_logos ?></h2>
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


<!-- Modal -->
<div class="modal fade" id="modalDescarga" tabindex="-1" aria-labelledby="modalDescargaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form_recursos">
            <h2>Recursos</h2>
            <p>Aquí podrás encontrar todo sobre nosotros, selecciona tu recurso y descárgalo.</p>
            <div>
                <?= do_shortcode('[contact-form-7 id="4864" title="Formulario - Descarga de recursos" html_name="Descargar_recursos"]') ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>





<?php  get_footer(); ?>