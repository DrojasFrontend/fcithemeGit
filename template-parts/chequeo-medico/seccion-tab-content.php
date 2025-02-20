<?php
    $grupoTabAcordeon = get_field('grupo_acordeon');
    $subtitulo = $grupoTabAcordeon['subtitulo'] ?? '';
    $titulo = $grupoTabAcordeon['titulo'] ?? '';
?>

<?php if ($grupoTabAcordeon): ?>
    <section class="pt-5 tab-content__accordion">

        <?php if( $subtitulo ): ?>
            <p class="subheading text-center color--002D72"><?php echo esc_html($subtitulo); ?></p>
        <?php endif; ?>
        <?php if( $titulo ): ?>
            <h2 class="heading--48 mt-2 text-center color--002D72 mb-4"><?php echo esc_html($titulo); ?></h2>
        <?php endif; ?>

        <ul class="nav gap-1 nav-pills mb-0" id="chequeos-tabs" role="tablist">
            <?php foreach ($grupoTabAcordeon['tabs'] as $index => $tab): ?>
            <li class="nav-item mb-0" role="presentation">
                <button 
                class="nav-link <?php echo $index === 0 ? 'active' : ''; ?>" 
                id="tab-<?php echo $index; ?>-tab" 
                data-bs-toggle="pill" 
                data-bs-target="#tab-<?php echo $index; ?>" 
                type="button" 
                role="tab" 
                aria-controls="tab-<?php echo $index; ?>" 
                aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                <?php echo esc_html($tab['titulo']); ?>
                </button>
            </li>
            <?php endforeach; ?>
        </ul>

        <div class="tab-content py-5 px-12 bg-gray" id="chequeos-tabContent">
            <?php foreach ($grupoTabAcordeon['tabs'] as $index => $tab): ?>
            <div 
                class="tab-pane container fade <?php echo $index === 0 ? 'show active' : ''; ?>" 
                id="tab-<?php echo $index; ?>" 
                role="tabpanel" 
                aria-labelledby="tab-<?php echo $index; ?>-tab">
                <div class="row align-items-center">
                <?php if (!empty($tab['imagen'])): ?>
                    <div class="col-lg-6">
                    <img 
                        src="<?php echo esc_url($tab['imagen']['url']); ?>" 
                        alt="<?php echo esc_attr($tab['imagen']['alt']); ?>" 
                        class="img-fluid rounded w-100">
                    </div>
                <?php endif; ?>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <p class="subheading color--002D72 text-uppercase"><?php echo esc_html($tab['subtitulo']); ?></p>
                    <h2 class="heading--48 mt-2 text-start color--002D72">
                        <?php echo esc_html($tab['titulo_contenido']); ?>
                    </h2>
                    <p class="color-delft-blue heading--18"><?php echo esc_html($tab['descripcion']); ?></p>
                </div>
                </div>

                <?php if (!empty($tab['accordion_items'])): ?>
                    <div class="accordion mt-4" id="accordion-<?php echo $index; ?>">
                        <?php foreach ($tab['accordion_items'] as $i => $accordion): ?>
                            <div class="accordion-item border-0">
                                <h5 class="accordion-header" id="heading-<?php echo $index . '-' . $i; ?>">
                                    <button 
                                        class="accordion-button bg-gray collapsed" 
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#collapse-<?php echo $index . '-' . $i; ?>" 
                                        aria-expanded="false" 
                                        aria-controls="collapse-<?php echo $index . '-' . $i; ?>">
                                        <?php echo esc_html($accordion['titulo']); ?>
                                    </button>
                                </h5>
                                <div 
                                    id="collapse-<?php echo $index . '-' . $i; ?>" 
                                    class="accordion-collapse bg-gray collapse"
                                    aria-labelledby="heading-<?php echo $index . '-' . $i; ?>">
                                    <div class="accordion-body">
                                        <?php echo wp_kses_post($accordion['contenido']); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($tab['cta'])): 
                    $boton = $tab['cta'];
                ?>
                <div class="text-center mt-4">
                    <a 
                        href="<?php echo esc_url($boton['url']); ?>" 
                        class="btn-amaranth d-block m-auto mt-5" 
                        <?php echo !empty($boton['target']) ? 'target="' . esc_attr($boton['target']) . '"' : ''; ?>>
                        <?php echo esc_html($boton['title']); ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>