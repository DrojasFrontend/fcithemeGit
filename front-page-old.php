<?php
$curpage = $paged ? $paged : 1;
$args = array(
    'post_type' => array('post', 'blog_fellows'),
    'orderby' => 'post_date',
    'posts_per_page' => 10,
    'paged' => $paged
);
$entrada_index = 0;
$noticias_array = array();
$paginacion = "";
$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
    $id_publicacion = $post->ID;
    $imagen = get_the_post_thumbnail_url($id_publicacion, array(700, 460));
    $titulo = get_the_title();
    $noticias_array[$id_publicacion] = array(
        "titulo" => $titulo,
        "descripcion" => '',
        "enlace" => get_the_permalink($id_publicacion),
        "imagen" => $imagen,
        "fecha" => get_the_date("d M"),
    );
    $entrada_index++;
    endwhile;
    wp_reset_postdata();
endif;


get_header();
$banner_superior = get_field('banner_superior');
$botones_debajo_del_banner = get_field('botones_debajo_del_banner');
$por_que_elegir = get_field('por_que_elegir');
$nuestras_cifras = get_field('nuestras_cifras');
$nuestros_eventos = get_field('nuestros_eventos');
$instalaciones = get_field('instalaciones');
$instalaciones_dos = get_field('instalaciones_dos');
$PorqueElegir = get_field('porque_elegir');
/* banner slider */
$slides = get_field('banner_slides');
?>

<style>
.ncausa--pestanas__eventos--contenido h4, .ncausa--pestanas__eventos--contenido p, .titulo-evento, .info-evento {

    display: none;
}

    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".ncausa--pestanas__eventos--contenido").hover(function(){
    $(".ncausa--pestanas__eventos--contenido h4").css("display", "block");
    }, function(){
    $(".ncausa--pestanas__eventos--contenido h4").css("display", "none");
  });
  
  $(".ncausa--pestanas__eventos--contenido").hover(function(){
    $(".ncausa--pestanas__eventos--contenido p").css("display", "block");
    }, function(){
    $(".ncausa--pestanas__eventos--contenido p").css("display", "none");
  });
  
	
  
  
  
});
</script>

