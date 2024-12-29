<?php
$nombre = block_field('nombre', false); 
$cargo = block_field('cargo', false); 
?>
<div class="equipo_persona">
    <div class="equipo_persona__int3">
        <h3><?= $nombre ?></h3>
        <p><?= $cargo ?></p>
    </div>
</div>