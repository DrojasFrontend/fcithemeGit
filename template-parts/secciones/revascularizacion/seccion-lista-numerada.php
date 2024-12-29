<?php 
$sitename             = esc_html(get_bloginfo('name'));
$grupo_lista_numerada = get_query_var('grupo_lista_numerada');
$titulo               = !empty($grupo_lista_numerada['titulo']) ? esc_html($grupo_lista_numerada['titulo']) : '';
$subtitulo            = !empty($grupo_lista_numerada['subtitulo']) ? esc_html($grupo_lista_numerada['subtitulo']) : '';
$listas               = !empty($grupo_lista_numerada['listas']) ? $grupo_lista_numerada['listas'] : array();
?>

<section class="seccionRevListaNumerada">
    <div class="seccionRevListaNumerada__fondo">
        <div class="wrapper">
            <div class="seccionRevListaNumerada__titulo">
                <?php if($subtitulo) : ?>
                <p class="subheading color--fff"><?php echo $subtitulo; ?></p>
                <?php endif; ?>

                <?php if($titulo) : ?>
                <h2 class="heading--48 color--fff"><?php echo $titulo; ?></h2>
                <?php endif; ?>
            </div>
            <div class="seccionRevListaNumerada__listas">
                <?php 
                $key;
                foreach ($listas as $key => $lista) {
                ?>
                    <div class="seccionRevListaNumerada__lista">
                        <span class="numero color--fff">0<?php echo $key + 1; ?></span>
                        <p class="heading--18 color--fff"><?php echo $lista['detalle']?></p>
                        <?php $key++; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>