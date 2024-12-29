<?php 
/*
    Template Name: Pacientes, familiares y cuidadores
*/
global $post;
$slug = "/" . $post->post_name . "/";
$sistema_de_pestanas = get_field('sistema_de_pestanas');
// $ubicaciones = get_field('ubicaciones');
$seccion = (isset($_GET["seccion"])) ? $_GET["seccion"] : '';

$breadcrumbs = get_field('breadcrumbs');


$ubicaciones = get_ubicaciones();
$ubicaciones_102 = get_ubicaciones_102();
$ubicacion_2da = array();
foreach($ubicaciones_102 as $ubicacion){
    $ubicacion_2da = $ubicacion;
    break;
}

$ubicacion_1ra = array();
foreach($ubicaciones as $ubicacion){
    $ubicacion_1ra = $ubicacion;
    break;
}

get_header();

$seccion_elegida = '';
$menu = array(
	array(
        "enlace" => "/visitar-un-paciente/",
        "label" => "Visitar un paciente",
    ),
	array(
        "enlace" => "/paciente-ambulatorio/",
        "label" => "Paciente Ambulatorio",
    ),
    array(
        "enlace" => "/guia-para-el-paciente-y-el-visitante/",
        "label" => "Paciente hospitalizado o en UCI",
    ),
    array(
        "enlace" => "/paciente-en-urgencias/",
        "label" => "Paciente en Urgencias",
    ),    
    array(
        "enlace" => "/informacion-de-contacto/",
        "label" => "Información de contacto",
    ),
    array(
        "enlace" => "/ubicacion-de-instalaciones-163/",
        "label" => "LaCardio: Hospital calle 163",
    ),
	array(
        "enlace" => "/ubicacion-de-instalaciones-102/",
        "label" => "LaCardio102: Centro Ambulatorio",
    ),
);

/* Traída de contenidos para pestañas */
$contenidos = array();
if(is_array($sistema_de_pestanas)){
    foreach($sistema_de_pestanas as $cadaContenido){
        
        $contenidos["interna"] = (isset($contenidos["interna"])) ? $contenidos["interna"] : 0;
        if($seccion == $cadaContenido["ancla"]){
            $contenidos["interna"] = 1;
            $elegido = 1;
        }else{
            $elegido = 0;
        }
        $contenidos["contenidos"][] = array(
            "titulo" => $cadaContenido["titulo"],
            "ancla" => $cadaContenido["ancla"],
            "contenido" => $cadaContenido["contenido"],
            "iconos" => $cadaContenido["iconos"],
            "elegido" => $elegido,
            // "iconos" => array(6516512),
        );
    }
}

?>
<?php echo get_template_part('template-parts/content'); ?>

<div class="breadcrumbs">
        <p id="breadcrumbs" class="claro">
            <span>
                <a style="text-decoration: none!important;" href="https://www.lacardio.org/" data-wpel-link="internal">LaCardio</a>
            </span>
            <?php if (is_array($breadcrumbs) || is_object($breadcrumbs)) { ?>
                <?php foreach ($breadcrumbs as $breadcrumb): ?>
                    » 
                    <span>
                        <a style="text-decoration: none!important;" href="<?= $breadcrumb["link_breadcrumb"]?>">
                            <?= $breadcrumb["breadcrumb"]?>
                        </a>
                    </span>
                <?php endforeach ?>
            <?php } ?>

        </p>
    </div>

