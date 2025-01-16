<nav class="customHeader__nav">
    <?php
        $args = array(
            'menu'              => 'menu-principal',
            'container'         => false,
            'items_wrap'       => '<ul class="customHeader__ul">%3$s</ul>',
            'container_class'   => 'customHeader__bckg',
            'container_id'      => '',
            'walker'            => new Custom_Nav_Walker()
        );
        wp_nav_menu($args);
    ?>
</nav>