<main class="home">
    <?php if(is_array($slides)): ?>
    <section id="banner_slides_home" class="fci_banner_slider">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <?php if(count($slides) >= 2): ?>
                        <div id="fci-banner_slider" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <?php foreach ($slides as $key => $slide): ?>
                                    <button type="button" data-bs-target="#fci-banner_slider" data-bs-slide-to="<?= $key ?>" class="<?= ($key === 0) ? 'active' : ''; ?>" <?= ($key === 0) ? 'aria-current="true"' : ''; ?> aria-label="Slide--<?= $key ?>"></button>
                                <?php endforeach ?>
                            </div>
                            <div class="carousel-inner">
                                <?php foreach ($slides as $key => $slide): ?>
                                    <div class="carousel-item <?= ($key === 0) ? 'active' : ''; ?>">
                                        <div class="banner-img">
                                            <?php if($slide["enlace_banner_img"]): ?>
                                                <a href="<?= $slide["enlace_banner_img"]["url"]?>" class="banner-img-link">
                                                    <img src="<?= $slide["imagen_banner"]["url"]?>" alt="<?= $slide["imagen_banner"]["alt"]?>" class="img-fluid">
                                                </a>
                                            <?php else: ?>
                                                <img src="<?= $slide["imagen_banner"]["url"]?>" alt="<?= $slide["imagen_banner"]["alt"]?>" class="img-fluid">
                                            <?php endif; ?>
                                        </div>
                                        <?php if(!$slide["enlace_banner_img"]): ?>
                                            <div class="banner-txt">
                                                <h1><?= $slide["titular"]?></h1>
                                                <?php if($slide["descripcion"]): ?>
                                                    <div class="banner-desc">
                                                        <?= $slide["descripcion"]?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($slide["boton_banner"]): ?>
                                                    <a href="<?= $slide["boton_banner"]["url"]?>" class="btn"><?= $slide["boton_banner"]["title"]?></a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#fci-banner_slider"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#fci-banner_slider"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    <?php elseif(count($slides) < 2): ?>
                        <?php foreach ($slides as $simple): ?>
                            <div class="simple-banner">
                                <div class="banner-img">
                                    <?php if($simple["enlace_banner_img"]): ?>
                                        <a href="<?= $simple["enlace_banner_img"]["url"]?>" class="banner-img-link">
                                            <img src="<?= $simple["imagen_banner"]["url"]?>" alt="<?= $simple["imagen_banner"]["alt"]?>" class="img-fluid">
                                        </a>
                                    <?php else: ?>
                                        <img src="<?= $simple["imagen_banner"]["url"]?>" alt="<?= $simple["imagen_banner"]["alt"]?>" class="img-fluid">
                                    <?php endif; ?>
                                </div>
                                <?php if(!$simple["enlace_banner_img"]): ?>
                                    <div class="banner-txt">
                                        <h1><?= $simple["titular"]?></h1>
                                        <?php if($simple["descripcion"]): ?>
                                            <div class="banner-desc">
                                                <?= $simple["descripcion"]?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($simple["boton_banner"]): ?>
                                            <a href="<?= $simple["boton_banner"]["url"]?>" class="btn"><?= $simple["boton_banner"]["title"]?></a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php else: ?>
    <section class="home__splashinicial">
        <div class="bannerhome">
            <div class="bannerhome__int">
                <div class="bannerhome__imgmobile">
                    <img src="<?= $banner_superior["imagen_mobile"]["url"] ?>" alt="<?= $banner_superior["imagen_mobile"]["alt"] ?>">
                </div>
                <div class="bannerhome__content">
                    <div class="bannerhome__content__int">
                        <h2><?= $banner_superior["titulo"] ?></h2>
                        <p><?= $banner_superior["descripcion"] ?></p>
                    </div>
                </div>
                <div class="bannerhome__bg">
                    <img src="<?= $banner_superior["imagen_desktop"]["url"] ?>" alt="<?= $banner_superior["imagen_desktop"]["alt"] ?>">
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>



    <!--- INICIO BOTONES HOME  -->
    <!--section class="home__splashbotones">
        <div class="home__splashbotones__int">
            <?php foreach($botones_debajo_del_banner["botones"] as $cUno): ?>
                <a href="<?= $cUno["enlace"] ?>">
                    <?= $cUno["label"] ?> <i class="far fa-arrow-right"></i>
                </a>
            <?php endforeach ?>
        </div>
    </section-->
	<section class="customServicios">
		<div class="customServicios__grid">
			<a href="/citas-y-teleconsulta" class="customServicios__item">
				<span class="icon-mediano">
					<img src="/wp-content/themes/fcitheme/assets/img/ico-calendario.svg' ?>" alt="">
				</span>
				<p>SOLICITA UNA CITA</p>
				<span class="icon-pequeno">
					<img src="/wp-content/themes/fcitheme/assets/img/ico-chevron-rojo.svg' ?>" alt="">
				</span>
			</a>
			<a href="/resultados-e-historia-clinica/" class="customServicios__item">
				<span class="icon-mediano">
					<img src="/wp-content/themes/fcitheme/assets/img/ico-computador.svg' ?>" alt="">
				</span>
				<p>PORTAL PACIENTE</p>
				<span class="icon-pequeno">
					<img src="/wp-content/themes/fcitheme/assets/img/ico-chevron-rojo.svg' ?>" alt="">
				</span>
			</a>
		</div>
	</section>

  <!--- FIN BOTONES HOME -->

    <!--- INICIO SERVICIOS ESPECIALES -->
    <section class="home__serviciosesp">
        <div class="home__serviciosesp__int">
            <h2>Servicios especializados para ti</h2>
            <div class="buscador_de_letras">
                <div class="buscador_de_letras__descrp">
                    <h3>Necesitas un especialista:</h3>
                    <p>Realiza la búsqueda por la inicial de la especialidad. </p>
                </div>
                <?php echo get_template_part('template-parts/content', 'buscador_de_letras', array('seccion' => 'home')); ?>
            </div>
        </div>
    </section>

<!--- FIN SERVICIOS ESPECIALES -->



