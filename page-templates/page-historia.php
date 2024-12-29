<?php
/*
Template Name: Plantilla: Historia
*/
get_header(); 
// $estructura_contenidos = estructura_contenidos(get_field('estructura_contenidos'));
$linea_de_tiempo = get_field('linea_de_tiempo');

$contenidos = array(
    array(
        "titulo" => "Solidaridad",
        "contenido" => get_field('solidaridad'),
        "iconos" => get_field('solidaridad_iconos'),
    ),
    array(
        "titulo" => "Excelencia clínica",
        "contenido" => get_field('excelencia_clinica'),
        "iconos" => get_field('excelencia_iconos'),
    ),
    array(
        "titulo" => "Hospital Universitario",
        "contenido" => get_field('hospital_universitario'),
        "iconos" => get_field('hospital_iconos'),
    ),
    array(
        "titulo" => "Investigación",
        "contenido" => get_field('investigacion'),
        "iconos" => get_field('investigacion_iconos'),
    ),
);
?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="historia py-2 py-md-5">
    <div class="grilla">
        
        <h1 class="pseudotitulo1">Nuestra <strong>historia</strong></h1>

        <section class="timeline">
            <div class="tipo_slider_timeline">
                <?php foreach($linea_de_tiempo as $cadaSlide): ?>
                    <div class="timeline__int">
                        <div class="timeline__int__cont">
                            <div class="timeline__int--anio">
                                <?php if (isset($cadaSlide['ano'])) { ?>
                                    <h2><?= $cadaSlide["ano"] ?></h2>
                                <?php } ?>
                            </div>
                            <div class="timeline__int--separador"></div>
                            <div class="timeline__int--contenido">
                                <div class="timeline__int--contenido__foto">
                                    <?php if (isset($cadaSlide['foto']['url'])) { ?>
                                        <img src="<?= $cadaSlide["foto"]["url"] ?>" alt="<?= $cadaSlide["foto"]["alt"] ?>">
                                    <?php } ?>
                                </div>
                                <div class="timeline__int--contenido__textos">
                                    <?php if (!empty($cadaSlide['titulo'])) { ?>
                                        <h3><?= $cadaSlide["titulo"] ?></h3>
                                    <?php } ?>
                                    <p><?= $cadaSlide["descripcion"] ?></p>
                                </div>
                                <!--<div class="timeline__int--contenido__boton">
                                    <a href="<?= $cadaSlide["boton"]["url"] ?>" target="<?= $cadaSlide["boton"]["ventana"] ?>" class="btn"><?= $cadaSlide["boton"]["label"] ?></a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </section>

    </div>
    <?php the_content() ?>
    <section class="grilla">
        <div class="pestanas">
            <div class="pestanas__btns">
                <?php $indice = 0; foreach($contenidos as $cadaUno): ?>
                    <a href="#" class="<?php if($indice == 0): ?>activa<?php endif ?>">
                        <span class="normal"><img src="<?= $cadaUno["iconos"]["icono"]["url"] ?>" alt="<?= $cadaUno["iconos"]["icono"]["alt"] ?>" /></span> 
                        <span class="hover"><img src="<?= $cadaUno["iconos"]["icono_hover"]["url"] ?>" alt="<?= $cadaUno["iconos"]["icono_hover"]["alt"] ?>" /></span>
                        <?= $cadaUno["titulo"] ?>
                    </a>
                <?php $indice++; endforeach ?>
            </div>
            <div class="pestanas__contenedor">
                <?php $indice = 0; foreach($contenidos as $cadaUno): $content = estructura_contenidos($cadaUno["contenido"]) ?>
                    <div class="pestanas__indv <?php if($indice == 0): ?>activa<?php endif ?>">
                        <?= $content ?>
                    </div>
                <?php $indice++; endforeach ?>
            </div>
        </div>    
    </section>
</main>
<?php get_footer() ?>