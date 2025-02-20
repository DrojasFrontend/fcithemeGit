<footer class="footer_new">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="footer__logo">
                    <div class="logo">
                        <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/general/lacardio_logo.svg" alt="LaCardio" title="Logo LaCardio" width="117" height="45">
                        <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/fci/fundacion_logo_footer.png" alt="Fundación Cardioinfantil" title="Logo Fundación Cardioinfantil" width="160" height="41" style="height: 41px;">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="footer__tel">
                    <a href="tel:3178938441" title="(+601) 667 2727 | Desde celular #627" target="_blank">(+601) 667 2727 | Desde celular #627</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3 col-lg-4">
                <div class="footer_social">
                    <div class="socials">
                        <?php echo get_template_part('template-parts/content', 'social'); ?>
                    </div>
                    <div class="locations">
                        <h2>Visítanos</h2>
                        <ul>
                            <li>
                                <a href="https://www.google.com/maps/dir//LaCardio,+Cl.+163a+%2313B-60,+Bogot%C3%A1/@4.7413741,-74.0340666,17.58z/data=!4m17!1m7!3m6!1s0x8e3f857e94ac005b:0xb99723bc9a368850!2sLaCardio!8m2!3d4.7413984!4d-74.0345157!16s%2Fg%2F1z449w_k7!4m8!1m0!1m5!1m1!1s0x8e3f857e94ac005b:0xb99723bc9a368850!2m2!1d-74.0345157!2d4.7413984!3e1?entry=ttu" title="Sede Principal">
                                    Sede Principal<br>
                                    <span>
                                        Calle 163A #13B-60 <br>
                                        Bogotá, Colombia
                                    </span>
                                </a>                                 
                            </li>
                            <li>
                                <a href="https://www.google.com/maps/dir//LaCardio102,+110141,+Bogot%C3%A1/@4.6881728,-74.0518966,18.17z/data=!4m17!1m7!3m6!1s0x8e3f9b49ced2df09:0x51d4426167bfa4fd!2sLaCardio102!8m2!3d4.6878918!4d-74.0520536!16s%2Fg%2F11t6vz_1n3!4m8!1m0!1m5!1m1!1s0x8e3f9b49ced2df09:0x51d4426167bfa4fd!2m2!1d-74.0520536!2d4.6878918!3e1?entry=ttu" title="Centro Ambulatorio">
                                    Centro Ambulatorio<br>
                                    <span>
                                        Avenida Carrera 19 #102-31 <br>
                                        Bogotá, Colombia
                                    </span>
                                </a>                                 
                            </li>
                            <li>
                                <a href="/ubicacion-de-instalaciones-163/" title="Ubicación de instalaciones">Ubicación de instalaciones</a> 
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9 col-lg-8">
                <div class="footer_menu">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="menu__element">
                                <h2>Conócenos</h2>
                                <?php
                                    $menuToUse = 'menu_footer_medicos';
                                    if (has_nav_menu($menuToUse)) {
                                        /* wp_nav_menu(array(
                                            'theme_location'        => $menuToUse,
                                            'container'             => 'nav',
                                            'container_class'       => $menuToUse,
                                            'menu_class'            => $menuToUse,
                                            'depth'                 => 0,
                                        )); */
                                        wp_nav_menu(array(
                                            'theme_location'  => $menuToUse,
                                            'container'       => 'nav',
                                            'container_class' => $menuToUse,
                                            'menu_class'      => $menuToUse, 
                                            'depth'           => 0, 
                                            'walker'          => new Walker_Menu_Footer()
                                        ));
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="menu__element">
                                <h2>Consúltanos</h2>
                                <?php
                                    $menuToUse = 'menu_footer_estudiantes';
                                    if (has_nav_menu($menuToUse)) {
                                        wp_nav_menu(array(
                                            'theme_location'  => $menuToUse,
                                            'container'       => 'nav',
                                            'container_class' => $menuToUse,
                                            'menu_class'      => $menuToUse, 
                                            'depth'           => 0, 
                                            'walker'          => new Walker_Menu_Footer()
                                        ));
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="menu__element">
                                <h2>Contáctanos</h2>
                                <?php
                                    $menuToUse = 'menu_footer_internacionales';
                                    if (has_nav_menu($menuToUse)) {
                                        wp_nav_menu(array(
                                            'theme_location'  => $menuToUse,
                                            'container'       => 'nav',
                                            'container_class' => $menuToUse,
                                            'menu_class'      => $menuToUse, 
                                            'depth'           => 0, 
                                            'walker'          => new Walker_Menu_Footer()
                                        ));
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="menu__element">
                                <p>
                                   
                                    <strong>Solicitud de historia clínica:</strong><br />
                                    <a href="mailto:resultados@cardioinfantil.org" title="resultados@cardioinfantil.org">resultados@cardioinfantil.org</a><br />
                                    <strong>Notificaciones judiciales:</strong><br />
                                    <a href="mailto:notificacionesjudiciales@lacardio.org" title="notificacionesjudiciales@lacardio.org">notificacionesjudiciales@lacardio.org</a><br />
                                    <strong>Radicación de factura electrónica:</strong><br />
                                    <a href="mailto:recepcionfacturaelectronica@lacardio.org" title="recepcionfacturaelectronica@lacardio.org">recepcionfacturaelectronica@lacardio.org</a><br />
                                    <strong>Correo de canal de denuncias:</strong><br />
                                    <a href="mailto:recepcionfacturaelectronica@lacardio.org" title="somostransparentes@lacardio.org">somostransparentes@lacardio.org</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="footer__end">
					<!--<p>
                        <a href="https://www.lacardio.org/politica-privacidad/">Política de Privacidad</a>
                    </p>-->
                    <p>
                        Copyright © 2023 - Todos los derechos<br />
                        Fundación Cardioinfantil Insituto de cardiología<br />
                        Calle 163A # 13B - 60 Bogotá, Colombia
                    </p>
                    <div class="img__end" style="text-align: center;">
                        <a href="https://www.supersalud.gov.co/es-co/Paginas/Home.aspx" target="_blank" class="d-block mx-4 mb-4" title="Sitio Web Supersalud">
                            <img class="img-fluid" src="https://www.lacardio.org/wp-content/uploads/2024/04/logo-vigilado-supersalud-blanco.webp" alt="Vigilado Supersalud" title="Logo Vigilado Supersalud" width="240" height="47">
                        </a>
                        <a href="https://www.procuraduria.gov.co/Pages/Inicio.aspx" target="_blank" class="d-none mx-4 mb-4" title="Sitio Web Procuraduria">
                            <img class="img-fluid" src="https://www.lacardio.org/wp-content/uploads/2023/11/600px-Logo_Procuraduria_Colombia-white.png" alt="Procuraduria General de la Nación" title="Logo Procuraduria General de la Nación" >
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
            
<?php 
class Walker_Menu_Footer extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : $item->title;  // Set title attribute to be the same as the menu item title or specific attribute title
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

?>
            <?php
            /*
            <!-- FOOTER V1 <footer class="footer">
                <div class="container g-0">
                    <div class="row g-0">
                        <div class="col-12">
                            <section class="footer_up">
                                <div class="logo">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/general/lacardio_logo.svg" alt="laCardio">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/fci/fundacion_logo_footer.png" alt="Fundación Cardioinfantil">
                                </div>
                                <div class="comunicate">
                                    <p> (+57) 601 6672727 | Desde celular #627</p>
                                </div>
                            </section>
                            <section class="footer_down">

                                <div class="footer_down--menu">
                                    <h2>Conócenos</h2>
                                    <?php
                                    $menuToUse = 'menu_footer_medicos';
                                    if (has_nav_menu($menuToUse)) {
                                        wp_nav_menu(array(
                                            'theme_location'        => $menuToUse,
                                            'container'             => 'nav',
                                            'container_class'       => $menuToUse,
                                            'menu_class'            => $menuToUse,
                                            'depth'                 => 0,
                                        ));
                                    }
                                    ?>
                                </div>
                                <div class="footer_down--menu">
                                    <h2>Consúltanos</h2>
                                    <?php
                                    $menuToUse = 'menu_footer_estudiantes';
                                    if (has_nav_menu($menuToUse)) {
                                        wp_nav_menu(array(
                                            'theme_location'        => $menuToUse,
                                            'container'             => 'nav',
                                            'container_class'       => $menuToUse,
                                            'menu_class'            => $menuToUse,
                                            'depth'                 => 0,
                                        ));
                                    }
                                    ?>
                                </div>
                                <div class="footer_down--menu">
                                    <h2>Visítanos</h2>
                                    <ul>
                                        <li>
                                            <strong>Sede Principal</strong><br />
                                            Cl. 163a #13B-60<br />
                                            <strong>Sede ambulatorio 102:</strong><br />
                                            Av. Cra 19 #102-31
                                        </li>
                                    </ul>
                                    <?php
                                    $menuToUse = 'menu_footer_investigadores';
                                    if (has_nav_menu($menuToUse)) {
                                        wp_nav_menu(array(
                                            'theme_location'        => $menuToUse,
                                            'container'             => 'nav',
                                            'container_class'       => $menuToUse,
                                            'menu_class'            => $menuToUse,
                                            'depth'                 => 0,
                                        ));
                                    }
                                    ?>
                                </div>
                                <div class="footer_down--menu">
                                    <h2>Contáctanos</h2>
                                    <?php
                                    $menuToUse = 'menu_footer_internacionales';
                                    if (has_nav_menu($menuToUse)) {
                                        wp_nav_menu(array(
                                            'theme_location'        => $menuToUse,
                                            'container'             => 'nav',
                                            'container_class'       => $menuToUse,
                                            'menu_class'            => $menuToUse,
                                            'depth'                 => 0,
                                        ));
                                    }
                                    ?>
                                </div>

                            </section>
                            <section class="footer_down_down">
                                <div class="footer_down_down--fila">
                                    <div class="footer_down_down--menu">
                                        <p><a href="#">Términos y Condiciones</a> | <a href="#">Mapa de Sitio</a></p>
                                        <p>Copyright © 2023 - Todos los derechos<br />
                                        Fundación Cardioinfantil Insituto de cardiología<br />
                                        Calle 163A # 13B - 60 Bogotá, Colombia</p>

                                    </div>
                                    <div class="footer_down_down--menu">
                                        <p>
                                            <strong>Correo de PQRS</strong><br />
                                            <a href="mailto:fciquejas@lacardio.org">fciquejas@lacardio.org</a><br />
                                            <strong>Solicitud de historia clínica:</strong><br />
                                            <a href="mailto:resultados@cardioinfantil.org">resultados@cardioinfantil.org</a><br />
                                            <strong>Notificaciones judiciales:</strong><br />
                                            <a href="mailto:notificacionesjudiciales@lacardio.org">notificacionesjudiciales@lacardio.org</a><br />
                                            <strong>Radicación de factura electrónica:</strong><br />
                                            <a href="mailto:recepcionfacturaelectronica@lacardio.org">recepcionfacturaelectronica@lacardio.org</a><br />
											<strong>Correo de canal de denuncias:</strong><br />
                                            <a href="mailto:recepcionfacturaelectronica@lacardio.org">somostransparentes@lacardio.org</a>
                                        </p>
                                    </div>
                                </div>
                            </section>
                            
                        </div>
                    </div>
                </div>
                <section class="footer_bar ">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-4 mb-4 mb-md-0 text-center text-md-start">
                                <div class="redes">
                                    <?php echo get_template_part('template-parts/content', 'social'); ?>
                                </div>
                            </div>
                            <div class="col-12 col-md-8 d-flex justify-content-center justify-content-md-end">
                                <p>
                                    <strong>Funcionarios</strong><br />
                                    <a href="#">Intranet</a> | <a href="#">Correo Institucional</a> | <a href="#">Sistema de Gestión</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </footer> -->
            */
            ?>

        </div><!-- cuerpo -->
    </div><!-- aplus_contenedor -->


<?php /*
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.4.0.js"></script>
*/ ?>


<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/customjs.js?v=1.0.2"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
<!--<script src="https://cdn.userway.org/widget.js" data-account="vwa46G5ExJ"></script>-->

<?php wp_footer(); ?>

</body>
</html>