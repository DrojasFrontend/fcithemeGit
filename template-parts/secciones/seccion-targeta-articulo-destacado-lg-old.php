<?php 
    $sitename                 = get_bloginfo('name');
    $grupo_articulo_destacado = get_field("grupo_articulo_destacado");
    $obj_articulo_destacado   = $grupo_articulo_destacado['articulo_destacado'];
    
    $articulo_destacado_titulo  = $obj_articulo_destacado->post_title;
    $articulo_destacado_url     = $obj_articulo_destacado->post_type . '/' . $obj_articulo_destacado->post_name;

    $foto_doctor_grande = get_field('foto_doctor_grande', $obj_articulo_destacado->ID);
    $nombre_doctor      = get_field('nombre_doctor', $obj_articulo_destacado->ID);
    $apellido_doctor    = get_field('apellido_doctor', $obj_articulo_destacado->ID);
    $introduccion       = get_field('introduccion', $obj_articulo_destacado->ID);
    $fecha              = get_the_date('j F, Y');
?>

<section>
    <div class="seccionArticulos__targeta">
        <div class="seccionArticulos__articulos">
            <div class="seccionArticulos__cat">
                <p class="heading--12">ARTÍCULO DESTACADO</p>
            </div>
            <article class="seccionArticulos__articulo">
                <a href="/<?php echo $articulo_destacado_url; ?>" class="seccionArticulos__link" title="<?php echo $nombre_doctor?>">
                    <?php if(empty($foto_doctor_grande)) : ?>
                        <img class="seccionArticulos__img" width="721" height="269" src="<?php echo IMG_BASE . 'placeholder-image.webp'; ?>" alt="<?php echo $nombre_doctor . ' ' . $apellido_doctor . ' - ' . $sitename; ?>" title="<?php echo $nombre_doctor . ' ' . $apellido_doctor?>">
                        <?php else : ?>
                        <img class="seccionArticulos__img" width="721" height="269" src="<?php echo $foto_doctor_grande?>" alt="<?php echo $nombre_doctor . ' ' . $apellido_doctor . ' - ' . $sitename; ?>" title="<?php echo $nombre_doctor . ' ' . $apellido_doctor?>">
                    <?php endif ?>
                    <div class="seccionArticulos__info">
                        <header>
                            <p class="heading--15 color--002D72"><?php echo $nombre_doctor . ' ' . $apellido_doctor; ?></p>
                        </header>
                        <footer>
                            <h3 class="heading--24 color--002D72"><?php echo $articulo_destacado_titulo; ?></h3>
                            <div class="heading--18">
                                <?php echo $introduccion; ?>
                            </div>
                            <p class="heading--11 color--717C7D"><?php echo $fecha; ?></p>    
                        </footer>
                    </div>
                </a>
            </article>
        </div>
    </div>
</section>