<?php
$titulo = block_field('titulo', false); 
$subtitulo = block_field('subtitulo', false); 
$descripcion = block_field('descripcion', false); 
?>
<div class="premio_individual">
    <div class="premio_individual__int">
        <div class="premio_individual__imagen">
            <img src="<?= block_field('imagen') ?>" alt="<?= strip_tags($titulo) ?>">
        </div>
        <div class="premio_individual__titulo">
            <h3><?= $titulo ?></h3>
            <?php if($subtitulo != ""): ?>
                <h4><?= $subtitulo ?></h4>
            <?php endif ?>
        </div>
        <div class="premio_individual__descripcion">
            <?= $descripcion ?>
        </div>
    </div>
</div>