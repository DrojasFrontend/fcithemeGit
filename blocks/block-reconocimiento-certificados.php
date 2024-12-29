<?php
$titulo = block_field('titulo', false); 
$descripcion = block_field('descripcion', false); 
$enlace = block_field('enlace', false); 
$label = block_field('label', false); 
?>
<div class="reconocimiento_certificado">
    <div class="reconocimiento_certificado__int">
        <h3><?= $titulo ?></h3>
        <div class="reconocimiento_certificado__descripcion">
            <p><?= $descripcion ?></p>
        </div>
        <div class="reconocimiento_certificado__enlace">
            <p><a href="<?= $enlace ?>"><?= $label ?></a></p>
        </div>
    </div>
</div>