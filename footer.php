<?php 
    $sitename                       = get_bloginfo('name');
    $headerFooter                   = get_page_by_path('contenido-header-footer')->ID;
    $item                           = ($headerFooter) ? get_field('group_footer', $headerFooter) : null;
    $grupo_contacto                 = ($headerFooter) ? get_field('grupo_contacto', $headerFooter) : null;
    $grupo_contacto_targeta         = !empty($grupo_contacto['grupo_contacto_targeta']) ? $grupo_contacto['grupo_contacto_targeta'] : [];
    $contacto_titulo                = !empty($grupo_contacto_targeta['titulo']) ? $grupo_contacto_targeta['titulo']  : '';
    $contacto_informacion           = !empty($grupo_contacto_targeta['informacion']) ? $grupo_contacto_targeta['informacion']  : '';;
    $contacto_fondo                 = !empty($grupo_contacto_targeta['fondo']) ? esc_html( $grupo_contacto_targeta['fondo'])  : '';
    $contacto_fondo_informacion     = !empty($grupo_contacto_targeta['fondo_informacion']) ? $grupo_contacto_targeta['fondo_informacion']  : '';;
    $contacto_fondo_imagen          = !empty($grupo_contacto_targeta['fondo_imagen']) ? $grupo_contacto_targeta['fondo_imagen']  : '';;

    $contacto_imagen_id             = !empty($grupo_contacto_targeta['imagen']['ID']) ? $grupo_contacto_targeta['imagen']['ID'] : '';
    $contact_imagen_src             = wp_get_attachment_image_url($contacto_imagen_id, 'custom-size');
    $contact_imagen_srcset          = wp_get_attachment_image_srcset($contacto_imagen_id, 'custom-size-2x');
    $contact_imagen_info            = wp_get_attachment_image_src($contacto_imagen_id, 'full');
    $contact_imagen_width           = ($contact_imagen_info) ? $contact_imagen_info[1] : '';
    $contact_imagen_height          = ($contact_imagen_info) ? $contact_imagen_info[2] : '';
    $contact_imagen_alt             = ($contacto_imagen_id) ? get_post_meta($contacto_imagen_id, '_wp_attachment_image_alt', true) : ''; 
    $contact_imagen_title           = ($contacto_imagen_id) ? get_the_title($contacto_imagen_id) : '';

    $menu_title_1   = !empty($item['menu_title_1']) ? $item['menu_title_1'] : '';
    $menu_title_2   = !empty($item['menu_title_2']) ? $item['menu_title_2'] : '';
    $menu_title_3   = !empty($item['menu_title_3']) ? $item['menu_title_3'] : '';
    $titulo_social   = !empty($item['titulo_social']) ? $item['titulo_social'] : '';
    $copyright      = !empty($item['copyright']) ? $item['copyright'] : '';

    $menu1          = !empty($item['menu']) ? $item['menu'] : array();
    $menu2          = !empty($item['menu2']) ? $item['menu2'] : array();
    $menu3          = !empty($item['menu3']) ? $item['menu3'] : array();
    $social         = !empty($item['social']) ? $item['social'] : array();
    $imagen_social  = !empty($item['imagen_social']) ? esc_url($item['imagen_social']) : '';

    $grupo_footer_enlaces_servicios = ($headerFooter) ? get_field('grupo_footer_enlaces_servicios', $headerFooter) : null;
    $fondo                          = !empty($grupo_footer_enlaces_servicios['fondo']) ? esc_attr($grupo_footer_enlaces_servicios['fondo']) : '#ffffff'; // Valor por defecto: blanco
    $servicios                      = !empty($grupo_footer_enlaces_servicios['enlaces_servicios']) ? $grupo_footer_enlaces_servicios['enlaces_servicios'] : [];

    

