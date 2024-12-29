<?php 
     $sitename = get_bloginfo('name');
    $args = array(
        'post_type'      => 'blog_fellows',
        'posts_per_page' => 100,
        'orderby'        => 'date',
        'order'          => 'DESC'
    );
    $blog_fellows_query = new WP_Query($args);
?>

<section>
    <h2 class="heading--48 color--002D72">Últimos artículos</h2>
    <div class="seccionArticulos__articulos">
		
        <?php 
            if ($blog_fellows_query->have_posts()) : 
            $index = 0;
            while ($blog_fellows_query->have_posts()) : $blog_fellows_query->the_post();
                $titulo             = get_the_title();
                $link               = get_the_permalink();
                $foto_doctor_home   = !empty(get_field('foto_doctor_home')) ? esc_url(get_field('foto_doctor_home')) :  '';
                $foto_doctor_grande = !empty(get_field('foto_doctor_grande')) ? esc_url(get_field('foto_doctor_grande')) :  '';
                $nombre_doctor      = !empty(get_field('nombre_doctor')) ? esc_html(get_field('nombre_doctor')) : '';
                $apellido_doctor    = !empty(get_field('apellido_doctor')) ? esc_html(get_field('apellido_doctor')) : '';
                $introduccion       = !empty(get_field('introduccion')) ? get_field('introduccion') : '';
                $fecha              = get_the_date('j F, Y');

                $clase = '';
            ?>
                <article class="seccionArticulos__articulo post-item <?php echo $clase ?>">
                    <a href="<?php echo $link; ?>" class="seccionArticulos__link" title="">
                        <?php if($foto_doctor_home) : ?>
                            <img class="seccionArticulos__img" width="164" height="164" src="<?php echo $foto_doctor_home?>" alt="<?php echo $nombre_doctor . ' ' . $apellido_doctor . ' - ' . $sitename; ?>" title="<?php echo $nombre_doctor . ' ' . $apellido_doctor?>">
                        <?php else : ?>
                            <img class="seccionArticulos__img" width="721" height="269" src="<?php echo IMG_BASE . 'placeholder-image.webp'; ?>" alt="<?php echo $nombre_doctor . ' ' . $apellido_doctor . ' - ' . $sitename; ?>" title="<?php echo $nombre_doctor . ' ' . $apellido_doctor?>">
                        <?php endif ?>
                        <div class="seccionArticulos__info">
                            <header>
                                <p class="heading--15 color--002D72"><?php echo $nombre_doctor . ' ' . $apellido_doctor; ?></p>
                            </header>
                            <footer>
                                <h3 class="heading--24 color--002D72"><?php echo $titulo; ?></h3>
                                <p class="heading--11 color--717C7D"><?php echo $fecha; ?> - 8 min de lectura</p>
                            </footer>
                        </div>
                    </a>
                </article>
            <?php $index++; endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No se han encontrado posts.</p>';
        endif; ?>
		<!--
		
		<article class="seccionArticulos__articulo post-item">
			<a href="https://www.lacardio.org/blog_fellows/mavacamten-for-treatment-of-symptomatic-obstructive-hypertrophic-cardiomyopathy-explorer-hcm-a-randomised-double-blind-placebo-controlled-phase-3-trial/" class="seccionArticulos__link" title="Dr. Luis E. Giraldo">
				<img class="seccionArticulos__img" width="164" height="164" src="https://www.lacardio.org/wp-content/uploads/2023/05/9-1.jpg" alt="Dr. Luis E. Giraldo - Fellow de Cardiología" title="Dr. Luis E. Giraldo">
				<div class="seccionArticulos__info">
					<header>
						<p class="heading--15 color--002D72">Dr. Luis E. Giraldo</p>
					</header>
					<footer>
						<h3 class="heading--24 color--002D72">Mavacamten for treatment of symptomatic obstructive hypertrophic cardiomyopathy (EXPLORER-HCM): a randomised, double-blind, placebo-controlled, phase 3 trial.</h3>
						<p class="heading--11 color--717C7D">07 Septiembre, 2021 - 8 min de lectura</p>
					</footer>
				</div>
			</a>
		</article>

		<article class="seccionArticulos__articulo post-item">
			<a href="https://www.lacardio.org/blog_fellows/intervencion-coronaria-percutanea-guiada-por-ffr-comparado-con-cirugia-de-puentes-coronarios-una-mirada-racional-al-fame-3/" class="seccionArticulos__link" title="Dra. Angela M. Herrera">
				<img class="seccionArticulos__img" width="164" height="164" src="https://www.lacardio.org/wp-content/uploads/2022/04/Angela-Herrera.webp" alt="Dra. Angela M. Herrera - Fellow Cardiología" title="Dra. Angela M. Herrera">
				<div class="seccionArticulos__info">
					<header>
						<p class="heading--15 color--002D72">Dra. Angela M. Herrera</p>
					</header>
					<footer>
						<h3 class="heading--24 color--002D72">Intervención coronaria percutánea guiada por FFR comparado con cirugía de puentes coronarios. Una mirada racional al FAME 3.</h3>
						<p class="heading--11 color--717C7D">17 Abril, 2022 - 8 min de lectura</p>
					</footer>
				</div>
			</a>
		</article>

		<article class="seccionArticulos__articulo post-item">
			<a href="https://www.lacardio.org/blog_fellows/cardiovascular-and-renal-outcomes-with-efpeglenatide-in-type-2-diabetes/" class="seccionArticulos__link" title="Dr. Jonathan Patiño">
				<img class="seccionArticulos__img" width="164" height="164" src="https://www.lacardio.org/wp-content/uploads/2023/05/7-1.jpg" alt="Dr. Jonathan Patiño - Fellow de Cardiología" title="Dr. Jonathan Patiño">
				<div class="seccionArticulos__info">
					<header>
						<p class="heading--15 color--002D72">Dr. Jonathan Patiño</p>
					</header>
					<footer>
						<h3 class="heading--24 color--002D72">Cardiovascular and Renal Outcomes with Efpeglenatide in Type 2 Diabetes.</h3>
						<p class="heading--11 color--717C7D">08 Febrero, 2022 - 8 min de lectura</p>
					</footer>
				</div>
			</a>
		</article>

		-->
		
		
    </div>

    <button type="button" class="boton-v2 boton-v2--blanco-rojo m-auto" data-vermas>Ver más articulos</button>
</section>