<?php 
/*
    Template Name: Chequeo Medico Empresarial
*/
$titulo = get_the_title();
$descripcion = get_the_content();
$foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
get_header();

/* ACF Variables */


$banner = get_field('banner');
$titulo_banner = get_field('titulo_banner');


$texto_consiste = get_field('texto_consiste');
$link_boton_consiste = get_field('link_boton_consiste');
$imagen_consiste = get_field('imagen_consiste');

$titulo_tarifas = get_field('titulo_tarifas');
$tarifa_mujer = get_field('tarifa_mujer');
$imagen_tarifas_1 = get_field('imagen_tarifas_1');
$imagen_tarifas_2 = get_field('imagen_tarifas_2');
$tarifa_hombre = get_field('tarifa_hombre');



$imagen_servicios_1 = get_field('imagen_servicios_1');
$titulo_servicios_1 = get_field('titulo_servicios_1');
$parrafo_servicios_1 = get_field('parrafo_servicios_1');
$imagen_servicios_2 = get_field('imagen_servicios_2');
$titulo_servicios_2 = get_field('titulo_servicios_2');
$parrafo_servicios_2 = get_field('parrafo_servicios_2');

$imagen_servicios_3 = get_field('imagen_servicios_3');
$titulo_servicios_3 = get_field('titulo_servicios_3');
$parrafo_servicios_3 = get_field('parrafo_servicios_3');

$imagen_servicios_4 = get_field('imagen_servicios_4');
$titulo_servicios_4 = get_field('titulo_servicios_4');
$parrafo_servicios_4 = get_field('parrafo_servicios_4');

$imagen_opcionales_1 = get_field('imagen_opcionales_1');
$parrafo_opcionales_1 = get_field('parrafo_opcionales_1');

$imagen_opcionales_2 = get_field('imagen_opcionales_2');
$parrafo_opcionales_2 = get_field('parrafo_opcionales_2');

$imagen_opcionales_3 = get_field('imagen_opcionales_3');
$parrafo_opcionales_3 = get_field('parrafo_opcionales_3');


$imagen_chequeo = get_field('imagen_chequeo');
$info_examen_laboratorio = get_field('info_examen_laboratorio');
$info_valoracion_especialista = get_field('info_valoracion_especialista');
$info_examen_diagnostico = get_field('info_examen_diagnostico');


$imagen_chequeo_hombre = get_field('imagen_chequeo_hombre');
$info_examen_laboratorio_hombre = get_field('info_examen_laboratorio_hombre');
$info_valoracion_especialista_hombre = get_field('info_valoracion_especialista_hombre');
$info_examen_diagnostico_hombre = get_field('info_examen_diagnostico_hombre');


$imagen_1_chequeo_empresa = get_field('imagen_1_chequeo_empresa');
$imagen_2_chequeo_empresa = get_field('imagen_2_chequeo_empresa');
$texto_chequeo_empresa = get_field('texto_chequeo_empresa');
$texto_chequeo_espacio_vip = get_field('texto_chequeo_espacio_vip');
$texto_chequeo_agendamiento = get_field('texto_chequeo_agendamiento');
$texto_chequeo_comunicacion_interna = get_field('texto_chequeo_comunicacion_interna');



$doctores = get_field('doctors_service');
$tabs = get_field('tabs-group');
$accordionId = get_field('id_acordeon');
$acordeon = get_field('items_acordeon');

?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css'>
<style>


#chequeo-mujer, #chequeo-hombre{
    display: none;
}


/*SLIDERRRRR SERVICIOSSSSS*/

.doctores-cardio-patias .swiper {width: 100%;padding-top: 50px;padding-bottom: 50px;
}

.doctores-cardio-patias .swiper-slide {width: calc(100% / 4);height: auto;border-radius: 10px;display: flex;
    flex-direction: column; justify-content: flex-start;
    align-items: center;
    flex-wrap: nowrap;background-color: #f0f0f0;
}