?>
<!-- <div class="customFootercontacto">
    <div class="customFootercontacto__targeta" style="background-color: <?php echo $contacto_fondo; ?>">
        <div class="container--large">
            <div class="customFootercontacto__titulo">
                <h2 class="heading--36 color--fff"><?php echo $contacto_titulo; ?></h2>
            </div>
            <div class="customFootercontacto__grid">
                <div class="customFootercontacto__img" style="background-color: <?php echo $contacto_fondo_imagen; ?>">
                    <img width="<?php echo $contact_imagen_width; ?>" height="<?php echo $contact_imagen_height; ?>" src="<?php echo $contact_imagen_src; ?>" data-src="<?php echo $contact_imagen_src; ?>" srcset="<?php echo $contact_imagen_srcset; ?>" data-srcset="<?php echo $contact_imagen_srcset; ?>" alt="<?php echo $contact_imagen_alt . ' - ' . $sitename; ?>" title="<?php echo $contact_imagen_title; ?>">
                </div>
                <div class="customFootercontacto__info" style="background-color: <?php echo $contacto_fondo_informacion; ?>">
                    <?php echo $contacto_informacion; ?>
                </div>
            </div>
        </div>
    </div>
</div> -->

<?php if(!empty($servicios)) :?>
<div class="seccionServicios">
    <div class="seccionServicios__fondo" style="background-color: <?php echo $fondo; ?>">
        <div class="container--large">
            <div class="seccionServicios__grid">
                <?php foreach ($servicios as $servicio) {
                    $icono = isset($servicio['icono']) ? esc_url($servicio['icono']) : '';
                    $informacion = isset($servicio['informacion']) ? $servicio['informacion'] : '';

                    if ($icono && $informacion) { ?>
                        <div class="seccionServicios__item">
                            <img width="42" height="42" src="<?php echo $icono; ?>" alt="">
                            <div><?php echo $informacion; ?></div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<footer class="customFooter">
    <div class="customFooter__wrapper">
        <img class="customFooter__icon" src="<?php echo IMG_BASE . 'ico-heart.svg' ?>" alt="">
        <div class="customFooter__grid">
            <div class="customFooter__col">
                <h2><?php echo esc_attr($menu_title_1) ?></h2>
                <?php if($menu1) { ?>
                <ul>
                    <?php foreach ($menu1 as $key => $item) { ?>
                        <li>
                            <a title="<?php echo esc_attr($item['link']['title']); ?>" href="<?php echo esc_url($item['link']['url']); ?>" target="<?php echo esc_attr($item['link']['target']); ?>">
                                <?php echo esc_attr($item['link']['title']); ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
            <div class="customFooter__col">
                <h2><?php echo esc_attr($menu_title_2) ?></h2>
                <?php if($menu2) { ?>
                <ul>
                    <?php foreach ($menu2 as $key => $item) { ?>
                        <li>
                            <a title="<?php echo esc_attr($item['link']['title']); ?>" href="<?php echo esc_url($item['link']['url']); ?>" target="<?php echo esc_attr($item['link']['target']); ?>">
                                <?php echo esc_attr($item['link']['title']); ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
            <div class="customFooter__col">
                <h2><?php echo esc_attr($menu_title_3) ?></h2>
                <?php if($menu3) { ?>
                <ul>
                    <?php foreach ($menu3 as $key => $item) { ?>
                        <li>
                            <a title="<?php echo esc_attr($item['link']['title']); ?>" href="<?php echo esc_url($item['link']['url']); ?>" target="<?php echo esc_attr($item['link']['target']); ?>">
                                <?php echo esc_attr($item['link']['title']); ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
            <div class="customFooter__col">
                <h2><?php echo esc_attr($titulo_social) ?></h2>
                <div class="customFooter__social-col">
                    <?php if($social) { ?>
                        <ul>
                            <?php foreach ($social as $key => $item) { ?>
                                <li>
                                    <a title="<?php echo esc_attr($item['link']['title']); ?>" href="<?php echo esc_url($item['link']['url']); ?>" target="<?php echo esc_attr($item['link']['target']); ?>">
                                        <img src="<?php echo esc_attr($item['icon'])?>" alt="<?php echo esc_attr($item['link']['title']) . ' - FCI' ?>" title="<?php echo esc_attr($item['link']['title']); ?>">
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
                <div class="customFooter__social-img">
                    <img width="234" height="46" src="<?php echo $imagen_social; ?>" alt="vigilado supersalud '-' <?php echo $sitename; ?>" title="vigilado supersalud">
                </div>
            </div>
        </div>
    </div>
    <div class="customFooter__bottom">
        <div class="customFooter__bottom-wrapper">
            <div class="customFooter__bottom-grid">
                <div class="customFooter__bottom-col">
                    <div>
                        <?php echo $copyright; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</footer>
<?php wp_footer(); ?>