<?php 
/*
    Template Name: Landing 50 Años
*/
$titulo = get_the_title();
$descripcion = get_the_content();
get_header(); 

?>
<?= get_template_part('template-parts/content'); ?>
<div class="container-fluid p-0">
    <h1 class="sr-only">50 Años LaCardio</h1>
    <iframe id="50anos-container" title="LaCardio 50 años" width="100%" height="800px" src="https://www.lacardio.org/50-anos/">
    </iframe>
</div>
<?php  get_footer(); ?>