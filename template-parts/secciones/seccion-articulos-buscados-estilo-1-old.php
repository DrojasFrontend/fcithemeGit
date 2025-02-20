<?php 
    $sitename                   = get_bloginfo('name');
    $grupo_articulos_buscados   =  get_field('grupo_articulos_buscados');
    $titulo                     =  $grupo_articulos_buscados['titulo'];
?>

<?php $args = array(
        'post_type'      => 'blog_fellows',
        'posts_per_page' => 3,
    );
    $blog_fellows_query = new WP_Query($args); 
?>

<section class="seccionArticulosBuscados">
    <div class="seccionArticulosBuscados__fondo">
        <div class="container--large">
            <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
            <div class="seccionArticulosBuscados__articulos slickArticulos slickPersonalizado">
                <?php 
                    if ($blog_fellows_query->have_posts()) : 
                    $index = 1;
                    while ($blog_fellows_query->have_posts()) : $blog_fellows_query->the_post();?>
                        <div>
                            <article id="post-<?php the_ID(); ?>" class="seccionArticulosBuscados__articulo" data="<?php echo $index; ?>">
                                <?php 
                                $titulo             = get_the_title();
                                $link               = get_the_permalink();
                                $foto_doctor_home   = get_field('foto_doctor_home');
                                $nombre_doctor      = !empty(get_field('nombre_doctor')) ? esc_html(get_field('nombre_doctor')) : '';
                                $apellido_doctor    = !empty(get_field('apellido_doctor')) ? esc_html(get_field('apellido_doctor')) : '';
                                $fecha              = get_the_date('j F, Y');
                                ?>
                                <a href="<?php echo $link; ?>" class="seccionArticulosBuscados__link" title="<?php echo $titulo; ?>">
                                    <!-- <span class="heading--36 color--05C3DE">0<?php echo $index; ?></span> -->
                                    <div class="seccionArticulosBuscados__info">
                                        <header class="seccionArticulosBuscados__header">
                                            <?php if($foto_doctor_home) { ?>
                                                <img class="seccionArticulosBuscados__img" width="48" height="48" src="<?php echo $foto_doctor_home?>" alt="<?php echo $nombre_doctor . ' ' . $apellido_doctor . ' - ' . $sitename; ?>" title="<?php echo $nombre_doctor . ' ' . $apellido_doctor?>">
                                            <?php } else { ?>
                                                <img class="seccionArticulosBuscados__noimg" src="<?php echo IMG_BASE . 'ico-heart.svg' ?>" alt="">
                                            <?php } ?>
                                            <p class="heading--18 color--002D72"><?php echo $nombre_doctor . ' ' . $apellido_doctor; ?></p>
                                        </header>
                                        <footer class="seccionArticulosBuscados__footer">
                                            <h3 class="heading--18 color--002D72"><?php echo $titulo; ?></h3>
                                            <p class="heading--12 color--717C7D"><?php echo $fecha; ?></p>
                                        </footer>
                                    </div>
                                </a>
                            </article>
                        </div>
                        
                    <?php $index++; endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No se han encontrado posts.</p>';
                endif; ?>
            </div>
        </div>
    </div>
</section>
