<?php
/*
    Template Name: Centro Internacional
*/
get_header();
$fecha_del_evento = get_field('fecha_del_evento');
$ubicacion = get_field('ubicacion');




/* ACF Variables */
$breadcrumbs = get_field('breadcrumbs');


$imagen_banner = get_field('imagen_banner');
$titulo_banner = get_field('titulo_banner');

$texto_bienvenida = get_field('texto_bienvenida');
$quienes_somos = get_field('quienes_somos');
$iframe_video_youtube = get_field('iframe_video_youtube');


$slider = get_field('slider');


$servicios = get_field('servicios');


$pacientes = get_field('pacientes');

$galeria = get_field('galeria');


$info_contacto = get_field('info_contacto');    
$info_hoteleria_y_transporte = get_field('info_hoteleria_y_transporte');    
$info_documentos_para_su_viaje = get_field('info_documentos_para_su_viaje');    
$info_recomendaciones_para_su_viaje = get_field('info_recomendaciones_para_su_viaje');    
$info_faqs = get_field('info_faqs');    
$info_como_llegar = get_field('info_como_llegar');    
$info_formas_de_pago = get_field('info_formas_de_pago');    


$wall_paciente = get_field('wall_paciente');

$convenios = get_field('convenios');

$acredicaciones = get_field('acredicaciones');



?>
<?= get_template_part('template-parts/content'); ?>
<link rel="stylesheet" id="main_css-css" href="https://www.lacardio.org/wp-content/themes/fcitheme/assets/css/main-v2.css?ver=6.5.5" type="text/css" media="all">

<div class="breadcrumbs">
    <p id="breadcrumbs" class="claro">
        <span>
            <a style="text-decoration: none!important;" href="https://www.lacardio.org/" data-wpel-link="internal">LaCardio</a>
        </span>
        <?php foreach ($breadcrumbs as $breadcrumb): ?>
            » 
            <span>
                <a style="text-decoration: none!important;" href="<?= $breadcrumb["link_breadcrumb"]?>">
                    <?= $breadcrumb["breadcrumb"]?>
                </a>
            </span>
        <?php endforeach ?>

    </p>
</div>

<style>
	#breadcrumbs a{color:#00266e!important;}
	
    .row{
        justify-content: center;
    }
    .pacientes{
        display:flex;align-items: center;
    }


    /*SLIDERRRRR SERVICIOSSSSS*/

.doctores-cardio-patias .swiper {width: 100%;padding-top: 50px;padding-bottom: 50px;}

.doctores-cardio-patias .swiper-slide {width: calc(100% / 4);height: auto;border-radius: 10px;display: flex;flex-direction: column; justify-content: flex-start;align-items: center;flex-wrap: nowrap;background-color: #ffffff;
}

.doctores-cardio-patias .swiper-slide-active {
  filter: blur(0px);
}

.doctores-cardio-patias .swiper-pagination-bullet,
.doctores-cardio-patias .swiper-pagination-bullet-active {
  background: #000;
}




.doctores-cardio-patias .swiper-slide h2,
.doctores-cardio-patias .swiper-slide h3 {
    margin-bottom: 15px;text-align: center;
    color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;padding-top: 10px;
}

.doctores-cardio-patias .swiper-slide p {color: #002d72;
    font-weight: 300;
    font-size: 19px;text-align: center;font-weight: 500;
}

a{
    text-decoration: none!important;
}


.doctores-cardio-patias .swiper-3d .swiper-slide-shadow-left,
.doctores-cardio-patias .swiper-3d .swiper-slide-shadow-right {
  background-image: none;
}
    /*SLIDERRRRR SERVICIOSSSSS*/

.texto-bienvenida{
    color: #E40046!important;text-align: center!important;font-size: 34px!important;font-weight: 900!important;
}

@media only screen and (max-width: 768px) {

    .doctores-cardio-patias .swiper-slide {width: 300px;}
    .pacientes{
        display:block;text-align: center;
    }
    
    .banner{border-radius:0px 0px 0px 0px !important;}
    .h1-banner{
    font-size: 2rem!important;
}


}

@media only screen and (max-width: 500px) {

    .texto-bienvenida{
    font-size: 16px!important;
}
	.h1-banner{
		top:10%!important;
		font-size: 2rem !important;
	}
}

