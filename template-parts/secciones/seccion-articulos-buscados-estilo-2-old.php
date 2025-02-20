<?php 
    $sitename = get_bloginfo('name');
    $args = array(
        'post_type'      => 'blog_fellows',
        'posts_per_page' => 100,
        'orderby'        => 'rand'
    );
    $blog_fellows_query = new WP_Query($args); 
?>

<section>
    <h2 class="heading--48 color--002D72">Últimos artículos</h2>
    <div class="seccionArticulos__articulos">
        <?php 
            if ($blog_fellows_query->have_posts()) : 
            $index = 0;
            while ($blog_fellows_query->have_posts()) : $blog_fellows_query->the_post();
                $titulo             = get_the_title();
                $link               = get_the_permalink();
                $foto_doctor_home   = !empty(get_field('foto_doctor_home')) ? esc_url(get_field('foto_doctor_home')) :  '';
                $foto_doctor_grande = !empty(get_field('foto_doctor_grande')) ? esc_url(get_field('foto_doctor_grande')) :  '';
                $nombre_doctor      = !empty(get_field('nombre_doctor')) ? esc_html(get_field('nombre_doctor')) : '';
                $apellido_doctor    = !empty(get_field('apellido_doctor')) ? esc_html(get_field('apellido_doctor')) : '';
                $introduccion       = !empty(get_field('introduccion')) ? get_field('introduccion') : '';
                $fecha              = get_the_date('j F, Y');

                $clase = '';
            ?>
                <article class="seccionArticulos__articulo post-item <?php echo $clase ?>">
                    <a href="<?php echo $link; ?>" class="seccionArticulos__link" title="">
                        <img class="seccionArticulos__img" width="164" height="164" src="<?php echo $foto_doctor_home?>" alt="<?php echo $nombre_doctor . ' ' . $apellido_doctor . ' - ' . $sitename; ?>" title="<?php echo $nombre_doctor . ' ' . $apellido_doctor?>">
                        <div class="seccionArticulos__info">
                            <header>
                                <p class="heading--15 color--002D72"><?php echo $nombre_doctor . ' ' . $apellido_doctor; ?></p>
                            </header>
                            <footer>
                                <h3 class="heading--24 color--002D72"><?php echo $titulo; ?></h3>
                                <p class="heading--11 color--717C7D"><?php echo $fecha; ?></p>
                            </footer>
                        </div>
                    </a>
                </article>
            <?php $index++; endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No se han encontrado posts.</p>';
        endif; ?>
    </div>

    <button type="button" class="boton-v2 boton-v2--blanco-rojo m-auto" data-vermas>Ver más noticias</button>
</section>

<script>
    $(document).ready(function () {
        $(".post-item").slice(0, 6).show();
        $("[data-vermas]").click(function (e) {
        e.preventDefault();

        $(".post-item:hidden").slice(0, 3).fadeIn("slow");

        if ($(".post-item:hidden").length == 0) {
            $("[data-vermas]").fadeOut("slow");
        }
        });
    })
</script>