<!--- INICIO PORQUE ELEGIRNOS + CONOCE MAS SOBRE NOSOTROS -->
    <section class="home__porque">

    <!--- INICIO CONOCE MAS SOBRE NOSOTROS -->
    <div class="home__porque__int pt-3 pt-sm-3 pt-md-0 pb-5">
            <h1><?= $por_que_elegir["titulo"] ?></h1>
            <div class="home__porque__slider">
                <div class="tipo_slider tipo_slider_1">
                    <?php foreach($por_que_elegir["entradas"] as $cUno): ?>
                        <div class="porqueIndv <?= $cUno["diseno"] ?>">
                            <div class="porqueIndv__int">
                                <div class="porqueIndv__img">
                                    <a href="<?= $cUno["enlace"] ?>">
                                        <img src="<?= $cUno["imagen"]["url"] ?>" alt="<?= $cUno["imagen"]["alt"] ?>">
                                    </a>
                                </div>
                                <div class="porqueIndv__content">
                                    <div class="porqueIndv__content__int">
                                        <h3><?= $cUno["titulo"] ?></h3>
                                        <hr />
                                        <p class="mb-1"><?= $cUno["descripcion"] ?></p>
                                        <p class="text-center py-4 m-0"><a href="<?= $cUno["enlace"] ?>" class="btn btn-principal"><?= $cUno["btn_label"] ?></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
                    </section>

<!--- FIN CONOCE MAS SOBRE NOSOTROS -->


           <!----- INICIO SECCION INSTALACIONES ----->

    <section class="home__instalaciones">
        <div class="home__instalaciones__int">
            <div class="home__instalaciones__col">
				<div class="home__instalaciones__col--int">
                    <h2 class="text-center"><?= $instalaciones["titulo"] ?></h2>
                    
					
                </div>
				<a href="<?= $instalaciones["enlace"] ?>" >
                    <img class="px-3" src="<?= $instalaciones["imagen"]["url"] ?>" alt="<?= $instalaciones["imagen"]["alt"] ?>">
                </a>
                <div class="home__instalaciones__col--int mt-4">
                    
                    <p class="text-center"><a href="<?= $instalaciones["enlace"] ?>" class="btn"><?= $instalaciones["label_boton"] ?></a></p>
					
                </div>
				 
            </div>
            <div class="home__instalaciones__col mt-3 mt-md-0">
				<div class="home__instalaciones__col--int">
                    <h2 class="text-center"><?= $instalaciones_dos["titulo"] ?></h2>
                    
					
                </div>
				<a href="<?= $instalaciones_dos["enlace"] ?>">
                    <img class="px-3" src="<?= $instalaciones_dos["imagen"]["url"] ?>" alt="<?= $instalaciones_dos["imagen"]["alt"] ?>">
                </a>
                <div class="home__instalaciones__col--int mt-4">
                    
                    <p class="text-center"><a href="<?= $instalaciones_dos["enlace"] ?>" class="btn"><?= $instalaciones_dos["label_boton"] ?></a></p>
					
                </div>
				 
            </div>
        </div>
    </section>

 <!----- FIN SECCION INSTALACIONES ----->



 <!----- INICIO SECCION PORQUE ELEGIRNOS ----->
<section>

		<div class="container">
	<div class="Cards-sobre">
  <div class="row" style="margin: 0px;">
    <div class="col-12 col-md-12 col-lg-4  mb-md-5 mb-lg-0  mb-5 ">
      <h2> <?= $PorqueElegir["titulo"] ?> </h2>
      <a href="<?= esc_url($PorqueElegir["link"]) ?>" class="btn btn-primary"> <?= $PorqueElegir["texto_del_boton"] ?></a>
    </div>
    <div class="col-12 col-md-6 col-lg-4 flex-column d-none d-md-block h-100">
  <?php
  $cards = get_field('cards_primera_columna');
  if ($cards) {
    $counter = 1;
    foreach ($cards as $card) {
      $titulo = $card['titulo_de_la_card'];
      $imagen = $card['icono_card_img'];
      $texto = $card['parrafo_card'];
	  $texto_boton = $card['texto_del_boton'];
	  $link_boton = $card['link_del_boton'];
?>
      <div class="card card-porque border-0 <?php echo $counter > 4 ? 'd-none' : ''; ?>">
		     <hr class="border-primary">
        <div class="card-body card-body-2">
          <img src="<?php echo $imagen['url']; ?>" alt="<?php echo $imagen['alt']; ?>" class="img-icon">
          <h5 class="card-title fw-bold"><?php echo $titulo; ?></h5>
          <p class="card-text"><?php echo $texto; ?></p>
			  <!--<div class="boton-mt">
  			 <a href="<?php //echo esc_url( $link_boton ); ?>" class="boton-leer-mas"><?php //echo $texto_boton; ?></a> 
  </div>-->
        </div>
     
      </div>
<?php
      $counter++;
    }
  }
