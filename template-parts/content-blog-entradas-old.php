<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h2>Conoce nuestro <strong>blog</strong></h2>
            <p>
                <a href="/blog/">Ver Todo <i class="fas fa-chevron-right"></i></a>
            </p>
        </div>
    </div>
    <div class="row">
        
        <?php
            $argumentos_cirugias = array(
                'post_type' => 'post', // Your Post type Name that You Registered
                'posts_per_page' => 3,
                'order' => 'DESC'
            );
            $publicaciones = new WP_Query($argumentos_cirugias);

            if ($publicaciones->have_posts()) :
                while ($publicaciones->have_posts()) :
                    $publicaciones->the_post();
                    $video = get_post_meta($post->ID, 'video', 1);

                        $foto = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'large');
                        ?>
                        <div class="col-12 mb-3 mb-lg-0 col-lg-4">
                            <a href="<?php the_permalink(); ?>" class="entrada-blog">
                                <div class="-int">
                                    <div class="-foto">
                                        <img src="<?php echo $foto; ?>" alt="<?php the_title(); ?>">
                                    </div>
                                    <div class="-contenido">
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        
    </div>
</div>