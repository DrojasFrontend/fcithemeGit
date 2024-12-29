<?php
$formato = block_field('fecha-o-texto', false); 
$fecha = fecha_informes_descargas(block_field('fecha', false), $formato); 
$informe = block_field('informe', false); 
$casos_probables = block_field('casos-probables', false); 
$centros_participantes = block_field('centros-participantes', false); 
$periodo = block_field('periodo', false); 
$pdf = block_field('pdf', false); 
?>
<div class="gestion_proyectos_docs__indv">
    <div class="gestion_proyectos_docs__indv__int">
        <div class="gestion_proyectos_docs__indv__fecha">
            <div class="gestion_proyectos_docs__indv__fecha__int">
                <?= $fecha ?>
            </div>
        </div>
        <div class="gestion_proyectos_docs__indv__contenido">
            <div class="gestion_proyectos_docs__indv__contenido__cont">
                <p><strong>Informe: </strong><?= $informe ?></p>
                <?php if($casos_probables){ ?><p><strong>Casos probables: </strong><?= $casos_probables ?></p><?php } ?>
                <?php if($centros_participantes){ ?><p><strong>Centros participantes: </strong><?= $centros_participantes ?></p><?php } ?>
                <?php if($periodo){ ?><p><strong>Periodo: </strong><?= $periodo ?></p><?php } ?>
                <?php if($pdf){ ?><div class="descarga_pdf">
                    <p>
                        <span>Descarga:</span> <a href="<?= $pdf ?>" target="_blank"><i class="fas fa-file-pdf"></i></a>
                    </p>
                </div><?php } ?>
            </div>
        </div>
    </div>
</div>