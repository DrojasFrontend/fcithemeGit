<?php 
get_query_var('titulo_categoria', $titulo_categoria);
?>
<section class="seccionArticulosCategorias">
    <h2 class="heading--15 color--002D72"><?php echo $titulo_categoria?></h2>
    <div class="seccionArticulosCategorias__cat">
        <span class="heading--13 color--002D72">Respiratorio</span>
        <span class="heading--13 color--002D72">Cardiovascular</span>
        <span class="heading--13 color--002D72">Gastrointestinal</span>
        <span class="heading--13 color--002D72">Renal</span>
        <span class="heading--13 color--002D72">Neurológico</span>
        <span class="heading--13 color--002D72">Endocrino</span>
        <span class="heading--13 color--002D72">Hematológico</span>
        <span class="heading--13 color--002D72">Dermatológico</span>
        <span class="heading--13 color--002D72">Ortopédico</span>
    </div>
    <a href="#" class="boton boton--normal color--E40046">
        Ver todas las categorías
        <i><img width="24" height="24" src="<?php echo IMG_BASE . 'icono-chevron-rojo.svg'?>" alt="icono siguiente" title="icono siguiente"></i>
    </a>
</section>