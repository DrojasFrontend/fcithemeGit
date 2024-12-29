<?php
$titulo = block_field('titulo', false); 
$fecha = block_field('fecha', false); 
$descripcion = block_field('descripcion', false); 
$video = block_field('video', false); 

?>
<div class="testimonios_pacientes">
    <div class="testimonios_pacientes__int">
        <div class="testimonios_pacientes__img">
            <a href="<?= $video ?>" data-fancybox="">
                <img src="<?= block_field('imagen') ?>" alt="<?= strip_tags($descripcion) ?>">
            </a>
        </div>
        <?php if($titulo != ""): ?>
            <div class="testimonios_pacientes__titulo">
                <?= $titulo ?>
            </div>
        <?php endif ?>
        <?php if($fecha != ""): ?>
            <div class="testimonios_pacientes__fecha">
                <?= $fecha ?>
            </div>
        <?php endif ?>
        <?php if($descripcion != ""): ?>
            <div class="testimonios_pacientes__descripcion">
                <?= $descripcion ?>
            </div>
        <?php endif ?>
    </div>
</div>