<?php
$descripcion = block_field('descripcion', false); 
?>
<div class="block_filo_objetivo">
    <div class="block_filo_objetivo__int">
        <div class="block_filo_objetivo__icono">
            <img src="<?= block_field('icono') ?>" alt="<?= strip_tags($descripcion) ?>">
        </div>
        <div class="block_filo_objetivo__descripcion">
            <?= $descripcion ?>
        </div>
    </div>
</div>