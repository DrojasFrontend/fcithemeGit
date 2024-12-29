<?php 
$sitename           = esc_html(get_bloginfo('name'));
$grupo_titulo_items = get_query_var('grupo_titulo_items');
$fondo              = !empty($grupo_titulo_items['fondo']) ? $grupo_titulo_items['fondo'] : '';
$titulo             = !empty($grupo_titulo_items['titulo']) ? esc_html($grupo_titulo_items['titulo']) : '';
$items              = !empty($grupo_titulo_items["items"]) ? $grupo_titulo_items["items"] : [];
?>

<section class="seccionCardioUTituloItems">
    <div class="seccionCardioUTituloItems__fondo" style="background-color: <?php echo $fondo; ?>">
        <div class="wrapper">
            <div class="seccionCardioUTituloItems__titulo">
                <?php if($titulo) : ?>
                <h2 class="heading--48 color--002D72">
                    <?php echo $titulo; ?>
                </h2>
                <?php endif; ?>
            </div>
            <?php if($items) : ?>
                <ul class="seccionCardioUTituloItems__items">
                    <?php foreach ($items as $key => $curso) { $key++ ?>
                        <li>
                            <span class="heading--46 numero">0<?php echo $key; ?></span>
                            <h3 class="heading--24 color--002D72">
                                <?php echo $curso['titulo']?>
                            </h3>
                            <p class="heading--18 color--263956">
                                <?php echo $curso['descripcion']?>
                            </p>
                        </li>
                    <?php } ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</section>