<div class="px-2 px-xxl-5">
    <aside class="interna_header--barra">
        <nav>
            <ul>
                <li>
                    <a href="./">Home</a>
                </li>
                <?php
                if ( 'productor' == get_post_type() ):
                    ?>
                    <li>
                        <a href="./productores">Productores</a>
                    </li>
                    <?php
                endif;
                ?>
                <li>
                    <?php the_title() ?>
                </li>
            </ul>
        </nav>
    </aside>
    <div class="interna_header--titulo">
        <h1 class="font1">Explora el origen del <strong>aceite de palma sostenible</strong></h1>
    </div>
</div>