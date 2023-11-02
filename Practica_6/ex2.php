<?php
// Establece la conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "password", "ciudades");


// Verifica si la conexión se estableció correctamente
if (!$conexion) {
    die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
}

// Consulta para obtener todos los registros
$consulta = "SELECT * FROM lista";
$resultado = mysqli_query($conexion, $consulta);

// Verifica si la consulta fue exitosa
if ($resultado) {
    // Muestra los registros en una tabla HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>País</th><th>Habitantes</th><th>Superficie</th><th>Tiene Metro</th></tr>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['ID'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['pais'] . "</td>";
        echo "<td>" . $fila['habitantes'] . "</td>";
        echo "<td>" . $fila['superficie'] . "</td>";
        echo "<td>" . $fila['tieneMetro'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Libera el resultado
    mysqli_free_result($resultado);
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

// Cierra la conexión cuando hayas terminado
mysqli_close($conexion);
?>
