<?php
$texto = block_field('texto', false); 
?>
<div class="blog_fellows_perfil">
    <div class="blog_fellows_perfil__int">
        <div class="blog_fellows_perfil__foto">
            <img src="<?= block_field('foto') ?>" alt="Blog Fellows">
        </div>
        <div class="blog_fellows_perfil__content">
            <div class="blog_fellows_perfil__content__int">
                <?= $texto ?>
            </div>
        </div>
    </div>
</div>