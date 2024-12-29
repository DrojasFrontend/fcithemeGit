<?php 
/*
    Template Name: Cursos cardio U 
*/
$titulo = get_the_title();
$descripcion = get_the_content();
$foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
get_header(); 

global $paged;
$curpage = $paged ? $paged : 1;
$args = array(
    'post_type' => 'educacion_cursos',
    'orderby' => 'post_date',
    'posts_per_page' => 10,
    'paged' => $paged,
);

/* Funcionalidad del filtro */

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $args['s'] = $_GET['search'];
    $args['post_title'] = $_GET['search'];
}

if (isset($_GET['custom_date']) && !empty($_GET['custom_date'])) {
  $args['meta_query'] = array(
    array(
      'key' => 'date_event',
      'value' => $_GET['custom_date'],
      'compare' => '=',
      'type' => 'DATE'
    )
  );
}

if (isset($_GET['type_especialidades']) && !empty($_GET['type_especialidades']) || 
    isset($_GET['type_tipo_eventos']) && !empty($_GET['type_tipo_eventos'])) {
  $args['meta_query'] = array(
    'relation' => 'AND',
  );
  if (isset($_GET['type_especialidades']) && !empty($_GET['type_especialidades'])) {
    $args['meta_query'][] = array(
		'key' => 'categorias_eventos',
      'value' => $_GET['type_especialidades'],
      'compare' => 'LIKE',
    );
  }
  if (isset($_GET['type_tipo_eventos']) && !empty($_GET['type_tipo_eventos'])) {
    $args['meta_query'][] = array(
		'key' => 'tipo_de_evento',
      'value' => $_GET['type_tipo_eventos'],
      'compare' => 'LIKE',
    );
  }
}

