<?php
$url = block_field('url', false); 
$elegido = block_field('elegido', false); 
if($elegido == 1): 
?>
<div class="proyectos__logo elegido">
    <div class="proyectos__logo__int">
        <a href="<?= $url ?>">
            <img src="<?= block_field('logo') ?>" alt="<?= strip_tags($nombre) ?>">
        </a>
    </div>
</div>
<?php else: ?>
    <div class="proyectos__logo">
        <div class="proyectos__logo__int">
            <a href="<?= $url ?>">
                <img src="<?= block_field('logo') ?>" alt="<?= strip_tags($nombre) ?>">
            </a>
        </div>
    </div>
<?php endif ?>