@media only screen and (max-width: 400px) {
    .h1-banner{
    font-size: 1.5rem!important;width: 80% !important;
}

.banner{border-radius:0px 0px 0px 0px !important;}
}


 
.h1-banner{font-family: 'Prompt';text-shadow: 2px 2px 2px #000;text-align: center;width: 100%;position: absolute;top: 37%;left: 5%;font-weight: 900 !important;color: white !important;font-size: 3rem !important;display: flex;
 
}

.banner{width: 100%; border-radius:0px 0px 80px 80px;display: block;max-width: 100%;height: auto;}


</style>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css'>
<main class="chequeo_medico">
   
<div width="100%">
    <div style="text-align: right;margin-right: 20px;">
        <a href="https://www.lacardio.org/centro-internacional/">
            <img src="https://www.lacardio.org/wp-content/uploads/2024/07/espanol.webp" alt="Español" width="50px">
        </a>    
    
        <a href="https://www.lacardio.org/international-center/">
            <img src="https://www.lacardio.org/wp-content/uploads/2024/07/ingles.webp" alt="Ingles" width="50px">
        </a>
    </div>
</div>


<div class="container-fluid">
        <div class="row">
            <div class="col-12" style=" position: relative;display: inline-block;">
                <img src="<?= $imagen_banner ?>" alt="" class="banner">
                <h1 class="h1-banner"><?= $titulo_banner ?></h1>
            </div>
        </div>
    </div>




<section>
    <div class="container">
        <div class="row">
            <div class="col-12 p-5">
                <h2 class="texto-bienvenida"><?= $texto_bienvenida ?></h2>
            </div>


            <div class="col-12 col-md-6">
                <div style="display: inline-flex; pt-3 pb-3">
                    <img decoding="async" style="height: 64px;width: auto;" src="https://www.lacardio.org/wp-content/uploads/2024/01/icono-corazon.png" alt="Icono Corazon ">
                    <h2 style="color: #002d72; font-size: 2rem; font-weight: bold; line-height: 1.3em; margin: 0; padding: 0; padding-top: 5px; text-transform: capitalize; border: none;">¿Quiénes somos?</h2>
                </div>
                <?= $quienes_somos ?>    

            </div>

            <div class="col-12 col-md-6">
                <div>
                    <?= $iframe_video_youtube ?> 
                </div> 
            </div>

        </div>
    </div>
</section>


<section class="pt-3">
   <div class="container">
        <div class="row">
            <div class="col-12 pt-3 pb-3">
                <div style="display: inline-flex;">
                    <img decoding="async" style="height: 64px;width: auto;" src="https://www.lacardio.org/wp-content/uploads/2024/01/icono-corazon.png" alt="Icono Corazon ">
                    <h2 style="color: #002d72; font-size: 2rem; font-weight: bold; line-height: 1.3em; margin: 0; padding: 0; padding-top: 5px; text-transform: capitalize; border: none;">Conoce nuestras Especialidades</h2>
                </div>
            </div>
        </div>
   </div>                 
</section>

<!-- SLIDER SERVICIOSSSSSSSSSSS -->
<section class="container-fluid"  style="background-color: #ffffff;">
   <div class="doctores-cardio-patias container ">
                    
        <div class="swiper">
            <div class="swiper-wrapper">


                <?php foreach ($slider as $item_slider): ?>

                <div class="swiper-slide">
                    <a href="<?= $item_slider["link_slider"]?>" style="text-align: center;">
                        <img src="<?= $item_slider["imagen_slider"]?>" alt="" style="width: auto;height: 100px;">
                            <h3><?= $item_slider["titulo_slider"]?></h3>
                            <p><?= $item_slider["subtitulo_slider"]?></p>
                    </a>  
                </div>

                <?php endforeach ?>

            
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
   </div>
</section>

    <!-- SLIDER SERVICIOSSSSSSSSSSS -->

 
<section class="pt-3">
   <div class="container">
        <div class="row">
            <div class="col-12 pt-3 pb-3">
                <div style="display: inline-flex;">
                    <img decoding="async" style="height: 64px;width: auto;" src="https://www.lacardio.org/wp-content/uploads/2024/01/icono-corazon.png" alt="Icono Corazon ">
                    <h2 style="color: #002d72; font-size: 2rem; font-weight: bold; line-height: 1.3em; margin: 0; padding: 0; padding-top: 5px; text-transform: capitalize; border: none;">Nuestros servicios y valor agregado</h2>
                </div>
            </div>
        </div>
   </div>   
   
   
   <div class="container">
    <div class="row">
        

        <?php foreach ($servicios as $item_servicios): ?>

            <div class="col-12 col-sm-3 col-md-3 col-lg-3 text-center">
                <a href="<?= $item_servicios["link_servicio"]?>" style="text-decoration: none!important;">
                    <img src="<?= $item_servicios["imagen_servicio"]?>" alt="" style="width: 100%;border-radius: 0px 50px 0 50px;">
                    <h3 style="color: #002D72;font-size: 22px;font-weight: 600;"><?= $item_servicios["titulo_servicio"]?></h3>
                </a>
            </div>


        <?php endforeach ?>


        

    </div>