$entrada_index = 0;
$publicaciones = array();
$paginacion = "";
$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
    $imagen = get_the_post_thumbnail_url($post->ID, array(700, 460));
    $id_publicacion = $post->ID;

    $ano = get_field('year_event');
    $mes = get_field('month_event');
    $dia = get_field('day_event');

    $lugar_event = get_field('lugar_event');
    $direccion_del_evento = get_field('direccion_del_evento');

    $ubicacion = $lugar_event ."<br />". $direccion_del_evento;
    $fecha_del_evento = $dia . " de " . mes_numero_a_texto($mes) . " de " . $ano;

    $publicaciones[$id_publicacion] = array(
        "titulo" => $post->post_title,
        "descripcion" => get_field('descripcion', $id_publicacion),
        "fecha_del_evento" => $fecha_del_evento,
        "enlace" => get_the_permalink($id_publicacion),
		"memorias" => get_field('link_memorias', $id_publicacion),
        "ubicacion" => $ubicacion,
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
    $pagina = $query;

    wp_reset_postdata();
endif;

?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="pagina">
    <!--<h1><img src="<?= $foto_destacada ?>" alt="<?= $titulo ?>"></h1> -->
    <?= $descripcion ?>
    <div class="educacontigeneral">
        <div class="educacontigeneral__filtro">
            <div class="educacontigeneral__filtro__int">
				<form  id="filter-form"  action="" method="get" class="form-clas" style="  width: 100%;
  justify-content: space-between;
  display: flex;" action="<?php the_permalink(); ?>
">
					
					<div>
						<input type="text" name="search" class="form-control" style="border: none;border-bottom: 0.125rem solid gray;border-radius: 0;" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" placeholder="Busca por palabra clave">
					</div>

          <div>
						<select name="type_tipo_eventos" id="type_tipo_eventos" class="form-select" style="border: none;border-bottom: 0.125rem solid gray;border-radius: 0;">
							<option value="<?php  echo !empty($_GET['type_tipo_eventos']) ? $_GET['type_tipo_eventos'] : '';  ?>"><?php  echo !empty($_GET['type_tipo_eventos']) ? $_GET['type_tipo_eventos'] : 'Tipo de Eventos';  ?></option>
							<?php 
							$opciones_tipo_de_eventos = get_field_choices('tipo_de_evento');
							foreach ($opciones_tipo_de_eventos as $opcion) {
								?>
								<option value="<?= $opcion ?>"><?= $opcion ?></option>
								<?php
							}
							?>

						</select>
					</div>

					
              
          <div>
						<input type="date" id="custom-date-input" class="form-control date-p" style="border: none;border-bottom: 0.125rem solid gray;border-radius: 0;" name="custom_date" value="<?php echo (isset($_GET['custom_date'])) ? $_GET['custom_date'] : ''; ?>" placeholder="Fecha">
					</div>

          <!--
					<div>
						<select name="type_tipo_eventos" id="type_tipo_eventos" class="form-select">
							<option value="<?php  echo !empty($_GET['type_tipo_eventos']) ? $_GET['type_tipo_eventos'] : '';  ?>"><?php  echo !empty($_GET['type_tipo_eventos']) ? $_GET['type_tipo_eventos'] : 'Tipo de Eventos';  ?></option>
							<?php 
							$opciones_tipo_de_eventos = get_field_choices('tipo_de_evento');
							foreach ($opciones_tipo_de_eventos as $opcion) {
								?>
								<option value="<?= $opcion ?>"><?= $opcion ?></option>
								<?php
							}
							?>

						</select>
					</div>
            -->
          



					<div>

						<input type="submit" value="Búsqueda" class="btn btn_limpiar">
					</div>
					<div>
						<button class="btn btn_limpiar" id="limpiar-btn">Limpiar</button>
					</div>
				</form>
            </div>
        </div>

         <div class="educacontigeneral__resultados" >
                <?php foreach($publicaciones as $idPublicacion => $cadaPublicacion): ?>
                <div class="educacontigeneral__cadaresult" style="border: 1px solid #D9D9D9;border-radius: 25px;height: 100%;padding-bottom: 1.5rem;">
                    <div class="educacontigeneral__cadaresult__int">
                        <div class="educacontigeneral__cadaresult__content" style="border:none!important;">
                            <div class="educacontigeneral__cadaresult__content__foto" style="background-color: #00266e;border-radius: 25px 25px 0px 0px;margin-bottom: 1rem;">
                                <a href="<?= $cadaPublicacion["memorias"] ?>">
                                    <img style="border-radius: 25px 25px 0px 0px;" src="<?= $cadaPublicacion["imagen"] ?>" alt="<?= $cadaPublicacion["titulo"] ?>">
                                </a>
                            </div>
                            <div class="educacontigeneral__cadaresult__content__content" style="padding: 0 1rem;">
                                <div class="educacontigeneral__cadaresult__content__fecha">
                                    <div class="icono">
                                        <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/fci/calendar2.svg" alt="Fecha">
                                    </div>
                                    <div class="fecha">
                                        <?= $cadaPublicacion["fecha_del_evento"] ?>
                                    </div>
                                </div>
                                <h2><?= $cadaPublicacion["titulo"] ?></h2>
                                <div class="educacontigeneral__cadaresult__content__ubicacion">
                                    <?= $cadaPublicacion["ubicacion"] ?>
                                </div>
                                <!--
                                <div class="educacontigeneral__cadaresult__content__cta">
                                    <a href="<?= $cadaPublicacion["enlace"] ?>" class="btn btn_vermas btn-azul">Conocer Más</a>
                                </div>
                                --->
                                <?php if($cadaPublicacion["memorias"] != ''){ ?>
                                <div class="educacontigeneral__cadaresult__content__cta mt-3">
                                    <a href="<?= $cadaPublicacion["memorias"] ?>" class="btn btn_vermas">Conocer Más</a>
                                </div>
    <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
    

        <div class="educacontigeneral__paginacion">
            <div class="container">
                <div class="row g-0">
                    <div class="col-12">
                        <?php get_template_part('template-parts/content', 'paginador'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
document.addEventListener("DOMContentLoaded", function() {
  var limpiarBtn = document.getElementById("limpiar-btn");
  limpiarBtn.addEventListener("click", function() {
    var formClas = document.querySelectorAll(".form-clas");
    for (var i = 0; i < formClas.length; i++) {
      var inputs = formClas[i].querySelectorAll("input[type=text], select");
      for (var j = 0; j < inputs.length; j++) {
        inputs[j].value = "";
      }
    }

    var datePickers = document.querySelectorAll(".date-p");
    for (var k = 0; k < datePickers.length; k++) {
      if (datePickers[k].datepicker) {
        datePickers[k].datepicker("setDate", null);
      }
    }

    window.location = "/educacion-cursos-cardio-u/";
  });
});
</script>
<?php  get_footer(); ?>