.doctores-cardio-patias .swiper-slide-active {
  filter: blur(0px);
}

.doctores-cardio-patias .swiper-pagination-bullet,
.doctores-cardio-patias .swiper-pagination-bullet-active {
  background: #000;
}




.doctores-cardio-patias .swiper-slide h2 {
    margin-bottom: 15px;text-align: center;

    color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;padding-top: 10px;
}

.doctores-cardio-patias .swiper-slide p {color: #002d72;
    font-weight: 300;
    font-size: 19px;text-align: center;font-weight: 500;
}




.doctores-cardio-patias .swiper-3d .swiper-slide-shadow-left,
.doctores-cardio-patias .swiper-3d .swiper-slide-shadow-right {
  background-image: none;
}
    /*SLIDERRRRR SERVICIOSSSSS*/




    .contenedor-tarifas-chequeo{
  position: absolute;
}


@media only screen and (max-width: 768px) {

    .doctores-cardio-patias .swiper-slide {width: 300px;}

    .h1-banner{
    font-size: 2rem!important;
}

  .contenedor-tarifas-chequeo{
    position: initial;
      width: 100%!important;
      padding: 15px;
  }
  .contenedor-tarifas-chequeo h2{
    text-align: center!important;
  }
  .contenedor-tarifas-chequeo p{
    text-align: center!important;
  }
  .contenedor-boton-chequeo {
    text-align: center;
    margin: 0 auto;
  }
  .boton-tarifa-mujer{
    float: none!important;
  }


  .boton-tarifa-mujer div{
    margin: 0 auto!important;
  }
}

.contenedor-individual-genero{
        width: 50%;
    }
.contenedor-paquete-chequeo{
    display: flex;align-items: center;
}

@media only screen and (max-width: 1200px) {
    .contenedor-individual-genero{
        width: 100%;;margin-bottom: 15px;
    }
    .contenedor-paquete-chequeo{
    display: block!important;
}
}

#contenidoChequeo1,#contenidoChequeo2{
    display: none;
}




@media only screen and (max-width: 400px) {
    .h1-banner{
    font-size: 1.5rem!important;width: 80% !important;
}

.banner{border-radius:0px 0px 0px 0px !important;}
}


 
.h1-banner{
    text-shadow: 2px 2px 2px #000;text-align: center;width: 100%;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);font-weight: 900;color: white;font-size: 3rem;
}

.banner{width: 100%; border-radius:0px 0px 80px 80px;display: block;max-width: 100%;height: auto;}
 
</style>
<script>


function mostrarContenido(num) {
  // Ocultar todos los contenidos
  document.getElementById("contenido1").style.display = "none";
  document.getElementById("contenido2").style.display = "none";
  document.getElementById("contenido3").style.display = "none";

  // Mostrar el contenido correspondiente al botón clicado
  document.getElementById("contenido" + num).style.display = "block";
}


function mostrarContenidoHombre(num) {
  // Ocultar todos los contenidos
  document.getElementById("contenidoHombre1").style.display = "none";
  document.getElementById("contenidoHombre2").style.display = "none";
  document.getElementById("contenidoHombre3").style.display = "none";

  // Mostrar el contenido correspondiente al botón clicado
  document.getElementById("contenidoHombre" + num).style.display = "block";
}


function mostrarTarifa(num) {
  // Ocultar todos los contenidos
  document.getElementById("contenidoChequeo1").style.display = "none";
  document.getElementById("contenidoChequeo2").style.display = "none";

  // Mostrar el contenido correspondiente al botón clicado
  document.getElementById("contenidoChequeo" + num).style.display = "block";
}



