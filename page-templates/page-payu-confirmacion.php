<?php
/*
    Template Name: Payu (Confirmación)
*/
get_header();
?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="pagina">
    <h1 class="mb-5"><?php the_title(); ?></h1>
    <div class="payuform">

        <?php
        $urlPayU = 'https://checkout.payulatam.com/ppp-web-gateway-payu/';
        $ApiKey = '14d2f426e31';
        $merchantId = '109595';
        $accountId = '113639';
        $currency = 'COP';
        $test = '0';
        $responseUrl = home_url() . '/resumen-transaccion/';

        $buyerFullName = (isset($_POST['buyerFullName'])) ? $_POST['buyerFullName'] : '';
        $payerDocument = (isset($_POST['payerDocument'])) ? $_POST['payerDocument'] : '';
        $buyerEmail = (isset($_POST['buyerEmail'])) ? $_POST['buyerEmail'] : '';
        $mobilePhone = (isset($_POST['mobilePhone'])) ? $_POST['mobilePhone'] : '';
        $extra1 = (isset($_POST['extra1'])) ? $_POST['extra1'] : '';
        $referenceCode = "FCICODE-" . $payerDocument . "-" . time() . "-" . rand(1, 10);
        $extra2 = (isset($_POST['extra2'])) ? $_POST['extra2'] : '';
        $description = (isset($_POST['description'])) ? $_POST['description'] : '';
        $taxReturnBase = (isset($_POST['taxReturnBase'])) ? $_POST['taxReturnBase'] : 0;
        $tax = (isset($_POST['tax'])) ? $_POST['tax'] : 0;

        if (isset($_POST['amount'])) {
            $amount = $_POST['amount'];
        } else {
            $amount = $tax + $taxReturnBase;
        }

        $pre_signature = "$ApiKey~$merchantId~$referenceCode~$amount~$currency";
        $signature = md5($pre_signature);

        /* Testing */
        /*
            $buyerFullName = 'John W. Martinez';
            $amount = 123000;
            $extra1 = 'Arriendo';
            $extra2 = 'FCI234-0987';
            $description = 'Este pago se realiza porque bla bla bla y porque así ojo ajá';
        */
        ?>
        <?php if($buyerFullName != "" && $payerDocument != ""): ?>
            <form method="post" action="<?php echo $urlPayU; ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="message-confirmation mb-3">
                                Hola, <strong><?php echo $buyerFullName; ?></strong>. Estás a punto de pagar <strong>$<?php echo number_format($amount); ?></strong> por el servicio <strong><?php echo $extra1; ?></strong>. Estos son algunos datos de su pago: 
                            </div>
                            <div class="datos_pago">
                                <p class="mb-2"><strong>Número de autorización / Factura: </strong><?= $extra2 ?></p>
                                <p><strong>Descripción del pago: </strong><?= $description ?></p>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <input name="merchantId" type="hidden" value="<?php echo $merchantId; ?>">
                            <input name="accountId" type="hidden" value="<?php echo $accountId; ?>">
                            <input name="description" type="hidden" value="<?php echo $description; ?>">
                            <input name="referenceCode" type="hidden" value="<?php echo $referenceCode; ?>">
                            <input name="extra1" type="hidden" value="<?php echo $extra1; ?>">
                            <input name="extra2" type="hidden" value="<?php echo $extra2; ?>">
                            <input name="amount" type="hidden" value="<?php echo $amount; ?>">
                            <input name="tax" type="hidden" value="<?php echo $tax; ?>">
                            <input name="taxReturnBase" type="hidden" value="<?php echo $taxReturnBase; ?>">
                            <input name="currency" type="hidden" value="<?php echo $currency; ?>">
                            <input name="signature" type="hidden" value="<?php echo $signature; ?>">
                            <input name="test" type="hidden" value="<?php echo $test; ?>">
                            <input name="buyerEmail" type="hidden" value="<?php echo $buyerEmail; ?>">
                            <input name="responseUrl" type="hidden" value="<?php echo $responseUrl; ?>">
                            <input name="buyerFullName" type="hidden" value="<?php echo $buyerFullName; ?>">
                            <input name="submit_to_payu" type="submit" class="btn" value="Confirmar Pago" />
                        </div>
                    </div>
                </div>
            </form>
        <?php else: ?>
                <p class="text-center">Lo sentimos pero no se ha enviado la información de pago de forma correcta. Ingrese nuevamente al <a href="/formulario-pagos/">formulario de pagos.</a></p>
        <?php endif; ?>

    </div>
</main>
<?php
get_footer();
?>