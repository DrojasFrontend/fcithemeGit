<?php 
/*
    Template Name: Ley Transparencia
*/
get_header();

$transparencia = [
    [
        "nombre" => "Misión y Visión",
        "link" => "https://www.lacardio.org/filosofia-corporativa/",
    ],
    [
        "nombre" => "Quienes somos",
        "link" => "https://www.lacardio.org/historia/",
    ],
    [
        "nombre" => "Organigrama",
        "link" => "https://www.lacardio.org/gobierno-corporativo/",
    ],
    [
        "nombre" => "Ofertas de empleo",
        "link" => "https://www.elempleo.com/co/sitio-empresarial/cardio-infantil?v2=true",
    ],
    [
        "nombre" => "Mapa de procesos de la cardio",
        "link" => "https://www.lacardio.org/wp-content/uploads/2024/01/Mapa-de-procesos-.jpg",
    ],
    [
        "nombre" => "Normograma",
        "link" => "https://www.lacardio.org/normograma/",
    ],
    [
        "nombre" => "Directorio de extensiones 2024",
        "link" => "https://www.lacardio.org/extensiones-telefonicas/",
    ],
];

$atencion = [
    [
        "nombre" => "Sede principal calle 163",
        "link" => "https://www.lacardio.org/ubicacion-de-instalaciones-163/",
    ],
    [
        "nombre" => "Sede calle 102",
        "link" => "https://www.lacardio.org/ubicacion-de-instalaciones-102/",
    ],
    [
        "nombre" => "Correo de PQRS",
        "link" => "https://t.almeraim.com/form?data=eyJhcGlrZXkiOiJBMDhCOERBNjlFQkVEQTY3NzQ1QzRBREQ1M0I2RkM1N0M5NERCNEZBMEREN0RGMTYzMDE2QTAxODU3QjFEREEwIiwiY29ubmVjdGlvbiI6InNnaWZjaSIsImVuZHBvaW50IjoiaHR0cHMlM0ElMkYlMkZzZ2kuYWxtZXJhaW0uY29tJTJGc2dpJTJGYXBpJTJGdjIlMkYiLCJjb2RlIjoiNyJ9",
    ],
    [
        "nombre" => "PQRS",
        "link" => "Formulario", "url" => "https://t.almeraim.com/form?data=eyJhcGlrZXkiOiJleHBlcGFjaWVudGUiLCJjb25uZWN0aW9uIjoic2dpZmNpIiwiZW5kcG9pbnQiOiJodHRwcyUzQSUyRiUyRnNnaS5hbG1lcmFpbS5jb20lMkZzZ2klMkZhcGklMkZ2MiUyRiIsImNvZGUiOiJFWFAifQ==",
    ],
    [
        "nombre" => "Solicitud de historia clínica",
        "link" => "mailto:resultados@cardioinfantil.org",
    ],
    [
        "nombre" => "Notificaciones judiciales",
        "link" => "mailto:notificacionesjudiciales@lacardio.org",
    ],
    [
        "nombre" => "Radicación de factura electrónica",
        "link" => "mailto:recepcionfacturaelectronica@lacardio.org",
    ],
    [
        "nombre" => "Correo de canal de denuncias",
        "link" => "mailto:somostransparentes@lacardio.org",
    ],
];

$ciudadania = [
    [
        'nombre' => 'Asociación de Usuarios',
        'link' => 'https://www.lacardio.org/asociacion-usuarios/'
    ],
    [
        'nombre' => 'Prevención HTA',
        'link' => 'https://www.lacardio.org/wp-content/uploads/2024/06/Prevencion-de-HTA.pptx'
    ],
    [
        'nombre' => 'Cartilla Trabajo Social',
        'link' => 'https://www.lacardio.org/wp-content/uploads/2024/06/cartilla-trabajo-social-Final.pdf'
    ]
];

$multimedia = [
    [
        "nombre" => "10 pasos para un corazón sano",
        "link" => "https://www.lacardio.org/wp-content/uploads/2024/06/10-pasos-para-un-corazon-sano.mp4",
        'imagen' => IMG_BASE . 'multimedia/multimedia-1.png',
    ],
    [
        "nombre" => "Plan de emergencias",
        "link" => "https://www.lacardio.org/wp-content/uploads/2024/06/Plan-de-emergencias.mp4",
        'imagen' => IMG_BASE . 'multimedia/multimedia-2.png',
    ],
    [
        "nombre" => "Prevención de caídas",
        "link" => "https://www.lacardio.org/wp-content/uploads/2024/06/Prevencion-de-caidas.mp4",
        'imagen' => IMG_BASE . 'multimedia/multimedia-3.png',
    ],
    [
        "nombre" => "Qué hacer en caso de un sismo",
        "link" => "https://www.lacardio.org/wp-content/uploads/2024/06/Que-hacer-en-caso-de-un-sismo.mp4",
        'imagen' => IMG_BASE . 'multimedia/multimedia-4.png',
    ],
    [
        "nombre" => "Residuos hospitalarios",
        "link" => "https://www.lacardio.org/wp-content/uploads/2024/06/Residuos-hospitalarios.mp4",
        'imagen' => IMG_BASE . 'multimedia/multimedia-5.png',
    ],
    [
        "nombre" => "Seguridad del paciente",
        "link" => "https://www.lacardio.org/wp-content/uploads/2024/06/Seguridad-del-Paciente.mp4",
        'imagen' => IMG_BASE . 'multimedia/multimedia-6.png',
    ],
    [
        "nombre" => "Técnicas de la lactancia materna",
        "link" => "https://www.lacardio.org/wp-content/uploads/2024/06/Tecnicas-de-la-lactancia-materna.mp4",
        'imagen' => IMG_BASE . 'multimedia/multimedia-7.png',
    ],
    [
        "nombre" => "Recomendaciones de seguridad para pacientes",
        "link" => "https://www.lacardio.org/wp-content/uploads/2024/06/Recomendaciones-de-seguridad-para-pacientes.mp4",
        'imagen' => IMG_BASE . 'multimedia/multimedia-8.png',
    ],
    [
        "nombre" => "La importancia de la lactancia materna",
        "link" => "https://www.lacardio.org/wp-content/uploads/2024/06/La-importancia-de-la-lactancia-materna.mp4",
        'imagen' => IMG_BASE . 'multimedia/multimedia-9.png',
    ],
    [
        "nombre" => "Uso seguro de medicamentos",
        "link" => "https://www.lacardio.org/wp-content/uploads/2024/06/Uso-seguro-de-medicamentos.mp4",
        'imagen' => IMG_BASE . 'multimedia/multimedia-10.png',
    ]
]

