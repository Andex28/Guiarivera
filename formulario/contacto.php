
<?php
require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/appengine-https.php';

$siteKey = '6LfpEFAsAAAAAMQm5RLMLa7ocPgmzo8uFG2d4eB6';
$lang = 'es';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
    <link rel="stylesheet" href="../css/contacto.css">
</head>
<body>

<form class="contact-form">
    <h3>Contacto</h3>

    <label for="name">Nombre</label>
    <input type="text" id="name" name="name" placeholder="Tu nombre" required>

    <label for="email">Correo electrónico</label>
    <input type="email" id="email" name="email" placeholder="tu@email.com" required>

    <label for="message">Mensaje</label>
    <textarea id="message" name="message" rows="4" placeholder="Escribe tu mensaje" required></textarea>

    <div class="g-recaptcha form-field"></div>

    <button id="btn1" type="submit">Enviar</button>

    <a href="../index.html" class="btn-home">← Regresar al inicio</a>
</form>

<script>
function habilitarBoton() {
    document.getElementById('btn1').disabled = false;
}

var onloadCallback = function() {
    var captchaContainer = document.querySelector('.g-recaptcha');
    grecaptcha.render(captchaContainer, {
        'sitekey': '<?php echo $siteKey; ?>',
        'callback': habilitarBoton
    });
    document.getElementById('btn1').disabled = true;
};
</script>

<script src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>&onload=onloadCallback&render=explicit" async defer></script>

</body>
</html>