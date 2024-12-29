<?php
$titulo = block_field('titulo', false); 
$descripcion = block_field('descripcion', false); 
$estilo = block_field('estilo', false); 
if($estilo == 'imagen'){
    $estilo_css = 'nuestro_ser_valor_agreg';
}
if($estilo == 'icono'){
    $estilo_css = 'acreditados_y_reconocidos';
}
?>
<div class="<?= $estilo_css ?>">
    <div class="<?= $estilo_css ?>__int">
        <div class="<?= $estilo_css ?>__img">
            <img src="<?= block_field('imagen') ?>" alt="<?= strip_tags($descripcion) ?>">
        </div>
        <div class="<?= $estilo_css ?>__titulo">
            <?= $titulo ?>
        </div>
        <div class="<?= $estilo_css ?>__descripcion">
            <?= $descripcion ?>
        </div>
    </div>
</div>