</script>
<main class="cardiou--container">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php the_content() ?>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12" style=" position: relative;display: inline-block;">
                <img src="<?= $banner ?>" alt="" class="banner">
                <h1 class="h1-banner"><?= $titulo_banner ?></h1>
            </div>
        </div>
    </div>

    <section class="mt-2 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 pt-5">
                    <h2 style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;">¿En qué consiste?</h2>
                    <div style="width: 80%;margin: 0 auto;color: #002D72;margin-top: 30px;">
                        <?= $texto_consiste ?>
                        <a href="<?= $link_boton_consiste ?>" style="text-decoration: none!important;">
                            <p style="width: 300px;background-color: #e6264e;padding: 10px;text-align: center;border-radius: 0 15px;color: white;font-weight: bold;font-size: 0.9rem;">
                            Solicita un chequeo
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 p-5" style="text-align: center;">
                    <img src="<?= $imagen_consiste ?>" style="width: 90%;" alt="" style="border-radius: 0 0 80px;">
                </div>
            </div>
        </div>
    </section>
    
<!----------------- --------  SECCION PARA EMPRESAS   ---------------------------------->


<section class="mt-2 mb-5">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-5" style="text-align: center;">
                <img src="<?= $imagen_1_chequeo_empresa ?>" style="width: 80%;float: left;margin-bottom: -20px;z-index: 999;position: sticky;" alt="" style="border-radius: 0 0 80px;">
                <img src="<?= $imagen_2_chequeo_empresa ?>" style="width: 80%;float: right;" alt="" style="border-radius: 0 0 80px;">
            </div>

            <div class="col-12 col-md-7 pt-5">
                <h2 style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;">¿Por qué hacer un Chequeo para la empresa? </h2>
                <div style="width: 90%;margin: 0 auto;color: #002D72;margin-top: 30px;">
                    <?= $texto_chequeo_empresa ?>
                    
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class="mt-2 mb-5">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-4 pt-5" style="text-align: center;">
                
                <div style="display: inline-flex;">
                    <img src="https://www.lacardio.org/wp-content/uploads/2024/02/icono-corazon-2.png" alt="" style="width: auto;height: 30px;">
                    <h2 style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;">Espacios VIP</h2>
                    
                </div>


                <div style="text-align: center;margin: 0 auto;color: #002D72;">
                    <?= $texto_chequeo_espacio_vip ?>
                    
                </div>
            </div>

            <div class="col-12 col-md-4 pt-5" style="text-align: center;">
                
                <div style="display: inline-flex;">
                    <img src="https://www.lacardio.org/wp-content/uploads/2024/02/icono-corazon-2.png" alt="" style="width: auto;height: 30px;">
                    <h2 style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;">Facilidad de Agendamiento</h2>
                    
                </div>


                <div style="text-align: center;margin: 0 auto;color: #002D72;">
                    <?= $texto_chequeo_agendamiento ?>
                    
                </div>
            </div>


            <div class="col-12 col-md-4 pt-5" style="text-align: center;">
                
                <div style="display: inline-flex;">
                    <img src="https://www.lacardio.org/wp-content/uploads/2024/02/icono-corazon-2.png" alt="" style="width: auto;height: 30px;">
                    <h2 style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;">Apoyo en comunicación interna</h2>
                    
                </div>


                <div style="text-align: center;margin: 0 auto;color: #002D72;">
                    <?= $texto_chequeo_comunicacion_interna ?>
                    
                </div>
            </div>
            
        </div>
    </div>
</section>




<!----------------- --------  SECCION PARA EMPRESAS   ---------------------------------->

