<?php
$sitename = get_bloginfo('name');
$grupo_articulos_buscados = get_field('grupo_articulos_buscados');
$titulo = $grupo_articulos_buscados['titulo'];
?>

<?php $args = array(
    'post_type' => 'blog_fellows',
    'posts_per_page' => 3,
);
$blog_fellows_query = new WP_Query($args);
?>

<section class="seccionArticulosBuscados">
    <div class="seccionArticulosBuscados__fondo">
        <div class="container--large">
            <h2 class="heading--48 color--263956"><?php echo $titulo; ?></h2>
            <div class="seccionArticulosBuscados__articulos slickArticulos slickPersonalizado">
                <article class="seccionArticulosBuscados__articulo">
                    <a href="https://www.lacardio.org/blog_fellows/mavacamten-for-treatment-of-symptomatic-obstructive-hypertrophic-cardiomyopathy-explorer-hcm-a-randomised-double-blind-placebo-controlled-phase-3-trial/" class="seccionArticuloBuscadosV2">
                        <div class="seccionArticuloBuscadosV2__header">
                            <div class="seccionArticuloBuscadosV2__img">
                                <img src="https://www.lacardio.org/wp-content/uploads/2023/05/9-1.jpg" alt="">
                            </div>
                            <div>
                            <p class="heading--18 color--002D72 mb-1">Dr. Luis E. Giraldo</p>
                            <p class="heading--12 color--677283">Universidad del Bosque <br> Cohorte: 2023 – I</p>
                            </div>
                        </div>
                        <div class="seccionArticuloBuscadosV2__footer">
                            <h3>
                                Mavacamten for treatment of symptomatic obstructive hypertrophic cardiomyopathy (EXPLORER-HCM): a randomised, double-blind, placebo-controlled, phase 3 trial.
                            </h3>
                            <p>07 Septiembre, 2021 - 8 min de lectura</p>
                        </div>
                    </a>
                </article>
                <article class="seccionArticulosBuscados__articulo">
                    <a href="https://www.lacardio.org/blog_fellows/intervencion-coronaria-percutanea-guiada-por-ffr-comparado-con-cirugia-de-puentes-coronarios-una-mirada-racional-al-fame-3/" class="seccionArticuloBuscadosV2">
                        <div class="seccionArticuloBuscadosV2__header">
                            <div class="seccionArticuloBuscadosV2__img">
                                <img src="https://www.lacardio.org/wp-content/uploads/2022/04/Angela-Herrera.webp" alt="">
                            </div>
                            <div>
                            <p class="heading--18 color--002D72 mb-1">Dra. Ángela M. Herrera</p>
                            <p class="heading--12 color--677283">Universidad del Bosque <br> Cohorte: 2023 – I</p>
                            </div>
                        </div>
                        <div class="seccionArticuloBuscadosV2__footer">
                            <h3>
                                Intervención coronaria percutánea guiada por FFR comparado con cirugía de puentes coronarios. Una mirada racional al FAME 3.
                            </h3>
                            <p>17 Abril, 2022 - 8 min de lectura</p>
                        </div>
                    </a>
                </article>
                <article class="seccionArticulosBuscados__articulo">
                    <a href="https://www.lacardio.org/blog_fellows/cardiovascular-and-renal-outcomes-with-efpeglenatide-in-type-2-diabetes/" class="seccionArticuloBuscadosV2">
                        <div class="seccionArticuloBuscadosV2__header">
                            <div class="seccionArticuloBuscadosV2__img">
                                <img src="https://www.lacardio.org/wp-content/uploads/2023/05/7-1.jpg" alt="">
                            </div>
                            <div>
                            <p class="heading--18 color--002D72 mb-1">Dr. Jonathan Patiño</p>
                            <p class="heading--12 color--677283">Universidad del Bosque <br> Cohorte: 2023 – I</p>
                            </div>
                        </div>
                        <div class="seccionArticuloBuscadosV2__footer">
                            <h3>
                                Cardiovascular and Renal Outcomes with Efpeglenatide in Type 2 Diabetes.
                            </h3>
                            <p>08 Febrero, 2022 - 8 min de lectura</p>
                        </div>
                    </a>
                </article>
            </div>
        </div>
    </div>
</section>