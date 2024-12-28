<?php
/**
 * Template Name: Plantilla Cardio U | Formulario Gracia
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

get_header('cardiou');
?>
<section class="seccionCardioUFormularioGracia">
    <div class="wrapper">
        <div class="seccionCardioUFormularioGracia__grid">
            <div class="seccionCardioUFormularioGracia__titulo">
                <svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" viewBox="0 0 66 66" fill="none">
                    <path d="M47.7714 25.2656H38.8008V15.4688C38.8008 12.2706 36.1982 9.66797 33 9.66797H29.1328C28.0655 9.66797 27.1992 10.5342 27.1992 11.6016V23.332C27.1992 24.3981 26.3317 25.2656 25.2656 25.2656H17.5312C16.4639 25.2656 15.5977 26.1319 15.5977 27.1992V50.4023C15.5977 51.4697 16.4639 52.3359 17.5312 52.3359H45.1932C48.0408 52.3359 50.4475 50.2979 50.9154 47.4891L53.4935 32.0203C54.0826 28.4896 51.3601 25.2656 47.7714 25.2656ZM19.4648 29.1328H23.332V48.4688H19.4648V29.1328ZM49.6779 31.3848L47.0998 46.8536C46.9438 47.7894 46.142 48.4688 45.192 48.4688H27.1979V28.8015C29.4486 28.0036 31.0651 25.8534 31.0651 23.332V13.5352H32.9987C34.0648 13.5352 34.9323 14.4027 34.9323 15.4688V27.1992C34.9323 28.2666 35.7986 29.1328 36.8659 29.1328H47.7701C48.9663 29.1328 49.8751 30.2027 49.6779 31.3848Z" fill="#00B388"/>
                    <path d="M33 0C14.8294 0 0 14.8307 0 33C0 51.1693 14.8307 66 33 66C51.1693 66 66 51.1693 66 33C66 14.8307 51.1693 0 33 0ZM33 62.1328C16.9357 62.1328 3.86719 49.0643 3.86719 33C3.86719 16.9357 16.9357 3.86719 33 3.86719C49.0643 3.86719 62.1328 16.9357 62.1328 33C62.1328 49.0643 49.0643 62.1328 33 62.1328Z" fill="#00B388"/>
                </svg>
                <h1 class="heading--64 color--002D72">¡Muchas gracias!</h1>
                <p class="heading--18 color--263956">
                A tu correo electrónico enviaremos toda la información que necesitas para realizar el pago de tu inscripción.
                </p>
                <a href="/cardio-u" class="boton-v2 boton-v2--rojo-rojo" href="">Volver al inicio</a>
            </div>
            <img src="<?php echo IMG_BASE . 'imagen-form-gracias.png'?>" alt="Únete a nuestra comunidad">
        </div>
    </div>
</section>

<?php get_footer('cardiou');