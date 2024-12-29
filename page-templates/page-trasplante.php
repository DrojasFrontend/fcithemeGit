<?php 
        /*
            Template Name: Trasplante
        */
        $titulo = get_the_title();
        $descripcion = get_the_content();
        $foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
        get_header();

        /* ACF Variables */
        $banner = get_field('banner');
        $titulo_banner = get_field('titulo_banner');


        $texto_banner = get_field('texto_banner');
        $link_solicitar_cita = get_field('link_solicitar_cita');
        $imagen_banner = get_field('imagen_banner');


        $texto_nuestros_servicios = get_field('texto_nuestros_servicios');
        $imagen_nuestros_servicios = get_field('imagen_nuestros_servicios');

        $texto_reconocidos = get_field('texto_reconocidos');
        $imagen_reconocidos = get_field('imagen_reconocidos');
        $info_oferta_valor = get_field('info_oferta_valor');

        $imagen_diferencial = get_field('imagen_diferencial');
        $info_diferencial = get_field('info_diferencial');


        $trasplante_1 = get_field('trasplante_1');
        $trasplante_2 = get_field('trasplante_2');
        $trasplante_3 = get_field('trasplante_3');
        $trasplante_4 = get_field('trasplante_4');

        $link_trasplante_1 = get_field('link_trasplante_1');
        $link_trasplante_2 = get_field('link_trasplante_2');
        $link_trasplante_3 = get_field('link_trasplante_3');
        $link_trasplante_4 = get_field('link_trasplante_4');

        $doctores = get_field('doctors_service');
        $tabs = get_field('tabs-group');
        $accordionId = get_field('id_acordeon');
        $acordeon = get_field('items_acordeon');

        ?>
        <?= get_template_part('template-parts/content', 'breadcrumbs'); ?>


        <style>
        
        .slick-prev.home_slide5, .slick-next.home_slide5{
            color:#002d72!important;
        }


        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Dos columnas de igual ancho */
            grid-gap: 10px; /* Espacio entre las columnas */
        }




        /* Cambiar el orden de las columnas en pantallas móviles */
        @media screen and (max-width: 600px) {
            .grid-container {
                grid-template-columns: 1fr; /* Cambiar a una sola columna */
            }
            .item1 {
                grid-row: 1; /* Colocar en la primera fila */
            }
            .item2 {
                grid-row: 2; /* Colocar en la segunda fila */
            }
        }


        #donante-vivo{
            background: rgb(242 252 253);
            border-radius: 20px;
            padding: 30px;margin-bottom: 20px;
        }

        #donante-vivo h2,
        #donante-vivo h3,
        #donante-vivo h4{
            color:#05C3DE;
        }

        #mas-preguntas-frecuentes, #donante-vivo{
            display: none;
        }

        .soy-donante{
                
            display: flex;justify-content: center;background: rgb(242 252 253);height:130px;border-radius: 30px;margin-bottom: 20px;align-items: end;padding-bottom: 20px;
            }

            .boton-donante{height: 48px;min-width: 230px;text-decoration: none;display: flex;
                background: #FFFFFF;box-shadow: 0px 4px 4px rgba(5, 195, 222, 0.2);border-radius: 0px 15px;align-items: center;color:#05C3DE;text-align: center;justify-content: center;width: 50%;font-family: Prompt;font-style: normal;font-weight: 600;font-size: 20px;line-height: 18px;
            }

            .boton-donante:hover{
                color:#05C3DE;
            }

            .boton-frecuente{height: 48px;min-width: 300px;text-decoration: none;display: flex;margin:0 auto;align-items: center;color:#00266e;text-align: center;justify-content: center;width: 80%;font-family: Prompt;font-style: normal;font-weight: 600;font-size: 20px;line-height: 18px;background: #FFFFFF;
        border: 2px solid #D9D9D9;box-shadow: 0px 4px 4px rgba(5, 195, 222, 0.2);border-radius: 0px 15px;
            }

            .boton-frecuente:hover{
                color:#00266e;
            }




        .swiper-slide {
        width: 290px;height: 145px;border: 1px solid #D4DFDE;border-radius: 10px;display: flex;flex-direction: column;justify-content: center;align-items: self-start;background-color: #fff;
        }






        .swiper-slide p {
        color: #000;font-family: "Roboto", sans-serif;font-weight: 300;display: flex;align-items: center;text-align: center;padding: 0 20px 5px 20px;margin: 0;
        }


        .slide_doctor {
            width: 50%!important;
        }
        .slick-track{
            width: 100%!important;
        }


        .doctores-cardio-patias .swiper-3d .swiper-slide-shadow-left,
        .doctores-cardio-patias .swiper-3d .swiper-slide-shadow-right {
        background-image: none;

        }

            .boton-banner{display: block;width: 128.31px;font-family: 'Prompt';font-weight: 600;font-size: 16px;line-height: 18px;text-align: center;color: #00B388;text-decoration: none;
            }

            .boton-banner:hover{
                color: #00B388;
            }



            .titulo-banner{
                font-size: 36px;color: white;font-weight: 700;font-family: 'Prompt';line-height: 40px;
            }
        

            .contenedor-titulo-banner{
                display: flex;width: 30%;border-radius: 0px 133px 133px 0px;background-color: #00B388;padding-left: 3%;flex-direction: column;justify-content: center;
            }

            .contenedor-imagen-banner{
                width: 70%; 
                background-image: url('<?= $imagen_banner ?>');
                min-height:300px; background-position: center;background-repeat: no-repeat; background-size: cover;
            }
            .banner-container{
                display: inline-flex;width: 100%;background-color: #93846a;
            }

            .contenedor-boton-banner{
                display: flex;align-items: center;width: 142.57px;height: 48px;border-radius: 0px 0px 18px 0px;background-color: #ffffff;
            }
            .titulos-internos{
                color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;font-family: 'Prompt';letter-spacing: 0.5px;
            }
            .parrafos{
                font-size: 15px;line-height: 20px;font-family: 'prompt';font-weight: 300;}

                @media only screen and (max-width: 1400px) {
                    .contenedor-imagen-banner{
                        width: 60%; 
                    }
                    .contenedor-titulo-banner{
                        width: 40%; 
                    }
                }

                @media only screen and (max-width: 980px) {
                    .contenedor-imagen-banner{
                        width: 50%; 
                    }
                    .contenedor-titulo-banner{
                        width: 50%; 
                        padding: 50px;
                        
                    }
                }

                @media only screen and (max-width: 767px) {

                    .h1-banner{
                            font-size: 2rem!important;
                        }

                        .banner{
                            border-radius: 0px!important;
                        }
                    .contenedor-imagen-banner{
                        width: 100%; 
                        
                    }
                    .contenedor-titulo-banner{
                        width: 100%; border-radius: 0px;
                    }
                    .titulo-banner{
                        width: 100%;
                    }
                    .banner-container{
                        display: block;
                    }
                    .contenedor-botones-banner{
                        margin: 0 auto;
                    }
                    
                    .contenedor-slider-doctor{
                        display: block;
                    }
                    .contenedor-info-slider-doctor,.contenedor-imagen-slider-doctor{
                        width: 40%;text-align: center;
                    }
                    .contenedor-boton-banner{
                        margin: 0 auto;
                    }
                    
                }

                @media only screen and (max-width: 400px) {
                    

                    .contenedor-slider-doctor{
                        display: unset;right: -90px;position: relative;
                    }
                    .contenedor-boton-banner {
                        margin: 0 auto;
                    }
                                
                }






                @media only screen and (max-width: 400px) {
                .h1-banner{
                font-size: 1.5rem!important;width: 80% !important;
            }

.banner{border-radius:0px 0px 0px 0px !important;}
}



