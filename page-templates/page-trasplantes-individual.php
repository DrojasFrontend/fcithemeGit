<?php 
/*
    Template Name: Trasplantes Individual
*/
$titulo = get_the_title();
$descripcion = get_the_content();
$foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
get_header();

/* ACF Variables */

$texto_banner = get_field('texto_banner');
$link_solicitar_cita = get_field('link_solicitar_cita');
$link_contactanos = get_field('link_contactanos');
$imagen_banner = get_field('imagen_banner');

$texto_reconocidos = get_field('texto_reconocidos');
$imagen_reconocidos = get_field('imagen_reconocidos');


$texto_educa = get_field('texto_educa');
$link_video_educa = get_field('link_video_educa');
$link_charla_educa = get_field('link_charla_educa');
$imagen_educa = get_field('imagen_educa');

$oferta_valor = get_field('oferta_valor');


$cursos = get_field('cursos');


$link_como_donar = get_field('link_como_donar');


$pretrasplante = get_field('pretrasplante');
$trasplante = get_field('trasplante');
$postrasplante = get_field('postrasplante');


$texto_equipo_multidisciplinario = get_field('texto_equipo_multidisciplinario');
$info_equipo_multidisciplinario = get_field('info_equipo_multidisciplinario');


$doctors_service = get_field('doctors_service');


$doctores = get_field('doctors_service');
$tabs = get_field('tabs-group');
$accordionId = get_field('id_acordeon');
$acordeon = get_field('items_acordeon');

?>