</div>




</section>    



<section class="mt-5">
    <div class="container">
        <div class="row">

                

            <div class="col-12 col-md-6 p-3" >

                <div style="display: inline-flex;">
                    <img decoding="async" style="height: 64px;width: auto;" src="https://www.lacardio.org/wp-content/uploads/2024/01/icono-corazon.png" alt="Icono Corazon ">
                    <h2 style="color: #002d72; font-size: 2rem; font-weight: bold; line-height: 1.3em; margin: 0; padding: 0; padding-top: 5px; text-transform: capitalize; border: none;">Nuestros pacientes</h2>
                </div>


                <div style="background-color:#e6ecf3;border-radius: 0px 0px 80px 0;">
                    

                    <?php foreach ($pacientes as $item_pacientes): ?>
                        
                    
                        <div class="pacientes p-3">
                            <img class="card-img-top" src="<?= $item_pacientes["imagen_paciente"]?>" style="max-width: 250px;">
                            <p style="padding:20px;">
                                <b style="color: #e6264e;">
                                    Nombre: </b><?= $item_pacientes["nombre_paciente"]?>
                                <br>
                                Pais: <?= $item_pacientes["pais_paciente"]?><br>
                                "<?= $item_pacientes["experiencia_paciente"]?>" 

                            </p>
                        </div>

                    <?php endforeach ?>


                </div>

            </div>

            <div class="col-12 col-md-6 p-3">
               <div class="contenedor-galeria" style="padding-left: 20px;">
                    <div style="display: inline-flex; align-items: center;overflow: hidden;">
                        <h2 style="color: #002d72; font-size: 2rem; font-weight: bold; line-height: 1.3em; margin: 0; padding: 0; ; text-transform: capitalize; border: none;">Galería</h2>
                       
                    </div>

                    <!-- SLIDER SERVICIOSSSSSSSSSSS -->
                    <section class="container-fluid"  style="background-color: #ffffff;">
                    <div class="doctores-cardio-patias container">
                                        
                            <div class="swiper">
                                <div class="swiper-wrapper">

                                    <?php foreach ($galeria as $item_galeria): ?>

                                    <div class="swiper-slide">
                                        <a href="<?= $item_galeria["link_galeria"]?>">
                                            <img src="<?= $item_galeria["imagen_galeria"]?>" alt="" style="width: 100%;height: auto;min-width:300px;">
                                                
                                        </a>  
                                    </div>

                                    <?php endforeach ?>

                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                    </div>
                    </section>
                    <!-- SLIDER SERVICIOSSSSSSSSSSS -->

               </div>



                <div class="" style="padding-left: 20px;">
                    <div style="display: inline-flex; align-items: center;overflow: hidden;">
                        <h2 style="color: #002d72; font-size: 2rem; font-weight: bold; line-height: 1.3em; margin: 0; padding: 0; ; text-transform: capitalize; border: none;">Noticias</h2>
                       
                    </div>
                        <img src="https://www.lacardio.org/wp-content/uploads/2024/09/noticia-centro-internacional.jpg" alt="">
                    <h3><b style="color: #e6264e;">¡Nuestra misión por el cuidar la salud sobrepasa fronteras! </b></h3>
                    <p>Gracias a nuestras alianzas estratégicas con Best Doctors, Salud S.A Quito, Ministerio de Salud de Ecuador, Confiamed y ProColombia, participamos en un evento determinante para continuar fortaleciendo los lazos en el sector salud de Colombia y América Latina.    </p>
                    <a href="https://www.lacardio.org/impulsando-el-turismo-medico-ecuador-y-colombia-unen-fuerzas-para-fortalecer-la-atencion-de-salud/">
                        <span class="seccionNoticias__leermas font-sans heading--18 color--E40046">
                                        Leer noticia
                            <img loading="lazy" width="24" height="24" src="https://www.lacardio.org/wp-content/themes/fcitheme/assets/img/ico-chevron-rojo.svg" alt="icono flecha roja" title="icono flecha roja">
                        </span>
                    </a>
                </div>

                

            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-12 pt-3 pb-3">
                <div style="display: inline-flex;">
                    <img decoding="async" style="height: 64px;width: auto;" src="https://www.lacardio.org/wp-content/uploads/2024/01/icono-corazon.png" alt="Icono Corazon ">
                    <h2 style="color: #002d72; font-size: 2rem; font-weight: bold; line-height: 1.3em; margin: 0; padding: 0; padding-top: 5px; text-transform: capitalize; border: none;">Wall de pacientes</h2>
                </div>
            </div>


            <?php foreach ($wall_paciente as $item_wall_paciente): ?>
                
                <div class="col-12 col-md-6 mt-2">
                    <div class="p-5" style="text-align: center; border-radius:40px; background-color: #E7F3FF;">
                    <?= $item_wall_paciente["iframe_video_paciente"]?>
                    
                        <div style="text-align:center;">
                            <h3 style="margin-bottom: 15px;color: #002D72;font-size: 23px;font-weight:bold;"><?= $item_wall_paciente["titulo_paciente"]?></h3>
                            <p class=""><?= $item_wall_paciente["info_paciente"]?></p>
                            
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
            
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-12 pt-3 pb-3">
                <div style="display: inline-flex;">
                    <img decoding="async" style="height: 64px;width: auto;" src="https://www.lacardio.org/wp-content/uploads/2024/01/icono-corazon.png" alt="Icono Corazon ">
                    <h2 style="color: #002d72; font-size: 2rem; font-weight: bold; line-height: 1.3em; margin: 0; padding: 0; padding-top: 5px; text-transform: capitalize; border: none;">Acreditaciones y reconocimientos a nivel nacional e internacional</h2>
                </div>
            </div>
              
            
            <?php foreach ($acredicaciones as $item_acredicaciones): ?>
                
                

                <div class="col-12 col-md-3">
                    <div class="" style="text-align: center;">
                        <div style="min-height:300px;display: flex;align-items: center;justify-content: center;">
                            <img class="card-img-top" src="<?= $item_acredicaciones["imagen_acreditacion"]?>" style="width: 80%;max-width: 200px;">
                        </div>
                            
                        <div style="text-align:center;">
                            <h3 style="margin-bottom: 15px;color: #002D72;font-size: 23px;font-weight:bold;"><?= $item_acredicaciones["titulo_acreditacion"]?></h3>
                            <p class=""><?= $item_acredicaciones["info_acreditacion"]?></p>
                            
                        </div>
                    </div>
                </div>




            <?php endforeach ?>


            
        </div>
    </div>
