<?php 
get_query_var('titulo_articulos_ultimos', $titulo_articulos_ultimos);

$args = array(
    'post_type'      => 'blog_fellows',
    'posts_per_page' => 3,
    'orderby'        => 'rand'
);
$blog_fellows_query = new WP_Query($args);

?>
<section class="seccionArticulosUltimos">
    
    <div class="seccionArticulosUltimos__fondo">
        <h2 class="heading--36 color--002D72"><?php echo $titulo_articulos_ultimos; ?></h2>
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