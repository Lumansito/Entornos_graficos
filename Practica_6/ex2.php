<?php
// Establece la conexión a la base de datos
$conexion = mysqli_connect("localhost", "root");

mysqli_select_db($conexion, "ciudades");

// Verifica si la conexión se estableció correctamente
if (!$conexion) {
    die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
}

// Función para mostrar el formulario de alta de registro
function mostrarFormularioAlta() {
    echo '<form method="post">
        <h2>Alta de Registro</h2>
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="pais" placeholder="País">
        <input type="number" name="habitantes" placeholder="Habitantes">
        <input type="number" name="superficie" placeholder="Superficie">
        <label>Tiene Metro: <input type="checkbox" name="tieneMetro" value="1"></label>
        <input type="submit" name="nuevoRegistro" value="Agregar Registro">
    </form>';
}

// Función para mostrar el formulario de modificación de registro
function mostrarFormularioModificacion() {
    echo '<form method="post">
        <h2>Modificar Registro</h2>
        <input type="number" name="idAModificar" placeholder="ID del registro a modificar">
        <input type="text" name="nuevoNombre" placeholder="Nuevo Nombre">
        <input type="text" name="nuevoPais" placeholder="Nuevo País">
        <input type="submit" name="modificarRegistro" value="Modificar Registro">
    </form>';
}

// Función para mostrar el formulario de eliminación de registro
function mostrarFormularioEliminacion() {
    echo '<form method="post">
        <h2>Eliminar Registro</h2>
        <input type="number" name="idAEliminar" placeholder="ID del registro a eliminar">
        <input type="submit" name="eliminarRegistro" value="Eliminar Registro">
    </form>';
}

// Verificar qué operación se seleccionó
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["alta"])) {
        mostrarFormularioAlta();
    } elseif (isset($_POST["modificacion"])) {
        mostrarFormularioModificacion();
    } elseif (isset($_POST["eliminacion"])) {
        mostrarFormularioEliminacion();
    }

        // Operación de Alta (Create)
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["alta"])) {
        $nombre = $_POST["nombre"];
        $pais = $_POST["pais"];
        $habitantes = $_POST["habitantes"];
        $superficie = $_POST["superficie"];
        $tieneMetro = isset($_POST["tieneMetro"]) ? 1 : 0;

        $consultaInsert = "INSERT INTO lista (nombre, pais, habitantes, superficie, tieneMetro) VALUES ('$nombre', '$pais', $habitantes, $superficie, $tieneMetro)";
        if (mysqli_query($conexion, $consultaInsert)) {
            echo "Registro agregado con éxito.";
        } else {
            echo "Error al agregar el registro: " . mysqli_error($conexion);
        }
    }

    // Operación de Baja (Delete)
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminacion"])) {
        if (isset($_POST["idAEliminar"])) {
        $idAEliminar = $_POST["idAEliminar"];
        $consultaDelete = "DELETE FROM lista WHERE ID = $idAEliminar";


        if (mysqli_query($conexion, $consultaDelete)) {
            echo "Registro eliminado con éxito.";
        } else {
            echo "Error al eliminar el registro: " . mysqli_error($conexion);
        }
    } else {
        echo "Por favor, ingrese un ID válido para eliminar el registro.";
    }
}


    // Operación de Modificación (Update)
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modificarRegistro"])) {
        $idAModificar = $_POST["idAModificar"];
        $nuevoNombre = $_POST["nuevoNombre"];
        $nuevoPais = $_POST["nuevoPais"];

        $consultaUpdate = "UPDATE lista SET nombre = '$nuevoNombre', pais = '$nuevoPais' WHERE ID = $idAModificar";
        if (mysqli_query($conexion, $consultaUpdate)) {
            echo "Registro modificado con éxito.";
        } else {
            echo "Error al modificar el registro: " . mysqli_error($conexion);
        }
    }
    
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

    echo '</table>';
    echo '<form method="post">';
    echo '<input type="submit" name="alta" value="Alta">';
    echo '<input type="submit" name="modificacion" value="Modificación">';
    echo  '<input type="submit" name="eliminacion" value="Eliminación">';
    echo     '</form>    ';
    // Libera el resultado
    mysqli_free_result($resultado);
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

// Cierra la conexión cuando hayas terminado
mysqli_close($conexion);
?>