.h1-banner{
    text-shadow: 2px 2px 2px #000;
    text-align: center;
    width: 100%;
    position: absolute;
    top: 44%;
    left: 3%;
    font-weight: 900;
    color: white;
    font-size: 3rem;
    display: flex;font-family: 'Prompt';
}

.banner{width: 100%; border-radius:0px 0px 80px 80px;display: block;max-width: 100%;height: auto;}
        </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>




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


            <section class=" mb-5 p-3" style="border-bottom: 1px solid #05C3DE;max-width: 90% !important;margin: 0 auto;">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-3 col-sm-6" style="border-right: 1px solid #05C3DE;">
                            <a href="<?= $link_trasplante_1 ?>" style="text-decoration: none;">
                                <h2 style="color: #002D72;font-weight: bold;font-size: 17px;line-height: 26px;text-align: center;margin: 0;font-family: 'Prompt';">
                                <?= $trasplante_1 ?>
                                </h2>
                            </a>
                        </div>

                        <div class="col-12 col-md-3 col-sm-6" style="border-right: 1px solid #05C3DE;">
                            <a href="<?= $link_trasplante_2 ?>" style="text-decoration: none;">
                                <h2 style="color: #002D72;font-weight: bold;font-size: 17px;line-height: 26px;text-align: center;margin: 0;font-family: 'Prompt';">
                                    <?= $trasplante_2 ?>
                                </h2>
                            </a>
                        </div>

                        <div class="col-12 col-md-3 col-sm-6" style="border-right: 1px solid #05C3DE;">
                            <a href="<?= $link_trasplante_3 ?>" style="text-decoration: none;">
                                <h2 style="color: #002D72;font-weight: bold;font-size: 17px;line-height: 26px;text-align: center;margin: 0;font-family: 'Prompt';">
                                    <?= $trasplante_3 ?>
                                </h2>
                            </a>
                        </div>

                        <div class="col-12 col-md-3 col-sm-6">
                            <a href="<?= $link_trasplante_4 ?>" style="text-decoration: none;">
                                <h2 style="color: #002D72;font-weight: bold;font-size: 17px;line-height: 26px;text-align: center;margin: 0;font-family: 'Prompt';">
                                    <?= $trasplante_4 ?>
                                </h2>
                            </a>
                        </div>
                    
                    </div>
                </div>
            </section>








        <!--
            <div class="banner-container">
                <div class="contenedor-titulo-banner">
                    
                </div>
                <div class="contenedor-imagen-banner" >
                <h2 class="titulo-banner" ><?= $texto_banner ?></h2><br>
                    <div class=" contenedor-boton-banner" >
                        <a href="<?= $link_solicitar_cita ?>" class="boton-banner">
                            Solicitar cita
                        </a>
                    </div>
                </div>
            </div>
        --->


            <section class="mt-2 mb-5">
                <div class="container" style="background-color: #def5f0;">
                    <div class="row">
                        <div class="col-12 col-md-6 p-5" style="display: flex;align-items: center;">
                            <div>
                            <h2 class="titulos-internos" >NUESTRO SERVICIO</h2>
                            <p class="parrafos"><?= $texto_nuestros_servicios ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 p-5">
                            <img src="<?= $imagen_nuestros_servicios ?>" alt="" style="border-radius: 50px;">
                        </div>
                    </div>
                </div>
            </section>
            

            <section class="mt-5 mb-5 ">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 p-5">
                            <img src="<?= $imagen_reconocidos ?>" alt="" style="width: 100%;border-radius: 50px;">
                        </div>
                    
                        <div class="col-12 col-md-6 pt-5">
                            <h2 class="titulos-internos">NUESTRA OFERTA DE VALOR</h2>
                                <?= $info_oferta_valor ?>
                        </div>
                    </div>
                </div>
            </section>
            

            <section class="mt-5 mb-5 " >
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 pt-5">
                            <h2 class="titulos-internos">Nuestro diferencial:</h2>
                                <?= $info_diferencial ?>
                        </div>
                        <div class="col-12 col-md-6 p-5" style="background-color:#def5f0;display: flex;align-items: center;border-radius: 40px 0 0 40px;">
                            <div >
                                <img src="<?= $imagen_diferencial ?>" alt="" style="border-radius: 40px;">
                                <h2 style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;letter-spacing: -0.5px;text-align: center;padding-top: 30px;">
                                    <?= $texto_reconocidos ?>
                                </h2>
                            </div>
                                
                        </div>
                        
                    </div>
                </div>
            </section>


        

            
            <section style="background-color:#fff;" class="pt-1">
        
        <div class="container pt-5 pb-5">
        <h2 class="pb-3" style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;text-align:center;">HITOS RELEVANTES</h2>
            <div class="servicios__cuerpo">
                
                <div class="servicios__content" style="width: 100%!important;">
                
                    <div class="servicios__content__doctores">
                        <div class="slider_doctores">
                            
                                <div class="slide_doctor" style="min-width: 300px;text-align: center;">
                                    
                                    <div class="swiper-slide ">
                                            <img src="https://www.lacardio.org/wp-content/uploads/2024/02/trasplante-1.png" alt="" style="width:65px;margin: 0 auto;">
                                            <p>
                                                <strong>Primer trasplantador en Colombia (2022)</strong>
                                            </p>
                                        </div>
                                    
                                </div>
                                

                                <div class="slide_doctor" style="min-width: 300px;text-align: center;">
                                    <div class="swiper-slide">
                                            <img src="https://www.lacardio.org/wp-content/uploads/2024/02/trasplante-2.png" alt="" style="width:65px;margin: 0 auto;">
                                            <p>
                                                <strong>Primer trasplantador de hígado en Colombia</strong>
                                            </p>
                                        </div>
                                </div>

                                <div class="slide_doctor" style="min-width: 300px;text-align: center;">
                                    <div class="swiper-slide">
                                        <img src="https://www.lacardio.org/wp-content/uploads/2024/03/icono-10.png" alt="" style="width:65px;margin: 0 auto;">
                                            <p>
                                                <strong>Más de 300 trasplantes hepáticos pediátricos</strong>
                                            </p>
                                        </div>
                                    
                                </div>

                                <div class="slide_doctor" style="min-width: 300px;text-align: center;">
                                    <div class="swiper-slide">
                                            <img src="https://www.lacardio.org/wp-content/uploads/2024/02/trasplante-4.png" alt="" style="width:65px;margin: 0 auto;">
                                            <p>
                                                <strong> Único programa en Colombia con trasplante hepático de donante vivo adulto - adulto
                                                </strong>
                                            </p>
                                        </div>
                                    
                                </div>

                                <div class="slide_doctor" style="min-width: 300px;text-align: center;">
                                    <div class="swiper-slide ">
                                            <img src="https://www.lacardio.org/wp-content/uploads/2024/02/trasplante-2.png" alt="" style="width:65px;margin: 0 auto;">
                                            <p>
                                                <strong> Programa de trasplante de riñón adulto y pediátrico con donante vivo
                                                </strong>
                                            </p>
                                        </div>
                                    
                                </div>

                                <div class="slide_doctor" style="min-width: 300px;text-align: center;">
                                    <div class="swiper-slide">
                                            <img src="https://www.lacardio.org/wp-content/uploads/2024/02/trasplante-4.png" alt="" style="width:65px;margin: 0 auto;">
                                            <p>
                                                <strong>Programa de trasplante pulmonar de mayor crecimiento en el país</strong>
                                            </p>
                                        </div>
                                        
                                </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        </section> 




                <!--
        <section style="background-color:#f8f8f9;" class="pt-1">
        
            <div class="container pt-5 pb-5">
            <h2 class="pb-3" style="color: #002D72;font-weight: 600;font-size: 26px;line-height: 30px;">ESPECIALISTAS Y EQUIPO HUMANO</h2>
                <div class="servicios__cuerpo">
                    
                    <div class="servicios__content" style="width: 100%!important;">
                    
                        <div class="servicios__content__doctores">
                            <div class="slider_doctores">
                                <?php foreach($doctores as $doctor): ?>
                                    <div class="slide_doctor" style="min-width: 300px; text-align: center;">
                                        <a href="<?= $doctor->guid ?>">
                                            
                                                <div style="display:inline-flex;">
                                                    <div style="width:30%;" class="p-2">
                                                        <?php if(isset(get_field('image_doctor', $doctor->ID)["url"])): ?>
                                                            <img style="border-radius: 50%;width: 100%;border: 3px solid red;margin: 0 auto;" src="<?= get_field('image_doctor', $doctor->ID)["url"] ?>" alt="<?= get_field('image_doctor', $doctor->ID)["alt"] ?>">
                                                        <?php else: ?>
                                                            <img style="border-radius:50%;width: 100%;border: 3px solid red;margin: 0 auto;" src="/wp-content/uploads/2023/05/doctor-hombre.png" alt="<?= $doctor->post_title ?>">
                                                        <?php endif ?>
                                                    </div>
                                                    <div style="width:70%; text-align:left;"  class="p-2">
                                                        <h3 style="color:#002D72;font-size:20px;font-weight:600;text-transform: uppercase;"><?= $doctor->post_title ?></h3>
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

        </section>                    
                                                        -->

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
                                                        -->
                                                
      

            <section class="mt-5 " id="como-ser-donante">
                <div class="container">
                    <div class="row grid-container">
                        <div class="col-12 col-md-12 pt-5 pb-3 item item2">
                            <h2 class="titulos-internos" >¿Cómo ser donante de órganos y tejidos? </h2>
                            <p>
                            Puedes contarle tu deseo de ser donante a tus familiares y amigos más cercanos y registrarte en la página del Instituto Nacional de Salud www.ins.gov.co                           
                            </p>

                            <h2 class="titulos-internos">¿Quienes podemos ser donantes? </h2>
                            <p>
                                    Según la Ley 1805 del 2016, en Colombia, todos podemos ser donantes de órganos y tejidos sin importar edad, raza, sexo o creencia religiosa.
                            </p>

                            <h2 class="titulos-internos">¿Qué es la donación de órganos y tejidos?</h2>
                            <p>
                            Es la decisión voluntaria, generosa y altruista de ayudar a otras personas que necesitan un trasplante de órganos y/o tejidos para mejorar su calidad de vida o para tener una segunda oportunidad de vida.
                            </p>
                            <h2 class="titulos-internos">¿Qué es un trasplante?</h2>
                            <p>
                            Es el único tratamiento médico que consiste en sustituir un órgano o tejido crónicamente enfermo por otro que funciona apropiadamente.
                            </p>
                            <h2 class="titulos-internos">¿Qué órganos podemos donar?</h2>
                            <p>
                            Órganos, tejidos, corneas y tejido ocular, huesos y tendones. (Tras el fallecimiento)
                            </p>
                            <h2 class="titulos-internos">¿Cuándo se puede donar?</h2>
                            <p>
                            Se puede donar cuando se declara fallecimiento por muerte cerebral.  En vida también se pueden donar órganos o tejidos a un familiar enfermo, donando un riñón, una porción del hígado, sangre o médula ósea, según la necesidad de salud.
                            </p>
                            
                            <div class="mas-preguntas" style="margin-top: 60px;margin-bottom: 60px;">
                                    
                                    <button id="boton-mas-preguntas" class="boton-frecuente">Más preguntas frecuentes</button>
                            </div> 

                        </div>
                        <div class="col-12 col-md-12 p-5 item item1">
                        <h2 class="titulos-internos" style="text-align: center;">Tipos de donantes </h2>
                            
                            <div class="soy-donante" style="background-image: url('https://www.lacardio.org/wp-content/uploads/2024/03/fondo-boton.png');background-size: cover;background-repeat: no-repeat;">
                                    
                                    <button id="boton-donante-vivo" class="boton-donante" style="border:none!important;">Donante vivo</button>                        
                            </div>    
                           
                            <div  id="donante-vivo">
                                <h3 class="sr-only">Donante vivo</h3>
                            <h4 class="titulos-internos" >¿Qué significa ser un donante vivo de hígado? </h4>
                                        <p>Significa que usted donará voluntariamente un segmento de su hígado que luego será trasplantado en el paciente enfermo. Esto se realiza debido a que el trasplante hepático es la única solución para la enfermedad del paciente. Usted será sometido a un estudio completo y, de ser apto para la donación, será programado para cirugía. Usted será nuestro paciente por lo que será cuidado de la mejor manera.
                                       </p>

                                    <h4 class="titulos-internos" >¿Quién puede ser donante vivo? </h4>
                                        <p>
                                        Para ser donante vivo usted debe cumplir lo siguiente: 

                                        <ul>
                                            <li>
                                            Ser mayor de 18 años             
                                            </li>
                                            <li>
                                            Tener compatibilidad de grupo sanguíneo con el paciente
                                            </li>
                                            <li>
                                            Ser voluntario para la donación
                                            </li>
                                            <li>
                                            No estar en sobrepeso ni obesidad
                                            </li>
                                        </ul>
                                       </p>


                                    <h4 class="titulos-internos" >¿Qué significa ser un donante vivo de riñón? </h4>
                                        <p>Es la extracción de un riñón de una persona viva y la colocación en un receptor cuyos riñones ya no funcionan correctamente 
                                       </p>

                                    <h4 class="titulos-internos" > ¿Quien puede ser donante vivo de riñón?</h4>
                                        <p>Puede ser un familiar de primer y 1 y 2 grado de consanguinidad, amigo cercano o familiar no relacionado con deseo y voluntad de donar.  
                                       </p>

                            </div>
                              
                            <div class="soy-donante">
                                    <a href="" class="boton-donante">Donante fallecido</a>
                                    <h3 class="sr-only">Donante fallecido</h3>
                            </div>  


                        </div>
                        
                    </div>
                </div>
            </section>

            <section class=" mb-5" id="mas-preguntas-frecuentes" >
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-7  pb-3">
                            <h2 class="titulos-internos" >¿Qué significa muerte cerebral? </h2>
                            <p>
                            Es cuando el cerebro sufre un daño irreversible generando la pérdida definitiva de las funciones vitales; al cerebro ya no le llega sangre ni oxígeno y los órganos pueden funcionar durante pocas horas de manera artificial. Cuando a una persona se le diagnostica muerte cerebral significa que clínica y legalmente ha fallecido.
                            </p>

                            <h2 class="titulos-internos" > ¿Cómo se asignan y distribuyen los órganos y tejidos?</h2>
                            <p>
                            La asignación y distribución de órganos y tejidos obedece a criterios de compatibilidad, condiciones clínicas del receptor y tiempo en lista de espera. No hay distinción de edad, sexo, condición socioeconómica o religión.
                            </p>

                            <h2 class="titulos-internos" >¿Existe algún rango de edad para poder ser donante? </h2>
                            <p>
                            Todas las personas en Colombia, desde un niño hasta un adulto mayor pueden ser donantes. La donación se realiza bajo los criterios establecidos en la normatividad vigente y se evalúan las condiciones del donante para determinar qué órganos pueden ser donados. Un donante vivo debe ser mayor de edad (18 años en Colombia).
                            </p>

                            <h2 class="titulos-internos" > ¿Cuándo fallezca que debe hacer mi familia?</h2>
                            <p>
                            Se debe informar inmediatamente al personal médico que está a cargo en la institución de salud, para que se informe a la Red de Donación y Trasplantes de Colombia o informar del fallecimiento y de la voluntad de ser donante a través de la Línea Gratuita Nacional del Instituto Nacional de Salud 01 8000 113 400.
                            </p>

                            <h2 class="titulos-internos" >¿Qué clase de donantes hay? </h2>
                            <p>
                            Existen donantes vivos que pueden compartir uno de sus riñones, parte de su hígado y médula ósea, y donantes fallecidos que pueden donar órganos y tejidos.
                            </p>
                            

                        </div>
                        
                        <div class="col-12 col-md-5 pb-3">
                            <h2 class="titulos-internos" >¿Existe en Colombia el tráfico de órganos? </h2>
                            <p>
                            En Colombia no existe el tráfico de órganos. Una cirugía de trasplantes requiere una institución hospitalaria con infraestructura física y tecnológica, recurso humano especializado y acreditado y contar con la habilitación para este tipo de procedimientos. Colombia tiene una legislación muy estricta frente al tema de la donación y trasplante, ya que el tráfico de órganos es considerado un delito penal, según la ley 919 de 2004.
                            </p>

                            <h2 class="titulos-internos" > ¿Cómo funciona la lista de espera?</h2>
                            <p>
                            Se trata de un archivo con información de pacientes a nivel nacional, con necesidad de recibir un órgano para trasplante. Cuando existe un donante se determina según la compatibilidad, cual es el receptor más adecuado. 
                            </p>
                            


                            <h2 class="titulos-internos" >¿Qué es la histocompatibilidad? </h2>
                            <p>
                            Son pruebas de laboratorio a través de las cuales se determina el grado de compatibilidad genética entre el donante de órganos y los receptores a trasplantar. Cuando se presenta un donante se le realizan laboratorios que se comparan con los de los pacientes en lista de espera para ese órgano, y así se garantiza la transparencia, puesto que solo el receptor que tenga mayor compatibilidad puede recibir el trasplante.
                            </p>
                            
                            
                            
                        </div>
                        
                        <div class="col-12 col-md-6">
                            <div class="mas-preguntas" style="margin-top: 60px;margin-bottom: 60px;">
                                <button id="boton-menos-preguntas" class="boton-frecuente">Atrás</button>
                            </div>                                 
                        </div>
                        <div class="col-12 col-md-6">

                        </div>
                    </div>
                </div>
            </section>                                               






        <section class="mt-5 mb-5">
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
        
        <script>
            

        $(document).ready(function(){
        $("#boton-mas-preguntas").click(function(){
            $("#mas-preguntas-frecuentes").toggle();
        });
        });

        $(document).ready(function(){
        $("#boton-menos-preguntas").click(function(){
            $("#mas-preguntas-frecuentes").toggle();
        });
        });

        $(document).ready(function(){
        $("#boton-donante-vivo").click(function(){
            $("#donante-vivo").toggle();
        });
        });


        </script>



            
        </main>




        <?php  get_footer(); ?>


