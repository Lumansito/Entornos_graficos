<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombreUsuario"])) {

    // Si se envió el formulario y se proporcionó un nombre de usuario, establece la cookie

    $nombreUsuario = $_POST["nombreUsuario"];
    setcookie("nombreUsuario", $nombreUsuario, time() + 3600 * 24 * 30); 
    $ultimoNombre = $nombreUsuario; 
} elseif (isset($_COOKIE["nombreUsuario"])) {

    // Si la cookie "nombreUsuario" existe, obtén el último nombre de usuario ingresado
    $ultimoNombre = $_COOKIE["nombreUsuario"];
    
} else {
    $ultimoNombre = ""; // Si no hay cookie ni formulario enviado, establece el valor predeterminado
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Nombre de Usuario</title>
</head>
<body>
    <h1>Formulario de Nombre de Usuario</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="nombreUsuario">Nombre de Usuario:</label>
        <input type="text" name="nombreUsuario" id="nombreUsuario" value="<?php echo $ultimoNombre; ?>">
        <input type="submit" value="Guardar Nombre de Usuario">
    </form>

    
    <?php
    if (!empty($ultimoNombre)) {
        echo "<h2>Último Nombre de Usuario Ingresado</h2>"   ;
        echo "<p>El último nombre de usuario ingresado es: $ultimoNombre</p>";
    } else {
        echo "<p>No se ha ingresado un nombre de usuario todavía.</p>";
    }
    ?>
</body>
</html>

