<?php 
$sitename           = esc_html(get_bloginfo('name'));
$grupo_icono_texto  = get_field("grupo_icono_texto");
$titulo             = !empty($grupo_icono_texto["titulo"]) ? esc_html($grupo_icono_texto["titulo"]) : '';
$items              = !empty($grupo_icono_texto["items"]) && is_array($grupo_icono_texto["items"]) ? $grupo_icono_texto["items"] : [];
?>

<section class="seccionIconoTexto">
    <div class="container--large">
        <div class="seccionIconoTexto__titulo">
            <?php if ($titulo): ?>
                <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
            <?php endif; ?>
        </div>

        <ul>
            <?php foreach ($items as $key => $item) { 
                $texto  = !empty($item['texto']) ? esc_html($item['texto']) : '';
                $icono  = !empty($item['icono']) ? $item['icono'] : '';
            ?>
                <li>
                    <img width="" height="" src="<?php echo $icono; ?>" alt="<?php echo $texto ; ?>">
                    <?php if($texto) { ?>
                        <h3 class="heading--24 color--002D72"><?php echo $texto; ?></h3>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
        
    </div>
</section>