<style>
	.slick-initialized .slick-slide{
    	   width: 100% !important;
    }

    .soy-donante{
        background-image: url("https://www.lacardio.org/wp-content/uploads/2024/03/fondo.png");
        background-size: cover;
    background-repeat: no-repeat;
    }

    .boton-donante{height: 48px;min-width: 300px;text-decoration: none;background: #FFFFFF;border: 2px solid #D9D9D9;box-shadow: 0px 4px 4px rgba(5, 195, 222, 0.2);border-radius: 0px 15px;display: flex;
    align-items: center;color:#002D72;
    text-align: center;justify-content: center;width: 50%;font-family: Prompt;font-style: normal;font-weight: 600;font-size: 20px;line-height: 18px;
    }
    .boton-donante:hover{
        color:#002D72;
    }

    div .slick-track{
        display: inline-grid!important;
        
    }

    .image-doctor{
        border: 2px solid #05C3DE;
        border-radius: 50%;width: 100%;margin: 0 auto;
    }
    
    .titulo-banner{
        font-size: 36px;color: white;font-weight: 700;font-family: 'Prompt';line-height: 40px;
    }
    .contenedor-titulo-banner{
        display: flex;width: 30%;border-radius: 0px 133px 133px 0px;background-color: #00B388;padding-left: 3%;flex-direction: column;justify-content: center;
    }

    .contenedor-botones-banner{
        display: inline-flex;margin-top: -31px;position: relative;right: 13%;float: right;
    }
    .contenedor-boton-banner{
        display: flex;align-items: center;background: #FFFFFF;border-radius: 15px;width: 142.57px;height: 48px;justify-content: center;
    }

    .boton-banner{font-family: 'Prompt';font-style: normal;font-weight: 600;font-size: 16px;line-height: 18px;display: flex;align-items: center;text-align: center;text-decoration: none;color: #002D72;
    }

    .boton-banner:hover{
        color: #002D72;
    }



    .titulos-internos{
        color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;font-family: 'Prompt';letter-spacing: 0.5px;
    }
    .parrafos{
        font-size: 15px;line-height: 20px;font-family: 'prompt';font-weight: 300;}


    .contenedor-curso{
        box-sizing: border-box;background: #FFFFFF;border: 2px solid #D9D9D9;border-radius: 6px;
    }
    .texto-curso{    font-family: 'Prompt';font-style: normal;font-weight: 600!important;font-size: 16px;line-height: 18px;display: flex;align-items: center;text-align: center;justify-content: center;color: #002D72;margin: 0;padding: 15px;
margin: 0;padding: 15px;

    }


    .boton-educa{
        padding: 15px;background: rgba(228, 0, 70, 1);text-decoration: none;border-radius: 18px 0px 18px 0px;font-size: 18px;color: #fff;font-weight: 400;margin-right: 15px;text-align: center;width: 100%;
    }

    .boton-educa:hover{
        color: #fff;
    }

    .parrafos{
        font-family: 'Prompt';font-style: normal;font-weight: 300;font-size: 15px;line-height: 20px;color: #333333;

    }

    .banner-container{
        display: inline-flex;width: 100%;background-color: #93846a;
    }
    .contenedor-slider-doctor{
                display: inline-flex;
            }

    .contenedor-imagen-slider-doctor{
        width: 30%;
    }
    .contenedor-info-slider-doctor{
        width: 70%;text-align: left;display: flex;justify-content: center;flex-direction: column;
    }


        @media only screen and (max-width: 1400px) {
            
            .contenedor-titulo-banner{
                width: 40%; 
            }
        }

        @media only screen and (max-width: 980px) {
            
            .contenedor-titulo-banner{
                width: 50%; 
                padding: 50px;
                
            }
        }

        @media only screen and (max-width: 767px) {
            
            .contenedor-titulo-banner{
                width: 100%; border-radius: 0px;
            }
            .titulo-banner{
                width: 100%;
            }
            .banner-container{
                display: block;
            }
           
            .contenedor-slider-doctor{
                display: block;
            }
            .contenedor-info-slider-doctor,.contenedor-imagen-slider-doctor{
                width: 40%;text-align: center;
            }
            
            .slick-initialized .slick-slide {
                width: auto !important;
                margin: 0 auto;
            }
            
        }

        @media only screen and (max-width: 400px) {
            

            .contenedor-slider-doctor{
                display: unset;right: -90px;position: relative;
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



  
<!--
    <div class="banner-container">
        <div class="contenedor-titulo-banner">
            <h2 class="titulo-banner" style="width: 90%;"><?= $texto_banner ?></h2><br>
        
            <div style="display: inline-flex" class="contenedor-botones-banner">
                <div class=" contenedor-boton-banner" style="margin-right: 50px;">
                    <a href="<?= $link_solicitar_cita ?>" class="boton-banner">
                        Solicitar cita
                    </a>
                </div>
                <div class=" contenedor-boton-banner" >
                    
                    <a href="<?= $link_contactanos ?>" class="boton-banner">
                        Contactanos
                    </a>
                </div>
            </div>

        </div>
        <div class="contenedor-imagen-banner">
            <p><br><br></p>
        </div>
    </div>
-->
    <div >
        <?php if ($titulo) { ?> 
            <h1 class="sr-only"><?php echo $titulo ?></h1>
        <?php } ?>
        <img src="<?= $imagen_banner ?>" alt="" style="width:100%;">

        <div class="contenedor-botones-banner">
            <div class="contenedor-boton-banner" style="margin-right: 30px;">
                <a href="<?= $link_solicitar_cita ?>" class="boton-banner" >
                    Solicitar cita
                </a>
            </div>
            <div class="contenedor-boton-banner">
                <a href="<?= $link_contactanos ?>" class="boton-banner">
                    Contactanos
                </a>
            </div>
        </div>
   </div>
    



    <section class="mt-4 mb-5 " style="background: #def5f0;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 p-5">
                    <?php if ($texto_reconocidos) { ?>
                        <h2 style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;text-align: left;margin-bottom: 20px;"><?= $texto_reconocidos ?></h2>
                    <?php } ?>
                    <img src="<?= $imagen_reconocidos ?>" alt="" style="border-radius: 0px 0px 70px 0px;">
                </div>
                <div class="col-12 col-md-6 p-5">
                <h2 class="titulos-internos">NUESTRA OFERTA DE VALOR</h2>
                    <p class="parrafos">
                        <?= $oferta_valor ?>
                    </p>
                    
                </div>
            </div>
        </div>
    </section>
    

    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
            <h2 class="titulos-internos" style="text-align:center;color:#E40046!important;">CURSOS</h2>
                <?php foreach ($cursos as $item_cursos): ?>
                    <div class="col-12 col-md-3 mt-2 mb-2">
                      <a style="text-decoration: none!important;" href="<?= $item_cursos["link_curso"]?>">
                        <div class="contenedor-curso">
                            <h3 class="texto-curso">
                                <?= $item_cursos["texto_curso"]?> 
                            </h3>
                        </div>
                      </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>   


    <section class="mt-5 mb-5 " style="background-color:#fff;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 pt-5 pb-5">
                    <h2 class="titulos-internos" style="text-align:Center;margin-bottom:15px;"> Educación al Paciente</h2>
                    <p style="text-align:Center;padding-bottom:15px;" class="parrafos"><?= $texto_educa ?></p>
                   

                    <div style="display: inline-flex; width: 100%;margin-top:20px;">
                        <div class=" contenedor-boton-banner" style="width: 50%;margin-right: 30px;">
                            <h3>
                                <a href="<?= $link_video_educa ?>" class="boton-educa">
                                    Videos Educativos
                                </a>
                            </h3>
                        </div>
                        <div class=" contenedor-boton-banner" style="width: 50%;">
                            <h3> 
                                <a href="<?= $link_charla_educa ?>" class="boton-educa">
                                    Charlas Educativas
                                </a>
                            </h3>
                        </div>
                    </div>


                </div>
                <div class="col-12 col-md-6 p-5" style="padding-top: 0px!important;">
                    
                    <img src="<?= $imagen_educa ?>" alt="" style="border-radius:30px;width: 100%;">
                </div>
            </div>
        </div>
    </section>






    <section class=" mb-5 p-3" style="background-color: #fff;">
    <h2 class="pb-5" style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;text-align: center;">Modelo de atención Centrado en el paciente y su familia</h2>
         
        <div class="container">
             
            <div class="row" style="border: 1px solid #05C3DE;border-radius: 15px;">
              <div class="col-12 col-md-4 p-4" style="padding-right: 0!important;">
                    <div style="border-right: 2px solid #05C3DE;padding-right: 30px;">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h3 class="accordion-header"  id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <span style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;text-align: center;">
                                Pretrasplante
                                </span>    
                            </button>
                            </h3>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"> <?= $pretrasplante ?></div>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 p-4" style="padding-right: 0!important;">
                    <div style="border-right: 2px solid #05C3DE;padding-right: 30px;">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h3 class="accordion-header"  id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseDos" aria-expanded="false" aria-controls="flush-collapseOne">
                                <span style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;text-align: center;">
                                Trasplante
                                </span>    
                            </button>
                            </h3>
                            <div id="flush-collapseDos" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"> <?= $trasplante ?></div>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 p-4" style="padding-right: 0!important;">
                    <div style="border-right: 2px solid #05C3DE;padding-right: 30px;">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h3 class="accordion-header"  id="flush-headingTres">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTres" aria-expanded="false" aria-controls="flush-collapseOne">
                                <span style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;text-align: center;">
                                Postrasplante
                                </span>    
                            </button>
                            </h3>
                            <div id="flush-collapseTres" class="accordion-collapse collapse" aria-labelledby="flush-headingTres" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"> <?= $postrasplante ?></div>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <section class="soy-donante mb-5 p-5" style="background-color: #fff;">    
        <div class="container">
             <div class="row">
                    <div class="col-12 col-md-6">
                        <img src="https://www.lacardio.org/wp-content/uploads/2024/03/soy_donante.png" alt="" style="width: 100%;">
                    </div>
                    <div class="col-12 col-md-6">
                        <p style="text-align: center;padding: 20px;font-weight: 300;font-size: 20px;">¡Dale vida a la esperanza! En LaCardio, cada donante de órganos es un heroe. Obtén más información para ser donante aquí. </p>
                        <div style="display: flex;justify-content: center;">
                            <a href="<?= $link_como_donar ?>" class="boton-donante">¿Cómo ser donante?</a>
                        </div>

                    </div>
             </div>
        </div>
    </section>

  



   <section style="background-color:#fff;" class="pt-1">
   
    <div class="container pt-5 pb-5">
    <h2 class="pb-3" style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;text-align: center;">Un equipo multidisciplinario experto</h2>
        <div class="row">
        <div class="col-12 col-md-6">
                <div class="servicios__cuerpo">
                
                <div class="servicios__content" style="width: 100%!important;">
                
                    <div class="servicios__content__doctores">
                        <div class="slider_doctores" style="display: inline-grid!important;">
                            <?php foreach($doctores as $doctor): ?>
                                <div class="slide_doctor" style="min-width: 100%!important;text-align: center;width: 100%!important;">
                                    <a href="<?= $doctor->guid ?>">
                                        
                                            <div class="contenedor-slider-doctor">
                                                <div class="p-2 contenedor-imagen-slider-doctor">
                                                    <?php if(isset(get_field('image_doctor', $doctor->ID)["url"])): ?>
                                                        <img class="image-doctor" src="<?= get_field('image_doctor', $doctor->ID)["url"] ?>" alt="<?= get_field('image_doctor', $doctor->ID)["alt"] ?>">
                                                    <?php else: ?>
                                                        <img  class="image-doctor" src="/wp-content/uploads/2023/05/doctor-hombre.png" alt="<?= $doctor->post_title ?>">
                                                    <?php endif ?>
                                                </div>
                                                <div  class="p-2 contenedor-info-slider-doctor">
                                                    <h3 style="color:#002D72;font-size:20px;font-weight:600;text-transform: uppercase;">Dr. <?= $doctor->post_title ?></h3>
                                                    <p style="color:#717C7D;font-size:15px;font-weight:500;"><?= get_field('specialties_doctor', $doctor->ID) ?><br>
                                                        <strong>Idiomas:</strong> Español, Inglés
                                                    </p>
                                                </div>
                                            </div>
                                    </a>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    
                </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div style="background-color:#def5f0;border-radius: 15px 0 0 15px;padding: 40px;">
                    <p style="margin:0;">
                        <?= $texto_equipo_multidisciplinario ?>
                    </p>                                     
                </div> 
                  
                 <div class="pt-4">
                    <?= $info_equipo_multidisciplinario ?>
                </div>                                     
            </div>
            
        </div>
    </div>

   </section>                    

<section class="mt-5 mb-5 " style="background-color:#fff;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 pt-5 pb-5" style="    display: block;align-content: center;">
                    <h2 class="titulos-internos" style="text-align:Center;margin-bottom:15px;"> Conoce las enfemedades que puedes padecer</h2>
                    

                    <div style="display: inline-flex; width: 100%;">
                        <div class=" contenedor-boton-banner" style="width: 100%;">
                            <a target="_blank" href="https://www.lacardio.org/wp-content/uploads/2024/08/Rotafolio-trasplantes-Medico.pdf" class="boton-educa" data-wpel-link="internal" style="width: 60%;margin-top: 50px;">
                                Aprende más
                            </a>
                        </div>
                        
                    </div>


                </div>
                <div class="col-12 col-md-6 p-5" style="padding-top: 0px!important;">
                    
                    <img src="https://www.lacardio.org/wp-content/uploads/2024/08/aprende-de-enfermedades.png" alt="" style="border-radius:30px;width: 100%;">
                </div>
            </div>
        </div>
    </section>


   
   <section class="mt-5 mb-5" id="solicitar-cita">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 pb-3">
                <h2 style="color: #00266e;font-weight: bold;font-size: 1.7rem;margin-bottom: 1rem; text-align: center;"><strong>¿Eres profesional de la salud, quieres ser un donante o necesitas un trasplante?</strong> Ponte en contacto con nosotros por medio de nuestro formulario:
                </h2>
            </div>
            <div class="col-12 col-md-6" style="border-radius: 25px;border: 1px solid #D9D9D9;padding: 1.5rem; margin:0 auto;">
            
            <?php echo do_shortcode('[contact-form-7 id="9049" title="Formulario contacto trasplantes"]  '); ?>
            </div>
        </div>            
    </div>



   </section>
                                            
                                          



	
</main>




<?php  get_footer(); ?>