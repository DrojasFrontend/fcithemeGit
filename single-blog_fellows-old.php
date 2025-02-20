<?php
get_header();

$fecha_de_publicacion = get_field('fecha_de_publicacion');
$revista = get_field('revista');
$paginas = get_field('paginas');
$nombre_doctor = get_field('nombre_doctor');  /////////
$apellido_doctor = get_field('apellido_doctor');  ////////
$cargo = get_field('cargo');  ////////
$autor_home = get_field('autor_home');
$foto_doctor_home = get_field('foto_doctor_home'); //////// √√
$autor = get_field('autor'); ///////
$imagenes_de_muestra = get_field('imagenes_de_muestra');
$imagenes_de_muestra_2 = get_field('imagenes_de_muestra_2');
$imagenes_de_muestra_3 = get_field('imagenes_de_muestra_3');
$introduccion = get_field('introduccion');    /////////
$titulo_metodologia = get_field('titulo_metodologia');
$metodologia = get_field('metodologia');   //////
$titulo_desenlaces_medidos = get_field('titulo_desenlaces_medidos');
$desenlaces_medidos = get_field('desenlaces_medidos');
$titulo_resultados = get_field('titulo_resultados');
$resultados = get_field('resultados');
$titulo_discusion = get_field('titulo_discusion');
$discusion = get_field('discusion');
$titulo_conclusion = get_field('titulo_conclusion');
$conclusion = get_field('conclusion');
$titulo_debe_esto_cambiar_la_practica_actual = get_field('titulo_debe_esto_cambiar_la_practica_actual');
$titulo_bibliografia = get_field('titulo_bibliografia');
$bibliografia = get_field('bibliografia');
$debe_esto_cambiar_la_practica_actual = get_field('debe_esto_cambiar_la_practica_actual');
$mostrar_en_la_lista_de_profesionales = get_field('mostrar_en_la_lista_de_profesionales');
$subtitulo = '';

?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="blog_fellows">
    <section class="blog_fellows--banner">
        <div class="blog_fellows--banner__int">
            <div class="blog_fellows--banner__contenido">
                <h1><?= get_the_title() ?></h1>
                <h2><?= $subtitulo ?></h2>
            </div>
            <div class="blog_fellows--banner__imagen">
                <div class="blog_fellows--banner__sombra"></div>
                <?= get_the_post_thumbnail($post->ID, 'full', array('class' => 'w-100'));
                ?>
            </div>
        </div>
    </section>
	<div class="container socials-fellows my-3">
		<div class="row">
			<div class="col-12">
				<?php echo get_template_part('template-parts/content', 'compartir'); /* Módulo de compartir */ ?> 
			</div>
		</div>
	</div>
    <section class="container-fluid g-0 blog_fellows--contenido">
        <div class="container g-0">
            <div class="row g-0">
                <div class="col-12 blog-cont">
                    <div class="blog_fellows--contenido__cont">

                    <div>

                    </div>

                        <div class="wp-block-columns blog_fellows_contenedor is-layout-flex wp-container-3 columnitas">
                            <div class="wp-block-column is-layout-flow">
                                <div class="blog_fellows_perfil">
                                    <div class="blog_fellows_perfil__int">
                                        <div class="blog_fellows_perfil__foto">
                                            <?php if($foto_doctor_home != ""): ?>
                                            <?php endif ?>
                                            <img src="<?= $foto_doctor_home ?>" alt="Blog Fellows">
                                        </div>
                                        <div class="blog_fellows_perfil__content">
                                            <div class="blog_fellows_perfil__content__int">
                                                <p>Dr. <?= $nombre_doctor ." " . $apellido_doctor . ", " . $cargo ?></p>
                                                <div class="fellow_autor">
                                                    <?= str_replace("<p>&nbsp;</p>", "", $autor) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wp-block-column is-layout-flow">

                                <div class="fellows_intro">
                                    <?= $introduccion ?>
                                </div>

                                <h3 class="wp-block-heading">Metodología</h3>

                                <div class="fellows_metodologia">
                                    <?= $metodologia ?>
                                </div>
                                
                            </div>
                        </div>

                        <div class="wp-block-columns blog_fellows_contenedor is-layout-flex wp-container-6 columnitas">
                            <div class="wp-block-column is-layout-flow">
                                <h3 class="wp-block-heading">Resultados</h3>
                                <div class="fellows_resultados">
                                    <?= $resultados ?>
                                </div>
                            </div>
                            <div class="wp-block-column is-layout-flow">
                                <h3 class="wp-block-heading">Discusión</h3>
                                <div class="fellows_discusion">
                                    <?= $discusion ?>
                                </div>
                            </div>
                        </div>
                        <div class="wp-block-columns blog_fellows_contenedor is-layout-flex wp-container-8 columnitas">
                            <div class="wp-block-column is-layout-flow">
                                <h3 class="wp-block-heading">Conclusión</h3>
                                <div class="fellows_conclusion">
                                    <?= $conclusion ?>
                                </div>
                            </div>
                            <div class="wp-block-column is-layout-flow">
                                <h3 class="wp-block-heading">Bibliografía</h3>
                                <div class="fellows_bibliografia">
                                    <?= $bibliografia ?>
                                </div>
                            </div>
                        </div>
                        

                        <div>
                            <?php // the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
