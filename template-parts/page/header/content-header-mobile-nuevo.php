<nav class="customHeaderMobile__nav" id="js-menu-mobile">
    <div class="customHeader__buscar">
        <form role="search" method="get" class="" action="<?php echo home_url('/'); ?>">
            <input type="search" class="" placeholder="Buscar" value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit" class="search-submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
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