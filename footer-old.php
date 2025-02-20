



<?php 
    $sitename     = get_bloginfo('name');
    $headerFooter = get_page_by_path('contenido-header-footer')->ID;
    $item         = ($headerFooter) ? get_field('group_footer', $headerFooter) : null;

    $menu_title_1 = isset($item['menu_title_1']) ? $item['menu_title_1'] : '';
    $menu_title_2 = isset($item['menu_title_2']) ? $item['menu_title_2'] : '';
    $menu_title_3 = isset($item['menu_title_3']) ? $item['menu_title_3'] : '';
    $copyright    = isset($item['copyright']) ? $item['copyright'] : '';

    $menu1        = isset($item['menu']) ? $item['menu'] : array();
    $menu2        = isset($item['menu2']) ? $item['menu2'] : array();
    $menu3        = isset($item['menu3']) ? $item['menu3'] : array();
    $social       = isset($item['social']) ? $item['social'] : array();

?>
<footer class="customFooter">
    <div class="customFooter__wrapper">
        <img class="customFooter__icon" src="/wp-content/themes/fcitheme/assets/img/ico-heart.svg" alt="Icono Heart - FCI" title="Icono Heart">
        <div class="customFooter__grid">
            <div class="customFooter__col">
                <h2><?php echo esc_attr($menu_title_1) ?></h2>
                <ul>
                    <?php foreach ($menu1 as $key => $item) { ?>
                        <li>
                            <a title="<?php echo esc_attr($item['link']['title']); ?>" href="<?php echo esc_url($item['link']['url']); ?>" target="<?php echo esc_attr($item['link']['target']); ?>">
                                <?php echo esc_attr($item['link']['title']); ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="customFooter__col">
                <h2><?php echo esc_attr($menu_title_2) ?></h2>
                <ul>
                    <?php foreach ($menu2 as $key => $item) { ?>
                        <li>
                            <a title="<?php echo esc_attr($item['link']['title']); ?>" href="<?php echo esc_url($item['link']['url']); ?>" target="<?php echo esc_attr($item['link']['target']); ?>">
                                <?php echo esc_attr($item['link']['title']); ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="customFooter__col">
                <h2><?php echo esc_attr($menu_title_3) ?></h2>
                <ul>
                    <?php foreach ($menu3 as $key => $item) { ?>
                        <li>
                            <a title="<?php echo esc_attr($item['link']['title']); ?>" href="<?php echo esc_url($item['link']['url']); ?>" target="<?php echo esc_attr($item['link']['target']); ?>">
                                <?php echo esc_attr($item['link']['title']); ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="customFooter__copy">
            <p>
                Copyright © 2023 - Todos los derechos<br />
                Fundación Cardioinfantil Insituto de cardiología<br />
                Calle 163A # 13B - 60 Bogotá, Colombia
            </p>
            <a href="https://www.supersalud.gov.co/es-co/Paginas/Home.aspx" target="_blank" class="d-block mb-4">
                <img class="img-fluid" src="https://www.lacardio.org/wp-content/uploads/2023/07/logo-vigilado-supersalud-blanco.png" alt="Vigilado Supersalud" width="200px;">
                </a>
            <a href="https://www.procuraduria.gov.co/Pages/Inicio.aspx" target="_blank" class="d-none mb-4">
                <img class="img-fluid" src="https://www.lacardio.org/wp-content/uploads/2023/11/600px-Logo_Procuraduria_Colombia-white.png" alt="Procuraduria General de la Nación" >
            </a>
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
                <div class="customFooter__bottom-col">
                    <ul>
                        <?php foreach ($social as $key => $item) { ?>
                            <li>
                                <a title="<?php echo esc_attr($item['link']['title']); ?>" href="<?php echo esc_url($item['link']['url']); ?>" target="<?php echo esc_attr($item['link']['target']); ?>">
                                    <img src="<?php echo esc_attr($item['icon'])?>" alt="<?php echo esc_attr($item['link']['title']) . ' - FCI' ?>" title="<?php echo esc_attr($item['link']['title']); ?>">
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</footer>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/customjs.js?v=1.0.2"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
<!--<script src="https://cdn.userway.org/widget.js" data-account="vwa46G5ExJ"></script>-->

<?php wp_footer(); ?>

        </div>
    </div>
</body>
</html>