?>
<!-- CONTENIDO -->
<main class="">
<?= get_template_part('template-parts/content', 'breadcrumbs-nuevo'); ?>

<!-- Banner -->
    <section class="seccionBannerTexto">
        <div class="seccionBannerTexto__bckg">
            <div class="wrapper">
                <div class="seccionBannerTexto__title">
                    <h1 class="heading--64 color--fff">Transparencia <br> y acceso a la información</h1>
                    <p class="heading--18 color--fff font-sans">En cumplimiento con la Ley 1712 del 6 de marzo de 2014</p>
                </div>
            </div>
        </div>
    </section>
<!-- Fin Banner -->

<!-- Tabs -->
<section class="seccionTabs">
    <div class="wrapper">
        <ul class="tab-links">
            <li class="active"><a href="#tab1">Transparencia y acceso a la información</a></li>
            <li><a href="#tab2">Atención y servicios a la ciudadanía</a></li>
            <li><a href="#tab3">Participación ciudadana</a></li>
        </ul>
    </div>
    <div class="seccionTabs__line"></div>
   
        <div class="tab-content">
            <div class="wrapper">
            <div id="tab1" class="tab active">
                <div class="seccionTabs__ancla">
                    <?php foreach ($transparencia as $key => $item) { ?>
                        <a href="<?php echo $item['link']; ?>" title="<?php echo $item['nombre']; ?>">
                            <span class="heading--24 nombre"><?php echo $item['nombre']; ?></span>
                            <span class="heading--18 link">
                                Conoce más
                                <?php 
                                    get_template_part('template-parts/content', 'icono');
                                    display_icon('arrow-rojo'); 
                                ?>
                            </span>
                        </a>
                    <?php } ?>
                </div>
            </div>
            </div>
            <div class="wrapper">
            <div id="tab2" class="tab">
                <div class="seccionTabs__ancla">
                    <?php foreach ($atencion as $key => $item) { ?>
                        <a href="<?php echo $item['link']; ?>" title="<?php echo $item['nombre']; ?>">
                            <span class="heading--24 nombre"><?php echo $item['nombre']; ?></span>
                            <span class="heading--18 link">
                                Conoce más
                                <?php 
                                    get_template_part('template-parts/content', 'icono');
                                    display_icon('arrow-rojo'); 
                                ?>
                            </span>
                        </a>
                    <?php } ?>
                </div>
            </div>
            </div>

            <div id="tab3" class="tab">
                <div class="wrapper">
                    <div class="seccionTabs__ancla">
                        <?php foreach ($ciudadania as $key => $item) { ?>
                            <a href="<?php echo $item['link']; ?>" title="<?php echo $item['nombre']; ?>">
                                <span class="heading--24 nombre"><?php echo $item['nombre']; ?></span>
                                <span class="heading--18 link">
                                    Conoce más
                                    <?php 
                                        get_template_part('template-parts/content', 'icono');
                                        display_icon('arrow-rojo'); 
                                    ?>
                                </span>
                            </a>
                        <?php } ?>
                    </div>
                </div>

                <div class="seccionTabs__multimedia">
                    <div class="wrapper">
                        <h2 class="heading--48 color--002D72">Contenido Multimedia</h2>

                        <div class="seccionTabs__videos slickMultimedia slickPersonalizado">
                            <?php foreach ($multimedia as $key => $item) { ?>
                                <a href="<?php echo $item['link']; ?>" class="seccionTabs__video">
                                    <div href="" class="seccionTabs__card">
                                        <img src="<?php echo $item['imagen']; ?>" alt="">
                                        <div class="seccionTabs__card-info">
                                            <p class="heading--24 color--002D72"><?php echo $item['nombre']; ?></p>
                                            <span class="heading--18">
                                                Ver video
                                                <?php 
                                                    get_template_part('template-parts/content', 'icono');
                                                    display_icon('arrow-rojo'); 
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</section>
<!-- Fin Tabs -->

   
</main>
<!-- FIN CONTENIDO -->
<?php  get_footer(); ?>