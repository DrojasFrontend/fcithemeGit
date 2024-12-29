<?php 
get_query_var('titulo_articulos_ultimos', $titulo_articulos_ultimos);
$recomendados = $grupo_barra_lateral['grupo_articulos_recomendados']['recomendados'];
?>

<section class="seccionArticulosUltimos">
    <div class="seccionArticulosUltimos__fondo">
        <h2 class="heading--36 color--002D72"><?php echo $titulo_articulos_ultimos; ?></h2>
        <?php 
            if (!empty($recomendados) && is_array($recomendados)) {
                $index = 1; // Iniciar el índice en 1
                foreach ($recomendados as $post) { ?>
                    <article class="seccionArticulosUltimos__articulo">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                            <span class="heading--64">0<?php echo esc_html($index); ?></span>
                            <header>
                                <h3 class="heading--18"><?php echo esc_html($post->post_title); ?></h3>
                            </header>
                            <footer>
                                <p class="heading--12"><?php echo esc_html(get_the_date('j F, Y', $post->ID)); ?></p>
                            </footer>
                        </a>
                    </article>
                <?php 
                    $index++; // Incrementar el índice en cada iteración
                }
            }
        ?>
    </div>
</section>