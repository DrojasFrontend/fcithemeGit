<?php 
    $sitename           = get_bloginfo('name');
    $headerFooter       = get_page_by_path('contenido-header-footer')->ID;
    $item               = ($headerFooter) ? get_field('group_footer', $headerFooter) : null;

    $menu_title_1 = isset($item['menu_title_1']) ? $item['menu_title_1'] : '';
    $menu_title_2 = isset($item['menu_title_2']) ? $item['menu_title_2'] : '';
    $menu_title_3 = isset($item['menu_title_3']) ? $item['menu_title_3'] : '';
    $copyright = isset($item['copyright']) ? $item['copyright'] : '';

    $menu1 = isset($item['menu']) ? $item['menu'] : array();
    $menu2 = isset($item['menu2']) ? $item['menu2'] : array();
    $menu3 = isset($item['menu3']) ? $item['menu3'] : array();
    $social = isset($item['social']) ? $item['social'] : array();

?>
<footer class="customFooter">
    <div class="customFooter__wrapper">
        <img class="customFooter__icon" src="<?php echo IMG_BASE . 'ico-heart.svg' ?>" alt="Icono Heart - FCI" title="Icono Heart">
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