<!---
    <section >
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 mb-3" style="text-align: center;">
                    <div style="display: inline-flex;">
                        <img src="https://www.lacardio.org/wp-content/uploads/2024/02/icono-corazon-2.png" alt="" style="width: auto;height: 30px;">
                        <h2 style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;"><?= $titulo_tarifas ?></h2>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
    </section>

    <section class=" mb-5" >
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3" style="position:relative;">
                    <div class="contenedor-tarifas-chequeo" style="bottom: 0px;width: 90%;">
                        <h2 style="color: #002D72;font-weight: 600;font-size: 24px;line-height: 30px;text-align: right;">Tarifa mujer</h2>
                        <p style="color: #002D72;font-weight: 600;font-size: 24px;line-height: 30px;text-align: right;">$<?= $tarifa_mujer ?></p>

                        <button class="boton-tarifa-mujer" style="text-decoration: none!important;float: right;border: none;background-color: transparent;" onclick="mostrarTarifa(1)">
                            <div style="border: 1px solid #e6264e;border-radius: 12px;background-color: #f8f8f9;height: 37px;width: 200px;">
                                <p class="contenedor-boton-chequeo" style="color: #e6264e;font-size: 15px;font-weight: 600;padding: 5px;margin: 0;padding-left: 20px;text-transform: uppercase;margin-top: 2px;">
                                    
                                    <i style="font-weight: bold;color: #e6264e;float: left!important;margin-top: 4px;" class="fa fa-chevron-left"></i>
                                    <span style="float: right;color: #e6264e;font-size: 15px;font-weight: 600;padding: 5px;margin: 0;padding-left: 20px;text-transform: uppercase;margin-top: 0px;padding-top:0px;">Conoce más</p></span>
                            </div>
                        </button>
                    </div>
                    
                </div>
                <div class="col-12 col-md-3 ">
                    <img src="<?= $imagen_tarifas_1 ?>" style="width:100%;" alt="">
                </div>
                <div class="col-12 col-md-3 ">
                    <img src="<?= $imagen_tarifas_2 ?>" style="width:100%;" alt="">
                </div>
                <div class="col-12 col-md-3" style="position:relative;">
                    <div class="contenedor-tarifas-chequeo" style="bottom: 0px;">
                        <h2 style="color: #002D72;font-weight: 600;font-size: 24px;line-height: 30px;">Tarifa hombre</h2>
                        <p style="color: #002D72;font-weight: 600;font-size: 24px;line-height: 30px;">$<?= $tarifa_hombre ?></p>

                        <button class="boton-tarifa-mujer" style="text-decoration: none!important;border: none;background-color: transparent;" onclick="mostrarTarifa(2)">
                            <div style="border: 1px solid #e6264e;border-radius: 12px;background-color: #f8f8f9;height: 37px;width: 200px;" >
                                <p class="contenedor-boton-chequeo" style="color: #e6264e;font-size: 15px;font-weight: 600;padding: 5px;margin: 0;padding-left: 20px;text-transform: uppercase;margin-top: 2px;">
                                    Conoce más
                                    <i style="font-weight: bold;color: #e6264e;float: right;margin-right: 10%;margin-top: 4px;" class="fa fa-chevron-right"></i>
                                </p>
                            </div>
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
-->

    
<!--- CHEQUEO  MUJER -->
    
