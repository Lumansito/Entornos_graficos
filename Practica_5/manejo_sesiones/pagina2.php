<?php 
session_start();
?>
<html>
<body>
<a href="cuenta.php"></a> 
<?php
if (!isset($_SESSION["contadorPag2"])){ 
    $_SESSION["contadorPag2"] = 1; 
   }else{ 
    $_SESSION["contadorPag2"]++; 
   } 
echo "Has visitado " . ($_SESSION["contador"]) . " páginas" . " Y esta actual la visitaste " .$_SESSION["contadorPag2"]; 

?> 
<br> 
<br> 
<a href="cuenta.php">Inicio</a> 
</body> 
</html>