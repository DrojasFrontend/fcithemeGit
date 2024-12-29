<?php 
$sitename     = esc_html(get_bloginfo('name'));
$grupo_cursos = get_query_var('grupo_cursos');
$titulo       = !empty($grupo_cursos['titulo']) ? esc_html($grupo_cursos['titulo']) : '';
$fondo        = !empty($grupo_cursos['fondo']) ? $grupo_cursos['fondo'] : '';
$descripcion  = !empty($grupo_cursos['descripcion']) ? esc_html($grupo_cursos['descripcion']) : '';
$cursos       = !empty($grupo_cursos['cursos']) ? $grupo_cursos['cursos'] : [];
?>

<section class="seccionCardioUCursos">
    <div class="seccionCardioUCursos__fondo" style="background-color: <?php echo $fondo; ?>">
        <div class="wrapper">
            <div class="seccionCardioUCursos__titulo">
                <!-- TODO -->
                <!-- Cambiar titulo en paginas de cursos -->
                <?php if(is_page_template('page-template-lg/page-cardio-u-cursos.php')) : ?>
                    <h2 class="heading--48 color--002D72 texto-izq">
                        Otros cursos que te pueden interesar
                    </h2>
                <?php else:  ?>
                <!-- Mostrar titulo y descripción en otras paginas -->
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
                <?php endif; ?>
            </div>
        </div>
        <div class="seccionCardioUCursos__wrapper">
            <div class="slickCardioUCursos slickPersonalizado">
                <?php foreach ($cursos as $key => $curso) { 
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
</section>