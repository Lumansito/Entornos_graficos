<?php
// Datos del destinatario y el correo
$destinatario = "correo_destino@example.com";
$asunto = "Correo HTML de prueba";
$cuerpo = '
<html>
<head>
    <title>Correo HTML de prueba</title>
</head>
<body>
    <h1>Hola!</h1>
    <p>
        <b>Esto es una prueba de correo electrónico en formato HTML</b>. 
        <br>
        Puedes agregar contenido HTML personalizado aquí.
    </p>
</body>
</html>
';

// Cabeceras del correo
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: Nombre Remitente <remitente@example.com>\r\n";
$headers .= "Reply-To: remitente@example.com\r\n";
$headers .= "Cc: copia@example.com\r\n"; // Si deseas enviar copias a otras direcciones
$headers .= "Bcc: copia_oculta@example.com\r\n"; // Si deseas enviar copias ocultas a otras direcciones

// Envío del correo
if (mail($destinatario, $asunto, $cuerpo, $headers)) {
    echo "El correo ha sido enviado con éxito.";
} else {
    echo "Hubo un error al enviar el correo.";
}
?>