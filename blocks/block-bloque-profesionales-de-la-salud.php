<?php
$titulo = block_field('titulo', false); 
$enlace = block_field('enlace', false); 
?>
<div class="bloque__profesionalsalud">
    <div class="bloque__profesionalsalud__int">
        <div class="bloque__profesionalsalud__contenido">
            <div class="bloque__profesionalsalud__contenido__int">
                <h3><?= $titulo ?></h3>
                <div class="bloque__profesionalsalud__contenido__btn">
                    <a href="<?= $enlace ?>">Conoce más</a>
                </div>
            </div>
        </div>
        <div class="bloque__profesionalsalud__bg">
            <div class="bloque__profesionalsalud__bg__capa"></div>
            <div class="bloque__profesionalsalud__bg__imagen">
                <img src="<?= block_field('foto') ?>" alt="<?= $titulo ?>">
            </div>
        </div>
    </div>
</div>

