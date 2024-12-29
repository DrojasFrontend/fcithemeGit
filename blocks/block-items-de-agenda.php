<?php
$hora = block_field('hora', false); 
$item = block_field('item', false); 
$descripcion = block_field('descripcion', false); 
?>
<div class="agenda_items">
    <div class="agenda_items__hora">
        <?= $hora ?>
    </div>
    <div class="agenda_items__item">
        <?= $item ?>
    </div>
    <div class="agenda_items__descripcion">
        <?= $descripcion ?>
    </div>
</div>