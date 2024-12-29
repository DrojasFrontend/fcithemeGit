<?php 
$sitename                           = esc_html(get_bloginfo('name'));
$grupo_tab_tarjeta_texto_imagen     = get_field('grupo_tab_tarjeta_texto_imagen');
$posicion                           = !empty($grupo_tab_tarjeta_texto_imagen['posicion']) ? esc_html($grupo_tab_tarjeta_texto_imagen['posicion']) : '';
$subtitulo                          = !empty($grupo_tab_tarjeta_texto_imagen['subtitulo']) ? esc_html($grupo_tab_tarjeta_texto_imagen['subtitulo']) : '';
$titulo                             = !empty($grupo_tab_tarjeta_texto_imagen['titulo']) ? esc_html($grupo_tab_tarjeta_texto_imagen['titulo']) : '';
$descripcion                        = !empty($grupo_tab_tarjeta_texto_imagen['descripcion']) ? wp_kses_post($grupo_tab_tarjeta_texto_imagen['descripcion']) : '';
$cta                                = !empty($grupo_tab_tarjeta_texto_imagen['cta']) ? $grupo_tab_tarjeta_texto_imagen['cta'] : [];
$cta_url                            = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_titulo                         = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_target                         = !empty($cta['target']) ? $cta['target'] : '';
$imagen_id                          = !empty($grupo_tab_tarjeta_texto_imagen["imagen"]['ID']) ? $grupo_tab_tarjeta_texto_imagen["imagen"]['ID'] : '';
?>

<section class="etapaEspecialidadesTabTarjetaTextoImagen <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
    <div class="etapaEspecialidadesTabTarjetaTextoImagen__tab">
        <div class="container--large">
            <ul class="">
                <!-- <li><a href="#" class="<?php echo ($args['active'] === 'Cadera' ? 'active ' : '') . (isset($args['class']) ? $args['class'] : ''); ?>">Cadera</a></li> -->
                <li><a href="https://qa.lacardio.org/ortopedia-hombro-y-codo-legger/" class="<?php echo ($args['active'] === 'Hombro y codo' ? 'active ' : '') . (isset($args['class']) ? $args['class'] : ''); ?>">Hombro y codo</a></li>
                <li><a href="https://qa.lacardio.org/ortopedia-rodilla-legger/" class="<?php echo ($args['active'] === 'Rodilla' ? 'active ' : '') . (isset($args['class']) ? $args['class'] : ''); ?>">Rodilla</a></li>
                <li><a href="https://qa.lacardio.org/ortopedia-columna-legger/" class="<?php echo ($args['active'] === 'Columna' ? 'active ' : '') . (isset($args['class']) ? $args['class'] : ''); ?>">Columna</a></li>
                <!-- <li><a href="#" class="<?php echo ($args['active'] === 'Pie y tobillo' ? 'active ' : '') . (isset($args['class']) ? $args['class'] : ''); ?>">Pie y tobillo</a></li> -->
                <li><a href="https://qa.lacardio.org/ortopedia-pediatrica-legger/" class="<?php echo ($args['active'] === 'Infantil' ? 'active ' : '') . (isset($args['class']) ? $args['class'] : ''); ?>">Infantil</a></li>
                <!--li><a href="#" class="<?php echo ($args['active'] === 'Trauma y recontstrucción' ? 'active ' : '') . (isset($args['class']) ? $args['class'] : ''); ?>">Trauma y recontstrucción</a></li-->
            </ul>
        </div>
    </div>
    <div class="container--large">
        <div class="etapaEspecialidadesTabTarjetaTextoImagen__flex">
            <div class="etapaEspecialidadesTabTarjetaTextoImagen__col">
                <div class="etapaEspecialidadesTabTarjetaTextoImagen__info">
                    <?php if($subtitulo) : ?>
                        <p class="subheading color--002D72 uppercase"><?php echo $subtitulo;?></p>
                        <?php endif; ?>

                        <?php if($titulo) : ?>
                        <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
                        <?php endif; ?>

                        <?php if($descripcion) : ?>
                        <p class="heading--18 color--263956">
                            <?php echo $descripcion;?>
                        </p>
                        <?php endif; ?>

                        <?php if ($cta_url) : ?>
                        <a href="<?php echo $cta_url;?>" class="boton-v2 boton-v2--blanco-rojo" target="<?php echo $cta_target;?>">
                            <?php echo $cta_titulo;?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="etapaEspecialidadesTabTarjetaTextoImagen__col">
                <div class="etapaEspecialidadesTabTarjetaTextoImagen__img">
                    <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
                </div>
            </div>
        </div>
    </div>
</section>