<?php
/**
 * Template Name: Plantilla Servicios
 * 
 * @package FCITheme
 * @subpackage Legger_Templates
 * @version 1.0
 * @author Legger
 * @link https://legger.com
 * 
 * This template is part of the custom development by Legger.
 * Template for the Revascularizacion page.
 */


// Asegúrate de que no se acceda directamente a este archivo
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
get_header();

$sitename     = esc_html(get_bloginfo('name'));
$grupo_hero   = get_field('grupo_hero');
$subtitulo    = !empty($grupo_hero['subtitulo']) ? esc_html($grupo_hero['subtitulo']) : '';
$titulo       = !empty($grupo_hero['titulo']) ? esc_html($grupo_hero['titulo']) : '';
$imagen_id    = !empty($grupo_hero["fondo"]['ID']) ? $grupo_hero["fondo"]['ID'] : '';

/* CTAS */
$grupo_enlace = get_field('grupo_enlace');
$enlaces      = $grupo_enlace['enlaces'];

?>

<!-- CONTENIDO -->
  <main>
    
    <section class="paginaServiciosHero">
      <div class="paginaServiciosHero__img">
        <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
      </div>
      <div class="paginaServiciosHero__contenido">
        <div class="container--large">
          <div class="paginaServiciosHero__title">
            <p class="subheading color--fff">
              <?php echo $subtitulo; ?>
            </p>
            <h1 class="heading--64 color--fff">
              <?php echo $titulo; ?>
            </h1>
          </div>
        </div>
      </div>
    </section>

    <div class="paginaServiciosCtas">
      <div class="container--large">
        <div class="paginaServiciosCtas__grid">
          <?php foreach ($enlaces as $key => $enlace) { ?>
            <div>
              <h2 class="heading--48 color--002D72"><?php echo $enlace['titulo']?></h2>
              <ul>
                <?php foreach ($enlace['enlaces'] as $key => $cta) { ?>
                  <li>
                    <a class="heading--18 color--0C2448" href="<?php echo $cta['cta']['url']?>" target="<?php echo $cta['cta']['target']?>" title="<?php echo $cta['cta']['title']?>">
                      <?php echo $cta['cta']['title']?>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
   
  </main>
<!-- FIN CONTENIDO -->
<?php get_footer();