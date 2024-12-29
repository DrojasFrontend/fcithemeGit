<?php 
/*
    Template Name: CardioU Escuela
*/
$titulo = get_the_title();
$descripcion = get_the_content();
$foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
get_header();

/* ACF Variables */

$texto_banner = get_field('texto_banner');
$link_contactanos = get_field('link_contactanos');
$imagen_banner = get_field('imagen_banner');


$texto_servicios = get_field('texto_servicios');
$imagen_servicios = get_field('imagen_servicios');



$deberes = get_field('deberes');
$imgdeberes = get_field('imagen_deberes');
$derechos = get_field('derechos');
$imgderechos = get_field('imagen_derechos');
$normativa = get_field('normas_clases');
$terminos = get_field('terminos');

$cuerpo_cards = get_field('cuerpo_cards');




/* Cardio U buscador cursos  */



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
    $tipo_escuela =  get_field('tipo_de_escuela', $post->ID);
    $t_escuela = "";
    
    if(isset($tipo_escuela[0])){
        $t_escuela = $tipo_escuela[0];
        
    }
    $nombre = "";
    $url = $_SERVER['REQUEST_URI'];
	if(strpos( $url, 'enfermeria')  !== FALSE){
					$nombre = "Escuela de enfermeria";

    }else if(strpos( $url, 'investigaciones')  !== FALSE){
        $nombre = "Escuela de investigaciones";

    }else if(strpos( $url, 'servicio')  !== FALSE){
        $nombre = "Escuela de servicios";

    }else if(strpos( $url, 'innovacion')  !== FALSE){
        $nombre = "Escuela de Innovacion";

    }else if(strpos( $url, 'normativa')  !== FALSE){
        $nombre = "Formacion continua y normativa";

    }else if(strpos( $url, 'habilidades-y-destrezas')  !== FALSE){
        $nombre = "Escuela de habilidades y destrezas tecnicas";

    }else if(strpos( $url, 'medica')  !== FALSE){
        $nombre = "Escuela Medica";
    }
    
    /*echo "============================================";
        echo $t_escuela;
        echo "///////";
        echo $nombre;
    echo "============================================";
*/

    if($t_escuela === $nombre ){
        $imagen = get_the_post_thumbnail_url($post->ID, array(700, 460));
   
        $id_publicacion = $post->ID;
       
        
        $ano = get_field('year_event');
        $mes = get_field('month_event');
        $dia = get_field('day_event');
    
        $lugar_event = get_field('lugar_event');
        $direccion_del_evento = get_field('fecha_maxima_inscripcion');
        
    
    
        /*$ubicacion = $lugar_event ."<br />". $direccion_del_evento;*/
        $ubicacion = $direccion_del_evento;
        $fecha_del_evento = $dia . " de " . mes_numero_a_texto($mes) . " de " . $ano;
    
        $publicaciones[$id_publicacion] = array(
            "titulo" => $post->post_title,
            "descripcion" => get_field('descripcion', $id_publicacion),
            "fecha_del_evento" => $fecha_del_evento,
            "enlace" => get_the_permalink($id_publicacion),
            "memorias" => get_field('link_memorias', $id_publicacion),
            "ubicacion" => $ubicacion,
            "fecha_inicio" => $lugar_event,
            "imagen" => $imagen,
            "fecha" => get_the_date("d M"),
        );
        $entrada_index++;
    }
   
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


/* Cardio U buscador cursos  */


?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>



<style>

.boton-banner{display: block;width: 128.31px;font-family: 'Prompt';font-weight: 600;font-size: 16px;line-height: 18px;text-align: center;color: #00B388;text-decoration: none;
    }

    .boton-banner:hover{
        color: #00B388;
    }



    .titulo-banner{
        font-size: 36px;color: white;font-weight: 700;font-family: 'Prompt';line-height: 40px;
    }
   

    .contenedor-titulo-banner{
        display: flex;width: 30%;border-radius: 0px 133px 133px 0px;background-color: #002D72;padding-left: 3%;flex-direction: column;justify-content: center;height: 100%;
    }

    .contenedor-imagen-banner{
        width: 100%; 
        background-image: url('<?= $imagen_banner ?>');
        min-height:380px; background-position: center;background-repeat: no-repeat; background-size: cover;
    }
    .banner-container{
        display: inline-flex;width: 100%;background-color: #93846a;
    }

    .contenedor-boton-banner{
        display: flex;align-items: center;width: 142.57px;height: 48px;border-radius: 0px 0px 18px 0px;background-color: #ffffff;
    }
    .titulos-internos {
    color: #002D72;
    font-weight: 600;
    font-size: 26px;
    line-height: 30px;
    font-family: 'Prompt';
    letter-spacing: 0.5px;
}


