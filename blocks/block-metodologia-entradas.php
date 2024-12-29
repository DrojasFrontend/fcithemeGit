<?php
$titulo = block_field('titulo', false); 
$descripcion = block_field('descripcion', false); 
?>
<div class="metodologia__entrada">
    <div class="metodologia__entrada__int">
        <div class="metodologia__entrada__imagen">
            <img src="<?= block_field('imagen') ?>" alt="<?= strip_tags($titulo) ?>">
        </div>
        <h3><?= $titulo ?></h3>
        <div class="metodologia__entrada__descripcion">
            <p><?= $descripcion ?></p>
        </div>
    </div>
</div>