<main class="pagina pagpacientes">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Pacientes, familiares y cuidadores</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="pagpacientes__menu">
                    <ul>
                        <?php foreach($menu as $cMenu): ?>
                            <?php if($cMenu["enlace"] == $slug): $seccion_elegida = $slug; ?>
                                <li class="seleccionado">
                                    <a href="<?= $cMenu["enlace"] ?>"><h2 class="bold"><?= $cMenu["label"] ?></h2></a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="<?= $cMenu["enlace"] ?>"><h2><?= $cMenu["label"] ?></h2></a>
                                </li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
            <?php if($seccion_elegida == '/ubicacion-de-instalaciones-163/'): ?>
                <div class="col-12 col-sm-8">
                    <div class="ubicaciones_imagen mb-3">
                        <img src="<?= $ubicacion_1ra["imagen"] ?>" alt="<?= $ubicacion_1ra["nombre"] ?>" class="ubicacion_principal">
                    </div>
                    <h2>Ubicación de instalaciones</h2>
                    <?php if(is_array($ubicaciones)): ?>
                    <div class="ubicacionestabs">
                        <div class="ubicacionestabs__torres">
                            <div class="ubicacionestabs__torres__btns botones">
                                <?php $indice = 0; foreach($ubicaciones as $cadaUbicacion): ?>
                                    <div class="ubicacionestabs__torres__btns--cadaU cadaUno <?php if($indice == 0): ?>activo<?php endif ?>">
                                        <button data-imagen="<?= $cadaUbicacion["imagen"] ?>" data-nombre="<?= $cadaUbicacion["nombre"] ?>"><?= $cadaUbicacion["letra"] ?></button>
                                    </div>
                                <?php $indice++ ; endforeach ?>
                            </div>
                            <div class="ubicacionestabs__torres__content contenido">
                                <?php $indice = 0; foreach($ubicaciones as $cadaUbicacion): ?>
                                <div class="ubicacionestabs__torres__content--cadaU cadaUno <?php if($indice == 0): ?>activo<?php endif ?>">
                                    <div class="ubicacionestabs__torres__content--cadaU__cont">
                                        <div class="ubicacionestabs__torres__content--cadaU__titulo">
                                            <div class="ubicacionestabs__torres__content--cadaU__titulo__left">
                                                <h3>Torre <?= $cadaUbicacion["letra"] ?></h3>
                                                <?php if (!empty($cadaUbicacion['nombre'])) { ?>
                                                    <h4><?= $cadaUbicacion["nombre"] ?></h4>
                                                <?php } ?>
                                            </div>
                                            <?php if($cadaUbicacion["ver_ubicacion"]["enlace"] != ""): ?>
                                                <div class="ubicacionestabs__torres__content--cadaU__titulo__right">
                                                    <a href="<?= $cadaUbicacion["ver_ubicacion"]["enlace"] ?>" target="<?= $cadaUbicacion["ver_ubicacion"]["ventana"] ?>" class="btn"><?= $cadaUbicacion["ver_ubicacion"]["label"] ?></a>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                        <div class="ubicacionestabs__torres__content--cadaU__niveles pisosniveles">
                                            <div class="pisosniveles__btns botones2">
                                                <?php $indice2 = 0 ; foreach($cadaUbicacion["niveles"] as $cadaNivel): ?>
                                                <div class="pisosniveles__btns__cadaU cadaBoton <?php if($indice2 == 0): ?>activo<?php endif ?>">
                                                    <button><?= $cadaNivel["nombre"] ?></button>
                                                </div>
                                                <?php $indice2++ ; endforeach ?>
                                            </div>
                                            <div class="pisosniveles__content contenido2">
                                                <?php $indice2 = 0 ; foreach($cadaUbicacion["niveles"] as $cadaNivel): ?>
                                                <div class="pisosniveles__content__cadaU cadaUno2 <?php if($indice2 == 0): ?>activo<?php endif ?>">
                                                    <div class="pisosniveles__content__cadaU--content">
                                                        <?= $cadaNivel["contenido"] ?>
                                                    </div>
                                                </div>
                                                <?php $indice2++ ; endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $indice++ ; endforeach ?>
                            </div>
                        </div>
                        
                    </div>
                    <?php endif; ?>
					
                </div>
            <?php elseif($seccion_elegida == '/ubicacion-de-instalaciones-102/'): ?>
                <?php
                    $clinica_name = get_field('titulo_clinica');
                    $clinica_dir = get_field('url_maps');
                    $banner_slides = get_field('banner_slides');
                    $servicios_tit = get_field('titular_servicios');
                    $servicios_items = get_field('servicios');
                    $planes_tit = get_field('titular_planes');
                    $planes_desc = get_field('descripcion_general_planes');
                    $planes_items = get_field('planes_items');
                    $titular_cta = get_field('titular_cta');
                    $cta = get_field('cta_url');
                    $titular_destacados = get_field('titular_destacados');
                    $items_destacados = get_field('items_destacados');
                    $titular_preguntas = get_field('titular_preguntas');
                    $preguntas = get_field('preguntas');
                    $whatsapp = get_field('whatsapp');
                    $llamada = get_field('llamada');
                    $horario1 = get_field('atencion_consultas');
                    $horario2 = get_field('atencion_imagenes_diag');
                ?>
                <div class="col-12 col-sm-8">
                    <div class="new_102">
                        <div class="banner_clinica">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <h2><?= $clinica_name ?></h2>
                                    <a href="<?= $clinica_dir["url"]?>" target="<?= $clinica_dir["target"]?>"><?= $clinica_dir["title"]?></a>
                                </div>
                                <?php if(is_array($banner_slides)): ?>
                                    <?php if(count($banner_slides) >= 2): ?>
                                        <div class="carrusel-slider">
                                            <div id="carrusel102" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <?php foreach($banner_slides as $key => $button): ?>
                                                        <button type="button" data-bs-target="#carrusel102" data-bs-slide-to="<?= $key ?>" class="<?= ($key === 0) ? 'active' : ''; ?>" <?= ($key === 0) ? 'aria-current="true"' : ''; ?> aria-label="Slide--<?= $key ?>"></button>
                                                    <?php endforeach ?>
                                                </div>
                                                <div class="carousel-inner">
                                                    <?php foreach($banner_slides as $key => $slide): ?>
                                                        <div class="carousel-item <?= ($key === 0) ? 'active' : ''; ?>">
                                                            <div class="banner-img">
                                                                <?php if($slide["enlace_banner_img"]): ?>
                                                                    <a href="<?= $slide["enlace_banner_img"]["url"]?>" class="banner-img-link" target="<?= $slide["enlace_banner_img"]["target"]?>">
                                                                        <img src="<?= $slide["imagen_banner"]?>" alt="Banner LaCardio 102 slide" class="img-fluid">
                                                                    </a>
                                                                <?php else: ?>
                                                                    <img src="<?= $slide["imagen_banner"]?>" alt="Banner LaCardio 102 slide" class="img-fluid">
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carrusel102" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carrusel102" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                    <?php elseif(count($banner_slides) < 2): ?>
                                        <?php foreach ($banner_slides as $simple): ?>
                                            <div class="simple-banner">
                                                <div class="banner-img">
                                                    <?php if($simple["enlace_banner_img"]): ?>
                                                        <a href="<?= $simple["enlace_banner_img"]["url"]?>" class="banner-img-link" target="<?= $simple["enlace_banner_img"]["target"]?>">
                                                            <img src="<?= $simple["imagen_banner"]?>" alt="Banner LaCardio 102 slide" class="img-fluid">
                                                        </a>
                                                    <?php else: ?>
                                                        <img src="<?= $simple["imagen_banner"]?>" alt="Banner LaCardio 102 slide" class="img-fluid">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="servicios_clinica">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <h2><?= $servicios_tit ?></h2>
                                </div>
                                <?php foreach($servicios_items as $servicio): ?>
                                    <div class="col-12 col-md-4">
                                        <div class="servicios-item">
                                            <div class="icon text-center">
                                                <img src="<?= $servicio["icono_servicio"] ?>" alt="Icon" class="img-fluid">
                                            </div>
                                            <div class="item_txt">
                                                <h3 class="text-center"><?= $servicio["nombre_servicio"] ?></h3>
                                                <p class="text-center"><?= $servicio["descripcion_servicio"] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="planes">
                            <div class="row">
                                <div class="col-12">
                                    <h2><?= $planes_tit ?></h2>
                                </div>
                                <div class="col-12">
                                    <div class="planes_txt">
                                        <?= $planes_desc ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs_buttons">
                                <ul class="nav nav-pills tabs_planes" id="planes-tabs" role="tablist">
                                    <?php foreach($planes_items as $key => $plan): ?>
                                        <?php
                                            $button_id = 'plan--' . ($key + 1);
                                            $content_id = 'content--' . ($key + 1);
                                        ?>
                                        <li class="nav-item plan-item" role="presentation">
                                            <button class="<?= ($key === 0) ? 'active' : ''; ?>" id="<?= $button_id ?>" data-bs-toggle="tab" data-bs-target="<?= '#' . $content_id ?>" type="button" role="tab" aria-controls="<?= $content_id ?>" aria-selected="false <?= ($key === 0) ? 'true' : ''; ?>">
                                                <img src="<?= $plan["icono_plan"] ?>" alt="Icono Plan" class="img-fluid">
                                                <h3>
                                                    <?= $plan["nombre_plan"] ?>
                                                </h3>
                                            </button>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <div class="tabs_contents" id="planes-contents">
                                <?php foreach($planes_items as $key => $plan_content): ?>
                                    <?php
                                        $servicios_planes = $plan_content["servicios_plan"];
                                        $button_id = 'plan--' . ($key + 1);
                                        $content_id = 'content--' . ($key + 1);
                                    ?>
                                    <div class="tab-pane fade <?= ($key === 0) ? 'show active' : ''; ?>" id="<?= $content_id ?>" role="tabpanel" aria-labelledby="<?= $button_id ?>">
                                        <div class="tab-content planes-info__container">
                                            <h2 class="sr-only"><?php echo $plan_content['nombre_plan'] ?></h2>
                                            <h3><?= $plan_content["valor_del_plan"] ?></h3>
                                            <div class="planes-info__servicios">
                                                <div class="planes-info__tabla-header">
                                                    <div class="tabla-header--servicio">
                                                        <h3>SERVICIO</h3>
                                                    </div>
                                                    <div class="tabla-header--frecuencia">
                                                        <h3>FRECUENCIA</h3>
                                                    </div>
                                                </div>
                                                <div class="planes-info__tabla">
                                                    <?php $total_services = count($servicios_planes); ?>
                                                    <?php foreach($servicios_planes as $index => $service): ?>
                                                        <div class="servicio--item<?php if ($index === $total_services - 1) echo ' last-item'; ?>">
                                                            <div class="tabla--servicio">
                                                                <p><?= $service["nombre_del_servicio"] ?></p>
                                                            </div>
                                                            <div class="tabla--frecuencia">
                                                                <p><?= $service["frecuencia"] ?></p>
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="banner_cta">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <div class="banner_content text-center">
                                        <h2><?=$titular_cta?></h2>
                                        <a class="btn" href="<?=$cta["url"]?>" target="<?=$cta["target"]?>"><?=$cta["title"]?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabs-clinica">
                            <div class="row">
                                <div class="col-12">
                                    <h2><?=$titular_destacados?></h2>
                                </div>
                            </div>
                            <div class="tabs_clinica__destacados">
                                <ul class="nav nav-tabs tabs_destacados" id="destacados-tabs" role="tablist">
                                    <?php foreach($items_destacados as $key => $tab): ?>
                                        <?php
                                            $tab_id = 'tab--' . ($key + 1);
                                            $tab_content_id = 'destacado--' . ($key + 1);
                                        ?>
                                        <li class="nav-item plan-item" role="presentation">
                                            <button class="nav-link <?= ($key === 0) ? 'active' : ''; ?>" id="<?= $tab_id ?>" data-bs-toggle="tab" data-bs-target="<?= '#' . $tab_content_id ?>" type="button" role="tab" aria-controls="<?= $tab_content_id ?>" aria-selected="false <?= ($key === 0) ? 'true' : ''; ?>">
                                                <span>
                                                    <?= $tab["nombre_destacado"] ?>
                                                </span>
                                            </button>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                                <div class="tabs_contents" id="destacados-contents">
                                    <?php foreach($items_destacados as $key => $tab_content): ?>
                                        <?php
                                            $tab_id = 'tab--' . ($key + 1);
                                            $tab_content_id = 'destacado--' . ($key + 1);
                                        ?>
                                        <div class="tab-pane fade <?= ($key === 0) ? 'show active' : ''; ?>" id="<?= $tab_content_id ?>" role="tabpanel" aria-labelledby="<?= $tab_id ?>">
                                            <div class="tab-content tab_contents__container">
                                                <div class="tab_img">
                                                    <img src="<?= $tab_content["imagen_destacado"]["url"]?>" alt="<?= $tab_content["imagen_destacado"]["alt"]?>" class="img-fluid">
                                                </div>
                                                <div class="tab_txt">
                                                    <?= $tab_content["texto_destacado"] ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-preguntas">
                            <div class="row">
                                <div class="col-12">
                                    <h2><?= $titular_preguntas ?></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="accordion accordion-flush" id="preguntas-frecuentes">
                                    <?php foreach ($preguntas as $key => $pregunta): ?>
                                        <?php
                                            $item_id = 'pregunta-' . ($key + 1);
                                        ?>
                                        <div class="accordion-item">
                                            <h3 class="accordion-header mw-100 border-0" id="<?= $item_id . '--btn' ?>">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="<?= '#' . $item_id ?>" aria-expanded="false" aria-controls="<?= $item_id ?>">
                                                    <?= $pregunta["pregunta"] ?>
                                                </button>
                                            </h3>
                                            <div id="<?= $item_id ?>" class="accordion-collapse collapse <?= ($key === 0) ? 'show' : ''; ?>" aria-labelledby="<?= $item_id . '--btn' ?>" data-bs-parent="#preguntas-frecuentes">
                                                <div class="accordion-body">
                                                    <?= $pregunta["respuesta"] ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                        <?php if( $whatsapp || $llamada ): ?>
                            <div class="agendar-cita">
                                <div class="row">
                                    <div class="col-12">
                                        <h2>Agenda tu cita</h2>
                                    </div>
                                    <div class="col-12 col-md-6 text-center mb-3">
                                        <div class="icon">
                                            <svg width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M57.2602 51.4701C56.6902 51.2001 53.9602 49.8501 53.4502 49.6401C52.9402 49.4301 52.5802 49.3701 52.1902 49.9401C51.8002 50.5101 50.7502 51.7401 50.4202 52.1301C50.0902 52.5201 49.7902 52.5501 49.2202 52.1301C47.583 51.4731 46.071 50.5395 44.7502 49.3701C43.5545 48.2444 42.5423 46.9386 41.7502 45.5001C41.4202 44.9601 41.7502 44.6601 41.9902 44.3601C42.2302 44.0601 42.5302 43.7301 42.8302 43.4001C43.0496 43.1147 43.2311 42.8021 43.3702 42.4701C43.4446 42.3157 43.4833 42.1465 43.4833 41.9751C43.4833 41.8037 43.4446 41.6345 43.3702 41.4801C43.3702 41.2101 42.1102 38.4801 41.6302 37.3701C41.1502 36.2601 40.7302 36.4101 40.4002 36.4101H39.2002C38.6285 36.4324 38.0891 36.6805 37.7002 37.1001C37.0725 37.6991 36.5752 38.4214 36.2397 39.2215C35.9041 40.0217 35.7375 40.8825 35.7502 41.7501C35.9036 43.8801 36.6868 45.9163 38.0002 47.6001C40.4103 51.1804 43.7076 54.0746 47.5702 56.0001C48.8902 56.5701 49.9102 56.9001 50.7202 57.1701C51.8576 57.5139 53.0599 57.5858 54.2302 57.3801C55.0075 57.2224 55.7441 56.9067 56.3943 56.4526C57.0445 55.9985 57.5945 55.4156 58.0102 54.7401C58.3561 53.9059 58.4701 52.9938 58.3402 52.1001C58.1902 51.8901 57.8302 51.7401 57.2602 51.4701Z" fill="#002D72"/>
                                                <path d="M62.87 31.04C60.7953 28.9457 58.3222 27.288 55.5965 26.1648C52.8709 25.0415 49.9479 24.4755 47 24.5C43.0949 24.5205 39.2635 25.5651 35.8884 27.5297C32.5134 29.4942 29.7129 32.3099 27.7665 35.6955C25.8202 39.0811 24.7962 42.9181 24.7968 46.8232C24.7974 50.7284 25.8226 54.5651 27.77 57.95L24.77 69.5L36.59 66.5C39.8577 68.2781 43.5199 69.2066 47.24 69.2H47C51.4338 69.2289 55.7757 67.9366 59.472 65.488C63.1684 63.0393 66.0517 59.5452 67.7543 55.4513C69.4569 51.3574 69.9016 46.8491 69.0317 42.5015C68.1618 38.1538 66.0167 34.1637 62.87 31.04ZM47 65.36C43.6717 65.3627 40.4052 64.4605 37.55 62.75L36.89 62.36L29.87 64.19L31.73 57.35L31.31 56.66C28.9141 52.8015 28.0179 48.1978 28.7914 43.7223C29.5649 39.2468 31.9543 35.2109 35.5063 32.3804C39.0583 29.5499 43.5258 28.1217 48.061 28.3668C52.5962 28.6119 56.8837 30.5132 60.11 33.71C61.8396 35.4257 63.2105 37.4685 64.1428 39.7192C65.075 41.97 65.55 44.3838 65.54 46.82C65.5321 51.7347 63.5762 56.4458 60.101 59.921C56.6258 63.3962 51.9147 65.3521 47 65.36Z" fill="#002D72"/>
                                                <circle cx="47" cy="47" r="45" stroke="#E40046" stroke-width="4"/>
                                            </svg>
                                        </div>
                                        <a href="<?= $whatsapp["url"] ?>" target="<?= $whatsapp["target"] ?>"><?= $whatsapp["title"] ?></a>
                                    </div>
                                    <div class="col-12 col-md-6 text-center">
                                        <div class="icon">
                                            <svg width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_8_690)">
                                                <mask id="mask0_8_690" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="22" y="22" width="51" height="51">
                                                <path d="M73 22H22V73H73V22Z" fill="white"/>
                                                </mask>
                                                <g mask="url(#mask0_8_690)">
                                                <path d="M26.2796 36.6016C24.8634 43.3813 30.2018 51.4518 36.9063 58.1562C43.6108 64.8608 51.6811 70.1992 58.461 68.7829C64.0367 67.6182 66.8832 64.6481 68.4852 62.1174C69.0379 61.244 68.7589 60.1106 67.9304 59.4926L60.0851 53.6406C59.2391 53.0097 58.0581 53.0951 57.312 53.8414L53.1476 58.0056C53.1476 58.0056 49.0999 56.6898 43.7362 51.3263C38.3727 45.9628 37.057 41.9149 37.057 41.9149L41.2212 37.7507C41.9675 37.0044 42.053 35.8235 41.422 34.9775L35.5699 27.1321C34.952 26.3036 33.8185 26.0246 32.9452 26.5774C30.4144 28.1794 27.4443 31.0259 26.2796 36.6016Z" stroke="#002D72" stroke-width="2.125" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                </g>
                                                <circle cx="47" cy="47" r="45" stroke="#E40046" stroke-width="4"/>
                                                <defs>
                                                <clipPath id="clip0_8_690">
                                                <rect width="51" height="51" fill="white" transform="translate(22 22)"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                        <a href="<?= $llamada ["url"] ?>" target="<?= $llamada["target"] ?>"><?= $llamada["title"] ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="horarios">
                            <div class="row">
                                <div class="col-12">
                                    <h2>HORARIOS DE ATENCIÓN</h2>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="horarios-content">
                                        <div class="icon_consultas">
                                            <svg width="73" height="73" viewBox="0 0 73 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M23.5565 49.0264C24.0947 52.1957 26.7258 55.6639 29.1775 57.3383C30.6725 58.3549 32.3468 58.8332 33.9614 58.8332C34.4995 58.8332 34.9779 58.7734 35.4563 58.6538C41.2567 57.3981 42.4526 50.2821 41.8547 45.7973C41.5557 43.525 40.8979 41.2527 39.9411 39.0401C44.3064 39.0401 47.8345 35.5121 47.8345 31.1468V17.9913C47.8345 17.1541 47.1767 16.4963 46.3395 16.4963H41.1371V18.8883H45.4425V31.2066C45.4425 34.2563 42.9908 36.708 39.9411 36.708H36.1739C33.1242 36.708 30.6725 34.2563 30.6725 31.2066V18.8883H35.0377V16.4963H29.7755C28.9383 16.4963 28.2806 17.1541 28.2806 17.9913V31.2066C28.2806 35.5719 31.8086 39.0999 36.1739 39.0999H37.3698C38.4462 41.3723 39.2236 43.824 39.5226 46.1561C40.0009 49.6244 39.1638 55.4846 34.9779 56.3815C33.5428 56.6805 31.9282 56.3217 30.4931 55.365C28.5795 54.0494 26.4866 51.2987 25.9484 48.9666C28.0414 48.3686 29.6559 46.4551 29.6559 44.123C29.6559 41.3722 27.3836 39.0999 24.6329 39.0999C21.8822 39.0999 19.6099 41.3722 19.6099 44.123C19.6697 46.5149 21.344 48.548 23.5565 49.0264ZM24.6927 41.4918C26.1278 41.4918 27.3238 42.6878 27.3238 44.123C27.3238 45.5581 26.1278 46.7541 24.6927 46.7541C23.2575 46.7541 22.0616 45.5581 22.0616 44.123C22.0616 42.6878 23.2575 41.4918 24.6927 41.4918Z" fill="#002D72"/>
                                                <circle cx="36.5" cy="36.5" r="34.5" stroke="#E40046" stroke-width="4"/>
                                            </svg>
                                        </div>
                                        <div class="horario">
                                            <?= $horario1 ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="horarios-content">
                                        <div class="icon_consultas">
                                            <svg width="73" height="73" viewBox="0 0 73 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M24.8837 54.0382H48.8935C50.258 54.0382 51.5666 53.4961 52.5315 52.5312C53.4964 51.5664 54.0384 50.2577 54.0384 48.8932V24.8835C54.0384 23.5189 53.4964 22.2103 52.5315 21.2454C51.5666 20.2806 50.258 19.7385 48.8935 19.7385H24.8837C23.5192 19.7385 22.2106 20.2806 21.2457 21.2454C20.2808 22.2103 19.7388 23.5189 19.7388 24.8835V48.8932C19.7388 50.2577 20.2808 51.5664 21.2457 52.5312C22.2106 53.4961 23.5192 54.0382 24.8837 54.0382ZM48.8935 50.6082H24.8837C24.4289 50.6082 23.9927 50.4275 23.671 50.1059C23.3494 49.7843 23.1687 49.3481 23.1687 48.8932V38.6033H30.0287C30.3712 38.6032 30.7058 38.5006 30.9894 38.3087C31.2731 38.1167 31.4928 37.8442 31.6202 37.5263L33.4586 32.9302L38.7253 46.1012C38.8523 46.42 39.0721 46.6934 39.3561 46.886C39.6401 47.0786 39.9754 47.1815 40.3186 47.1815C40.6617 47.1815 40.997 47.0786 41.281 46.886C41.5651 46.6934 41.7848 46.42 41.9118 46.1012L44.9096 38.6033H50.6084V48.8932C50.6084 49.3481 50.4278 49.7843 50.1061 50.1059C49.7845 50.4275 49.3483 50.6082 48.8935 50.6082ZM24.8837 23.1685H48.8935C49.3483 23.1685 49.7845 23.3492 50.1061 23.6708C50.4278 23.9924 50.6084 24.4286 50.6084 24.8835V35.1734H43.7485C43.4055 35.1732 43.0704 35.276 42.7864 35.4683C42.5024 35.6605 42.2825 35.9336 42.1553 36.2521L40.3186 40.8448L35.0518 27.6755C34.9246 27.3572 34.7048 27.0844 34.421 26.8922C34.1372 26.7 33.8023 26.5973 33.4595 26.5973C33.1167 26.5973 32.7818 26.7 32.498 26.8922C32.2141 27.0844 31.9944 27.3572 31.8671 27.6755L28.8676 35.1734H23.1687V24.8835C23.1687 24.4286 23.3494 23.9924 23.671 23.6708C23.9927 23.3492 24.4289 23.1685 24.8837 23.1685Z" fill="#002D72"/>
                                                <circle cx="36.5" cy="36.5" r="34.5" stroke="#E40046" stroke-width="4"/>
                                            </svg>
                                        </div>
                                        <div class="horario">
                                            <?= $horario2 ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-12 col-sm-8">
                    <h2 style="font-size: 1.6rem;"><?= get_the_title () ?></h2>
                    <div>
                        <?php the_content() ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
        <?php if(count($contenidos) > 0): ?>
            <div class="row">
                <div class="col-12">
                    <div class="pestanas">
                        <div class="pestanas__btns">
                            <?php $indice = 0; foreach($contenidos["contenidos"] as $cadaUno): ?>
                                <a href="#" id="<?= $cadaUno["ancla"] ?>" class="<?php if($indice == 0 && $contenidos["interna"] == 0): ?>activa<?php elseif($contenidos["interna"] == 1 && $cadaUno["elegido"] == 1): ?>activa<?php endif ?>">
                                    <span class="normal"><img src="<?= $cadaUno["iconos"]["icono"]["url"] ?>" alt="<?= $cadaUno["iconos"]["icono"]["alt"] ?>" /></span> 
                                    <span class="hover"><img src="<?= $cadaUno["iconos"]["icono_hover"]["url"] ?>" alt="<?= $cadaUno["iconos"]["icono_hover"]["alt"] ?>" /></span>
                                    <h4 style="font-size:0.8rem;"><?= $cadaUno["titulo"] ?></h4>
                                </a>
                            <?php $indice++; endforeach ?>
                        </div>
                        <div class="pestanas__contenedor py-5">
                            <?php $indice = 0; foreach($contenidos["contenidos"] as $cadaUno): $content = estructura_contenidos($cadaUno["contenido"]) ?>
                                <div class="pestanas__indv <?php if($indice == 0 && $contenidos["interna"] == 0): ?>activa<?php elseif($contenidos["interna"] == 1 && $cadaUno["elegido"] == 1): ?>activa<?php endif ?>">
                                    <?= $content ?>
                                </div>
                            <?php $indice++; endforeach ?>
                        </div>
                    </div>
    
                </div>
            </div>
        <?php endif ?>
    </div>
</main>
<?php  get_footer(); ?>
