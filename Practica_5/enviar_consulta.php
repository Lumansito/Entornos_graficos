<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $consulta = $_POST["consulta"];

    $destinatario = "correo_destino@example.com";
    $asunto = "Consulta de $nombre";

    $mensaje = "Nombre: $nombre\n";
    $mensaje .= "Correo Electrónico: $correo\n";
    $mensaje .= "Consulta:\n$consulta";

    $headers = "From: $correo\r\n";
    $headers .= "Reply-To: $correo\r\n";

    if (mail($destinatario, $asunto, $mensaje, $headers)) {
        echo "La consulta se ha enviado con éxito. Nos pondremos en contacto contigo pronto.";
    } else {
        echo "Hubo un problema al enviar la consulta. Por favor, inténtalo de nuevo más tarde.";
    }
}
?>
