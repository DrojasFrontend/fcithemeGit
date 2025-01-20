<?php 
$especialidades = get_field('especialidades');

function agrupar_por_departamento_y_letra_mobile($especialidades) {
    $departamentos = [];
    
    if($especialidades) {
        foreach($especialidades as $esp) {
            $departamento = $esp['departamento'];
            $enlace_titulo = $esp['enlace']['title'];
            $enlace_url = $esp['enlace']['url'];
            $letra = strtoupper(substr($enlace_titulo, 0, 1));
            
            if(!isset($departamentos[$departamento])) {
                $departamentos[$departamento] = [];
            }
            if(!isset($departamentos[$departamento][$letra])) {
                $departamentos[$departamento][$letra] = [];
            }
            
            $departamentos[$departamento][$letra][] = [
                'nombre' => $enlace_titulo,
                'url' => $enlace_url
            ];
        }
    }
    
    // Ordenar departamentos y letras
    ksort($departamentos);
    foreach($departamentos as &$grupo) {
        ksort($grupo);
    }
    
    return $departamentos;
}

$departamentos_agrupados = agrupar_por_departamento_y_letra_mobile($especialidades);
?>
<section class="directorioEspecialidades visibleMobile">
    <div class="container--large">
        <div class="directorioEspecialidades__grid">
            <!-- Menú de departamentos -->
            <div class="directorioEspecialidades__departamentos">
                <h2 class="subheading color--263956">DEPARTAMENTOS</h2>
                <?php 
                if($departamentos_agrupados):
                    foreach($departamentos_agrupados as $nombre_dep => $enlaces): 
                ?>
                    <div>
                        <button class="directorioEspecialidades__btn heading--18 color--002D72" data-id="<?php echo esc_attr($nombre_dep); ?>">
                            <?php echo esc_html($nombre_dep); ?>
                            <?php 
                                get_template_part('template-parts/content', 'icono');
                                display_icon('icono-arrow-next-rojo'); 
                            ?>
                        </button>
                        <div class="directorioEspecialidades__especialidades">
                            <!-- Contenido de especialidades -->
                            <?php 
                            if($departamentos_agrupados):
                                foreach($departamentos_agrupados as $nombre_dep => $grupos_letra):
                            ?>
                                <div class="directorioEspecialidades__content" data-departamento="<?php echo esc_attr($nombre_dep); ?>">
                                    <?php foreach($grupos_letra as $letra => $enlaces): ?>
                                        <div class="directorioEspecialidades__grupo">
                                            <div class="letra-header heading--36 color--002D72"><?php echo esc_html($letra); ?></div>
                                            <div class="directorioEspecialidades__lista">
                                                <?php foreach($enlaces as $enlace): ?>
                                                    <a class="heading--18 color--E40046" href="<?php echo esc_url($enlace['url']); ?>">
                                                        <?php echo esc_html($enlace['nombre']); ?>
                                                        <?php 
                                                            get_template_part('template-parts/content', 'icono');
                                                            display_icon('icono-arrow-next-rojo'); 
                                                        ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php 
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>
    
  
        </div>
    </div>
</section>