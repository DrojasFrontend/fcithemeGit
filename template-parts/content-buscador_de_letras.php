<?php
$letras = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "#");
$seccion = (isset($args['seccion'])) ? $args['seccion'] : null;
if($seccion == 'home'){
    $enlace = '/buscador-servicios-y-especialidades/?letra=';
}else{
    $enlace = '#';
}
?>
<div class="buscador_de_letras__letras">
    <div class="buscador_de_letras__letras--int todas_las_letras">
        <?php foreach($letras as $letra): ?>
            <a href="<?= $enlace.$letra ?>" title="Letra <?php echo esc_attr($letra) ?>"><?= $letra ?></a>
        <?php endforeach ?>
    </div>
</div>