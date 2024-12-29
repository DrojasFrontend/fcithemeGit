<?php
/* 
Para que el paginador funcione, tiene que invocar una variable llamada "página" que tenga el WP_query
*/
global $pagina, $curpage;

// $curpage = 5;
// $pagina->max_num_pages = 20;

$pag_inicial = 1;
$termina_pager = 10;

if($curpage > 5){
    $pag_inicial = $curpage - 5;
    $termina_pager = $curpage + 5;
}

if($termina_pager > $pagina->max_num_pages){
    $termina_pager = $pagina->max_num_pages;
}


if($pagina->max_num_pages > 1): ?>
<div class="paginador py-5">
    <ul>
        <?php if($curpage > 1): ?>
            <li>
                <a href="<?= get_pagenum_link(($curpage - 1 > 0 ? $curpage - 1 : 1)); ?>"><i class="fas fa-arrow-left"></i></a>
            </li>
        <?php endif; ?>

        <?php for ($i = $pag_inicial; $i <= $termina_pager; $i++): ?>
        <?php if($i == $curpage): ?>
            <li class="activo">
                <?= $i ?>
            </li>
        <?php else: ?>
            <li>
                <a href="<?= get_pagenum_link($i) ?>"><?= $i ?></a>
            </li>
        <?php endif; ?>
        <?php endfor; ?>

        <?php if($curpage < $pagina->max_num_pages): ?>
            <li>
                <a href="<?= get_pagenum_link(($curpage + 1 <= $pagina->max_num_pages ? $curpage + 1 : $pagina->max_num_pages)) ?>"><i class="fas fa-arrow-right"></i></a>
            </li>
        <?php endif; ?>
    </ul>
</div>
<?php endif; ?>