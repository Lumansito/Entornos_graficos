<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomendar</title>
</head>
<body>
    <h1>Contacto</h1>
    <div class="container">
        <form method="post" action="recomendarAmigo.php">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            <label for="correoPropio">Correo electrónico propio:</label>
            <label for="correo">Correo electrónico del amigo:</label>
            <input type="email" name="correo" required>

            
            <textarea name="consulta" rows="4" required></textarea>

            <input type="submit" value="Enviar Consulta">
        </form>
    
    </div>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $correoP = $_POST["correoPropio"];
    

    $asunto = "Recomendacion de $nombre";

    $mensaje = "Hola tu amigo $nombre\n";
    $mensaje .= "nos recomendo, encuentranos en esta direccion sitioWeb.com \n";

    $headers = "From: $correoP\r\n";
    $headers .= "Reply-To: $correo\r\n";

    if (mail($destinatario, $asunto, $mensaje, $headers)) {
        echo "La consulta se ha enviado con éxito. Nos pondremos en contacto contigo pronto.";
    } else {
        echo "Hubo un problema al enviar la consulta. Por favor, inténtalo de nuevo más tarde.";
    }
}
?>
</body>
</html>