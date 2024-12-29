<?php
/*
    Template Name: Payu (formulario)
*/
get_header();
?>
<?= get_template_part('template-parts/content'); ?>
<main class="pagina">
    <h1 class="mb-5"><?php the_title(); ?></h1>
    <div class="payuform">
        <form method="post" action="<?= home_url(); ?>/formulario-pagos/confirmacion/">
            <div class="row">
                <div class="col-sm-6" id="container-fields-column-1">
                    <div class="field mb-3">
                        <input name="buyerFullName" type="text" class="form-control" placeholder="Tus nombres" required />
                    </div>
                    <div class="field mb-3">
                        <input name="buyerEmail" type="email" class="form-control" placeholder="E-Mail" required />
                    </div>
                    <div class="field mb-3">
                        <select name="extra1" class="form-select" id="typePayment" required>
                            <option value="">Selecciona el tipo de pago</option>
                            <option value="Arriendo">Arriendo</option>
                            <option value="Copago">Copago</option>
                            <option value="Pago_Particular">Pago particular</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <div class="field mb-3">
                        <input name="taxReturnBase" type="text" id="taxReturnBase" placeholder="Valor a pagar (Sin IVA)" class="form-control" required />
                    </div>
                </div>
                <div class="col-sm-6" id="container-fields-column-2">
                    <div class="field mb-3">
                        <input name="payerDocument" type="number" class="form-control" placeholder="Identificación (CC / NIT)" required />
                    </div>
                    <div class="field mb-3">
                        <input name="mobilePhone" type="number" class="form-control" placeholder="Tu número de celular" required />
                    </div>
                    <div class="field mb-3">
                        <input name="extra2" type="text" class="form-control" placeholder="Número de autorización / Factura" required />
                    </div>
                    <div class="field mb-3">
                        <input name="tax" type="text" id="tax" placeholder="IVA" class="form-control" required />
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="field">
                        <textarea name="description" cols="30" rows="3" class="form-control mini-height noresize" placeholder="Descripción del pago" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="methods-payments">
                        <p class="text-center">* Nota: En el caso de copagos y pagos particulares no se paga IVA.</p>
                    </div>
                    <div class="text-center">
                        <input name="submit_to_payu" type="submit" class="btn wpcf7-submit" value="Pagar" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <img src="/wp-content/uploads/2023/05/form_pago_iconos.jpeg" alt="Pago seguro con tarjeta débito con PSE, tarjetas de crédito y otros medios de pago.">
                </div>
            </div>
        </form>
    </div>
</main>

<script>
	var selectTypePayment = document.querySelector('#typePayment')
	var containerFields = document.querySelector('#container-fields-column-1')
	var taxReturnBase = document.querySelector('#taxReturnBase')
	var tax = document.querySelector('#tax')
	var htmlFieldAmount = '<div class="field mb-3" id="amountField">'+
		'<input name="amount" type="text" class="form-control" placeholder="Valor a pagar" required/>'+
	'</div>';

	selectTypePayment.onchange = function() {
		var index = this.selectedIndex;
		var inputText = this.children[index].value
		var amountField = document.querySelector('#amountField')
		console.log(inputText);

		if (inputText == 'Copago' || inputText == 'Pago_Particular') {
			if (!amountField) {
				containerFields.insertAdjacentHTML('beforeend', htmlFieldAmount)
			}
			taxReturnBase.value = 0
			taxReturnBase.parentElement.classList.add('d-none')
			tax.value = 0
			tax.parentElement.classList.add('d-none')
		}

		if (inputText == 'Arriendo' || inputText == 'Otro') {
			if (amountField) {
				amountField.remove()
			}
			taxReturnBase.parentElement.classList.remove('d-none')
			tax.parentElement.classList.remove('d-none')
			taxReturnBase.value = ""
			tax.value = ""
		}
	}
</script>
<?php
get_footer();
?>