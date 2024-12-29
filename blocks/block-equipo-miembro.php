<?php
$nombre = block_field('nombre', false); 
$cargo = block_field('cargo', false); 
?>
<div class="equipo_persona">
    <div class="equipo_persona__int">
        <div class="equipo_persona__content">
            <div class="equipo_persona__content--int">
                <div class="equipo_persona__content--int__cont">
                    <h3><?= $nombre ?></h3>
                    <p><?= $cargo ?></p>
                </div>
            </div>
        </div>
        <div class="equipo_persona__bg">
            <img src="<?= block_field('foto') ?>" alt="<?= strip_tags($nombre) ?>">
        </div>
    </div>
</div>