<!---
<section id="contenidoChequeo1" class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 mb-3 contenedor-paquete-chequeo">
                    <div style="background-color: #f0f0f0;border-radius: 0 30px 30px 0;padding: 20px;text-align: center" class="contenedor-individual-genero">
                        <img src="<?= $imagen_chequeo ?>" alt="" style="text-decoration: none;">
                        <div style=" display: inline-flex;align-items: center;">
                                <img decoding="async" src="https://www.lacardio.org/wp-content/uploads/2024/01/Titulo1.png" style="height: 64px;width: auto;" alt="">
                                <h2 style="color: #002d72;font-size: 1.3rem;font-weight: bold;line-height: 1.3em;padding: 0 4px;-webkit-text-decoration: none solid #002d72;text-decoration: none solid #002d72;text-align: left;margin-bottom: 0;    margin-top: 12px;">
                                Paquete Chequeo Médico Mujer
                                </h2>
                        </div>
                    </div>

                    <div  class="contenedor-individual-genero" style="text-align: center;">
                        <button onclick="mostrarContenido(1)" style="text-decoration: none;border: none;background: none;width: 100%;"> 
                            <div style="border: 1px solid #B9C0C0;border-radius: 16px;background-color: #f8f8f9;height: 55px;padding-top: 10px;width: 100%;min-width: 359px;margin-bottom: 9px;">
                                    <p class="contenedor-boton-chequeo" style="color: #002D72;font-size: 15px;font-weight: 600;padding: 5px;margin: 0;padding-left: 20px;text-transform: uppercase;margin-top: 2px;">
                                    Examenes diagnósticos
                                        <i style="font-weight: bold;color: #e6264e;float: right;margin-right: 10%;margin-top: 4px;" class="fa fa-chevron-right"></i>
                                    </p>
                            </div>
                        </button>
                        
                        <button onclick="mostrarContenido(2)" style="text-decoration: none;border: none;background: none;width: 100%;">
                            <div style="border: 1px solid #B9C0C0;border-radius: 16px;background-color: #f8f8f9;height: 55px;padding-top: 10px;width: 100%;  min-width: 359px;  margin-bottom: 9px;">
                                    <p class="contenedor-boton-chequeo" style="color: #002D72;font-size: 15px;font-weight: 600;padding: 5px;margin: 0;padding-left: 20px;text-transform: uppercase;margin-top: 2px;">
                                    Examenes de laboratorio
                                        <i style="font-weight: bold;color: #e6264e;float: right;margin-right: 10%;margin-top: 4px;" class="fa fa-chevron-right"></i>
                                    </p>
                            </div>
                        </button>



                        <button onclick="mostrarContenido(3)" style="text-decoration: none;border: none;background: none;width: 100%;">
                            <div style="border: 1px solid #B9C0C0;border-radius: 16px;background-color: #f8f8f9;height: 55px;padding-top: 10px;width: 100%;  min-width: 359px;  margin-bottom: 9px;">
                                    <p class="contenedor-boton-chequeo" style="color: #002D72;font-size: 15px;font-weight: 600;padding: 5px;margin: 0;padding-left: 20px;text-transform: uppercase;margin-top: 2px;">
                                    Valoraciones por especialistas
                                        <i style="font-weight: bold;color: #e6264e;float: right;margin-right: 10%;margin-top: 4px;" class="fa fa-chevron-right"></i>
                                    </p>
                            </div>
                        </button>


                        


                    </div>


                    </div>
                   

                <div class="col-12 col-md-5" style="display: flex;align-items: center;">
                 
                  <div id="contenido1"  >
                    <h2 style="color: #002d72;font-size: 1.3rem;font-weight: bold;line-height: 1.3em;padding: 0 4px;-webkit-text-decoration: none solid #002d72;text-decoration: none solid #002d72;text-align: left;margin-bottom: 0;    margin-top: 12px;">
                    Examenes diagnósticos</h2>
                  <?= $info_examen_diagnostico ?>  
                    
                  </div>

                  <div id="contenido2" style="display: none;" >
                    <h2 style="color: #002d72;font-size: 1.3rem;font-weight: bold;line-height: 1.3em;padding: 0 4px;-webkit-text-decoration: none solid #002d72;text-decoration: none solid #002d72;text-align: left;margin-bottom: 0;    margin-top: 12px;">
                    Examenes de laboratorio</h2>
                  <?= $info_examen_laboratorio ?>  
                    
                  </div>

                  <div id="contenido3" style="display: none;" >
                    <h2 style="color: #002d72;font-size: 1.3rem;font-weight: bold;line-height: 1.3em;padding: 0 4px;-webkit-text-decoration: none solid #002d72;text-decoration: none solid #002d72;text-align: left;margin-bottom: 0;    margin-top: 12px;">
                    Valoraciones por especialistas</h2>
                  <?= $info_valoracion_especialista ?>  
                    
                  </div>




                </div>
            </div>
        </div>
</section>
-->

<!--- CHEQUEO MUJER -->
    





<!--- CHEQUEO  HOMBRE -->
   

