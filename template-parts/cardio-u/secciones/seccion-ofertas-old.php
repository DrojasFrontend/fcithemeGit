<?php 
$sitename      = esc_html(get_bloginfo('name'));
$grupo_ofertas = get_query_var('grupo_ofertas');
$titulo        = !empty($grupo_ofertas['titulo']) ? esc_html($grupo_ofertas['titulo']) : '';
$descripcion   = !empty($grupo_ofertas['descripcion']) ? esc_html($grupo_ofertas['descripcion']) : '';
$ofertas       = !empty($grupo_ofertas['ofertas']) ? $grupo_ofertas['ofertas'] : [];
?>

<section class="seccionCardioUOfertas">
    <div class="wrapper">
        <div class="seccionCardioUOfertas__titulo">
            <?php if($titulo) : ?>
            <h2 class="heading--48 color--002D72">
                <?php echo $titulo; ?>
            </h2>
            <?php endif; ?>
            
            <?php if($descripcion) : ?>
            <p class="heading--18 color--263956">
                <?php echo $descripcion; ?>
            </p>
            <?php endif; ?>
        </div>
        <!-- Desktop -->
        <div class="seccionCardioUOfertas__grid">
            <ul class="tab-links">
                <?php foreach ($ofertas as $key => $oferta) { ?>
                    <li class="<?php echo $key == 0 ? 'active' : ''; ?>">
                        <a class="heading--24 color--E40046" href="#tab<?php echo $key; ?>" title="<?php echo $oferta['oferta']?> - Más información">
                            <?php echo $oferta['oferta']?>
                            <img width="48" height="" src="<?php echo $oferta['icono']?>" alt="<?php echo $oferta['oferta'] . ' - ' . $sitename; ?>" title="<?php echo $oferta['oferta']?>">
                        </a>
                    </li>
                <?php } ?>
            </ul>

            <div class="tab-contenido">
                <?php foreach ($ofertas as $key => $oferta) { ?>
                    <div id="tab<?php echo $key; ?>" class="tab <?php echo $key == 0 ? 'active' : ''; ?>">
                        <div class="seccionCardioUOfertas__titulo">
                            <h3 class="heading--36 color--002D72"><?php echo $oferta['oferta']?></h3>
                            <p class="heading--18 color--263956"><?php echo $oferta['detalle']; ?></p>
                        </div>
                        <div class="seccionCardioUOfertas__articulos">
                            <?php foreach ($oferta['nombre_curso'] as $key => $curso) { 
                                setup_postdata($curso);
                                $id         = $curso->ID;
                                $titulo     = get_the_title($id);
                                $modalidad  = get_field('modalidad', $id);
                                $horas      = get_field('horas', $id);
                                $imagen     = get_field("imagen_curso", $id);
                                $imagen_id  = $imagen['ID'];
                            ?>
                                <article class="seccionCardioUCurso" aria-label="<?php echo $titulo; ?>" id="page-<?php echo $id; ?>">
                                    <a href="<?php the_permalink($id); ?>">
                                        <div class="seccionCardioUCurso__img">
                                            <?php if($imagen_id) : ?>
                                                <?php 
                                                    echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');
                                                ?>
                                            <?php else : ?>
                                                <img src="https://via.placeholder.com/372x532" alt="Imagen">
                                            <?php endif; ?>
                                        </div>
                                        <div class="seccionCardioUCurso__info">
                                            <h3 class="titulo heading--18 color--002D72"><?php echo $titulo; ?></h3>
                                            <p class="modalidad heading--14 color--677283">
                                                <?php 
                                                    get_template_part('template-parts/content', 'icono');
                                                    display_icon('ico-reloj'); 
                                                ?>
                                                <?php echo $modalidad; ?>
                                            </p>
                                            <p class="heading--14 color--677283">
                                                <?php 
                                                    get_template_part('template-parts/content', 'icono');
                                                    display_icon('ico-calendario'); 
                                                ?>
                                                <?php echo $horas; ?></p>
                                            <span>
                                                <span class="hover hover--rojo">Conoce más</span>
                                                <?php 
                                                    get_template_part('template-parts/content', 'icono');
                                                    display_icon('arrow-rojo'); 
                                                ?>
                                            </span>
                                        </div>
                                    </a>
                                </article>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Mobile -->
    <div class="seccionCardioUOfertasMobile">
        <?php foreach ($ofertas as $key => $oferta) { $key++?>
            <div class="seccionCardioUPreguntasAccordion__item">
                <button type="button" aria-label="<?php echo $oferta['oferta']; ?>" class="seccionCardioUPreguntasAccordion__title <?php echo $key == 1 ? 'active' : '' ?>">
                    <h3 class="heading--24 color--002D72"><?php echo $oferta['oferta']; ?></h3>
                    <?php 
                        get_template_part('template-parts/content', 'icono');
                        display_icon('arrow-down'); 
                    ?>
                </button>
                <div class="seccionCardioUPreguntasAccordion__tab" <?php echo $key == 1 ? 'style="display:block;"' : '' ?>>
                    <div class="seccionCardioUOfertas__titulo">
                        <p class="heading--18 color--263956"><?php echo $oferta['detalle']; ?></p>
                    </div>
                    <div class="seccionCardioUOfertas__articulos slickCardioUOfertasMobile slickPersonalizado">
                        
                        <?php foreach ($oferta['nombre_curso'] as $key => $curso) { 
                            setup_postdata($curso);
                            $id         = $curso->ID;
                            $titulo     = get_the_title($id);
                            $modalidad  = get_field('modalidad', $id);
                            $horas      = get_field('horas', $id);
                            $imagen     = get_field("imagen_curso", $id);
                            $imagen_id  = $imagen['ID'];
                        ?>
                            <article class="seccionCardioUCurso" aria-label="<?php echo $titulo; ?>" id="page-<?php echo $id; ?>">
                                <a href="<?php the_permalink($id); ?>">
                                    <div class="seccionCardioUCurso__img">
                                        <?php if($imagen_id) : ?>
                                            <?php 
                                                echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');
                                            ?>
                                        <?php else : ?>
                                            <img src="https://via.placeholder.com/372x532" alt="Imagen">
                                        <?php endif; ?>
                                    </div>
                                    <div class="seccionCardioUCurso__info">
                                        <h3 class="titulo heading--18 color--002D72"><?php echo $titulo; ?></h3>
                                        <p class="modalidad heading--14 color--677283">
                                            <?php 
                                                get_template_part('template-parts/content', 'icono');
                                                display_icon('ico-reloj'); 
                                            ?>
                                            <?php echo $modalidad; ?>
                                        </p>
                                        <p class="heading--14 color--677283">
                                            <?php 
                                                get_template_part('template-parts/content', 'icono');
                                                display_icon('ico-calendario'); 
                                            ?>
                                            <?php echo $horas; ?></p>
                                        <span>
                                            <span class="hover hover--rojo">Conoce más</span>
                                            <?php 
                                                get_template_part('template-parts/content', 'icono');
                                                display_icon('arrow-rojo'); 
                                            ?>
                                        </span>
                                    </div>
                                </a>
                            </article>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>