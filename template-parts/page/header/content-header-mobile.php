<nav class="customHeaderMobile__nav" id="js-menu-mobile">
    <?php
        $args = array(
            'menu'              => 'menu-principal',
            'container'         => false,
            'items_wrap'       => '<ul class="customHeaderMobile__ul">%3$s</ul>',
            'container_class'   => 'customHeaderMobile__bckg',
            'container_id'      => '',
            'walker'            => new Custom_Nav_Walker_Mobile()
        );
        wp_nav_menu($args);
    ?>
</nav>