<!---
<section id="contenidoChequeo2" class="mb-5">
        <div class="container">
            <div class="row">
            <div class="col-12 col-md-5" style="display: flex;align-items: center;">
                 
                <div id="contenidoHombre1"  >
                    <h2 style="color: #002d72;font-size: 1.3rem;font-weight: bold;line-height: 1.3em;padding: 0 4px;-webkit-text-decoration: none solid #002d72;text-decoration: none solid #002d72;text-align: left;margin-bottom: 0;    margin-top: 12px;">
                    Examenes diagnósticos</h2>
                  <?= $info_examen_diagnostico_hombre ?>  
                    
                  </div>

                  <div id="contenidoHombre2" style="display: none;" >
                    <h2 style="color: #002d72;font-size: 1.3rem;font-weight: bold;line-height: 1.3em;padding: 0 4px;-webkit-text-decoration: none solid #002d72;text-decoration: none solid #002d72;text-align: left;margin-bottom: 0;    margin-top: 12px;">
                    Examenes de laboratorio</h2>
                  <?= $info_examen_laboratorio_hombre ?>  
                    
                  </div>

                  <div id="contenidoHombre3" style="display: none;" >
                    <h2 style="color: #002d72;font-size: 1.3rem;font-weight: bold;line-height: 1.3em;padding: 0 4px;-webkit-text-decoration: none solid #002d72;text-decoration: none solid #002d72;text-align: left;margin-bottom: 0;    margin-top: 12px;">
                    Valoraciones por especialistas</h2>
                  <?= $info_valoracion_especialista_hombre ?>  
                    
                  </div>


               </div>

                <div class="col-12 col-md-7 mb-3 contenedor-paquete-chequeo">
                    

                    <div  class="contenedor-individual-genero">
                        <button onclick="mostrarContenidoHombre(1)" style="text-decoration: none;border: none;background: none;width: 100%;"> 
                            <div style="border: 1px solid #B9C0C0;border-radius: 16px;background-color: #f8f8f9;height: 55px;padding-top: 10px;width: 100%;min-width: 359px;margin-bottom: 9px;">
                                    <p class="contenedor-boton-chequeo" style="color: #002D72;font-size: 15px;font-weight: 600;padding: 5px;margin: 0;padding-right: 20px;text-transform: uppercase;margin-top: 2px;text-align: right;">
                                    <i style="font-weight: bold;color: #e6264e;float: left;margin-left: 10%;margin-top: 4px;" class="fa fa-chevron-left"></i>
                                    Examenes diagnósticos
                                        
                                    </p>
                            </div>
                        </a>
                        
                        <button onclick="mostrarContenidoHombre(2)" style="text-decoration: none;border: none;background: none;width: 100%;">
                            <div style="border: 1px solid #B9C0C0;border-radius: 16px;background-color: #f8f8f9;height: 55px;padding-top: 10px;width: 100%;  min-width: 359px;  margin-bottom: 9px;">
                                    <p class="contenedor-boton-chequeo" style="color: #002D72;font-size: 15px;font-weight: 600;padding: 5px;margin: 0;padding-right: 20px;text-transform: uppercase;margin-top: 2px;text-align: right;">
                                    <i style="font-weight: bold;color: #e6264e;float: left;margin-left: 10%;margin-top: 4px;" class="fa fa-chevron-left"></i>
                                    Examenes de laboratorio
                                       
                                    </p>
                            </div>
                        </a>



                        <button onclick="mostrarContenidoHombre(3)" style="text-decoration: none;border: none;background: none;width: 100%;">
                            <div style="border: 1px solid #B9C0C0;border-radius: 16px;background-color: #f8f8f9;height: 55px;padding-top: 10px;width: 100%;  min-width: 359px;  margin-bottom: 9px;">
                                    <p class="contenedor-boton-chequeo" style="color: #002D72;font-size: 15px;font-weight: 600;padding: 5px;margin: 0;padding-right: 20px;text-transform: uppercase;margin-top: 2px;text-align: right;">
                                    <i style="font-weight: bold;color: #e6264e;float: left;margin-left: 10%;margin-top: 4px;" class="fa fa-chevron-left"></i>
                                    Valoraciones por especialistas
                                        
                                    </p>
                            </div>
                        </a>
                    </div>


                    <div style="background-color: #f0f0f0;border-radius:30px 0 0 30px;padding: 20px;text-align: center" class="contenedor-individual-genero">
                        <img src="<?= $imagen_chequeo_hombre ?>" alt="" style="text-decoration: none;">
                        <div style=" display: inline-flex;align-items: center;">
                                
                                <h2 style="color: #002d72;font-size: 1.3rem;font-weight: bold;line-height: 1.3em;padding: 0 4px;-webkit-text-decoration: none solid #002d72;text-decoration: none solid #002d72;text-align: left;margin-bottom: 0;    margin-top: 12px;">
                                Paquete Chequeo Médico Hombre
                                </h2>
                                <img decoding="async" src="https://www.lacardio.org/wp-content/uploads/2024/01/Titulo1.png" style="height: 64px;width: auto;" alt="">
                        </div>
                    </div>

                </div>
                   

                
            </div>
        </div>
