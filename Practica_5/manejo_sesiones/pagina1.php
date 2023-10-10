<?php 
session_start();
?>
<html>
<body>
<a href="cuenta.php"></a> 
<?php
if (!isset($_SESSION["contadorPag1"])){ 
    $_SESSION["contadorPag1"] = 1; 
   }else{ 
    $_SESSION["contadorPag1"]++; 
   } 
echo "Has visitado " . ($_SESSION["contador"]) . " páginas" . " Y esta actual la visitaste " .$_SESSION["contadorPag1"]; 
?> 
<br> 
<br> 
<a href="cuenta.php">Inicio</a> 
</body> 
</html>