?>
    </div>
    <div class=" col-12 col-md-6 col-lg-4 flex-column d-none d-md-block h-100">
    <?php
  $cards = get_field('cards_segunda_columna');
  if ($cards) {
    $counter = 1;
    foreach ($cards as $card) {
      $titulo = $card['titulo_de_la_card_2'];
      $imagen = $card['icono_card_2'];
      $texto = $card['parrafo_card_2'];
		  $texto_boton = $card['texto_del_boton_2'];
	  $link_boton = $card['link_del_boton_2'];
?>
      <div class="card card-porque border-0 <?php echo $counter > 4 ? 'd-none' : ''; ?>">
		     <hr class="border-primary">
        <div class="card-body card-body-2">
          <img src="<?php echo $imagen['url']; ?>" alt="<?php echo $imagen['alt']; ?>" class="img-icon">
          <h5 class="card-title fw-bold"><?php echo $titulo; ?></h5>
          <p class="card-text"><?php echo $texto; ?></p>
  <!--<div class="boton-mt">
  			 <a href="<?php echo esc_url( $link_boton ); ?>" class="boton-leer-mas"><?php echo $texto_boton; ?></a>
  </div>-->

        </div>
     
      </div>
<?php
      $counter++;
    }
  }
?>
    </div>
	  
	  
	    <div class=" col-1 d-block d-md-none">
	  </div>
	    <div class=" col-11 d-block d-md-none">
            <div class="slider-porque">
 				  <?php
  $cards = get_field('cards_primera_columna');
  if ($cards) {
    $counter = 1;
    foreach ($cards as $card) {
      $titulo = $card['titulo_de_la_card'];
      $imagen = $card['icono_card_img'];
      $texto = $card['parrafo_card'];
       $texto_boton = $card['texto_del_boton'];
	  $link_boton = $card['link_del_boton'];
?>
      <div class="card card-porque border-0 <?php echo $counter > 4 ? 'd-none' : ''; ?>">
		     <hr class="border-primary">
        <div class="card-body card-body-2">
          <img src="<?php echo $imagen['url']; ?>" alt="<?php echo $imagen['alt']; ?>" class="img-icon">
          <h5 class="card-title fw-bold"><?php echo $titulo; ?></h5>
          <p class="card-text"><?php echo $texto; ?></p>
	   <!--<div class="boton-mt">
  			 <a href="<?php echo esc_url( $link_boton ); ?>" class="boton-leer-mas"><?php echo $texto_boton; ?></a>
  </div>-->

        </div>
      
      </div>
<?php
      $counter++;
    }
  }
?>
				
				  <?php
  $cards = get_field('cards_segunda_columna');
  if ($cards) {
    $counter = 1;
    foreach ($cards as $card) {
      $titulo = $card['titulo_de_la_card_2'];
      $imagen = $card['icono_card_2'];
      $texto = $card['parrafo_card_2'];
	  $texto_boton = $card['texto_del_boton_2'];
	  $link_boton = $card['link_del_boton_2'];
?>
      <div class="card card-porque border-0 <?php echo $counter > 4 ? 'd-none' : ''; ?>">
		     <hr class="border-primary">
        <div class="card-body card-body-2">
          <img src="<?php echo $imagen['url']; ?>" alt="<?php echo $imagen['alt']; ?>" class="img-icon">
          <h5 class="card-title fw-bold"><?php echo $titulo; ?></h5>
          <p class="card-text"><?php echo $texto; ?></p>
		   <!--<div class="boton-mt">
  			 <a href="<?php echo esc_url( $link_boton ); ?>" class="boton-leer-mas"><?php echo $texto_boton; ?></a>
  </div>-->
        </div>
      </div>
<?php
      $counter++;
    }
  }
?>
            </div>


        </div>
	  
	  
  </div>