@media only screen and (max-width: 1190px) {
            
            .contenedor-titulo-banner{
                padding-left: 7%;
            }
        }

        @media only screen and (max-width: 980px) {
            
            .contenedor-titulo-banner{
                width: 50%; 
                padding: 50px;
                
            }
        }

        @media only screen and (max-width: 767px) {
            
            .contenedor-boton-banner{
                margin: 0 auto;
            }
           
            
        }

        @media only screen and (max-width: 500px) {
            

            .contenedor-slider-doctor{
                display: unset;right: -90px;position: relative;
            }
            .contenedor-titulo-banner{
                width: 50%; 
                padding: 50px 0 50px 0;
                
            }    
            .titulo-banner{
                font-size: 30px;
            }           
        }


</style>


<main class="cardiou--container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Banner -->
                <?php the_content() ?>
            </div>
        </div>
    </div>


    <div class="banner-container">
        <div class="contenedor-imagen-banner" >
        <div class="contenedor-titulo-banner">
            <h2 class="titulo-banner" ><?= $texto_banner ?></h2><br>
            <div class=" contenedor-boton-banner" >
                <a href="<?= $link_contactanos ?>" class="boton-banner">
                    Contáctanos
                </a>
            </div>
        </div>
        </div>
    </div>



    
  
    <section class="mt-2 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 p-5">
                    <h2 class="titulos-internos">NUESTRO SERVICIO</h2>
                    <p class="parrafos"><?= $texto_servicios ?></p>
                </div>
                <div class="col-12 col-md-6 p-5">
                    <img src="<?= $imagen_servicios ?>" alt="" style="border-radius:0px 0px 60px 0px;width: 70%;">
                </div>
            </div>
        </div>
    </section>

  
	    
     <!---- Section buscador cursos ----------------------------------------->
     <section class="pagina">
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
                                    <img style="border-radius: 25px 25px 0px 0px;" src="<?= $cadaPublicacion["imagen"] ?>" alt="<?= $cadaPublicacion["titulo"] ?>">
                            </div>
                            <div class="educacontigeneral__cadaresult__content__content" style="padding: 0 1rem;">
                                <div class="educacontigeneral__cadaresult__content__fecha">
                                    <div class="icono">
                                        <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/fci/calendar2.svg" alt="Fecha">
                                    </div>
                                    <div class="fecha">
                                    <b style="color: #e40046;font-size: 12px;">Fecha de inicio:</b> <?= $cadaPublicacion["fecha_inicio"] ?><br>
                                    <b style="color: #e40046;font-size: 12px;">Fecha máxima de inscripción:</b> <?= $cadaPublicacion["ubicacion"] ?>
                                    </div>
                                </div>
                                <h2 style="height: 85px;"><?= $cadaPublicacion["titulo"] ?></h2>
                                <!--
                                <div class="educacontigeneral__cadaresult__content__ubicacion">
                                    <?= $cadaPublicacion["ubicacion"] ?>
                                </div>
                                
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
                                </section>
                         
     <!---- Section buscador cursos ----------------------------------------->     
	
	
	
	


 
      


    <section  class="derechos_deberes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Responsabilidades del Estudiantess</h2>
                </div>
            </div>
            <div class="item mb-4">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <?= $deberes ?>
                    </div>
                    <div class="col-12 col-md-6 text-center">
                        <img src="<?= $imgdeberes ?>" alt="Deberes del estudiante">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-12 col-md-6 text-center order-2 order-md-1">
                        <img src="<?= $imgderechos ?>" alt="Derechos del estudiante">
                    </div>
                    <div class="col-12 col-md-6 order-1 order-md-2">
                        <?= $derechos ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
     
    <section class="prueba">
    <div class="container">
          <div class="row">
          <h2 style="color: #00266e;font-weight: bold;font-size: 1.2rem;margin-bottom: 2rem;">Clases en línea</h2>            
          <?= $cuerpo_cards ?>
 
          </div>
        </div>                
    </section>


    



    <section class="terminos-condiciones">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Términos y condiciones</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tabs_buttons">
                        <ul class="nav nav-pills tabs_terminos" id="terminos-tabs" role="tablist">
                            <?php foreach($terminos as $key => $tab): ?>
                                <?php
                                    $button_id = 'tab--' . ($key + 1);
                                    $content_id = 'content--' . ($key + 1);
                                ?>
                                <li class="nav-item termino-item" role="presentation" style="padding: 1.5rem!important;">
                                    <button class="<?= ($key === 0) ? 'active' : ''; ?>" id="<?= $button_id ?>" data-bs-toggle="tab" data-bs-target="<?= '#' . $content_id ?>" type="button" role="tab" aria-controls="<?= $content_id ?>" aria-selected="false <?= ($key === 0) ? 'true' : ''; ?>">
                                        <img src="<?= $tab["icono_tab"] ?>" alt="Términos y condiciones" class="img-fluid" style="width:50%;">
                                        <h5>
                                            <?= $tab["titular_tab"] ?>
                                        </h5>
                                    </button>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content" id="tabs-contents">
                        <?php foreach($terminos as $key => $tab_content): ?>
                            <?php
                                $button_id = 'plan--' . ($key + 1);
                                $content_id = 'content--' . ($key + 1);
                            ?>
                            <div class="tab-pane fade <?= ($key === 0) ? 'show active' : ''; ?>" id="<?= $content_id ?>" role="tabpanel" aria-labelledby="<?= $button_id ?>">
                                <div class="tab-content tabs_contents__txt">
                                    <?= $tab_content["content_tab"] ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---
    <section class="canales-contacto">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Canales de contacto</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="contacto">
                            <div class="icono">
                                <svg width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.6666 27.4167L39.95 45.629C44.1279 48.7623 49.8721 48.7623 54.05 45.629L78.3333 27.4165" stroke="#002D72" stroke-width="7.83333" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M74.4166 19.5835H19.5833C15.2571 19.5835 11.75 23.0906 11.75 27.4168V66.5835C11.75 70.9097 15.2571 74.4168 19.5833 74.4168H74.4166C78.7429 74.4168 82.25 70.9097 82.25 66.5835V27.4168C82.25 23.0906 78.7429 19.5835 74.4166 19.5835Z" stroke="#002D72" stroke-width="7.83333" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <div class="canal">
                                <a href="mailto:campusvirtual@lacardio.org" target="_blank">campusvirtual@lacardio.org</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="contacto">
                            <div class="icono">
                                <svg width="66" height="64" viewBox="0 0 66 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2855_62)">
                                    <path d="M6.53587 1.47314H60.025C62.9759 1.47314 65.3917 3.83993 65.3917 6.84135V41.595C65.3917 44.5964 62.9759 47.1437 60.025 47.1437H39.1852V56.1508H54.3921C56.6275 56.1508 56.8079 63.6122 57.0769 63.8829H9.58127C9.58127 63.8829 9.58127 56.1508 12.266 56.1508H27.473V47.1437H6.54159C3.59064 47.1437 1.26366 44.5964 1.26366 41.595V6.84135C1.26366 3.83993 3.59064 1.47314 6.54159 1.47314H6.53587ZM6.53587 41.595H60.025V6.84135H6.53587V41.595Z" fill="#002D72"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_2855_62">
                                    <rect width="64.4571" height="63.1143" fill="white" transform="translate(0.799988 0.771484)"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="canal">
                                <p>
                                    Campus Virtual: <br>
                                    <a href="https://lacardio.elmg.net/" target="_blank">lacardio.elmg.net</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="contacto">
                            <div class="icono">
                                <svg width="75" height="74" viewBox="0 0 75 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.0321 16.9825C10.0321 43.3261 31.3879 64.6819 57.7315 64.6819C58.92 64.6819 60.0984 64.6385 61.2653 64.553C62.6043 64.4548 63.2736 64.4059 63.8832 64.0551C64.3879 63.7646 64.8664 63.2494 65.1194 62.7247C65.425 62.0914 65.425 61.3525 65.425 59.875V51.2051C65.425 49.9625 65.425 49.3412 65.2203 48.8088C65.04 48.3383 64.7464 47.9194 64.3661 47.5889C63.9355 47.2147 63.3515 47.0024 62.1839 46.5777L52.3153 42.9892C50.9567 42.4952 50.2772 42.2481 49.6328 42.29C49.0644 42.3269 48.5176 42.5211 48.0529 42.8504C47.526 43.2236 47.1543 43.8434 46.4105 45.0833L43.8833 49.295C35.7286 45.6018 29.1177 38.9824 25.419 30.8307L29.6308 28.3036C30.8705 27.5599 31.4903 27.188 31.8637 26.6611C32.193 26.1964 32.3872 25.6496 32.4241 25.0813C32.4659 24.4368 32.2188 23.7575 31.7249 22.3989L28.1363 12.5302C27.7117 11.3625 27.4994 10.7786 27.1252 10.348C26.7947 9.96759 26.3758 9.6742 25.9053 9.49355C25.3728 9.28906 24.7515 9.28906 23.509 9.28906H14.839C13.3615 9.28906 12.6227 9.28906 11.9893 9.59449C11.4647 9.84748 10.9496 10.3262 10.659 10.8309C10.3081 11.4404 10.2591 12.1099 10.161 13.4489C10.0756 14.6156 10.0321 15.794 10.0321 16.9825Z" stroke="#002D72" stroke-width="6.15476" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="canal">
                                <a href="http://wa.me/+573176682013" target="_blank">317 668 2013</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    ----->
    <section class="formulario mt-5 mb-5" >
    <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-10" style="border-radius: 25px;border: 1px solid #D9D9D9;padding: 1.5rem; margin:0 auto;">
                    <h2 style="color: #00266e;font-weight: bold;font-size: 1.7rem;margin-bottom: 1rem; text-align: center;">Solicita más información</h2>
                    <?php echo do_shortcode('[contact-form-7 id="8ae3dbc" title="Cardio U - info"]'); ?>
                    </div>
                </div>            
            </div>
    </div>
    </section>                              
   


    




   
   
	
	

	
	
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