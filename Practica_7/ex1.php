<?php
$estilo = "estilo1"; // Establece un estilo predeterminado

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["estilo"])) {
    // Si se envió el formulario y se eligió un estilo, actualiza la variable $estilo y establece una cookie
    $estilo = $_POST["estilo"];
    setcookie("estilo", $estilo, time() + 3600 * 24 * 30); // La cookie expirará en 30 días
} elseif (isset($_COOKIE["estilo"])) {
    // Si la cookie de estilo ya existe, obtén el estilo almacenado
    $estilo = $_COOKIE["estilo"];
}

// A continuación, definimos los estilos CSS asociados a cada opción:
$estilos = array(
    "estilo1" => "estilo1.css",
    "estilo2" => "estilo2.css",
    "estilo3" => "estilo3.css"
);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Página con Estilo</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $estilos[$estilo]; ?>">
</head>
<body>
    <h1>Página con Estilo</h1>
    <p>Seleccione un estilo para la página:</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label><input type="radio" name="estilo" value="estilo1" <?php echo $estilo === 'estilo1' ? 'checked' : ''; ?>> Estilo 1</label><br>
        <label><input type="radio" name="estilo" value="estilo2" <?php echo $estilo === 'estilo2' ? 'checked' : ''; ?>> Estilo 2</label><br>
        <label><input type="radio" name="estilo" value="estilo3" <?php echo $estilo === 'estilo3' ? 'checked' : ''; ?>> Estilo 3</label><br>
        <input type="submit" value="Guardar Estilo">
    </form>
</body>
</html>