</section>
-->

<!--- CHEQUEO HOMBRE -->





        <!-- SLIDER SERVICIOSSSSSSSSSSS -->
        <!--
<section class="container-fluid"  style="background-color: #f0f0f0;">
   <div class="doctores-cardio-patias container p-5">
        <div class="row">
                <div class="col-12 col-md-12 mb-3" style="text-align: left;">
                        <div style="display: inline-flex;">
                            <img src="https://www.lacardio.org/wp-content/uploads/2024/02/icono-corazon-2.png" alt="" style="width: auto;height: 30px;">
                            <h2 style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;">Servicios</h2>
                        </div>
                </div>
            </div>
                    
        <div class="swiper">
            <div class="swiper-wrapper">
            <div class="swiper-slide swiper-slide--one">
                    <img src="<?= $imagen_servicios_1 ?>" alt="" style="width:100%;">
                        <h2><?= $titulo_servicios_1 ?></h2>
                            <p>
                                <?= $parrafo_servicios_1 ?>
                            </p>
            </div>
            <div class="swiper-slide swiper-slide--two">
            <img src="<?= $imagen_servicios_2 ?>" alt="" style="width:100%;">
            <h2><?= $titulo_servicios_2 ?></h2>
                            <p>
                                <?= $parrafo_servicios_2 ?>
                            </p>
            </div>

            <div class="swiper-slide swiper-slide--three">
            <img src="<?= $imagen_servicios_3 ?>" alt="" style="width:100%;">
            <h2><?= $titulo_servicios_3 ?></h2>
                            <p>
                                <?= $parrafo_servicios_3 ?>
                            </p>
            </div>

            <div class="swiper-slide swiper-slide--four">
            <img src="<?= $imagen_servicios_4 ?>" alt="" style="width:100%;">
                        <h2><?= $titulo_servicios_4 ?></h2>
                            <p>
                                <?= $parrafo_servicios_4 ?>
                            </p>
            </div>

            
            </div>
        -->
            <!-- Add Pagination --><!--
            <div class="swiper-pagination"></div>
        </div>
   </div>
</section>
-->
    <!-- SLIDER SERVICIOSSSSSSSSSSS -->








    <!--
    <section style="background-color: #fff;">
        <div class="container p-5">
            <div class="row">
                <div class="col-12 col-md-12 mb-3" style="text-align: center;">
                    <div style="display: inline-flex;">
                        <img src="https://www.lacardio.org/wp-content/uploads/2024/02/icono-corazon-2.png" alt="" style="width: auto;height: 30px;">
                        <h2 style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;">Opcionales</h2>
                    </div>
                </div>


                <div class="col-12 col-md-4 text-center p-5">
                    <img src="<?= $imagen_opcionales_1 ?>" style="width: 100%;border-radius: 50%;" alt="" >
                    <p style="padding: 20px;color: #002D72;">
                        <?= $parrafo_opcionales_1 ?>
                    </p>
                </div>

                <div class="col-12 col-md-4 text-center p-5">
                    <img src="<?= $imagen_opcionales_2 ?>" style="width: 100%;border-radius: 50%;" alt="" >
                    <p style="padding: 20px;color: #002D72;">
                        <?= $parrafo_opcionales_2 ?>
                    </p>
                </div>


                <div class="col-12 col-md-4 text-center p-5">
                    <img src="<?= $imagen_opcionales_3 ?>" style="width: 100%;border-radius: 50%;" alt="" >
                    <p style="padding: 20px;color: #002D72;">
                        <?= $parrafo_opcionales_3 ?>
                    </p>
                </div>

                
            </div>
        </div>
    </section>