</section>






<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 pt-3 pb-3">
                <div style="display: inline-flex;">
                    <img decoding="async" style="height: 64px;width: auto;" src="https://www.lacardio.org/wp-content/uploads/2024/01/icono-corazon.png" alt="Icono Corazon ">
                    <h2 style="color: #002d72; font-size: 2rem; font-weight: bold; line-height: 1.3em; margin: 0; padding: 0; padding-top: 5px; text-transform: capitalize; border: none;">Algunos de nuestros convenios</h2>
                </div>
            </div>


            
            
        </div>
    </div>
</section>


<section class=" mb-5">
        <div class="container">
            <div class="row">

            <?php foreach ($convenios as $item_convenios): ?>
                
                <div class="col-3 col-md-1" style="display: flex;align-items: center;">
                      <img src="<?= $item_convenios["imagen_convenio"]?>" alt="">  
                </div>

            <?php endforeach ?>

               
            </div>
        </div>
</section>       



<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 pt-3 pb-3">
                <div style="display: inline-flex;">
                    <img decoding="async" style="height: 64px;width: auto;" src="https://www.lacardio.org/wp-content/uploads/2024/01/icono-corazon.png" alt="Icono Corazon ">
                    <h2 style="color: #002d72; font-size: 2rem; font-weight: bold; line-height: 1.3em; margin: 0; padding: 0; padding-top: 5px; text-transform: capitalize; border: none;">Contáctenos</h2>
                </div>
            </div>

            <div class="col-12 col-md-6">
                 <?= do_shortcode('[contact-form-7 id="1789" title="Centro Internacional - Proceso inscripción"]') ?>
            </div>     
            
            <div class="col-12 col-md-6">

            <div class="accordion accordion-flush" id="accordionFlushExample" style="background-color: #d3e7f2;">
  
  
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne" style="display: flex;align-items: center;background-color: #d3e7f2; padding: 10px; border-radius: 0 30px 0 0;  margin-bottom: 0;">
                    
                    <button style="color: #002d72;font-size: 22px;font-weight: bold;background-color: #d3e7f2;border-radius: 0 30px 0 0;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <img src="" alt="" style="height: 50px;background-color: #d3e7f2;margin-right: 10px;">    
                      Contacto
                    </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                       
                        <?= $info_contacto ?>             

                    </div>
                    </div>
                </div>


                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo" style="display: flex;align-items: center;background-color: #d3e7f2;  padding: 10px;  margin-bottom: 0;">
                    
                    <button style="color: #002d72;font-size: 22px;font-weight: bold;background-color: #d3e7f2;"  class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <img src="" alt="" style="height: 50px;background-color: #d3e7f2;margin-right: 10px;">    
                    Hotelería y transporte
                    </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?= $info_hoteleria_y_transporte ?>  
                       

                    </div>
                    </div>
                </div>


                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree" style="display: flex;align-items: center;background-color: #d3e7f2; padding: 10px;   margin-bottom: 0;">
                    
                    <button style="color: #002d72;font-size: 22px;font-weight: bold;background-color: #d3e7f2;"  class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    <img src="https://www.lacardio.org/wp-content/uploads/2024/01/tarjeta-de-identificacion-min.png" alt="" style="height: 50px;background-color: #d3e7f2;margin-right: 10px;">    
                    Documentos para su viaje
                    </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?= $info_documentos_para_su_viaje ?>  

                        
                    </div>
                    </div>
                </div>


                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFour" style="display: flex;align-items: center;background-color: #d3e7f2;  padding: 10px;  margin-bottom: 0;">
                    <button style="color: #002d72;font-size: 22px;font-weight: bold;background-color: #d3e7f2;"  class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    <img src="" alt="" style="height: 50px;background-color: #d3e7f2;margin-right: 10px;">    
                    Recomendaciones para su viaje
                    </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                         <?= $info_recomendaciones_para_su_viaje ?>  

                    </div>
                    </div>
                </div>


                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFive" style="display: flex;align-items: center;background-color: #d3e7f2; padding: 10px;   margin-bottom: 0;">
                    <button style="color: #002d72;font-size: 22px;font-weight: bold;background-color: #d3e7f2;"  class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                    <img src="" alt="" style="height: 50px;background-color: #d3e7f2;margin-right: 10px;">  
                    FAQs
                    </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?= $info_faqs ?> 

                    </div>
                    </div>
                </div>


                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingSeven" style="display: flex;align-items: center;background-color: #d3e7f2; padding: 10px;   margin-bottom: 0;">
                    <button style="color: #002d72;font-size: 22px;font-weight: bold;background-color: #d3e7f2;"  class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                    <img src="" alt="" style="height: 50px;background-color: #d3e7f2;margin-right: 10px;">    
                    Cómo llegar a La Cardio
                    </button>
                    </h2>
                    <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?= $info_como_llegar ?> 
                        
                    
                    </div>
                    </div>
                </div>




                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingSix" style="display: flex;align-items: center;background-color: #d3e7f2; padding: 10px; border-radius: 0 0 0 30px;  margin-bottom: 0;">
                    <button style="color: #002d72;font-size: 22px;font-weight: bold;background-color: #d3e7f2;border-radius: 0 0 0 30px;"  class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                    <img src="" alt="" style="height: 50px;margin-right: 10px;">
                    Formas de pago
                    </button>
                    </h2>
                    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?= $info_formas_de_pago ?> 

                        
                    </div>
                    </div>
                </div>



                </div>



            </div>   


        </div>
    </div>


</section>



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js'></script>


<script>
  var swiper = new Swiper(".swiper", {
effect: "coverflow",
grabCursor: true,
centeredSlides: true,
slidesPerView: "auto",
coverflowEffect: {
  rotate: 0,
  stretch: 0,
  depth: 100,
  modifier: 2,
  slideShadows: true
},
keyboard: {
  enabled: true
},
mousewheel: {
  thresholdDelta: 70
},
spaceBetween: 60,
loop: true,
autoplay: true,
pagination: {
  el: ".swiper-pagination",
  clickable: true
}
});
</script>




</main>

<?php
get_footer();