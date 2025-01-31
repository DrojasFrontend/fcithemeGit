<?php 
$especialidades = get_field('especialidades');

function agrupar_por_departamento_y_letra_desktop($especialidades) {
    $departamentos = [];
    $especialidades_unicas = []; // Para rastrear especialidades únicas
    
    if($especialidades) {
        foreach($especialidades as $esp) {
            $departamento = $esp['departamento'];
            $enlace_titulo = $esp['enlace']['title'];
            $enlace_url = $esp['enlace']['url'];
            
            $esp_key = $enlace_titulo . '|' . $enlace_url;
            
            if(in_array($esp_key, $especialidades_unicas)) {
                continue;
            }
            
            $especialidades_unicas[] = $esp_key;
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

$departamentos_agrupados = agrupar_por_departamento_y_letra_desktop($especialidades);
?>
<section class="directorioEspecialidades visibleDesktop">
    <div class="container--large">
        <!-- Buscador -->
        <div class="directorioEspecialidades__search">
            <label for="" class="heading--14 color--263956">Encuentra la especialidad que estás buscando</label>
            <div class="search-wrapper">
                <div class="search-input-container">
                    <input type="text" id="searchEspecialidades" placeholder="Escribe el nombre" />
                    <div class="search-suggestions" style="display: none;">
                        <!-- Aquí se mostrarán las sugerencias -->
                    </div>
                </div>
                <button id="btnBuscar" class="boton-v2 boton-v2--rojo-rojo">
                    Buscar
                    <?php 
                        get_template_part('template-parts/content', 'icono');
                        display_icon('ico-buscar'); 
                    ?>
                </button>
            </div>
        </div>

        <!-- Resultados de búsqueda -->
        <div class="directorioEspecialidades__resultados" style="display: none;">
            <h2 class="heading--48 color--002D72">Resultados de tu búsqueda</h2>
            <div class="resultados-lista">
                <!-- Los resultados se insertarán aquí dinámicamente -->
            </div>
            <button class="btn-regresar btn-regresar boton-v2 boton-v2--blanco-rojo"> 
                <?php 
                    get_template_part('template-parts/content', 'icono');
                    display_icon('icono-arrow-next-rojo'); 
                ?>
                Regresar
            </button>
        </div>

        <!-- Grid original -->
        <div class="directorioEspecialidades__grid">
            <!-- Menú de departamentos -->
            <div class="directorioEspecialidades__departamentos">
                <h2 class="subheading color--263956">DEPARTAMENTOS</h2>
                <?php 
                if($departamentos_agrupados):
                    foreach($departamentos_agrupados as $nombre_dep => $enlaces): 
                ?>
                    <button class="directorioEspecialidades__btn heading--18 color--002D72" data-id="<?php echo esc_attr($nombre_dep); ?>">
                        <?php echo esc_html($nombre_dep); ?>
                        <?php 
                            get_template_part('template-parts/content', 'icono');
                            display_icon('icono-arrow-next-rojo'); 
                        ?>
                    </button>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>
    
            <div class="directorioEspecialidades__especialidades">
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
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchEspecialidades');
    const btnBuscar = document.getElementById('btnBuscar');
    const gridContent = document.querySelector('.directorioEspecialidades__grid');
    const resultadosContent = document.querySelector('.directorioEspecialidades__resultados');
    const resultadosLista = document.querySelector('.resultados-lista');
    const btnRegresar = document.querySelector('.btn-regresar');
    const searchSuggestions = document.querySelector('.search-suggestions');


    // Recopilar todas las especialidades
    const especialidades = Array.from(
        new Set(
            Array.from(document.querySelectorAll('.directorioEspecialidades__lista a')).map(link => 
                JSON.stringify({
                    nombre: link.textContent.trim(),
                    url: link.href
                })
            )
        )
    ).map(item => JSON.parse(item));

       // Nueva función para mostrar sugerencias
       function mostrarSugerencias(searchTerm) {
        if (!searchTerm.trim()) {
            searchSuggestions.style.display = 'none';
            return;
        }

        const coincidencias = especialidades.filter(esp => 
            esp.nombre.toLowerCase().includes(searchTerm.toLowerCase())
        );

        if (coincidencias.length > 0) {
            searchSuggestions.innerHTML = coincidencias
                .slice(0, 5) // Limitar a 5 sugerencias
                .map(esp => `
                    <a href="${esp.url}" class="suggestion-item">
                        ${esp.nombre}
                        <svg class="suggestion-arrow" width="8" height="12" viewBox="0 0 8 12">
                            <path d="M1 1l5 5-5 5" stroke="#E40046" stroke-width="2" fill="none"/>
                        </svg>
                    </a>
                `).join('');
            searchSuggestions.style.display = 'block';
        } else {
            searchSuggestions.style.display = 'none';
        }
    }

    searchInput.addEventListener('input', function() {
        mostrarSugerencias(this.value);
    });

    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchSuggestions.contains(e.target)) {
            searchSuggestions.style.display = 'none';
        }
    });

    function mostrarResultados(resultados) {
        resultadosLista.innerHTML = '';
        
        resultados.forEach(resultado => {
            const item = document.createElement('a');
            item.href = resultado.url;
            item.className = 'resultado-item heading--24 color--002D72';
            item.innerHTML = `
                ${resultado.nombre}
                <?php 
                    get_template_part('template-parts/content', 'icono');
                    display_icon('icono-arrow-next-rojo'); 
                ?>
            `;
            resultadosLista.appendChild(item);
        });

        gridContent.style.display = 'none';
        resultadosContent.style.display = 'block';
    }

    function buscar() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        if (searchTerm) {
            const resultados = especialidades.filter(esp => 
                esp.nombre.toLowerCase().includes(searchTerm)
            );
            mostrarResultados(resultados);
            searchSuggestions.style.display = 'none'; // Ocultar sugerencias al buscar
        }
    }

 

    // Event Listeners
    btnBuscar.addEventListener('click', buscar);
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            buscar();
        }
    });
    
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            buscar();
        }
    });

    btnRegresar.addEventListener('click', function() {
        resultadosContent.style.display = 'none';
        gridContent.style.display = 'grid';
        searchInput.value = '';
        searchSuggestions.style.display = 'none';
    });
});
</script>