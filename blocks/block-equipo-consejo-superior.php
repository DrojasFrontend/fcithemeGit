<?php
$titulo = block_field('titulo', false); 
$descripcion = block_field('descripcion', false); 
?>
<div class="equipo_persona">
    <div class="equipo_persona__int2">
        <h3><?= $titulo ?></h3>
        <?= $descripcion ?>
    </div>
</div>