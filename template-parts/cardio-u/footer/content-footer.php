<?php 
$sitename            = get_bloginfo('name');
$headerFooterCardioU = get_page_by_path('cardiou-contenido-header-footer')->ID;
$grupo_footer        = ($headerFooterCardioU) ? get_field('grupo_footer', $headerFooterCardioU) : null;
$grupo_logo          = !empty($grupo_footer['grupo_logo']) ? $grupo_footer['grupo_logo'] : '';
$logo                = $grupo_logo['imagen'];

$headerFooter        = get_page_by_path('contenido-header-footer')->ID;
$item                = ($headerFooter) ? get_field('group_footer', $headerFooter) : null;
$social              = !empty($item['social']) ? $item['social'] : array();

$items               = !empty($grupo_footer['grupo_menu']) ? $grupo_footer['grupo_menu'] : [];
$grupo_copyright     = $grupo_footer['grupo_copyright'];
$copyright           = $grupo_copyright['copyright'];

?>
<footer class="seccionCardioUFooter">
    <div class="seccionCardioUFooter__fondo">
        <div class="wrapper">
            <div class="seccionCardioUFooter__grid">
                <div class="seccionCardioUFooter__logo">
                    <a href="/cardio-u" title="Cardio u">
                        <img src="<?php echo $logo; ?>" alt="CardioU - <?php echo $sitename; ?>" title="CardioU">
                    </a>
                </div>
                <nav class="seccionCardioUFooter__menu">
                    <ul>
                        <?php foreach ($items['items'] as $key => $item) { 
                            $url    = $item['enlace']['url']   ; 
                            $titulo = $item['enlace']['title']; 
                            $target = $item['enlace']['target']; 
                        ?>
                            <li>
                                <h2>
                                    <a class="heading--14" href="<?php echo $url ?>" target="<?php echo $target ?>" title="<?php echo $titulo ?> - link">
                                        <?php echo $titulo ?>
                                    </a>
                                </h2>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <div class="seccionCardioUFooter__copy">
                <p class="heading--12 color--fff"><?php echo $copyright; ?></p>
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
        </div>
    </div>
</footer>