-->

    <section id="solicita-chequeo-medico" class="formulario mt-5 mb-5" >
    <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-10" style="border-radius: 25px;border: 1px solid #D9D9D9;padding: 1.5rem; margin:0 auto;">
                    <h2 style="color: #00266e;font-weight: bold;font-size: 1.7rem;margin-bottom: 1rem; text-align: center;">Solicite su chequeo médico personalizado</h2>
                    <div class="chequeo_medico--contenido__columnader--descrp">
                            <p>Para iniciar la reserva de un Chequeo Médico personalizado en el horario que más le convenga, puede darnos sus datos y día de preferencia aquí o puede contactarnos directamente a:</p>
                            <p>Teléfono: <a href="tel:6014894486" data-wpel-link="internal">6014894486</a> <br>
                            E-mail: <a href="mailto:chequeomedico@lacardio.org">chequeomedico@lacardio.org</a></p>
                        </div>
                    <?php echo do_shortcode('[contact-form-7 id="1937" title="Solicitar Chequeo Médico Personalizado"]'); ?>
                    </div>
                </div>            
            </div>
    </div>
    </section>

                 
<!--
   <section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
              <img src="https://www.lacardio.org/wp-content/uploads/2024/02/111.png" style="height:60px; width:auto;margin-bottom:20px;" alt="">   
              
              <h3 style="color:#002D72;font-size:20px;font-weight:600;text-transform: uppercase;">NUESTRAS REDES</h3>
              <p>
                <strong>Sede principal:</strong><br>
                LaCardio - Cl. 163a #13B-60
              </p>
              <p>
                <strong>Sede ambulatorio:</strong><br>
                LaCardio 102 - Av. Cra 19 #102-31
              </p>
            </div>

            <div class="col-12 col-md-4">
              <img src="https://www.lacardio.org/wp-content/uploads/2024/02/222.png" style="height:60px; width:auto;margin-bottom:20px;" alt="">   
              <h3 style="color:#002D72;font-size:20px;font-weight:600;text-transform: uppercase;">ESCRÍBENOS</h3>
              <p>
                <strong>PQRS:</strong><br>
                PQRS:fciquejas@lacardio.org
              </p>
              <p>
                <strong>Solicitud de historia clínica:</strong><br>
                resultados@cardioinfantil.org
              </p>        
              <p>
                <strong>Notificaciones judiciales:</strong><br>
                notificacionesjudiciales@lacardio.org
              </p> 
              <p>
                <strong>Radicación de factura electrónica: </strong><br>
                recepcionfacturaelectronica@lacardio.org
              </p>                              
            </div>

            <div class="col-12 col-md-4">
               <img src="https://www.lacardio.org/wp-content/uploads/2024/02/333.png" style="height:60px; width:auto;margin-bottom:20px;" alt="">      
               <h3 style="color:#002D72;font-size:20px;font-weight:600;text-transform: uppercase;">LÍNEAS DE ATENCIÓN</h3>
              <p>
                <strong>Teléfono:</strong><br>
                +57 601 6672720
              </p>
              <p>
                <strong>Línea gratuita nacional:</strong><br>
                01 8000 128 818
              </p>    
              <p>
                <strong>WhatsApp:</strong><br>
                +601 3173727840
              </p>                           
            </div>
        </div>
    </div>
   </section>
---->
                                          
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




<?php  get_footer(); ?>