</div>
</div>

		



        
    </section>

      <!--- FIN PORQUE ELEGIRNOS + CONOCE MAS SOBRE NOSOTROS -->


    <section class="home__nuestrascifras">
        <div class="home__nuestrascifras--int">
            <h2><?= $nuestras_cifras["titulo"] ?></h2>
            <div class="home_cifras">
                <div class="home_cifras__int">
                    <?php foreach($nuestras_cifras["entradas"] as $cUno): ?>
                        <div class="cifraindv">
                            <div class="cifraindv--int">
                                <h3><?= $cUno["cifra"] ?></h3>
                                <p><?= $cUno["descripcion"] ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                    
                </div>
            </div>
        </div>
    </section>

    <section class="home__blog" style="display:none;">
        <div class="home__blog__int">
            <h2>Blog, noticias y artículos de interés</h2>
            <section class="blogrollslider">
                <div class="blogrollslider--slider__paddingleft">
                    <div class="blogrollslider--slider tipo_slider_2">
                        <?php
                        foreach($noticias_array as $noticia):
                            ?>
                            <div class="blogrollslider--slider__indv">
                                <div class="blogrollslider--slider__indv--relative">
                                    <div class="blogrollslider--slider__indv__contenido">
                                        <div class="blogrollslider--slider__indv__contenido--cont">
                                            <div>
                                                <h3><?= $noticia["titulo"] ?></h3>
                                                <?php /* <h4>Un primer paso para estar, sentirte y verte mejor</h4> */ ?>
                                                <p class="text-center"><a href="<?= $noticia["enlace"] ?>" class="btn">Conoce más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blogrollslider--slider__indv__bg">
                                        <?php if($noticia["imagen"] != ""): ?>
                                            <img src="<?= $noticia["imagen"] ?>" alt="<?= $noticia["titulo"] ?>">
                                        <?php else: ?>
                                            <div class="imagen_vacia"></div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </section>
    
    <section class="home__eventos p-0 ">
        <div class="home__eventos__int p-0">
            <h2>Agéndate con LaCardio</h2>
            
        </div>
    </section>
	
	<?php
                    
                    $bds_bloque4_imagen = get_field('bds_bloque4_imagen');
                    $bds_bloque4_titulo = get_field('bds_bloque4_titulo');
                    $bds_bloque4_descripcion = get_field('bds_bloque4_descripcion');
                    $bds_bloque4_enlace = get_field('bds_bloque4_enlace');
                    $bds_bloque4_enlace_label = get_field('bds_bloque4_enlace_label');
                    $bds_titulo_eventos = get_field('bds_titulo_eventos');
                ?>
	 <div class="container mb-5 top-m">
		
                    <div class="row">
                     
                        <div class="col-12 col-md-6 mb-4 mb-md-0 p-xl-2 p-0  position-relative" style="margin: auto !important;" >
							
                        
                        
                        <div class="ncausa--pestanas__eventos">
                                <div class="ncausa--pestanas__eventos-cont">
                                
                                    <div class="ncausa--pestanas__eventos--img">
                                        <img src="<?php echo $bds_bloque4_imagen["url"]; ?>" alt="<?php echo $bds_bloque4_imagen["alt"]; ?>">
                                    </div>

                                    <div class="ncausa--pestanas__eventos--contenido" >

										
                                        <h4 id="h4-prueba"><?php echo $bds_bloque4_titulo; ?></h4>
                                        <p id="p-prueba"><?php echo $bds_bloque4_descripcion; ?></p>
                                        <div class="ncausa--pestanas__eventos--contenido_btn text-center">
                                            <a href="<?php echo $bds_bloque4_enlace; ?>" class="btn btn-descargar1"><?php echo              $bds_bloque4_enlace_label; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-md-0">
                            <div class="ncausa--pestanas__calendario">
                              <div id='calendar'></div>
                             <div class='my-events'></div>

                            </div>
                        </div>
                    </div>
		 </div>

    <section class="home__talks">
        <div class="home__talks__int">
            <?php foreach($nuestros_eventos["eventos"] as $cEvento): ?>
                <div class="talk_indv">
                    <a href="<?= $cEvento["enlace"] ?>">
                        <img src="<?= $cEvento["imagen"]["url"] ?>" alt="<?= $cEvento["imagen"]["alt"] ?>">
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </section>

 

</main>


<?php
get_footer();
?>