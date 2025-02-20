<?php
/*
Template Name: Plantilla Buscador de servicios y especialidades OLD
*/

get_header();
$especialidades = get_field('especialidades');

function generar_alfabeto($letras_por_fila = 6) {
    $alfabeto = range('A', 'Z');
    $alfabeto[] = '#';
    
    $filas = [];
    $fila_actual = [];
    
    foreach($alfabeto as $letra) {
        $fila_actual[] = $letra;
        if(count($fila_actual) == $letras_por_fila) {
            $filas[] = $fila_actual;
            $fila_actual = [];
        }
    }
    
    if(!empty($fila_actual)) {
        $filas[] = $fila_actual;
    }
    
    return $filas;
}

// Generar el array de letras
$letras = generar_alfabeto(6);

?>


<style>
    .filter {
        display: grid;
        grid-template-columns: 1fr;
        padding: 60px 0;
    }

    .filter-wrapper .container--large {
        padding: 0 18px;
    }

    @media screen and (min-width: 1024px) {
        .filter {
            grid-template-columns: 1fr 2fr;
            column-gap: 30px;
        }
    }

    .filter h2 {
        color: #003876;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .alfabeto-grid {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .alfabeto-row {
        display: flex;
        gap: 15px;
    }

    .letra-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px solid #E5E7EB;
        background: white;
        color: #666;
        font-weight: 500;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .letra-btn:hover {
        background: #f5f5f5;
    }

    .letra-btn.active {
        background: #003876;
        color: white;
        border-color: #003876;
    }

    .especialidades-container {
        margin-top: 30px;
    }

    .especialidad-item {
        display: none;
    }

    .especialidad-item.active {
        display: block;
    }

    .letra-actual {
        font-size: 32px;
        color: #003876;
        margin-bottom: 20px;
        font-weight: bold;
    }
</style>


<div class="filter-wrapper">
    <div class="container--large">
        <div class="filter">
            <div class="filter-letras">
                <h2>servicios y especialidades</h2>
                <div class="alfabeto-grid">
                    <?php foreach($letras as $fila): ?>
                        <div class="alfabeto-row">
                            <?php foreach($fila as $letra): ?>
                                <button class="letra-btn" data-letra="<?php echo esc_attr($letra); ?>">
                                    <?php echo esc_html($letra); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
    
            <div class="especialidades-container">
                <div class="letra-actual"></div>
                <?php
                if($especialidades):
                    foreach($especialidades as $esp):
                        if(!empty($esp['enlace'])):
                            $nombre_especialidad = $esp['enlace']['title'];
                            $url_especialidad = $esp['enlace']['url'];
                            $primera_letra = strtoupper(substr($nombre_especialidad, 0, 1));
                ?>
                    <div class="especialidad-item" data-letra="<?php echo esc_attr($primera_letra); ?>">
                        <a href="<?php echo esc_url($url_especialidad); ?>">
                            <?php echo esc_html($nombre_especialidad); ?>
                        </a>
                    </div>
                <?php 
                        endif;
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>



<script>
jQuery(document).ready(function($) {
    // Activar la letra A por defecto
    $('[data-letra="A"]').addClass('active');
    $('.especialidad-item[data-letra="A"]').addClass('active');
    $('.letra-actual').text('A');

    // Click handler para las letras
    $('.letra-btn').click(function() {
        var letra = $(this).data('letra');
        
        // Actualizar botones
        $('.letra-btn').removeClass('active');
        $(this).addClass('active');
        
        // Actualizar especialidades
        $('.especialidad-item').removeClass('active');
        $('.especialidad-item[data-letra="' + letra + '"]').addClass('active');
        
        // Actualizar letra actual
        $('.letra-actual').text(letra);
    });
});
</script>

<?php get_footer(); ?>