<?php
$nombre = block_field('nombre', false); 
$cargo = block_field('cargo', false); 
?>
<div class="equipo__persona">
    <div class="equipo__persona__cont">
        <div class="equipo__persona__content">
            <div class="equipo__persona__content__int">
                <h3><?= $nombre ?></h3>
                <p><?= $cargo ?></p>
            </div>
        </div>
        <div class="equipo__persona__bg">
            <div class="equipo__persona__sombra"></div>
            <img src="<?= block_field('imagen') ?>" alt="<?= strip_tags($nombre) ?>">
        </div>
    </div>
</div>