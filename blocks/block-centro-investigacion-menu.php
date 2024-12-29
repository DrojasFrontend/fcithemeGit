<?php
$menu_elegido = block_field('menu-elegido', false); 
$menus = array(
    array(
        "elegido" => "como_investigar",
        "enlace" => "/como-investigar-en-la-cardio/",
        "texto" => "¿Cómo Investigar en La cardio?",
    ),
    array(
        "elegido" => "gestion",
        "enlace" => "/gestion-de-proyectos/",
        "texto" => "Gestión de proyectos",
    ),
    array(
        "elegido" => "sobre_el_centro",
        "enlace" => "/sobre-elcentro/",
        "texto" => "Sobre el centro",
    ),
	array(
        "elegido" => "grupos_investigacion",
        "enlace" => "/grupos-de-investigacion/",
        "texto" => "Grupos de investigaci&oacute;n",
    ),
    array(
        "elegido" => "convocatorias",
        "enlace" => "/convocatorias-de-financiacion/",
        "texto" => "Convocatorias de formación y financiación",
    ),
	
	
);
?>

<div class="centro_investigacion__menu">
    <div class="centro_investigacion__menu__int">
        <?php foreach($menus as $menu): ?>
            <?php if($menu_elegido == $menu["elegido"]): ?>
                <div class="centro_investigacion__menu--indv">
                    <div class="seleccionado">
                        <span class="icon">
                            <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/fci/investigacion_icon_2.svg" alt="<?= $menu["texto"] ?>">
                        </span>
                        <h2 class="texto text-white">
                            <?= $menu["texto"] ?>
                        </h2>
                    </div>
                </div>
            <?php else: ?>
                <div class="centro_investigacion__menu--indv">
                    <a href="<?= $menu["enlace"] ?>">
                        <span class="icon">
                            <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/fci/investigacion_icon_1.svg" class="normal" alt="<?= $menu["texto"] ?>">
                            <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/fci/investigacion_icon_2.svg" class="hover" alt="<?= $menu["texto"] ?>">
                        </span>
                        <h2 class="texto">
                            <?= $menu["texto"] ?>
                        </h2>
                    </a>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</div>