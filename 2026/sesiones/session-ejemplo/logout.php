<?php
session_start();
session_unset(); // sirve para limpiar la sesion 
session_destroy(); // destruye la sesion

header("Location: index.php");
exit();
?>