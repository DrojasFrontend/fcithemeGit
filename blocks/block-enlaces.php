<?php
$titulo = block_field('titulo', false); 
$enlace = block_field('enlace', false); 
?>
<div class="enlacecustom">
    <div class="enlacecustom__int">
        <div class="enlacecustom__texto">
            <?= $titulo ?>
        </div>
        <div class="enlacecustom__btn">
            <a href="<?= $enlace ?>">Ver aquí</a>
        </div>
    </div>
</div>