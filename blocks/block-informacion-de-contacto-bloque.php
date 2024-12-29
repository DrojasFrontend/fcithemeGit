<?php
$titulo = block_field('titulo', false); 
$descripcion = block_field('descripcion', false); 
$boton_label = block_field('boton-label', false); 
$boton_enlace = block_field('boton-enlace', false); 

?>

<div class="bloque__infocontacto">
    <div class="bloque__infocontacto__int">
        <div class="bloque__infocontacto__icono">
            <img src="<?= block_field('icono') ?>" alt="<?= $descripcion ?>">
        </div>
        <div class="bloque__infocontacto__descrip">
            <?= $descripcion ?>
        </div>
        <?php if($boton_enlace != "" && $boton_label != ""): ?>
            <div class="bloque__infocontacto__enlace">
                <a href="<?= $boton_enlace ?>" class="btn"><?= $boton_label ?></a>
            </div>
        <?php endif ?>
    </div>
</div>