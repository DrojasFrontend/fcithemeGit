<?php
$titulo = block_field('titulo', false); 
$descripcion = block_field('descripcion', false); 


?>
<div class="block_filo_valor">
    <div class="block_filo_valor__int">
        <div class="block_filo_valor__line1">
            <div class="block_filo_valor__line1--icon">
                <img src="<?= block_field('icono') ?>" alt="<?= $titulo ?>">
            </div>
            <div class="block_filo_valor__line1--title">
                <h3><?= $titulo ?></h3>
            </div>
        </div>
        <div class="block_filo_valor__line2">
            <?= $descripcion ?>
        </div>
    </div>
</div>