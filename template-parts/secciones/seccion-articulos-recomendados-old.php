<?php 
$titulo_recomendados = !empty(get_query_var('titulo_recomendados')) ? esc_html(get_query_var('titulo_recomendados')) : '';
$titulo_entrada = !empty(get_query_var('titulo_entrada')) ? esc_html(get_query_var('titulo_entrada')) : '';
$tipo_entrada = !empty(get_query_var('tipo_entrada')) ? esc_html(get_query_var('tipo_entrada')) : '';

$args = array(
    'post_type'      => $tipo_entrada,
    'posts_per_page' => 3,
    'orderby'        => 'rand'
);
$blog_fellows_query = new WP_Query($args);

?>
<section class="seccionArticulosUltimos seccionArticulosRecomendados">
    
    <div class="seccionArticulosUltimos__fondo">
        <h2 class="heading--36 color--AD96DC">
            <?php if($titulo_recomendados) { ?>
                <?php echo $titulo_recomendados; ?>
            <?php } else { ?>
                <?php echo $titulo_entrada; ?>
            <?php } ?>
        </h2>
        <?php 
            if ($blog_fellows_query->have_posts()) : 
            $index = 1;
            while ($blog_fellows_query->have_posts()) : $blog_fellows_query->the_post();
                $titulo             = get_the_title();
                $fecha              = get_the_date('j F, Y');
            ?>
            <article class="seccionArticulosUltimos__articulo">
                <span class="heading--64">0<?php echo $index; ?></span>
                <header>
                    <h3 class="heading--18"><?php echo $titulo; ?></h3>
                </header>
                <footer>
                    <p class="heading--12"><?php echo $fecha; ?></p>
                </footer>
            </article>
        <?php $index++; endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No se han encontrado posts.</p>';
        endif; ?>
    </div>
</section>