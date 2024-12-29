<?php
$sitename = esc_html(get_bloginfo('name'));
$grupo_convenios = get_field('grupo_convenios');
$subtitulo = !empty($grupo_convenios['subtitulo']) ? esc_html($grupo_convenios['subtitulo']) : '';
$titulo = !empty($grupo_convenios['titulo']) ? esc_html($grupo_convenios['titulo']) : '';

$args = array(
    'post_type' => 'convenios',
    'posts_per_page' => -1,
    'orderby' => 'menu_order date',
    'order' => 'DESC',
    'post_status' => 'publish'
);

$convenios_query = new WP_Query($args); ?>

<div class="convenios visibleDesktop">
    <?php if ($convenios_query->have_posts()) { $group_id = 1; ?>
        <div class="tabs" data-group-id="group<?php echo esc_attr($group_id); ?>">
            <div class="tarjetas__wrapper">
                <div class="convenios__title">
                    <div class="container--large">
                        <p class="subheading color--002D72 uppercase"><?php echo $titulo; ?></p>
                        <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
                    </div>
                </div>
                <div class="container--large">
                    <?php 
                    // Guardamos los posts en un array para mantener el orden
                    $posts_array = array();
                    while ($convenios_query->have_posts()) {
                        $convenios_query->the_post();
                        $posts_array[] = get_post();
                    }
                    ?>
                    <ul class="tab-links">
                        <?php foreach ($posts_array as $index => $post) {
                            setup_postdata($post); ?>
                            <li class="<?php echo ($index === 0) ? 'active' : ''; ?>">
                                <a href="#tab<?php echo esc_attr($group_id . '-' . ($index + 1)); ?>">
                                    <?php echo get_the_title(); ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="container--large">
                <div class="tab-content">
                    <?php foreach ($posts_array as $index => $post) {
                        setup_postdata($post);
                        
                        $convenios = get_field("alianzas", get_the_ID());
                        $grupo_tarjeta = get_field("grupo_tarjeta", get_the_ID());

                        $tarjeta_titulo = !empty($grupo_tarjeta['titulo']) ? esc_html($grupo_tarjeta['titulo']) : '';
                        $tarjeta_descripcion = !empty($grupo_tarjeta['descripcion']) ? $grupo_tarjeta['descripcion'] : '';
                        $tarjeta_imagen_id = !empty($grupo_tarjeta["imagen"]['ID']) ? $grupo_tarjeta["imagen"]['ID'] : '';

                        $tarjeta_cta = !empty($grupo_tarjeta['cta']) ? $grupo_tarjeta['cta'] : [];
                        $tarjeta_cta_url = !empty($tarjeta_cta['url']) ? esc_url($tarjeta_cta['url']) : "";
                        $tarjeta_cta_titulo = !empty($tarjeta_cta['title']) ? esc_html($tarjeta_cta['title']) : "";
                        $tarjeta_cta_target = !empty($tarjeta_cta['target']) ? esc_attr($tarjeta_cta['target']) : "";
                        ?>
                        <div id="tab<?php echo esc_attr($group_id . '-' . ($index + 1)); ?>" 
                             class="tab <?php echo ($index === 0) ? 'active' : ''; ?>">
                            <?php if ($convenios) : ?>
                                <div class="tarjeta__grid">
                                    <?php foreach ($convenios as $convenio) { 
                                        $logo = $convenio["logo"];
                                        $lineas = $convenio["lineas"];
                                    ?>
                                        <div class="tarjeta">
                                            <div class="tarjeta__logo">
                                                <img src="<?php echo esc_url($logo); ?>" alt="" title="">
                                            </div>
                                            <p class="heading--12 color--263956 cita font-sans">Solicita tu cita por:</p>
                                            <div class="tarjeta__lineas">
                                                <?php foreach ($lineas as $linea) { ?>
                                                    <a href="<?php echo esc_url($linea['linea']['url']); ?>" 
                                                       target="<?php echo esc_attr($linea['linea']['target']); ?>" 
                                                       title="<?php echo esc_attr($linea['linea']['title']); ?>">
                                                        <img src="<?php echo esc_url($linea['icono']); ?>" 
                                                             alt="<?php echo esc_attr($linea['linea']['title']); ?>" 
                                                             title="<?php echo esc_attr($linea['linea']['title']); ?>">
                                                        <?php echo esc_html($linea['linea']['title']); ?>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                            <a href="/servicios/">
                                                <span>Ver los servicios incluidos</span>
                                                <?php 
                                                    get_template_part('template-parts/content', 'icono');
                                                    display_icon('arrow-rojo'); 
                                                ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php endif; ?>

                            <?php if($tarjeta_imagen_id) : ?>
                                <div class="conveniosImagenTexto">
                                    <div class="container--large">
                                        <div class="conveniosImagenTexto__flex">
                                            <div class="conveniosImagenTexto__col">
                                                <div class="conveniosImagenTexto__img">
                                                    <?php echo generar_imagen_responsive($tarjeta_imagen_id, 'custom-size', $sitename, ''); ?>
                                                </div>
                                            </div>
                                            <div class="conveniosImagenTexto__col">
                                                <div class="conveniosImagenTexto__info">
                                                    <?php if($tarjeta_titulo) : ?>
                                                        <h2 class="heading--48 color--002D72"><?php echo $tarjeta_titulo; ?></h2>
                                                    <?php endif; ?>

                                                    <?php if($tarjeta_descripcion) : ?>
                                                        <div class="heading--18 color--263956">
                                                            <?php echo $tarjeta_descripcion; ?>
                                                        </div>

                                                        <a href="<?php echo $tarjeta_cta_url; ?>" 
                                                           class="boton-v2 boton-v2--blanco-rojo" 
                                                           target="<?php echo $tarjeta_cta_target; ?>" 
                                                           title="<?php echo $tarjeta_cta_titulo; ?>">
                                                            <?php echo esc_html($tarjeta_cta_titulo); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php 
        wp_reset_postdata();
    } ?>
</div>