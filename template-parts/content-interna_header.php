<div class="interna_header">
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
        <div class="interna_header--barra__lang">
            <button class="btn btn-lang1">English</button>
        </div>
    </aside>
    <div class="interna_header--linea"></div>
    <div class="interna_header--titulo">
        <?php
        if ( 'post' == get_post_type() || 'productor' == get_post_type() ):
            ?>
            <div class="fecha">
                <p>
                    <?php 
                    $fecha = get_the_date('d \d\e F \d\e Y');
                    echo $fecha;
                    ?>
                </p>
            </div>
            <?php
        endif;
        ?>        
        <h1><?php the_title() ?></h1>
        <?php
        if ( 'productor' == get_post_type() ):
            ?>
            <h2>Propietario de finca</h2>
            <?php
        endif;
        ?>
    </div>
</div>