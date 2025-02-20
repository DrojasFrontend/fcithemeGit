<?php 
    $grupo_texto_descripcion_items       = get_field('grupo_texto_descripcion_items');
    $titulo                   = !empty($grupo_texto_descripcion_items['titulo']) ? esc_html($grupo_texto_descripcion_items['titulo']) : '';
    $descripcion              = !empty($grupo_texto_descripcion_items['descripcion']) ? esc_html($grupo_texto_descripcion_items['descripcion']) : '';
?>

<section class="seccionTextDescItems">
    <div class="container--large">
        <div class="seccionTextDescItems__flex">
            <div class="especialidades__info">
                <?php if($titulo) : ?>
                    <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
                <?php endif; ?>
                <?php if($descripcion) : ?>
                    <p class="heading--18 color--263956"><?php echo $descripcion;?></p>
                <?php endif; ?>
            </div>
            <ul class="especialidades__lista">
                <?php if( have_rows('grupo_texto_descripcion_items') ): ?>
                    <?php while( have_rows('grupo_texto_descripcion_items') ): the_row(); 
                        if( have_rows('items') ):
                            while( have_rows('items') ): the_row();
                                $cta = get_sub_field('cta');
                    ?>
                        <li>
                            <a href="<?php echo esc_url($cta['url']); ?>" target="<?php echo esc_attr($cta['target'] ?: '_self'); ?>">
                                <?php echo esc_html($cta['title']); ?>
                            </a>
                        </li>
                    <?php 
                            endwhile;
                        endif;
                    endwhile; 
                    ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>