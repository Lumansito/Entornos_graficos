<?php
session_start(); 
?>
<html>
<body>
<?php
if (!isset($_SESSION["contador"])){ 
 $_SESSION["contador"] = 1; 
}else{ 
 $_SESSION["contador"]++; 
} 
?> 
<a href= "pagina1.php">Pagina 1</a>
<a href= "pagina2.php">Pagina 2</a>
<a href= "finalizar.php">Limpiar sesiones</a>
</body>
</html>
