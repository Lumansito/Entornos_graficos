<?php
session_start();

if (isset($_SESSION['nombre'])) {
    // La variable de sesión 'nombre' está definida, dar la bienvenida al alumno
    $nombre = $_SESSION['nombre'];
    echo "<h1>Bienvenido, $nombre</h1>";
} else {
    // La variable de sesión 'nombre' no está definida, mostrar un mensaje de restricción
    echo "<h1>No puedes visitar esta página.</h1>";
}
?>
