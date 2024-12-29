<?php /*
    Template Name: Plantilla: Buscador de servicios y especialidades
    */
get_header();

$letras = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "#");

$argumentos = array(  
    'post_type' => 'servicios',
    'post_status' => 'publish',
    'posts_per_page' => -1, 
    'order' => 'ASC',
    'orderby' => 'title',
);

$servicios = array();
$query = new WP_Query($argumentos);
$entrada_index = 0;
if ($query->have_posts()) { while ($query->have_posts()) { $query->the_post();
    foreach($letras as $letra){
        $nombre = get_the_title();
        if(strtoupper($letra) == $nombre[0]){
            $id = get_the_ID();
            $servicios[$letra][$entrada_index]["id"] = $entrada_index;
            $servicios[$letra][$entrada_index]["slug"] = get_post_field('post_name', $id);
            $servicios[$letra][$entrada_index]["nombre"] = get_the_title();
        }
    }
    $entrada_index++;

    }/*while*/
    wp_reset_postdata();
}/*if*/

$servicios = json_encode($servicios);
$letra_x_defecto = isset($_GET["letra"]) ? strtolower($_GET["letra"]) : '';
if(!(in_array($letra_x_defecto, $letras))){
    $letra_x_defecto = "a";
}

?>
<script>
    let especialidades_x_letra = JSON.parse(`<?= $servicios ?>`);
    let letra_x_defecto = "<?= $letra_x_defecto ?>";
</script>
<?php


$resultados = array(
    array("url" => '#',  "nombre" => 'Unidad De Cuidado Intensivo Cardiovascular Pediátrico'),
    array("url" => '#',  "nombre" => 'Unidad de Cuidado Intensivo Cardiovascular y Posquirúrgica Adultos'),
    array("url" => '#',  "nombre" => 'Unidad de Cuidado Intensivo Neonatal'),
    array("url" => '#',  "nombre" => 'Unidad de Cuidado Intensivo Pediátrico Médica'),
    array("url" => '#',  "nombre" => 'Unidad de Cuidados Coronarios'),
    array("url" => '#',  "nombre" => 'Urgencias Adultos'),
    array("url" => '#',  "nombre" => 'Urgencias Pediátricas'),
    array("url" => '#',  "nombre" => 'Urología'),
);
?>
<?php echo get_template_part('template-parts/content'); ?>

<div class="breadcrumbs">
            <p id="breadcrumbs" class="claro">
                            <span>
                                <a style="text-decoration: none!important;" href="https://www.lacardio.org/" data-wpel-link="internal">LaCardio</a>
                            </span> » 
                            <span>
                                <a style="text-decoration: none!important;" href="#" data-wpel-link="internal">Servicios y especialidades</a>
                            </span> » 
                           
                            <span>
                                <a style="text-decoration: none!important;" href="https://www.lacardio.org/buscador-servicios-y-especialidades/" data-wpel-link="internal">Especialidades</a>
                            </span> 
                        </p>
        </div>
<main class="buscaservicios">
    <div class="buscaservicios__int">
        <section class="buscador">
            <h1>LaCardio servicios y especialidades</h1>
            <div class="buscador__services">
                <?php echo get_template_part('template-parts/content', 'buscador_de_letras'); ?>
            </div>
        </section>
        <section class="resultados">
            <h2></h2>
            <ul class="results">
            </ul>
        </section>
    </div>
</main>
<?php get_footer() ?>