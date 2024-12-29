<?php
/*
    Template Name: Citas y Teleconsultas
*/
get_header();
?>
<?= get_template_part('template-parts/content'); ?>
<main class="pagina">
    <h1 class="mb-5"><?php the_title(); ?></h1>
    <div class="payuform">
        <?php the_content() ?>
    </div>
</main>

<script>
    var elInput = document.getElementById('validarEnter');
    elInput.addEventListener('keyup', function(e) {
        var keycode = e.keyCode || e.which;
        console.log(e.which, e.keyCode)
        if (keycode == 13) {
            elInput.value = elInput.value.substring(0, elInput.value.length - 1);

            alert("Por favor no pulsar enter en el campo");
        }


    })


    window.addEventListener("DOMContentLoaded", () => {

        const form = document.querySelector(".wpcf7-form");
        const sucursalSelect = form.querySelectorAll("input[name='your-sede'], input[name='your-sede2']");
        const serviciosSelect = form.querySelector("select.servicios");
        const epsSelect = form.querySelector("select.eps");

        // Definir los valores de servicios para cada sucursal
        const sucursalValuesByOption = {
            "" : '<option value="">Especialidad o servicio requerido</option>',
            "LaCardio - Cl. 163a #13B-60": `
            <option value=''>Especialidad o servicio requerido</option>
            <option value='Consulta de Anestesiología'>Consulta de Anestesiología</option>
            <option value='Consulta de Cardiología'>Consulta de Cardiología</option>
            <option value='Consulta de Cirugía Cabeza Y Cuello'>Consulta de Cirugía Cabeza Y Cuello</option>
            <option value='Consulta de Cirugía Cardiovascular'>Consulta de Cirugía Cardiovascular</option>
            <option value='Consulta de Cirugía De Tórax'>Consulta de Cirugía De Tórax</option>
            <option value='Consulta de Cirugía Gastro Intestinal'>Consulta de Cirugía Gastro Intestinal</option>
            <option value='Consulta de Cirugía General'>Consulta de Cirugía General</option>
            <option value='Consulta de Cirugía Hepatobiliar'>Consulta de Cirugía Hepatobiliar</option>
            <option value='Consulta de Cirugía Pediátrica'>Consulta de Cirugía Pediátrica</option>
            <option value='Consulta de Cirugía Plástica'>Consulta de Cirugía Plástica</option>
            <option value='Consulta de Cirugía Vascular Periférica'>Consulta de Cirugía Vascular Periférica</option>
            <option value='Consulta de Clínica De Pared Abdominal'>Consulta de Clínica De Pared Abdominal</option>
            <option value='Consulta de Clínica Del Dolor'>Consulta de Clínica Del Dolor</option>
            <option value='Consulta de Dermatología'>Consulta de Dermatología</option>
            <option value='Consulta de Electrofisiología'>Consulta de Electrofisiología</option>
            <option value='Consulta de Endocrinología'>Consulta de Endocrinología</option>
            <option value='Consulta de Falla Cardiaca'>Consulta de Falla Cardiaca</option>
            <option value='Consulta de Fisiatría'>Consulta de Fisiatría</option>
            <option value='Consulta de Flebotomía Terapéutica'>Consulta de Flebotomía Terapéutica</option>
            <option value='Consulta de Gastroenterología'>Consulta de Gastroenterología</option>
            <option value='Consulta de Genética'>Consulta de Genética</option>
            <option value='Consulta de Ginecología'>Consulta de Ginecología</option>
            <option value='Consulta de Hematología'>Consulta de Hematología</option>
            <option value='Consulta de Hemodinamia'>Consulta de Hemodinamia</option>
            <option value='Consulta de Hepatología'>Consulta de Hepatología</option>
            <option value='Consulta de Infectología'>Consulta de Infectología</option>
            <option value='Consulta de Medicina Física Y Rehabilitación'>Consulta de Medicina Física Y Rehabilitación</option>
            <option value='Consulta de Medicina Interna'>Consulta de Medicina Interna</option>
            <option value='Consulta de Medicina Nuclear'>Consulta de Medicina Nuclear</option>
            <option value='Consulta de Nefrología'>Consulta de Nefrología</option>
            <option value='Consulta de Neuro-Cirugia'>Consulta de Neuro-Cirugia</option>
            <option value='Consulta de Neurología'>Consulta de Neurología</option>
            <option value='Consulta de Neuropsicología'>Consulta de Neuropsicología</option>
            <option value='Consulta de Neuroradiologia'>Consulta de Neuroradiologia</option>
            <option value='Consulta de Oftalmología'>Consulta de Oftalmología</option>
            <option value='Consulta de Oncología'>Consulta de Oncología</option>
            <option value='Consulta de Ortopedia Y Traumatología'>Consulta de Ortopedia Y Traumatología</option>
            <option value='Consulta de Otorrinolaringología'>Consulta de Otorrinolaringología</option>
            <option value='Consulta de Pediatría'>Consulta de Pediatría</option>
            <option value='Consulta de Psicología'>Consulta de Psicología</option>
            <option value='Consulta de Rehabilitación Cardiaca-Cardiologia'>Consulta de Rehabilitación Cardiaca-Cardiologia</option>
            <option value='Consulta de Reprogramación de Marcapasos'>Consulta de Reprogramación de Marcapasos</option>
            <option value='Consulta de Reumatología'>Consulta de Reumatología</option>
            <option value='Consulta de Terapia Física'>Consulta de Terapia Física</option>
            <option value='Consulta de Trasplantes'>Consulta de Trasplantes</option>
            <option value='Consulta de Urología'>Consulta de Urología</option>
            <option value='Examen Diagnóstico Citología'>Examen Diagnóstico Citología</option>
            <option value='Examen Diagnóstico de Electromiografías'>Examen Diagnóstico de Electromiografías</option>
            <option value='Neuroconducciòn'>Neuroconducciòn</option>
            <option value='Examen Diagnóstico Doppler'>Examen Diagnóstico Doppler</option>
            <option value='Examen Diagnostico Ecocardiograma'>Examen Diagnostico Ecocardiograma</option>
            <option value='Examen Diagnóstico Elastosonografía (Elastografía)'>Examen Diagnóstico Elastosonografía (Elastografía)</option>
            <option value='Examen Diagnóstico Electrocardiograma'>Examen Diagnóstico Electrocardiograma</option>
            <option value='Examen Diagnóstico Monitoreo Cardiaco'>Examen Diagnóstico Monitoreo Cardiaco</option>
            <option value='Examen Diagnóstico Monitoreo de Tensión Arterial'>Examen Diagnóstico Monitoreo de Tensión Arterial</option>
            <option value='Examen Diagnóstico Pletismografia'>Examen Diagnóstico Pletismografia</option>
            <option value='Examen Diagnóstico Potenciales evocados'>Examen Diagnóstico Potenciales evocados</option>
            <option value='Examen Diagnóstico Prueba de esfuerzo'>Examen Diagnóstico Prueba de esfuerzo</option>
            <option value='Examen Diagnóstico Prueba de mesa basculante'>Examen Diagnóstico Prueba de mesa basculante</option>
            <option value='Radiología e imágenes diagnosticas'>Radiología e imágenes diagnosticas</option>
            <option value='Sesión de Rehabilitación Cardiaca'>Sesión de Rehabilitación Cardiaca</option>
            <option value='Sesiones de Terapia Física'>Sesiones de Terapia Física</option> `,
            "LaCardio 102 - Av. Cra 19 #102-31": `
            <option value=''>Especialidad o servicio requerido</option>
            <option value='Consulta de Cardiología'>Consulta de Cardiología</option>
            <option value='Ecocardiógrama transtorácico'>Ecocardiógrama transtorácico</option>
            <option value='Electrocardiograma de Ritmo'>Electrocardiograma de Ritmo</option>
            <option value='Monitoreo Electrocardiográfico Continuo - Holter'>Monitoreo Electrocardiográfico Continuo - Holter</option>
            <option value='Monitoreo Ambulatorio de Presión Arterial - MAPA'>Monitoreo Ambulatorio de Presión Arterial - MAPA</option>
            <option value='Examen Diagnóstico Prueba de esfuerzo'>Examen Diagnóstico Prueba de esfuerzo</option>
            `,
        };

        sucursalSelect.forEach((checkbox) => {
            checkbox.addEventListener("change", (e) => {
                let newServiciosValues = sucursalValuesByOption[e.target.value];
                serviciosSelect.innerHTML = newServiciosValues;
            });
        });

        const selectorSede = form.querySelector("select[name='sede']");
        selectorSede.addEventListener("change", function( e ){
            event.preventDefault()
            // console.log("Accion")
            let newServiciosValues = sucursalValuesByOption[e.target.value];
            serviciosSelect.innerHTML = newServiciosValues;
        })

        function agregar_option_vacio(campo, texto){
            
            const select_impactado = document.querySelector(".wpcf7-form select[name='"+campo+"']");
            
            var option = document.createElement("option");
            option.text = texto;
            option.value = '';
            select_impactado.insertBefore(option, select_impactado.firstChild);
        }
        // agregar_option_vacio('sede', 'Selección de Sede')
        // agregar_option_vacio('eps-user', 'EPS / Asegurador')


    });
</script>
<?php
get_footer();
?>