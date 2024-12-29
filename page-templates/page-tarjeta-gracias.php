<?php 
/*
    Template Name: Tarjeta de saludo - Gracias
*/

global $wpdb;
$db_id = $_GET["db"];

if($db_id == "" ){
    // Si no tenemos un ID, se va para tarjetas de saludo
    $URL_destino = '/tarjeta-de-saludo/';
	/*
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $URL_destino");
	*/
}

$tabla = $wpdb->prefix . 'db7_forms';
$query = "SELECT * FROM $tabla ORDER BY form_id DESC";
$encontrado = 0;
$resultados = $wpdb->get_results($query);
$data_tarjeta = '';

foreach($resultados as $cadaUno){
    $verifica = hash_hmac('sha256', $cadaUno->form_id, 'johnwmartinez');
    if($verifica == $db_id){
        $encontrado = 1;
        $data_tarjeta = unserialize($cadaUno->form_value);
        $data_tarjeta["plantilla"] = str_replace("org//wp", "org/wp", $data_tarjeta["plantilla"]);
        $data_tarjeta["plantilla"] = str_replace("http://", "https://", $data_tarjeta["plantilla"]);
        break;
    }
}
if($encontrado == 0){
    // Si no tenemos un ID, se va para tarjetas de saludo
    $URL_destino = '/tarjeta-de-saludo/';
	/*
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $URL_destino");
    die();
	*/
}


get_header(); ?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="pagina">
  <h1 class="text-center"><?php the_title() ?></h1>
  <div class="tarjetas">
    <div class="tarjetas__enviada">
        <h4>Tu tarjeta ha sido enviada</h4>
        <div class="tarjetas__design">
            <div class="tarjetas__contenedor__int">
                <div id="tarjeta_contenedor" class="tarjetas__contenedor__contenido">
                    <div id="tarjeta_texto" class="tarjetas__contenedor__contenido--text">
                        <p id="tarjeta_saludo">Apreciado/a <?= $data_tarjeta["paciente_nombres"] ?></p>
                        <p id="tarjeta_mensaje"><?= $data_tarjeta["mensaje"] ?></p>
                        <p id="tarjeta_firma">Con aprecio, <?= $data_tarjeta["nombres"] ?></p>
                    </div>
                </div>
                <div class="tarjetas__contenedor__bg">
                    <img src="<?= $data_tarjeta["plantilla_imagen"] ?>" alt="">
                </div>
            </div>
        </div>
        <div class="tarjetas__descargar">
            <a href="<?= $data_tarjeta["plantilla"] ?>" class="btn btn_enviar" download>Descargar la tarjeta en PDF</a>
        </div>
        <div class="tarjetas__donaciondescrp">
            <?php the_content() ?>
        </div>
        <div class="tarjetas__donar">
            <a href="https://fundacion.cardioinfantil.org/como-donar/" target="_blank" class="btn btn_limpiar">Dona quí</a>
        </div>

    </div>
    
  </div>
</main>
<?php get_footer(); ?>