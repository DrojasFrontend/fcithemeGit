<?php
$imagen = block_field('imagen', false); 
$titulo = block_field('titulo', false); 
$descripcion = block_field('descripcion', false); 
?>
<div class="junta_medica">
    <div class="junta_medica__int">
        <div class="junta_medica__foto">
            <img src="<?= block_field('imagen') ?>" alt="<?= $titulo ?>">
        </div>
        <div class="junta_medica__content">
            <div class="junta_medica__content__int">
                <h2><?= $titulo ?></h2>
                <div class="junta_medica__content__descrip">
                    <?= $descripcion ?>
                </div>
            </div>
        </div>
    </div>
</div>